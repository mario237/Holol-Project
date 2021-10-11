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
            <h4 class="page-title">تعديل موظف</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">اللوحة</a></li>
                        <li class="breadcrumb-item"><a href="{{url('dashboard/employees')}}">الموظفين</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تعديل موظف</li>
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


                    <form action="{{route($route.'.update',$edit->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">الاسم</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="name" placeholder="ادخل الاسم" name="name" value="{{old('name',$edit->name)}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">الجوال</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="mobile" placeholder="ادخل الجوال" name="mobile" value="{{old('mobile',$edit->mobile)}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                            <div class="col-sm-10">
                                <input required type="email" class="form-control" id="email" placeholder="ادخل البريد الالكتروني" name="email" value="{{old('email',$edit->email)}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">كلمة المرور</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" placeholder="ادخل كلمة المرور" name="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank_id" class="col-sm-2 col-form-label">البنك </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="bank_id">
                                    <option value="">غير محدد</option>
                                    @foreach(App\Models\Bank::all() as $bank)
                                    <option value="{{$bank->id}}" {{old('bank_id',$edit->bank_id) ==  $bank->id ?'selected':''}}>
                                        {{$bank->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="active" class="col-sm-2 col-form-label">حالة التفعيل </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="active">
                                    <option value="1" {{old('active',$edit->active) == 1 ?'selected':''}}>مفعل</option>
                                    <option value="0" {{old('active',$edit->active) == 0 ?'selected':''}}>غير مفعل</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="w-100 d-flex justify-content-between ">
                                <button type="reset" class="btn btn-dark">مسح البيانات</button>
                                <button type="submit" class="btn btn-primary">تعديل موظف</button>
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