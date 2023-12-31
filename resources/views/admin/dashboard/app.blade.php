<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="{{ asset ('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.dashboard.header')
        @include('admin.dashboard.sidebar')
        @yield('content')
        @include('admin.dashboard.footer')
    
  </body>
</html>