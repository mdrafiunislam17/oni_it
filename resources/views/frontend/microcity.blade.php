@extends('frontend.layouts.master')

@section('title', 'আরবিয়ান পার্ক')

@section('content')

    @push('styles')
        <style>
            .microcity-page {
                background: #f6f8fb;
                padding: 70px 0;
            }

            .microcity-card {
                background: #fff;
                border-radius: 26px;
                overflow: hidden;
                box-shadow: 0 25px 60px rgba(0,0,0,.10);
                border: 1px solid #eef2f7;
            }

            .microcity-main-image {
                position: relative;
                overflow: hidden;
                background: #eef2f7;
            }

            .microcity-main-image img {
                width: 100%;
                height: 520px;
                object-fit: cover;
                transition: .6s ease;
            }

            .microcity-main-image:hover img {
                transform: scale(1.05);
            }

            .microcity-content {
                padding: 35px;
            }

            .microcity-meta {
                list-style: none;
                padding: 0;
                margin: 0 0 18px;
                display: flex;
                gap: 12px;
                flex-wrap: wrap;
            }

            .microcity-meta li {
                background: #f0fdf4;
                color: #15803d;
                border: 1px solid #bbf7d0;
                padding: 8px 14px;
                border-radius: 50px;
                font-size: 14px;
                font-weight: 500;
            }

            .microcity-meta i {
                margin-right: 6px;
            }

            .microcity-title {
                font-size: 34px;
                line-height: 1.35;
                font-weight: 800;
                color: #111827;
                margin-bottom: 18px;
            }

            .microcity-description {
                background: #f9fafb;
                border: 1px solid #e5e7eb;
                border-radius: 20px;
                padding: 22px;
                color: #374151;
                font-size: 17px;
                line-height: 1.8;
            }

            .microcity-description p {
                margin-bottom: 12px;
            }

            .plan-header {
                margin-top: 35px;
                margin-bottom: 18px;
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .plan-header-icon {
                width: 48px;
                height: 48px;
                border-radius: 14px;
                background: linear-gradient(135deg, #16a34a, #22c55e);
                color: #fff;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 10px 25px rgba(34,197,94,.35);
                font-size: 18px;
            }

            .plan-header h4 {
                margin: 0;
                font-size: 25px;
                font-weight: 800;
                color: #111827;
            }

            .plan-header p {
                margin: 3px 0 0;
                font-size: 14px;
                color: #6b7280;
            }

            .floor-plan-box {
                background: linear-gradient(180deg, #f8fafc, #ffffff);
                border: 1px solid #e5e7eb;
                border-radius: 24px;
                padding: 22px;
                position: relative;
            }

            .floor-plan-slider {
                position: relative;
                overflow: hidden;
                border-radius: 20px;
            }

            .floor-plan-card {
                background: #fff;
                border-radius: 20px;
                padding: 16px;
                border: 1px solid #edf2f7;
                box-shadow: 0 18px 40px rgba(0,0,0,.08);
            }

            .floor-plan-card img {
                width: 100% !important;
                height: 500px;
                object-fit: contain;
                border-radius: 16px;
                background: #f9fafb;
                transition: .4s ease;
            }

            .floor-plan-card:hover img {
                transform: scale(1.02);
            }

            .single-item_slider-prev,
            .single-item_slider-next {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 48px;
                height: 48px;
                border-radius: 50%;
                background: #ffffff;
                color: #16a34a;
                box-shadow: 0 12px 30px rgba(0,0,0,.20);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 20;
                cursor: pointer;
                transition: .3s ease;
                font-size: 18px;
            }

            .single-item_slider-prev:hover,
            .single-item_slider-next:hover {
                background: #16a34a;
                color: #fff;
            }

            .single-item_slider-prev {
                left: 18px;
            }

            .single-item_slider-next {
                right: 18px;
            }

            .no-plan {
                text-align: center;
                padding: 50px 15px;
                border: 1px dashed #cbd5e1;
                border-radius: 20px;
                color: #64748b;
                background: #fff;
            }

            .no-plan i {
                font-size: 45px;
                color: #16a34a;
                margin-bottom: 12px;
            }

            .no-plan p {
                margin: 0;
                font-size: 16px;
            }

            @media(max-width: 991px) {
                .microcity-content {
                    padding: 24px;
                }

                .microcity-main-image img {
                    height: 400px;
                }

                .microcity-title {
                    font-size: 28px;
                }
            }

            @media(max-width: 767px) {
                .microcity-page {
                    padding: 40px 0;
                }

                .microcity-main-image img {
                    height: 260px;
                }

                .microcity-content {
                    padding: 18px;
                }

                .microcity-title {
                    font-size: 22px;
                }

                .microcity-description {
                    font-size: 14px;
                    padding: 16px;
                }

                .plan-header h4 {
                    font-size: 20px;
                }

                .floor-plan-box {
                    padding: 12px;
                }

                .floor-plan-card {
                    padding: 8px;
                }

                .floor-plan-card img {
                    height: 280px;
                }

                .single-item_slider-prev,
                .single-item_slider-next {
                    width: 38px;
                    height: 38px;
                    font-size: 14px;
                }

                .single-item_slider-prev {
                    left: 8px;
                }

                .single-item_slider-next {
                    right: 8px;
                }
            }
        </style>
    @endpush

    <section class="relative overflow-hidden text-light" data-bgimage="url({{ asset('frontend/images/background/3.webp') }}) center">
        <div class="spacer-single"></div>

        <div class="container relative z-2">
            <div class="row g-4 gx-5 align-items-center">
                <div class="spacer-single"></div>

                <div class="col-lg-8">
                    <h2 class="mb-0 wow fadeInUp" data-wow-delay=".2s">
                        আরবিয়ান পার্ক
                    </h2>
                </div>

                <div class="col-lg-4 text-end">
                    <ul class="crumb">
                        <li>
                            <a href="{{ route('frontend.index') }}">হোম</a>
                        </li>
                        <li class="active">মাইক্রোসিটি</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="sw-overlay op-6"></div>
        <div class="gradient-edge-start w-50"></div>
        <div class="spacer-single"></div>
    </section>

    <section class="microcity-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">

                    <div class="microcity-card">

                        <div class="microcity-main-image">
                            <img src="{{ asset('uploads/microcity/'.$microcity->image) }}" alt="{{ $microcity->title }}">
                        </div>

                        <div class="microcity-content">
                            @php \Carbon\Carbon::setLocale('bn'); @endphp

                            <ul class="microcity-meta">
                                <li>
                                    <i class="fa-regular fa-user"></i> অ্যাডমিন
                                </li>
                                <li>
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($microcity->created_at)->translatedFormat('d M, Y') }}
                                </li>
                            </ul>

                            <h2 class="microcity-title">
                                {{ $microcity->title }}
                            </h2>

                            <div class="microcity-description">
                                {!! $microcity->description !!}
                            </div>

                            <div class="plan-header">
                                <div class="plan-header-icon">
                                    <i class="fa-regular fa-map"></i>
                                </div>
                                <div>
                                    <h4>পরিকল্পনা</h4>
                                    <p>মাইক্রোসিটির ফ্লোর প্ল্যান ও ডিজাইন</p>
                                </div>
                            </div>

                            <div class="floor-plan-box">
                                @php
                                    $floorPlans = $microcity->floor_plans_image
                                        ? json_decode($microcity->floor_plans_image, true)
                                        : [];
                                @endphp

                                @if(!empty($floorPlans))
                                    <div class="single-item_slider swiper-container floor-plan-slider">
                                        <div class="swiper-wrapper">
                                            @foreach($floorPlans as $image)
                                                <div class="swiper-slide">
                                                    <div class="floor-plan-card">
                                                        <img src="{{ asset('uploads/microcity/' . $image) }}" alt="Floor Plan">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        @if(count($floorPlans) > 1)
                                            <div class="single-item_slider-prev">
                                                <i class="fas fa-angle-left"></i>
                                            </div>
                                            <div class="single-item_slider-next">
                                                <i class="fas fa-angle-right"></i>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="no-plan">
                                        <i class="fa-regular fa-image"></i>
                                        <p>কোনো পরিকল্পনা ছবি পাওয়া যায়নি</p>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                if (document.querySelector('.single-item_slider')) {
                    new Swiper(".single-item_slider", {
                        slidesPerView: 1,
                        spaceBetween: 20,
                        loop: true,
                        navigation: {
                            nextEl: ".single-item_slider-next",
                            prevEl: ".single-item_slider-prev",
                        },
                        autoplay: {
                            delay: 4000,
                            disableOnInteraction: false,
                        },
                    });
                }
            });
        </script>
    @endpush

@endsection
