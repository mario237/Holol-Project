@extends('layout.master')

@section('services','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

@endsection



@section('main_content')


    <div class="hero inner">
        <div class="intro">
            <h1 data-aos="fade-up" data-aos-delay="">خدمه حلول تمويلية</h1>
            <p class="text-white">

                تقديم أفضل الحلول التمويلية حيث
                سعت شركة حلول الاعمال خلال الأعوام السابقة في عمل شراكات متينة مع جميع الجهات
                التمويلية في المملكة العربية السعودية

            </p>
        </div>
        <div class="slides overlay">

            {{--<img data-cfsrc="{{asset('images/service_1.jpeg')}}" class="active" alt="Image"--}}
                 {{--style="display:none;visibility:hidden;">--}}
        </div>
    </div>
    @include('layout.message')

    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h2 class="section-title mb-3">نقدم أفضل الحلول التمويلية</h2>
                    <p>

                        تقديم أفضل الحلول التمويلية
                        سعت شركة حلول الاعمال خلال الأعوام السابقة في عمل شراكات متينة مع جميع الجهات التمويلية في
                        المملكة العربية السعودية سواء البنوك السعودية أو شركات التمويل والتي من خلالها نسعى لتوفير حلول
                        تمويلية بما تتناسب مع تطلعات عملائنا وحصولهم على منزل أحلامهم بالإضافة لبعض المزايا التي تقدمها
                        شركتنا والتي تساهم في تقديم حلول أكثر لعملائها ومستثمريها.
                    </p>
                </div>
                <div class="col-lg-7">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="feature-1 ">
                                <div class="align-self-center text-right">
                                    <h3>إمكانية توفير </h3>
                                    <p class="mb-0">حلول تمويلية للدفعة الأولى</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-1 ">
                                <div class="align-self-center text-right">
                                    <h3>إمكانية توفير </h3>
                                    <p class="mb-0">حلول تمويلية للمتقاعدين</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-1 ">
                                <div class="align-self-center text-right">
                                    <h3>إمكانية توفير </h3>
                                    <p class="mb-0">حلول تمويلية للمدنيين إلى عمر 75 سنة</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-1 ">
                                <div class="align-self-center text-right">
                                    <h3>التعامل مع برنامج سكني</h3>
                                    <p class="mb-0"> الخاص بوزارة الإسكان وصندوق التمنية العقارية</p>
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
                <div class="col-lg-12 mb-5 mb-lg-0">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <form class="contact-form" data-aos="fade-up" enctype="multipart/form-data"
                              method="POST"
                              action="{{url('/finance-request')}}"
                        >
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="text-black" for="name">الاسم الثلاثي</label>
                                        <input type="text" class="form-control" id="name" name="fullname" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="text-black" for="lname">رقم الجوال</label>
                                        <input type="text" class="form-control" id="lname" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-black" for="email">الدعم</label>
                                        <select class="form-control" name="support" required>
                                            <option value="0">لا</option>
                                            <option value="1">نعم</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3" id="job_container">
                                    <div class="form-group">
                                        <label class="text-black" for="email">الوظيفة</label>
                                        <select id="job" class="form-control" name="job" required>
                                            <option value="عسكري">عسكري</option>
                                            <option value="مدني حكومي"> مدني حكومي</option>
                                            <option value=" قطاع خاص"> قطاع خاص</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3" id="type_container">
                                    <div class="form-group">
                                        <label class="text-black" for="type">الرتبة</label>
                                        <input type="text" class="form-control" name="job_type">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-black" for="email">صورة الهوية </label>
                                        <input type="file" class="form-control" id="identity" name="identity_img"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-black" for="email">تعريف بالراتب </label>
                                        <input type="file" class="form-control" name="salary_file" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-black" for="email">تقرير سمة :
                                            رابط تقرير السمة
                                            <a href="https://simati.simah.com/ar/login">اضغط هنا</a>

                                        </label>
                                        <input type="file" class="form-control" name="simah_file" required>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-black" for="email">نوع التمويل</label>
                                        <select id="job_type" class="form-control" name="finance_type" required>
                                            <option value="تمويل عقاري">تمويل عقاري</option>
                                            <option value="رهن عقاري"> رهن عقاري</option>
                                            <option value=" بناء ذاتي"> بناء ذاتي</option>
                                            <option value=" ارض وقرض"> ارض وقرض</option>
                                            <option value="تمويل شخصي وعقاري"> تمويل شخصي وعقاري</option>
                                            <option value="تضامن"> تضامن</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-black" for="email">ارفاق ملفات اخرى </label>
                                        <input type="file" class="form-control" name="other_file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-black" for="ref_code">الرقم المرجعي </label>
                                        <input type="text" class="form-control" id="ref_code" name="ref_code" >
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">ارسال طلب</button>
                            </div>
                        </form>
                    @else
                        <div class="text-center">
                            <h4>يجب عليك تسجيل الدخول لتتمكن من ارسال الطلب</h4>
                            <a class="btn btn-primary m-4" href="{{url('/signup')}}">تسجيل الدخول \ انشاء حساب</a>
                        </div>
                    @endif
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
            if ($(this).val() === 'عسكري') {
                $('#type_container').removeClass("d-none");
                $('#job_container').removeClass();
                $('#job_container').addClass("col-md-3");

            } else {
                $('#type_container').addClass("d-none");
                $('#job_container').removeClass();
                $('#job_container').addClass("col-md-6");
                $('input[name=job_type]').val("");
            }
        });
    </script>

@endsection









