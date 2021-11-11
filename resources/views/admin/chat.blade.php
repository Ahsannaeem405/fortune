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
.user-chats{
    overflow: hidden;
}
.header-navbar{
     width:95%!important;
    }
    .navbar-nav{
        width: 100%;
        display: flex;
        justify-content: space-between;

    }
    .nav-item2{
        padding-top:1.4%;
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

    .data {
        margin-top: 10px;
    }

    @media only screen and (max-width: 769px) {
        .request {
            display: none !important;
        }
        .bookmark-wrapper{
            display: none !important;
        }
        .nav-item2{
        padding-top:5%;
        display: block!important;

        }
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


</style>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern content-left-sidebar chat-application navbar-floating footer-static  "
    data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">
        <div class="loader"></div>

    <!-- BEGIN: Header-->
    @include('admin.layouts.navbar')

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    {{-- @include('admin.layouts.sidebar') --}}
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="app-content content" style="margin-left:0px;display:flex;">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper" style="width:75%">
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
                                <!-- <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                                    <input type="text" class="form-control round" id="chat-search"
                                        placeholder="Search or start a new chat">
                                    <div class="form-control-position">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset> -->
                            </div>
                        </div>
                        <div id="users-list" class="chat-user-list list-group position-relative">

                            <h3 class="primary p-1 mb-0">Chats</h3>
                            <ul class="chat-users-list-wrapper media-list">
                                <?php
                                if (isset($_GET['id'])) {
                                    $id=$_GET['id'];
                                } else {
                                    $id=0;
                                }

                                ?>
                                @php $cl=0; @endphp

                                @foreach ($approve_msgs as $msg)
                                    @php
                                        $msg_dt = App\Models\msg_dt::where('msg_id', $msg->id)
                                            ->latest()
                                            ->first();
                                        $msg_id=$msg->id;

                                    @endphp
                                    <input type="hidden" id="count_msg_id{{$cl}}" value={{ $msg->id }}>

                                    <a href="{{url('/admins/chat?id=' .$msg_id)}}" style="color:black" class="a_tag">
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



                                                <h4 class="font-weight-bold mb-0" class="name_user">

                                                        {{ $msg->getuser->name }}
                                                </h4>

                                                <p class="truncate">Conected With {{ $msg->getuser2->name  }}<br>

                                                </p>

                                            </div>
                                            <div class="circle countycir{{$cl}}" style="color: #C530D6;position: absolute;right: 20%;"></div>
                                            <div class="contact-meta">
                                                <span
                                                    class="float-right mb-25">{{ $msg_dt->created_at->format('H:i A') }}</span>
                                                {{-- <span class="badge badge-primary badge-pill float-right">3</span> --}}
                                            </div>
                                        </div>
                                    </li>
                                    </a>
                                @php  $cl++; @endphp    
                                @endforeach
                                <input type="hidden" name="" value="{{$cl}}" class="count_lent">


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
                <input type="hidden" class="c_msg" value="">
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
                                                 style="padding: 2% 6% 2% 4%;"><i class="fa fa-paper-plane-o d-lg-none"></i>
                                                <span class="d-none d-lg-block">Send</span></button>
                                            <button type="button" class="btn btn-primary send_sa_tri ml-1" style="padding:1% 3% 1% 3%;display: none;" 
                                                ><i class="fa fa-paper-plane-o d-lg-none"></i>
                                                <span class="d-none d-lg-block">Send As Trigger</span></button>
                                        </form>
                                    </div>
                                </div>
                            @endif

                        </section>

                    <!-- User Chat profile right area -->
                      @php 
                        if(isset($_GET['id'])){
                            $ids=$_GET['id'];
                            $msg_id=App\Models\msg::find($ids)->value('from');
                            $user=App\MOdels\User::find($msg_id);
                                     
                        } 
                        @endphp


                        @if(isset($_GET['id']))
                        <div class="user-profile-sidebar">
                            <header class="user-profile-header">
                                <span class="close-icon">
                                    <i class="feather icon-x"></i>
                                </span>
                                <div class="header-profile-sidebar">
                                    <div class="avatar">

                                        <img src="{{asset('images/avatar.jpg')}}" alt="user_avatar" height="70" width="70">
                                        <span class="avatar-status-busy avatar-status-lg"></span>
                                    </div>
                                    <h4 class="chat-user-name">{{$user->name}}</h4>
                                </div>
                            </header>
                            <div class="user-profile-sidebar-area p-2 ps" style="overflow:hidden;">
                                <h6>About</h6>
                                <form class="form form-vertical" id="update_user">
                                    @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Vocative</label>
                                                            <input type="hidden" id="first-name-vertical" class="form-control" name="id" placeholder="Vocative" value="{{$user->id}}">
                                                            <input type="text" id="first-name-vertical" class="form-control" name="vocative" placeholder="Vocative" value="{{$user->vocative}}">

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Name Of Love</label>
                                                             <input type="text" id="first-name-vertical" class="form-control" name="name_of_love" value="{{$user->nameoflove}}" placeholder="Name Of Love">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">City</label>
                                                             <input type="text" id="first-name-vertical" class="form-control" name="city" placeholder="City" value="{{$user->city}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Extra Note</label>
                                                            <textarea class="form-control" id="basicTextarea" rows="3" placeholder="Textarea" name="note">{{$user->bio}}</textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                
                            </div>
                        </div>
                        @endif
                    <!--/ User Chat profile right area -->


                    </div>
                </div>
            </div>
        </div>
        <div class="request">
            <div class="box">
               
                    <div class="data">
                        <form action="{{ url('/admins/join') }}" method="post" id="join">
                            <input type="hidden" name="msg_id" value="" class="msg_id">

                            @csrf
                            @foreach ($Napprove_msgs as $msg)
                    
                            <div class="wiat_list">
                                <div class="pr-1" style="display: flex;">
                                <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                        src="{{ asset('images/avatar.jpg') }}"
                                        height="42" width="42" alt="Generic placeholder image">
                                    <i></i>
                                </span>
                                <h5 class="font-weight-bold mt-1 ml-1 mb-0">{{ $msg->getuser->name }}</h5>

                                <button type="button" class="btn btn-primary join_id" abc="{{$msg->id}}" style="margin-left:auto;">Join</button>
                            </div>                            </div>
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
<?php
if (isset($_GET['id'])) {
?>
    <script>
        $(document).ready(function() {




            var msg_id = "<?php echo $_GET['id']; ?>";


            window.setInterval(function(){
                var op = " ";
                var opp= " ";
            $.ajax({

                type: 'get',
                url: '{{ URL::to('/admins/admin_messages') }}',
                data: {
                    'msgid': msg_id
                },

                success: function(data) {
                    $('.all_chats').empty();

                    var c_msg=0;
                    for (var i = 0; i < data['message'].length; i++) {

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

                                c_msg++;


                                
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
                    var pre_c_msg=$(".c_msg").val();

                    

                    if(c_msg > pre_c_msg)
                    {
                        $(".c_msg").val(c_msg);
                        $(".user-chats").animate({ scrollTop: $('.user-chats')[0].scrollHeight},1000);


                    }


                        if(data['diff_in_minutes'] <= 20)
                         {
                            $(".send_sa_tri").css('display','none');

                         } 
                         else{
                            $(".send_sa_tri").css('display','block');

                         }

                        $('.all_chats').append(op);
                        $('.user_nmae').text(data['name']);
                        $('#to').val(data['user_id']);
                        $('#from').val(data['fortune_id']);

                    // alert(op);

                },
            })

            },5000);
            // alert("Helloo");

            // alert(msg_id);
            var op = " ";
            var opp= " ";
            var c_msg=0;
            $.ajax({

                type: 'get',
                url: '{{ URL::to('/admins/admin_messages') }}',
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
                                c_msg++;

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
                        $(".c_msg").val(c_msg);


                    
                        $('.all_chats').append(op);
                        $('.user_nmae').text(data['name']);
                        $('.name_prof').text(data['name']);
                        if(data['diff_in_minutes'] <= 20)
                         {
                            $(".send_sa_tri").css('display','none');

                         } 
                         else{
                            $(".send_sa_tri").css('display','block');

                         }
                        $('#to').val(data['user_id']);
                        $('#from').val(data['fortune_id']);
                        $(".user-chats").animate({ scrollTop: $('.user-chats')[0].scrollHeight}, 500);



                    // alert(op);

                },


            });
            $(".send").click(function () {
                $(".loader").css('display','block');
                var op=" ";

                var message=$('#message').val();
                var to=$('#to').val();
                var from=$('#from').val();
                var msg_id=$('#msg_id').val();
                var _token = $("input[name='_token']").val();
                if (message != '' && message != ' ') {
                    $.ajax({
                        url: '{{URL::to('/admins/sendMSG')}}',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {_token: _token, 'message': message, 'from': from,'to':to,'msg_id':msg_id},
                        success: function (data) {

                            $('.user-chats').scrollTop($('.user-chats')[0].scrollHeight);


                            $(".loader").css('display','none');
                            $(".type_msg").val(" ");
                            console.log(data.msg);

                            
                            op +='<div class="chat"><div class="chat-avatar"><a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title=""><img src="/upload/images/'+data.img+'"alt="avatar" height="40" width="40" /></a></div><div class="chat-body"><div class="chat-content"><p>'+data.msg + '</p></div></div></div>';
                            $('.chats').append(op);



                        }



                    });
                }

            });
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
                        url: '{{URL::to('/admins/sendtri_MSG')}}',
                        type: 'POST',
                        dataType: 'JSON',
                        data: {_token: _token, 'message': message, 'from': from,'to':to,'msg_id':msg_id},
                        success: function (data) {

                            $('.user-chats').scrollTop($('.user-chats')[0].scrollHeight);


                            $(".loader").css('display','none');
                            $(".type_msg").val(" ");
                            console.log(data.msg);
                            $(".send_sa_tri").css('display','none');

                            
                            



                        }



                    });
                }

            });
            // $('.a_tag').click(function(){
            //    var hh= $('.name_user').html(str);
            //    alert(hh);
            // });
            $(document).keypress(
                function(event){
                    if (event.which == '13') {
              
                        event.preventDefault();
                        $(".send").click();

                    }
            });

                       





        });
    </script>
    <?php }
