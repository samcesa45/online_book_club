@extends('layouts.app')
@include('header')
<style>
.bottom-bar{
position: relative;
width: 100%;
height: 40px;
background: #161616;
}
.bottom-bar--inner-1{ 
width: 60px;
height: 6px;
background: #D8D8D8;
border: 1px solid #979797;
}

.bottom-bar--inner-2{ 
width: 40px;
height: 6px;
background: #D8D8D8;
border: 1px solid #979797;
}

.headline-2{
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
font-size: 12px;
line-height: 14px;
text-align: center;
letter-spacing: 1.87429px;
color: #444444;
margin-top: 21px;
}

.headline-para-2{
font-family: 'Open Sans';
font-style: normal;
font-weight: 400;
font-size: 12px;
line-height: 17px;
text-align: center;
letter-spacing: 1.28857px;
color: #767070;
}

.more-btn{
width: 120px;
height: 30px;
font-size: 12px;
line-height: 17px;
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
letter-spacing: 1.17143px;
color: #5C5C5C;
text-decoration: none;
border: 1px solid #5C5C5C;
text-align: center;
border-radius:0 !important;  
}

.more-btn:hover{
    background: #169E16;
    color: #ffffff;
}
.recommend{
margin-top:19px;
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
font-size: 12px;
line-height: 17px;
text-align: center;
letter-spacing: 1.87429px;
color: #444444;
}

.publish{
margin-top: 8px;
font-family: 'Open Sans';
font-style: normal;
font-weight: 400;
font-size: 12px;
line-height: 15px;
text-align: center;
letter-spacing: 1.28857px;
color: #767070;
}

.card--1{
margin-top:21px;
margin-left:15px; 
margin-right:15px; 
width: 180px;
height: 180px;
background: #FFFFFF;
box-shadow: 1.03103px 4.12414px 15px rgba(130, 130, 130, 0.18);
border-radius: 5.15517px;
border-color: #ffffff;
}

.card--1 img{
width: 80px;
height: 100px;
margin-top: 10px;
margin-left:20px; 
}

.big-card{
width: 100px;
height: 150px;
}

@media  (min-width:345px){
.bottom-bar--inner-1{ 
width: 100px;
height: 6px;
}
.bottom-bar--inner-2{ 
width: 60px;
height: 6px;

}
.headline-2{
font-size: 14px;
line-height: 22px;
margin-top: 41px;
}
.headline-para-2{
font-size: 14px;
line-height: 18px;
}

.more-btn{
width: 120px;
height: 30px;
font-size: 12px;
line-height: 17px;
}
.recommend{
margin-top:21px;
font-size: 14px;
}
.publish{
font-size: 12px;
line-height: 15px;
}
.creativity-img{
    width: 250px;
}
.creativity-div{
/* width: 300px; */
color: #ffffff;
background-color: #161616;
}
.big-card{
margin-right:20px;
margin-left: 0px;
padding-left: 0px;
}

}

