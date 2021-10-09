<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <title>Chat</title>
  </head>
  <style>
      body{
          background-color: #1B1B1B;
          color: white;
      }
      .logo{
          width: 130px;
      }
      .profile{
        background-color: #2F2F2F;
        margin-top: 20px;
        text-align: center !important;
        border-radius: 20px;
      }
      .profile img{
        width: 100%;
    height: 101px;
    border-radius: 255px;


      }
      .profile p{
          font-size: 14px;
      }
      .image{
          border: 1px solid white;
          padding: 5px;
    border-radius: 200px;
    /* width: fit-content; */
    height: 113px;
    width: 111px;
    margin-left: auto;
    margin-right: auto;


      }
      .name{
          /* border-bottom: 1px solid grey; */
          padding-top: 20px;
      }
      .name b{
          color: purple;
      }
      .fa-smile{
          font-size:25px;
          color: purple;
          font-weight: bold;
      }
      .fa-chevron-down{
          font-size: 10px;
      }
      .contactlist{
          padding: 10px;
          display: flex;
      }
      .contact_image{
        border-radius: 200px;
    width: 50%;
    height: 50px;
      }
      .contact_image img{
          max-width: 50px;
      }
      .contact_name{
          padding-top: 18px;
          margin-left: -30px;
      }
      .circle{
          color: purple;
          text-align: center;
          padding-left: 40px;

    padding-top: 17px;
      }
      .listend{
        border-bottom: 1px solid grey;
        border-top: 1px solid grey;


      }
      .fa-circle{
          font-size: 10px;
      }
      .specific_chat{
        background-color: #2F2F2F;
        margin-top: 20px;
        text-align: center !important;
        border-radius: 20px;
        padding: 20px;
      }
      .message_sender{
          text-align:right;
          /* display: flex; */


      }
      .message p{
        display: inline-block;
        background-color: #C530D6;
        color: white;
        padding: 10px;
        border-radius: 16px;
      }
      .message img{
        display: inline-block;
        width: 7%;
      }
      .message .fa-caret-right{
        color: #C530D6;
      }
      .Send_btn{
          background-color: #C530D6;
          color: white;
          border: none;
          border-radius: 10px;
          padding: 5px;
          padding-right: 15px;
    padding-left: 15px;
      }

      .message_receiver{
          text-align: left;
      }
      .text{
          border: 1px solid gray;
          border-radius: 30px;
          border-right: none !important;
      }
      .input-group-text{
        border-left: none !important;
        border: 1px solid gray;
        background-color: white;
        border-top-right-radius: 20px !important;
        border-bottom-right-radius: 20px !important;



      }
      .message1 p{
        display: inline-block;
        background-color: white;
        color: black;
        padding: 10px;
        border-radius: 16px;
      }
      .message1 img{
        display: inline-block;
        width: 7%;
      }
      .message1 .fa-caret-left{
        color: white;
      }
      .message_type{
          background-color: white;
          padding: 5px;
          border-radius: 5px;
          align:bottom;
          position: absolute;
                bottom: 5px;
                width: 95%;

      }

      /* sidebar */
      .sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #2F2F2F;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}