?>
<script type="text/javascript">
    $(document).ready(function() {
        window.setInterval(function(){
          
            $.ajax({

                    type: 'get',
                    async:false,
                    url: '{{ URL::to("admins/chat2") }}',
                    success: function(data){

                        console.log(data);

     
                    $('.wiat_list').empty();
                    $('.wiat_list1').empty();
                    $('.wiat_list1').append(data);
                        
                            
                        
                    },
                })

            },10000);
        }); 
            $("#update_user").submit(function(e) {

                    e.preventDefault();
                    var form = $(this);
                
                    $.ajax({
                        url: '{{URL::to('/admins/update_user_by_wsa')}}',
                        type: 'POST',
                        dataType: 'JSON',
                        data: form.serialize(),
                        success: function (data) {
                            if(data == 'success')
                            {
                                alert('User Update')
                                location.reload();


                            }
                            else
                            {
                                alert('Something went wrong!!')
                            }

                        }



                    });
                

            });
            $(document).on("click",'.join_id',function(){


                 var msg_id = $(this).attr('abc');
                 $(".msg_id").val(msg_id);
                 $("#join").submit();

            
            });
            window.setInterval(function(){
                


                var count=$(".count_lent").val();
                for (i = 0; i < count ; i++) {

                    
                    var msg_id=$("#count_msg_id"+i).val();

                    $.ajax({

                        type: 'get',
                        async: false,
                        url: '{{ URL::to('/admins/count_man_unread') }}',
                        data: {
                        'msg_id': msg_id
                        },
                        success: function(data){

                            //$(".play_audio").trigger();
                             if(data.county != 0)
                            {
                                $(".countycir"+i).text(data.county);
                                //$('.toast').toast('show');
      
                            }

                                
                                


                            


                                                    
                                
                            
                        },
                    })
                }    

            },3000);


</script>
</body>
<!-- END: Body-->

</html>
