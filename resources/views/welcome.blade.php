@extends('layouts.header')


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
</style>
<div class="container-fulid con">
  <img src="{{asset('images/home1.png')}}" alt="Snow" style="width:100%;">
  <div class="centered"><h1>Najlepsi wróżbici</h1>
    <p>w Polsce czekają na Ciebie</p>
    <button class="btn btn-info" style="border-radius:30px;background-color:#BA2DCE;border:1px solid #BA2DCE;">Button</button>

  </div>
</div>

<div class="container-fulid con2">
    <div class="row" style="margin-left:0px;margin-right:0px;">
        <div class="col-md-6">
            <img src="{{asset('images/home4.png')}}" alt="Snow" width="100%;">
        </div>
        <div class="col-md-6">
            <h1 style="margin-top:30%;font-size: 70px;padding-left:1%;">Kim jesteśmy?</h1>
            <p class="mt-2" style="width:74%;">Jeżeli chcesz poznać swoją przyszłość, lub męczą i nurtują Cię pytania, to  dobrze trafiłeś. Jesteśmy tutaj, aby Ci pomóc. Zajmujemy się numerologią, kartami tarota, jasnowidzeniem, wróżeniem oraz rytuałami. Skorzystaj z naszej pomocy i pozbądź się trosk.</p>
            <button class="btn btn-info mt-4" style="padding-left:4%;border-radius:30px;background-color:#BA2DCE;border:1px solid
            #BA2DCE;">Zarejestruj się</button>



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
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('images/slide1.png')}}" width="100%">
            </div>
            <div class="col-md-8"></div>
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

@endsection


