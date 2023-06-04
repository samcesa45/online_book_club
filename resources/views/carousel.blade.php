<style>
.carousel{
    /* position: absolute; */
width: 100%;
height: 100%;
padding: 0px;
margin: 0px;
z-index: 1;

}
.carousel::after{
  content: '';
  position:absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, #FDFDFD 0%, #FFFFFF 17.07%, rgba(255, 255, 255, 0.33) 96.35%) !important;

  }
  .carousel-item img{
    min-height:100%;
    object-fit: cover;
  }
.headline{
position:absolute;
width: 200px;
left: 26px;
top: 40px;
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
font-size: 12px;
line-height: 20px;
letter-spacing: 2.34286px;
z-index: 1;
color: #444444;
 }
 .headline-para{
display: none;
position: absolute;
width: 200px;
left: 21px;
top:105px;
z-index: 1;
font-family: 'Open Sans';
font-style: normal;
font-weight: 400;
font-size: 12px;
line-height: 20px;
letter-spacing: 1.40571px;
color: #3A3A3A;
}

  .cta-btn{
position: absolute;
width: 100px;
height: 25px;
left: 25px;
top: 110px;
z-index: 1;
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
font-size: 14px;
line-height: 15px;
letter-spacing: 1.17143px;
color: #FFFFFF;
background: #169E16;
border:1px solid #169E16;
  }

@media (min-width:576px){
  .carousel{
/* position: absolute; */
width: 1200px;
height: 70%;
margin-left: -3px;
padding-top: 0px;
z-index: 1;

}
.carousel::after{
  content: '';
  position:absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, #FDFDFD 0%, #FFFFFF 17.07%, rgba(255, 255, 255, 0.33) 96.35%) !important;

  }
  .carousel-item img{
    min-height:50%;
  }
.headline{
position: absolute;
width: 718px;
height: 108px;
left: 52px;
top: 145px;
font-size: 40px;
line-height: 54px; 
}
.headline-para{
  display: block;
width: 631px;
height: 99px;
left: 52px;
top: 275px;
font-size: 22px;
line-height: 33px;
  }

.cta-btn{
position: absolute;
width: 200px;
height: 53px;
left: 52px;
top: 403px;
z-index: 1;
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
font-size: 20px;
line-height: 27px;
letter-spacing: 1.17143px;
color: #FFFFFF;
background: #169E16;
border:1px solid #169E16;
  }
}
  </style>
<div id="carousel-captions" class="carousel slide" data-bs-ride="false">
  <div class="row">
    <div class="col-lg-6">
      <h4 class="headline">Over 100 Free
        E-Books In Your Pocket!.</h4>
        <p class="headline-para">Book club is an online book community where 
          users can read, and talk about their favourite Books and get to share knowledge and ideas.</p>
          <a href="/register" class="cta-btn text-center pt-2" style="text-decoration: none">Register</a>
    </div>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('assets/img/img-1.png') }}" class="d-block w-100" alt="...">
    </div>
  </div>
</div>