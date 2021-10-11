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
                <h4 class="page-title">{{$helper['title']}} عقار </h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">اللوحة</a></li>
                            <li class="breadcrumb-item"><a href="{{url('dashboard/estates')}}">العقارات</a></li>
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


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label">الاسم</label>
                                    <div class="col-sm-12">
                                        <input required type="text" class="form-control" id="title"
                                               placeholder="ادخل الاسم"
                                               name="title" value="{{$item->title}}">
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label">العنوان</label>
                                    <div class="col-sm-12">
                                        <input required type="text" class="form-control" id="title"
                                               placeholder="ادخل العنوان"
                                               name="address" value="{{$item->address}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label">السعر</label>
                                    <div class="col-sm-12">
                                        <input required type="text" class="form-control" id="title"
                                               placeholder="ادخل السعر"
                                               name="price" value="{{$item->price}}">
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="image" class="col-sm-12 col-form-label">الصورة</label>
                                    <div class="col-sm-12">
                                        <input {{($helper['method']=='PUT')?'':'required'}} type="file"
                                               class="form-control" id="image" name="image"
                                               placeholder="اختر الصورة  ">

                                        @if($item->image)
                                            <img src="{{url($item->image)}}" width="100px"/>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label"> نوع الاضافة </label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="add_type">
                                            <option value="0" {{($item->add_type=='0')?'selected':''}}>مباشر
                                            </option>
                                            <option value="1" {{($item->add_type=='1')?'selected':''}}> غير مباشر</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label">الموقع على الخريطة</label>
                                    <div class="col-sm-12">
                                        <input  type="url" class="form-control" id="title"
                                                placeholder="ادخل الرابط"
                                                name="map" value="{{$item->map}}">
                                    </div>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="name" class="col-sm-12 col-form-label"> الوصف </label>
                                    <div class="col-sm-12">
                                    <textarea required type="text" class="form-control" id="title"
                                              placeholder="ادخل الوصف "
                                              name="description">{{$item->description}}</textarea>
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label"> عدد الغرف </label>
                                    <div class="col-sm-12">
                                        <input  type="number" class="form-control" id="title"
                                               placeholder="ادخل  عدد الغرف"
                                               name="room_num" value="{{$item->room_num}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label"> عدد الصالات </label>
                                    <div class="col-sm-12">
                                        <input  type="number" class="form-control" id="title"
                                               placeholder="ادخل  عدد الصالات"
                                               name="hole_num" value="{{$item->hole_num}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label"> عدد دورات المياه </label>
                                    <div class="col-sm-12">
                                        <input  type="number" class="form-control" id="title"
                                               placeholder="ادخل  عدد دورات المياه"
                                               name="bath_num" value="{{$item->bath_num}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label"> عدد المطابخ </label>
                                    <div class="col-sm-12">
                                        <input  type="number" class="form-control" id="title"
                                               placeholder="ادخل  عدد المطابخ "
                                               name="kitchen_num" value="{{$item->kitchen_num}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label"> عدد المداخل </label>
                                    <div class="col-sm-12">
                                        <input  type="number" class="form-control" id="title"
                                               placeholder="ادخل  عدد المداخل "
                                               name="enterance_num" value="{{$item->enterance_num}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label"> مساحة البناء </label>
                                    <div class="col-sm-12">
                                        <input  type="number" class="form-control" id="title"
                                               placeholder="ادخل  مساحة البناء "
                                               name="area" value="{{$item->area}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label"> مساحة الارض </label>
                                    <div class="col-sm-12">
                                        <input  type="number" class="form-control" id="title"
                                               placeholder="ادخل  مساحة الارض "
                                               name="ground_area" value="{{$item->ground_area}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label"> مساحة الشارع </label>
                                    <div class="col-sm-12">
                                        <input  type="number" class="form-control" id="title"
                                               placeholder="ادخل  مساحة الشارع "
                                               name="street_area" value="{{$item->street_area}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label"> مساحة الشارع 2</label>
                                    <div class="col-sm-12">
                                        <input  type="number" class="form-control" id="title"
                                               placeholder="ادخل  مساحة الشارع 2 "
                                               name="street_area2" value="{{$item->street_area2}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label"> غرفة السائق </label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="driver_room">
                                            <option value="0" {{($item->driver_room=='0')?'selected':''}}>غير موجود
                                            </option>
                                            <option value="1" {{($item->driver_room=='1')?'selected':''}}> موجود
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label"> غرفة الخادمة </label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="maid_room">
                                            <option value="0" {{($item->maid_room=='0')?'selected':''}}>غير موجود
                                            </option>
                                            <option value="1" {{($item->maid_room=='1')?'selected':''}}> موجود</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label"> المصعد </label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="left_num">
                                            <option value="0" {{($item->left_num=='0')?'selected':''}}>غير موجود
                                            </option>
                                            <option value="1" {{($item->left_num=='1')?'selected':''}}> موجود</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label"> خزان مياه مستقل </label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="watertank_num">
                                            <option value="0" {{($item->watertank_num=='0')?'selected':''}}>غير موجود
                                            </option>
                                            <option value="1" {{($item->watertank_num=='1')?'selected':''}}> موجود
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name" class="col-sm-12 col-form-label">المنطقة </label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="cities_id">
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" {{($item->cities_id==$city->id)?'selected':''}}>{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
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

