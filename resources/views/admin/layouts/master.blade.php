<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from sb-admin-pro.startbootstrap.com/dashboard-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Mar 2026 06:06:07 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> @yield("title") | Admin Panel</title>
    <link href="{{asset('cdn/style.min.css')}}" rel="stylesheet" />
    <link href="{{asset('cdn/litepicker.css')}}" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
{{--    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}" />--}}
    <link rel="shortcut icon" href="{{asset('frontend/assets/img/logo/fav-icon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('frontend/images/logo/fevi4.jpg')}}">
{{--    <script data-search-pseudo-elements="" defer="" src="{{asset('cdn/all.min.js')}}" crossorigin="anonymous"></script>--}}
{{--    <script src="{{asset('cdn/feather.min.js')}}" crossorigin="anonymous"></script>--}}
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css')}}">


    @stack("styles")

</head>
<body class="nav-fixed">


@include("admin.layouts.nav")

<div id="layoutSidenav">

    @include("admin.layouts.aside")


    <div id="layoutSidenav_content">


        @yield("content")

        @include("admin.layouts.footer")


    </div>
</div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebarToggle = document.querySelector('#sidebarToggle');

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function (event) {
                event.preventDefault();
                document.body.classList.toggle('sidenav-toggled');
                localStorage.setItem(
                    'sb|sidebar-toggle',
                    document.body.classList.contains('sidenav-toggled')
                );
            });
        }
    });
</script>
{{--<script data-cfasync="false" src="{{asset('cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>--}}

<script src="{{asset('js/scripts.js')}}"></script>

{{--<script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>--}}
{{--<script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>--}}
{{--<script src="{{asset('simple-datatables.min.js')}}" crossorigin="anonymous"></script>--}}
{{--<script src="{{asset('js/datatables/datatables-simple-demo.js')}}"></script>--}}
<script src="{{asset('js/litepicker.js')}}"></script>

<script src="{{asset('cdn/bundle.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('cdn/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
{{--<script src="{{asset('cdn/Chart.min.js')}}" crossorigin="anonymous"></script>--}}


{{--<script src="{{asset('cdn/sb-customizer.js')}}"></script>--}}
{{--<sb-customizer project="sb-admin-pro"></sb-customizer>--}}
{{--<script defer src="{{asset('cdn/v8c78df7c7c0f484497ecbca7046644da1771523124516')}}" integrity="sha512-8DS7rgIrAmghBFwoOTujcf6D9rXvH8xm8JQ1Ja01h9QX8EzXldiszufYa4IFfKdLUKTTrnSFXLDkUEOTrZQ8Qg==" data-cf-beacon='{"version":"2024.11.0","token":"6e2c2575ac8f44ed824cef7899ba8463","server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>--}}
{{--<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9e3474e81a24a721',t:'MTc3NDY3ODA2OA=='};var a=document.createElement('script');a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>--}}

@stack("scripts")

</html>
