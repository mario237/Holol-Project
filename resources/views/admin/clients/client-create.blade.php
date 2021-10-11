@extends('admin.layout.master')

@section('home','active')
@php
    $lang=app()->getLocale()
@endphp

@section('main_content')


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

                        <form action="{{$helper['action']}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method($helper['method'])

                            <div class="row">

                                {{-- client name --}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="user_id" class="col-sm-12 col-form-label">العميل</label>
                                        <select name="user_id" id="user_id" class="form-control select2 {{ $errors->get('user_id') ? 'is-invalid' : '' }}">
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
                                        <select name="status" id="status" class="form-control {{ $errors->get('status') ? 'is-invalid' : '' }}">
                                            @foreach($statuses as $status)
                                                <option class="bg-{{$status->color}}" value="{{$status->id}}">
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
                                        <select name="users_id" id="users_id" class="form-control select2 {{ $errors->get('users_id') ? 'is-invalid' : '' }}">
                                            @foreach($employees as $emp)
                                                <option value="{{ $emp->id }}">
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

                                        <select id="bank_id" class="form-control {{ $errors->get('bank_id') ? 'is-invalid' : '' }}" name="bank_id">
                                            @foreach($banks ?? '' as $bank)
                                                <option value="{{$bank->id}}">
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
                                        <input type="date" class="form-control {{ $errors->get('birthday') ? 'is-invalid' : '' }}"
                                               id="birthday" placeholder="yyyy/mm/dd"  name="birthday"
                                        value="{{ old('birthday') }}">
                                    </div>
                                </div>

                                {{-- End Birthday --}}


                                {{-- Job --}}

                                <div class="form-group col-md-6 col-lg-4" id="job_container">
                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label" for="job">الوظيفة</label>
                                        <select id="job" class="form-control {{ $errors->get('job') ? 'is-invalid' : '' }}" name="job">
                                            <option value="عسكري">عسكري</option>
                                            <option value="مدني حكومي"> مدني حكومي</option>
                                            <option value=" قطاع خاص"> قطاع خاص</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- End Job --}}



                                {{-- Job Types--}}

                                @php
                                    $job_types = ['جندي','جندي أول',' عريق','وكيل رقيب','رقيب','رقيب اول','رئيس رقباء','ملازم','ملازم أول','نقيب','رائد','مقدم','عقيد','عميد','لواء','فريق','فريق أول','متقاعد']
                                @endphp
                                <div class="form-group col-md-6 col-lg-4" id="type_container">
                                    <div class="col-sm-12">
                                        <label for="job_type" class="col-form-label col-sm-12">الرتبة</label>

                                        <select name="job_type" id="job_type" class="form-control {{ $errors->get('job-type') ? 'is-invalid' : '' }}">
                                            @foreach($job_types as $job_type)
                                                <option value="{{$job_type}}">{{$job_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- End Job Types--}}



                                {{-- Mobile Number--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="mobile" class="col-sm-12 col-form-label"> رقم الجوال</label>
                                        <input type="number" class="form-control {{ $errors->get('mobile') ? 'is-invalid' : '' }} " id="mobile" placeholder="ادخل  رقم الجوال " name="mobile"
                                               value="{{ old('mobile') }}">
                                    </div>
                                </div>


                                {{-- End Mobile Number--}}



                                {{-- Support--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label class="col-sm-12 col-form-label" for="support">الدعم</label>
                                        <select class="form-control {{ $errors->get('support') ? 'is-invalid' : '' }}" name="support" id="support">
                                            <option value="0">لا</option>
                                            <option value="1">نعم</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- End Support--}}



                                {{-- Register Date--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="reg_date" class="col-sm-12 col-form-label"> تاريخ التسجيل </label>
                                        <input type="date" class="form-control {{ $errors->get('reg_date') ? 'is-invalid' : '' }}"
                                               id="reg_date" placeholder="ادخل  تاريخ التسجيل " name="reg_date"
                                        value="{{ old('reg_date') }}">
                                    </div>
                                </div>

                                {{-- End Register Date--}}


                                {{-- base salary--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="salary" class="col-sm-12 col-form-label"> الراتب الاساسي </label>
                                        <input type="text" class="form-control {{ $errors->get('salary') ? 'is-invalid' : '' }}"
                                               id="salary" name="salary" placeholder="ادخل  الراتب الاساسي "
                                        value="{{ old('salary') }}">
                                    </div>
                                </div>

                                {{-- End base salary--}}


                                {{-- total salary--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="total_salary" class="col-sm-12 col-form-label"> اجمالي الراتب </label>
                                        <input type="text" class="form-control {{ $errors->get('total_salary') ? 'is-invalid' : '' }}"
                                               id="total_salary" placeholder="ادخل  اجمالي الراتب " name="total_salary"
                                               value="{{ old('total_salary') }}">
                                    </div>
                                </div>

                                {{-- End total salary--}}



                                {{-- hiring date--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="hiring_date" class="col-sm-12 col-form-label"> تاريخ التعيين </label>
                                        <input type="date" class="form-control {{ $errors->get('hiring_date') ? 'is-invalid' : '' }}"
                                               id="hiring_date" placeholder="ادخل تاريخ التعيين " name="hiring_date"
                                               value="{{ old('hiring_date') }}">
                                    </div>
                                </div>

                                {{-- End hiring date--}}


                                {{-- commitment--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="commitment" class="col-sm-12 col-form-label">الالتزام </label>
                                        <input type="text" class="form-control {{ $errors->get('commitment') ? 'is-invalid' : '' }}"
                                               id="commitment" placeholder="ادخل  الالتزام " name="commitment"
                                               value="{{ old('commitment') }}">
                                    </div>
                                </div>

                                {{-- End commitment--}}



                                {{-- commitment remain--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="commitment_remain" class="col-sm-12 col-form-label">المتبقي على الالتزام </label>
                                        <input type="text" class="form-control {{ $errors->get('commitment_remain') ? 'is-invalid' : '' }}"
                                               id="commitment_remain" placeholder="ادخل  المتبقي على الالتزام " name="commitment_remain"
                                               value="{{ old('commitment_remain') }}">
                                    </div>
                                </div>

                                {{-- End commitment remain--}}




                                {{-- commitment 2--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="commitment2" class="col-sm-12 col-form-label">الالتزام2 </label>
                                        <input type="text" class="form-control {{ $errors->get('commitment2') ? 'is-invalid' : '' }}"
                                               id="commitment2" placeholder="ادخل  الالتزام2 " name="commitment2"
                                               value="{{ old('commitment2') }}">
                                    </div>
                                </div>

                                {{-- End commitment 2--}}



                                {{-- commitment remain 2--}}


                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="commitment_remain2" class="col-sm-12 col-form-label">المتبقي على الالتزام2 </label>
                                        <input type="text" class="form-control {{ $errors->get('commitment_remain2') ? 'is-invalid' : '' }}"
                                               id="commitment_remain2" placeholder="ادخل  المتبقي على الالتزام2 " name="commitment_remain2"
                                               value="{{ old('commitment_remain2') }}">
                                    </div>
                                </div>


                                {{-- End commitment remain 2--}}



                                {{--self_financing--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <label for="self_financing" class="col-sm-12 col-form-label">التمويل الشخصي </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control {{ $errors->get('self_financing') ? 'is-invalid' : '' }}"
                                               id="self_financing" placeholder="ادخل التمويل الشخصي" name="self_financing"
                                               value="{{ old('self_financing') }}">
                                    </div>
                                </div>

                                {{-- end self_financing--}}



                                {{--estate_financing--}}


                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="estate_financing" class="col-sm-12 col-form-label">التمويل العقاري </label>
                                        <input type="text" class="form-control {{ $errors->get('estate_financing') ? 'is-invalid' : '' }}"
                                               id="estate_financing" placeholder="ادخل التمويل العقاري" name="estate_financing"
                                               value="{{ old('estate_financing') }}">
                                    </div>
                                </div>



                                {{--end estate_financing--}}




                                {{-- total_financing--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="total_financing" class="col-sm-12 col-form-label">اجمالي التمويل </label>
                                        <input type="text" class="form-control {{ $errors->get('total_financing') ? 'is-invalid' : '' }}"
                                               id="total_financing" placeholder="ادخل اجمالي التمويل" name="total_financing"
                                               value="{{ old('total_financing') }}">
                                    </div>
                                </div>

                                {{--end total_financing--}}




                                {{-- pre_installment--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="pre_installment" class="col-sm-12 col-form-label">القسط قبل الدعم </label>
                                        <input type="text" class="form-control {{ $errors->get('pre_installment') ? 'is-invalid' : '' }}"
                                               id="pre_installment" placeholder="ادخل القسط قبل الدعم" name="pre_installment"
                                               value="{{ old('pre_installment') }}">
                                    </div>
                                </div>

                                {{-- end pre_installment--}}



                                {{-- after_installment--}}



                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="after_installment" class="col-sm-12 col-form-label">القسط بعد الدعم </label>
                                        <input type="text" class="form-control {{ $errors->get('after_installment') ? 'is-invalid' : '' }}"
                                               id="after_installment" placeholder="ادخل القسط بعد الدعم" name="after_installment"
                                               value="{{ old('after_installment') }}">
                                    </div>
                                </div>
                                {{-- end after_installment--}}




                                {{-- duration--}}

                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="duration" class="col-sm-12 col-form-label">المدة </label>
                                        <input type="text" class="form-control {{ $errors->get('duration') ? 'is-invalid' : '' }}"
                                               id="duration" placeholder="ادخل المدة" name="duration"
                                               value="{{ old('duration') }}">
                                    </div>
                                </div>

                                {{-- end duration--}}




                                {{-- phase--}}


                                <div class="form-group col-md-6 col-lg-4 ">
                                    <div class="col-sm-12">
                                        <label for="phase" class="col-sm-12 col-form-label">المرحلة</label>
                                        <select name="phase" id="phase" class="form-control {{ $errors->get('phase') ? 'is-invalid' : '' }}">
                                            @foreach(trans('phases') as $key => $value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- end phase--}}



                                {{--  Images Upload --}}


                                <livewire:file-uploader name="identity" title="صورة الهوية" :item="$item" />
                                <livewire:file-uploader name="family_identity" title="صورة بطاقة العائلة" :item="$item" />
                                <livewire:file-uploader name="salary_identity" title="تعريف بالراتب" :item="$item" />
                                <livewire:file-uploader name="instrument" title="صورة الصك" :item="$item" />
                                <livewire:file-uploader name="construction_license" title="صورة رخصة البناء" :item="$item" />
                                <livewire:file-uploader name="owner_identity" title="صورة هوية المالك" :item="$item" />
                                <livewire:multiple-file-uploader name="account_statement" title="كشف حساب اخر 3 شهور مختوم من البنك" :item="$item" />



                                {{--  End Images Upload --}}




                                <div class="form-group col-md-12">
                                    <div class="col-sm-12">
                                        <label for="note" class="col-sm-12 col-form-label"> ملاحظات </label>

                                        <textarea type="text" class="form-control" id="note" placeholder="ادخل ملاحظات " name="note">
                                            {{ old('note') }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group  col-md-12" >
                                    <div class="w-100 d-flex  ">
                                        <button type="reset" class=" mx-2 btn btn-dark">مسح البيانات</button>
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
