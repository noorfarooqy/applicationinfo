<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="/appinfo/assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="/appinfo/assets/images/brand/logo-1.png" class="header-brand-img toggle-logo" alt="logo">
                <img src="/appinfo/assets/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
                <img src="/appinfo/assets/images/brand/logo-3.png" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
               @foreach (config('appinfo.sidebar_menu') as $menu)
                 <li class="sub-category">
                    <h3>{{$menu['menu_category']}} </h3>
                </li>
                @foreach ($menu['main_menu'] as $sub_menu)
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-users"></i><span class="side-menu__label">{{$sub_menu['name']}}</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="{{$sub_menu['route']}}">Customers</a></li>
                        @foreach ($sub_menu['sub_menu'] as $sub_submenu)
                        <li><a href="{{$sub_submenu['route']}}" class="slide-item"> {{$sub_submenu['name']}} </a></li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
               @endforeach

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
    <!--/APP-SIDEBAR-->
</div>
