@extends('frontend.layouts.master')

@section('title', 'মাইক্রোসিটি')

@section('content')

    @push('styles')
        <style>
            /* =========================
               PAGE TITLE
            ========================== */
            .page-title {
                padding: 70px 0 50px;
                position: relative;
                overflow: hidden;
                display: flex;
                align-items: center;
            }

            .page-title_bg {
                position: absolute;
                inset: 0;
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                transform: scale(1.05);
                transition: transform 0.5s ease;
            }

            .page-title:hover .page-title_bg {
                transform: scale(1);
            }

            .page-title_overlay {
                position: absolute;
                inset: 0;
                background: linear-gradient(135deg, rgba(20,168,82,0.85), rgba(17,153,142,0.65));
                backdrop-filter: blur(4px);
            }

            .page-title_content {
                position: relative;
                z-index: 2;
                max-width: 90%;
                margin: 0 auto;
                text-align: center;
            }

            .page-title_heading {
                font-size: clamp(28px, 6vw, 48px);
                font-weight: 700;
                margin: 0 0 16px;
                line-height: 1.3;
                color: #fff;
                text-shadow: 0 2px 8px rgba(0,0,0,0.3);
            }

            .bread-crumb {
                display: flex;
                gap: 6px;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                font-size: 14px;
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

            .property-detail_subheading {
                font-size: 22px;
                font-weight: 600;
                margin-top: 30px;
                margin-bottom: 15px;
                color: #111827;
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

            .single-item_slider-prev,
            .single-item_slider-next {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 36px;
                height: 36px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #14a852;
                font-size: 16px;
                background: rgba(255,255,255,0.85);
                cursor: pointer;
                z-index: 10;
                transition: 0.3s ease;
            }

            .single-item_slider-prev:hover,
            .single-item_slider-next:hover {
                background: #14a852;
                color: #fff;
                transform: translateY(-50%) scale(1.1);
            }

            .single-item_slider-prev { left: 5px; }
            .single-item_slider-next { right: 5px; }

            /* =========================
               RESPONSIVE
            ========================== */
            @media(max-width:991px) {
                .page-title { padding: 60px 0 40px; }
                .property-detail { padding: 20px; }
            }

            @media(max-width:767px) {
                .page-title_heading { font-size: 24px; }
                .property-detail_heading { font-size: 22px; }
                .property-detail_subheading { font-size: 18px; }
                .property-detail_content p { font-size: 13px; }
                .swiper-slide img { height: auto; }
            }
        </style>
    @endpush

    <!-- =========================
     PAGE TITLE
========================= -->
    <section class="page-title wow fadeIn" data-wow-delay="0ms" data-wow-duration="1200ms">
        <div class="page-title_bg wow zoomIn" data-wow-delay="0ms" data-wow-duration="1500ms"
             style="background-image:url('{{ asset('frontend/assets/images/background/test.jpg') }}');"></div>
        <div class="page-title_overlay"></div>
        <div class="container">
            <div class="page-title_content">
                <h1 class="page-title_heading wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1200ms">
                    মাইক্রোসিটি
                </h1>
                <div class="bread-crumb wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1200ms">
                    <a href="{{ route('frontend.index') }}">
                        <i class="fa-solid fa-house me-1"></i> হোম
                    </a>
                    <span class="separator">/</span>
                    <span class="current">মাইক্রোসিটি</span>
                </div>
            </div>
        </div>
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
                            <img src="{{ asset('uploads/microcity/'.$microcity->image) }}" alt="{{ $microcity->title }}" />
                        </div>

                        <ul class="property-detail_meta d-flex flex-wrap mb-3">
                            @php \Carbon\Carbon::setLocale('bn'); @endphp
                            <li><i class="fa-regular fa-user"></i> অ্যাডমিন</li>
                            <li><i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::parse($microcity->created_at)->translatedFormat('d M, Y') }}</li>
                        </ul>

                        <h3 class="property-detail_heading">{{ $microcity->title }}</h3>

                        <div class="property-detail_content">
                            <p>{!! $microcity->description !!}</p>
                        </div>

                        <h4 class="property-detail_subheading">পরিকল্পনা</h4>
                        <div class="gallery-box">
                            <div class="single-item_slider swiper-container">
                                <div class="swiper-wrapper">
                                    @if($microcity->floor_plans_image)
                                        @foreach(json_decode($microcity->floor_plans_image) as $image)
                                            <div class="swiper-slide">
                                                <div class="image">
                                                    <img src="{{ asset('uploads/microcity/' . $image) }}" alt="Floor Plan" style="width: 500px;">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="single-item_slider-prev fas fa-angle-left"></div>
                                <div class="single-item_slider-next fas fa-angle-right"></div>
                            </div>
                        </div>

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
