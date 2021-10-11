@extends('admin.layout.master')

@section('home','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

@endsection



@section('main_content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">اللوحة</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">اللوحة</a></li>
                            <li class="breadcrumb-item active" aria-current="page">الرئيسية</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-7">

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->



    <div class="container-fluid mt-5">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
          <div class="col-md-12">
              <div class="alert alert-success text-center text-dark  py-2" style=" font-size: 14px;border-radius:100px;;background-color:#65f86370">
                <i style="vertical-align: middle; color: #ffa963; font-size: 15px;" class="mdi mdi-alert"></i>
                جميع المعلومات هنا خاضعه للرقابة ويمنع استخدامها او نسخها خارج الموقع
              </div>
          </div>
            <a class="col-md-3 col-sm-6" href="{{url('dashboard/users')}}">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center flex-row ">
                            <div class="display-7 text-white bg-primary2 p-4"><i class="mdi mdi-account"></i></div>
                            <div class="mx-auto ">
                                <h5 class="m-b-0 text-primary display-5 text-center">{{$statistic['users']}}</h5>
                                <h6 class="text-dark"> العملاء</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="col-md-3 col-sm-6" href="{{url('dashboard/estates')}}">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center flex-row ">
                            <div class="display-7 text-white bg-primary2 p-4"><i class="mdi mdi-account"></i></div>
                            <div class="mx-auto">
                                <h5 class="m-b-0 text-primary display-5 text-center">{{$statistic['employees']}}</h5>
                                <h6 class="text-dark">  الموظفين </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="col-md-3 col-sm-6" href="{{url('dashboard/orders/programming')}}">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center flex-row ">
                            <div class="display-7 text-white bg-primary2 p-4"><i class="mdi mdi-table-edit"></i></div>
                            <div class="mx-auto">
                                <h5 class="m-b-0 text-primary display-5 text-center">{{$statistic['programming_request']}}</h5>
                                <h6 class="text-dark"> طلبات البرمجية</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a class="col-md-3 col-sm-6" href="{{url('dashboard/orders/estates')}}">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center flex-row ">
                            <div class="display-7 text-white bg-primary2 p-4"><i class="mdi mdi-table-edit"></i></div>
                            <div class="mx-auto">
                                <h5 class="m-b-0 text-primary display-5 text-center">{{$statistic['estate_requests']}}</h5>
                                <h6 class="text-dark"> طلبات العقارات </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>


            <a class="col-md-3 col-sm-6" href="{{url('dashboard/clients')}}">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center flex-row ">
                            <div class="display-7 text-white bg-primary2 p-4"><i class="mdi mdi-table-edit"></i></div>
                            <div class="mx-auto">
                                <h5 class="m-b-0 text-primary display-5 text-center">{{$statistic['clients']}}</h5>
                                <h6 class="text-dark"> طلبات التمويل </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>


            <a class="col-md-3 col-sm-6" href="{{url('dashboard/orders/financial')}}">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center flex-row ">
                            <div class="display-7 text-white bg-primary2 p-4"><i class="mdi mdi-table-edit"></i></div>
                            <div class="mx-auto">
                                <h5 class="m-b-0 text-primary display-5 text-center">{{$statistic['financial_request']}}</h5>
                                <h6 class="text-dark"> طلبات الإستفسار </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>


            <a class="col-md-3 col-sm-6" href="{{url('dashboard/regions')}}">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center flex-row ">
                            <div class="display-7 text-white bg-primary2 p-4"><i class="mdi mdi-earth"></i></div>
                            <div class="mx-auto">
                                <h5 class="m-b-0 text-primary display-5 text-center">{{$statistic['cities']}}</h5>
                                <h6 class="text-dark"> المناطق  </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>


            <a class="col-md-3 col-sm-6" href="{{url('dashboard/estates')}}">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center flex-row ">
                            <div class="display-7 text-white bg-primary2 p-4"><i class="mdi mdi-hospital-building"></i></div>
                            <div class="mx-auto">
                                <h5 class="m-b-0 text-primary display-5 text-center">{{$statistic['estates']}}</h5>
                                <h6 class="text-dark"> العقارات  </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="col-md-3 col-sm-6" href="{{url('dashboard/estates')}}">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center flex-row ">
                            <div class="display-7 text-white bg-primary2 p-4"><i class="mdi mdi-hospital-building"></i></div>
                            <div class="mx-auto">
                                <h5 class="m-b-0 text-primary display-5 text-center">{{$statistic['banks']}}</h5>
                                <h6 class="text-dark"> البنوك  </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>


        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->



    </div>

@endsection






<!-- ---------------------------------------------------- -->

@section('page_scripts')

@endsection
