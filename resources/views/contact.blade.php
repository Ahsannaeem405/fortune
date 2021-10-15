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

<section class="ftco-section" style="background-image:url( {{ asset('images/Login.png')}})">
    <div class="container">
        <div class="row justify-content-center">

        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-7">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif
                <div class="login-wrap p-4 p-md-5">

              <h3 class=" mb-4" style="color: white">Masz pytania?</h3>
                    <form action="{{url('/addmessage')}}" class="login-form" method="POST">
                        @csrf
                        @if (Auth::user())
                        <div class="form-group">
                            <input type="text" class="form-control input " name="name" value="{{Auth::user()->name}}" placeholder="Imię" style="background-color: #333333;" required>
                        </div>
                  <div class="form-group d-flex">
                    <input type="email" class="form-control input" name="email" value="{{Auth::user()->email}}" placeholder="Adres e-mail" required>
                  </div>
                  @else
                  <div class="form-group">
                    <input type="text" class="form-control input " name="name" placeholder="Imię" style="background-color: #333333;" required>
                </div>
          <div class="form-group d-flex">
            <input type="email" class="form-control input" name="email" placeholder="Adres e-mail" required>
          </div>
                        @endif

            <div class="form-group d-flex">
                <input type="text" class="form-control input" name="topic" placeholder="Temat" required>
              </div>
            <div class="form-group d-flex">
             <textarea name="message" id=""  rows="1" class="form-control input" name="message" placeholder="Wiadomośc" style="border-radius: 15px !important"></textarea>
              </div>



          <div class="row">
              <div class="col-md-4">
                <button type="submit" class="form-control login">Wyślij</button>
              </div>

          </div>
          </form>

        </div>
            </div>
        </div>
    </div>
</section>

@endsection
