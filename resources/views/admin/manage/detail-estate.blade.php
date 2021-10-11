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
                            <li class="breadcrumb-item"><a href="{{url('dashboard/estates')}}">العقارات </a></li>
                            <li class="breadcrumb-item active" aria-current="page">تفاصيل</li>
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
                                <div class="col-lg-6">

                                    <h5 class="section-title mb-4 ">{{$estate->title}}</h5>
                                    <hr/>

                                    <div class=" mb-3 " style="direction: ltr;min-height: 50vh">
                                        <div class="owl-single dots-absolute owl-carousel " style="min-height: 50vh">

                                            <img src="{{asset($estate->image)}}" class="img-fluid "
                                            >

                                        </div>
                                    </div>

                                    <p>
                                        {{$estate->description}}
                                    </p>
                                    <a href="{{$estate->map}}" target="_blank"
                                       class="btn btn-primary btn-sm mt-2">عرض الموقع على الخريطة</a>
                                    <div class="d-inline-block h5 f-bold mt-2 float-left">
                                        <span class=" h4">السعر : </span>
                                        <span class="text-primary h4"> {{$estate->price}}</span>
                                        <span class="small">ر.س</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-12 fz-12 f-bold mb-3 justify-content-center">
                                            <div class="d-block item ">
                                    <span><img src="{{asset('images/estate/room.png')}}"
                                               alt="" class="mr-2"> عدد الغرف</span>
                                                <span class="fl-left "> {{$estate->room_num}}</span>
                                            </div>
                                            <div class="d-block item">
                                    <span><img src="{{asset('images/estate/hole.png')}}"
                                               alt="" class="mr-2"> الصالة</span>
                                                <span class="fl-left "> {{$estate->hole_num}}</span>
                                            </div>
                                            <div class="d-block item">
                                    <span><img src="{{asset('images/estate/bath.png')}}"
                                               alt="" class="mr-2"> عدد دورات المياه</span>
                                                <span class="fl-left "> {{$estate->bath_num}}</span>
                                            </div>
                                            <div class="d-block item">
                                    <span><img src="{{asset('images/estate/kitchen.png')}}"
                                               alt="" class="mr-2"> مطبخ</span>
                                                <span class="fl-left "> {{$estate->kitchen_num}}</span>
                                            </div>
                                            <div class="d-block item">
                                    <span><img src="{{asset('images/estate/entrance.png')}}"
                                               alt="" class="mr-2"> مدخل</span>
                                                <span class="fl-left "> {{$estate->enterance_num}}</span>
                                            </div>
                                            <div class="d-block item">
                                    <span><img src="{{asset('images/estate/area.png')}}"
                                               alt="" class="mr-2"> مساحة البناء</span>
                                                <span class="fl-left "> {{$estate->area}}</span>
                                            </div>

                                            <div class="d-block item">
                                    <span><img src="{{asset('images/estate/area.png')}}"
                                               alt="" class="mr-2"> مساحة الارض</span>
                                                <span class="fl-left "> {{$estate->ground_area}}</span>
                                            </div>
                                            <div class="d-block item">
                                    <span><img src="{{asset('images/estate/area.png')}}"
                                               alt="" class="mr-2"> مساحة الشارع</span>
                                                <span class="fl-left "> {{$estate->street_area}}</span>
                                            </div>

                                            <div class="d-block item">
                                    <span><img src="{{asset('images/estate/driver.png')}}"
                                               alt="" class="mr-2"> غرفة السائق</span>
                                                <span class="fl-left "><i
                                                            class="fas  {{($estate->driver_room)?'fa-check':'fa-times'}}"></i></span>
                                            </div>
                                            <div class="d-block item">
                                    <span><img src="{{asset('images/estate/service.png')}}"
                                               alt="" class="mr-2"> غرفة خادمة</span>
                                                <span class="fl-left "><i
                                                            class="fas {{($estate->maid_room)?'fa-check':'fa-times'}}"></i></span>
                                            </div>
                                            <div class="d-block item">
                                    <span><img src="{{asset('images/estate/left.png')}}"
                                               alt="" class="mr-2"> مصعد</span>
                                                <span class="fl-left "><i
                                                            class="fas {{($estate->left_num)?'fa-check':'fa-times'}}"></i></span>
                                            </div>
                                            <div class="d-block item">
                                                <span><img src="{{asset('images/estate/water.png')}}"
                                               alt="" class="mr-2"> خزان مياه مستقل</span>
                                                <span class="fl-left "><i
                                                            class="fas {{($estate->watertank_num)?'fa-check':'fa-times'}}"></i></span>
                                            </div>

                                            <div class="d-block item bg-light-gray p-r-40">
                                                <span>   طريقة الاضافة</span>
                                                <span class="fl-left ">{{($estate->add_type=='0'?'مباشر':'غير مباشر')}}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br/>
                        <div class="col-md-12">
                            <h5 class="section-title mb-3">صور العقار </h5>
                            <hr/>

                            <form action="{{url('dashboard/estates/images')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf()
                                <div class="d-flex ">
                                    <input type="hidden" name="estates_id" value="{{$estate->id}}"/>
                                    <input required type="file" name="image" class="form-control col-10 d-inline-flex"/>
                                    <button type="submit" class="btn btn-primary d-inline-flex mx-3">حفظ الصورة</button>
                                </div>
                            </form>

                            <div class="row">
                                @foreach($estate->images as $img)

                                    <div class="col-md-3" style="height: 30vh;overflow: hidden;padding: 10px;">
                                        <img src="{{url($img->src)}}" class=" img-fluid img-responsive"
                                             style="height: 100%;width: 100%"/>


                                        <form id="delete-form{{$img->id }}"
                                              action="{{url('dashboard/estates/images/' . $img->id)}}" method="POST">
                                            @csrf()
                                            @method('DELETE')
                                        </form>
                                        <a class="btn btn-danger mx-1 text-white position-absolute"
                                           style="top: 20px;left: 20px"
                                           onclick="confirm('Are you sure?')? $('#delete-form{{$img->id}}').submit(): false">
                                            <i class="mdi mdi-delete"></i>
                                        </a>

                                    </div>



                                @endforeach
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection






<!-- ---------------------------------------------------- -->

@section('page_scripts')

@endsection

