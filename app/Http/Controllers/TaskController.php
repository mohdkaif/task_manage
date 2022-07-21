<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $data['tasks'] =  Task::orderBy('id', 'desc')->get();
        return view('tasks.task', $data);
    }

    /**
     * Add New Task
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/task')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();
        return redirect('/task');
    }
    
    /**
     * Update Task Status 
     */
    public function update(Request $request, $id)
    {
        $task =  Task::findOrFail($id);
        $task->status = $request->status;
        $task->save();
        return response()->json(['status' => true, 'type' => $request->status]);

    }

    /**
     * Delete Task
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect('/task');
    }
}
