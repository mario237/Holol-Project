@extends('layout.master')

@section('home','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

@endsection



@section('main_content')
    <div class="hero">
        <div class="intro">
            <h3 class="text-white" data-aos="fade-up" data-aos-delay="" style="line-height: 1.5em;">
                شركه حلول الأعمال المحدودة رائده ومتخصصه في المجال العقاري صممت شركة حلول الأعمال المحدودة كل البرامج
                لتلائم ظروف العملاء الفرديه وضمان المرونه القصوى والاستجابه لكل المعاملات
                <span class="typed-words " style="display: none"></span>
            </h3>
            <a href="/contactus" class="btn btn-primary" data-aos="fade-up" data-aos-delay="50">اتصل بنا</a>
        </div>
        <div class="slides overlay">

            @for($i=0;$i<count($sliders);$i++)
                <img data-cfsrc="{{url($sliders[$i]->image)}}" class="{{($i==0)?'active':''}}" alt="Image"
                     style="display:none;visibility:hidden;">
            @endfor


        </div>

    </div>


    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 class="section-title text-center mb-3">مزايا شركة حلول الأعمال المحدودة</h2>
                    <p>نحن متميزون بانفسنا وبعملائنا المميزين دوما</p>
                </div>
            </div>
            <div class="row align-items-stretch">
                <div class=" col-md-4">
                    <div class="feature-1">
                        <div class="align-self-center">
                            <img src="{{url('images/features/1.png')}}" class="img-fluid " width="25%">
                            <h3>للمدنيين والعسكريين والخاص</h3>
                            <p class="mb-0"> </p>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="feature-1">
                        <div class="align-self-center">
                            <img src="{{url('images/features/2.png')}}" class="img-fluid " width="25%">
                            <h3>موافقة فورية على التمويل</h3>
                            <p class="mb-0"> </p>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="feature-1">
                        <div class="align-self-center">
                            <img src="{{url('images/features/3.png')}}" class="img-fluid " width="25%">
                            <h3>تقييم العقار قبل رفع الطلب</h3>
                            <p class="mb-0"> </p>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="feature-1">
                        <div class="align-self-center">
                            <img src="{{url('images/features/4.png')}}" class="img-fluid " width="25%">
                            <h3>أقساط ميسرة وهامش ربح منافس</h3>
                            <p class="mb-0"> </p>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="feature-1">
                        <div class="align-self-center">
                            <img src="{{url('images/features/5.png')}}" class="img-fluid " width="25%">
                            <h3>اتاحة التمويل للمتقاعدين </h3>
                            <p class="mb-0"> </p>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="feature-1">
                        <div class="align-self-center">
                            <img src="{{url('images/features/6.png')}}" class="img-fluid " width="25%">
                            <h3>متوافقة مع أحكام الشريعة </h3>
                            <p class="mb-0"> </p>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="feature-1">
                        <div class="align-self-center">
                            <img src="{{url('images/features/7.png')}}" class="img-fluid " width="25%">
                            <h3>تقديم التمويل لجميع مناطق المملكة </h3>
                            <p class="mb-0"> </p>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="feature-1">
                        <div class="align-self-center">
                            <img src="{{url('images/features/8.png')}}" class="img-fluid " width="25%">
                            <h3>تخليص المعاملة في فترة وجيزة </h3>
                            <p class="mb-0"> </p>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="feature-1">
                        <div class="align-self-center">
                            <img src="{{url('images/features/9.png')}}" class="img-fluid " width="25%">
                            <h3>تحليل مالي واستشارات عقارية </h3>
                            <p class="mb-0"> </p>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="feature-1">
                        <div class="align-self-center">
                            <img src="{{url('images/features/10.png')}}" class="img-fluid " width="25%">
                            <h3>فحص العقار قبل الشراء </h3>
                            <p class="mb-0"> </p>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="feature-1">
                        <div class="align-self-center">
                            <img src="{{url('images/features/11.png')}}" class="img-fluid " width="25%">
                            <h3>توفير الدفعة الأولى للعقار</h3>
                            <p class="mb-0"> </p>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="feature-1">
                        <div class="align-self-center">
                            <img src="{{url('images/features/12.png')}}" class="img-fluid " width="25%">
                            <h3>خصومات طبية وتجارية بشتى المجالات</h3>
                            <p class="mb-0"> </p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

            </div>

        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row text-center justify-content-center mb-5">
                <div class="col-lg-7"><h2 class="section-title text-center">شركاء النجاح</h2></div>
            </div>
            <div class="owl-carousel owl-3-slider" style="direction: ltr">
                <div class="item">
                    <a class="media-thumb" href="" data-fancybox="gallery">
                        <img data-cfsrc="images/clients/client_1.png" alt="Image" class="img-fluid"
                             style="display:none;visibility:hidden;">
                    </a>
                </div>
                <div class="item">
                    <a class="media-thumb" href="" data-fancybox="gallery">
                        <img data-cfsrc="images/clients/client_2.png" alt="Image" class="img-fluid"
                             style="display:none;visibility:hidden;">
                    </a>
                </div>
                <div class="item">
                    <a class="media-thumb" href="" data-fancybox="gallery">
                        <img data-cfsrc="images/clients/client_3.png" alt="Image" class="img-fluid"
                             style="display:none;visibility:hidden;">
                    </a>
                </div>
                <div class="item">
                    <a class="media-thumb" href="" data-fancybox="gallery">
                        <img data-cfsrc="images/clients/client_4.png" alt="Image" class="img-fluid"
                             style="display:none;visibility:hidden;">
                    </a>
                </div>
                <div class="item">
                    <a class="media-thumb" href="" data-fancybox="gallery">
                        <img data-cfsrc="images/clients/client_5.png" alt="Image" class="img-fluid"
                             style="display:none;visibility:hidden;">
                    </a>
                </div>
                <div class="item">
                    <a class="media-thumb" href="" data-fancybox="gallery">
                        <img data-cfsrc="images/clients/client_6.png" alt="Image" class="img-fluid"
                             style="display:none;visibility:hidden;">
                    </a>
                </div>
                <div class="item">
                    <a class="media-thumb" href="" data-fancybox="gallery">
                        <img data-cfsrc="images/clients/client_7.png" alt="Image" class="img-fluid"
                             style="display:none;visibility:hidden;">
                    </a>
                </div>
                <div class="item">
                    <a class="media-thumb" href="" data-fancybox="gallery">
                        <img data-cfsrc="images/clients/client_8.png" alt="Image" class="img-fluid"
                             style="display:none;visibility:hidden;">
                    </a>
                </div>
                <div class="item">
                    <a class="media-thumb" href="" data-fancybox="gallery">
                        <img data-cfsrc="images/clients/client_9.png" alt="Image" class="img-fluid"
                             style="display:none;visibility:hidden;">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section count-numbers bg-primary py-5">
        <div class="container">
            <div class="row text-center">

                <div class="col-6 col-sm-6 col-md-6">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" data-number="8492">0</span>
                        </div>
                        <span class="caption">من العملاء</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" data-number="30">0</span>
                        </div>
                        <span class="caption">من الموظفين</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="untree_co-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-6">
                    <figure class="img-play-video">
                        <a id="play-video" class="video-play-button" href="{{asset('images/promotion.mp4')}}"
                           data-fancybox>
                            <span></span>
                        </a>
                        <img data-cfsrc="images/img_1.jpg" alt="Image" class="img-fluid"
                             style="display:none;visibility:hidden;">
                        <noscript><img src="images/img_1.jpg" alt="Image" class="img-fluid"></noscript>
                    </figure>
                </div>
                <div class="col-lg-5">
                    <h2 class="title-with-bg text-lg-right overlap-right mb-5">
                        <span>شركه حلول الأعمال المحدودة</span>
                    </h2>
                    <div class="row">
                        <div class="col-lg-10 ml-auto text-lg-right" style="font-size: 18px">
                            <p>شركه حلول الأعمال المحدودة رائده ومتخصصه في المجال العقاري صممت شركة حلول الأعمال
                                المحدودة كل البرامج لتلائم ظروف العملاء الفرديه وضمان المرونه القصوى والاستجابه لكل
                                المعاملات .</p>

                            <p><a href="/signup" class="btn btn-primary">انضم الينا</a></p>
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
        $(function () {
            var slides = $('.slides'),
                images = slides.find('img');

            images.each(function (i) {
                $(this).attr('data-id', i + 1);
            })
        });

        var typed = new Typed('.typed-words', {
            strings: ["1", "2", "3", "4"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 3000,
            startDelay: 1000,
            loop: true,
            showCursor: true,
            preStringTyped: (arrayPos, self) => {
                arrayPos++;
                console.log(arrayPos);
                $('.slides img').removeClass('active');
                $('.slides img[data-id="' + arrayPos + '"]').addClass('active');
            }

        });

    </script>

@endsection









