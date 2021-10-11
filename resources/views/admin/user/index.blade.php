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
            <h4 class="page-title">العملاء</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">اللوحة</a></li>
                        <li class="breadcrumb-item active" aria-current="page">العملاء</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-7">
            @if(\Illuminate\Support\Facades\Auth::user()->type=='4')
            <div class="text-left upgrade-btn">
                <a href="{{url('dashboard/users/create')}}" class="btn btn-primary text-white">
                    <i class="mdi mdi-account-plus"></i>اضافة عميل
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
                    <h4 class="card-title">ادارة العملاء</h4>

                    <form action="{{url('dashboard/users')}}" method="GET">
                        <div class="row ">
                            <div class="col-md-10 my-1">
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label"> نوع العميل </label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="type">
                                            <option value="-1" {{($type=='-1')?'selected':''}}>الكل
                                            </option>
                                            <option value="1" {{($type=='1')?'selected':''}}>زبائن
                                            </option>
                                            <option value="2" {{($type=='2')?'selected':''}}>موظفين</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 my-1">
                                <button type="submit" class="btn btn-primary btn-sm btn-filter m-auto d-block">عرض
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr />

                    <div class="table-responsive table-hover mt-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">الايميل</th>
                                    <th scope="col">تاريخ الميلاد</th>
                                    <th scope="col">النوع</th>
                                    <th scope="col">الادارة</th>
                                    <th scope="col">الاسم الوظيفي</th>
                                    <th scope="col">الرقم الوظيفي</th>
                                    <th scope="col">الكود المرجعي</th>
                                    <th scope="col">طلبات التمويل</th>
                                    <th scope="col">الادوات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                @php
                                $type = 'مستخدم';
                                if ($user->type=='1'){
                                $type='موظف عقارات';
                                }
                                if ($user->type=='2'){
                                $type='موظف تمويل';
                                }
                                if ($user->type=='3'){
                                $type='موظف برمجيات';
                                }
                                @endphp
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->birthday}}</td>
                                    <td>
                                        <span class="bg-dark p-1 text-white"> {{$type}}</span>
                                    </td>
                                    <td>{{($user->management)?$user->management->name:''}}</td>
                                    <td>{{($user->job_title)?$user->job_title:'-'}}</td>
                                    <td>{{($user->job_id)?$user->job_id:'-'}}</td>
                                    <td>{{($user->serial_no)?$user->serial_no:'-'}}</td>
                                    <td>
                                        <a href="{{url('dashboard/clients?user_id='.$user->id)}}">
                                            {{$user->clients->count()}}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-row">
                                            @if(\Illuminate\Support\Facades\Auth::user()->type=='4')
                                            <a class="btn btn-info btn-sm mx-1" href="{{url('dashboard/users/' . $user->id )}}">
                                                <i class="mdi mdi-eye "></i>
                                            </a>
                                            <a class="btn btn-info btn-sm mx-1" href="{{url('dashboard/users/' . $user->id . '/edit')}}">
                                                <i class="mdi mdi-account-edit "></i>
                                            </a>
                                            <form id="delete-form{{$user->id }}" action="{{url('dashboard/users/' . $user->id)}}" method="POST">
                                                @csrf()
                                                @method('DELETE')
                                            </form>
                                            <a class="btn btn-danger mx-1 btn-sm text-white" onclick="confirm('Are you sure?')? $('#delete-form{{$user->id}}').submit(): false">
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