@extends('layout.master')

@section('services','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

@endsection



@section('main_content')


    <div class="hero" style="    height: 50vh;overflow: hidden;min-height: auto">
        <div class="intro">
            <h1 data-aos="fade-up" data-aos-delay=""> شقق للبيع في جدة </h1>

        </div>
        <div class="slides overlay">

{{--            <img data-cfsrc="{{asset('images/slider/slider-3.jpg')}}" class="active" alt="Image"/>--}}
        </div>
    </div>
    @include('layout.message')



    <div class="untree_co-section estate">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">

                    <h2 class="section-title mb-2">{{$estate->title}}</h2>

                    <div class=" mb-3 " style="direction: ltr;min-height: 50vh">
                        <div class="owl-single dots-absolute owl-carousel " style="min-height: 50vh">

                            @for($i=0;$i<count($estate->images);$i++)
                                <img src="{{asset($estate->images[$i]->src)}}" class="img-fluid {{($i==0)?'active':''}}"
                                >
                            @endfor


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
                <div class="col-lg-5">
                    <div class="row">

                        <div class="col-md-12 ">
                            <h5>نظرة عامة</h5>
                            <div class="col-12 fz-12 f-bold mb-3 justify-content-center">
                                <div class="d-block item ">
                                    <span><img src="{{asset('images/estate/room.png')}}"
                                               alt="" class="mr-2"> عدد الغرف</span>
                                    <span class="fl-left "> {{($estate->room_num)?$estate->room_num:'-'}}</span>
                                </div>
                                <div class="d-block item">
                                    <span><img src="{{asset('images/estate/hole.png')}}"
                                               alt="" class="mr-2"> الصالة</span>
                                    <span class="fl-left ">{{($estate->hole_num)?$estate->hole_num:'-'}}</span>
                                </div>
                                <div class="d-block item">
                                    <span><img src="{{asset('images/estate/bath.png')}}"
                                               alt="" class="mr-2"> عدد دورات المياه</span>
                                    <span class="fl-left ">{{($estate->bath_num)?$estate->bath_num:'-'}}</span>
                                </div>
                                <div class="d-block item">
                                    <span><img src="{{asset('images/estate/kitchen.png')}}"
                                               alt="" class="mr-2"> مطبخ</span>
                                    <span class="fl-left ">{{($estate->kitchen_num)?$estate->kitchen_num:'-'}} </span>
                                </div>
                                <div class="d-block item">
                                    <span><img src="{{asset('images/estate/entrance.png')}}"
                                               alt="" class="mr-2"> مدخل</span>
                                    <span class="fl-left ">{{($estate->enterance_num)?$estate->enterance_num:'-'}} </span>
                                </div>
                                <div class="d-block item">
                                    <span><img src="{{asset('images/estate/area.png')}}"
                                               alt="" class="mr-2"> مساحة البناء</span>
                                    <span class="fl-left ">{{($estate->area)?$estate->area:'-'}} </span>
                                </div>

                                <div class="d-block item">
                                    <span><img src="{{asset('images/estate/area.png')}}"
                                               alt="" class="mr-2"> مساحة الارض</span>
                                    <span class="fl-left ">{{($estate->ground_area)?$estate->ground_area:'-'}} </span>
                                </div>
                                <div class="d-block item">
                                    <span><img src="{{asset('images/estate/area.png')}}"
                                               alt="" class="mr-2"> مساحة الشارع</span>
                                    <span class="fl-left ">{{($estate->street_area)?$estate->street_area:'-'}} </span>
                                </div>

                                    <div class="d-block item">
                                    <span><img src="{{asset('images/estate/area.png')}}"
                                               alt="" class="mr-2">مساحة الشارع 2</span>
                                        <span class="fl-left "> {{($estate->street_area2)?$estate->street_area2:'-'}}</span>
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

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-6 text-center">
                    <h2 class="section-title mb-3 text-center">تقديم طلب</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12">

                            @if(\Illuminate\Support\Facades\Auth::check())
                                <form class="contact-form" data-aos="fade-up" method="POST"
                                      action="{{url('/estate-request')}}">
                                    <input type="hidden" value="{{$estate->id}}" name="id">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="text-black" for="fname">الاسم الاول</label>
                                                <input type="text" class="form-control" id="fname" name="fname"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-black" for="lname">الاسم الاخير</label>
                                                <input type="text" class="form-control" id="lname" name="lname"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-black" for="phone">رقم الجوال</label>
                                                <input type="tel" class="form-control" id="phone" name="phone" required>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-black" for="ref_code">الرقم المرجعي </label>
                                                <input type="text" class="form-control" id="ref_code" name="ref_code" >
                                            </div>

                                        </div>


                                    </div>

                                    <div class="alert alert-success">
                                        <div class="alert-heading">
                                            سيقوم فريق تسويق والمبيعات بالتواصل معك
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">ارسال طلب</button>
                                </form>

                            @else
                                <div class="text-center">
                                    <h4>يجب عليك تسجيل الدخول لتتمكن من ارسال الطلب</h4>
                                    <a class="btn btn-primary m-4" href="{{url('/signup')}}">تسجيل الدخول \ انشاء
                                        حساب</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
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









