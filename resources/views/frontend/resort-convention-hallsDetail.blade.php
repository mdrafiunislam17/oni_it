@extends('frontend.layouts.master')

@section('title', 'রিসোর্ট ও কনভেনশন হল বিবরণ')

@section('content')

    @push('styles')
        <style>

            .page-title:hover .page-title_bg {
                transform: scale(1);
            }


            .bread-crumb a {
                color: #fff;
                text-decoration: none;
                transition: .3s;
                opacity: 0.9;
            }

            .bread-crumb a:hover {
                color: #ffd700;
            }

            .bread-crumb .separator {
                color: rgba(255,255,255,.7);
            }

            .bread-crumb .current {
                color: rgba(255,255,255,.9);
                font-weight: 500;
            }

            /* =========================
               PROPERTY DETAIL
            ========================== */
            .property-detail {
                background: #fff;
                padding: 30px;
                border-radius: 20px;
                box-shadow: 0 20px 40px rgba(0,0,0,.08);
                margin-bottom: 50px;
            }

            .property-detail_image img {
                width: 100%;
                border-radius: 20px;
                margin-bottom: 20px;
                transition: transform 0.5s ease;
            }

            .property-detail_image img:hover {
                transform: scale(1.05);
            }

            .property-detail_heading {
                font-size: 28px;
                font-weight: 700;
                margin-bottom: 12px;
                color: #111827;
            }

            .property-detail_location {
                font-size: 14px;
                color: #6b7280;
                margin-bottom: 20px;
                display: flex;
                align-items: center;
            }

            .property-detail_location i {
                margin-right: 8px;
                color: #14a852;
            }



            .property-detail_content p {
                line-height: 1.6;
                color: #374151;
                font-size: 18px;
            }

            .property-detail_meta {
                list-style: none;
                padding: 0;
                display: flex;
                gap: 12px;
                flex-wrap: wrap;
                margin-bottom: 15px;
                font-size: 13px;
                color: #6b7280;
            }

            .property-detail_meta li i {
                margin-right: 5px;
            }

            /* =========================
               SWIPER GALLERY
            ========================== */
            .swiper-container {
                padding-bottom: 15px;
            }

            .swiper-slide img {
                border-radius: 12px;
                width: 100%;
                height: auto;
            }


            /* =========================
               RESPONSIVE
            ========================== */
            @media(max-width:991px) {
                .property-detail { padding: 20px; }
            }

            @media(max-width:767px) {
                .property-detail_heading { font-size: 22px; }
                .property-detail_content p { font-size: 13px; }
                .swiper-slide img { height: auto; }
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
                        আমাদের চলমান প্রজেক্ট বিবরণ
                    </h2>
                </div>
                <div class="col-lg-4 text-end">
                    <ul class="crumb">
                        <li><a href="{{ route('frontend.index') }}">
                                হোম
                            </a></li>
                        <li class="active">
                            আমাদের চলমান প্রজেক্ট বিবরণ
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sw-overlay op-6"></div>
        <div class="gradient-edge-start w-50"></div>
        <div class="spacer-single"></div>
    </section>


    <!-- =========================
         PROPERTY DETAIL SECTION
    ========================= -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12 col-sm-12">
                    <div class="property-detail">
                        <div class="property-detail_image">
                            <img src="{{ asset('uploads/resortConventionHall/'.$resortConventionHall->image_thumb) }}" alt="{{ $resortConventionHall->title }}" />
                        </div>

                        <ul class="property-detail_meta d-flex flex-wrap mb-3">
                            @php \Carbon\Carbon::setLocale('bn'); @endphp
                            <li><i class="fa-regular fa-user"></i> অ্যাডমিন</li>
                            <li><i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::parse($resortConventionHall->created_at)->translatedFormat('d M, Y') }}</li>
                        </ul>

                        <h3 class="property-detail_heading">{{ $resortConventionHall->title }}</h3>
                        <div class="property-detail_location">
                            <i class="flaticon-maps-and-flags"></i> {{ $resortConventionHall->location }}
                        </div>
                        <div class="property-detail_content">
                            <p>{!! $resortConventionHall->description !!}</p>
                        </div>

{{--                        <h4 class="property-detail_subheading">পরিকল্পনা</h4>--}}
{{--                        <div class="gallery-box">--}}
{{--                            <div class="single-item_slider swiper-container">--}}
{{--                                <div class="swiper-wrapper">--}}
{{--                                    @if($resortConventionHall->floor_plans_image)--}}
{{--                                        @foreach(json_decode($resortConventionHall->floor_plans_image) as $image)--}}
{{--                                            <div class="swiper-slide">--}}
{{--                                                <div class="image">--}}
{{--                                                    <img src="{{ asset('uploads/resortConventionHall/' . $image) }}" alt="Floor Plan" style="width: 500px;">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <div class="single-item_slider-prev fas fa-angle-left"></div>--}}
{{--                                <div class="single-item_slider-next fas fa-angle-right"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            var swiper = new Swiper(".single-item_slider", {
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
        </script>
    @endpush

@endsection
