@extends('layouts.app')
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('vendor/sweetalert/dist/sweetalert.css') }}">
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
<section class="padding-large">
	<div class="container">
		<div class="row">
      
			<div class="products-grid grid">
            <a id="btn-new-mdl-book_recommendation-modal" class="btn btn-sm btn-primary btn-new-mdl-book_recommendation-modal float-right">
              <i class="bx bx-book_recommendation-add me-1"></i>New Book_recommendation
          </a>
          <div class="row row-cols-1 row-cols-md-2 g-3">
          @foreach($book_recommendations as $book_recommendation)
          @if(!empty($book_recommendation->book))
             <div class="col">
              <div class="card h-100 p-3" style="border-radius: 0 !important;box-shadow:0 !important;border:none !important;">
                <div class="row">
                  <div class="col-md-4">
                    {{-- asset('img/' . $post->image) --}}
                    <img src="{{$book_recommendation->book->cover_image}}" style="box-shadow: 0px 2px 4px rgba(0,0,0,0.26)" class="img-fluid rounded-start w-70 h-70" alt="...">                
                    
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><span>{{$book_recommendation->book->title}}</span> {{$book_recommendation->book->author}}</h5>
                      <p class="card-text">{{$book_recommendation->book->description}}</p>
                      {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                      <div class="d-flex align-items-center"> 
                        <a data-toggle="tooltip" 
                            title="Edit" 
                            data-val='{{$book_recommendation->book->id}}' 
                            class="btn-edit-mdl-book_recommendation me-2" href="#">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a data-toggle="tooltip" 
                        title="Delete" 
                        data-val='{{$book_recommendation->book->id}}' 
                        class="btn-delete-mdl-book_recommendation" href="#">
                        <i class="fas fa-trash text-danger me-5"></i>
                      </a>
                      
                    </div>
                  </div>
                  <a href="{{route('book_recommendations.show', $book_recommendation->book->id)}}" class="mb-3 btn btn-secondary" style="border-radius: 0 !important;">View Details</a>
                  <a href="{{url('storage/' . $book_recommendation->book->cover_image_path)}}" id="link" class="btn btn-primary mb-3" target="_blank" style="border-radius: 0 !important;">Read Online</a>
                    </div>
                  </div>
                  <div>
                </div>
                
                @endif
              </div>
             </div>
              @endforeach
           </div>
	    	</div>
		</div>
	</div>
</section>
          </div>
      </div>
  </div>
@include('book_recommendations.modal')
<!-- Logout Modal-->
@include('dashboard.partials.logout_modal')
@include('dashboard.partials.footer')

@stop

