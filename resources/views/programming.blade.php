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
            <h1 data-aos="fade-up" data-aos-delay="">خدمه الحلول البرمجية</h1>
            <p class="text-white">

                نبتكر الحلول البرمجية لكي نمكن شركاءنا في زيادة إنتاجيتهم وكفاءاتهم، سعيًا منا لمواكبة التطور التكنولوجي
                في هذا العصر،
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
                <div class="col-md-8 col-sm-12">
                    <h2 class="section-title mb-3">نبتكر أفضل الحلول البرمجية</h2>
                    <p>

                        نبتكر الحلول البرمجية لكي نمكن شركاءنا في زيادة إنتاجيتهم وكفاءاتهم، سعيًا منا لمواكبة التطور
                        التكنولوجي في هذا العصر، وموافقةً مع استراتيجية ورؤية المملكة في التحول الرقمي والابتكار.
                    </p>
                </div>
                <div class="col-md-4 d-sm-none d-md-block text-left">
                    <div class="row">
                        <img data-cfsrc="{{asset('images/services/programming.png')}}" alt="Image"
                             class="img-fluid w-50 m-auto ">

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-6 text-center">
                    <h2 class="section-title mb-3 text-center">خدماتنا</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 mt-4">
                    <div class="card text-white bg-primary">
                        <div class="card-img text-center p-4">
                            <img src="{{asset('images/services/hosting.png')}}" class=" m-auto" height="100px"/>
                        </div>

                        <div class="card-body">
                            <div class="card-title ">
                                <h4>الاستضافة</h4>
                            </div>
                            <p>
                                انتقل إلى خادم خاص بك واحصل على استقرار وسرعة أعلى لموقعك .
                                يوفر لك الخادم الخاص أقصى درجات الحماية والسرعة , كما يتم إدارة خادمك من قبل فريق متخصص
                                .
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mt-4">
                    <div class="card text-white bg-primary">
                        <div class="card-img text-center p-4">
                            <img src="{{asset('images/services/web.png')}}" class=" m-auto" height="100px"/>
                        </div>

                        <div class="card-body">
                            <div class="card-title ">
                                <h4>برمجة الويب</h4>
                            </div>
                            <p>
                                تصميم موقع إنترنت وخدمات تطوير يرتكز على متطلبات العملاء باستخدام أحدث التقنيات بما في
                                ذلك بارالاكس وغيرها من التقنيات مع الحفاظ على تسليمهما بشكل فعال.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mt-4">
                    <div class="card text-white bg-primary">
                        <div class="card-img text-center p-4">
                            <img src="{{asset('images/services/mobile.png')}}" class=" m-auto" height="100px"/>
                        </div>

                        <div class="card-body">
                            <div class="card-title ">
                                <h4>تطبيقات الجوال </h4>
                            </div>
                            <p>
                                تقدم نسخة هاتف المحمول خدمات مبدعة وأساسية ومثيرة للإهتمام. ومن خلال استخدامنا أحدث
                                تقنيات التطوير التصميم، نجاول أن نزودكم بأحدث تطبيقات هاتف المحمول لتلبية الإحتياجات .
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mt-4">
                    <div class="card text-white bg-primary">
                        <div class="card-img text-center p-4">
                            <img src="{{asset('images/services/camera.png')}}" class=" m-auto" height="100px"/>
                        </div>

                        <div class="card-body">
                            <div class="card-title ">
                                <h4>كاميرات وأنظمة المراقبة الامنية </h4>
                            </div>
                            <p>
                                كاميرات المراقبة اصبحت ضرورة امنية عند كل المجتمعات سواء منشآت خاصة أو عامة او على مستوى
                                الافراد ، فالجميع اصبح يفكر في حماية منشأته او منزله.
                            </p>
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
                        <form class="contact-form" data-aos="fade-up" method="POST"
                              action="{{url('/programming-request')}}">
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
                                        <input type="text" class="form-control" id="ref_code" name="ref_code">
                                    </div>

                                </div>
                            </div>
                            <div class="alert alert-success">
                                <div class="alert-heading">
                                    سيقوم فريق البرمجيات بالتواصل معك
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">ارسال طلب</button>
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

@endsection









