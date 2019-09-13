<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sander Dechering')</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/yn6h1diil7zuwkkijq8o8cql43lmkkh32e11mm7s60v9lbmz/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: 'link',
        });
    </script>
</head>
<body>
    <div id="app">
        <div class="container-fluid">
                @if( session()->has('message'))
                <div class="row">
                    <div class="col-sm-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 my-4">
                        <div class="alert alert-info">
                            <strong>Message:</strong><br>
                            {{ session()->get('message') }}
                        </div>
                    </div>
                </div>
                @endif

            @yield('content')

        </div>
    </div>
<script>
    $('#inputGroupFile02').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
</body>
</html>
