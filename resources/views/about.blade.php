@extends('layout.master')

@section('about','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

@endsection



@section('main_content')



    <div class="hero inner" >
        <div class="intro">
            <h1 data-aos="fade-up" data-aos-delay="">حول الشركة</h1>
            <p class="text-white">

                شركه حلول الأعمال المحدودة رائده ومتخصصه في المجال العقاري صممت شركة حلول الأعمال المحدودة كل البرامج
                لتلائم ظروف العملاء الفرديه وضمان المرونه القصوى والاستجابه لكل المعاملات

            </p>
        </div>
        <div class="slides overlay">

            {{--<img data-cfsrc="images/slider/slider-1.jpg" class="active" alt="Image" style="display:none;visibility:hidden;"><noscript><img src="images/slider/slider-1.jpg" class="active" alt="Image"></noscript>--}}
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h2 class="section-title mb-3">لماذا عليك اختيارنا</h2>
                    <div class="custom-accordion" id="accordion_1">
                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    رؤيتنا
                                </button>
                            </h2>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_1">
                                <div class="accordion-body">
                                    تهـدف الشـركة لتكـون الرائـدة فـي مجـال الاسـتثمارات الاسـتراتيجية فـي قطـاع التجـارة بشـكل عـام وقطـاع العقـار بشـكل خـاص للمسـاهمة فـي تحقيـق النمـو الاقتصـادي ودفع عجلـة الاقتصاد بالمملكة
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    إستراتيجيتنا
                                </button>
                            </h2>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion_1">
                                <div class="accordion-body">
                                    توفيــر خدمــات تســويقية وبيعيــة إقليميــة للمطوريــن والمســتثمرين فــي القطــاع العقــاري والقطاعـات التجاريـة الأخـرى وبنـاء الثقـة مـع عمائنـا مـن خـال توفيـر خدمـات عاليـة الجـودة ذات قيمــة مضافـة
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    رسالتنا
                                </button>
                            </h2>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingTree" data-parent="#accordion_1">
                                <div class="accordion-body">
                                    توفير جميع الخدمات التي تحقق رضى عملاءنا
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-6">
                            <img data-cfsrc="images/img_1.jpg" alt="Image" class="img-fluid" style="display:none;visibility:hidden;"><noscript><img src="images/img_1.jpg" alt="Image" class="img-fluid"></noscript>
                        </div>
                        <div class="col-6">
                            <img data-cfsrc="images/img_3.jpg" alt="Image" class="img-fluid" style="display:none;visibility:hidden;"><noscript><img src="images/img_3.jpg" alt="Image" class="img-fluid"></noscript>
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


@endsection









