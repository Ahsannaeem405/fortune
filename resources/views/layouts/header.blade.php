@section("head")
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">



    <title>Fortune</title>
  </head>
  <style>
      .bg-light{
          background-color: #1D1D1D !important;
          padding:15px;
          padding-right: 110px;
      }
      .btn-nav{
          background-color:#C42FD5;
          margin: 10px;
          border-radius: 50px;
          padding-top: 1px;
          padding-bottom: 1px;
          color: white;
          font-weight: bold;


      }
      .btn-nav:hover{
          background-color: purple;
          color: white;
      }
      .navbar-brand{
        padding-left: 70px;
      }
      .navbar-toggler-icon{
          background-color: white;
          border-radius: 5px;
      }
      .container-fluid{
          width: 100%;
          padding: 0px;
      }
      @media only screen and (max-width: 425px)
  {

    .navbar-brand{
        margin: 0px;
    padding: 0px;
    width: 134px !important;

    }
    .bg-light{
        padding-right: 0px !important;
    }
  }

/* footer css */
footer{
    background-color: #BA2DCE;
}
.font{
    color: white;
}
.list-unstyled{
    color: white;
}
.list-unstyled a{
    color: white;
}
.footer-copyright{
    color: white;
}
.footer-copyright{
    padding:200px;
}
hr{
    border: 1px solid white !important;
}
.img-text{
    margin-top: 10px;
}
#footer {
    position: relative;
   left:0px;
   bottom:0px;
   width:100%;
}
.loginhome li{
    padding: 10px;
    font-size: 20px;
}

  </style>
  <body>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="images/logo2.png" alt="" style="width:100%;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="text-align: right;">
          <div class="navbar-nav" style="margin-left:auto; ">
            @if (Auth::user())
            <ul class="navbar-nav ml-auto loginhome ">
                <li class="nav-item">
                    <i class="fas fa-home" style="color: white"></i>

                </li>
                <li class="nav-item">
                    <a href="{{url('/user/chat')}}">
                    <i class="far fa-envelope" style="color: white"></i>
                </a>
                </li>
                <li class="nav-item">
                    <span class="badge" style="border-radius: 200px;background-color:#BA2DCE;color:white;"><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>5</span>
                </li>

                <li class="nav-item">
                    <i class="fas fa-ellipsis-v" style="color: white"></i>
                </li>


            </ul>
            @else
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item">
                    <a href="{{url('login')}}"> <button class="btn btn-nav my-2 my-sm-0">Zaloguj się</button></a>
              </li>
              <li class="nav-item">
                <a href="{{url('register')}}">
                <button class="btn btn-nav my-2 my-sm-0" type="button">Zarejestruj się</button></a>
              </li>



              </ul>
            @endif


          </div>
        </div>
      </nav>


      </div>
@show
@yield('body')
@section("footer")


      <!-- Footer -->
      <div class="container-fluid"  >
        <footer class="page-footer font-small indigo " id="footer">

            <!-- Footer Links -->
            <div class="container text-center text-md-left ">

              <!-- Grid row -->
              <div class="row pt-5">

                <!-- Grid column -->
                <div class="col-md-3 col-12 mx-auto" style="text-align:left">

                  <!-- Links -->
                  <h5 class=" font mt-3 mb-4" >O nas</h5>
                  <hr>

                  <ul class="list-unstyled">
                    <li>
                        <img src="images/logo.png" alt="">

                     <p class="img-text">Najlepsze wróżby online dostępne

                        w sieci. Jeżeli szukasz ekspertów

                        od wrozby online, to jesteś w

                        idealnym miejscu. Pamiętaj, że Twoja pierwszza wróżba online

                        będzie darmowa!</p>
                    </li>

                  </ul>

                </div>
                <!-- Grid column -->



                <!-- Grid column -->
                <div class="col-md-3 col-6 mx-auto" style="text-align:left">

                  <!-- Links -->
                  <h5 class="font mt-3 mb-4" >Linki</h5>
                  <hr>

                  <ul class="list-unstyled">
                    <li>
                      <a href="#!">LOGOWANIE</a>
                    </li>
                    <li>
                      <a href="#!">REJESTRACJA</a>
                    </li>
                    <li>
                      <a href="#!">REGULAMIN</a>
                    </li>
                    <li>
                      <a href="#!">CENNIK</a>
                    </li>
                    <li>
                        <a href="#!">RONTART</a>
                      </li>
                  </ul>

                </div>
                <!-- Grid column -->


                <!-- Grid column -->
                <div class="col-md-3 col-6 mx-auto" style="text-align:left">

                  <!-- Links -->
                  <h5 class="font mt-3 mb-4">Konta kt</h5>
                  <hr>

                  <ul class="list-unstyled">
                    <li>
                      <a href="#"><i class="far fa-envelope-open"></i> Napisz do nas <br>

                       </a>
                    </li>
                    <li>
                        <a href="#!">&nbsp; &nbsp; info@powrozmi.pl</a>
                      </li>

                  </ul>

                </div>
                <!-- Grid column -->
                <div class="col-md-12 pb-4">
                    <center style="color: white;">
                    Powrozmi.pl © 2021 | All rights reserved.</center>

                </div>




              </div>


            </div>

            <!-- Footer Links -->

            <!-- Copyright -->

            <!-- Copyright -->

        </footer>
      </div>

  <!-- Footer -->


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>



  </body>
</html>
@show

