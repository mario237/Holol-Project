@extends('admin.layout.master')

@section('home','active')
@php
    $lang=app()->getLocale()
@endphp

@section('main_content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">عرض عميل </h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">اللوحة</a></li>
                            <li class="breadcrumb-item"><a href="{{url('dashboard/clients')}}">بيانات العملاء</a></li>
                            <li class="breadcrumb-item active" aria-current="page">عرض</li>
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

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body py-4">


                        <h1 class="text-center mb-5">بيانات الطلب</h1>


                        <div class="row my-5 px-0">

                            {{-- client name --}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>العميل</h4>
                                    <span> {{ $client->fullname}} </span>
                                </div>
                            </div>

                            {{-- End client name --}}


                            {{-- client status --}}

                            <div class="col-md-6 col-lg-4 my-3">

                                <div class="col-sm-12">
                                    <h4>الحالة</h4>
                                    <span class="text-{{ $status->color }}">{{ $status->title}}</span>
                                </div>
                            </div>

                            {{-- End client status --}}


                            {{-- Bank Employee --}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>موظف البنك</h4>
                                    <span>{{ $employee->name}}</span>

                                </div>
                            </div>

                            {{-- End Bank Employee --}}


                            {{-- Bank Name --}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">

                                    <h4>البنك</h4>

                                    <span>{{ $client->bank }}</span>

                                </div>
                            </div>

                            {{-- End Bank Name --}}


                            {{-- Birthday --}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>تاريخ الميلاد</h4>
                                    <span>{{ $client->birthday }}</span>
                                </div>
                            </div>

                            {{-- End Birthday --}}


                            {{-- Job --}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>الوظيفة</h4>
                                    <span>{{ $client->job }}</span>
                                </div>
                            </div>

                            {{-- End Job --}}



                            {{-- Job Types--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>الرتبة</h4>
                                    <span>{{ $client->job_type }}</span>
                                </div>
                            </div>

                            {{-- End Job Types--}}


                            {{-- Mobile Number--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4> رقم الجوال</h4>
                                    <span>{{ $client->mobile }}</span>
                                </div>
                            </div>


                            {{-- End Mobile Number--}}



                            {{-- Mobile Number--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>الدعم</h4>
                                    <span>{{ $supports[$client->support]['title'] }}</span>
                                </div>
                            </div>


                            {{-- End Mobile Number--}}




                            {{-- Register Date--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>تاريخ التسجيل</h4>
                                    <span>{{ $client->reg_date }}</span>
                                </div>
                            </div>

                            {{-- End Register Date--}}





                            {{-- base salary--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>الراتب الاساسي </h4>
                                    <span>${{ number_format($client->salary) }}</span>
                                </div>
                            </div>

                            {{-- End base salary--}}



                            {{-- total salary--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4> اجمالي الراتب </h4>
                                    <span>${{ number_format($client->total_salary) }}</span>
                                </div>
                            </div>

                            {{-- End total salary--}}



                            {{-- hiring date--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>تاريخ التعيين</h4>
                                    <span>{{ $client->hiring_date }}</span>
                                </div>
                            </div>

                            {{-- End hiring date--}}




                            {{-- commitment--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>الالتزام</h4>
                                    <span>{{ $client->commitment }}</span>
                                </div>
                            </div>

                            {{-- End commitment--}}


                            {{-- commitment remain--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4> المتبقي على الالتزام</h4>
                                    <span>{{ $client->commitment_remain }}</span>
                                </div>
                            </div>

                            {{-- End commitment remain--}}





                            {{-- commitment2--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>الالتزام 2</h4>
                                    <span>{{ $client->commitment2 }}</span>
                                </div>
                            </div>

                            {{-- End commitment2--}}


                            {{-- commitment remain2--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4> المتبقي على الالتزام 2</h4>
                                    <span>{{ $client->commitment_remain2 }}</span>
                                </div>
                            </div>

                            {{-- End commitment remain2--}}




                            {{--self_financing--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4> التمويل الشخصي</h4>
                                    <span>{{ $client->self_financing }}</span>
                                </div>
                            </div>

                            {{-- end self_financing--}}




                            {{--estate_financing--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4> التمويل العقاري</h4>
                                    <span>{{ $client->estate_financing }}</span>
                                </div>
                            </div>

                            {{-- end estate_financing--}}



                            {{-- total_financing--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>اجمالي التمويل</h4>
                                    <span>{{ $client->total_financing }}</span>
                                </div>
                            </div>

                            {{-- end total_financing--}}



                            {{-- pre_installment--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>القسط قبل الدعم</h4>
                                    <span>{{ $client->pre_installment }}</span>
                                </div>
                            </div>

                            {{-- end pre_installment--}}


                            {{-- after_installment--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>القسط بعد الدعم</h4>
                                    <span>{{ $client->after_installment }}</span>
                                </div>
                            </div>

                            {{-- end after_installment--}}


                            {{-- duration--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>المدة</h4>
                                    <span>{{ $client->duration }}</span>
                                </div>
                            </div>

                            {{-- end duration--}}


                            {{-- phase--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>المرحلة</h4>
                                    <span>{{ $client->phase }}</span>
                                </div>
                            </div>

                            {{-- end phase--}}



                            {{-- Images Preview--}}

                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>صورة الهوية</h4>
                                    <img class="w-100" src="{{ asset($client->identity) }}" alt="صورة الهوية">
                                </div>
                            </div>


                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>صورة بطاقة العائلة</h4>
                                    <img class="w-100" src="{{ asset($client->family_identity) }}" alt="صورة بطاقة العائلة">
                                </div>
                            </div>



                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>تعريف بالراتب</h4>
                                    <img class="w-100" src="{{ asset($client->salary_identity) }}" alt="تعريف بالراتب">
                                </div>
                            </div>


                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>صورة الصك</h4>
                                    <img class="w-100" src="{{ asset($client->instrument) }}" alt="صورة الصك">
                                </div>
                            </div>


                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>صورة رخصة البناء</h4>
                                    <img class="w-100" src="{{ asset($client->construction_license) }}" alt="صورة  رخصة البناء">
                                </div>
                            </div>


                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>صورة هوية المالك</h4>
                                    <img class="w-100" src="{{ asset($client->owner_identity) }}" alt="صورة  هوية المالك">
                                </div>
                            </div>


                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="col-sm-12">
                                    <h4>كشف حساب اخر 3 شهور مختوم من البنك</h4>
                                    <img class="w-100" src="{{ asset($client->account_statement) }}" alt="كشف حساب اخر 3 شهور مختوم من البنك">
                                </div>
                            </div>


                            {{-- End Images Preview--}}



                            {{--Notes--}}


                            <div class="col-md-12 my-4">
                                <div class="col-sm-12">
                                    <h4>الملاحظات</h4>
                                    <p class="my-2">{{ $client->note }}</p>
                                </div>
                            </div>

                            {{--End Notes--}}


                        </div>
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

                    } else {
                        $('#type_container').addClass("d-none");
                        $('input[name=job_type]').val("");
                    }
                });
            </script>
@endsection
