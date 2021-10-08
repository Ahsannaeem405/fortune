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
                      <input id="email" type="email" class="input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Address e-mail">
                      <br>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      
                    </div>
                    <div class="form-group ">
                      <input id="password-confirm" type="date" class="input form-control date" name="dob" required autocomplete="new-password" placeholder="Data urodzenia">
                      
                    </div>
                    <div class="form-group d-m">
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
                           <a href="{{ url('auth/google') }}">
                                  
                          <button type="submit" class="form-control google"><img src="{{ asset('images/g_logo.png')}}" style="width: 25px"><span style="font-size: 12px;"> Logowanie Google</span></button></a>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                          <button type="submit" class="submit form-control login">Zatoz konto</button>
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
