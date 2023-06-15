<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Book Club Management System</title>
  <link href="{{asset('vendor/fontawesome-free/css/fontawesome.min.css')}}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
  <link
  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
  rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('resources/css/app.css') }}">
  <link href="{{ asset('vendor/sweetalert/dist/sweetalert.css') }}">
  <link href="{{ asset('dist/bootstrap-5.2.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body class="bg-red-500">
@yield('content')

<script src="{{ asset('vendor/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
  <script src="{{ asset('dist/bootstrap-5.2.3-dist/js/bootstrap.min.js') }}"></script>
  {{-- <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script> --}}
</body>
</html>