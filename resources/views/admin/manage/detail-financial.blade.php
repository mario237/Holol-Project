@extends('admin.layout.master')

@section('home','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')
    <link href="{{asset('libs/lightbox/lightbox.min.css')}}" rel="stylesheet">
    <style>
        input[type="number"] {
            text-align: left !important;
        }
    </style>
@endsection



@section('main_content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title"> تفاصييل الطلب</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">الرئيسية</a></li>
                            <li class="breadcrumb-item"><a href="{{url('dashboard/orders/financial')}}">طلبات
                                    التمويل</a></li>
                            <li class="breadcrumb-item active" aria-current="page">تفاصيل</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-7">

            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->


    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="section-title mb-3">تفاصيل الطلب </h5>
                            <hr/>
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
                                    <label class=" text-muted">الكود المرجعي </label>
                                    <h6>{{($order->ref_code)?$order->ref_code:'-'}} </h6>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class=" text-muted">الدعم </label>
                                    <h6>{{($order->support=='0')?'لا':'نعم'}}  </h6>
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
                        <div class="col-md-12">
                            <hr/>
                            <h5 class="section-title mb-3">حالة الطلب </h5>
                            <hr/>
                            <div class="row">
                                <div class="list-group col-md-12">

                                    @foreach($statuses as $item)
                                        @php
                                            $status='wait';

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


                                             $class = "fa-clock text-muted";
                                             if ( $status=='success'){
                                              $class = "fa-check-square text-success";
                                             }
                                              if ( $status=='fail'){
                                              $class = "fa-times text-danger";
                                             }

                                           $current = ($order->status->id == $item->id) && $order->status->action !='1';

                                        @endphp

                                        <div class="list-group-item {{!$current?'list-group-item-dark':''}}">
                                            <div class="row">
                                                <div class="col-10">
                                                    <h6>{{$item->title}} </h6>
                                                </div>
                                                <div class="col-2">
                                                    <span class="fa fa-2x {{$class}}"></span>
                                                </div>
                                            </div>

                                            @if($current )
                                                <div class="m-2 text-right p-2 bg-light">
                                                    @foreach($order->status->extras as $extra)

                                                        <h6>{{($extra->provided_by=='0')?' تقرير الزبون':'تقرير الموظف '.$extra->user->name}}

                                                            <span style="font-size: 14px"> {{$extra->created_at->format('H:m في  d-m-Y')}}</span>
                                                        </h6>

                                                        <p>
                                                            {!! $extra->text !!}
                                                        </p>
                                                        @if($extra->file)
                                                            <a class="d-block" href="{{url($extra->file)}}">اضغط هنا
                                                                لفتح
                                                                الملف</a>
                                                        @endif
                                                        <hr/>
                                                    @endforeach


                                                    @if($order->status->id!=3)
                                                        <form action="{{url('/dashboard/orders/financial/report')}}"
                                                              method="POST">
                                                            @csrf
                                                            <input type="hidden" name="statuses_id"
                                                                   value="{{$item->id}}"/>
                                                            <input type="hidden" name="frequests_id"
                                                                   value="{{$order->id}}"/>
                                                            <input type="hidden" name="provided_by" value="1"/>
                                                            <div class="row">
                                                                <div class="col-10">
                                                                <textarea name="text" class="form-control"
                                                                          placeholder="ادخل تقريرك"></textarea>

                                                                    <br/>
                                                                    <div class=" p-2">
                                                                        <button type="submit" value="1" name="status"
                                                                                class="btn btn-mini btn-success">قبول
                                                                        </button>
                                                                        <button type="submit" value="-1" name="status"
                                                                                class="btn btn-mini btn-danger">رفض
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <div class="row">

                                                            <div class="col-sm-6">
                                                                <form action="{{url('/dashboard/orders/financial/report')}}"
                                                                      method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="statuses_id"
                                                                           value="{{$item->id}}"/>
                                                                    <input type="hidden" name="frequests_id"
                                                                           value="{{$order->id}}"/>
                                                                    <input type="hidden" name="provided_by" value="1"/>
                                                                    <div class="row">
                                                                        <div class="form-group col-sm-6">
                                                                            <input class="form-control" required
                                                                                   type="number"
                                                                                   placeholder="التمويل الشخصي"
                                                                                   step="0.0001"
                                                                                   name="personal_finance">
                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <input class="form-control" required
                                                                                   type="number"
                                                                                   placeholder="القسط الشخصي"
                                                                                   step="0.0001"
                                                                                   name="personal_installment">
                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <input class="form-control" required
                                                                                   type="number"
                                                                                   placeholder="التمويل العقاري"
                                                                                   step="0.0001" name="mortgage">
                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <input class="form-control" required
                                                                                   type="number"
                                                                                   placeholder="القسط العقاري "
                                                                                   step="0.0001"
                                                                                   name="estate_installment">
                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <input class="form-control" required
                                                                                   type="number"
                                                                                   placeholder="القسط الشامل "
                                                                                   step="0.0001"
                                                                                   name="total_installment">
                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <input class="form-control" required
                                                                                   type="number"
                                                                                   placeholder="اجمالي التمويل  "
                                                                                   step="0.0001"
                                                                                   name="total_finance">
                                                                        </div>
                                                                    </div>
                                                                    <div class=" p-2">
                                                                        <button type="submit" value="1" name="status"
                                                                                class="btn btn-mini btn-success">قبول
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <form action="{{url('/dashboard/orders/financial/report')}}"
                                                                      method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="statuses_id"
                                                                           value="{{$item->id}}"/>
                                                                    <input type="hidden" name="frequests_id"
                                                                           value="{{$order->id}}"/>
                                                                    <input type="hidden" name="provided_by" value="1"/>
                                                                    <textarea required name="text" class="form-control" rows="5"
                                                                              placeholder="ادخل تقريرك"></textarea>

                                                                    <br/>
                                                                    <div class=" p-2">
                                                                        <button type="submit" value="-1" name="status"
                                                                                class="btn btn-mini btn-danger">رفض
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
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
        </div>
    </div>

@endsection






<!-- ---------------------------------------------------- -->

@section('page_scripts')

@endsection

