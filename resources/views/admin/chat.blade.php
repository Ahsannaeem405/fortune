<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Chat</title>
    <link rel="apple-touch-icon" href="{{ asset('admin/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css/pages/app-chat.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css')}}">

    <!-- END: Custom CSS-->

</head>
<style>
    .request{
        width: 30%;
        display: inline-block !important;
        padding-top:110px;
    }
    .box{
        background-color: white;
        overflow-y: scroll;
        height: 470px;
        padding: 20px;

    }
    .data{
        margin-top: 10px;
    }
    @media only screen and (max-width: 769px) {
        .request{
            display: none !important;
        }
    }
</style>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern content-left-sidebar chat-application navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">

    <!-- BEGIN: Header-->
    @include('admin.layouts.navbar')

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    {{-- @include('admin.layouts.sidebar') --}}
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content" style="margin-left:0px;display:flex;">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper" style="width: 70%">
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
                                        <img src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-11.jpg')}}" alt="user_avatar" height="40" width="40">
                                        <span class="avatar-status-online"></span>
                                    </div>
                                    <div class="bullet-success bullet-sm position-absolute"></div>
                                </div>
                                <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                                    <input type="text" class="form-control round" id="chat-search" placeholder="Search or start a new chat">
                                    <div class="form-control-position">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div id="users-list" class="chat-user-list list-group position-relative">
                            <h3 class="primary p-1 mb-0">Chats</h3>
                            <ul class="chat-users-list-wrapper media-list">

                                @foreach ($approve_msgs as $msg)
                                @php
                                    $msg_dt=App\Models\msg_dt::where('msg_id',$msg->id)->latest()->first();

                                @endphp
                                <li>
                                    <div class="pr-1">
                                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-3.jpg')}}" height="42" width="42" alt="Generic placeholder image">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="user-chat-info">
                                        <div class="contact-info">
                                            <h5 class="font-weight-bold mb-0">{{$msg->getuser->name}}}</h5>
                                            <p class="truncate">{{$msg_dt->message}}</p>
                                        </div>
                                        <div class="contact-meta">
                                            <span class="float-right mb-25">{{$msg_dt->created_at}}</span>
                                            <span class="badge badge-primary badge-pill float-right">3</span>
                                        </div>
                                    </div>
                                </li>
                                @endforeach


                                <li>
                                    <div class="pr-1">
                                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-7.jpg')}}" height="42" width="42" alt="Generic placeholder image">
                                            <i></i>
                                        </span>
                                    </div>
                                    <div class="user-chat-info">
                                        <div class="contact-info">
                                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>
                                            <p class="truncate">Cake pie jelly jelly beans. Marzipan lemon drops halvah cake. Pudding cookie lemon drops icing</p>
                                        </div>
                                        <div class="contact-meta">
                                            <span class="float-right mb-25">9:09 AM</span>
                                        </div>
                                    </div>
                                </li>









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
                            <div class="start-chat-area">
                                <span class="mb-1 start-chat-icon feather icon-message-square"></span>
                                <h4 class="py-50 px-1 sidebar-toggle start-chat-text">Start Conversation</h4>
                            </div>
                            <div class="active-chat d-none">
                                <div class="chat_navbar">
                                    <header class="chat_header d-flex justify-content-between align-items-center p-1">
                                        <div class="vs-con-items d-flex align-items-center">
                                            <div class="sidebar-toggle d-block d-lg-none mr-1"><i class="feather icon-menu font-large-1"></i></div>
                                            <div class="avatar user-profile-toggle m-0 m-0 mr-1">
                                                <img src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-1.jpg')}}" alt="" height="40" width="40" />
                                                <span class="avatar-status-busy"></span>
                                            </div>
                                            <h6 class="mb-0">Felecia Rower</h6>
                                        </div>
                                        <span class="favorite"><i class="feather icon-star font-medium-5"></i></span>
                                    </header>
                                </div>
                                <div class="user-chats">
                                    <div class="chats">
                                        <div class="chat">
                                            <div class="chat-avatar">
                                                <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                                    <img src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-1.jpg')}}" alt="avatar" height="40" width="40" />
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>How can we help? We're here for you!</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
                                                    <img src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-7.jpg')}}" alt="avatar" height="40" width="40" />
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
                                            </div>
                                        </div>
                                        <div class="divider">
                                            <div class="divider-text">Yesterday</div>
                                        </div>
                                        <div class="chat">
                                            <div class="chat-avatar">
                                                <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                                    <img src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-1.jpg')}}" alt="avatar" height="40" width="40" />
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>Absolutely!</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>Vuexy admin is the responsive bootstrap 4 admin template.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
                                                    <img src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-7.jpg')}}" alt="avatar" height="40" width="40" />
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>Looks clean and fresh UI.</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>It's perfect for my next project.</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>How can I purchase it?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat">
                                            <div class="chat-avatar">
                                                <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                                    <img src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-1.jpg')}}" alt="avatar" height="40" width="40" />
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>Thanks, from ThemeForest.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
                                                    <img src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-7.jpg')}}" alt="avatar" height="40" width="40" />
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>I will purchase it for sure.</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>Thanks.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat">
                                            <div class="chat-avatar">
                                                <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                                    <img src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-1.jpg')}}" alt="avatar" height="40" width="40" />
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content">
                                                    <p>Great, Feel free to get in touch on</p>
                                                </div>
                                                <div class="chat-content">
                                                    <p>https://pixinvent.ticksy.com/</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-app-form">
                                    <form class="chat-app-input d-flex" onsubmit="enter_chat();" action="javascript:void(0);">
                                        <input type="text" class="form-control message mr-1 ml-50" id="iconLeft4-1" placeholder="Type your message">
                                        <button type="button" class="btn btn-primary send" onclick="enter_chat();"><i class="fa fa-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Send</span></button>
                                    </form>
                                </div>
                            </div>
                        </section>
                        <!-- User Chat profile right area -->
                        <div class="user-profile-sidebar">
                            <header class="user-profile-header">
                                <span class="close-icon">
                                    <i class="feather icon-x"></i>
                                </span>
                                <div class="header-profile-sidebar">
                                    <div class="avatar">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="user_avatar" height="70" width="70">
                                        <span class="avatar-status-busy avatar-status-lg"></span>
                                    </div>
                                    <h4 class="chat-user-name">Felecia Rower</h4>
                                </div>
                            </header>
                            <div class="user-profile-sidebar-area p-2">
                                <h6>About</h6>
                                <p>Toffee caramels jelly-o tart gummi bears cake I love ice cream lollipop. Sweet liquorice croissant candy danish dessert icing. Cake macaroon gingerbread toffee sweet.</p>
                            </div>
                        </div>
                        <!--/ User Chat profile right area -->

                    </div>
                </div>
            </div>
        </div>
        <div class="request">
            <div class="box">
                <div class="data">
                    <div class="pr-1">
                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-7.jpg')}}" height="42" width="42" alt="Generic placeholder image">
                            <i></i>
                        </span>
                        <button class="btn btn-primary" style="margin-left: 157px;">Join</button>
                    </div><br>
                    <div class="user-chat-info">
                        <div class="contact-info">
                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>

                        </div>

                    </div>
                </div>
                <div class="data">
                    <div class="pr-1">
                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-7.jpg')}}" height="42" width="42" alt="Generic placeholder image">
                            <i></i>
                        </span>
                        <button class="btn btn-primary" style="margin-left: 157px;">Join</button>
                    </div><br>
                    <div class="user-chat-info">
                        <div class="contact-info">
                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>

                        </div>

                    </div>
                </div> <div class="data">
                    <div class="pr-1">
                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-7.jpg')}}" height="42" width="42" alt="Generic placeholder image">
                            <i></i>
                        </span>
                        <button class="btn btn-primary" style="margin-left: 157px;">Join</button>
                    </div><br>
                    <div class="user-chat-info">
                        <div class="contact-info">
                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>

                        </div>

                    </div>
                </div>
                <div class="data">
                    <div class="pr-1">
                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-7.jpg')}}" height="42" width="42" alt="Generic placeholder image">
                            <i></i>
                        </span>
                        <button class="btn btn-primary" style="margin-left: 157px;">Join</button>
                    </div><br>
                    <div class="user-chat-info">
                        <div class="contact-info">
                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>

                        </div>

                    </div>
                </div>
                <div class="data">
                    <div class="pr-1">
                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-7.jpg')}}" height="42" width="42" alt="Generic placeholder image">
                            <i></i>
                        </span>
                        <button class="btn btn-primary" style="margin-left: 157px;">Join</button>
                    </div><br>
                    <div class="user-chat-info">
                        <div class="contact-info">
                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>

                        </div>

                    </div>
                </div>
                <div class="data">
                    <div class="pr-1">
                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="{{ asset('admin/app-assets/images/portrait/small/avatar-s-7.jpg')}}" height="42" width="42" alt="Generic placeholder image">
                            <i></i>
                        </span>
                        <button class="btn btn-primary" style="margin-left: 157px;">Join</button>
                    </div><br>
                    <div class="user-chat-info">
                        <div class="contact-info">
                            <h5 class="font-weight-bold mb-0">Kristopher Candy</h5>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->

    <!-- END: Footer-->


     <script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('admin/app-assets/js/core/app.js')}}"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin/app-assets/js/scripts/pages/app-chat.js')}}"></script>

    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
