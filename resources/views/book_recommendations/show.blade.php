@extends('layouts.app')
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
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
            @include('book_recommendations.show_fields')    
        </div>
    </div>

@include('dashboard.partials.footer')
</div>
</div>
</div>
@stop
