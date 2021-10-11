<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="no-js" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    @include('layout.header')

    @yield('page_styles')


</head>

<body>

@include('layout.navbar')


@yield('main_content')

@include('layout.footer')

@yield('page_scripts')
</body>
</html>