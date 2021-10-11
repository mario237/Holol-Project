@extends('layout.master')

@section('jobs','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

@endsection



@section('main_content')


    <div class="hero" style="    height: 50vh;overflow: hidden;min-height: auto">
        <div class="intro">
            <h1 data-aos="fade-up" data-aos-delay=""> وظيفة شاغرة </h1>
            <p class="text-white">
                {{$job->short_desc}}
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
                <div class="col-lg-7">
                    <h2 class="section-title mb-3">{{$job->title}}</h2>
                    <p>
                        {!! $job->description !!}
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="row">

                        <div class="col-md-12">
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <form class="contact-form" data-aos="fade-up" method="post"
                                      action="{{url('/job-request')}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="jobs_id" value="{{$job->id}}">
                                    <div class="form-group">
                                        <label class="text-black" for="fname">الاسم الاول</label>
                                        <input type="text" class="form-control" id="fname" name="fname" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black" for="lname">الاسم الاخير</label>
                                        <input type="text" class="form-control" id="lname" name="lname" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black" for="email">الايميل</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black" for="file">السيرة الذاتية</label>
                                        <input type="file" class="form-control" id="file" name="file" required>

                                    </div>
                                    <div class="form-group">
                                        <label class="text-black" for="ref_code">الرقم المرجعي </label>
                                        <input type="text" class="form-control" id="ref_code" name="ref_code" >
                                    </div>

                                    <button type="submit" class="btn btn-primary">ارسال طلب</button>
                                </form>
                            @else
                                <div class="text-center py-5">
                                    <h5>يجب عليك تسجيل الدخول لتتمكن من ارسال الطلب</h5>
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









