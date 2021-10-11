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
            <h4 class="page-title">{{$helper['title']}} موظف</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">اللوحة</a></li>
                        <li class="breadcrumb-item"><a href="{{url('dashboard/users')}}">المستخدمين</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$helper['title']}}</li>
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


                    <form action="{{$helper['action']}}" method="POST">
                        @csrf
                        {{ method_field($helper['method']) }}
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">الاسم</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="name" placeholder="ادخل الاسم" name="name" value="{{$item->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">البريد الاكتروني</label>
                            <div class="col-sm-10">
                                <input required type="email" class="form-control" id="username" name="email" value="{{$item->email}}" placeholder="ادخل البريد الاكتروني">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">تاريخ الميلاد</label>
                            <div class="col-sm-10">
                                <input required type="date" class="form-control" name="birthday" value="{{$item->birthday}}" placeholder="ادخل تاريخ الميلاد">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">كلمة المرور</label>
                            <div class="col-sm-10">
                                <input {{($helper['method']=='PUT')?'':'required'}} type="password" class="form-control" id="password" name="password" placeholder="ادخل كلمة المرور">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">تأكيد كلمة المرور</label>
                            <div class="col-sm-10">
                                <input {{($helper['method']=='PUT')?'':'required'}} type="password" class="form-control" id="password" name="cpassword" placeholder="ادخل تاكيد كلمة المرور">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label"> نوع الموظف </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="type">
                                    <option value="0" {{($item->type=='0')?'selected':''}}>مستخدم
                                    </option>
                                    <option value="1" {{($item->type=='1')?'selected':''}}>موظف ادارة عقارات
                                    </option>
                                    <option value="2" {{($item->type=='2')?'selected':''}}>موظف ادارة تمويل</option>
                                    <option value="3" {{($item->type=='3')?'selected':''}}>موظف ادارة برمجيات
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">الادارة </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="managements_id">
                                    <option value="0">غير محدد
                                    </option>
                                    @foreach($managements as $manage)
                                    <option value="{{$manage->id}}" {{($manage->id==$item->managements_id)?'selected':''}}>{{$manage->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">المسمى الوظيفي</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="job_title" placeholder="ادخل المسمى الوظيفي" name="job_title" value="{{$item->job_title}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">الرقم الوظيفي</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="job_id" placeholder="ادخل الرقم الوظيفي" name="job_id" value="{{$item->job_id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">الكود المرجعي </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="job_id" placeholder="ادخل الكود المرجعي" name="serial_no" value="{{$item->serial_no}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">البنك </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="bank_id">
                                    <option value="0">غير محدد
                                    </option>
                                    @foreach($banks as $bank)
                                    <option value="{{$bank->id}}" {{($bank->id==$item->bank_id)?'selected':''}}>{{$bank->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="w-100 d-flex justify-content-between ">
                                <button type="reset" class="btn btn-dark">مسح البيانات</button>
                                <button type="submit" class="btn btn-primary">{{$helper['title']}}</button>
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