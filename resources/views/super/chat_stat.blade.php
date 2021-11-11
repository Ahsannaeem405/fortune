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
    <title>Statistic</title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/forms/select/select2.min.css')}}">

    <!-- END: Custom CSS-->

</head>
<style>
.user-chats{
    overflow: hidden;
}


    .navbar-nav{
        width: 100%;
        display: flex;
        


    }
    .nav-item{
        margin-left: auto!important;

    }
    .nav-item2{
        padding-top:1.4%;
        display: none!important;

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
    @include('super.layouts.navbar')

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('super.layouts.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->

    <div class="app-content content" style="display:flex;">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper" style="width:75%">
            <div class="sidebar-left">
                <div class="sidebar" >
                    <!-- User Chat profile area -->

                    <!--/ User Chat profile area -->
                    <!-- Chat Sidebar area -->
                    <div class="sidebar-content card" style="width:300px;">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                        <div class="chat-fixed-search" style="width:300px;">
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
                        <div id="users-list" class="chat-user-list list-group position-relative" style="width:300px;">

                            <h3 class="primary p-1 mb-0">Chats</h3>
                            <ul class="chat-users-list-wrapper media-list">
                                    <li class="list_con">
                                    @if($msg_con_list !=0)    
                                    @foreach($msg as $row_msg)
                                    <a href="{{url('super/stat_msg/' .$row_msg->msg_id. '/' .$row_msg->manager_id)}}">
                                        
                                    
                                        <span class="get_msg" style="display:flex;" abc="{{$row_msg->msg_id}}" bcd="{{$row_msg->manager_id}}">
                                            
                                        <div class="pr-1" abc="{{$row_msg->id}}" bcd="{{$row_msg->manager_id}}">
                                            <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                                    src="{{asset('images/avatar.jpg')}}"
                                                    height="42" width="42" alt="Generic placeholder image">
                                                <i></i>
                                            </span>
                                        </div>

                                        <div class="contact-info" style="width:100%;">
                                            <h4 class="font-weight-bold mb-0" class="name_user">{{$row_msg->msg_list->getuser->name}}</h4>
                                            <p class="truncate">Conected With {{$row_msg->msg_list->getuser2->name}}<br></p>
                                        </div>
                                        </span>
                                    </a>    


                                        @endforeach
                                    @endif        
                                    </li>
                                    
                               

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
                            @if($msg_list_chek ==0)
                                <div class="start-chat-area">
                                    <span class="mb-1 start-chat-icon feather icon-message-square"></span>
                                    <h4 class="py-50 px-1 sidebar-toggle start-chat-text">Start Conversation</h4>
                                </div>
                            @endif    
                            @if($msg_list_chek !=0)
                                    
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
                                        <div class="chats all_chats ">
                                            <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a class="avatar m-0" data-toggle="tooltip" href="#"data-placement="left" title="" data-original-title="">
                                                    <img src="{{ asset('images/avatar.jpg') }}"alt="avatar" height="40" width="40" />
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                @foreach($msg_list as $row_msg)
                                                    <div class="chat-content"><p>{{$row_msg->msg}}</p>
                                                    <span style="font-size:12px;">{{$row_msg->created_at->format('d-M-y h:i A')}}</span>
                                                    </div>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endif
                                    
                        </section>

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
                                    <h4 class="chat-user-name"></h4>
                                </div>
                            </header>
                            
                        </div>
                    
                    

                    </div>
                </div>
            </div>
        </div>
         <div class="request"  style="width:25%">
            <div class="box">
                <div class="data">
                    <div class="pr-1 get_list" style="display: flex;">

                            
                            <h3 class="font-weight-bold" style="cursor: pointer;">
                                  Select Worker
                            </h3>
                            <hr>
                    </div>  
                    @foreach($mana as $row)
                    <div class="wiat_list pt-1 pb-1">
                        <a href="{{url('super/get_list_stat/' .$row->id)}}">

                        <div class="pr-1" style="display: flex;" abc="{{$row->id}}">
                            
                            <span class="m-0 avatar-md"><img class="media-object rounded-circle"
                                        src="{{ asset('images/avatar.jpg') }}"
                                        height="42" width="42" alt="Generic placeholder image">
                                <i></i>
                            </span>
                           
                            <h5 class="font-weight-bold ml-1 mb-0" style="cursor: pointer;">
                                {{$row->name}}
                            </h5>
                        
                           
                        </div>
                        </a>    

                    </div> 
                     @endforeach                           
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
    <script src="{{ asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>


    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin/app-assets/js/scripts/pages/app-chat.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- END: Page JS-->
    <script type="text/javascript">
        $(document).ready(function() {
            $(".get_list").click(function () {
               
                

                var id=$(this).attr('abc');
                

                    $.ajax({
                        url: '{{URL::to('/admins/show_chat_his')}}',
                        type: 'get',
                        data: {id: id},
                        success: function (data) {
                            $('.list_con').empty();
                            
                            $('.list_con').append(data);

                            



                        },



                    })
                

            });
            $(document).on("click",'.get_msg',function(){


                var id=$(this).attr('abc');
                var manager_id=$(this).attr('bcd');
               

                    $.ajax({
                        url: '{{URL::to('/admins/get_msg_his')}}',
                        type: 'get',
                        data: {id: id, manager_id:manager_id},
                        success: function (data) {
                            $(".all_chats").empty();
                            $(".all_chats").append(data);
                            
                            



                        },



                    })
                

            });
        });    

    </script>


</body>
<!-- END: Body-->

</html>
