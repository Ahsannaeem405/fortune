@extends('layouts.header')


@section('body')
<style type="text/css">
.con {
  position: relative;
  text-align: center;
  color: white;
  
}

.centered {
  position: absolute;
  top: 35%;
  left: 10%;
  text-align: left;

}
.con2 {
  background-image: url("{{asset('images/back1.png')}}");
  color: white;
}


#demo {
/*    background: linear-gradient(112deg, #ffffff 50%, antiquewhite 50%);
*/
background-color: #1d1d1d;   
 max-width: 900px;
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
</style>
<div class="container-fulid con">
  <img src="{{asset('images/home1.png')}}" alt="Snow" style="width:100%;">
  <div class="centered"><h1>Najlepsi wróżbici</h1><br>
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
    		<h1 style="margin-top:30%;font-size: 70px;padding-left:4%;">Kim jesteśmy?</h1>
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
	    		
	    	</div>
	    	<div class="col-md-2">
	    		<img src="{{asset('images/l2.png')}}" alt="Snow" width="100%;">
	    		
	    	</div>
	    	<div class="col-md-2">
	    		<img src="{{asset('images/l3.png')}}" alt="Snow" width="100%;">
	    	</div>
	    	<div class="col-md-2">
	    		<img src="{{asset('images/l4.png')}}" alt="Snow" width="100%;">
	    	</div>
	    	<div class="col-md-2">
	    		<img src="{{asset('images/l5.png')}}" alt="Snow" width="100%;">
	    	</div>
	    	<div class="col-md-2">
	    		<img src="{{asset('images/l6.png')}}" alt="Snow" width="100%;">
	    	</div>
	    	<div class="col-md-2">
	    		<img src="{{asset('images/l7.png')}}" alt="Snow" width="100%;">
	    	</div>
	    	<div class="col-md-2">
	    		<img src="{{asset('images/l8.png')}}" alt="Snow" width="100%;">
	    	</div>
	    	<div class="col-md-2">
	    		<img src="{{asset('images/l9.png')}}" alt="Snow" width="100%;">
	    	</div>
	    	<div class="col-md-2">
	    		<img src="{{asset('images/l10.png')}}" alt="Snow" width="100%;">
	    	</div>
	    	<div class="col-md-2">
	    		<img src="{{asset('images/l11.png')}}" alt="Snow" width="100%;">
	    	</div>
	    	<div class="col-md-2">
	    		<img src="{{asset('images/l12.png')}}" alt="Snow" width="100%;">
	    	</div>
	    	
	    </div>
	    <div class="row">
	    	<div class="col-md-4">
	    		<img src="{{asset('images/slide1.png')}}" width="100%">
	    	</div>
	    	<div class="col-md-8"></div>
	    </div>
	</div> 
	<h1 class="mb-4"><center>Opinie o nas</center></h1>
	<div class="container pb-5">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-caption">
                	<img src="{{asset('images/slide2.png')}}">
                    <p>If Shai Reznik's TDD videos don't convince you to add automated testing your code, I don't know what will.This was the very best explanation of frameworks for brginners that I've ever seen. </p> 
                    
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-caption">
                	<img src="{{asset('images/slide3.png')}}" class="img-fluid">
                    <p>If Shai Reznik's TDD videos don't convince you to add automated testing your code, I don't know what will.This was the very best explanation of frameworks for brginners that I've ever seen.</p> 
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-caption">
                	<img src="{{asset('images/slide4.png')}}" class="img-fluid">
                    <p>If Shai Reznik's TDD videos don't convince you to add automated testing your code, I don't know what will.This was the very best explanation of frameworks for brginners that I've ever seen.</p> 
                    
                </div>
            </div>
        </div>
        <div class="row pb-5">
        <a href="#demo" data-slide="prev" style="margin-left:auto;"> <i class='fas fa-arrow-left i'></i> </a> <a  href="#demo" data-slide="next" style="margin-right:auto;"> <i class='fas fa-arrow-right i2'></i> </a>	
        </div>
        
    </div>
</div>   
</div>

@endsection


