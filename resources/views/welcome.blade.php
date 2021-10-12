@extends('layouts.header')

<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">


@section('body')
<style type="text/css">
.con {
  position: relative;
  text-align: center;
  color: white;

  background-color: black;
}


.centered {
  position: absolute;
  top: 35%;
  left: 10%;
  text-align: left;

}
.centered  h1{
 font-size:4rem;

}
.centered p{
 font-size:2rem;

}
.con2 {
  background-image: url("{{asset('images/back1.png')}}");
background-repeat: no-repeat;
background-size: cover;
  color: white;
}


#demo {
/*    background: linear-gradient(112deg, #ffffff 50%, antiquewhite 50%);
*/
background-color: #1d1d1d;
    margin: auto
}

.carousel-caption {
    position: initial;
    z-index: 10;
    padding: 5rem 8rem;
    color: rgba(78, 77, 77, 0.856);
    text-align: center;
    font-size: 1.2rem;
    font-style: italic;
    font-weight: bold;
    line-height: 2rem
}
.carousel-caption img{
    margin-top: 0px!important;
    margin-bottom: 9%!important;
    border:2px solid #b82fc8;
}
.carousel-caption p{
    color: white;
    text-align: center;
}


@media(max-width:767px) {
    .carousel-caption {
        position: initial;
        z-index: 10;
        padding: 3rem 2rem;
        color: rgba(78, 77, 77, 0.856);
        text-align: center;
        font-size: 0.7rem;
        font-style: italic;
        font-weight: bold;
        line-height: 1.5rem
    }
}

.carousel-caption img {
    width: 6rem;
    border-radius: 5rem;
    margin-top: 2rem
}

@media(max-width:767px) {
    .carousel-caption img {
        width: 4rem;
        border-radius: 4rem;
        margin-top: 1rem
    }
}

#image-caption {
    font-style: normal;
    font-size: 1rem;
    margin-top: 0.5rem
}

@media(max-width:767px) {
    #image-caption {
        font-style: normal;
        font-size: 0.6rem;
        margin-top: 0.5rem
    }
}

.i {
    background-color: #1f1f1f;
    padding: .5rem;
    text-align: center;
    border-radius: 50px;
    color: #246c66;
    border:1px solid #2d2d2c;
    margin-right: 20px;

}
.i2 {
    background-color: #c42fd5;
    padding: .5rem;
    text-align: center;
    border-radius: 50px;
    color: white;

}


@media(max-width:767px) {
    i {
        padding: 0.8rem
    }
}

.carousel-control-prev {
    justify-content: flex-start
}

.carousel-control-next {
    justify-content: flex-end
}

.carousel-control-prev,
.carousel-control-next {
    transition: none;
    opacity: unset
}

@media only screen and (max-width: 600px){

.centered  h1{
 font-size: 1.5rem;

}
.centered p{
 font-size:1rem;

}
}
/* carousil css */
#mixedSlider {
  position: relative;
}
#mixedSlider .MS-content {
  white-space: nowrap;
  overflow: hidden;
  margin: 0 5%;
}
#mixedSlider .MS-content .item {
  display: inline-block;
  width: 33.3333%;
  position: relative;
  vertical-align: top;
  overflow: hidden;
  height: 100%;
  white-space: normal;
  padding: 0 10px;
}
@media (max-width: 991px) {
  #mixedSlider .MS-content .item {
    width: 50%;
  }
}
@media (max-width: 767px) {
  #mixedSlider .MS-content .item {
    width: 100%;
  }
}
#mixedSlider .MS-content .item .imgTitle {
  position: relative;
}
#mixedSlider .MS-content .item .imgTitle .blogTitle {
  margin: 0;
  text-align: left;
  letter-spacing: 2px;
  color: #252525;
  font-style: italic;
  position: absolute;
  background-color: rgba(255, 255, 255, 0.5);
  width: 100%;
  bottom: 0;
  font-weight: bold;
  padding: 0 0 2px 10px;
}
#mixedSlider .MS-content .item .imgTitle img {
  height: auto;
  width: 100%;
}
#mixedSlider .MS-content .item p {
  font-size: 16px;
  margin: 2px 10px 0 5px;
  text-indent: 15px;
}
#mixedSlider .MS-content .item a {
  float: right;
  margin: 0 20px 0 0;
  font-size: 16px;
  font-style: italic;
  color: rgba(173, 0, 0, 0.82);
  font-weight: bold;
  letter-spacing: 1px;
  transition: linear 0.1s;
}
#mixedSlider .MS-content .item a:hover {
  text-shadow: 0 0 1px grey;
}
#mixedSlider .MS-controls button {
  position: absolute;
  border: none;
  background-color: transparent;
  outline: 0;
  font-size: 50px;
  top: 95px;
  color: rgba(0, 0, 0, 0.4);
  transition: 0.15s linear;
}
#mixedSlider .MS-controls button:hover {
  color: rgba(0, 0, 0, 0.8);
}
.MS-right{
    margin-top: 255px !important;
    left: 36px;
    color: white !important;
}
.MS-left{
    margin-top: 255px !important;
    color: white !important;
}

