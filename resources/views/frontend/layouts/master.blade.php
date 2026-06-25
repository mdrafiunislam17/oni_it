<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- Google Bangla Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">


    <!-- Stylesheets -->
    <link rel="icon" href="{{ asset('frontend/images/icon.webp')}} " type="image/gif" sizes="16x16">

    <link href="{{ asset('frontend/css/bootstrap.min.css')}} " rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('frontend/css/plugins.css')}} " rel="stylesheet" type="text/css" >
    <link href="{{ asset('frontend/css/swiper.css')}} " rel="stylesheet" type="text/css" >
    <link href="{{ asset('frontend/css/style.css')}} " rel="stylesheet" type="text/css" >
    <link href="{{ asset('frontend/css/coloring.css')}} " rel="stylesheet" type="text/css" >
    <!-- color scheme -->
    <link id="colors" href="{{ asset('frontend/css/colors/scheme-01.css')}} " rel="stylesheet" type="text/css" >

    <title> @yield("title") |  Arabian Group</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="{{ $settings['HOME_PAGE_META_TITLE'] }}">
    <meta name="description" content="{{ $settings['HOME_PAGE_META_DESC'] }}">
    <meta name="keywords" content="{{ $settings['HOME_PAGE_META_KEYWORDS'] }}">

    <meta name="theme-color" content="#c2185b">

    @stack("styles")

    <style>
        body,
        p,
        h1,h2,h3,h4,h5,h6,
        a,
        li,
        button,
        input,
        textarea{
            font-family: 'Hind Siliguri', sans-serif !important;
        }
    </style>



</head>

<body>

@include('frontend.layouts.header')



<main>
{{--        <a href="#" id="back-to-top"></a>--}}

{{--        <!-- page preloader begin -->--}}
{{--        <div id="de-loader"></div>--}}
{{--        <!-- page preloader close -->--}}


        @yield("content")


</main>



    @include('frontend.layouts.footer')





    @include('frontend.layouts.script')


@stack("scripts")
</body>
</html>
