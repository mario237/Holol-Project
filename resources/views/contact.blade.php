@extends('layout.master')

@section('contact','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

@endsection



@section('main_content')


    <div class="hero inner">
        <div class="intro">
            <h1 data-aos="fade-up" data-aos-delay="">اتصل بنا </h1>
            <p class="text-white">

                شركه حلول الأعمال المحدودة رائده ومتخصصه في المجال العقاري صممت شركة حلول الأعمال المحدودة كل البرامج
                لتلائم ظروف العملاء الفرديه وضمان المرونه القصوى والاستجابه لكل المعاملات

            </p>
        </div>
        <div class="slides overlay">

            {{--<img data-cfsrc="images/slider/slider-1.jpg" class="active" alt="Image" style="display:none;visibility:hidden;"><noscript><img src="images/slider/slider-1.jpg" class="active" alt="Image"></noscript>--}}
        </div>
    </div>

    @include('layout.message')
    <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14873.663404916933!2d40.40327335297435!3d21.255000533641443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e98f89f0dfc1e7%3A0xaea0b8d105a3cd94!2z2LTYsdmD2Kkg2K3ZhNmI2YQg2KfZhNij2LnZhdin2YQg2KfZhNmF2K3Yr9mI2K_YqQ!5e0!3m2!1sen!2ssa!4v1605260629698!5m2!1sen!2ssa" width="100%"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <div class=" mb-5">
                    <strong class="subtitle" data-aos="fade-up" data-aos-delay="0">اتصل بنا</strong>
                    <h2 class="heading" data-aos="fade-up" data-aos-delay="100">ابق على تواصل معنا</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <form class="contact-form" data-aos="fade-up"  action="{{url('/contact/send')}}">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-black" for="fname">الاسم الاول</label>
                                <input required type="text" class="form-control" name="fname">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-black" for="lname">الاسم الاخير</label>
                                <input required type="text" class="form-control" name="lname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-black" for="email">الايميل</label>
                        <input required type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label class="text-black" for="message">الرسالة</label>
                        <textarea required name="message" class="form-control" id="message" cols="30" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">ارسال رسالة</button>
                </form>
            </div>
            <div class="col-lg-5 ml-auto">
                <div class="quick-contact-item d-flex align-items-center mb-2">
                    <span class="flaticon-house"></span>
                    <address class="text">
                        7343 شهار - الطائف - المملكة العربية السعودية
                    </address>
                </div>
                <div class="quick-contact-item d-flex align-items-center mb-2">
                    <span class="flaticon-phone-call"></span>
                    <address class="text">
                        920033346 , 0115200150 , 0544844385
                    </address>
                </div>
                <div class="quick-contact-item d-flex align-items-center mb-2">
                    <span class="flaticon-mail"></span>
                    <address class="text">
                        info@bs-ltd.com.sa
                    </address>
                </div>
                <div class="quick-contact-item d-flex align-items-center mb-2">
                    <span class="flaticon-playground"></span>
                    <address class="text">
                        من الأحد الى الخميس
                        <br/>
                        من 9:00 صباحا حتى 5:00 مساء
                    </address>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page_scripts')


@endsection