.closebtn{
    z-index: 200;
}
.sidebar_row{
    padding: 10px;
}
.active{
    background-color: #2F2F2F !important;
    border-radius: 10px;
}
.specific_chat{
    overflow-y:scroll;
    height:590px;
}
@media only screen and (max-width: 768px){
	/*Big smartphones [426px -> 600px]*/
    .fullscreen{
        display: none;

    }
    .openbtn{
        display: block;
    }
    .contact_image{
        height: 40px;
    width: 38px !important;

    }
    .contact_name{
        margin-left: 20px;
    }

}
@media only screen and (min-width:769px){
	/*Big smartphones [426px -> 600px]*/
    .fullscreen{
        display: block;

    }
    .openbtn{
        display: none;
    }
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
@media only screen and (min-width:1024px){
.Send_btn{
    padding-right: 7px;
    padding-left: 6px;
}
}
@media only screen and (min-width:375px){
    .Send_btn{
        padding-right: 10px;
    padding-left: 9px;
    }
}
@media only screen and (min-width:320px){
    .Send_btn{
        padding-right: 2px;
    padding-left: 2px;
    }
}


  </style>
  <body>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <div class="row sidebar_row">
            <div class="col-10">

                <img src="{{asset('images/logo2.png')}}" alt="" class="logo">


            <div class="profile p-3">
                <div class="image">
                <img src="{{asset('images/slide1.png')}}" alt="">
                </div><br>
                <h5>BillBoard</h5>
                <p>Lorem ipsum dolor sit amet.</p>

            </div>
            <div class="row name">
                <div class="col-lg-8 col-8">
                    <h5>Rozmowy</h5>
                </div>
                <div class="col-lg-4 col-4">
                    <b>5 <i class="fas fa-chevron-down"></i></b>
                </div>


            </div>
            <div class="listend">
                <div class="contactlist active">
                    <div class="contact_image">
                        <img src="{{asset('images/slide1.png')}}" class="contact_image" alt="">
                    </div>
                    <div class="contact_name">
                        <p>Henry</p>
                    </div>
                    <div class="circle">
                        <i class="fas fa-circle"></i>
                    </div>
                </div>
                <div class="contactlist">
                    <div class="contact_image">
                        <img src="{{asset('images/slide1.png')}}" class="contact_image" alt="">
                    </div>
                    <div class="contact_name">
                        <p>Henry</p>
                    </div>
                    <div class="circle">
                        <i class="fas fa-circle"></i>
                    </div>
                </div>
                <div class="contactlist">
                    <div class="contact_image">
                        <img src="{{asset('images/slide1.png')}}" class="contact_image" alt="">
                    </div>
                    <div class="contact_name">
                        <p>Henry</p>
                    </div>
                    <div class="circle">
                        <i class="fas fa-circle"></i>
                    </div>
                </div>
            </div>


        </div>
        </div>

      </div>
      <div id="main">
        <button class="openbtn" onclick="openNav()">☰</button>
      </div>

      <div class="container p-5">
        <div class="row">
            <div class="col-lg-3 col-12 fullscreen">

                    <img src="{{asset('images/logo2.png')}}" alt="" class="logo">


                <div class="profile p-3">
                    <div class="image">
                    <img src="{{asset('images/slide1.png')}}" alt="">
                    </div><br>
                    <h5>BillBoard</h5>
                    <p>Lorem ipsum dolor sit amet.</p>

                </div>
                <div class="row name">
                    <div class="col-lg-8 col-8">
                        <h5>Rozmowy</h5>
                    </div>
                    <div class="col-lg-4 col-4">
                        <b>5 <i class="fas fa-chevron-down"></i></b>
                    </div>


                </div>
                <div class="listend">
                    <div class="contactlist active">
                        <div class="contact_image">
                            <img src="{{asset('images/slide1.png')}}" class="contact_image" alt="">
                        </div>
                        <div class="contact_name">
                            <p>Henry</p>
                        </div>
                        <div class="circle">
                            <i class="fas fa-circle"></i>
                        </div>
                    </div>
                    <div class="contactlist">
                        <div class="contact_image">
                            <img src="{{asset('images/slide1.png')}}" class="contact_image" alt="">
                        </div>
                        <div class="contact_name">
                            <p>Henry</p>
                        </div>
                        <div class="circle">
                            <i class="fas fa-circle"></i>
                        </div>
                    </div>
                    <div class="contactlist">
                        <div class="contact_image">
                            <img src="{{asset('images/slide1.png')}}" class="contact_image" alt="">
                        </div>
                        <div class="contact_name">
                            <p>Henry</p>
                        </div>
                        <div class="circle">
                            <i class="fas fa-circle"></i>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-lg-9 col-12 specific_chat">
                <div class="row">
                    <div class="col-lg-12 message_sender">
                        <div class="message">
                            <p>Hellooo </p><i class="fas fa-caret-right"></i>
                            <img src="{{asset('images/slide1.png')}}" class="contact_image" alt="">
                        </div>


                    </div>
                    <div class="col-lg-12 message_sender">
                        <div class="message">
                            <p>Hellooo </p><i class="fas fa-caret-right"></i>
                            <img src="{{asset('images/slide1.png')}}" class="contact_image" alt="">
                        </div>


                    </div>
                    <div class="col-lg-12 message_receiver">
                        <div class="message1">

                            <img src="{{asset('images/slide1.png')}}" class="contact_image" alt="">
                            <i class="fas fa-caret-left"></i><p>Hellooo </p>
                        </div>


                    </div>
                    <div class="col-lg-12 message_receiver">
                        <div class="message1">

                            <img src="{{asset('images/slide1.png')}}" class="contact_image" alt="">
                            <i class="fas fa-caret-left"></i><p>Hellooo </p>
                        </div>


                    </div>


                </div>
                <div class="container-fluid">
                    <div class="row message_type">

                            <div class="col-lg-10 col-sm-9 col-7">
                                <div class="input-group flex-nowrap">

                                <input type="text" class="form-control text" aria-describedby="addon-wrapping">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping"><i class="far fa-smile"></i></span>
                                  </div>
                                </div>

                                </div>
                                <div class="col-lg-2 col-sm-3 col-5">
                                    <button class="Send_btn">Wyślij <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    </button>
                                </div>



                    </div>
                </div>

            </div>
        </div>
      </div>
      <script>
        function openNav() {
          document.getElementById("mySidebar").style.width = "250px";
          document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
          document.getElementById("mySidebar").style.width = "0";
          document.getElementById("main").style.marginLeft= "0";
        }
        </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
