@php $site=App\Models\site_setting::all(); @endphp

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="html/ltr/vertical-menu-template/index.html">
                    <div class="">
                          @if($site[0]->file != null)

                          <img src="{{url('upload/images/' .$site[0]->file)  }}" style="width:30px;">
                          @else
                          <img src="{{asset('admin/app-assets/images/logo/vuexy-logo.png')}}" style="width:30px;">

                          @endif

                    </div>
                    <h2 class="brand-text mb-0">{{Auth::user()->name}}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

              <li class=" navigation-header">.
            </li>
            <li class=""><a href="{{url('admins/')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>


            <li class="nav-item {{ (  request()->is('admins/add_ws')) ? 'open' : '' }} {{ (  request()->is('admins/view_ws')) ? 'open' : '' }}
                "><a href=""><i class="feather icon-user"></i><span class="menu-title" data-i18n="profile">Managment</span></a>
                <ul class="menu-content">
                    <li><a href="{{url('admins/add_ws')}}" class="{{ (request()->is('admins/add_ws')) ? 'active' : '' }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Add Managment</span></a>
                    </li>
                    <li><a href="{{url('admins/view_ws')}}" class="{{ (request()->is('admins/view_ws')) ? 'active' : '' }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">View Managment</span></a>
                    </li>


                </ul>

            </li>
            <li class=""><a href="{{url('admins/user')}}" class="{{ (request()->is('admins/user')) ? 'active' : '' }}"><i class="feather icon-user-plus"></i><span class="menu-title" data-i18n="Dashboard">Manage Users</span></a>
            </li>
            <li class="nav-item {{ (  request()->is('admins/add_fortune')) ? 'open' : '' }} {{ (  request()->is('admins/view_fortune')) ? 'open' : '' }}
                "><a href=""><i class="feather icon-user"></i><span class="menu-title" data-i18n="profile">Fortune</span></a>
                <ul class="menu-content">
                    <li><a href="{{url('admins/add_fortune')}}" class="{{ (request()->is('admins/add_fortune')) ? 'active' : '' }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Add Fortune</span></a>
                    </li>
                    <li><a href="{{url('admins/view_fortune')}}" class="{{ (request()->is('admins/view_fortune')) ? 'active' : '' }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">View Fortune</span></a>
                    </li>


                </ul>

            </li>




           <li class=""><a href="{{url('admins/chat')}}" class="{{ (request()->is('admins/chat')) ? 'active' : '' }}"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Dashboard">Chat</span></a>
            </li>
            <li class=""><a href="{{url('admins/pointshistory')}}" class="{{ (request()->is('admins/pointshistory')) ? 'active' : '' }}"><i class="la la-usd"></i><span class="menu-title" data-i18n="Dashboard">Points history</span></a>
            </li>
               






        </ul>
    </div>
</div>
