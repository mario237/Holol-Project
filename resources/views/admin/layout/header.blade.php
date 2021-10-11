<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="robots" content="noindex,nofollow">
<title>{{setting('site_name')}}</title>
<link rel="canonical" href="" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{get_url(setting('site_icon'))}}">
<!-- Custom CSS -->
<link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/libs/datatable/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<script>
    var base_url = '{{url('')}}';
</script>