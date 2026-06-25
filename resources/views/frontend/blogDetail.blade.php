@extends("frontend.layouts.master")

@section("title", "  ব্লগ বিস্তারিত")

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
            <h2>ব্লগ বিস্তারিত</h2>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('frontend.index')}}"><i class="fa-solid fa-house fa-fw"></i> হোম</a></li>
                <li> ব্লগ বিস্তারিত</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Sidebar Page Container -->
    @php
        $service_title = "ব্লগ বিস্তারিত";
        $service_text = "
                ব্লগ বিস্তারিত একটি সৃজনশীল, প্রযুক্তিগত এবং নান্দনিক প্রক্রিয়া, যার মাধ্যমে একটি স্থানকে সুন্দর, আরামদায়ক এবং কার্যকরভাবে ব্যবহারযোগ্য করে তোলা হয়। এটি শুধুমাত্র ঘর বা অফিস সাজানোর কাজ নয়, বরং একটি সম্পূর্ণ পরিকল্পিত ডিজাইন কনসেপ্টের বাস্তবায়ন।

                আধুনিক যুগে ইন্টেরিয়র ডিজাইন মানুষের জীবনযাত্রার মান উন্নত করতে গুরুত্বপূর্ণ ভূমিকা পালন করছে। একটি সুন্দর এবং সুপরিকল্পিত ইন্টেরিয়র শুধু দেখতেই আকর্ষণীয় নয়, এটি মানুষের মানসিক প্রশান্তি, কাজের দক্ষতা এবং জীবনধারার উপরও ইতিবাচক প্রভাব ফেলে।

                আমাদের ইন্টেরিয়র ডিজাইন সেবার মূল লক্ষ্য হলো ক্লায়েন্টের চাহিদা, রুচি এবং লাইফস্টাইল অনুযায়ী একটি ইউনিক ও আধুনিক ডিজাইন তৈরি করা। প্রতিটি স্পেসের নিজস্ব বৈশিষ্ট্য রয়েছে এবং আমরা সেই বৈশিষ্ট্যকে আরও আকর্ষণীয়ভাবে উপস্থাপন করার চেষ্টা করি।

                আমরা বাসা, অফিস, রেস্টুরেন্ট, শোরুম এবং বাণিজ্যিক প্রতিষ্ঠানের জন্য আধুনিক ও ক্লাসিক ডিজাইনের সমন্বয়ে নান্দনিক সমাধান প্রদান করি। আমাদের দক্ষ ডিজাইনার টিম স্পেস প্ল্যানিং, কালার কম্বিনেশন, লাইটিং ডিজাইন, ফার্নিচার সিলেকশন এবং ডেকোরেশনসহ প্রতিটি ধাপে অত্যন্ত যত্নসহকারে কাজ করে।

                আমরা প্রতিটি প্রজেক্টে গুণগত মান, সৃজনশীলতা এবং সময়মতো ডেলিভারিকে সর্বোচ্চ গুরুত্ব দিয়ে থাকি। ক্লায়েন্টের বাজেট এবং চাহিদা অনুযায়ী সর্বোত্তম ডিজাইন নিশ্চিত করাই আমাদের প্রধান লক্ষ্য।

                আমাদের লক্ষ্য শুধু একটি সুন্দর স্থান তৈরি করা নয়, বরং এমন একটি আরামদায়ক এবং ব্যবহারবান্ধব পরিবেশ তৈরি করা, যা দীর্ঘদিন ধরে মানসম্মত অভিজ্ঞতা প্রদান করবে।
                ";
        $service_text_1 = "ব্লগ বিস্তারিত হলো একটি শিল্প ও বিজ্ঞান, যার মাধ্যমে একটি স্থানকে সুন্দর, কার্যকর এবং ব্যবহারযোগ্য করে তোলা হয়। এটি শুধু সাজসজ্জা নয়, বরং একটি সম্পূর্ণ পরিকল্পিত প্রক্রিয়া।";
        $service_text_2 = "আমরা আধুনিক ও ক্লাসিক ডিজাইনের সমন্বয়ে আপনার ঘর বা অফিসকে আরও আকর্ষণীয় করে তুলি। প্রতিটি প্রজেক্টে আমরা ক্লায়েন্টের চাহিদাকে সর্বোচ্চ গুরুত্ব দেই।";
        $service_text_3 = "আমাদের অভিজ্ঞ ডিজাইনার টিম প্রতিটি স্পেসকে নতুন রূপ দিতে সক্ষম। গুণগত মান ও নান্দনিকতা আমাদের প্রধান লক্ষ্য।";

    @endphp

    <div class="sidebar-page-container style-two">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Side -->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                    <div class="service-detail">
                        <div class="service-detail_inner">

                            <div class="service-detail_image">
                                <img src="{{ asset('frontend/assets/images/resource/news-2.jpg') }}" alt="ইন্টেরিয়র ডিজাইন" />
                            </div>

                            <div class="service-detail_content">

                                <h3 class="service-detail_heading">
                                    {{ $service_title }}
                                </h3>

                                <p>{{ $service_text }}</p>
                                <p>{{ $service_text_2 }}</p>
                                <p>{{ $service_text_3 }}</p>



                                <p>
                                <p>{{ $service_text_1 }}</p>
                                <p>{{ $service_text_2 }}</p>
                                <p>{{ $service_text_3 }}</p>
                                   <p> ইন্টেরিয়র ডিজাইন শুধু সৌন্দর্য বৃদ্ধি করে না, এটি একটি স্থানের ব্যবহারযোগ্যতাও উন্নত করে। আধুনিক প্রযুক্তি ও সৃজনশীলতার মাধ্যমে আমরা প্রতিটি প্রজেক্টকে অনন্য করে তুলি।
                                </p>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
