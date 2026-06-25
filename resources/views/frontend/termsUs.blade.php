@extends("frontend.layouts.master")

@section("title", "  ব্যবহারের শর্তাবলী")

@section("content")

    @push('styles')

    @endpush

    <!-- Page Title -->
    <section class="page-title">
        <div class="page-title_cloud" style="background-image:url({{asset('frontend/assets/images/icons/cloud.png')}})"></div>
        <div class="page-title_cloud-two" style="background-image:url({{asset('frontend/assets/images/icons/cloud-1.png')}}"></div>
        <div class="page-title_pattern" style="background-image:url({{asset('frontend/assets/images/background/pattern-3.png')}}"></div>
        <div class="page-title_gradient"></div>
        <div class="auto-container">
            <h2>ব্যবহারের শর্তাবলী</h2>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('frontend.index')}}"><i class="fa-solid fa-house fa-fw"></i> হোম</a></li>
                <li> বব্যবহারের শর্তাবলী </li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Sidebar Page Container -->
    @php
        $service_title = "ব্যবহারের শর্তাবলী";
      $service_text = "

রিয়েল এস্টেট এমন একটি গুরুত্বপূর্ণ খাত যা মানুষের আবাসন, ব্যবসা এবং বিনিয়োগের সাথে সরাসরি সম্পর্কিত। আধুনিক নগরায়ন এবং উন্নত জীবনযাত্রার চাহিদা বৃদ্ধির সাথে সাথে রিয়েল এস্টেট খাত দিন দিন আরও বিস্তৃত এবং সম্ভাবনাময় হয়ে উঠছে। আমরা গ্রাহকদের জন্য নিরাপদ, আধুনিক এবং পরিকল্পিত রিয়েল এস্টেট সমাধান প্রদান করে থাকি।

আমাদের মূল লক্ষ্য হলো গ্রাহকদের চাহিদা, পছন্দ এবং বাজেট অনুযায়ী সঠিক সম্পত্তি নির্বাচন করতে সহায়তা করা। আমরা আবাসিক ফ্ল্যাট, বাণিজ্যিক স্পেস, প্লট এবং আধুনিক আবাসন প্রকল্প নিয়ে কাজ করি। প্রতিটি প্রকল্পে উন্নত নির্মাণমান, আধুনিক ডিজাইন এবং নিরাপদ পরিবেশ নিশ্চিত করা হয়।

আমরা বিশ্বাস করি একটি সুন্দর ও পরিকল্পিত আবাসন শুধু থাকার জায়গা নয়, বরং একটি স্বাচ্ছন্দ্যময় জীবনধারার প্রতীক। তাই প্রতিটি প্রকল্পে আমরা খোলামেলা পরিবেশ, আধুনিক সুবিধা এবং দীর্ঘস্থায়ী গুণগত মান নিশ্চিত করার চেষ্টা করি।

আমাদের অভিজ্ঞ টিম রিয়েল এস্টেট বাজার বিশ্লেষণ করে গ্রাহকদের জন্য সর্বোত্তম বিনিয়োগের সুযোগ তৈরি করে। জমি ক্রয়-বিক্রয়, ফ্ল্যাট বুকিং, সম্পত্তি ব্যবস্থাপনা এবং বিনিয়োগ পরামর্শসহ প্রতিটি ক্ষেত্রে আমরা নির্ভরযোগ্য সেবা প্রদান করি।

আমরা প্রতিটি ক্লায়েন্টের সাথে স্বচ্ছতা ও বিশ্বস্ততার ভিত্তিতে কাজ করি। প্রকল্প পরিকল্পনা থেকে শুরু করে সম্পূর্ণ হস্তান্তর পর্যন্ত প্রতিটি ধাপে গ্রাহকদের সর্বোচ্চ সহায়তা প্রদান করা হয়। সময়মতো কাজ সম্পন্ন করা এবং গুণগত মান বজায় রাখাই আমাদের প্রধান অঙ্গীকার।

আমাদের লক্ষ্য শুধু ভবন নির্মাণ করা নয়, বরং এমন একটি নিরাপদ ও আধুনিক পরিবেশ তৈরি করা যেখানে মানুষ স্বপ্ন পূরণের নতুন ঠিকানা খুঁজে পায়। গুণগত সেবা, আধুনিক পরিকল্পনা এবং গ্রাহক সন্তুষ্টির মাধ্যমে আমরা একটি বিশ্বস্ত রিয়েল এস্টেট প্রতিষ্ঠান হিসেবে কাজ করে যাচ্ছি।

";

    @endphp

    <div class="sidebar-page-container style-two">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Side -->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                    <div class="service-detail">
                        <div class="service-detail_inner">



                            <div class="service-detail_content">

                                <h3 class="service-detail_heading">
                                    {{ $service_title }}
                                </h3>

                                <p>{{ $service_text }}</p>


                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
