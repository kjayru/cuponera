<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>{{ env('APP_NAME') }}</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script type="text/javascript" src="{{ asset('js/library/jquery.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="/css/common.css?v={{uniqid()}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
      <link href="https://fonts.googleapis.com/css?family=Anton|Bevan|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
  </head>
  <body>
   @include('layouts.front.partials.header')

    
    @yield('content')


   @include('layouts.front.partials.footer')

    
   @include('layouts.front.partials.scripts')
  </body>
</html>
