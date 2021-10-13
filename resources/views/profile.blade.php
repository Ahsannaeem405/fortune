@extends('../layouts.header')
<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
<style>
    .input {
        border-radius: 50px !important;
        padding: 25px !important;
        color: white !important;
    }

    .span1 {
        color: white;

        font-weight: bold;

    }

    .centerspan {
        color: grey;
        font-weight: normal !important;
    }

    /* switch css */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    .del {
        color: purple !important;
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    @media only screen and (max-width: 425px) {

        /*Small smartphones [325px -> 425px]*/
        .google {
            margin-top: 15px;
        }
    }

    @media only screen and (max-width: 1024px) {

        /*Small smartphones [325px -> 425px]*/
        .facebook {
            font-size: 13px !important;
        }
    }

</style>


@section('body')

    <section class="ftco-section" style="background-image:url( {{ asset('images/Login.png') }})">

        <div class="container">
            <div class="row justify-content-center">

            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        {{dd($user)}}

                        <h3 class="text-center mb-4" style="color: white">Profileeeee</h3>
                        <form method="POST" action="{{ url('/user/updateprofile') }}" class="login-form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">

                                <input type="file" name="file" id="fileElem" multiple accept="image/*" style="color: white">
                            </div>

                            <div class="form-group">
                                <label style="color: white;">Email</label>
                                <input type="text" class="form-control input " placeholder="Address e-mail"
                                    value="{{ $user->email }}" id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label style="color: white;">Imię</label>
                                <input type="text" class="form-control input " placeholder="Imię"
                                    value="{{ $user->f_name }}" class="form-control " name="f_name" autofocus>

                            </div>
                            <div class="form-group">
                                <label style="color: white;">Nazwisko</label>
                                <input type="text" class="form-control input " placeholder="Nazwisko"
                                    value="{{ $user->l_name }}" class="form-control " name="l_name" autofocus>

                            </div>
                            @if ($user->facebook_id == null)
                                <div class="form-group">
                                    <label style="color: white;">Aktualne hasło</label>
                                    <input type="password" class="form-control input" placeholder="Aktualne hasło"
                                        class="form-control @error('password') is-invalid @enderror" name="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label style="color: white;">nowe hasło</label>
                                    <input type="password" class="form-control input" placeholder="nowe hasło"
                                        class="form-control @error('password') is-invalid @enderror" name="new_password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label style="color: white;">Potwierdź hasło</label>
                                    <input type="password" class="form-control input" placeholder="Potwierdź hasło"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="confirm_password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif
                            @if ($user->google_id == null)
                                <div class="form-group">
                                    <label style="color: white;">goggle</label>
                                    <input type="password" class="form-control input" placeholder="Aktualne hasło"
                                        class="form-control @error('password') is-invalid @enderror" name="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label style="color: white;">nowe hasło</label>
                                    <input type="password" class="form-control input" placeholder="nowe hasło"
                                        class="form-control @error('password') is-invalid @enderror" name="new_password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label style="color: white;">Potwierdź hasło</label>
                                    <input type="password" class="form-control input" placeholder="Potwierdź hasło"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="confirm_password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif


                            <div class="form-group">
                                <label style="color: white;">Numer telefonu</label>
                                <input type="text" class="form-control input " placeholder="Numer telefonu"
                                    value="{{ $user->phone }}" class="form-control " name="phone" autofocus>

                            </div>
                            <div class="form-group">
                                <label style="color: white;">Wiek</label>
                                <input type="text" class="form-control input " placeholder="Wiek"
                                    value="{{ $age }}" class="form-control " readonly autofocus>

                            </div>
                            <div class="form-group">
                                <label style="color: white;">Wołacz</label>
                                <input type="text" class="form-control input " placeholder="Wołacz"
                                    value="{{ $user->vocative }}" class="form-control " name="vocative" autofocus>

                            </div>
                            <div class="form-group">
                                <label style="color: white;">Imię Miłości</label>
                                <input type="text" class="form-control input " placeholder="Imię Miłości"
                                    value="{{ $user->nameoflove }}" class="form-control " name="nameoflove" autofocus>

                            </div>
                            <div class="form-group">
                                <label style="color: white;">Miasto</label>
                                <input type="text" class="form-control input " placeholder="Miasto"
                                    value="{{ $user->city }}" class="form-control " name="city" autofocus>

                            </div>
                            <div class="form-group">
                                <label style="color: white;">Notyfikacja</label><br>

                                <label class="switch">
                                    <input type="checkbox" value="1" name="notification" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label style="color: white;">Bio</label>
                                <textarea name="bio" id="" class="form-control input"
                                    rows="2">{{ $user->bio }}</textarea>

                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="form-control login">Zaloguj się</button>
                                </div>

                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-12 " style="text-align: center">
                                <a href="{{ url('user/delete', $user->id) }}" class="del">Usuń konto</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
