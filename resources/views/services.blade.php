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
            <h1 data-aos="fade-up" data-aos-delay="">خدماتنا</h1>
            <p class="text-white">

                شركه حلول الأعمال المحدودة رائده ومتخصصه في المجال العقاري صممت شركة حلول الأعمال المحدودة كل البرامج
                لتلائم ظروف العملاء الفرديه وضمان المرونه القصوى والاستجابه لكل المعاملات

            </p>
        </div>
        <div class="slides overlay">

            {{--<img data-cfsrc="images/slider/slider-2.jpg" class="active" alt="Image" >--}}
        </div>
    </div>



    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class=" col-sm-8 col-md-4">
                    <div class="media-1 text-center">
                        <a href="{{url('/services/financial')}}" class="d-block mb-3">
                            <img data-cfsrc="images/services/financial.png" alt="Image" class="img-fluid img-thumbnail rounded-circle w-50 m-auto  p-2" >
                            <noscript><img src="images/service_1.jpeg" alt="Image" class="img-fluid"></noscript>
                        </a>
                        <div class="d-flex">
                            <div>
                                <h3><a href="{{url('/services/financial')}}">خدمه حلول تمويلية</a></h3>
                                <p>
                                    تقديم أفضل الحلول التمويلية حيث
                                    سعت شركة حلول الاعمال خلال الأعوام السابقة في عمل شراكات متينة مع جميع الجهات
                                    التمويلية في المملكة العربية السعودية
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-sm-8 col-md-4">
                    <div class="media-1 text-center">
                        <a href="{{url('/services/estates')}}" class="d-block mb-3"><img data-cfsrc="images/services/estates.png" alt="Image"
                                                                              class="img-fluid img-thumbnail rounded-circle w-50 m-auto  p-2">
                            <noscript><img src="images/service_2.jpg" alt="Image" class="img-fluid"></noscript>
                        </a>
                        <div class="d-flex">
                            <div>
                                <h3><a href="{{url('/services/estates')}}"> خدمه العقارات</a></h3>
                                <p>

                                    تقدم شركة حلول الاعمال مشاريع ذات مستوى عالي من التنفيذ والدقة والجمع بين التصميم الأنيق ووسائل الراحة العصرية الحديثة في جميع مناطق المملكة

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-sm-8 col-md-4">
                    <div class="media-1 text-center">
                        <a href="{{url('/services/programming')}}" class="d-block mb-3"><img data-cfsrc="images/services/programming.png" alt="Image"
                                                                              class="img-fluid img-thumbnail rounded-circle w-50 m-auto p-2">
                            <noscript><img src="images/service_2.jpg" alt="Image" class="img-fluid"></noscript>
                        </a>
                        <div class="d-flex">
                            <div>
                                <h3><a href="{{url('/services/programming')}}"> خدمه الحلول البرمجية</a></h3>
                                <p>

                                    نبتكر الحلول البرمجية لكي نمكن شركاءنا في زيادة إنتاجيتهم وكفاءاتهم، سعيًا منا لمواكبة التطور التكنولوجي في هذا العصر، وموافقةً مع استراتيجية ورؤية المملكة في التحول الرقمي والابتكار

                                </p>
                            </div>
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









