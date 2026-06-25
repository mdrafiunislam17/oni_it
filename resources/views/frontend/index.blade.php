@extends("frontend.layouts.master")

@section("title", "Index")

@section("content")

    @push('styles')
        <style>
            .vision-section {
                padding: 80px 0;
                position: relative;
                overflow: hidden;
            }

            .vision-heading {
                max-width: 760px;
                margin: 0 auto 40px;
            }

            .vision-heading h2 {
                font-size: 42px;
                font-weight: 800;
                margin-bottom: 15px;
            }

            .vision-heading p {
                font-size: 17px;
                line-height: 1.8;
                color: #5f6368;
            }

            .vision-card {
                background: #ffffff;
                border-radius: 18px;
                padding: 22px 24px;
                display: flex;
                gap: 18px;
                align-items: flex-start;
                box-shadow: 0 12px 35px rgba(0, 0, 0, .07);
                border: 1px solid rgba(0, 0, 0, .05);
                height: 100%;
                transition: all .3s ease;
            }

            .vision-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 18px 45px rgba(0, 0, 0, .10);
            }

            .vision-icon {
                width: 62px;
                height: 62px;
                min-width: 62px;
                border-radius: 15px;
                background: rgba(255, 193, 7, .18);
                color: #222;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 28px;
            }

            .vision-card p {
                margin: 0;
                font-size: 16px;
                line-height: 1.8;
                color: #343a40;
            }



            .project-title a {
                color: #222;
                text-decoration: none;
            }

            .project-title a:hover {
                color: var(--primary-color, #ffc107);
            }


            .leader-message-section {

                position: relative;
                overflow: hidden;
                background:
                    radial-gradient(circle at top left, rgba(255, 193, 7, .14), transparent 34%),
                    linear-gradient(180deg, #ffffff 0%, #fffaf0 100%);
                padding: 40px 0 10px 0;
            }

            .leader-message-section.bg-soft {
                background:
                    radial-gradient(circle at top right, rgba(255, 193, 7, .16), transparent 35%),
                    linear-gradient(180deg, #fffaf0 0%, #ffffff 100%);
            }

            .leader-message-card {
                background: #ffffff;
                border: 1px solid rgba(0, 0, 0, .06);
                border-radius: 28px;
                padding: 34px;
                box-shadow: 0 25px 70px rgba(0, 0, 0, .08);
                position: relative;
                overflow: hidden;
            }

            .leader-message-card::before {
                content: "";
                position: absolute;
                width: 220px;
                height: 220px;
                right: -90px;
                top: -100px;
                background: rgba(255, 193, 7, .16);
                border-radius: 50%;
            }

            .leader-image-wrap {
                position: relative;
                border-radius: 26px;
                overflow: hidden;
                min-height: 460px;
                box-shadow: 0 24px 60px rgba(0, 0, 0, .14);
                background: #111;
            }

            .leader-image-wrap img {
                width: 100%;
                height: auto;
                min-height: 460px;
                object-fit: cover;
                display: block;
                transform: scale(1.01);
                transition: all .45s ease;
            }

            .leader-message-card:hover .leader-image-wrap img {
                transform: scale(1.06);
            }

            .leader-image-wrap::after {
                content: "";
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, transparent 45%, rgba(0, 0, 0, .72) 100%);
            }

            .leader-badge {
                position: absolute;
                left: 24px;
                bottom: 24px;
                z-index: 2;
                color: #fff;
            }

            .leader-badge h5 {
                color: #fff;
                font-size: 24px;
                font-weight: 800;
                margin: 0 0 6px;
            }

            .leader-badge span {
                display: inline-block;
                background: rgba(255, 193, 7, .95);
                color: #111;
                font-weight: 700;
                font-size: 14px;
                padding: 7px 14px;
                border-radius: 50px;
            }

            .leader-content {
                position: relative;
                z-index: 2;
                padding: 8px 4px;
            }

            .leader-content .subtitle {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: rgba(255, 193, 7, .13);
                border: 1px solid rgba(255, 193, 7, .28);
                border-radius: 50px;
                padding: 8px 16px;
                margin-bottom: 18px;
            }

            .leader-content h2 {
                font-size: 38px;
                line-height: 1.25;
                font-weight: 800;
                margin-bottom: 18px;
                color: #171717;
            }

            .leader-quote {
                position: relative;
                padding: 22px 24px 22px 28px;
                border-left: 5px solid var(--primary-color, #ffc107);
                background: #fff9e8;
                border-radius: 0 18px 18px 0;
                margin-bottom: 22px;
            }

            .leader-quote i {
                font-size: 32px;
                color: rgba(255, 193, 7, .70);
                margin-bottom: 10px;
            }

            .leader-quote p {
                margin: 0;
                font-size: 16px;
                line-height: 1.9;
                color: #3f3f3f;
            }

            .leader-signature {
                display: flex;
                align-items: center;
                gap: 14px;
                margin: 20px 0 25px;
            }

            .leader-signature-icon {
                width: 54px;
                height: 54px;
                min-width: 54px;
                border-radius: 50%;
                background: #111;
                color: #ffc107;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 22px;
            }

            .leader-signature h5 {
                margin: 0 0 4px;
                font-size: 20px;
                font-weight: 800;
                color: #111;
            }

            .leader-signature p {
                margin: 0;
                color: #666;
                font-size: 15px;
                font-weight: 600;
            }

            @media (max-width: 991px) {
                .leader-message-section {
                    padding: 70px 0;
                }

                .leader-content h2 {
                    font-size: 31px;
                }

                .leader-image-wrap,
                .leader-image-wrap img {
                    min-height: 380px;
                }
            }

            @media (max-width: 767px) {
                .leader-message-section {
                    padding: 55px 0;
                }

                .leader-message-card {
                    padding: 18px;
                    border-radius: 20px;
                }

                .leader-content h2 {
                    font-size: 26px;
                }

                .leader-quote {
                    padding: 18px;
                }

                .leader-quote p {
                    font-size: 14.5px;
                    line-height: 1.75;
                }

                .leader-badge {
                    left: 16px;
                    bottom: 16px;
                }

                .leader-badge h5 {
                    font-size: 20px;
                }

                .leader-image-wrap,
                .leader-image-wrap img {
                    min-height: 330px;
                    border-radius: 18px;
                }
            }


            @media (max-width: 991px) {
                .vision-section,


                .vision-heading h2 {
                    font-size: 34px;
                }


            }

            @media (max-width: 767px) {
                .vision-section,


                .vision-heading {
                    margin-bottom: 25px;
                }

                .vision-heading h2 {
                    font-size: 27px;
                    line-height: 1.35;
                }

                .vision-heading p {
                    font-size: 15px;
                    line-height: 1.7;
                }

                .vision-card {
                    padding: 16px;
                    gap: 13px;
                    border-radius: 14px;
                }

                .vision-icon {
                    width: 50px;
                    height: 50px;
                    min-width: 50px;
                    font-size: 22px;
                    border-radius: 12px;
                }

                .vision-card p {
                    font-size: 14.5px;
                    line-height: 1.7;
                }

                .subtitle {
                    font-size: 14px;
                }


            }

            @media (max-width: 420px) {
                .vision-card {
                    flex-direction: column;
                }

                .vision-icon {
                    margin-bottom: 4px;
                }
            }




            /* Premium Vision Design */
            .vision-premium-card {
                display: flex;
                gap: 20px;
                align-items: flex-start;
                background: #ffffff;
                padding: 26px;
                border-radius: 22px;
                height: 100%;
                position: relative;
                overflow: hidden;
                border: 1px solid rgba(0, 0, 0, .06);
                box-shadow: 0 14px 40px rgba(0, 0, 0, .07);
                transition: all .35s ease;
            }

            .vision-premium-card::before {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                width: 6px;
                height: 100%;
                background: linear-gradient(135deg, #001a4d, #001a4d);
            }

            .vision-premium-card::after {
                content: "";
                position: absolute;
                width: 160px;
                height: 160px;
                right: -85px;
                top: -85px;
                background: rgba(255, 193, 7, .12);
                border-radius: 50%;
                transition: all .35s ease;
            }

            .vision-premium-card:hover {
                transform: translateY(-7px);
                box-shadow: 0 25px 60px rgba(0, 0, 0, .13);
            }

            .vision-premium-card:hover::after {
                right: -55px;
                top: -55px;
                background: rgba(255, 193, 7, .18);
            }

            .vision-premium-icon {
                width: 62px;
                height: 62px;
                min-width: 62px;
                border-radius: 18px;
                background: linear-gradient(135deg, #001a4d, #001a4d);
                color: #ffffff;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 26px;
                box-shadow: 0 12px 28px rgba(255, 193, 7, .35);
                position: relative;
                z-index: 2;
            }

            .vision-premium-content {
                flex: 1;
                position: relative;
                z-index: 2;
            }

            .vision-number {
                display: inline-block;
                font-size: 14px;
                font-weight: 800;
                color: #ff9800;
                margin-bottom: 8px;
                letter-spacing: 1px;
            }

            .vision-premium-content p {
                margin: 0;
                font-size: 16px;
                line-height: 1.9;
                color: #333333;
                font-weight: 500;
            }

            @media (max-width: 767px) {
                .vision-premium-card {
                    padding: 18px;
                    gap: 15px;
                    border-radius: 18px;
                }

                .vision-premium-icon {
                    width: 52px;
                    height: 52px;
                    min-width: 52px;
                    font-size: 22px;
                    border-radius: 15px;
                }

                .vision-premium-content p {
                    font-size: 14.5px;
                    line-height: 1.8;
                }
            }


        </style>


    @endpush



    @php
        $about = $aboutStories->firstWhere('section_type', 'about');
        $chairman = $aboutStories->firstWhere('section_type', 'chairman_message');
        $md = $aboutStories->firstWhere('section_type', 'managing_director_message');
        $account = $aboutStories->firstWhere('section_type', 'accounts_director');

        $startDate = new DateTime("2024-10-07");
        $today = new DateTime();
        $years = $startDate->diff($today)->y;

        function toBanglaNumber($number) {
            $banglaDigits = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
            return str_replace(range(0,9), $banglaDigits, (string)$number);
        }

        $banglaYears = toBanglaNumber($years);
    @endphp


    <section id="section-intro" class="section-dark text-light no-top no-bottom relative overflow-hidden z-1000">
        <div class="mh-800 relative">

            {{--

                 <div class="abs w-80 abs-middle z-2 w-100">
                     <div class="container">
                         <div class="row">
                             <div class="col-lg-8">
                                 <h1 class="fs-sm-10vw mb-0 wow fadeInRight">Design. Build. Maintain.</h1>
                                 <h1 class="fs-sm-10vw mb-4 id-color wow fadeInRight" data-wow-delay=".3s">Your Perfect Pool</h1>
                                 <div class="col-lg-6">
                                     <p class="mb-4 wow fadeInRight" data-wow-delay=".6s">Custom-built swimming pools, expert renovations, and professional maintenance—crafted for a lifetime of relaxation and enjoyment.</p>

                                     <a href="cost-estimator.html" class="btn-main fx-slide wow fadeInRight" data-wow-delay=".9s"><span>Start Your Project</span></a>
                                     <div class="spacer-single"></div>
                                     <div class="d-flex">
                                         <div class="me-5 align-items-center d-flex wow fadeInRight" data-wow-delay=".9s">
                                             <i class="fa fa-check me-2 id-color"></i>Licensed & Insured
                                         </div>
                                         <div class="me-5 align-items-center d-flex wow fadeInRight" data-wow-delay="1.1s">
                                             <i class="fa fa-check me-2 id-color"></i>Satisfication Guarantee
                                         </div>
                                         <div class="me-5 align-items-center d-flex wow fadeInRight" data-wow-delay="1.3s">
                                             <i class="fa fa-check me-2 id-color"></i>Affordable Pricing
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 --}}

            <div class="swiper" data-0="transform: scale(1);" data-800="transform: scale(1.5);">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->

                    @foreach($sliders as $slider)
                        <div class="swiper-slide">
                            <div class="swiper-inner" data-bgimage="url({{ asset('uploads/slider/' . $slider->image) }})">
                                <div class="sw-overlay op-3"></div>
                                <div class="gradient-edge-start w-50 op-7"></div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Slides -->



                </div>

            </div>

            {{--         <div class="abs w-100 bottom-10 z-2">--}}
            {{--             <div class="container">--}}
            {{--                 <div class="d-flex justify-content-end">--}}
            {{--                     <img src="images/misc/s2.webp" class="w-80px h-80px circle me-4 wow zoomIn" data-wow-delay="1.4s" alt="">--}}
            {{--                     <div>--}}
            {{--                         <div class="hs-5 mb-0 wow fadeInRight" data-wow-delay="1.6s">Free Inspection</div>--}}
            {{--                         <div class="hs-2 fs-32 fs-xs-7vw mb-0 lh-1-2 wow fadeInRight" data-wow-delay="1.8s">+1 200 400 8000</div>--}}
            {{--                     </div>--}}
            {{--                 </div>--}}
            {{--             </div>--}}
            {{--         </div>--}}

        </div>

    </section>

    @if($about)
        <section>
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="relative">
                            <div class="w-100 pe-5 pb-5 wow scaleIn">
                                <img src="{{ asset('uploads/about/' . $about->image) }}" class="w-100 rounded-1" alt="">
                            </div>
                            {{--                        <img src="{{ asset('frontend/images/misc/s1.webp') }}" class="w-40 rounded-1 abs end-0 bottom-0 z-2 soft-shadow wow scaleIn" data-wow-delay=".2s" alt="">--}}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ps-lg-3">
                            <div class="subtitle " data-wow-delay=".2s">আমাদের গল্প জানুন</div>

                            <h2 class="wow fadeInUp" data-wow-delay=".4s">
                                {{ $about->title }}
                            </h2>

                            <p class="wow fadeInUp" data-wow-delay=".6s">
                                {{ Str::words(strip_tags($about->description), 50, '...') }}
                            </p>
                            <a href="{{ route('frontend.about') }}" class="btn-main fx-slide wow fadeInUp" data-wow-delay=".8s"><span> আরও জানুন </span></a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="bg-dark-3">
        <div class="container relative z-2">
            <div class="row g-4">

                <!-- 1 -->
                @foreach($serviceCategory as $item)
                    <div class="col-lg-4 col-sm-6">
                    <div class="hover rounded-1 overflow-hidden relative text-light text-center wow fadeInRight" data-wow-delay=".0s">
                        <img src="{{ asset('uploads/serviceCategory/' . $item->image) }}" class="hover-scale-1-1 w-100" alt="">

                        <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                            <div class="mb-3">
                                {!! $item->description !!}
                            </div>
                        </div>

                        <img src="{{ asset('frontend/images/logo-big-white.webp') }}" class="abs abs-centered w-30" alt="">

                        <div class="abs bg-dark-1 z-2 top-0 w-100 h-100 hover-op-1"></div>

                        <div class="abs z-2 bottom-0 mb-3 w-100 text-center hover-op-0">
                            <h2 class="hs-3 mb-3">{{ $item->title }}</h2>
                        </div>

                        <div class="gradient-edge-bottom abs w-100 h-40 bottom-0"></div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </section>


    @if($chairman)
        <section class="leader-message-section">
            <div class="container">
                <div class="leader-message-card wow fadeInUp">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-5">
                            <div class="leader-image-wrap">
                                <img src="{{ asset('uploads/about/' . $chairman->image) }}" alt="{{ $chairman->title }}">
                                <div class="leader-badge">
                                    <h5>{{ $chairman->title }}</h5>
                                    <span>চেয়ারম্যান</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="leader-content ps-lg-3">
                                <div class="subtitle wow fadeInUp" data-wow-delay=".1s">
                                    <i class="fa-solid fa-user-tie"></i>
                                    চেয়ারম্যানের বার্তা
                                </div>

                                <h2 class="wow fadeInUp" data-wow-delay=".2s">
                                    {{ $chairman->title }}
                                </h2>

                                <div class="leader-quote wow fadeInUp" data-wow-delay=".3s">
                                    <i class="fa-solid fa-quote-left"></i>
                                    <p>
                                        {{ Str::words(strip_tags($chairman->description), 100, '...') }}
                                    </p>
                                </div>

                                <div class="leader-signature wow fadeInUp" data-wow-delay=".4s">
                                    <div class="leader-signature-icon">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </div>
                                    <div>
                                        <h5>{{ $chairman->title }}</h5>
                                        <p>চেয়ারম্যান ও ব্যবস্থাপনা পরিচালক</p>
                                    </div>
                                </div>

                                <a href="{{ route('frontend.chairman') }}" class="btn-main fx-slide wow fadeInUp" data-wow-delay=".5s">
                                    <span>আরও জানুন</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if($md)
        <section class="leader-message-section bg-soft">
            <div class="container">
                <div class="leader-message-card wow fadeInUp">
                    <div class="row g-5 align-items-center flex-lg-row-reverse">
                        <div class="col-lg-5">
                            <div class="leader-image-wrap">
                                <img src="{{ asset('uploads/about/' . $md->image) }}" alt="{{ $md->title }}">
                                <div class="leader-badge">
                                    <h5>{{ $md->title }}</h5>
                                    <span>ব্যবস্থাপনা পরিচালক</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="leader-content pe-lg-3">
                                <div class="subtitle wow fadeInUp" data-wow-delay=".1s">
                                    <i class="fa-solid fa-briefcase"></i>
                                    ম্যানেজিং ডিরেক্টরের বার্তা
                                </div>

                                <h2 class="wow fadeInUp" data-wow-delay=".2s">
                                    {{ $md->title }}
                                </h2>

                                <div class="leader-quote wow fadeInUp" data-wow-delay=".3s">
                                    <i class="fa-solid fa-quote-left"></i>
                                    <p>
                                        {{ Str::words(strip_tags($md->description), 100, '...') }}
                                    </p>
                                </div>

                                <div class="leader-signature wow fadeInUp" data-wow-delay=".4s">
                                    <div class="leader-signature-icon">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </div>
                                    <div>
                                        <h5>{{ $md->title }}</h5>
                                        <p>ব্যবস্থাপনা পরিচালক</p>
                                    </div>
                                </div>

                                <a href="{{ route('frontend.managingDirector') }}" class="btn-main fx-slide wow fadeInUp" data-wow-delay=".5s">
                                    <span>আরও জানুন</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if($account)
        <section class="leader-message-section">
            <div class="container">
                <div class="leader-message-card wow fadeInUp">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-5">
                            <div class="leader-image-wrap">
                                <img src="{{ asset('uploads/about/' . $account->image) }}" alt="{{ $account->title }}">
                                <div class="leader-badge">
                                    <h5>{{ $account->title }}</h5>
                                    <span>এ্যাকাউন্টস ডিরেক্টর</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="leader-content ps-lg-3">
                                <div class="subtitle wow fadeInUp" data-wow-delay=".1s">
                                    <i class="fa-solid fa-user-tie"></i>
                                    এ্যাকাউন্টস ডিরেক্টর বার্তা
                                </div>

                                <h2 class="wow fadeInUp" data-wow-delay=".2s">
                                    {{ $account->title }}
                                </h2>

                                <div class="leader-quote wow fadeInUp" data-wow-delay=".3s">
                                    <i class="fa-solid fa-quote-left"></i>
                                    <p>
                                        {{ Str::words(strip_tags($account->description), 100, '...') }}
                                    </p>
                                </div>

                                <div class="leader-signature wow fadeInUp" data-wow-delay=".4s">
                                    <div class="leader-signature-icon">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </div>
                                    <div>
                                        <h5>{{ $account->title }}</h5>
                                        <p>এ্যাকাউন্টস ডিরেক্টর</p>
                                    </div>
                                </div>

                                <a href="{{ route('frontend.account') }}" class="btn-main fx-slide wow fadeInUp" data-wow-delay=".5s">
                                    <span>আরও জানুন</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section>
        <div class="container">

            <div class="container relative z-2">
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <span class="subtitle">আমাদের চলমান প্রজেক্ট</span>
                        <h2 class="mt-2 fw-bold">
                            বর্তমান প্রকল্পসমূহ
                        </h2>
                        <p class="text-muted">
                            আধুনিক পরিকল্পনা, প্রিমিয়াম লোকেশন এবং উন্নত জীবনযাত্রার নিশ্চয়তা।
                        </p>
                    </div>
                </div>
            </div>

            <div class="row g-4">


                @foreach($properties->take(9) as $property)
                    <div class="col-md-4 col-sm-6">
                        <div class="hover rounded-1 overflow-hidden relative mb-4">
                            <a href="{{ route('frontend.resort-convention-halls-detail',$property->title) }}">
                                <img src="{{ asset('uploads/resortConventionHall/' . $property->image) }}" class="w-100 hover-scale-1-2" alt="">
                            </a>
                        </div>

                        <h3> <a href="{{ route('frontend.resort-convention-halls-detail',$property->title) }}">
                                {{ Str::words($property->title,8,'...') }}
                            </a>  </h3>

                        <p class="mb-0">
                            <a href="{{ route('frontend.resort-convention-halls-detail',$property->title) }}">
                                {!! Str::words($property->description,25,'...') !!}
                            </a>
                        </p>
                    </div>
                @endforeach


            </div>
        </div>
    </section>


    <section class="bg-color-op-1">
        <div class="container relative z-2">

            <div class="row g-4 gx-5 justify-content-center align-items-center mb-2">
                <div class="col-lg-6 text-center">
                    <div class="subtitle wow fadeInUp"> আমাদের অঙ্গীকার  </div>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        বিশেষ লক্ষ্য
                    </h2>
                    <p class="col-lg-10 offset-lg-1 wow fadeInUp" data-wow-delay=".6s">
                        উন্নত সেবা, নিরাপদ পরিবেশ, পর্যটন উন্নয়ন এবং কর্মসংস্থান সৃষ্টির মাধ্যমে
                        একটি মানবিক ও টেকসই বাংলাদেশ গঠনে ব্যাচেলর গ্রুপ কাজ করে যাচ্ছে।
                    </p>
                </div>
            </div>



            <div class="row g-4">
                @foreach($goals as $key => $goal)
                    <div class="col-lg-4 col-md-6">
                        <div class="relative">
                            <div class="abs fs-40 w-80px p-4 bg-dark-3 rounded-1 text-white text-center wow rotateIn"
                                 data-wow-delay="{{ ($key + 1) * 0.2 }}s">
                                {{ $key + 1 }}
                            </div>

                            <div class="ps-80 ms-4 wow fadeInRight"
                                 data-wow-delay="{{ $key * 0.2 }}s">
                                <h3 class="hs-4">{{ $goal->title }}</h3>
                                <p>{{ $goal->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <section class="bg-color-op-9 vision-section">
        <div class="container relative z-2">

            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="vision-heading">
                        <div class="subtitle wow fadeInUp">আমাদের ভিশন</div>

                        <h2 class="wow fadeInUp" data-wow-delay=".3s">
                            লক্ষ্য ও উদ্দেশ্য
                        </h2>

                        <p class="wow fadeInUp" data-wow-delay=".6s">
                            মানুষের দক্ষতা, উদ্যোক্তা মনোভাব, পরিবেশ সচেতনতা এবং আধুনিক পরিকল্পনার মাধ্যমে
                            দেশের অর্থনৈতিক ও সামাজিক উন্নয়নকে এগিয়ে নেওয়াই আমাদের মূল উদ্দেশ্য।
                        </p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                @forelse($visions as $vision)
                    <div class="col-lg-6 col-md-6 wow fadeInUp"
                         data-wow-delay="{{ ($loop->iteration * .1) }}s">

                        <div class="vision-premium-card">
                            <div class="vision-premium-icon">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>

                            <div class="vision-premium-content">

                                <p >
                                    {{ $vision->title }}
                                </p>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted mb-0">কোনো লক্ষ্য ও উদ্দেশ্য পাওয়া যায়নি।</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>






@endsection
