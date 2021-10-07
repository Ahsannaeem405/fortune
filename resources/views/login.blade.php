@extends('layouts.header')
<link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
<style>
    .input{
        border-radius: 50px !important;
        padding: 25px !important;
    }
    .span1{
        color: white;

        font-weight: bold;

    }
    .centerspan{
        color: grey;
        font-weight: normal !important;
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

<section class="ftco-section" style="background-image:url( {{ asset('images/Login.png')}})">
    <div class="container">
        <div class="row justify-content-center">

        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="login-wrap p-4 p-md-5">

              <h3 class="text-center mb-4" style="color: white">Logowanie</h3>
                    <form action="#" class="login-form">
                  <div class="form-group">
                      <input type="text" class="form-control input " placeholder="Address e-mail" required>
                  </div>
            <div class="form-group d-flex">
              <input type="password" class="form-control input" placeholder="Hasto" required>
            </div>

            <div class="form-group d-md-flex">

                            <div class="w-50 text-md-right">
                                <a href="#" style="color: white">Nie pamiętasz hasła?
                                </a>
                            </div>

            </div>
          <div class="row">
              <div class="col-md-6">
                <button type="submit" class="form-control  facebook"><i class="fab fa-facebook-f"></i> Użyj Faceboka</button>
              </div>
              <div class="col-md-6">
                <button type="submit" class="form-control google"><img src="{{ asset('images/g_logo.png')}}" style="width: 25px"><span style="font-size: 12px;"> Logowanie Google</span></button>
              </div>
          </div><br>
          <div class="row">
              <div class="col-md-12">
                <button type="submit" class="form-control login">Zaloguj się</button>
              </div>

          </div>
          </form>
          <center class="span1"><span class="centerspan">Chcesz</span> założyć konto?</center>
        </div>
            </div>
        </div>
    </div>
</section>

@endsection
