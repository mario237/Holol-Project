@extends('admin.layout.master')

@section('home','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
@endsection



@section('main_content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">طلبات التمويل</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">اللوحة</a></li>
                            <li class="breadcrumb-item active" aria-current="page">طلبات التمويل</li>
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
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ادارة طلبات التمويل</h4>

                        <div class="table-responsive table-hover mt-5">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">الهاتف</th>
                                    <th scope="col">الدعم</th>
                                    <th scope="col">الوظيفة</th>
                                    <th scope="col">نوع التمويل</th>
                                    <th scope="col">تاريخ الطلب</th>
                                    <th scope="col">تمت المعالجة من قبل</th>
                                    <th scope="col">الكود المرجعي </th>
                                    <th scope="col">الادوات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $item)
                                    <tr class="{{($item->seen!='0')?'bg-light-gray':''}} ">
                                        <td>{{$item->code}}</td>
                                        <td>{{$item->fullname}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{($item->support)?"نعم":"لا"}}</td>
                                        <td>{{$item->job}}</td>
                                        <td>{{$item->finance_type}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{($item->seen_name)?$item->seen_name:'-'}}</td>
                                        <td>{{($item->ref_code)?$item->ref_code:'-'}}</td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['2','4']))
                                                    <a class="btn btn-primary mx-1"
                                                       href="{{url('dashboard/orders/financial/' . $item->id)}}">
                                                        <i class="mdi mdi-eye "></i>
                                                    </a>

                                                    <form id="delete-form{{$item->id }}"
                                                          action="{{url('dashboard/orders/financial/' . $item->id)}}"
                                                          method="POST">
                                                        @csrf()
                                                        @method('DELETE')
                                                    </form>
                                                    <a class="btn btn-danger mx-1 text-white"
                                                       onclick="confirm('Are you sure?')? $('#delete-form{{$item->id}}').submit(): false">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>

                                                    @if($item->seen==0)

                                                        <form id="change-form{{$item->id }}"
                                                              action="{{url('dashboard/orders/financial/' . $item->id)}}"
                                                              method="POST">
                                                            <input type="hidden" name="seen" value="1">
                                                            @method('PUT')
                                                            @csrf()
                                                        </form>
                                                        <a onclick="$('#change-form{{$item->id}}').submit()" class="btn btn-dark mx-1 text-white btn-sm">
                                                            تحديد كمشاهد
                                                        </a>
                                                    @else
                                                        <span class="btn btn-default btn-sm" style="cursor: auto">
                                                             <i class="mdi mdi-check"></i>
                                                            تمت المشاهدة
                                                        </span>
                                                    @endif

                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
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


    <script>
        $('.table').dataTable();
    </script>
@endsection