@media (max-width: 1024px) {

.MS-left{
    left: 15px !important;
    top: 51px !important;
    font-size: 31px !important;
}
.MS-right{
    top: 51px !important;
    left: 36px;
    font-size: 31px !important;

    color: white !important;
}
}


@media (max-width: 992px) {
  #mixedSlider .MS-controls button {
    font-size: 30px;
  }
}
@media (max-width: 767px) {
  #mixedSlider .MS-controls button {
    font-size: 20px;
  }
}
#mixedSlider .MS-controls .MS-left {
  left: 0px;
}
@media (max-width: 767px) {
  #mixedSlider .MS-controls .MS-left {
    left: -10px;
  }
}
#mixedSlider .MS-controls .MS-right {
  right: 0px;
}
@media (max-width: 767px) {
  #mixedSlider .MS-controls .MS-right {
    right: -10px;
  }
}
#basicSlider { position: relative; }

#basicSlider .MS-content {
  white-space: nowrap;
  overflow: hidden;
  margin: 0 2%;
  height: 50px;
}

#basicSlider .MS-content .item {
  display: inline-block;
  width: 20%;
  position: relative;
  vertical-align: top;
  overflow: hidden;
  height: 100%;
  white-space: normal;
  line-height: 50px;
  vertical-align: middle;
}
.carousil{
    background-color:#00000099;
    /* opacity: 0.6; */
    margin-left: -14px !important;
    padding-top: 20px;

}
@media (max-width: 991px) {

#basicSlider .MS-content .item { width: 25%; }
}
@media (max-width: 767px) {

#basicSlider .MS-content .item { width: 35%; }
}
@media (max-width: 500px) {

#basicSlider .MS-content .item { width: 50%; }
}

#basicSlider .MS-content .item a {
  line-height: 50px;
  vertical-align: middle;
}

#basicSlider .MS-controls button { position: absolute; }

#basicSlider .MS-controls .MS-left {
  top: 35px;
  left: 10px;
}

#basicSlider .MS-controls .MS-right {
  top: 35px;
  right: 10px;
}
</style>
<div class="container-fulid con">
  <img src="{{asset('images/home1.png')}}" alt="Snow" style="width:100%;">
  <div class="centered"><h1>Najlepsi wróżbici</h1>
    <p>w Polsce czekają na Ciebie</p>
    <a  href="#section1" class="btn btn-info" style="border-radius:30px;background-color:#BA2DCE;border:1px solid #BA2DCE;">Wiecej o nas</a>

  </div>
</div>

