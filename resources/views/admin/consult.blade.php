
@extends('admin.layout.master')

@section('home','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
    <style>
        .bg-blue {
            background-color: rgba(59, 130, 244, 0.4) !important;
        }

        .bg-red {
            background-color: rgba(225, 12, 21, 0.46) !important;
        }

        .bg-green {
            background-color: rgba(63, 183, 31, 0.46) !important;
        }

        .bg-yellow {
            background-color: rgba(183, 180, 22, 0.46) !important;
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
                        <h4 class="card-title">  الاستفسارات</h4>
                        <table class="table">
                          <thead>
                            <tr style="background-color: #2a61ad;color: #fff;">
                              <td>الإسم</td>
                              <td>رقم الجوال</td>
                              <td>المدينة</td>
                              <td> التمويل</td>
                              <td> الإجراء</td>
                              <td><i class="mdi mdi-whatsapp"></i> </td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>

@endsection
