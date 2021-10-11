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
                <h4 class="page-title">{{$helper['title']}} فرصة عمل</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">اللوحة</a></li>
                            <li class="breadcrumb-item"><a href="{{url('dashboard/jobs')}}">الوظائف</a></li>
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


                        <form action="{{$helper['action']}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field($helper['method']) }}
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">العنوان</label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control" id="title" placeholder="ادخل العنوان"
                                           name="title" value="{{$item->title}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">الصورة</label>
                                <div class="col-sm-10">
                                    <input {{($helper['method']=='PUT')?'':'required'}} type="file"
                                           class="form-control" id="image" name="image"
                                           placeholder="اختر الصورة  ">

                                    @if($item->image)
                                        <img src="{{url($item->image)}}" width="100px"/>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label"> الوصف المختصر</label>
                                <div class="col-sm-10">
                                    <textarea required type="text" class="form-control" id="title" placeholder="ادخل الوصف المختصر"
                                              name="short_desc" >{{$item->short_desc}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label"> الوصف الكامل</label>
                                <div class="col-sm-10">
                                    <textarea required type="text" class="form-control" id="title" placeholder="ادخل الوصف الكامل"
                                              name="description" >{{$item->description}}</textarea>
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

