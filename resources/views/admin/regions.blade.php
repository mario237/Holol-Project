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
                <h4 class="page-title">المدن</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">اللوحة</a></li>
                            <li class="breadcrumb-item active" aria-current="page">المدن</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-7">
                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['1','4']) )
                    <div class="text-left upgrade-btn">
                        <a href="{{url('dashboard/regions/create')}}" class="btn btn-primary text-white">
                            <i class="mdi mdi-account-plus"></i>اضافة مدينة
                        </a>
                    </div>
                @endif
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
                        <h4 class="card-title">ادارة المدن</h4>

                        <div class="table-responsive table-hover mt-5">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">الصورة</th>
                                    <th scope="col">الادوات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td><img src="{{url($item->image)}}" width="100px"/></td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                @if(in_array(\Illuminate\Support\Facades\Auth::user()->type,['1','4']) )
                                                    <a class="btn btn-info mx-1"
                                                       href="{{url('dashboard/regions/' . $item->id . '/edit')}}">
                                                        <i class="mdi mdi-account-edit "></i>
                                                    </a>
                                                    <form id="delete-form{{$item->id }}"
                                                          action="{{url('dashboard/regions/' . $item->id)}}"
                                                          method="POST">
                                                        @csrf()
                                                        @method('DELETE')
                                                    </form>
                                                    <a class="btn btn-danger mx-1 text-white"
                                                       onclick="confirm('Are you sure?')? $('#delete-form{{$item->id}}').submit(): false">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
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

    <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    <script>
        $('.table').dataTable();
    </script>
@endsection

