@extends('layouts.header')
<link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
<style>

    .input{
        border-radius: 5px !important;
        padding: 25px !important;
        color: white !important;
        border:1px solid white !important;
        font-size: 25px !important;
    }
    .span1{
        color: white;

        font-weight: bold;

    }
    .centerspan{
        color: grey;
        font-weight: normal !important;
    }
    .active{
      background-color: #c42fd5!important;
      border:1px solid #c42fd5!important;
    }
    .btn-link{
      width: 100%;
      text-align:left !important;
      color: #ffffff!important;
      
    }
    .btn-link i{
      float: right;
    }
    .card{
      background-color: #1d1d1d!important;
      border:1px solid #1d1d1d!important;
      color: #ffffff!important;
    }
    .card-body{
      background-color: #1d1d1d;
      border:1px solid #1d1d1d;
      color: #ffffff!important;
    }
    @media only screen and (max-width: 425px){
	/*Small smartphones [325px -> 425px]*/
    .google{
        margin-top: 15px;
    }
}
@media only screen and (max-width: 1024px){
	/*Small smartphones [325px -> 425px]*/
    .facebook{
        font-size: 13px !important;
    }
}
</style>


@section('body')

<section class="ftco-section" style="background-image:url( {{ asset('images/back3.png')}})">
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12" >
              <h1 style="color: white;text-align: center;">Wybierz ile chcesz punktów</h1>
              <p style="color: white;text-align: center;font-size: 1.5rem;">A następnie porozmawiaj z naszymi ekspertami</p>
            </div>
            <div class="col-md-7 col-lg-5">
                <div class=" p-4 p-md-5 mt-5">

                  
                  <form method="POST" action="{{ route('register') }}" name="myForm" class="login-form"> 
                    @csrf
                   
                    <div class="form-group">
                      
                        <input id="name" type="text" class="input active form-control " value="3 punkty za 7,99 zł" readonly="" >
                    </div>
                    <div class="form-group ">
                      <input id="name" type="text" class="input form-control " value="5 punkty za 12,99 zł" readonly="" >
                     
                    </div>
                     <div class="form-group ">
                      <input id="name" type="text" class="input form-control " value="10 punkty za 24,99 zł" readonly="" >
                     
                    </div>
                     <div class="form-group ">
                      <input id="name" type="text" class="input form-control " value="15 punkty za 38,99 zł" readonly="" >
                     
                    </div>
                     <div class="form-group ">
                      <input id="name" type="text" class="input form-control " value="25 punkty za 61,99 zł" readonly="" >
                     
                    </div>
                     <div class="form-group ">
                      <input id="name" type="text" class="input form-control " value="50 punkty za 127,99 zł" readonly="" >
                     
                    </div>
                     <div class="form-group ">
                      <input id="name" type="text" class="input form-control " value="100 punkty za 229,99 zł" readonly="" >
                     
                    </div>
                    
                  </form>
                </div>
                <div class="row">
                        <div class="col-md-12">
                          <button type="submit" class="submit btn  form-control login"> Doładuj punkty</button>
                        </div>
                </div>
                <div class="row mt-5">
                  <div class="col-md-6">
                   <img src="{{ asset('images/p1.png')}}" width="100%">
                  </div>
                  <div class="col-md-6">
                    <img src="{{ asset('images/p2.png')}}" width="100%">
                  </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-5">
        <div class="row justify-content-center">

        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12 pb-5">
              <h1 style="color: white;text-align: center;">Najczęstsze pytania</h1>
             
            </div>
            <div class="col-lg-10">
              <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Jak mogę zapłacić?
                        <i class="fas fa-angle-down"></i>

                      </button>
                    </h5>
                  </div>

                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Akceptowane sposoby płatności?
                        <i class="fas fa-angle-down"></i>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      Akceptujemy płatności za pomocą szybkich przelewów internetowych, kodami BLIK oraz za pomocą płatnośći na poczcie.Jeżeli masz jakiekolwiek pytania, skontaktuj się z nami mailowo, a na pewno Ci pomożemy.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Czy to bezpieczne?
                        <i class="fas fa-angle-down"></i>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
              </div>
                

                  
                  
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
 
    $(document).ready(function(){
      $(".input").click(function() {
        $(".input").removeClass("active");
        $(this).addClass("active");
      });
           
    });
  </script>

@endsection
