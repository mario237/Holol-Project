<div class="lines-wrap">
    <div class="lines-inner">
        <div class="lines"></div>
    </div>
</div>

<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body text-left"></div>
</div>
<nav class="site-nav navbar-light">
    <div class="container">
        <li class="site-navigation">
            <a href="/" class="logo m-0">

                <img src="{{asset('images/logo.jpg')}}" height="70px" style="margin-top: -10px"/>
            </a>
            <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-left">
                <li class="@yield('home')"><a href="/">الرئيسية</a></li>
                <li class="has-children @yield('services')">
                    <a href="/services">الخدمات</a>
                    <ul class="dropdown">
                        <li><a href="/services/estates">حلول عقارية</a></li>
                        <li><a href="/services/financial">حلول تمويلية</a></li>
                        <li><a href="/services/programming">حلول برمجية</a></li>

                    </ul>
                </li>
                <li class=" @yield('jobs')"><a href="/jobs">الوظائف الشاغرة</a></li>
                <li class=" @yield('about')"><a href="/aboutus">حولنا</a></li>
                <li class=" @yield('contact')"><a href="/contactus">اتصل بنا</a></li>

                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="dropdown">

                        <a class="btn btn-primary text-white dropdown-toggle" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           {{\Illuminate\Support\Facades\Auth::user()->name}}
                        </a>


                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{url('/profile')}}">الملف الشخصي</a>
                            <a class="dropdown-item" href="{{url('/logout')}}">تسجيل الخروج</a>
                        </div>
                    </li>
                @else
                    <li><a class="btn btn-primary text-white" href="/signup">
                            تقدم بطلبك الان
                        </a></li>
                @endif


            </ul>
            <a href="#" class="burger ml-auto float-left site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
               data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>
    </div>
    </div>
</nav>