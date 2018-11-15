<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--<link rel="icon" href="../../../../favicon.ico">--}}

    <title>Komatsu Dictionary</title>

    <!-- Latest compiled and minified CSS -->
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">--}}

<!-- Custom styles for this template -->
    {{--<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">--}}
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>


    <link href="/css/app.css" rel="stylesheet">
    {{--<link href="/css/cus.css" rel="stylesheet">--}}

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
<div class="container">

    @include('layouts.nav')

</div>

<main role="main" class="container" id="app">

    <div class="row">

        <div class="col-md-12 blog-main">
            @yield('content')
        </div>
        {{--<aside class="col-md-4 blog-sidebar">--}}
            {{--@include('layouts.sidebar')--}}
        {{--</aside>--}}
    </div>

</main>

@include('layouts.footer')
{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--}}

<script src="{{ asset('js/app.js') }}"></script>

@stack('custom-scripts')

</body>
</html>