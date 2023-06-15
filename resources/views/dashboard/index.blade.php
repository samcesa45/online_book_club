
<!-- Custom fonts for this template-->
@extends('layouts.app')
<link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    
<!-- Custom styles for this template-->
<link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <style>
       
        a.card-title.card-title-hover{
            text-decoration: none;
        }
        a.card-title.card-title-hover:hover{
           color:#FECB1C !important;
        }
    </style>

<body id="page-top">

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

              <!-- Begin Page Content -->
              <div class="container-fluid">

                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                      {{-- <a href="{{route('dashboard.join')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                              class="fas fa-download fa-sm text-white-50"></i> Join Club</a> --}}
                  </div>

                  <!-- Content Row -->
                  <div class="row">
                      <!-- Earnings (Monthly) Card Example -->
                      <x-card title="Category" type="primary"  color="primary" description="4000">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </x-card>
                      <!-- Earnings (Monthly) Card Example -->
                      <x-card title="COMMUNITY" type="success"  color="success" description="1000 Followers">
                        <i class="fas fa-hands-helping fa-2x text-gray-300"></i>
                      </x-card>
                      <!-- Earnings (Monthly) Card Example -->
                    <x-card title="Latest Book Lists" type="info" description="Total List ({{count($books)}})">
                           <a href="/books"> <i class="fas fa-clipboard-list fa-2x text-gray-300"></i></a>
                    </x-card>
                      <!-- Pending Requests Card Example -->
                      <x-card title="CHAT ROOMS" type="warning" color="warning" description="18 Active Chats">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                      </x-card>
                  <!-- Content Row -->

                  <div class="row">

                      <!-- Area Chart -->
                      <div class="col-xl-8 col-lg-7">
                          <div class="card shadow mb-4">
                              <!-- Card Header - Dropdown -->
                              <div
                                  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                  <h6 class="m-0 font-weight-bold text-primary">Books Overview</h6>
                                  <div class="dropdown no-arrow">
                                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                          aria-labelledby="dropdownMenuLink">
                                          <div class="dropdown-header">Dropdown Header:</div>
                                          <a class="dropdown-item" href="#">Action</a>
                                          <a class="dropdown-item" href="#">Another action</a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item" href="#">Something else here</a>
                                      </div>
                                  </div>
                              </div>
                              <!-- Card Body -->
                              <div class="card-body">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        
                                       @foreach($books as $book)
                                        <tr>
                                           @if(isset($book))
                                            <th scope="row">{{$loop->index}}</th>
                                            <td>{{$book->title}}</td>
                                            <td>{{$book->author}}</td>
                                            <td>{{$book->description}}</td>
                                            <td><img src="{{$book->cover_image}}" class="w-50 h-50" alt=""></button></td>
                                            <td><a href="/books">view books</a></td>
                                          @endif
                                    
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>

                      <!-- Pie Chart -->
                      <div class="col-xl-4 col-lg-5">
                          <div class="card shadow mb-4">
                              <!-- Card Header - Dropdown -->
                              <div
                                  class="card-header py-3">
                                  <h6 class="m-0 font-weight-bold text-primary">Recommended Books</h6>
                                  {{-- <div class="dropdown no-arrow">
                                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                          aria-labelledby="dropdownMenuLink">
                                          <div class="dropdown-header">Dropdown Header:</div>
                                          <a class="dropdown-item" href="#">Action</a>
                                          <a class="dropdown-item" href="#">Another action</a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item" href="#">Something else here</a>
                                      </div>
                                  </div> --}}
                              </div>
                              <!-- Card Body -->
                                  @foreach($book_recommendations as $book_recommendation)
                                  @if(!empty($book_recommendation->book))
                                  <div class="px-3 my-4">
                                      <div class="d-flex justify-content-between">
                                        <div class="me-2" style="min-height:100px !important">
                                          <img src="{{$book_recommendation->book->cover_image}}"  class="img-fluid rounded-start w-100 h-100" alt="...">                
                                        </div>
                                           <div class="col-6">
                                            <a href="{{route('books.show', $book_recommendation->book->id)}}" class="mb-3 card-title-hover stretched-link hover:text-red-700" style="text-decoration:none;"><h5 class="card-title  fs-6"><span >{{$book_recommendation->book->title}}</span> {{$book_recommendation->book->author}}</h5>
                                            </a>
                                            <div class="d-flex" style="height: 18px;">
                                             <i class="fas fa-star text-warning" style="color: #FECB1C;"></i>
                                             <i class="fas fa-star" style="color: #FECB1C;"></i>
                                             <i class="fas fa-star" style="color: #FECB1C;"></i>
                                             <i class="fas fa-star" style="color: #FECB1C;"></i>
                                             <i class="fas fa-star" style="color: #FECB1C;"></i>
                                             </div>
                                             <div>reviews({{count($book_reviews)}})</div>
                                           </div>
                                          </div>
                                        </div>
                                      @endif
                                  @endforeach
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
              <!-- /.container-fluid -->

          </div>
          <!-- End of Main Content -->

          <!-- Footer -->
         @include('dashboard.partials.footer')
          <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
   @include('dashboard.partials.logout_modal')

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/chart-area-demo.js')}}"></script>
  <script src="{{ asset('js/demo/chart-pie-demo.js')}}"></script>

</body>

