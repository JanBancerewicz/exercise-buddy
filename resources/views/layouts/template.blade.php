<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
       
    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
    <style>
        html{
            scrollbar-gutter: stable;
        }
    </style>

    <title>@yield('title')</title>
</head>

<body>
    <main>
        @yield('content')
    </main>
</body>

</html>