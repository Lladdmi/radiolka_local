<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- <link rel="stylesheet" href="https://gitcdn.link/repo/Chalarangelo/mini.css/master/dist/mini-nord.min.css"> -->
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
      <link rel="stylesheet" href="{{asset('css/mini-nord.min.css')}}">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript" src="{{asset('js/lastfm.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/autocomplete.js')}}"></script>
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dynatable/0.3.1/jquery.dynatable.css" integrity="sha256-9ziAQIdy127SzObsvXr4BUtKwD8uHktDmTTTjAfs5ZM=" crossorigin="anonymous"/> -->
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Dynatable/0.3.1/jquery.dynatable.js" integrity="sha256-HVnEmlhNnXzbzb+hf4jjN18Ypm5UTY1PBGOrNiVL7JA=" crossorigin="anonymous"></script> -->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sc-1.5.0/datatables.min.css"/>
      <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sc-1.5.0/datatables.min.js"></script>
      <title>@yield('title')</title>
  </head>
  <body>
    <div class="container">
      @include('layout.header')
      @yield('content')
      @include('layout.footer')
    </div>
  </body>
</html>
