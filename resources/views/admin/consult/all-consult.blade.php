@extends('admin.layout.master')

@section('home','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">

    <style>
        i {
            color: white;
        }

        .table td {
            vertical-align: middle !important;
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
                <h4 class="page-title"> الاستفسارات</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">اللوحة</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> الاستفسارات</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="col-7">
                <div class="text-left upgrade-btn">
                    <a href="{{ route('create-consult') }}" class="btn btn-primary text-white" target="_blank">
                        <i class="fas fa-question"></i>
                        <span>اضافة استفسار</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->



    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body ">
                        <div class="">
                            <h4 class="card-title"> الاستفسارات</h4>

                            <hr/>


                            @if($consults ->isEmpty())
                                <p class="text-center my-3">لا يوجد استفسارات</p>

                            @else

                                <div class="table-responsive table-hover mt-5 overflow-auto">

                                    <table id="consultsTable"
                                           class="table table-striped table-hover dt-responsive display nowrap">
                                        <thead>
                                        <tr style="background-color: #2a61ad;color: #fff;">
                                            <td scope="col">#</td>
                                            <td scope="col">الإسم</td>
                                            <td scope="col">رقم الجوال</td>
                                            <td scope="col">المدينة</td>
                                            <td scope="col"> التمويل</td>
                                            <td scope="col"> الإجراء</td>
                                            <td scope="col"><i class="mdi mdi-whatsapp"></i></td>
                                            <th scope="col">الادوات</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($consults as $consult)
                                            <tr>
                                                <td>{{ $consult->id }}</td>
                                                <td>{{ $consult->name }}</td>
                                                <td>{{ $consult->mobile }}</td>

                                                @foreach($cities as $city)
                                                    @if($consult->city_id == $city->id)
                                                        <td>{{ $city->name}}</td>
                                                    @endif
                                                @endforeach


                                                @foreach($investments as $investment)
                                                    @if($investment['id'] == $consult->investment)
                                                        <td>{{ $investment['title'] }}</td>
                                                    @endif
                                                @endforeach


                                                @foreach($transactions as $transaction)
                                                    @if($transaction['id'] == $consult->transaction)
                                                        <td>{{ $transaction['title'] }}</td>
                                                    @endif
                                                @endforeach


                                                <td>
                                                    <a href="https://wa.me/{{ $consult->mobile }}" target="_blank">
                                                        <i class="fab fa-whatsapp text-success"></i>
                                                    </a>
                                                </td>
                                                <td>



                                                    <a class="btn btn-sm btn-primary"
                                                       href="{{url("dashboard/consults/$consult->id/edit")}}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>


                                                    <a class="modal-effect btn btn-sm btn-danger"
                                                       data-effect="effect-scale"
                                                       data-id="{{ $consult->id }}"
                                                       data-toggle="modal" href="#modaldemo9" title="حذف">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>


                                                    <div class="modal" id="modaldemo9">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content modal-content-demo">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">حذف الطلب</h6>
                                                                    <button aria-label="Close" class="close"
                                                                            data-dismiss="modal"
                                                                            type="button"><span
                                                                            aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <form
                                                                    action="{{url("dashboard/consults/delete/$consult->id")}}"
                                                                    method="POSt">
                                                                    @csrf
                                                                    @method('delete')

                                                                    <div class="modal-body">
                                                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                                                        <input type="hidden" name="id"
                                                                               id="id"
                                                                               value="">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">الغاء
                                                                        </button>
                                                                        <button type="submit" class="btn btn-danger">
                                                                            تاكيد
                                                                        </button>
                                                                    </div>
                                                                </form>


                                                            </div>
                                                        </div>


                                                        <!-- row closed -->
                                                    </div>


                                                </td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            @endif
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>




@endsection


