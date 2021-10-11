<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown m-t-20">
                        <div class="user-pic"><img src="{{asset('admin/images/users/1.jpg')}}" alt="users" class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu mx-2 mt-1">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="m-b-0 user-name font-medium">{{\Illuminate\Support\Facades\Auth::user()->name}}
                                    <i class="fa fa-angle-down"></i>
                                </h5>
                                <span class="op-5 user-email">{{\Illuminate\Support\Facades\Auth::user()->email}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">

                                <a class="dropdown-item" href="{{url('dashboard/setting')}}"><i class="ti-settings m-r-5 m-l-5"></i> ادارة الحساب</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('dashboard/users/logout')}}"><i class="fa fa-power-off m-r-5 m-l-5"></i> تسجيل الخروج</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- User Profile-->
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">الرئيسية</span></a></li>
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/dashboard/settings')}}" aria-expanded="false"><i class="mdi mdi mdi-settings"></i><span class="hide-menu">الإعدادات</span></a></li>
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('dashboard/users')}}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu"> المشرفين</span></a></li>
                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['4']) )
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('dashboard/employees')}}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu"> الموظفين</span></a></li>
                @endif
                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['4']) )
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('dashboard/users')}}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">العملاء</span></a></li>
                @endif

                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="https://www.management.zz.const-tech.biz/dashboard/consult" aria-expanded="false"><i class="mdi mdi-table-large"></i><span class="hide-menu">الإستفسارات</span></a></li>
                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['1','2','3','4']) )
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('dashboard/clients')}}" aria-expanded="false"><i class="mdi mdi-table-large"></i><span class="hide-menu"> طلبات التمويل</span></a></li>
                @endif

                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['1','4']) )
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('dashboard/orders/estates')}}" aria-expanded="false"><i class="mdi mdi-table-edit"></i><span class="hide-menu">طلبات العقارات</span></a>
                </li>
                @endif

                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['2','4']) )
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('dashboard/orders/financial')}}" aria-expanded="false"><i class="mdi mdi-table-edit"></i><span class="hide-menu">طلبات التمويل</span></a></li>
                @endif
                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['3','4']) )
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('dashboard/orders/programming')}}" aria-expanded="false"><i class="mdi mdi-table-edit"></i><span class="hide-menu">طلبات البرمجية</span></a>
                </li>
                @endif
                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['4']) )
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('dashboard/orders/jobs')}}" aria-expanded="false"><i class="mdi mdi-file-document"></i><span class="hide-menu">طلبات التوظيف</span></a>
                </li>
                @endif
                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['4']) )
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('dashboard/jobs')}}" aria-expanded="false"><i class="mdi mdi-access-point"></i><span class="hide-menu"> الوظائف</span></a></li>
                @endif
                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['1','4']) )
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('dashboard/estates')}}" aria-expanded="false"><i class="mdi mdi-hospital-building"></i><span class="hide-menu"> العقارات</span></a>
                </li>
                @endif
                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['1','4']) )

                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('dashboard/regions')}}" aria-expanded="false"><i class="mdi mdi-earth"></i><span class="hide-menu"> المناطق</span></a></li>

                @endif
                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['4']) )
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('dashboard/sliders')}}" aria-expanded="false"><i class="mdi mdi-image-album"></i><span class="hide-menu"> الاعلانات</span></a></li>
                @endif
                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['4']) )
                <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('dashboard/banks')}}" aria-expanded="false"><i class="mdi mdi-image-album"></i><span class="hide-menu"> البنوك</span></a></li>
                @endif
                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['4']) )
                <!-- <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('dashboard/banks')}}" aria-expanded="false"><i class="mdi  mdi-phone"></i><span class="hide-menu"> اتصل بنا</span></a></li> -->
                @endif




            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->