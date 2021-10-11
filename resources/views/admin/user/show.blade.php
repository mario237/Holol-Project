@extends('admin.layout.master')

@section('home','active')
@php
$lang=app()->getLocale()
@endphp

@section('page_styles')
<style>
    .item {
        padding: 10px 0;
        border-bottom: 1px solid #c3c5ca;
        font-size: 18px;
    }

    .item img {
        width: 30px;
    }

    .item .fl-left {
        float: left;
        font-weight: bold;
        color: #267ebe;
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
            <h4 class="page-title"> تفاصييل العقار</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{url('dashboard/users')}}"> العملاء</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$user->name}}</li>
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


<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">


                        <div class="row">

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-12 fz-12 f-bold mb-3 justify-content-center">
                                        <div class="d-block item ">
                                            <span> الاسم</span>
                                            <span class="fl-left "> {{$user->name}}</span>
                                        </div>
                                        <div class="d-block item">
                                            <span> البريد الاكتروني</span>
                                            <span class="fl-left "> {{$user->email}}</span>
                                        </div>
                                        <div class="d-block item">
                                            <span>تاريخ الميلاد</span>
                                            <span class="fl-left "> {{$user->birthday}}</span>
                                        </div>
                                        <div class="d-block item">
                                            <span> نوع الموظف
                                            </span>
                                            <span class="fl-left "> {{$user->type}}</span>
                                        </div>
                                        <div class="d-block item">
                                            <span> الادارة</span>
                                            <span class="fl-left "> {{$user->management->name}}</span>
                                        </div>
                                        <div class="d-block item">
                                            <span> المسمى الوظيفي
                                            </span>
                                            <span class="fl-left "> {{$user->job_title}}</span>
                                        </div>
                                        <div class="d-block item">
                                            <span> الرقم الوظيفي</span>
                                            <span class="fl-left "> {{$user->job_id}}</span>
                                        </div>

                                        <div class="d-block item">
                                            <span> الكود المرجعي</span>
                                            <span class="fl-left ">{{$user->serial_no}}</span>
                                        </div>
                                        <div class="d-block item">
                                            <span> البنك</span>
                                            <span class="fl-left ">{{$user->bank ? $user->bank->name : 'لا يوجد'}}</span>
                                        </div>





                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection






<!-- ---------------------------------------------------- -->

@section('page_scripts')

@endsection