@extends("frontend.layouts.master")

@section("title", "পরিষেবার বিবরণ")

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
            <h2>পরিষেবার বিবরণ</h2>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('frontend.index')}}"><i class="fa-solid fa-house fa-fw"></i> হোম</a></li>
                <li>পরিষেবার বিবরণ</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Sidebar Page Container -->
    @php
        $service_title = " বিল্ডিং নির্মাণ";
        $service_text = "আমাদের কোম্পানি একটি আধুনিক ও নির্ভরযোগ্য নির্মাণ ও রিয়েল এস্টেট সেবা প্রদানকারী প্রতিষ্ঠান, যেখানে আমরা প্রতিটি প্রকল্পকে অত্যন্ত গুরুত্ব ও যত্নের সাথে পরিচালনা করি। দীর্ঘদিনের অভিজ্ঞতা এবং দক্ষ ইঞ্জিনিয়ার ও ডিজাইনার টিমের মাধ্যমে আমরা গ্রাহকদের স্বপ্নকে বাস্তবে রূপ দেওয়ার কাজ করি।

            আমরা Building Construction সেবার মাধ্যমে আবাসিক, বাণিজ্যিক এবং শিল্প ভবন নির্মাণে উচ্চমানের সমাধান প্রদান করি। প্রতিটি প্রকল্পে আমরা আধুনিক প্রযুক্তি, উন্নত মানের ম্যাটেরিয়াল এবং নিরাপত্তা স্ট্যান্ডার্ড অনুসরণ করি, যাতে একটি টেকসই ও নিরাপদ কাঠামো তৈরি হয়। আমাদের লক্ষ্য শুধুমাত্র ভবন তৈরি করা নয়, বরং দীর্ঘস্থায়ী একটি শক্ত ভিত্তি গড়ে তোলা।

            Interior Designing সেবার মাধ্যমে আমরা আপনার ঘর বা অফিসকে একটি সুন্দর, আরামদায়ক এবং আধুনিক পরিবেশে রূপান্তর করি। প্রতিটি ডিজাইন আমরা ক্লায়েন্টের রুচি, প্রয়োজন এবং লাইফস্টাইল অনুযায়ী কাস্টমাইজ করি। রঙের সমন্বয়, আসবাবপত্রের বিন্যাস এবং আলো ব্যবস্থাপনা—সবকিছুই আমরা নিখুঁতভাবে পরিকল্পনা করি যাতে একটি প্রিমিয়াম লুক তৈরি হয়।

            General Construction সেবায় আমরা ছোট থেকে বড় যেকোনো নির্মাণ কাজ দক্ষতার সাথে সম্পন্ন করি। ফাউন্ডেশন থেকে শুরু করে ফিনিশিং পর্যন্ত প্রতিটি ধাপে আমরা কোয়ালিটি বজায় রাখি এবং সময়মতো কাজ শেষ করার নিশ্চয়তা দিই।

            Investment Construction এর ক্ষেত্রে আমরা এমন প্রকল্প তৈরি করি যা ভবিষ্যতে লাভজনক রিটার্ন দিতে সক্ষম। আমরা মার্কেট রিসার্চ ও লোকেশন বিশ্লেষণ করে এমনভাবে প্রকল্প পরিকল্পনা করি যাতে বিনিয়োগকারীরা সর্বোচ্চ সুবিধা পান।

            Real Estate Consultancy সেবার মাধ্যমে আমরা জমি কেনা-বেচা, বিনিয়োগ পরিকল্পনা এবং সম্পত্তি ব্যবস্থাপনায় বিশেষজ্ঞ পরামর্শ প্রদান করি। আমাদের অভিজ্ঞ টিম বাজার বিশ্লেষণ করে সঠিক সিদ্ধান্ত নিতে সাহায্য করে, যাতে ক্লায়েন্টরা নিরাপদ ও লাভজনক সিদ্ধান্ত নিতে পারেন।";
        $service_text_1 = " বিল্ডিং নির্মাণ হলো একটি শিল্প ও বিজ্ঞান, যার মাধ্যমে একটি স্থানকে সুন্দর, কার্যকর এবং ব্যবহারযোগ্য করে তোলা হয়। এটি শুধু সাজসজ্জা নয়, বরং একটি সম্পূর্ণ পরিকল্পিত প্রক্রিয়া।";
        $service_text_2 = "আমরা আধুনিক ও ক্লাসিক ডিজাইনের সমন্বয়ে আপনার ঘর বা অফিসকে আরও আকর্ষণীয় করে তুলি। প্রতিটি প্রজেক্টে আমরা ক্লায়েন্টের চাহিদাকে সর্বোচ্চ গুরুত্ব দেই।";
        $service_text_3 = "আমাদের অভিজ্ঞ ডিজাইনার টিম প্রতিটি স্পেসকে নতুন রূপ দিতে সক্ষম। গুণগত মান ও নান্দনিকতা আমাদের প্রধান লক্ষ্য।";
        $service_video_title = "সার্ভিস ভিডিও";
    @endphp

    <div class="sidebar-page-container style-two">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Side -->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                    <div class="service-detail">
                        <div class="service-detail_inner">

                            <div class="service-detail_image">
                                <img src="{{ asset('frontend/assets/images/resource/services.jpg') }}" alt="ইন্টেরিয়র ডিজাইন" />
                            </div>

                            <div class="service-detail_content">

                                <h3 class="service-detail_heading">
                                    {{ $service_title }}
                                </h3>

                                <p>{{ $service_text }}</p>
                                <p>{{ $service_text_2 }}</p>
                                <p>{{ $service_text_3 }}</p>

                                <h4 class="service-detail_subheading">
                                    {{ $service_video_title }}
                                </h4>

                                <img src="{{ asset('frontend/assets/images/resource/services-2.jpg') }}" alt="সার্ভিস ভিডিও ইমেজ" />

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
