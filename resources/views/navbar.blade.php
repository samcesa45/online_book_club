@extends('layouts.app')
<style>
.navbar{
position: fixed;
width: 100%;
height: 4rem;
left: 0;
top: 0;
right: 0;
background: #FFFFFF !important;
box-shadow: 0px 2px 4px rgba(178, 178, 178, 0.463041);
z-index: 2;
  }
.navbar-brand{
margin-left: 52px;
margin-right:52px;
font-family: 'Open Sans';
font-style: normal;
font-weight: 700;
font-size: 12px;
line-height: 20px;
letter-spacing: 1.40571px;
color: #323432;
 }

.nav-link.active{
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
font-size: 20px;
line-height: 27px;
letter-spacing: 1.17143px;
color: #4F4F4F;
  }
  .nav-link{
  
font-family: 'Open Sans';
font-style: normal;
font-weight: 500;
font-size: 12px;
line-height: 15px;
letter-spacing: 1.17143px;
color: #4F4F4F;
  }
.nav-item.login{
box-sizing: border-box;
width: 100px;
height: 25px;
background: #169E16;
}
.nav-link.text{
font-family: 'Open Sans';
font-style: normal;
font-weight: 500;
font-size: 12px;
line-height: 15px;
text-align: center;
letter-spacing: 1.17143px;
color: #FFFFFF;
  }

.navbar-collapse.collapse.show{
  background-color: #ffffff; 
}

@media (min-width:576px){
.navbar{
height: 94px;
}
.navbar-brand{
margin-left: 152px;
margin-right:102px;
font-family: 'Open Sans';
font-style: normal;
font-weight: 700;
font-size: 24px;
line-height: 33px;
letter-spacing: 1.40571px;
color: #323432;
 }
 .nav-link.active{
font-weight: 600;
font-size: 20px;
line-height: 27px;

  }
  .nav-link{
font-weight: 600;
font-size: 20px;
line-height: 27px;
  }
.nav-item.login{
width: 200px;
height: 53px;
}
.nav-link.text{
font-weight: 600;
font-size: 20px;
line-height: 27px;
  }
}
</style>

<div class="w-100">
 <div class="row">
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">BookClub</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Community</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Get Help</a>
          </li>
          <li class="nav-item me-lg-5">
            <a class="nav-link" href="#">Publish</a>
          </li>
          <li class="nav-item login ms-lg-5 pt-1">
            <a class="nav-link text text-center" href="/login">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
 </div>
</div>