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
      .profile{
          background-color: #C42FD5;
          color: white;
          border-radius: 40px;
    padding: 0px !important;
    text-align: center;
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
    .point{
        width: 27%;
        margin-left: 79px;
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
    line-height: 45px;
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
.logoutbtn{
    color: white;
}
.logoutbtn:hover{
background-color: transparent !important;
color:#C42FD5;
}
.dropdown_logout{
    margin-left: -20px !important;
}
.badge{
    width: 100%;
}
/* dropdown */
.dropbtn {
  color: white;
  background-color: transparent;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: transparent;
}

.dropdown {
  position: relative;
  display: inline-block;
  margin-top: -7px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.a_tag{
    color: white;
    text-align: center;
    font-size: 17px;

}
.a_tag:hover{
    color: #C42FD5;
    text-decoration: none;
    background: none;
}
.point{
    background-color: #C42FD5;
    border-radius: 20px;
    /* padding: 3px; */
    padding-left: 9px;
    padding-right: 9px;
    text-align: center !important;
}
.point span{

}
/* .dropdown a:hover {background-color: #ddd;} */

.show {display: block;}
.myDropdown{
    padding: 0px !important;
}
.li_item{
    background-color: #C42FD5;
    color: white;
    padding: 6px;
    border-radius: 40px;
    padding-right: 20px;
    padding-left: 21px;
}
@media only screen and (max-width: 768px){
.logout_item{
    display: block !important;
}
.dots{
    display: none !important;
}
.dot_button{
    margin: 8px !important;
}
.point{
    width: 24%;
    /* margin-right: 29px; */
    margin-left: 86px;
}



}
@media only screen and (min-width: 769px){
.logout_item{
    display: none !important;

}
.dots{
    display: block !important;
}
.li_item{
    display: none;
}
.profile{
    display: none;
}

}


  </style>
  <body>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{url('/user')}}"><img src="{{asset('images/logo2.png')}}" alt="" style="width:100%;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="text-align: right;">
          <div class="navbar-nav" style="margin-left:auto; ">
            @if (Auth::user())
            <ul class="navbar-nav ml-auto loginhome ">
                <li class="nav-item">
                   <a href="{{url('/user')}}"> <i class="fas fa-home" style="color: white"></i></a>

                </li>
                <li class="nav-item">
                    <a href="{{url('/user/chat')}}">
                    <i class="far fa-envelope" style="color: white"></i>
                </a>
                </li>
                <li class="nav-item" style="color: white;">
                    <div class="point">
                        @if (Auth::user()->point!=null)
                      <a href="{{url('/user/points')}}"><span>{{Auth::user()->point}}</span></a>
    @else
    <a href="{{url('/user/points')}}" style="color: white;text-decoration:none;"> <span>0</span></a>
                        @endif
                    </div>

                </li>
                <li class="nav-item profile">
                    <a href="{{url('/user/profile')}}" class="a_tag">
                        Mój profil</a>
                </li>
                <li class="nav-item logout_item">
                    <span class="badge" style="border-radius: 200px;background-color:#BA2DCE;color:white;"><a class="dropdown-item logoutbtn" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Wyloguj') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></span>


                </li>

                <li class="nav-item dots">
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn"><i class="fas fa-ellipsis-v" style="color: white"></i></button>

                        <div id="myDropdown" class="dropdown-content dropdown_logout">
                            <a href="{{url('/user/profile')}}" class="a_tag">
                                Mój profil</a>

                            <span class="badge" ><a class="dropdown-item logoutbtn" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Wyloguj') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form></span>


                        </div>
                      </div>

                </li>


            </ul>
            @else
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item">
                    <a href="{{url('login')}}"> <button class="btn btn-nav my-2 my-sm-0">Zaloguj się</button></a>
              </li>
              <li class="nav-item">
                <a href="{{url('register')}}">
                <button class="btn btn-nav my-2 my-sm-0 dot_button" type="button">Zarejestruj się</button></a>
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
                      <a href="{{url('/login')}}">LOGOWANIE</a>
                    </li>
                    <li>
                      <a href="{{url('/register')}}">REJESTRACJA</a>
                    </li>
                    <li>
                      <a href="{{url('/terms')}}">REGULAMIN</a>
                    </li>
                    <li>
                        <a href="{{url('/policy')}}">PRYWATNOŚĆ</a>
                      </li>

                    <li>
                      <a href="{{url('/user/points')}}">CENNIK</a>
                    </li>
                    <li>
                        <a href="{{url('/user/contact')}}">RONTART</a>
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
                      <a href="#"><i class="far fa-envelope-open"></i><span style="font-size: 10px;"> Napisz do nas</span> <br></a>
                    </li>
                    <li>
                        <a href="#!">&nbsp; &nbsp; info@powrozmi.pl</a>
                      </li>

                  </ul>

                </div>
                <!-- Grid column -->
                <div class="col-md-12 pb-4" style="padding-top: 10px; padding-left:80px;border-top: 1px solid lightgray;">
                    <p style="color: white;">
                    Powrozmi.pl © 2021 | All rights reserved.</p>

                </div>




              </div>


            </div>

            <!-- Footer Links -->

            <!-- Copyright -->

            <!-- Copyright -->

        </footer>
      </div>

  <!-- Footer -->

  <script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
    </script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>



  </body>
</html>
@show

