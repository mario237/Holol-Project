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
            <h1 data-aos="fade-up" data-aos-delay=""> خدمة العقارات</h1>
            <p class="text-white">
                تقدم شركة حلول الاعمال مشاريع ذات مستوى عالي من التنفيذ والدقة والجمع بين التصميم الأنيق ووسائل الراحة
                العصرية الحديثة في جميع مناطق المملكة

            </p>
        </div>
        <div class="slides overlay">

            {{--<img data-cfsrc="{{asset('images/service_2.jpg')}}" class="active" alt="Image"--}}
                 {{--style="display:none;visibility:hidden;">--}}
        </div>
    </div>


    <div class="untree_co-section">
        <div class="container">
            <div class="row align-content-lg-center">
                <div class="col-md-8 col-sm-12">
                    <h2 class="section-title mb-3">نقدم أفضل العقارات</h2>
                    <p>

                        توفر شركة حلول الاعمال عقارات في العديد من المدن في المملكة
                        تقدم شركة حلول الاعمال العقارية مشاريع ذات مستوى عالي من التنفيذ والدقة والجمع بين التصميم
                        الأنيق ووسائل الراحة العصرية الحديثة في جميع مناطق المملكة ويهدف إلى تلبية احتياجات الأفراد
                        والعائلات وإيجاد حلول سكنية تمكن عملائنا من تملك المنزل المناسب والانتفاع بها وفق احتياجاتهم
                        وقدراتهم المادية، وذلك من خلال توفير حلول تمويلية ملائمة تناسب الجميع.
                    </p>
                </div>
                <div class="col-md-4 d-sm-none d-md-block text-left">
                    <div class="row">
                        <img data-cfsrc="{{asset('images/services/estates_inner.png')}}" alt="Image"
                             class="img-fluid w-50 m-auto ">

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                @foreach($cities as $item)
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <a href="{{url('/services/estates/'.$item->id)}}" class="media-1" style="margin-top: 2em">
                            <img data-cfsrc="{{asset($item->image)}}" alt="Image" class="img-fluid">

                            <div class="media-body">
                                <div class="title">
                                    <h2>{{$item->name}}</h2>
                                </div>

                            </div>

                        </a>
                    </div>
                @endforeach
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









