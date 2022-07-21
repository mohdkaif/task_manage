<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


//Route::group(['middleware' => ['web']], function () {
    /**
     * Show Task Dashboard
     */
    Route::resource('/task', 'TaskController')->middleware(['auth']);

    /**
     * Add New Task
     */
    

    
    // Route::delete('/task/{id}', function ($id) {
    //     Task::findOrFail($id)->delete();

    //     return redirect('/');
    // });

    // Route::post('task_update/{id}', function (Request $request, $id) {
    //     dd($request->all());
    //     $task =  Task::findOrFail($id);
    //     $task->status = $request->status;
    //     $task->save();
    //     return response()->json(['status' => true, 'success' => true]);

    //     // return redirect('/');
    // });
//});
