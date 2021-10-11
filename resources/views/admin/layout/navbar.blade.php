<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<style media="screen">
  .ho-key .bell-ring {
    animation: ring 2s alternate-reverse infinite ease-in-out
  }

  @keyframes ring {
    48% {
      transform: rotate(16deg);
    }

    100% {
      transform: rotate(-16deg);
    }
  }

  .ho-key:hover {
    background-color: transparent !important;
  }
</style>
<header class="topbar" data-navbarbg="skin6">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header" data-logobg="skin6">
      <!-- ============================================================== -->
      <!-- Logo -->
      <!-- ============================================================== -->
      <a class="navbar-brand" href="{{url('dashboard')}}">
        <!-- Logo icon -->
        <b class="logo-icon">
          <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
          <!-- Dark Logo icon -->
          <img src="{{get_url(setting('site_logo'))}}" alt="homepage" class="dark-logo" height="65px" />
          <!-- Light Logo icon -->
          <img src="{{get_url(setting('site_logo'))}}" alt="homepage" class="light-logo" height="65px" />
        </b>
        <!--End Logo icon -->
        <!-- Logo text -->
        <span class="logo-text"> </span>
      </a>
      <!-- ============================================================== -->
      <!-- End Logo -->
      <!-- ============================================================== -->
      <!-- This is for the sidebar toggle which is visible on mobile only -->
      <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
      <!-- ============================================================== -->
      <!-- toggle and nav items -->
      <!-- ============================================================== -->
      <ul class="navbar-nav float-left mr-auto">
        <!-- ============================================================== -->
        <!-- Search -->
        <!-- ============================================================== -->

      </ul>
      <!-- ============================================================== -->
      <!-- Right side toggle and nav items -->
      <!-- ============================================================== -->
      <ul class="navbar-nav float-right">
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <li class="nav-item mx-2 d-inline-flex align-items-center ho-key ">
          <button style="padding: 5px 10px; border-radius: 100px; background-color: #e5fdf0; border: 0; color: #2cb82c;" class="d-flex align-items-center justify-content-between" type="button" name="button">
            <span class="bell-ring"> <i style="color: #9f26ce; font-size:20px" class="mdi mdi-bell-ring"></i> </span>
            <span class="mx-3">طلبات التمويل الجديدة</span>
            <span class="badge badge-success">1 </span>
          </button>
        </li>
        <li class="nav-item  d-inline-flex align-items-center ho-key">
          <button style="padding: 5px 10px; border-radius: 100px; background-color: #ffc57936; border: 0; color: #de9050;" class="d-flex align-items-center justify-content-between" type="button" name="button">
            <span class="bell-ring"> <i style="    color: #ffa963;font-size:20px" class="mdi mdi-bell-ring"></i> </span>
            <span class="mx-3"> طلبات الاستفسارات </span>
            <span class="badge badge-warning">2</span>
          </button>
        </li>
        <li class="nav-item  mx-2 d-inline-flex align-items-center ho-key position-relative">
          <i style="color: #2a61ad;font-size:25px" class="mdi mdi-email"></i>
          <span style="position: absolute; top: 12px; left: -10px;" class="badge badge-danger">0</span>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{asset('admin/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31"></a>
          <div class="dropdown-menu dropdown-menu-right user-dd animated">
            <a class="dropdown-item" href="{{url('dashboard/setting')}}">
              <i class="ti-settings m-r-5 m-l-5"></i>
              اعدادات الحساب
            </a>
            <a class="dropdown-item" href="{{url('dashboard/users/logout')}}">
              <i class="fa fa-power-off m-r-5 m-l-5"></i>
              تسجيل الخروج

            </a>
          </div>
        </li>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
      </ul>
    </div>
  </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->