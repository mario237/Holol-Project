@extends('admin.layout.master')

@section('home','active')
@php
    $lang=app()->getLocale()
@endphp

@section('page_styles')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">


<style>
     input[type='search']  {
        margin: 16px  !important;
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
                <h4 class="page-title">بيانات الطلبات</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">اللوحة</a></li>
                            <li class="breadcrumb-item active" aria-current="page">بيانات الطلبات</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-7">
                <div class="text-left upgrade-btn">
                    <a href="{{url('dashboard/clients/create')}}" class="btn btn-primary text-white">
                        <i class="mdi mdi-account-plus"></i>اضافة طلب
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
                        <div class="d-flex align-items-center ">
                            <h4 class="card-title">ادارة بيانات الطلبات</h4>
                            <div class="mx-2 h4">
                                <button type="button" class="btn btn-info" style="border-radius:0" name="button">
                                    التمويل العقارى
                                    <span class="badge badge-light mr-2">1</span>
                                </button>
                            </div>
                            <div class="mx-2 h4">
                                <button type="button" class="btn btn-success" style="border-radius:0" name="button">
                                    التمويل الشخصى
                                    <span class="badge badge-light mr-2">1</span>
                                </button>
                            </div>
                            <div class="mx-2 h4">
                                <button type="button" class="btn btn-warning" style="border-radius:0" name="button">
                                    طلبات بالإنتظار
                                    <span class="badge badge-light mr-2">1</span>
                                </button>
                            </div>
                            <div class="mx-2 h4">
                                <button type="button" class="btn btn-success" style="border-radius:0" name="button">
                                    طلبات موافقة
                                    <span class="badge badge-light mr-2">1</span>
                                </button>
                            </div>
                            <div class="mx-2 h4">
                                <button type="button" class="btn btn-danger" style="border-radius:0" name="button">
                                    طلبات مرفوضة
                                    <span class="badge badge-light mr-2">1</span>
                                </button>
                            </div>
                        </div>

                        <hr/>

                        <div class="row ">
                            <div class="col-md-2 my-1">
                                <button class="btn btn-primary btn-sm btn-filter m-auto d-block">عرض بيانات الطلبات
                                </button>

                        </div>

                    </div>
                    <hr/>


                    @if($clients ->isEmpty())
                        <p class="text-center">لا يوجد طلبات</p>

                    @else

                        <div class="table-responsive table-hover mt-5 overflow-auto">
                            <table id="clientsTable" class="table table-striped table-hover dt-responsive display nowrap">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">العميل</th>
                                    <th scope="col">رقم الجوال</th>
                                    <th scope="col">حالة الطلب</th>
                                    <th scope="col">المراجعة</th>
                                    <th scope="col">موظف البنك</th>
                                    <th scope="col">البنك</th>
                                    <th scope="col">الدعم</th>
                                    <th scope="col">تاريخ التسجيل</th>
                                    <th scope="col">الادوات</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $i = 0; ?>
                                @foreach($clients ?? '' as $client)

                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $client->fullname }}</td>
                                        <td>{{ $client->mobile }}</td>

                                        <td class="text-{{ \App\ClientStatus::find($client->status)->color  }}">
                                            {{ \App\ClientStatus::find($client->status)->title }}
                                        </td>


                                        @foreach($phases as $phase)
                                            @if($phase['id'] == $client->phase)
                                                <td>{{ $phase['title'] }}</td>
                                            @endif
                                        @endforeach


                                        <td>{{ \App\Models\Employee::find($client->users_id)->name }}</td>
                                        <td>{{ $client->bank }}</td>
                                        <td>{{ ($client->support == 0) ? 'لا' : 'نعم' }}</td>
                                        <td>{{ $client->reg_date }}</td>
                                        <td>

                                            <a class="btn btn-sm btn-dark"
                                               href="{{url("dashboard/clients/$client->id/show")}}">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a class="btn btn-sm btn-primary"
                                               href="{{url("dashboard/clients/$client->id/edit")}}">
                                                <i class="fas fa-edit"></i>
                                            </a>


                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                               data-id="{{ $client->id }}"
                                               data-toggle="modal" href="#modaldemo9" title="حذف">
                                                <i class="fas fa-user-times"></i>
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
                                                        <form action="{{ url("dashboard/clients/delete/$client->id") }}"
                                                              method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <div class="modal-body">
                                                                <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                                                <input type="hidden" name="client_id" id="client_id"
                                                                       value="">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">الغاء
                                                                </button>
                                                                <button type="submit" class="btn btn-danger">تاكيد
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
    </div>





    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

@endsection


@section('page_scripts')

    <script>


        const table = $('#clientsTable').DataTable();

        $('#clientSearchInput').on('keyup', function () {
            table.search(this.value).draw();
        });

    </script>

@endsection
