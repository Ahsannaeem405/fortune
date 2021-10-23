@extends('../layouts.header')
<link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
<style>
    .input{
        border-radius: 50px !important;
        padding:25px !important;
        color:white!important;
    }
    .span1{
        color: white;

        font-weight: bold;

    }
    .centerspan{
        color: grey;
        font-weight: normal !important;
    }
    .google_text{
        font-size: 12px;
    }
    .a_tag1{
        color: gray;
    }
    .a_tag1:hover{
        color: purple;
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
    .google_text{
        font-size: 8px;
    }
    .fb_text{
        font-size: 10px;

    }
}
@media only screen and (max-width: 425px){
    .google_text{
        font-size: 15px;
    }
    .fb_text{
        font-size: 15px;

    }
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
                  <form method="POST" action="{{ route('register') }}" name="myForm" class="login-form">
                    @csrf

                    <div class="form-group">

                        <input id="name" type="text" class="input form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Podaj login">
                        @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                    </div>
                    <div class="form-group ">
                      <input id="password" type="password" class="input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Podaj hasło">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror

                    </div>
                    <div class="form-group ">
                      <input id="password-confirm" type="password" class="form-control input" name="password_confirmation" required autocomplete="new-password" placeholder="Powtórz hasło">

                    </div>
                    <div class="form-group ">
                      <input id="email" type="email" class="input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">
                      <br>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                    </div>
                    <div class="form-group" style="margin-top: -26px;">
                        <input placeholder="Data urodzenia" class="textbox-n input form-control date"  name="dob" type="text" onfocus="(this.type='date')" id="date">







                    </div>
                    <div class="form-group d-m">
                        <label>

                            <input type="checkbox" name="checkbox">
                            <span style="color: gray;font-size: 11px;">Akceptuję postanowienia <a href="{{url('/policy')}}" class="a_tag1">politykę prywatności</a> oraz <a href="{{url('/terms')}}" class="a_tag1" >regulaminu</a> </span>
                          </label>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <a href="{{ url('auth/facebook') }}">
                          <button type="button" class="form-control  facebook"><i class="fab fa-facebook-f" style="font-size: 20px;"></i><span class="fb_text"> Użyj Faceboka</span></button></a>
                        </div>
                        <div class="col-md-6">
                           <a href="{{ url('auth/google') }}">

                          <button type="button" class="form-control google"><img src="{{ asset('images/g_logo.png')}}" style="width: 25px"><span class="google_text"> Logowanie Google</span></button></a>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                          <button type="button" class="submit form-control login">Załóż konto </button>
                        </div>

                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $('.submit').on('click',function(){
        if(!this.form.checkbox.checked)
{
    alert('You must agree to the terms and conditions first.');
    return false;
}

        var enteredDate=$('.date').val();
        var utc = new Date().toJSON().slice(0,10).replace(/-/g,'-');



  var years = new Date(new Date() - new Date(enteredDate)).getFullYear() - 1970;


    if(years >= 18)
    {

        document.forms["myForm"].submit();


    }
    else{
        alert('Sorry You are under 18');
    }



    })


</script>



@endsection
