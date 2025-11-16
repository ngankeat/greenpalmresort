<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="description" content="Green Palm Resort" >
    <meta name="keywords" content="Green Palm Resort" >
    <meta name="robots" content="INDEX,FOLLOW" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <!-- Title -->
    <title>Green Palm Resort</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/images/logo/favicon.png')}}" type="image/png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" >
    <!-- Swiper Bundle -->
    <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.css')}}" >
    <!-- slick -->
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}" >
    <!-- Magnific-Popup -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}" >
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" >

</head>

<body class="bg-neutral-400 @@bodyClass">
    @yield('content')

<!-- Jquery js -->
<script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
<!-- phosphor Js -->
<script src="{{asset('assets/js/phosphor-icon.js')}}"></script>
<!-- Bootstrap Bundle Js -->
<script src="{{asset('assets/js/boostrap.bundle.min.js')}}"></script>
<!-- appear Js -->
<script src="{{asset('assets/js/appear.min.js')}}"></script>
<!-- Swiper Bundle Js -->
<script src="{{asset('assets/js/swiper-bundle.js')}}"></script>
<!-- slick Js -->
<script src="{{asset('assets/js/slick.js')}}"></script>
<!-- Magnific-Popup Js -->
<script src="{{asset('assets/js/magnific-popup.min.js')}}"></script>
<!-- Nice-Select Js -->
<script src="{{asset('assets/js/nice-select.js')}}"></script>
<!-- purecounter Js -->
<script src="{{asset('assets/js/purecounter.js')}}"></script>
<!-- Range Slider -->
<script src="{{asset('assets/js/range-slider.js')}}"></script>
<!-- knob -->
<script src="{{asset('assets/js/jquery-knob.js')}}"></script>
<!-- Gsap js -->
<script src="{{asset('assets/js/gsap.min.js')}}"></script>
<!-- SplitText -->
<script src="{{asset('assets/js/SplitText.min.js')}}"></script>
<!-- Scroll Trigger -->
<script src="{{asset('assets/js/ScrollSmoother.min.js')}}"></script>
<!-- Scroll Trigger -->
<script src="{{asset('assets/js/ScrollTrigger.min.js')}}"></script>
<!-- Custom GSAP -->
<script src="{{asset('assets/js/custom-gsap.js')}}"></script>
<!-- Marquee -->
<script src="{{asset('assets/js/jquery.marquee.min.js')}}"></script>
<!-- main js -->
<script src="{{asset('assets/js/main.js')}}"></script>
</body>
