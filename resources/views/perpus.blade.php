<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aplikasi Perpustakaan</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
</head>
<body>
  <div id="app">
    <app-home></app-home>
  </div>
  <script src="{{ url('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/select2.min.js') }}"></script>
  <!-- <script src="{{ asset('js/pdfmake.min.js') }}"></script> -->
  <!-- <script src="{{ asset('js/vfs_fonts.js') }}"></script> -->
</body>
</html>