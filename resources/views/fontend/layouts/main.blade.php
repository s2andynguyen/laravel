
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    {{-- <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="icon" href="/my-assets/img/logo/web-logo.png" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{url('site')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('site')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('site')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{url('site')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{url('site')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('site')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('site')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('site')}}/css/style.css" type="text/css">

    {{-- <link href="{{ url('fontawesome') }}/css/all.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{url('site')}}/mycss/app.css" type="text/css">
    <link rel="stylesheet" href="{{url('my-assets')}}/css/style.css">
    <link rel="stylesheet" href="{{url('my-assets')}}/css/base.css">

</head>

<body>
    <!-- Header-->
    @include('fontend.layouts.header')

    <!-- Body-->
    @yield('body')

    <!-- Footer-->
    @include('fontend.layouts.footer')

    <!-- Js Plugins -->
    <script src="{{url('site')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{url('site')}}/js/bootstrap.min.js"></script>
    <script src="{{url('site')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{url('site')}}/js/jquery-ui.min.js"></script>
    <script src="{{url('site')}}/js/jquery.slicknav.js"></script>
    <script src="{{url('site')}}/js/mixitup.min.js"></script>
    <script src="{{url('site')}}/js/owl.carousel.min.js"></script>
    <script src="{{url('site')}}/js/main.js"></script>
    <script src="{{url('my-assets')}}/js/main.js"></script>
    <script src="{{url('admin')}}/js/main.js"></script>
    <script src="{{url('admin')}}/js/view.js"></script>
    <script src="https://kit.fontawesome.com/737f765a39.js" crossorigin="anonymous"></script>
</body>

</html>