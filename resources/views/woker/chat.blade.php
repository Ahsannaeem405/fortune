<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Chat</title>
    <link rel="apple-touch-icon" href="{{ asset('admin/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/pages/app-chat.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">

    <!-- END: Custom CSS-->

</head>
<style>
.header-navbar{
     width:95%!important;
    }
    .nav-item2{
        padding-top:1.2%;
        display: block!important;

    }


    .request {
        width: 25%;
        display: inline-block !important;
        padding-top: 110px;
    }

    .box {
        background-color: white;
        overflow-y: scroll;
        height: 470px;
        padding: 20px;

    }
    .loader {
    display: none;
    position: absolute;
    left: 50%;
    top: 50%;
    z-index: 1;
    width: 100px;
    height: 100px;
    margin: -76px 0 0 -76px;
    border: 7px solid #f3f3f3;
    border-radius: 50%;
    border-top: 7px solid #7367F0;
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


    .data {
        margin-top: 10px;
    }

    @media only screen and (max-width: 769px) {
        .request {
            display: none !important;
        }
        .content-area-wrapper{
            width: 100% !important;
        }
        .bookmark-wrapper{
            display: none !important;
        }

    }

</style>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern content-left-sidebar chat-application navbar-floating footer-static  "
    data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">
    <div class="loader"></div>

    <!-- BEGIN: Header-->
    @include('woker.layouts.navbar')

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
       @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="app-content content" style="margin-left:0px;display:flex;">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper" style="width: 75%">
            <div class="sidebar-left">
                <div class="sidebar">
                    <!-- User Chat profile area -->

                    <!--/ User Chat profile area -->
                    <!-- Chat Sidebar area -->
                    <div class="sidebar-content card">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                        <div class="chat-fixed-search">
                            <div class="d-flex align-items-center">
                                <div class="sidebar-profile-toggle position-relative d-inline-flex">
                                    <div class="avatar">
                                        <img src="https://thumbs.dreamstime.com/b/default-avatar-pro…icon-social-media-user-vector-image-209162840.jpg"
                                            alt="user_avatar" height="40" width="40">
                                        <span class="avatar-status-online"></span>
                                    </div>
                                    <div class="bullet-success bullet-sm position-absolute"></div>
                                </div>
                                <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                                    <input type="text" class="form-control round" id="chat-search"
                                        placeholder="Search or start a new chat">
                                    <div class="form-control-position">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div id="users-list" class="chat-user-list list-group position-relative">
                            {{-- <div class="row profile_div" style="padding: 10px;width:100%;">
                                <div class="col-lg-12" style="text-align: center">
                                    <img src="https://thumbs.dreamstime.com/b/default-avatar-pro…icon-social-media-user-vector-image-209162840.jpg" class="rounded-circle" alt="Cinque Terre" width="20%">
                                    <h5 style="margin-top: 20px">Name</h5>
                                    <p style="margin-top: 20px">Bio</p>

                                </div>

                            </div> --}}
                            <h3 class="primary p-1 mb-0">Chats</h3>
                            <ul class="chat-users-list-wrapper media-list">
                                <?php
                                if (isset($_GET['id'])) {
                                    $id=$_GET['id'];
                                } else {
                                    $id=0;
                                }

                                ?>
                                @foreach ($approve_msgs as $msg)
                                    @php
                                        $msg_dt = App\Models\msg_dt::where('msg_id', $msg->id)
                                            ->latest()
                                            ->first();

                                    @endphp
                                    <a href="/woker/chat?id={{ $msg->id }}" style="color:black" class="a_tag">
                                    <li class="@if($id == $msg->id) active @endif">
                                        <div class="pr-1">
                                            <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                                    src="{{asset('images/avatar.jpg')}}"
                                                    height="42" width="42" alt="Generic placeholder image">
                                                <i></i>
                                            </span>
                                        </div>
                                        <div class="user-chat-info">
                                            <div class="contact-info">



                                                <h5 class="font-weight-bold mb-0" class="name_user">

                                                        {{ $msg->getuser->name }}
                                                </h5>
                                                <p class="truncate">{{ $msg_dt->message }}</p>

                                            </div>
                                            <div class="contact-meta">
                                                <span
                                                    class="float-right mb-25">{{ $msg_dt->created_at->format('H:i A') }}</span>
                                                {{-- <span class="badge badge-primary badge-pill float-right">3</span> --}}
                                            </div>
                                        </div>
                                    </li>
                                    </a>
                                @endforeach

                                {{-- <li>
                                    <div class="pr-1">
                                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                                src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-7.jpg') }}"
                                                height="42" width="42" alt="Generic placeholder image">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="user-chat-info">
                                        <div class="contact-info">
                                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>
                                            <p class="truncate">Cake pie jelly jelly beans. Marzipan lemon drops
                                                halvah cake. Pudding cookie lemon drops icing</p>
                                        </div>
                                        <div class="contact-meta">
                                            <span class="float-right mb-25">9:09 AM</span>
                                        </div>
                                    </div>
                                </li> --}}









                            </ul>
                        </div>
                    </div>
                    <!--/ Chat Sidebar area -->

                </div>
            </div>
            <div class="content-right">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="chat-overlay"></div>
                        <section class="chat-app-window">
                            <?php
                            if (isset($_GET['id'])) {
                                $msg = 1;

                            } else {
                                $msg = 0;
                            }

                            ?>

                            @if ($msg == 0)
                                <div class="start-chat-area">
                                    <span class="mb-1 start-chat-icon feather icon-message-square"></span>
                                    <h4 class="py-50 px-1 sidebar-toggle start-chat-text">Start Conversation</h4>
                                </div>
                            @endif
                            @if ($msg == 1)

                                <div class="active-chat">
                                    <div class="chat_navbar">
                                        <header
                                            class="chat_header d-flex justify-content-between align-items-center p-1">
                                            <div class="vs-con-items d-flex align-items-center">
                                                <div class="sidebar-toggle d-block d-lg-none mr-1"><i
                                                        class="feather icon-menu font-large-1"></i></div>
                                                <div class="avatar user-profile-toggle m-0 m-0 mr-1">
                                                    <img src="{{asset('images/avatar.jpg')}}"
                                                        alt="" height="40" width="40" />
                                                    <span class="avatar-status-busy"></span>
                                                </div>
                                                <h6 class="mb-0 user_nmae"></h6>
                                            </div>
                                            {{-- <span class="favorite"><i
                                                class="feather icon-star font-medium-5"></i></span> --}}
                                        </header>
                                    </div>
                                    <div class="user-chats">
                                        <div class="chats all_chats">

                                                {{-- <div class="chat-avatar">
                                                    <a class="avatar m-0" data-toggle="tooltip" href="#"
                                                        data-placement="right" title="" data-original-title="">
                                                        <img src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-1.jpg') }}"
                                                            alt="avatar" height="40" width="40" />
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-content">
                                                        <p>How can we help? We're here for you!</p>
                                                    </div>
                                                </div> --}}


                                                {{-- <div class="chat-avatar">
                                                    <a class="avatar m-0" data-toggle="tooltip" href="#"
                                                        data-placement="left" title="" data-original-title="">
                                                        <img src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-7.jpg') }}"
                                                            alt="avatar" height="40" width="40" />
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-content">
                                                        <p>Hey John, I am looking for the best admin template.</p>
                                                        <p>Could you please help me to find it out?</p>
                                                    </div>
                                                    <div class="chat-content">
                                                        <p>It should be Bootstrap 4 compatible.</p>
                                                    </div>
                                                </div> --}}

                                        </div>
                                    </div>
                                    <div class="chat-app-form">
                                        <form class="chat-app-input d-flex" id="send_form" method="POST">
                                            @csrf
                                            <input type="hidden" name="to" id="to">
                                            <input type="hidden" name="from" id="from">
                                            <input type="hidden" class="form-control" name="messages_id" id="msg_id" value="<?php
                                       if(isset($_GET['id'])){
                                     echo $_GET['id'];
                                 }?>">

                                            <input type="text" class="form-control type_msg message mr-1 ml-50" id="message"
                                                placeholder="Type your message" >
                                            <button type="button" class="btn btn-primary send"
                                                ><i class="fa fa-paper-plane-o d-lg-none"></i>
                                                <span class="d-none d-lg-block">Send</span></button>
                                            <button type="button" class="btn btn-primary send_sa_tri" style="padding:1% 3% 1% 3%;display: none;" 
                                                ><i class="fa fa-paper-plane-o d-lg-none"></i>
                                                <span class="d-none d-lg-block">Send As Trigger</span></button>
                                        </form>
                                    </div>
                                </div>
                            @endif

                        </section>
                        <!-- User Chat profile right area -->
                        <div class="user-profile-sidebar">
                            <header class="user-profile-header">
                                <span class="close-icon">
                                    <i class="feather icon-x"></i>
                                </span>
                                <div class="header-profile-sidebar">
                                    <div class="avatar">
                                        <img src="{{asset('images/avatar.jpg')}}"
                                            alt="user_avatar" height="70" width="70">
                                        <span class="avatar-status-busy avatar-status-lg"></span>
                                    </div>
                                    <h4 class="chat-user-name"></h4>
                                </div>
                            </header>
                            <div class="user-profile-sidebar-area p-2">
                                <h6 class="name_prof"></h6>
                                {{-- <p class="email"></p> --}}
                            </div>
                        </div>
                        <!--/ User Chat profile right area -->

                    </div>
                </div>
            </div>
        </div>
        <div class="request">
            <div class="box">
                    {{-- @php
                $msg_dt=App\Models\msg_dt::where('msg_id',$msg->id)->latest()->first();

                @endphp --}}
                    <div class="data">
                        <form action="{{ url('/woker/join') }}" method="post" class="">
                            @csrf
                            @foreach ($Napprove_msgs as $msg)
                    
                            <div class="wiat_list">
                                <div class="pr-1" style="display: flex;">
                                <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                        src="{{ asset('images/avatar.jpg') }}"
                                        height="42" width="42" alt="Generic placeholder image">
                                    <i></i>
                                </span>
                                <input type="hidden" name="msg_id" value="{{ $msg->id }}">
                                <h5 class="font-weight-bold mt-1 ml-1 mb-0">{{ $msg->getuser->name }}</h5>

                                <button type="submit" class="btn btn-primary" style="margin-left:auto;">Join</button>
                                </div>               
                            </div>
                            @endforeach
                            <div class="wiat_list1">
                                
                            </div>   
                        </form>
                    </div>
                



            </div>

        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->

    <!-- END: Footer-->


    <script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/components.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin/app-assets/js/scripts/pages/app-chat.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- END: Page JS-->

    <script>
        $(document).ready(function() {

            <?php
            if (isset($_GET['id'])) {
            ?>


            var msg_id = "<?php echo $_GET['id']; ?>";

            window.setInterval(function(){
                var op = " ";
                var opp= " ";
            $.ajax({

                type: 'get',
                url: '{{ URL::to('/woker/admin_messages') }}',
                data: {
                    'msgid': msg_id
                },

                success: function(data) {
                    $('.all_chats').empty();

                        for (var i = 0; i < data['message'].length; i++) 
                        {

                            if(data['message'][i].msg_type=='Admin')
                            {
                                if(data['message'][i].trigger !=null)
                                {
                                    op +=
                                        '<div class="chat chat-right"><div class="chat-avatar">'+
                                           '<a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">'+
                                               '<img src="/upload/images/'+data['img']+'" height="40" width="40" />'+
                                            '</a>'+
                                        '</div>'+
                                        '<div class="chat-body">'+
                                            '<div class="chat-content">'+
                                                '<p>'+data['message'][i].msg +'</p><small>Trigger Mesasage</small>'+
                                            '</div>'+
                                        '</div>';


                                }
                                else{
                                    op +=
                                        '<div class="chat chat-right"><div class="chat-avatar">'+
                                           '<a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">'+
                                               '<img src="/upload/images/'+data['img']+'" height="40" width="40" />'+
                                            '</a>'+
                                        '</div>'+
                                        '<div class="chat-body">'+
                                            '<div class="chat-content">'+
                                                '<p>'+data['message'][i].msg +'</p>'+
                                            '</div>'+
                                        '</div>';

                                }


                            }
                            if(data['message'][i].msg_type=='User'){
                                
                                 op+='<div class="chat chat-left"><div class="chat-avatar">'+
                                        '<a class="avatar m-0" data-toggle="tooltip" href="#"data-placement="left" title="" data-original-title="">'+
                                            '<img src="{{ asset("images/avatar.jpg") }}"alt="avatar" height="40" width="40" />'+
                                        '</a>'+
                                    '</div>'+
                                    '<div class="chat-body">'+
                                        '<div class="chat-content"><p>'+data['message'][i].msg +'</p>'+
                                        '</div>'+
                                    '</div></div>';
                            }
                        }
                        $('.all_chats').append(op);
                        $('.user_nmae').text(data['name']);
                        $('#to').val(data['user_id']);
                        $('#from').val(data['fortune_id']);
                        if(data['diff_in_minutes'] <= 20)
                         {
                            $(".send_sa_tri").css('display','none');

                         } 
                         else{
                            $(".send_sa_tri").css('display','block');

                         }
                    // alert(op);

                },
            })

            },1000);
            <?php }
            ?>
            


            // alert(msg_id);
            var ops=" ";
           
            $.ajax({

                type: 'get',
                url: '{{ URL::to('/woker/admin_messages') }}',
                data: {
                    'msgid': msg_id
                },

                success: function(data) {
                    $('.all_chats').empty();
                    // var sre="upload/images/"+data['img'];


                    for (var i = 0; i < data['message'].length; i++) {
                        
                        if(data['message'][i].msg_type=='Admin')
                            {
                                if(data['message'][i].trigger !=null)
                                {
                                    ops +=
                                        '<div class="chat chat-right"><div class="chat-avatar">'+
                                           '<a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">'+
                                               '<img src="/upload/images/'+data['img']+'" height="40" width="40" />'+
                                            '</a>'+
                                        '</div>'+
                                        '<div class="chat-body">'+
                                            '<div class="chat-content">'+
                                                '<p>'+data['message'][i].msg +'</p><small>Trigger Mesasage</small>'+
                                            '</div>'+
                                        '</div>';


                                }
                                else{
                                    ops +=
                                        '<div class="chat chat-right"><div class="chat-avatar">'+
                                           '<a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">'+
                                               '<img src="/upload/images/'+data['img']+'" height="40" width="40" />'+
                                            '</a>'+
                                        '</div>'+
                                        '<div class="chat-body">'+
                                            '<div class="chat-content">'+
                                                '<p>'+data['message'][i].msg +'</p>'+
                                            '</div>'+
                                        '</div>';

                                }    
                                


                            }

                            if(data['message'][i].msg_type=='User'){

                                    ops+='<div class="chat chat-left"><div class="chat-avatar">'+
                                        '<a class="avatar m-0" data-toggle="tooltip" href="#"data-placement="left" title="" data-original-title="">'+
                                            '<img src="{{ asset("images/avatar.jpg") }}"alt="avatar" height="40" width="40" />'+
                                        '</a>'+
                                    '</div>'+
                                    '<div class="chat-body">'+
                                        '<div class="chat-content"><p>'+data['message'][i].msg +'</p>'+
                                        '</div>'+
                                    '</div></div>';                               
                            }
                    }                        
                        $('.all_chats').append(ops);
                        $('.user_nmae').text(data['name']);
                        $('.name_prof').text(data['name']);
                        // $('.email').text(data['email']);
                        if(data['diff_in_minutes'] <= 20)
                         {
                            $(".send_sa_tri").css('display','none');

                         } 
                         else{
                            $(".send_sa_tri").css('display','block');

                         }  

                        



                        $('#to').val(data['user_id']);
                        $('#from').val(data['fortune_id']);
                        $('.user-chats').scrollTop($('.user-chats')[0].scrollHeight);

                    // alert(op);

                },


            });
            $(".send").click(function () {
                $(".loader").css('display','block');
                var message=$('#message').val();
                var to=$('#to').val();
                var from=$('#from').val();
                var msg_id=$('#msg_id').val();
                // alert(msg_id);
                var _token = $("input[name='_token']").val();
                if (message != '' && message != ' ') {
                    $.ajax({
                        url: '{{URL::to('/woker/sendMSG')}}',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {_token: _token, 'message': message, 'from': from,'to':to,'msg_id':msg_id},
                        success: function (data) {
                            $(".loader").css('display','none');
                             $(".type_msg").val(" ");
                           
                            $('.user-chats').scrollTop($('.user-chats')[0].scrollHeight);
                            $('.chats').val(" ");
                            op +='<div class="chat"><div class="chat-avatar"><a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title=""><img src="'+data['img']+'"alt="avatar" height="40" width="40" /></a></div><div class="chat-body"><div class="chat-content"><p>'+data.msg + '</p></div></div></div>';
                            $('.chats').append(op);



                        }



                    });
                }

            });
            window.setInterval(function(){
               
                $.ajax({

                    type: 'get',
                    async:false,
                    url: '{{ URL::to("woker/chat2") }}',
                    success: function(data){

                        console.log(data);

     
                   $('.wiat_list').empty();
                   $('.wiat_list1').empty();
                   $('.wiat_list1').append(data);
                            
                            
                        
                    },
                })

            },8000);
            $(".send_sa_tri").click(function () {
                $(".loader").css('display','block');
                var opt=" ";

                var message=$('#message').val();
                var to=$('#to').val();
                var from=$('#from').val();
                var msg_id=$('#msg_id').val();
                var _token = $("input[name='_token']").val();
                if (message != '' && message != ' ') {
                    $.ajax({
                        url: '{{URL::to('/woker/sendtri_MSG')}}',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {_token: _token, 'message': message, 'from': from,'to':to,'msg_id':msg_id},
                        success: function (data) {

                            $('.user-chats').scrollTop($('.user-chats')[0].scrollHeight);


                            $(".loader").css('display','none');
                            $(".type_msg").val(" ");
                            $(".send_sa_tri").css('display','none');


                            
                            opt +='<div class="chat"><div class="chat-avatar"><a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title=""><img src="/upload/images/'+data.img+'"alt="avatar" height="40" width="40" /></a></div><div class="chat-body"><div class="chat-content"><p>'+data.msg + '<small>Trigger Mesasage</small></p></div></div></div>';
                            $('.chats').append(opt);



                        }



                    });
                }

            });

            


        });
    </script>
    

</body>
<!-- END: Body-->

</html>
