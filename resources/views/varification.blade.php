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
            <h1 data-aos="fade-up" data-aos-delay=""> تاكيد الحساب </h1>


        </div>
        <div class="slides overlay">

{{--            <img data-cfsrc="{{asset('images/jobs.jpeg')}}" class="active" alt="Image"/>--}}
        </div>
    </div>
    @include('layout.message')



    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-6 text-center">


                    <form class="contact-form" data-aos="fade-up" method="POST" action="{{url('varify')}}">
                        @csrf
                        <div class="feature-1  text-center py-5">
                            <div class="row">

                                <div class="form-group col-md-12">
                                    <h3 class="text-black p-2" for="email">قمنا بارسال رمز التحقق الى بريدك الاكتروني,, قم بالتحقق منه</h3>
                                    <h5 class="text-black p-2" for="email">ادخل رمز التاكيد</h5>
                                    <input type="text" class="form-control text-center" id="email" name="code" required>
                                </div>


                                <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary"> تاكيد</button>
                                </div>
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









