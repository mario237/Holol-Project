@extends('admin.layout.master')

@section('home','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

@endsection



@section('main_content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">اضافة بنك</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">اللوحة</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('show-all-consults') }}">الاستفسارات</a></li>
                            <li class="breadcrumb-item active" aria-current="page">تعديل استفسار</li>
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
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-5">


                        <form action="{{$helper['action']}}" method="POST">
                            @csrf
                            @method($helper['method'])

                            <input type="hidden" value="{{ $consult->id }}">



                            <div class="form-group row my-3">
                                <label for="name" class="col-sm-2 col-form-label">الاسم</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{ $errors->get('name') ? 'is-invalid' : '' }}"
                                           id="name" placeholder="ادخل الاسم" name="name" value="{{old('name' , $consult->name)}}">
                                </div>
                            </div>


                            <div class="form-group row my-3">
                                <label for="mobile" class="col-sm-2 col-form-label">رقم الجوال</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control {{ $errors->get('mobile') ? 'is-invalid' : '' }}"
                                           id="mobile" placeholder="ادخل رقم الجوال" name="mobile" value="{{old('mobile' , $consult->mobile)}}">
                                </div>
                            </div>


                            <div class="form-group row my-3">
                                <label for="city" class="col-sm-2 col-form-label">المدينة</label>
                                <div class="col-sm-10">
                                    <select id="city"
                                            class="form-control"
                                            name="city_id">

                                        @foreach($cities as $city)
                                            <option
                                                value="{{$city->id}}"
                                                {{($consult->city_id == $city->id)?'selected':''}}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row my-3">
                                <label for="investment" class="col-sm-2 col-form-label">التمويل</label>
                                <div class="col-sm-10">
                                    <select id="investment"
                                            class="form-control"
                                            name="investment">

                                        @foreach($investments as $investment)
                                            <option
                                                value="{{$investment['id']}}"
                                                {{($consult->investment == $investment['id'])?'selected':''}}>
                                                {{ $investment['title']}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row my-3">
                                <label for="transaction" class="col-sm-2 col-form-label">الاجراء</label>
                                <div class="col-sm-10">
                                    <select id="transaction"
                                            class="form-control"
                                            name="transaction">

                                        @foreach($transactions as $transaction)
                                            <option
                                                value="{{$transaction['id']}}"
                                                {{($consult->transaction == $transaction['id'])?'selected':''}}>
                                                {{ $transaction['title']}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row my-3">
                                <div class="w-100 mt-3">
                                    <button type="submit" class="btn btn-primary">تعديل استفسار</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>

@endsection






<!-- ---------------------------------------------------- -->

@section('page_scripts')

@endsection
