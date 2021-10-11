<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="no-js" dir="ltr">
<head>
    @include('admin.layout.header')

</head>

<body>

<div class="main-wrapper bg-light">




    <div class="container d-flex justify-content-center ">

        <div class="card p-2 card-primary col-md-5 login " >
            <div class="card-img text-center">
                <img src="{{asset('images/logo.jpg')}}" class="img-fluid" style="border-radius: 10px" />
            </div>
            @include('admin.layout.message')
            <div class="card-body">
                <form class="form-horizontal form-material" action="{{url('dashboard/login')}}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label class="col-md-12">البريد الاكتروني</label>
                        <div class="col-md-12">
                            <input type="email" required placeholder="" class="form-control form-control-line" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">كلمة المرور</label>
                        <div class="col-md-12">
                            <input type="password" required placeholder="" class="form-control form-control-line" name="password">
                        </div>
                    </div>

                    <div class="form-group m-t-40">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>


    @include('admin.layout.footer')

</div>

<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('admin/libs/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('admin/libs/popper/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('admin/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/app-style-switcher.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('admin/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('admin/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('admin/js/custom.js')}}"></script>

</body>
</html>