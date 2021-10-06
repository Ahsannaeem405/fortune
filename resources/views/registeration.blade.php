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
</style>


@section('body')

<section class="ftco-section" style="background-image:url( {{ asset('images/Resgistration.png')}})">
    <div class="container">
        <div class="row justify-content-center">

        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="login-wrap p-4 p-md-5">

              <h4 class="text-center mb-4" style="color: white">Załóż konto i odbierz wróżbę</h4>
                    <form action="#" class="login-form">
                  <div class="form-group">
                      <input type="text" class="form-control input " placeholder="Podaj login" required>
                  </div>
            <div class="form-group d-flex">
              <input type="password" class="form-control input" placeholder="Podaj hasło" required>
            </div>
            <div class="form-group d-flex">
                <input type="text" class="form-control input" placeholder="Powtórz hasło" required>
              </div>
              <div class="form-group d-flex">
                <input type="email" class="form-control input" placeholder="Address e-mail" required>
              </div>
              <div class="form-group d-flex">
                <input type="text" class="form-control input" placeholder="Data urodzenia" required>
              </div>


            <div class="form-group d-md-flex">
                <label>

                    <input type="checkbox">
                    <span style="color: gray;font-size: 14px;">Akceptuję postanowienia cennika oraz regulaminu</span>
                  </label>
            </div>
          <div class="row">
              <div class="col-md-6">
                <button type="submit" class="form-control  facebook"><i class="fab fa-facebook-f"></i> Użyj Faceboka</button>
              </div>
              <div class="col-md-6">
                <button type="submit" class="form-control google"><i class="fab fa-google"></i> Logowanie Google</button>
              </div>
          </div><br>
          <div class="row">
              <div class="col-md-12">
                <button type="submit" class="form-control login">Zatoz konto</button>
              </div>

          </div>
          </form>

        </div>
            </div>
        </div>
    </div>
</section>

@endsection
