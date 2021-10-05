@extends('layouts.header')
<link rel="stylesheet" href="{{asset('assets/css/login.css')}}">



@section('body')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">

        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="login-wrap p-4 p-md-5">

              <h3 class="text-center mb-4" style="color: white">Logowanie</h3>
                    <form action="#" class="login-form">
                  <div class="form-group">
                      <input type="text" class="form-control input " placeholder="Username" required>
                  </div>
            <div class="form-group d-flex">
              <input type="password" class="form-control input" placeholder="Password" required>
            </div>

            <div class="form-group d-md-flex">

                            <div class="w-50 text-md-right">
                                <a href="#" style="color: white">Nie pamiętasz hasła?
                                </a>
                            </div>
            </div>
          <div class="row">
              <div class="col-md-6">
                <button type="submit" class="form-control  facebook">Użyj Faceboka</button>
              </div>
              <div class="col-md-6">
                <button type="submit" class="form-control google">Logowanie Google</button>
              </div>
          </div><br>
          <div class="row">
              <div class="col-md-12">
                <button type="submit" class="form-control login">Zaloguj się</button>
              </div>

          </div>
          </form>
        </div>
            </div>
        </div>
    </div>
</section>

@endsection
