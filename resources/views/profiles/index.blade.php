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

<style>
  body{
    position: relative;
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
}
}
}
</style>

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
<div class="container emp-profile">
      <div class="row">
          @foreach($profiles as $profile)
          @if(!empty($profile))
          <div class="col-md-4">
            <div class="profile-img">
                <img  src="{{url('storage/' . $profile->profile_picture_path)}}" alt="profile-img">
                {{-- <div class="file btn btn-lg btn-primary">
                    Change Photo
                    <input class="form-control" type="file" id="profile_picture_path" name="profile_picture_path">
                </div> --}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                        <h5>
                           {{$profile->first_name}} {{$profile->last_name}}
                        </h5>
                        <h6>
                           {{$profile->job_title}}
                        </h6>
                        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
          <a data-toggle="tooltip" 
          title="Edit" 
          data-val='{{$profile->id}}' 
          class="btn-edit-mdl-profile me-2" href="#">
          <i class="fas fa-edit"></i>
          </a>
        </div>
         
      </div>
      <div class="row">
          <div class="col-md-4">
              <div class="profile-work">
                  <p>WORK LINK</p>
                  <a href="">Website Link</a><br/>
                  <a href="">Bootsnipp Profile</a><br/>
                  <a href="">Bootply Profile</a>
                  <p>SKILLS</p>
                  <a href="">Web Designer</a><br/>
                  <a href="">Web Developer</a><br/>
                  <a href="">WordPress</a><br/>
                  <a href="">WooCommerce</a><br/>
                  <a href="">PHP, .Net</a><br/>
              </div>
          </div>
          <div class="col-md-8">
              <div class="tab-content profile-tab" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>User Id</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>{{$profile->username}}</p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Name</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>{{$profile->first_name}} {{$profile->last_name}}</p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Email</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>{{$profile->email}}</p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Phone</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>{{$profile->telephone}}</p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Profession</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>{{$profile->job_title}}</p>
                                  </div>
                              </div>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Experience</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>Expert</p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Hourly Rate</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>10$/hr</p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Total Projects</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>230</p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>English Level</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>Expert</p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Availability</label>
                                  </div>
                                  <div class="col-md-6">
                                      <p>6 months</p>
                                  </div>
                              </div>
                      <div class="row">
                          <div class="col-md-12">
                              <label>Your Bio</label><br/>
                              <p>Your detail description</p>
                          </div>
                      </div>
                  </div>
              </div>
              @endif
              @endforeach
          </div>
      </div>           
</div>


@include('profiles.modal')
<!-- Logout Modal-->
@include('dashboard.partials.logout_modal')
@include('dashboard.partials.footer')


</div>
</div>
@stop
