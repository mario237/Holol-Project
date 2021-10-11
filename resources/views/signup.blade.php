@extends('layout.master')

@section('','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

@endsection



@section('main_content')


    <div class="hero inner" >
        <div class="intro">
            <h1 data-aos="fade-up" data-aos-delay=""> انضم الينا </h1>
            <p class="text-white">
                قم بتسجيل الدخول او انشاء حساب لتتمتع بكافة الخدمات المقدمة من موقعنا
            </p>


        </div>
        <div class="slides overlay">

            {{--<img data-cfsrc="{{asset('images/jobs.jpeg')}}" class="active" alt="Image"/>--}}
        </div>
    </div>
    @include('layout.message')



    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h2 class="section-title mb-3">تسجيل الدخول</h2>

                    <form class="contact-form" data-aos="fade-up" method="POST" action="{{url('login')}}">
                        @csrf
                        <div class="feature-1  text-right py-5">
                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label class="text-black" for="email">البريد الاكتروني</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="text-black" for="password">الرقم السري </label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <a href="{{url('/forget')}}">هل نسيت كلمة المرور ؟ </a>
                                </div>

                                <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary"> تسجيل الدخول</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-lg-7">
                    <h2 class="section-title mb-3">انشاء حساب </h2>


                    <form class="contact-form" data-aos="fade-up" method="POST" action="{{url('signup')}}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="text-black" for="fname">الاسم الثلاثي</label>
                                <input type="text" class="form-control" id="fname" name="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="text-black" for="email">البريد الاكتروني</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="text-black" for="birth">تاريخ الميلاد </label>
                                <input type="date" class="form-control"  id="birth" name="birthday" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-black" for="password">الرقم السري </label>
                                <input type="password" class="form-control" id="password" name="password" required minlength="8">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="text-black" for="cpassword">تأكيد الرقم السري </label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword" required minlength="8">
                            </div>

                            <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary">انشاء حساب</button>
                            </div>
                        </div>
                    </form>
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









