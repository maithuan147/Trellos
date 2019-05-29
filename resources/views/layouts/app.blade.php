<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="css/style.css">
        <!-- Bootstrap 3.3.7 -->
        <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Tell the browser to be responsive to screen width -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('css/Ionicons/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/AdminLTE/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/iCheck/blue.css') }}">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body>     
        @yield('content')
        @stack('scripts')
    </body>
</html>
