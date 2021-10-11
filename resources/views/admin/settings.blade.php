@extends('admin.layout.master')

@section('home','active')
@php
$lang=app()->getLocale()
@endphp

@section('page_styles')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
<style>
    .bg-blue {
        background-color: rgba(59, 130, 244, 0.4) !important;
    }

    .bg-red {
        background-color: rgba(225, 12, 21, 0.46) !important;
    }

    .bg-green {
        background-color: rgba(63, 183, 31, 0.46) !important;
    }

    .bg-yellow {
        background-color: rgba(183, 180, 22, 0.46) !important;
    }
</style>
@endsection



@section('main_content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-5">
            <h4 class="page-title"> الإعدادت</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">اللوحة</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> الإعدادت</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->



<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <form action="{{url('dashboard/settings')}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body ">
                        <div class="">
                            <h4 class="card-title">ادارة الإعدادت</h4>
                            <div class="row w-100 mx-0 px-0">
                                <div class="col-md-4 mb-2">
                                    <label for=""> اسم الموقع</label>
                                    <input class="form-control" type="text" name="site_name" value="{{old('site_name',setting('site_name'))}}">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for=""> شعار الموقع </label>
                                    <input class="form-control" type="file" name="site_logo" value="">
                                    @if(setting('site_logo'))
                                    <img src="{{get_url(setting('site_logo'))}}" width="100" height="100">
                                    @endif
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for=""> ايقونة المتصفح </label>
                                    <input class="form-control" type="file" name="site_icon" value="">
                                    @if(setting('site_icon'))
                                    <img src="{{get_url(setting('site_icon'))}}" width="100" height="100">
                                    @endif
                                </div>
                                <div class="col-md-12 my-3">
                                    <div class="ml-3 d-inline-block">
                                        <input type="hidden" name="stop_site" checked value='0'>
                                        <input id="stop_site" type="checkbox" name="stop_site" value="1" {{old('stop_site',setting('stop_site')) ? 'checked' : ''}}>
                                        <label for="stop_site"> ايقاف الموقع </label>
                                    </div>
                                    <!-- <div class="ml-3 d-inline-block">
                                    <input class="" type="checkbox" name="" value="">
                                    <label for=""> ايقاف تسجيل العملاء</label>
                                </div> -->
                                    <!-- <div class="ml-3 d-inline-block">
                                    <input class="" type="checkbox" name="" value="">
                                    <label for=""> ايقاف طلبات الاستسفارات </label>
                                </div> -->
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="">رسالة اغلاق الموقع </label>
                                    <textarea class="form-control" name="stop_site_message" rows="5" cols="80">{{setting('stop_site_message')}}</textarea>
                                </div>
                                <div class="form-group ">
                                    <div class="w-100 text-left ">
                                        <button type="submit" class="btn btn-primary">تحديث المعلومات</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
    </form>
    @endsection