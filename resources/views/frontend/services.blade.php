@extends("frontend.layouts.master")

@section("title", "আমাদের সেবা")

@section("content")

    @push('styles')

        <style>
            .page-title{
                padding:100px 0 80px;
                position:relative;
                overflow:hidden;
            }

            .page-title_bg{
                position:absolute;
                inset:0;
                background-size:cover;
                background-position:center;
                transform:scale(1.05);
                transition:.5s ease;
            }

            .page-title:hover .page-title_bg{
                transform:scale(1);
            }

            .page-title_overlay{
                position:absolute;
                inset:0;
                background:linear-gradient(135deg, rgba(20,168,82,.85), rgba(17,153,142,.75));
            }

            .page-title_content{
                position:relative;
                z-index:2;
            }

            .page-title_heading{
                font-size:clamp(30px,5vw,44px);
                font-weight:700;
                color:#fff;
            }

            .bread-crumb{
                display:flex;
                justify-content:center;
                gap:8px;
                color:#fff;
            }

            .bread-crumb a{
                color:#fff;
                text-decoration:none;
            }

            .bread-crumb a:hover{
                color:#ffd700;
            }

            .separator{
                opacity:.7;
            }

            .current{
                opacity:.9;
            }
        </style>

    @endpush

    <!-- PAGE TITLE -->
    <section class="page-title position-relative text-white wow fadeIn"
             data-wow-delay="0ms"
             data-wow-duration="1200ms">

        <!-- Background -->
        <div class="page-title_bg wow zoomIn"
             data-wow-delay="0ms"
             data-wow-duration="1500ms"
             style="background-image:url('{{ asset('frontend/assets/images/background/test.jpg') }}');">
        </div>

        <!-- Overlay -->
        <div class="page-title_overlay"></div>

        <div class="container">

            <div class="page-title_content text-center wow fadeInUp"
                 data-wow-delay="200ms"
                 data-wow-duration="1200ms">

                <h1 class="page-title_heading wow fadeInUp"
                    data-wow-delay="300ms"
                    data-wow-duration="1200ms">
                    আমাদের সেবা
                </h1>

                <div class="bread-crumb wow fadeInUp"
                     data-wow-delay="400ms"
                     data-wow-duration="1200ms">

                    <a href="{{ route('frontend.index') }}">
                        <i class="fa-solid fa-house me-1"></i>
                        হোম
                    </a>

                    <span class="separator">/</span>

                    <span class="current">
                        আমাদের সেবা
                    </span>

                </div>

            </div>

        </div>

    </section>
    <!-- END PAGE TITLE -->


    @php
        $services = [
            [
                'icon' => 'flaticon-building',
                'title' => 'বিল্ডিং  নির্মাণ',
                'text'  => 'আমরা আধুনিক প্রযুক্তি ব্যবহার করে মানসম্মত ও টেকসই বিল্ডিং নির্মাণ সেবা প্রদান করি। প্রতিটি প্রকল্পে নিরাপত্তা ও গুণগত মানকে সর্বোচ্চ অগ্রাধিকার দেওয়া হয়।',
                'image' => 'frontend/assets/images/resource/services-1.jpg',
            ],
            [
                'icon' => 'flaticon-interior-design',
                'title' => 'Interior  designing',
                'text'  => 'আপনার স্বপ্নের ঘরকে বাস্তবে রূপ দিতে আমরা আধুনিক ও নান্দনিক ইন্টেরিয়র ডিজাইন সেবা প্রদান করি যা আপনার স্টাইলের সাথে মানানসই।',
                'image' => 'frontend/assets/images/resource/services-1.jpg',
            ],
            [
                'icon' => 'flaticon-building-1',
                'title' => 'বিল্ডিং  নির্মাণ',
                'text'  => 'বাসা, অফিস এবং বাণিজ্যিক ভবনের জন্য আমরা নির্ভরযোগ্য ও দক্ষ জেনারেল কনস্ট্রাকশন সেবা দিয়ে থাকি।',
                'image' => 'frontend/assets/images/resource/services-1.jpg',
            ],
            [
                'icon' => 'flaticon-plant',
                'title' => 'বিনিয়োগ  নির্মাণ',
                'text'  => 'আপনার বিনিয়োগকে লাভজনক করতে আমরা পরিকল্পিত ও দীর্ঘমেয়াদী নির্মাণ প্রকল্প পরিচালনা করে থাকি।',
                'image' => 'frontend/assets/images/resource/services-1.jpg',
            ],
            [
                'icon' => 'flaticon-favourite',
                'title' => 'রিয়েল এস্টেট  নির্মাণ',
                'text'  => 'জমি ও সম্পত্তি কেনা-বেচা এবং বিনিয়োগের জন্য আমরা অভিজ্ঞ রিয়েল এস্টেট পরামর্শ সেবা প্রদান করি।',
                'image' => 'frontend/assets/images/resource/services-1.jpg',
            ],
            [
                'icon' => 'flaticon-building',
                'title' => 'রিয়েল এস্টেট  উন্নয়ন',
                'text'  => 'আমরা আধুনিক শহর উন্নয়নের লক্ষ্যে পরিকল্পিত রিয়েল এস্টেট ডেভেলপমেন্ট প্রকল্প পরিচালনা করি।',
                'image' => 'frontend/assets/images/resource/services-1.jpg',
            ],
        ];
    @endphp

    <section class="services-two">
        <div class="auto-container">

            <div class="row clearfix">

                @foreach($services as $service)

                    <div class="service-block_one col-lg-4 col-md-6 col-sm-12 wow fadeInUp"
                         data-wow-delay="{{ ($loop->index % 3) * 200 }}ms"
                         data-wow-duration="1200ms">

                        <div class="service-block_one-inner">

                            <div class="service-block_one_image wow zoomIn"
                                 data-wow-delay="{{ ($loop->index % 3) * 200 }}ms"
                                 data-wow-duration="1200ms"
                                 style="background-image:url({{ asset($service['image']) }})">
                            </div>

                            <div class="service-block_one-icon wow fadeInDown"
                                 data-wow-delay="{{ (($loop->index % 3) * 200) + 100 }}ms"
                                 data-wow-duration="1000ms">
                                <i class="{{ $service['icon'] }}"></i>
                            </div>

                            <h4 class="service-block_one-heading wow fadeInUp"
                                data-wow-delay="{{ (($loop->index % 3) * 200) + 200 }}ms"
                                data-wow-duration="1000ms">
                                <a href="#">{!! $service['title'] !!}</a>
                            </h4>

                            <div class="service-block_one-text wow fadeInUp"
                                 data-wow-delay="{{ (($loop->index % 3) * 200) + 300 }}ms"
                                 data-wow-duration="1000ms">
                                {{ $service['text'] }}
                            </div>

                        </div>
                    </div>

                @endforeach

            </div>

        </div>
    </section>

@endsection
