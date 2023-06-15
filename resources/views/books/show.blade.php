@extends('layouts.app')
{{-- <link href="{{asset('vendor/fontawesome-free/scss/fontawesome.scss')}}" rel="stylesheet"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('vendor/sweetalert/dist/sweetalert.css') }}" rel="stylesheet">
<link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('vendor/sweetalert/dist/sweetalert.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{ asset('dist/bootstrap-5.2.3-dist/js/bootstrap.min.js') }}"></script>

@section('content')
<!-- Page Wrapper -->
<div id="wrapper">
  @include('layouts.sidebar')
  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
          <!-- Topbar -->
         @include('dashboard.partials.header')
          <!-- End of Topbar -->
    <div class="">
        <div class="card-body">
            @include('books.show_fields')    
        </div>
    </div>
<!-- Logout Modal-->
@include('dashboard.partials.logout_modal')
@include('books.partials.book_review_modal')
@include('dashboard.partials.footer')
</div>
</div>
</div>
@stop
