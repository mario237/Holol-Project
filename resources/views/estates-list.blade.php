@extends('layout.master')

@section('services','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

@endsection



@section('main_content')


    <div class="hero">
        <div class="intro">
            <h1 data-aos="fade-up" data-aos-delay=""> العقارات في {{$city->name}} </h1>
            <p class="text-white">
                شركه حلول الأعمال المحدودة رائده ومتخصصه في المجال العقاري صممت شركة حلول الأعمال المحدودة كل البرامج
                لتلائم ظروف العملاء الفرديه وضمان المرونه القصوى والاستجابه لكل المعاملات
            </p>
        </div>
        <div class="slides overlay">

            <img data-cfsrc="{{asset($city->image)}}" class="active" alt="Image"/>
        </div>
    </div>




    <div class="untree_co-section">
        <div class="container">
            <div class="row">

                @foreach($estates as $item)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="job media-1">
                            <div class="head-img">
                                <a href="{{url('/services/estates/detail/'.$item->id)}}" class="d-block mb-3 ">
                                    <img data-cfsrc="{{asset($item->image)}}" alt="Image" class="img-fluid">
                                </a>
                            </div>
                            <div class="job-body p-3">
                                <h5>{{$item->title}}</h5>
                                <div class="d-flex align-items-center loc text-left">
                                    <span class="icon-room "></span>
                                    <span>
                                        {{$item->address}}
                                    </span>
                                </div>

                                <div class="d-block  mt-2 details row">
                                    <div class="d-inline-block item mr-2">
                                    <span class="mr-2 lcolorTxt">
                                        <img src="{{asset('images/estate/room.png')}}" width="20px">
                                    </span>
                                        <span class="fz-9">عدد الغرف {{$item->room_num}}</span>
                                    </div>
                                    <div class="d-inline-block item mr-2">
                                    <span class="mr-2 lcolorTxt">
                                         <img src="{{asset('images/estate/entrance.png')}}" width="20px">
                                    </span>
                                        <span class="fz-9">المداخل  {{$item->entrance_num}}  </span>
                                    </div>
                                    <div class="d-inline-block item mr-2">
                                    <span class="mr-2 lcolorTxt">
                                        <img src="{{asset('images/estate/hole.png')}}" width="20px">
                                    </span>
                                        <span class="fz-9">الصالة {{$item->hole_num}} </span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <div class="d-inline-block h5 f-bold mt-2">
                                        <span class="text-primary">{{$item->price}}</span>
                                        <span class="small">ر.س</span>
                                    </div>
                                    <a href="{{url('/services/estates/detail/'.$item->id)}}"
                                       class="btn btn-primary btn-sm">مشاهدة التفاصيل</a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>


    <div class="py-5 bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="mb-2 text-white">هل لديك ايه مشكلة يمكننا المساعدة في حلها لك </h2>
                    <p class="mb-4 lead text-white text-white-opacity">يمكنك الان التواصل معنا مباشرة من اجل الحصول على
                        استشارات خاصة بكل ما يتعلق بالحلول التمويلية والعقارية</p>
                    <p class="mb-0"><a href="/contactus"
                                       class="btn btn-outline-white text-white btn-md font-weight-bold">اتصل بنا</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page_scripts')
    <script>

        $('#job').on('change', function () {
            if ($(this).val() === '1') {
                $('#job_type').html('' +
                    '  <option value="0"> قطاع عام</option>\n' +
                    '  <option value="1">  قطاع خاص</option>');
            } else {
                $('#job_type').html('' +
                    '  <option value="0"> عقيد </option>\n' +
                    '  <option value="1">  عميد </option>');
            }
        });
    </script>

@endsection









