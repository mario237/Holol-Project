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
                <h4 class="page-title">{{$helper['title']}} عميل </h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">اللوحة</a></li>
                            <li class="breadcrumb-item"><a href="{{url('dashboard/clients')}}">بيانات العملاء</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$helper['title']}}</li>
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


    @if ($errors->any())
        <div class="alert alert-danger mb-0">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-5">

                        <form action="{{$helper['action']}}" method="POST">
                            @csrf
                            @method($helper['method'])

                            <div class="row">

                                {{-- client name --}}


                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="user_id" class="col-sm-12 col-form-label">العميل</label>
                                        <select name="user_id" id="user_id"
                                                class="form-control select2 {{ $errors->get('user_id') ? 'is-invalid' : '' }}">
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">
                                                    {{ old('name' , $user->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- End client name --}}



                                {{-- client status --}}

                                <div class="form-group col-md-6 col-lg-4 ">

                                    <div class="col-sm-12">
                                        <label for="status" class="col-sm-12 col-form-label">الحالة</label>

                                        <select name="status" id="status"
                                                class="form-control {{ $errors->get('status') ? 'is-invalid' : '' }}">
                                            @foreach($statuses as $status)
                                                <option class="bg-{{$status->color}}"
                                                        value="{{$status->id}}" {{($client->status == $status->id)?'selected':''}}>
                                                    {{$status->title}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- End client status --}}


                                {{-- Bank Employees --}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="users_id" class="col-sm-12 col-form-label">موظف البنك</label>
                                        <select name="users_id" id="users_id"
                                                class="form-control select2 {{ $errors->get('users_id') ? 'is-invalid' : '' }}">
                                            @foreach($employees as $emp)
                                                <option
                                                    value="{{ $emp->id }}" {{($client->users_id == $emp->id)?'selected':''}}>
                                                    {{ $emp->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- End Bank Employees --}}



                                {{-- Bank Names --}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">

                                        <label for="bank_id" class="col-sm-12 col-form-label"> البنك </label>

                                        <select id="bank_id"
                                                class="form-control {{ $errors->get('bank_id') ? 'is-invalid' : '' }}"
                                                name="bank_id">
                                            @foreach($banks ?? '' as $bank)
                                                <option
                                                    value="{{$bank->id}}" {{($client->bank_id == $bank->id)?'selected':''}}>
                                                    {{ $bank->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- End Bank Names --}}


                                {{-- Birthday --}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="birthday" class="col-sm-12 col-form-label"> تاريخ الميلاد </label>
                                        <input type="date"
                                               class="form-control {{ $errors->get('birthday') ? 'is-invalid' : '' }}"
                                               id="birthday" placeholder="yyyy/mm/dd" name="birthday"
                                               value="{{ old('birthday' , $client->birthday) }}">
                                    </div>
                                </div>

                                {{-- End Birthday --}}


                                {{-- Job --}}

                                <div class="form-group col-md-6 col-lg-4" id="job_container">
                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label" for="job">الوظيفة</label>
                                        <select id="job"
                                                class="form-control {{ $errors->get('job') ? 'is-invalid' : '' }}"
                                                name="job">

                                            @foreach($jobs ?? '' as $job)
                                                <option
                                                    value="{{$job}}" {{($client->job == $job)?'selected':''}}>
                                                    {{ $job }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                {{-- End Job --}}



                                {{-- Job Types--}}

                                @php
                                    @endphp
                                <div class="form-group col-md-6 col-lg-4" id="type_container">
                                    <div class="col-sm-12">
                                        <label for="job_type" class="col-form-label col-sm-12">الرتبة</label>

                                        <select name="job_type" id="job_type"
                                                class="form-control {{ $errors->get('job-type') ? 'is-invalid' : '' }}">
                                            @foreach($job_types as $job_type)
                                                <option
                                                    value="{{($job_type != 'عسكري') ? $job_type : ''}}"
                                                    {{ ($client->job_type == $job_type)   ? 'selected' : '' }}>
                                                    {{$job_type}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- End Job Types--}}



                                {{-- Mobile Number--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="mobile" class="col-sm-12 col-form-label"> رقم الجوال</label>
                                        <input type="number"
                                               class="form-control {{ $errors->get('mobile') ? 'is-invalid' : '' }} "
                                               id="mobile" placeholder="ادخل  رقم الجوال " name="mobile"
                                               value="{{ old('mobile' , $client->mobile) }}">
                                    </div>
                                </div>


                                {{-- End Mobile Number--}}



                                {{-- Support--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label" for="support">الدعم</label>
                                        <select class="form-control
                                            {{ $errors->get('support') ? 'is-invalid' : '' }}"
                                                name="support" id="support">

                                            <option
                                                value="{{$supports['0']['id']}}" {{($client->support == $supports['0']['id'])?'selected':''}}>
                                                {{ $supports['0']['title'] }}
                                            </option>


                                            <option
                                                value="{{$supports['1']['id']}}" {{($client->support == $supports['1']['id'])?'selected':''}}>
                                                {{ $supports['1']['title'] }}
                                            </option>

                                        </select>
                                    </div>
                                </div>

                                {{-- End Support--}}



                                {{-- Register Date--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="reg_date" class="col-sm-12 col-form-label"> تاريخ التسجيل </label>
                                        <input type="date"
                                               class="form-control {{ $errors->get('reg_date') ? 'is-invalid' : '' }}"
                                               id="reg_date" placeholder="ادخل  تاريخ التسجيل " name="reg_date"
                                               value="{{ old('reg_date' , $client->reg_date) }}">
                                    </div>
                                </div>

                                {{-- End Register Date--}}


                                {{-- base salary--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="salary" class="col-sm-12 col-form-label"> الراتب الاساسي </label>
                                        <input type="text"
                                               class="form-control {{ $errors->get('salary') ? 'is-invalid' : '' }}"
                                               id="salary" name="salary" placeholder="ادخل  الراتب الاساسي "
                                               value="{{ old('salary' , $client->salary) }}">
                                    </div>
                                </div>

                                {{-- End base salary--}}


                                {{-- total salary--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="total_salary" class="col-sm-12 col-form-label"> اجمالي
                                            الراتب </label>
                                        <input type="text"
                                               class="form-control {{ $errors->get('total_salary') ? 'is-invalid' : '' }}"
                                               id="total_salary" placeholder="ادخل  اجمالي الراتب " name="total_salary"
                                               value="{{ old('total_salary' , $client->total_salary) }}">
                                    </div>
                                </div>

                                {{-- End total salary--}}



                                {{-- hiring date--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="hiring_date" class="col-sm-12 col-form-label"> تاريخ
                                            التعيين </label>
                                        <input type="date"
                                               class="form-control {{ $errors->get('hiring_date') ? 'is-invalid' : '' }}"
                                               id="hiring_date" placeholder="ادخل تاريخ التعيين " name="hiring_date"
                                               value="{{ old('hiring_date' , $client->hiring_date) }}">
                                    </div>
                                </div>

                                {{-- End hiring date--}}


                                {{-- commitment--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="commitment" class="col-sm-12 col-form-label">الالتزام </label>
                                        <input type="text"
                                               class="form-control {{ $errors->get('commitment') ? 'is-invalid' : '' }}"
                                               id="commitment" placeholder="ادخل  الالتزام " name="commitment"
                                               value="{{ old('commitment' , $client->commitment) }}">
                                    </div>
                                </div>

                                {{-- End commitment--}}



                                {{-- commitment remain--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="commitment_remain" class="col-sm-12 col-form-label">المتبقي على
                                            الالتزام </label>
                                        <input type="text"
                                               class="form-control {{ $errors->get('commitment_remain') ? 'is-invalid' : '' }}"
                                               id="commitment_remain" placeholder="ادخل  المتبقي على الالتزام "
                                               name="commitment_remain"
                                               value="{{ old('commitment_remain' , $client->commitment_remain) }}">
                                    </div>
                                </div>

                                {{-- End commitment remain--}}




                                {{-- commitment 2--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="commitment2" class="col-sm-12 col-form-label">الالتزام2 </label>
                                        <input type="text"
                                               class="form-control {{ $errors->get('commitment2') ? 'is-invalid' : '' }}"
                                               id="commitment2" placeholder="ادخل  الالتزام2 " name="commitment2"
                                               value="{{ old('commitment2' , $client->commitment2) }}">
                                    </div>
                                </div>

                                {{-- End commitment 2--}}



                                {{-- commitment remain 2--}}


                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="commitment_remain2" class="col-sm-12 col-form-label">المتبقي على
                                            الالتزام2 </label>
                                        <input type="text"
                                               class="form-control {{ $errors->get('commitment_remain2') ? 'is-invalid' : '' }}"
                                               id="commitment_remain2" placeholder="ادخل  المتبقي على الالتزام2 "
                                               name="commitment_remain2"
                                               value="{{ old('commitment_remain2' , $client->commitment_remain2) }}">
                                    </div>
                                </div>


                                {{-- End commitment remain 2--}}



                                {{--self_financing--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <label for="self_financing" class="col-sm-12 col-form-label">التمويل الشخصي </label>
                                    <div class="col-sm-12">
                                        <input type="text"
                                               class="form-control {{ $errors->get('self_financing') ? 'is-invalid' : '' }}"
                                               id="self_financing" placeholder="ادخل التمويل الشخصي"
                                               name="self_financing"
                                               value="{{ old('self_financing' , $client->self_financing) }}">
                                    </div>
                                </div>

                                {{-- end self_financing--}}



                                {{--estate_financing--}}


                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="estate_financing" class="col-sm-12 col-form-label">التمويل
                                            العقاري </label>
                                        <input type="text"
                                               class="form-control {{ $errors->get('estate_financing') ? 'is-invalid' : '' }}"
                                               id="estate_financing" placeholder="ادخل التمويل العقاري"
                                               name="estate_financing"
                                               value="{{ old('estate_financing' , $client->estate_financing) }}">
                                    </div>
                                </div>


                                {{--end estate_financing--}}




                                {{-- total_financing--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="total_financing" class="col-sm-12 col-form-label">اجمالي
                                            التمويل </label>
                                        <input type="text"
                                               class="form-control {{ $errors->get('total_financing') ? 'is-invalid' : '' }}"
                                               id="total_financing" placeholder="ادخل اجمالي التمويل"
                                               name="total_financing"
                                               value="{{ old('total_financing' , $client->total_financing) }}">
                                    </div>
                                </div>

                                {{--end total_financing--}}




                                {{-- pre_installment--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="pre_installment" class="col-sm-12 col-form-label">القسط قبل
                                            الدعم </label>
                                        <input type="text"
                                               class="form-control {{ $errors->get('pre_installment') ? 'is-invalid' : '' }}"
                                               id="pre_installment" placeholder="ادخل القسط قبل الدعم"
                                               name="pre_installment"
                                               value="{{ old('pre_installment' , $client->pre_installment) }}">
                                    </div>
                                </div>

                                {{-- end pre_installment--}}



                                {{-- after_installment--}}


                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="after_installment" class="col-sm-12 col-form-label">القسط بعد
                                            الدعم </label>
                                        <input type="text"
                                               class="form-control {{ $errors->get('after_installment') ? 'is-invalid' : '' }}"
                                               id="after_installment" placeholder="ادخل القسط بعد الدعم"
                                               name="after_installment"
                                               value="{{ old('after_installment' , $client->after_installment) }}">
                                    </div>
                                </div>
                                {{-- end after_installment--}}




                                {{-- duration--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="duration" class="col-sm-12 col-form-label">المدة </label>
                                        <input type="text"
                                               class="form-control {{ $errors->get('duration') ? 'is-invalid' : '' }}"
                                               id="duration" placeholder="ادخل المدة" name="duration"
                                               value="{{ old('duration' , $client->duration) }}">
                                    </div>
                                </div>

                                {{-- end duration--}}




                                {{-- phase--}}




                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="phase" class="col-sm-12 col-form-label">المرحلة</label>
                                        <select name="phase" id="phase"
                                                class="form-control {{ $errors->get('phase') ? 'is-invalid' : '' }}">
                                            @foreach($phases as $phase)
                                                <option
                                                    value="{{$phase['id']}}" {{($client->phase == $phase['id'])?'selected':''}}>
                                                    {{$phase['title']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                {{-- end phase--}}



                                {{--  Images Upload --}}


                                <div class="form-group col-md-6 col-lg-3">

                                    <div class="col-sm-12">
                                        <label for="identity" class="col-sm-12 col-form-label">صورة الهوية</label>

                                        <input type="file" id="identity" name="identity"
                                               class="form-control"
                                               value="{{  $client->identity }}"
                                        />

                                        <a class="d-inline-block" target="_blank" href="{{ asset($client->identity) }}">
                                            اضغط هنا لفتح الملف
                                        </a>
                                    </div>

                                </div>


                                <div class="form-group col-md-6 col-lg-3">

                                    <div class="col-sm-12">
                                        <label for="family_identity" class="col-sm-12 col-form-label">صورة بطاقة
                                            العائلة</label>

                                        <input type="file" id="family_identity" name="family_identity"
                                               class="form-control {{ $errors->get('family_identity') ? 'is-invalid' : '' }}"
                                               value="{{ old('family_identity' , $client->family_identity) }}"
                                        />
                                        <a class="d-inline-block" target="_blank"
                                           href="{{ asset($client->family_identity) }}">
                                            اضغط هنا لفتح الملف
                                        </a>
                                    </div>

                                </div>


                                <div class="form-group col-md-6 col-lg-3">

                                    <div class="col-sm-12">

                                        <label for="salary_identity" class="col-sm-12 col-form-label">تعريف
                                            بالراتب</label>

                                        <input type="file" id="salary_identity" name="salary_identity"
                                               class="form-control {{ $errors->get('salary_identity') ? 'is-invalid' : '' }}"/>

                                        <a class="d-inline-block" target="_blank"
                                           href="{{ asset($client->salary_identity) }}">
                                            اضغط هنا لفتح الملف
                                        </a>

                                    </div>

                                </div>


                                <div class="form-group col-md-6 col-lg-3">

                                    <div class="col-sm-12">

                                        <label for="instrument" class="col-sm-12 col-form-label">صورة الصك</label>

                                        <input type="file" id="instrument" name="instrument"
                                               class="form-control {{ $errors->get('instrument') ? 'is-invalid' : '' }}"/>

                                        <a class="d-inline-block" target="_blank"
                                           href="{{ asset($client->instrument) }}">
                                            اضغط هنا لفتح الملف
                                        </a>

                                    </div>

                                </div>


                                <div class="form-group col-md-6 col-lg-3">

                                    <div class="col-sm-12">
                                        <label for="construction_license" class="col-sm-12 col-form-label">صورة رخصة
                                            البناء</label>

                                        <input type="file" id="construction_license" name="construction_license"
                                               class="form-control {{ $errors->get('construction_license') ? 'is-invalid' : '' }}"/>

                                        <a class="d-inline-block" target="_blank"
                                           href="{{ asset($client->construction_license) }}">
                                            اضغط هنا لفتح الملف
                                        </a>
                                    </div>

                                </div>


                                <div class="form-group col-md-6 col-lg-3">

                                    <div class="col-sm-12">
                                        <label for="owner_identity" class="col-sm-12 col-form-label">صورة هوية
                                            المالك</label>

                                        <input type="file" id="owner_identity" name="owner_identity"
                                               class="form-control {{ $errors->get('owner_identity') ? 'is-invalid' : '' }}"/>

                                        <a class="d-inline-block" target="_blank"
                                           href="{{ asset($client->owner_identity) }}">
                                            اضغط هنا لفتح الملف
                                        </a>
                                    </div>

                                </div>


                                <div class="form-group col-md-6 col-lg-3">

                                    <div class="col-sm-12">
                                        <label for="account_statement" class="col-sm-12 col-form-label">كشف حساب اخر 3
                                            شهور مختوم من البنك</label>

                                        <input type="file" id="account_statement" name="account_statement"
                                               class="form-control {{ $errors->get('account_statement') ? 'is-invalid' : '' }}"/>


                                        <a class="d-inline-block" target="_blank"
                                           href="{{ asset($client->account_statement) }}">
                                            اضغط هنا لفتح الملف
                                        </a>
                                    </div>

                                </div>


                                <div class="form-group col-md-12" id="refuse_reson_container">
                                    <div class="col-sm-12">
                                        <label for="refuse_reson" class="col-sm-12 col-form-label"> سبب رفض
                                            الطلب </label>

                                        <textarea type="text" class="form-control" id="refuse_reson"
                                                  placeholder="ادخل السبب " name="refuse_reson">
                                            {{ old('refuse_reson' , $client->refuse_reson) }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="col-sm-12">
                                        <label for="note" class="col-sm-12 col-form-label"> ملاحظات </label>

                                        <textarea type="text" class="form-control" id="note" placeholder="ادخل ملاحظات "
                                                  name="note">

                                            {{ old('note' , $client->note) }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group  col-md-12">
                                    <div class="w-100 d-flex  ">
                                        <button type="submit" class="btn btn-primary">{{$helper['title']}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection



@section('page_scripts')
    <script>


        const statusSelect = $('#status');
        const job = $('#job');

        function checkClientStatus() {

            if (statusSelect.val() === '2') {
                $('#refuse_reson_container').removeClass("d-none");
            } else {
                $('#refuse_reson_container').addClass("d-none");
                $('textarea[name=refuse_reson]').val("");
            }
        }

        function changeJobTypeState() {
            if (job.val() === 'عسكري') {
                $('#type_container').removeClass("d-none");

            } else {
                $('#type_container').addClass("d-none");
                $('input[name=job_type]').val("");
            }
        }

        $(document).ready(function () {
            checkClientStatus()
            changeJobTypeState()
        })

        statusSelect.on('change', function () {
            checkClientStatus();
        })

        job.on('change', function () {
            changeJobTypeState()
        });
    </script>
@endsection
