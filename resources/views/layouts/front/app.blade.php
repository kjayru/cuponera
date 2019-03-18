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
  </head>
  <body>
   @include('layouts.front.partials.header')

    
    @yield('content')
    
   @include('layouts.front.partials.footer')

    
   @include('layouts.front.partials.scripts')
  </body>
</html>
