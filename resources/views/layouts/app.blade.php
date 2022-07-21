<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <meta name="_token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styles -->

    <!-- Scripts -->
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            </div>
        </header>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                isLocal: false
            });
        });
        $(document).on("change", '[data-request="ajax-change"]', function() {
            if (confirm("Are you sure you want to delete this?")) {
                var $formData = new FormData();
                var $this = $(this);
                var $value = $(this).val();
                var $url = $this.data("url");
                var $type = $this.data("type");
                var $method = $this.data("method");
                var $td_line = $this.data("tb_line");
                var $newurl = $url + "?status=" + $value;
                $.ajax({
                    url: $newurl,
                    type: $method,
                    data: $formData,
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    success: function($response) {
                        console.log($response.type);
                        console.log($td_line);
                        if ($response.type == 'completed') {
                            $($td_line).css("color", '');
                            $($td_line).css("text-decoration", 'line-through');
                        } else if ($response.type == 'progress') {
                            $($td_line).css("text-decoration", '');
                            $($td_line).css("color", 'green');
                        } else {
                            $($td_line).css("color", 'orange');
                            $($td_line).css("text-decoration", '');
                        }
                    },
                });
            } else {
                location.reload();
            }
        });
    </script>

</body>

</html>