@media  (min-width:576px){
.bottom-bar{
position: relative;
width: 100%;
height: 98px;
background: #161616;
}
.bottom-bar--inner-1{ 
width: 260px;
height: 6px;
background: #D8D8D8;
border: 1px solid #979797;
}

.bottom-bar--inner-2{
width: 173.33px;
height: 6px;
background: #D8D8D8;
border: 1px solid #979797;
}
.headline-2{
font-size: 32px;
line-height: 44px;
margin-top: 81px;
}
.headline-para-2{
font-family: 'Open Sans';
font-style: normal;
font-weight: 400;
font-size: 18px;
line-height: 30px;
text-align: center;
letter-spacing: 1.28857px;
color: #767070;
}
.more-btn{
width: 200px;
height: 53px;
font-size: 20px;
line-height: 27px; 
}
.recommend{
margin-top:42px;
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
font-size: 32px;
line-height: 44px;
text-align: center;
letter-spacing: 1.87429px;
color: #444444;
}

.card--1{
margin-top:21px;
margin-left:15px; 
margin-right:15px; 
width: 255.03px;
height: 299px;
background: #FFFFFF;
box-shadow: 1.03103px 4.12414px 15px rgba(130, 130, 130, 0.18);
border-radius: 5.15517px;
border-color: #ffffff;
}
.card--1:first-child{
margin-left: 61px;
}
.card--1 img{
width: 123.72px;
height: 185.59px;
margin-top: 18.56px;
margin-left:65.32px; 
}

.book-title{
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
font-size: 16px;
line-height: 31px;
text-align: center;
letter-spacing: 1.32856px;
color: #767070;
}
.book-para{
font-family: 'Open Sans';
font-style: normal;
font-weight: 400;
font-size: 14px;
line-height: 31px;
text-align: center;
letter-spacing: 1.32856px;
color: #8F8F8F;
}


.big-card{
margin-bottom: 40px;
width: 238px;
height: 353.38px;
}

.featured-card--title{
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
font-size: 16px;
line-height: 22px;
letter-spacing: 1.05429px;
color: #969595;
}

.featured-card--subtitle{
width: 524px;
height: 38px;
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
font-size: 28px;
line-height: 38px;
letter-spacing: 1.87429px;
color: #444444;
}
.featured-card--text{
width: 530px;
height: 120px;
font-family: 'Open Sans';
font-style: normal;
font-weight: 400;
font-size: 18px;
line-height: 30px;
letter-spacing: 1.28857px;
color: #767070;
}

.featured-card-cta{
width: 200px;
height: 53px;
background: #169E16;
margin-top: 27px;
color: #ffffff;
border-radius: 0 !important;
border:1px solid #169E16;
}
.featured-card-cta:hover{
background: #169E16;
color: #ffffff;
}
.creativity-div{
width: 600.18px;
/* height: 505.94px; */
background-color: #161616;
}
.creativity-img{
 width: 600.18px;   
}
.creativity-container{
 margin-top: 181.62px;

}
.row>*{
padding-left: 0px !important;
padding-right: 0px !important;
}
.creativity--title{
margin-top: 145px;
margin-left: 100px;
width: 418px;
height: 44px;
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
font-size: 32px;
line-height: 44px;
letter-spacing: 1.87429px;
color: #FFFFFF;
}
.creativity--description{
/* height: 120px; */
font-family: 'Open Sans';
font-style: normal;
font-weight: 400;
font-size: 18px;
line-height: 30px;
letter-spacing: 1.28857px;
color: #FFFFFF;
margin-left:100px;
margin-top: 40px;
}
.creativity--cta{
width: 200px;
height: 53px;
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
font-size: 20px;
line-height: 27px;
letter-spacing: 1.17143px;
color: #FFFFFF;
margin-left:100px;
border: 1px solid #FFFFFF;
border-radius: 0px !important;
}

.creativity--cta:hover{
background-color: #FFFFFF;
border: 1px solid #FFFFFF;
color: #161616;
}

.partner-title{
margin-top:125.96px;
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
font-size: 32px;
line-height: 44px;
text-align: center;
letter-spacing: 1.87429px;
color: #444444;
}
.partner-para{
margin-top: 13px;
font-family: 'Open Sans';
font-style: normal;
font-weight: 400;
font-size: 18px;
line-height: 30px;
text-align: center;
letter-spacing: 1.28857px;
color: #767070;
}

.sure-title{
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
font-size: 32px;
line-height: 44px;
text-align: center;
letter-spacing: 1.87429px;
color: #444444;
}

.sure-para{  
width: 100%;
font-family: 'Open Sans';
font-style: normal;
font-weight: 400;
font-size: 18px;
line-height: 30px;
text-align: center;
letter-spacing: 1.28857px;
color: #767070;
}

.faq{
border: 1px solid #5C5C5C;
width: 200px;
height: 53px;
font-family: 'Open Sans';
font-style: normal;
font-weight: 600;
font-size: 20px;
line-height: 27px;
letter-spacing: 1.17143px;
color: #5C5C5C;
margin: 41px auto;
display: block;
}

}
</style>
    <body class="antialiased">
        @include('navbar')
        <div class="container-fluid">
            <div class="row">
                @include('carousel')
            </div>
        </div>
        <div class="container-fluid">
           <div class="row">
            <div class="bottom-bar">
                <div class="row row-cols-lg-4 mt-2 mx-auto mt-lg-4">
                    <div class="bottom-bar--inner-1 col-4 col-lg-4 mx-4 ps-lg-5 ms-lg-5"></div>
                    <div class="bottom-bar--inner-1 col-4 col-lg-4 mx-2 ps-lg-5 ms-lg-5"></div>
                    <div class="bottom-bar--inner-1 col-4 col-lg-4 mx-2 ps-lg-5 ms-lg-5"></div>
                </div>
                <div class="row row-cols-lg-4 mt-2 mx-auto mt-lg-4">
                    <div class="bottom-bar--inner-2 col-4 col-lg-4 mx-3 ps-lg-5 ms-lg-5"></div>
                    <div class="bottom-bar--inner-2 col-4 col-lg-4 mx-5 ps-lg-5 ms-lg-5"></div>
                    <div class="bottom-bar--inner-2 col-4 col-lg-4 mx-3 ps-lg-5 ms-lg-5"></div>
                </div>
            </div>
           </div>

        </div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-6 mx-auto">
                      <h5 class="headline-2">Why we love books</h5>
                      <p class="headline-para-2">Jump start your book reading by quickly check through the popular book categories. 1000+ books are published by different authors everyday. Explore your favourite books on BookClub Today.</p>
                      <a href="" class="more-btn d-block btn mx-auto my-auto">Find out More</a>
                </div>
               
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <h5 class="recommend">Recommended books for you</h5>
                        <p class="publish">1000+ books are published by different authors everyday.</p>
                    </div>
                  </div>
                </div>
                
                    <div class="row row-cols-3 row-cols-lg-4 mx-auto text-center">
                       <div class='card col-sm-6 col-lg-3 card--1 mb-3'>
                        <img src="{{asset('assets/img/card-1.png')}}" alt="">
                        <h6 class="book-title">The Mind Connection</h6>
                        <p class="book-para my-0">Joyce Meyer</p>
                        <div class="d-flex justify-content-center text-center mx-autoalign-items-center">
                          <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                          <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                          <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                          <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                          <i class="fa-regular fa-star" style="color: #FECB1C;"></i>
                        </div>
                       </div>
                       <div class='card col-sm-6 col-lg-3 card--1'>
                        <img src="{{asset('assets/img/card-2.png')}}" alt="">
                        <h6 class="book-title">The Road to Recognition</h6>
                        <p class="book-para my-0">Seth Price/ Barry Feldman</p>
                        <div class="d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                          <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                          <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                          <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                          <i class="fa-regular fa-star" style="color: #FECB1C;"></i>
                        </div>
                       </div>
                       <div class='card col-sm-6 col-lg-3 card--1'>
                        <img src="{{asset('assets/img/card-3.png')}}" alt="">
                        <h6 class="book-title">Battlefield of the mind</h6>
                        <p class="book-para my-0">Joyce Meyer</p>
                        <div class="d-flex justify-content-center">
                            <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                            <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                            <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                            <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                            <i class="fa-regular fa-star" style="color: #FECB1C;"></i>
                          </div>
                       </div>
                       <div class='card col-sm-6 col-lg-3 card--1 mt-3'>
                        <img src="{{asset('assets/img/card-4.png')}}" alt="">
                        <h6 class="book-title my-0">The Road to Recognition</h6>
                        <p class="book-para my-0">Seth Price/ Barry Feldman</p>
                        <div class="d-flex justify-content-center">
                            <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                            <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                            <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                            <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                            <i class="fa-regular fa-star" style="color: #FECB1C;"></i>
                        </div>
                       </div>
                    </div>
                    <div class="row justify-content-center mx-auto" style="margin-top:138px;">
                        <div class="col-lg-4 col-6 ms-lg-2 ps-lg-2">
                            <div class="big-card">
                                <img class="" src="{{asset('assets/img/big-card.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <h5 class="featured-card--title">Featured Book of the week</h5>
                            <h3 class="featured-card-subtitle">The subtle art of not giving a fuck</h3>
                            <div class="d-flex" style="height: 18px;">
                                <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                                <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                                <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                                <i class="fa-solid fa-star" style="color: #FECB1C;"></i>
                                <i class="fa-regular fa-star" style="color: #FECB1C;"></i>
                            </div>
                            <p class="featured-card--text">Jump start your book reading by quickly check through the popular book categories. 1000+ books are published by different authors everyday. Buy your favourite books on TreeBooks Today.</p>
                            <button class="featured-card-cta btn">Read Book</button>
                        </div>
                    </div>

                    <div class="row creativity-container" style="padding-left: 0px !important;padding-right:0px !important;">
                      <div class="col-lg-6 col-6 text-center mx-xs-auto  creativity-div">
                        <h3 class="creativity--title">Express your creativity</h3>
                        <p class="creativity--description">Jump start your book reading by quickly check through the popular book categories. 1000+ books are published by different authors everyday. Buy your favourite books on TreeBooks Today.</p>
                        <button class="creativity--cta btn">publish a  Book</button>
                      </div>
                      <div class="col-6 col-lg-6">
                        <img class="creativity-img" src="{{asset("assets/img/creativity-img.png")}}" alt="">
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <h5 class="partner-title">Our partners in the impact quest</h5>
                            <p class="partner-para">Jump start your book reading by quickly check through the popular book categories. 1000+ books are published by different authors everyday.</p>
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-4">
                                <img src="{{asset('assets/img/logo-1.png')}}" alt="">
                            </div>
                            <div class="col-lg-3 col-4">
                                <img src="{{asset('assets/img/logo-2.png')}}" alt="">
                            </div>
                            <div class="col-lg-3 col-4">
                                <img src="{{asset('assets/img/logo-3.png')}}" alt="">
                            </div>
                            <div class="col-lg-3 col-4">
                                <img src="{{asset('assets/img/logo-4.png')}}" alt="">
                            </div>
                        </div>

                        <div class=" col-12 mx-auto">
                            <h5 class="sure-title">Still not Sure</h5>
                            <p class="sure-para">Jump start your book reading by quickly check through the popular book categories. 1000+ books are published by different authors everyday. Buy your favourite books on Bookclub Today.</p>
                            <button class="faq">Read FAQ</button>
                        </div>
                        </div>
                    </div>


                
        </div>
        <footer>
            @include('footer')
        </footer>
        <script src="{{ asset('dist/bootstrap-5.2.3-dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    </body>
</html>
