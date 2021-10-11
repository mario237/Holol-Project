@extends('layout.master')

@section('jobs','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

@endsection



@section('main_content')


    <div class="hero inner">
        <div class="intro">
            <h1 data-aos="fade-up" data-aos-delay=""> الوظائف الشاغرة </h1>
            <p class="text-white">
                شركه حلول الأعمال المحدودة رائده ومتخصصه في المجال العقاري صممت شركة حلول الأعمال المحدودة كل البرامج
                لتلائم ظروف العملاء الفرديه وضمان المرونه القصوى والاستجابه لكل المعاملات
            </p>
        </div>
        <div class="slides overlay">

            {{--<img data-cfsrc="{{asset('images/jobs.jpeg')}}" class="active" alt="Image">--}}
        </div>
    </div>




    <div class="untree_co-section">
        <div class="container">
            <div class="row">

                @if(count($jobs)==0)

                    <div class="col-md-12 text-center p-5">
                        <span class="fa fa-search fa-4x"></span>
                        <h3>لا يوجد اي فرص عمل جديدة لعرضها</h3>
                        <p>
                            قم بمراجعة قسم الوظائف الشاغرة في وقت لاحق او قم بالتواصل معنا مباشرة
                            <br/>
                            من هنا
                            <a href="{{url('/contactus')}}">اتصل بنا</a>
                        </p>
                    </div>
                @endif

                @foreach($jobs as $job)

                        <div class="col-6 col-md-6 col-lg-4">
                            <div class="job">
                                <div class="head-img">
                                <a  href="{{url('/jobs/'.$job->id)}}" class="d-block mb-3 "><img src="{{asset($job->image)}}" alt="Image" class="img-fluid" data-pagespeed-url-hash="3629946587" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                                </div>
                                <div class="d-flex">
                                    <div>
                                        <h4 class="mt-4"><a href="{{url('/jobs/'.$job->id)}}">{{$job->title}}</a></h4>
                                        <p>{{$job->short_desc}}</p>
                                    </div>
                                </div>
                            </div>
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

@endsection









