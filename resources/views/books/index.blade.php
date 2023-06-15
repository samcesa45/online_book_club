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
<section class="padding-large">
	<div class="container">
		<div class="row">
      
			<div class="products-grid grid">
            <a id="btn-new-mdl-book-modal" class="btn btn-sm btn-primary btn-new-mdl-book-modal float-right">
              <i class="bx bx-book-add me-1"></i>New Book
          </a>
          <div class="row row-cols-1 row-cols-md-2 g-3">
          @foreach($books as $book)
          @if(!empty($book))
             <div class="col">
              <div class="card  h-100 p-3" style="border-radius: 0 !important;box-shadow:0 !important;border:none !important;">
                <div class="row">
                  <div class="col-12 col-md-4" style="min-height:100px !important;">
                    <img src="{{$book->cover_image}}" style="" class="img-fluid rounded-start w-100" alt="...">                 
                  </div>
                  <div class="col-12 col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><span>{{$book->title}}</span> {{$book->author}}</h5>
                      <p class="card-text">{{$book->description}}</p>
                      <div class="d-flex align-items-center"> 
                        <a data-toggle="tooltip" 
                            title="Edit" 
                            data-val='{{$book->id}}' 
                            class="btn-edit-mdl-book me-2" href="#">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a data-toggle="tooltip" 
                        title="Delete" 
                        data-val='{{$book->id}}' 
                        class="btn-delete-mdl-book" href="#">
                        <i class="fas fa-trash text-danger me-5"></i>
                      </a>
                  
                     <div class="form-check form-switch">
                      <input class="form-check-input btn-new-mdl-book_recommendation-modal" 
                      type="checkbox" role="switch"  data-toggle="tooltip" 
                      title="recommend book"
                      data-val='{{$book->id}}' 
                      id="btn-new-mdl-book_recommendation-modal">
                      <label class="form-check-label" for="btn-new-mdl-book_recommendation-modal">Recommend</label>
                    </div>
                      
                    </div>
                  </div>
                  <a href="{{route('books.show', $book->id)}}" class="mb-3 btn btn-secondary" style="border-radius: 0 !important;">View Details</a>
                  {{-- <iframe src="{{url('storage/' . $book->cover_image_path)}}" id="link" class=" mb-3" type="application/pdf" width="100%" height="500"></iframe>
                   --}}
                  <a href="{{url('storage/' . $book->cover_image_path)}}" id="link" class="btn btn-primary mb-3" target="_blank" style="border-radius: 0 !important;">Read Online</a>
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
@include('books.modal')
@include('books.partials.book_recommendation_modal')
<!-- Logout Modal-->
@include('dashboard.partials.logout_modal')
@include('dashboard.partials.footer')

@stop

