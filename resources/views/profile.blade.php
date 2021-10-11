@extends('layout.master')

@section('','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

@endsection



@section('main_content')


    <div class="hero" style="    height: 50vh;overflow: hidden;min-height: auto">
        <div class="intro">
            <h1 data-aos="fade-up" data-aos-delay=""> الملف الشخصي </h1>
            <p class="text-white">
                يمكنك من خلال ملفك الشخصي ادارة بياناتك الشخصية و طلباتك و ومتابعة تغير حالتها
            </p>
        </div>
        <div class="slides overlay">

            {{--            <img data-cfsrc="{{asset('images/jobs.jpeg')}}" class="active" alt="Image"/>--}}
        </div>
    </div>
    @include('layout.message')

    @if(\Illuminate\Support\Facades\Auth::user()->email_verified_at==null)
        <div class="alert alert-warning alert-dismissible text-center  m-0" role="alert" style="position: relative">
            <h3>ان حسابك غير مفعل</h3>
            <p>
                لتتمكن من الاستفادة من كل ميزات الموقع ,, قم بتفعيل حسابك اولا
                <a href="{{url('/varify')}}">اضغط هنا</a>
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="nav flex-column nav-pills col-md-3" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">

                    <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                       role="tab"
                       aria-controls="v-pills-profile" aria-selected="false">طلبات العقارات</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                       aria-controls="v-pills-messages" aria-selected="false">طلبات الحلول التمويلية</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-prog" role="tab"
                       aria-controls="v-pills-messages" aria-selected="false">طلبات الحلول البرمجية</a>
                    <a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                       aria-controls="v-pills-home" aria-selected="true">الملف الشخصي</a>
                </div>
                <div class="tab-content col-md-9" id="v-pills-tabContent">

                    <div class="tab-pane fade  show active" id="v-pills-profile" role="tabpanel"
                         aria-labelledby="v-pills-profile-tab">

                        <div class="col-lg-12">
                            <h2 class="section-title mb-3">طلبات العقارات </h2>
                            <div class="list-group">

                                @if(count($erequests)==0)

                                    <div class="list-group-item ">
                                        <h6>لا يوجد اي طلبات لعرضها</h6>
                                    </div>

                                @endif

                                @foreach($erequests as $item )
                                    <a href="{{url('/services/estates/detail/'.$item->estate->id)}}"
                                       class="list-group-item list-group-item-action">
                                        <div class="row justify-content-md-center text-md-right text-center">
                                            <div class="  col-sm-2  col-xs-12">
                                                <img class="rounded-circle" src="{{asset($item->estate->image)}}"
                                                     width="75px" height="75px"/>
                                            </div>
                                            <div class="p-2 col ">
                                                <h5>طلب رقم #{{$item->code}}</h5>
                                                <span>
                                                    {{$item->created_at->format('H:m في الساعة  d-m-Y')}}
                                            </span>
                                            </div>
                                            <div class="p-3  col-lg-2 col-xs-12">
                                                <p class="h6 ">
                                                    {{$item->fullname}}
                                                </p>
                                                <span> {{$item->phone}}</span>
                                            </div>

                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>


                    </div>

                    <div class="tab-pane fade  " id="v-pills-prog" role="tabpanel"
                         aria-labelledby="v-pills-profile-tab">

                        <div class="col-lg-12">
                            <h2 class="section-title mb-3">طلبات الحلول البرمجية </h2>
                            <div class="list-group">

                                @if(count($prequests)==0)

                                    <div class="list-group-item ">
                                        <h6>لا يوجد اي طلبات لعرضها</h6>
                                    </div>

                                @endif

                                @foreach($prequests as $item )
                                    <div
                                            class="list-group-item list-group-item-action">
                                        <div class="row justify-content-md-center text-md-right text-center">
                                            <div class="  col-sm-2  col-xs-12">
                                                <img class="rounded-circle" src="{{asset('images/request.png')}}"
                                                     width="75px" height="75px"/>
                                            </div>
                                            <div class="p-2 col ">
                                                <h5>طلب رقم #{{$item->code}}</h5>
                                                <span>
                                                    {{$item->created_at->format('H:m في الساعة  d-m-Y')}}
                                            </span>
                                            </div>
                                            <div class="p-3  col-lg-2 col-xs-12">
                                                <p class="h6 ">
                                                    {{$item->fullname}}
                                                </p>
                                                <span> {{$item->phone}}</span>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                    </div>

                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                         aria-labelledby="v-pills-messages-tab">
                        <div class="col-lg-12">
                            <h2 class="section-title mb-3">طلبات الحلول التمويلية </h2>
                            <div class="list-group">

                                @if(count($frequests)==0)

                                    <div class="list-group-item ">
                                        <h6>لا يوجد اي طلبات لعرضها</h6>
                                    </div>

                                @endif

                                @foreach($frequests as $item )
                                    <a href="{{url('/orders/'.$item->id)}}"
                                       class="list-group-item list-group-item-action">
                                        <div class="row justify-content-md-center text-md-right text-center">
                                            <div class="  col-sm-2  col-xs-12">
                                                <img class="rounded-circle" src="{{asset('images/request.png')}}"
                                                     width="75px" height="75px"/>
                                            </div>
                                            <div class="p-2 col ">
                                                <h5>طلب رقم #{{$item->code}}</h5>
                                                <span>
                                                  {{$item->created_at->format('H:m في الساعة  d-m-Y')}}
                                            </span>
                                            </div>
                                            <div class="p-3  col-lg-3 col-xs-12">
                                                <span class=" bg-primary p-2 d-block text-center text-white">
                                                   {{$item->status->title}}
                                                </span>
                                            </div>

                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel"
                         aria-labelledby="v-pills-home-tab">

                        <div class="col-lg-12">
                            <h2 class="section-title mb-3">تعديل بيانات حساب </h2>


                            <form class="contact-form" data-aos="fade-up" method="POST" action="{{url('/update')}}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="text-black" for="fname">الاسم الثلاثي</label>
                                        <input type="text" class="form-control" id="fname" name="name"
                                               value="{{$user->name}}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-black" for="email">البريد الاكتروني</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{$user->email}}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-black" for="birth">تاريخ الميلاد </label>
                                        <input type="date" class="form-control" id="birth" name="birthday"
                                               value="{{$user->birthday}}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="text-black" for="password">الرقم السري </label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-black" for="cpassword">تأكيد الرقم السري </label>
                                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary">تعديل</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
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









