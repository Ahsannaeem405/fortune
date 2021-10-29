<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <title>Chat</title>
</head>
<style>
    .p_java , .p_java2{
        display: none;
    }
    body {
        background-color: #1B1B1B;
        color: white;
    }
    .prof{
            display: none;

        }

    .logo {
        width: 130px;
    }

    .profile {
        background-color: #2F2F2F;
        margin-top: 20px;
        text-align: center !important;
        border-radius: 20px;
    }

    .profile img {
        width: 100%;
        height: 101px;
        border-radius: 255px;


    }

    .profile p {
        font-size: 14px;
    }

    .image {
        border: 1px solid white;
        padding: 5px;
        border-radius: 200px;
        /* width: fit-content; */
        height: 113px;
        width: 111px;
        margin-left: auto;
        margin-right: auto;


    }

    .name {
        /* border-bottom: 1px solid grey; */
        padding-top: 20px;
    }

    .name b {
        color: purple;
    }

    .fa-smile {
        font-size: 25px;
        color: purple;
        font-weight: bold;
    }

    .fa-chevron-down {
        font-size: 10px;
    }

    .contactlist {
        padding: 10px;
        display: flex;
    }

    .contact_image {
        border-radius: 200px;
        width: 50%;
        height: 50px;
    }

    .contact_image img {
        max-width: 50px;
    }

    .contact_name {
        padding-top: 18px;
        margin-left: -30px;
    }

    .circle {
        color: purple;
        text-align: center;
        padding-left: 40px;

        padding-top: 17px;
    }

    .listend {
        border-bottom: 1px solid grey;
        border-top: 1px solid grey;


    }

    .fa-circle {
        font-size: 10px;
    }

    .specific_chat {
        background-color: #2F2F2F;
        margin-top: 20px;
        text-align: center !important;
        border-radius: 20px;
        padding: 20px;
        height: 700px;
    }

    .message_sender {
        text-align: right;
        /* display: flex; */


    }

    .message p {
        display: inline-block;
        background-color: #C530D6;
        color: white;
        padding: 10px;
        border-radius: 16px;
    }

    .message img {
        display: inline-block;
        width: 7%;
    }

    .message .fa-caret-right {
        color: #C530D6;
    }

    .Send_btn {
        background-color: #C530D6;
        color: white;
        border: none;
        border-radius: 10px;
        padding: 5px;
        padding-right: 15px;
        padding-left: 15px;
    }

    .message_receiver {
        text-align: left;
    }

    .text {
        border: 1px solid gray;
        border-radius: 30px;
        border-right: none !important;
    }

    .input-group-text {
        border-left: none !important;
        border: 1px solid gray;
        background-color: white;
        border-top-right-radius: 20px !important;
        border-bottom-right-radius: 20px !important;



    }

    .message1 p {
        display: inline-block;
        background-color: white;
        color: black;
        padding: 10px;
        border-radius: 16px;
    }

    .message1 img {
        display: inline-block;
        width: 7%;
    }

    .message1 .fa-caret-left {
        color: white;
    }

    .message_type {
        background-color: white;
        padding: 5px;
        border-radius: 5px;
        align: bottom;
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

    .closebtn {
        z-index: 200;
    }

    .sidebar_row {
        padding: 10px;
    }

    .active {
        background-color: #2F2F2F !important;
        border-radius: 10px;
    }

    .specific_msg {
        /* overflow-y: scroll;
        height: 590px; */

        max-height: 315px;
    overflow-y: auto;


    }
    .back{
        font-size: 25px;
        color:#C530D6 !important;
    }
    .back:hover{
        color: purple !important;
        text-decoration:none;
    }

    .no_message{
        background-color:#2F2F2F;
        height: 500px;
        text-align: center;
        padding-top: 150px;
        color: white;

    }
    
    
    @media only screen and (max-width: 768px) {

        /*Big smartphones [426px -> 600px]*/
        .fullscreen {
            display: none;

        }
        .back{
            float: right;
            margin-top: -40%;
        }

        .openbtn {
            display: block;
        }
        .prof{
            display: block;

        }

        .contact_image {
            height: 40px;
            width: 38px !important;

        }

        .contact_name {
            margin-left: 20px;
        }
        .    .prof{
            display: block;
        }

    }

    @media only screen and (min-width:769px) {

        /*Big smartphones [426px -> 600px]*/

        .openbtn {
            display: none;
        }
        .row1{
            margin-top: 60px;
        }
        .prof{
            display: none;
        }
        .specific_msg{
            max-height: 560px;
        }
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidebar {
            padding-top: 15px;
        }

        .sidebar a {
            font-size: 18px;
        }

        .Send_btn {
            padding-right: 10px !important;
            padding-left: 10px !important;
        }



    }

    @media screen and (max-height: 768px) {
        .Send_btn {
            padding-right: 18px !important;
            padding-left: 17px !important;
        }
    }

    @media only screen and (min-width:1023px) {
        .Send_btn {
            /* padding: 9px;
            font-size: 14px; */
            padding: 11px;
    font-size: 10px;
        }
    }

    @media only screen and (max-width:375px) {
        .Send_btn {
            padding-right: 15px !important;
            padding-left: 10px !important;
        }
    }

    @media only screen and (max-width:320px) {
        .Send_btn {
            font-size: 12px;
            padding-right: 12px !important;
            padding-left: 8px !important;
            padding: 9px;
        }
    }


    .right_box::-webkit-scrollbar {
        width: 10px;

    }


    /* Track */
    .right_box::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px gray;
        border-radius: 15px;
    }


    /* Handle */
    .right_box::-webkit-scrollbar-thumb {
        background: #C530D6;
        border-radius: 15px;
        height: 50px;

    }

    /* Handle on hover */
    .right_box::-webkit-scrollbar-thumb:hover {
        background: #C530D6;
    }


    .loader {
    display: none;
    position: absolute;
    left: 50%;
    top: 70%;
    z-index: 1;
    width: 120px;
    height: 120px;
    margin: -76px 0 0 -76px;
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid #C530D6;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
    }

