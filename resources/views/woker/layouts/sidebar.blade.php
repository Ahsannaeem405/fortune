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
            <li class="{{ Request::is('woker')? 'active' : '' }}"><a href="{{url('woker')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>

           


        </ul>
    </div>
</div>
