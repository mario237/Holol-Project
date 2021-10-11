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
            <h1 data-aos="fade-up" data-aos-delay=""> الطلب #{{$order->id}} </h1>

        </div>
        <div class="slides overlay">

            <img data-cfsrc="{{asset('images/jobs.jpeg')}}" class="active" alt="Image"/>
        </div>
    </div>
    @include('layout.message')



    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2 class="section-title mb-3">تفاصيل الطلب </h2>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class=" text-muted">الاسم الثلاثي</label>
                            <h6>{{$order->fullname}} </h6>
                        </div>
                        <div class="form-group col-md-4">
                            <label class=" text-muted">رقم الجوال</label>
                            <h6>{{$order->phone}} </h6>
                        </div>
                        <div class="form-group col-md-4">
                            <label class=" text-muted">الدعم </label>
                            <h6>{{($order->support=='0')?'لا':'نغم'}}  </h6>
                        </div>
                        <div class="form-group col-md-4">
                            <label class=" text-muted">الوظيفه </label>
                            <h6>{{$order->job}} {{($order->job_type!='')?' - '.$order->job_type:''}}  </h6>
                        </div>

                        <div class="form-group col-md-4">
                            <label class=" text-muted">نوع التمويل </label>
                            <h6>{{$order->finance_type}} </h6>
                        </div>
                        <div class="form-group col-md-4">
                            <label class=" text-muted">صورة الهوية </label>
                            <a class="d-block" href="{{url($order->identity_img)}}">اضغط هنا لفتح الملف</a>
                        </div>
                        <div class="form-group col-md-4">
                            <label class=" text-muted">تعريف بالراتب </label>
                            <a class="d-block" href="{{url($order->salary_file)}}">اضغط هنا لفتح الملف</a>
                        </div>
                        <div class="form-group col-md-4">
                            <label class=" text-muted">تقرير سمة </label>
                            <a class="d-block" href="{{url($order->simah_file)}}">اضغط هنا لفتح الملف</a>
                        </div>
                        <div class="form-group col-md-4">
                            <label class=" text-muted">ملفات اخرى </label>
                            @if($order->other_file)
                                <a class="d-block" href="{{url($order->other_file)}}">اضغط هنا لفتح الملف</a>
                            @else
                                <h6> لا يوجد </h6>

                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h2 class="section-title mb-3">حالة الطلب </h2>
                    <div class="row">
                        <div class="list-group col-md-12">

                            @foreach($statuses as $item)
                                @php
                                    $status='wait';

                                     if ($order->status){
                                         if ($item->id< $order->status->id){
                                            $status = 'success';
                                         }
                                         if($item->id> $order->status->id  ){
                                          $status='wait';
                                         }
                                          if($item->id==$order->status->id  ){
                                            if ($order->status->action=='-1'){
                                             $status = 'fail';
                                              }elseif($order->status->action=='1'){
                                               $status='success';
                                            }else{
                                              $status='wait';
                                            }
                                          }
                                     }
                                     $class = "fa-clock text-muted";
                                     if ( $status=='success'){
                                      $class = "fa-check-square text-success";
                                     }
                                      if ( $status=='fail'){
                                      $class = "fa-times text-danger";
                                     }

                                     $current = ($order->status && $order->status->id == $item->id);
                                @endphp

                                <div class="list-group-item">
                                    <div class="row">
                                        <div class="col-10">
                                            <h6>{{$item->title}} </h6>
                                        </div>
                                        <div class="col-2">
                                            <span class="fa fa-2x {{$class}}"></span>
                                        </div>
                                    </div>

                                    @if($current && ($status=='fail' || $status == 'wait') )
                                        <div class="m-2 text-right feature-1">
                                            @foreach($order->status->extras as $extra)


                                                <h6>{{($extra->users_id!=\Illuminate\Support\Facades\Auth::id())?' تقرير الموظف':'تقريرك'}}

                                                    <span style="font-size: 14px"> {{$extra->created_at->format('H:m في  d-m-Y')}}</span>
                                                </h6>

                                                <p>
                                                    {!! $extra->text !!}
                                                </p>
                                                @if($extra->file)
                                                    <a class="d-block" href="{{url($extra->file)}}">اضغط هنا لفتح
                                                        الملف</a>
                                                @endif
                                                <hr/>
                                            @endforeach

                                            @if(count($order->status->extras)>0)
                                                @if($order->status->id == 3)
                                                    <form action="{{url('/send-decision')}}" method="POST"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="statuses_id" value="{{$item->id}}"/>
                                                        <input type="hidden" name="frequests_id"
                                                               value="{{$order->id}}"/>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                <textarea name="text" class="form-control"
                                                                          placeholder="ادخل تقريرك"></textarea>
                                                                </div>
                                                                <div>
                                                                    <button type="submit" value="1" name="status"
                                                                            class="btn btn-mini btn-sm btn-success">قبول
                                                                    </button>
                                                                    <button type="submit" value="-1" name="status"
                                                                            class="btn btn-mini btn-sm btn-danger">رفض
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @else
                                                    <form action="{{url('/send-extra')}}" method="POST"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="statuses_id" value="{{$item->id}}"/>
                                                        <input type="hidden" name="frequests_id"
                                                               value="{{$order->id}}"/>
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <input class="form-control" type="file" name="file"
                                                                       required/>
                                                            </div>
                                                            <div class="col-4">
                                                                <button class="btn btn-mini btn-primary">ارسال</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @endif
                                            @endif

                                        </div>
                                    @endif
                                </div>

                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('page_scripts')


@endsection