</style>

<body>
    


    <input type="hidden" value="{{$chat_id}}" id="chat_id">

    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        {{-- <a href="{{url('/user')}}"><i class="fas fa-arrow-circle-left"></i> Back</a> --}}
        <div class="row sidebar_row">
            <div class="col-10">

                <img src="{{ asset('images/logo2.png') }}" alt="" class="logo">


                @if (isset($for))
                <input type="hidden" value="{{$for->id}}" id="for_id">
                <div class="profile p-3">
                    <div class="image">
                        <img src="{{asset('upload/images/'.$for->file)}}" alt="">
                    </div><br>
                    <h5>{{$for->name}}</h5>
                    <p>{{$for->bio}}</p>

                </div>
                @else
                <input type="hidden" id="for_id">
                <div class="profile p-3 p_java">


                </div>
                @endif

                <div class="row name">
                    <div class="col-lg-8 col-8">
                        <h5>Rozmowy</h5>
                    </div>
                    <div class="col-lg-4 col-4">
                        <b>5 <i class="fas fa-chevron-down"></i></b>
                    </div>


                </div>
                <div class="listend">
                    @foreach ($msg as $to)
                    @php $to_id2=$to->id; @endphp
                    <a href="{{url('/user/chat?id='. $to_id2)}}" style="color:white;text-decoration:none;" >
                        <div class="contactlist">
                            <input type="hidden" id="from_id1" value={{ $to->getuser->id }}>
                            <div class="contact_image">
                                <!--  -->
                            </div>
                            <div class="contact_name">
                                <p>{{ $to->getuser2->name }}</p>
                            </div>
                            {{-- <div class="circle">
                                <i class="fas fa-circle"></i>
                            </div> --}}
                        </div>
                    </a>
                    @endforeach
                    {{-- <div class="contactlist active">
                    <div class="contact_image">
                        <img src="{{asset('images/slide1.png')}}" class="contact_image" alt="">
                    </div>
                    <div class="contact_name">
                        <p>Henry</p>
                    </div>
                    <div class="circle">
                        <i class="fas fa-circle"></i>
                    </div>
                </div> --}}


                </div>


            </div>
        </div>

    </div>
    <div id="main">
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>

    <div class="container p-5 ">
        <div class="loader"></div>
        <a href="{{url('/user')}}" class="back"><i class="fas fa-arrow-circle-left" ></i> Powrót</a>
        <div class="row row1">
            <div class="col-lg-3 col-12 fullscreen">

                <img src="{{ asset('images/logo2.png') }}" alt="" class="logo">

              @if(isset($for))

              <div class="profile p-3">
                  <div class="image">
                      <img src="{{asset('upload/images/'.$for->file)}}" alt="">
                  </div><br>
                  <h5>{{$for->name}}</h5>
                  <p>{{$for->bio}}</p>

              </div>
              @else
              <div class="profile p-3 p_java2">


            </div>

              @endif


                <div class="listend">
                    {{-- <div class="contactlist active">
                        <div class="contact_image">
                            <img src="{{asset('images/slide1.png')}}" class="contact_image" alt="">
                        </div>
                        <div class="contact_name">
                            <p>Henry</p>
                        </div>
                        <div class="circle">
                            <i class="fas fa-circle"></i>
                        </div>
                    </div> --}}
                    @foreach ($msg as $to)
                    @php $to_id=$to->id; @endphp
                    <a href="{{url('/user/chat?id='. $to_id)}}" style="color:white;text-decoration:none;">

                        <div class="contactlist " id="">
                            <input type="hidden" id="from_id2" value={{ $to->getuser->id }}>




                                <div class="contact_image">
                                    <img src="{{ asset('upload/images/'.$to->getuser2->file) }}" class="contact_image" alt="">
                                </div>

                                <div class="contact_name">
                                    <p>{{ $to->getuser2->name }}</p>
                                </div>
                                {{-- <div class="circle">
                                    <i class="fas fa-circle"></i>
                                </div> --}}

                        </div>
                    </a>
                    @endforeach
                </div>


            </div>
            <div class="col-lg-9 col-12 specific_chat">
                @if(isset($for))


                    <div  class="prof">
                        <img src="{{asset('upload/images/'.$for->file)}}" alt="" style="width:80px;height:80px;">


                        <h5 style="">{{$for->name}}</h5>
                        <p style="">{{$for->bio}}</p>
                        <hr>

                    </div>



                @endif
                <div class="row">
                    <div class="col-lg-12 col-12 no_message">
                        <h5>Rozmowy</h5><br>
                        <img src="{{url('images\sad.png')}}" alt="">
                        <p style="color: gray;margin-top:50px;">Wybierz wrozbite z menu po lewej stronie i zadaj pytanie!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 prof">
                        @if(isset($for))

                        <div class="profile p-3">
                            <div class="image">
                                <img src="{{asset('upload/images/'.$for->file)}}" alt="">
                            </div><br>
                            <h5>{{$for->name}}</h5>
                            <p>{{$for->bio}}</p>


                        @else
                        <div class="profile p-3 p_java2">


                      </div>

                        @endif
                    </div>
                </div>
                <div class="row specific_msg right_box" id="chat" style="margin-left:0px; margin-right: 0px;width: 100%;">


                    @foreach ($msg_details as $msg)
                    @if ($msg->from==Auth::user()->id)
                    <div class="col-lg-12 message_sender">
                        <div class="message">
                            <p>{{$msg->msg}}</p><i class="fas fa-caret-right"></i>
                            <img src="https://microsite.hcltech.com/manufacturing/imro/img/avatar.png" class="contact_image" alt="">
                        </div>
                    </div>
                    @else
                    <div class="col-lg-12 message_receiver">
                        <div class="message1">
                            <img src="https://microsite.hcltech.com/manufacturing/imro/img/avatar.png" class="contact_image" alt="">
                            <i class="fas fa-caret-left"></i>
                            <p>{{$msg->msg}}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @if($no_chat == 0 or isset($_GET['id']))
                <div class="row message_type" style="margin-left:0px; margin-right: 0px;">
                
                    <form method="post" style="width:100%;"class="form-inline typing" >
                            @csrf
                      

                            <div class="col-lg-10 col-sm-9 col-7">
                                <div class="input-group flex-nowrap">
                                    @if (isset($for))
                                    <input type="hidden" class="rec_id" value="{{$for->id}}">
                                    @else
                                    <input type="hidden" class="rec_id rec_id2 id1" value="">

                                    @endif
                                    <input type="text" id="input" class="form-control text typing_msg" aria-describedby="addon-wrapping">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping"><i class="far fa-smile"></i></span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-2 col-sm-3 col-5">
                                <button class="Send_btn" type="button">Wyślij <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </button>

                            </div>



                    </form>
                </div>
                @else
                
                @endif

            </div>    
                



        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.specific_msg').scrollTop($('.specific_msg')[0].scrollHeight);

            var for_id=$('#for_id').val();
            if (for_id!="") {
                $(".no_message").css("display","none");
                $(".right_box").css("display","block");
                $(".message_type").css("display","flex");
            }


            $(document).on("click",'.Send_btn',function(){


                $(".loader").css('display','block');

                var message=$('#input').val();
                var rec_id=$('.rec_id').val();

                var op=" ";
                var id =rec_id;
                var _token = $("input[name='_token']").val();
                $.ajax({

                    type: 'post',
                    url: '{{ URL::to('/messages_fortune') }}',
                    data: {
                        _token:_token,
                        'id': id,'message':message

                    },

                    success: function(data) {

                        

                        $(".typing_msg").val(" ");
                        

                        $(".loader").css('display','none');

                        $('#chat').val(" ");
                   
                        op += '<div class="col-lg-12 message_sender"><div class="message"><p>'+data.msg+'</p><i class="fas fa-caret-right"></i><img src="https://microsite.hcltech.com/manufacturing/imro/img/avatar.png" class="contact_image" alt=""></div></div>';
                        $('#chat').append(op);
                        $('.specific_msg').scrollTop($('.specific_msg')[0].scrollHeight);

                    },
                });

            });
            $(".contact1").click(function() {

                // alert("1");
                var myId = $('#from_id1').val();
                $(".no_message").css("display","none");
                $(".right_box").css("display","block");
                $(".message_type").css("display","flex");





                var op=" ";


                // alert(myId);
                var id =myId;


                $.ajax({

                    type: 'get',
                    url: '{{ URL::to('/messages') }}',
                    data: {
                        'id': id
                    },

                    success: function(data) {
                        $('#chat').empty();

                        for (var i = 0; i < data.length; i++) {

                            op +='<div class="col-lg-12 message_receiver"><div class="message1"><img src="https://microsite.hcltech.com/manufacturing/imro/img/avatar.png" class="contact_image" alt=""><i class="fas fa-caret-left"></i><p>'+data[i].msg+'</p></div></div>'

                        }
                        // alert(op);
                        $('#chat').append(op);

                    },


                });
            });
            <?php
            if (isset($_GET['id'])) {
                ?>

                window.setInterval(function(){

                    var myId = "<?php echo $_GET['id']; ?>";



                    $(".no_message").css("display","none");
                    $(".right_box").css("display","block");
                    $(".message_type").css("display","flex");
                    $(".p_java").css("display","block");
                    $(".p_java2").css("display","block");



                    var op=" ";


                    // alert(myId);
                    var id =myId;


                    $.ajax({

                        type: 'get',
                        url: '{{ URL::to('/messages') }}',
                        data: {
                            'id': id
                        },
                        
                        success: function(data) {
                            $('#chat').empty();
                            // alert(data['fortune'].bio);

                            for (var i = 0; i < data['message'].length; i++) {
                                if (data['message'][i].from=={{Auth::user()->id}}) {

                                    op +='<div class="col-lg-12 message_sender"><div class="message"><p>'+data['message'][i].msg+'</p><i class="fas fa-caret-right"></i><img src="https://microsite.hcltech.com/manufacturing/imro/img/avatar.png" class="contact_image" alt=""></div></div>'
                                }
                                else{

                                    op +='<div class="col-lg-12 message_receiver"><div class="message1"><img src="https://microsite.hcltech.com/manufacturing/imro/img/avatar.png" class="contact_image" alt=""><i class="fas fa-caret-left"></i><p>'+data['message'][i].msg+'</p></div></div>'
                                }


                            }

                            profile +=' <div class="image"><img src="/upload/images/'+data['fortune'].file+' alt=""></div><br><h5>'+data['fortune'].name+'</h5><p>'+data['fortune'].bio+'</p>';
                            profile2 +=' <div class="image"><img src="/upload/images/'+data['fortune'].file+'" alt=""></div><br><h5>'+data['fortune'].name+'</h5><p>'+data['fortune'].bio+'</p>';
                            // alert(op);
                            $('#chat').append(op);

                            // alert(data['to']);
                            $('.rec_id2').val(data['fortune'].id);




                        },


                    });
                },1000);

                var myId = "<?php echo $_GET['id']; ?>";
                $(".loader").css('display','block');
                $('.specific_msg').scrollTop($('.specific_msg')[0].scrollHeight);




                $(".no_message").css("display","none");
                $(".right_box").css("display","block");
                $(".message_type").css("display","flex");
                $(".p_java").css("display","block");
                $(".p_java2").css("display","block");



                var op=" ";


                // alert(myId);
                var id =myId;
                var profile=" ";
                var profile2=" ";


                $.ajax({

                    type: 'get',
                    url: '{{ URL::to('/messages') }}',
                    data: {
                        'id': id
                    },

                    success: function(data) {

                        $(".loader").css('display','none');
                        $('#chat').empty();
                        $('.p_java').empty();
                        $('.p_java2').empty();


                        // alert(data['fortune'].bio);

                        for (var i = 0; i < data['message'].length; i++) {
                            if (data['message'][i].from=={{Auth::user()->id}}) {

                                op +='<div class="col-lg-12 message_sender"><div class="message"><p>'+data['message'][i].msg+'</p><i class="fas fa-caret-right"></i><img src="https://microsite.hcltech.com/manufacturing/imro/img/avatar.png" class="contact_image" alt=""></div></div>'
                            }
                            else{

                                op +='<div class="col-lg-12 message_receiver"><div class="message1"><img src="https://microsite.hcltech.com/manufacturing/imro/img/avatar.png" class="contact_image" alt=""><i class="fas fa-caret-left"></i><p>'+data['message'][i].msg+'</p></div></div>'
                            }


                        }

                        profile +=' <div class="image"><img src="/upload/images/'+data['fortune'].file+'" alt=""></div><br><h5>'+data['fortune'].name+'</h5><p>'+data['fortune'].bio+'</p>';
                        profile2 +=' <div class="image"><img src="/upload/images/'+data['fortune'].file+'" alt=""></div><br><h5>'+data['fortune'].name+'</h5><p>'+data['fortune'].bio+'</p>';
                        // alert(op);
                        $('#chat').append(op);
                        $('.p_java').append(profile);
                        $('.p_java2').append(profile2);

                        $('.rec_id2').val(data['fortune'].id);




                    },
                });
            <?php }else{
            ?>    
             window.setInterval(function(){
                var op = " ";
                var chat_id=$('#chat_id').val();
                

                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('/user/user_messages') }}',
                    data: {
                        'msg_id': chat_id
                    },

                    success: function(dat) {
                        $('#chat').empty();

                        for (var i = 0; i < dat.length; i++) {


                                if(dat[i].from=={{Auth::user()->id}})
                                {
                                    op +=' <div class="col-lg-12 message_sender"><div class="message"><p>'+dat[i].msg+'</p><i class="fas fa-caret-right"></i><img src="https://microsite.hcltech.com/manufacturing/imro/img/avatar.png" class="contact_image" alt=""></div></div>';


                                }
                                else{
                                    op +=' <div class="col-lg-12 message_receiver"><div class="message1"><img src="https://microsite.hcltech.com/manufacturing/imro/img/avatar.png" class="contact_image" alt=""><i class="fas fa-caret-left"></i><p>'+dat[i].msg+'</p></div></div>';
                                }


                        }
                            $('#chat').append(op);
                            // $('.user_nmae').text(data['name']);
                            // $('#to').val(data['user_id']);
                            // $('#from').val(data['fortune_id']);

                        // alert(op);

                    },
                })
            },1000);
            
            <?php }
            ?>

            $(document).on("submit",'.typing',function(){
                $(".Send_btn").click();


            });

        });
    </script>
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