<div class="container-fulid con2">
    <div class="row" style="margin-left:0px;margin-right:0px;">
        <div class="col-md-6">
            <img src="{{asset('images/home4.png')}}" alt="Snow" width="100%;">
        </div>
        <div class="col-md-6" id="section1">
            <h1 style="margin-top:30%;font-size: 70px;">Kim jesteśmy?</h1>
            <p class="mt-2" style="width:74%;">Jeżeli chcesz poznać swoją przyszłość, lub męczą i nurtują Cię pytania, to  dobrze trafiłeś. Jesteśmy tutaj, aby Ci pomóc. Zajmujemy się numerologią, kartami tarota, jasnowidzeniem, wróżeniem oraz rytuałami. Skorzystaj z naszej pomocy i pozbądź się trosk.</p>
            <a href="{{url('/register')}}" class="btn btn-info mt-4" style="border-radius:30px;background-color:#BA2DCE;border:1px solid
            #BA2DCE;">Zarejestruj się</a>



        </div>
    </div>
    <div class="container">
        <div class="row" style="margin-left:0px;margin-right:0px;">
            <div class="col-md-12 mt-5 mb-5">
                <center><h1 style="font-size:70px;">Wybierz swój znak zodiaku</h1></center>

            </div>
            <div class="col-md-2">
                <img src="{{asset('images/l1.png')}}" alt="Snow" width="100%;">
                <h5 style="text-align: center;">Baran</h5>

            </div>
            <div class="col-md-2">
                <img src="{{asset('images/l2.png')}}" alt="Snow" width="100%;">
                <h5 style="text-align: center;">Byk</h5>

            </div>
            <div class="col-md-2">
                <img src="{{asset('images/l3.png')}}" alt="Snow" width="100%;">
                <h5 style="text-align: center;">Bliźnięta</h5>

            </div>
            <div class="col-md-2">
                <img src="{{asset('images/l4.png')}}" alt="Snow" width="100%;">
                <h5 style="text-align: center;">Rak</h5>

            </div>
            <div class="col-md-2">
                <img src="{{asset('images/l5.png')}}" alt="Snow" width="100%;">
                <h5 style="text-align: center;">Lew</h5>

            </div>
            <div class="col-md-2">
                <img src="{{asset('images/l6.png')}}" alt="Snow" width="100%;">
                <h5 style="text-align: center;">Ryby</h5>
            </div>
            <div class="col-md-2">
                <img src="{{asset('images/l7.png')}}" alt="Snow" width="100%;">
                <h5 style="text-align: center;">Waga</h5>
            </div>
            <div class="col-md-2">
                <img src="{{asset('images/l8.png')}}" alt="Snow" width="100%;">
                <h5 style="text-align: center;">Skorpion</h5>
            </div>
            <div class="col-md-2">
                <img src="{{asset('images/l9.png')}}" alt="Snow" width="100%;">
                <h5 style="text-align: center;">Strzelec</h5>
            </div>
            <div class="col-md-2">
                <img src="{{asset('images/l10.png')}}" alt="Snow" width="100%;">
                <h5 style="text-align: center;">Koziorożec</h5>
            </div>
            <div class="col-md-2">
                <img src="{{asset('images/l11.png')}}" alt="Snow" width="100%;">
                <h5 style="text-align: center;">Wodnik</h5>
            </div>
            <div class="col-md-2">
                <img src="{{asset('images/l12.png')}}" alt="Snow" width="100%;">
                <h5 style="text-align: center;">Ryby</h5>
            </div>

        </div>
        <div class="row" style="padding-top: 50px">
            <div class="col-md-4">
                <img src="{{asset('images/slide1.png')}}" width="100%">
            </div>
            <div class="col-md-8 carousil">
                <h5>Co robimy?</h5>
                <h2>Pozwól sobie pomóc</h2><br>
                <div id="mixedSlider" class="ms-HOVER">
                    <div class="MS-content">
                        <div class="item">
                            <div class="imgTitle" style="padding-bottom:20px;">

                                <img src="{{asset('images/slide1.png')}}" alt="" style="height: 250px;">
                            </div>
                           <h5>Uroki I rytuały</h5>
                        </div>
                        <div class="item">
                            <div class="imgTitle" style="padding-bottom:20px;">

                                <img src="{{asset('images/slide1.png')}}" alt="" style="height: 250px;">
                            </div>
                           <h5>Uroki I rytuały</h5>
                        </div>
                        <div class="item">
                            <div class="imgTitle" style="padding-bottom:20px;">

                                <img src="{{asset('images/slide1.png')}}" alt="" style="height: 250px;">
                            </div>
                           <h5>Uroki I rytuały</h5>
                        </div>


                      </div>
                    <div class="MS-controls">
                        <button class="MS-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                        <button class="MS-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1 class="pb-5 pt-5"><center>Opinie o nas</center></h1>
    <div class="container pb-5">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-caption">
                    <img src="{{asset('images/slide2.png')}}">
                    <p>Wróżka Joasia bardzo nam pomogła. Jej wozba, a następnie rytuał na poprawę naszej relacji były doskonałe. Teraz jesteśmy parą, która szczerze się kocha i oczekujemy dziecka. Polecamy gorąco!Kasia i Paweł</p>

                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-caption">
                    <img src="{{asset('images/slide3.png')}}" class="img-fluid">
                    <p>Wróżka Joasia bardzo nam pomogła. Jej wozba, a następnie rytuał na poprawę naszej relacji były doskonałe. Teraz jesteśmy parą, która szczerze się kocha i oczekujemy dziecka. Polecamy gorąco!Kasia i Paweł</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-caption">
                    <img src="{{asset('images/slide4.png')}}" class="img-fluid">
                    <p>Wróżka Joasia bardzo nam pomogła. Jej wozba, a następnie rytuał na poprawę naszej relacji były doskonałe. Teraz jesteśmy parą, która szczerze się kocha i oczekujemy dziecka. Polecamy gorąco!Kasia i Paweł</p>

                </div>
            </div>
        </div>
        <div class="row pb-5">
        <a href="#demo" data-slide="prev" style="margin-left:auto;"> <i class='fas fa-arrow-left i'></i> </a> <a  href="#demo" data-slide="next" style="margin-right:auto;"> <i class='fas fa-arrow-right i2'></i> </a>
        </div>


    </div>
    <div class="row">
        <img src="{{asset('images/slide5.png')}}" style="margin: auto;"></div>
</div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="{{asset('js/multislider.js')}}"></script>
<script>
$('#basicSlider').multislider({
			continuous: true,
			duration: 2000
		});
		$('#mixedSlider').multislider({
			duration: 750,
			interval: 3000
		});
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>

@endsection


