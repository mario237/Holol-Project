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
                <h4 class="page-title">اعدادات الحساب</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">اللوحة</a></li>
                            <li class="breadcrumb-item active" aria-current="page">اعدادات الحساب</li>
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
    @if ($errors->any())
        <div class="alert alert-danger mb-0">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-5">


                        <form action="{{url('dashboard/setting')}}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">الاسم الكامل</label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control" id="name" placeholder="ادخل اسمك"
                                           name="name" value="{{$user->name}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">البريد الاكتروني </label>
                                <div class="col-sm-10">
                                    <input required type="email" class="form-control" id="name" placeholder="ادخل ايميلك"
                                           name="email" value="{{$user->email}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">كلمة المرور</label>
                                <div class="col-sm-10">
                                    <input  type="password" class="form-control" id="password" name="password"
                                           placeholder="ادخل كلمة المرور">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cpassword" class="col-sm-2 col-form-label">تأكيد كلمة المرور</label>
                                <div class="col-sm-10">
                                    <input  type="password" class="form-control" id="cpassword" name="cpassword"
                                            placeholder="ادخل التاكيد">
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="w-100 text-left ">
                                    <button type="submit" class="btn btn-primary">تحديث المعلومات</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>

@endsection






<!-- ---------------------------------------------------- -->

@section('page_scripts')

@endsection

