


@extends("frontend.layouts.master")

@section("title", "ম্যানেজিং ডিরেক্টরের  বার্তা")

@section("content")

    @push('styles')
        <style>
            :root {
                --chair-primary: #14a852;
                --chair-primary-dark: #08743d;
                --chair-secondary: #11998e;
                --chair-navy: #0f241f;
                --chair-text: #344054;
                --chair-muted: #667085;
                --chair-soft: #f4fbf7;
                --chair-white: #ffffff;
                --chair-border: rgba(20, 168, 82, 0.16);
                --chair-shadow-sm: 0 12px 32px rgba(15, 36, 31, 0.08);
                --chair-shadow-md: 0 22px 60px rgba(15, 36, 31, 0.12);
                --chair-shadow-lg: 0 34px 90px rgba(15, 36, 31, 0.18);
            }

            /* =========================
               Premium Page Banner
            ========================== */


            .chair-hero:hover .chair-hero__bg {
                transform: scale(1.02);
            }



            .chair-breadcrumb a {
                color: var(--chair-white);
                text-decoration: none;
                font-weight: 700;
                transition: color 0.25s ease;
            }

            .chair-breadcrumb a:hover {
                color: #ffe680;
            }

            .chair-breadcrumb .separator {
                opacity: 0.68;
            }

            .chair-breadcrumb .current {
                opacity: 0.92;
                font-weight: 700;
            }

            /* =========================
               Premium Chairman Message
            ========================== */
            .chair-message-section {
                position: relative;
                padding: 105px 0;
                background:
                    radial-gradient(circle at 12% 8%, rgba(20, 168, 82, 0.12), transparent 30%),
                    radial-gradient(circle at 88% 85%, rgba(17, 153, 142, 0.13), transparent 34%),
                    linear-gradient(180deg, #ffffff 0%, #f5fff9 100%);
                overflow: hidden;
            }

            .chair-message-section::before {
                content: "";
                position: absolute;
                width: 420px;
                height: 420px;
                left: -235px;
                top: 180px;
                border-radius: 50%;
                background: rgba(20, 168, 82, 0.08);
            }

            .chair-message-section::after {
                content: "";
                position: absolute;
                width: 470px;
                height: 470px;
                right: -250px;
                bottom: 80px;
                border-radius: 50%;
                background: rgba(17, 153, 142, 0.09);
            }

            .chair-wrap {
                position: relative;
                z-index: 2;
            }

            .chair-card {
                position: relative;
                display: grid;
                grid-template-columns: minmax(310px, 390px) 1fr;
                border-radius: 38px;
                background: rgba(255, 255, 255, 0.86);
                border: 1px solid rgba(255, 255, 255, 0.95);
                box-shadow: var(--chair-shadow-lg);
                overflow: hidden;
                backdrop-filter: blur(14px);
            }

            .chair-card::before {
                content: "";
                position: absolute;
                inset: 14px;
                border: 1px solid rgba(20, 168, 82, 0.09);
                border-radius: 30px;
                pointer-events: none;
                z-index: 3;
            }

            /* Left Profile */
            .chair-profile {
                position: relative;
                min-height: 690px;
                padding: 42px 32px;
                color: var(--chair-white);
                background:
                    linear-gradient(180deg, rgba(8, 116, 61, 0.97), rgba(17, 153, 142, 0.94)),
                    url('{{ asset('frontend/assets/images/background/test.jpg') }}');
                background-size: cover;
                background-position: center;
                overflow: hidden;
            }

            .chair-profile::before,
            .chair-profile::after {
                content: "";
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.14);
                pointer-events: none;
            }

            .chair-profile::before {
                width: 270px;
                height: 270px;
                top: -115px;
                left: -105px;
            }

            .chair-profile::after {
                width: 260px;
                height: 260px;
                right: -125px;
                bottom: -100px;
            }

            .chair-logo-box {
                position: relative;
                z-index: 2;
                /*width: 106px;*/
                height: 106px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 42px;
                /*border-radius: 28px;*/
                /*background: rgba(255, 255, 255, 0.95);*/
                /*border: 1px solid rgba(255, 255, 255, 0.7);*/
                /*box-shadow: 0 20px 42px rgba(0, 0, 0, 0.16);*/
            }

            .chair-logo-box img {
                max-width: 140px;
                height: auto;
                display: block;
                border-radius: 16px;
            }

            .chair-photo-frame {
                position: relative;
                z-index: 2;
                width: 238px;
                height: 238px;
                margin: 0 auto 28px;
                border-radius: 50%;
                padding: 10px;
                background:
                    linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.32));
                box-shadow: 0 28px 64px rgba(0, 0, 0, 0.24);
            }

            .chair-photo-frame::before {
                content: "";
                position: absolute;
                inset: -9px;
                border-radius: 50%;
                border: 1px dashed rgba(255, 255, 255, 0.72);
            }

            .chair-photo-frame img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-radius: 50%;
                border: 5px solid rgba(255, 255, 255, 0.88);
                display: block;
            }

            .chair-profile-info {
                position: relative;
                z-index: 2;
                text-align: center;
            }

            .chair-profile-info h3 {
                margin: 0 0 10px;
                color: var(--chair-white);
                font-size: 26px;
                line-height: 1.35;
                font-weight: 950;
            }

            .chair-profile-info .designation {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                margin: 0;
                padding: 9px 17px;
                border-radius: 999px;
                background: rgba(255, 255, 255, 0.18);
                border: 1px solid rgba(255, 255, 255, 0.23);
                color: rgba(255, 255, 255, 0.96);
                font-size: 15px;
                font-weight: 800;
            }

            .chair-info-list {
                position: relative;
                z-index: 2;
                display: grid;
                gap: 14px;
                margin-top: 38px;
            }

            .chair-info-item {
                display: flex;
                align-items: center;
                gap: 13px;
                padding: 15px 16px;
                border-radius: 18px;
                background: rgba(255, 255, 255, 0.15);
                border: 1px solid rgba(255, 255, 255, 0.19);
                backdrop-filter: blur(10px);
            }

            .chair-info-item i {
                width: 38px;
                height: 38px;
                flex: 0 0 38px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 14px;
                background: rgba(255, 255, 255, 0.19);
                color: var(--chair-white);
            }

            .chair-info-item span {
                color: rgba(255, 255, 255, 0.92);
                font-size: 14px;
                line-height: 1.55;
                font-weight: 650;
            }

            .chair-profile-quote {
                position: relative;
                z-index: 2;
                margin-top: 34px;
                padding: 24px;
                border-radius: 24px;
                background: rgba(255, 255, 255, 0.15);
                border: 1px solid rgba(255, 255, 255, 0.20);
            }

            .chair-profile-quote i {
                display: inline-flex;
                width: 42px;
                height: 42px;
                align-items: center;
                justify-content: center;
                margin-bottom: 14px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.20);
                color: var(--chair-white);
                font-size: 19px;
            }

            .chair-profile-quote p {
                margin: 0;
                color: rgba(255, 255, 255, 0.93);
                font-size: 15px;
                line-height: 1.9;
            }

            /* Right Content */
            .chair-content {
                position: relative;
                padding: 60px 64px 54px;
                background:
                    radial-gradient(circle at 90% 8%, rgba(20, 168, 82, 0.08), transparent 28%),
                    var(--chair-white);
                overflow: hidden;
            }

            .chair-content::before {
                content: "\f10d";
                font-family: "Font Awesome 6 Free";
                font-weight: 900;
                position: absolute;
                right: 58px;
                top: 34px;
                color: rgba(20, 168, 82, 0.075);
                font-size: 94px;
                line-height: 1;
            }

            .chair-content-head {
                position: relative;
                z-index: 2;
                margin-bottom: 30px;
            }

            .chair-kicker {
                display: inline-flex;
                align-items: center;
                gap: 9px;
                margin-bottom: 17px;
                padding: 10px 17px;
                border-radius: 999px;
                background: rgba(20, 168, 82, 0.10);
                border: 1px solid rgba(20, 168, 82, 0.12);
                color: var(--chair-primary-dark);
                font-size: 15px;
                font-weight: 900;
            }

            .chair-content h2 {
                max-width: 700px;
                margin: 0;
                color: var(--chair-navy);
                font-size: clamp(30px, 4vw, 46px);
                line-height: 1.24;
                font-weight: 950;
                letter-spacing: -0.55px;
            }

            .chair-divider {
                width: 118px;
                height: 5px;
                margin-top: 22px;
                border-radius: 999px;
                background: linear-gradient(90deg, var(--chair-primary), var(--chair-secondary));
            }

            .chair-message-body {
                position: relative;
                z-index: 2;
                display: grid;
                gap: 18px;
            }

            .chair-message-body p {
                position: relative;
                margin: 0;
                padding: 19px 22px;
                border-radius: 20px;
                background: rgba(255, 255, 255, 0.92);
                border: 1px solid rgba(20, 168, 82, 0.105);
                color: var(--chair-text);
                font-size: 16px;
                line-height: 2;
                text-align: justify;
                box-shadow: 0 12px 34px rgba(15, 36, 31, 0.045);
                transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            }

            .chair-message-body p:hover {
                transform: translateY(-3px);
                border-color: rgba(20, 168, 82, 0.22);
                box-shadow: 0 18px 46px rgba(15, 36, 31, 0.075);
            }

            .chair-message-body p:first-child {
                padding: 24px 26px 24px 30px;
                background:
                    linear-gradient(135deg, rgba(20, 168, 82, 0.11), rgba(17, 153, 142, 0.08)),
                    #ffffff;
                border-color: rgba(20, 168, 82, 0.20);
                color: #173d31;
                font-size: 17px;
                font-weight: 750;
            }

            .chair-message-body p:first-child::before {
                content: "";
                position: absolute;
                left: 0;
                top: 22px;
                bottom: 22px;
                width: 6px;
                border-radius: 0 999px 999px 0;
                background: linear-gradient(180deg, var(--chair-primary), var(--chair-secondary));
            }

            .chair-signature-area {
                position: relative;
                z-index: 2;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 24px;
                margin-top: 38px;
                padding-top: 28px;
                border-top: 1px dashed rgba(20, 168, 82, 0.25);
            }

            .chair-signature-note {
                max-width: 390px;
                color: var(--chair-muted);
                font-size: 15px;
                line-height: 1.75;
                margin: 0;
            }

            .chair-signature-box {
                min-width: 285px;
                padding: 22px 24px;
                border-radius: 24px;
                background:
                    linear-gradient(135deg, rgba(20, 168, 82, 0.10), rgba(17, 153, 142, 0.075)),
                    #ffffff;
                border: 1px solid var(--chair-border);
                box-shadow: var(--chair-shadow-sm);
                text-align: right;
            }

            .chair-signature-box strong {
                display: block;
                margin-bottom: 7px;
                color: var(--chair-navy);
                font-size: 22px;
                line-height: 1.35;
                font-weight: 950;
            }

            .chair-signature-box span {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                color: var(--chair-primary-dark);
                font-size: 15px;
                font-weight: 900;
            }

            /* =========================
               Responsive
            ========================== */
            @media (max-width: 1199px) {
                .chair-card {
                    grid-template-columns: minmax(290px, 350px) 1fr;
                }

                .chair-content {
                    padding: 54px 46px 48px;
                }
            }

            @media (max-width: 991px) {
                .chair-hero {
                    padding: 100px 0 78px;
                }

                .chair-message-section {
                    padding: 75px 0;
                }

                .chair-card {
                    grid-template-columns: 1fr;
                }

                .chair-card::before {
                    inset: 10px;
                    border-radius: 27px;
                }

                .chair-profile {
                    min-height: auto;
                    padding: 38px 28px 42px;
                    text-align: center;
                }

                .chair-logo-box {
                    margin-left: auto;
                    margin-right: auto;
                }

                .chair-info-list {
                    max-width: 680px;
                    grid-template-columns: repeat(3, 1fr);
                    margin-left: auto;
                    margin-right: auto;
                }

                .chair-info-item {
                    align-items: flex-start;
                    text-align: left;
                }

                .chair-profile-quote {
                    max-width: 660px;
                    margin-left: auto;
                    margin-right: auto;
                }

                .chair-signature-area {
                    align-items: flex-start;
                }
            }

            @media (max-width: 767px) {
                .chair-hero {
                    padding: 78px 0 58px;
                }

                .chair-hero__subtitle {
                    font-size: 15px;
                    line-height: 1.8;
                }

                .chair-breadcrumb {
                    border-radius: 20px;
                    padding: 11px 16px;
                }

                .chair-message-section {
                    padding: 52px 0;
                }

                .chair-card {
                    border-radius: 26px;
                }

                .chair-card::before {
                    display: none;
                }

                .chair-profile {
                    padding: 30px 20px 34px;
                }

                .chair-logo-box {
                    width: 88px;
                    height: 88px;
                    border-radius: 22px;
                    margin-bottom: 28px;
                }

                .chair-logo-box img {
                    max-width: 100px;
                }

                .chair-photo-frame {
                    width: 184px;
                    height: 184px;
                }

                .chair-profile-info h3 {
                    font-size: 22px;
                }

                .chair-info-list {
                    grid-template-columns: 1fr;
                    gap: 12px;
                    margin-top: 28px;
                }

                .chair-profile-quote {
                    margin-top: 24px;
                    padding: 20px;
                }

                .chair-content {
                    padding: 36px 20px 30px;
                }

                .chair-content::before {
                    right: 22px;
                    top: 20px;
                    font-size: 60px;
                }

                .chair-content-head {
                    margin-bottom: 24px;
                }

                .chair-message-body p,
                .chair-message-body p:first-child {
                    padding: 16px 17px;
                    font-size: 15px;
                    line-height: 1.85;
                }

                .chair-message-body p:first-child::before {
                    top: 18px;
                    bottom: 18px;
                    width: 5px;
                }

                .chair-signature-area {
                    flex-direction: column;
                    gap: 18px;
                }

                .chair-signature-note {
                    max-width: 100%;
                    text-align: center;
                }

                .chair-signature-box {
                    width: 100%;
                    min-width: auto;
                    text-align: center;
                }
            }

            @media (max-width: 480px) {
                .chair-hero__badge,
                .chair-kicker {
                    font-size: 14px;
                }

                .chair-message-body p,
                .chair-message-body p:first-child {
                    text-align: left;
                }
            }
        </style>
    @endpush

    <!-- Page Title -->

    <section class="relative overflow-hidden text-light" data-bgimage="url({{ asset('frontend/images/background/3.webp') }}) center">
        <div class="spacer-single"></div>
        <div class="container relative z-2">
            <div class="row g-4 gx-5 align-items-center">
                <div class="spacer-single"></div>
                <div class="col-lg-8">
                    <h2 class="mb-0 wow fadeInUp" data-wow-delay=".2s">
                        নেতৃত্ব, সেবা ও উন্নয়নের অঙ্গীকার
                    </h2>
                </div>
                <div class="col-lg-4 text-end">
                    <ul class="crumb">
                        <li><a href="{{ route('frontend.index') }}">
                                হোম
                            </a></li>
                        <li class="active">
                            ম্যানেজিং ডিরেক্টরের  বার্তা
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sw-overlay op-6"></div>
        <div class="gradient-edge-start w-50"></div>
        <div class="spacer-single"></div>
    </section>



    <!-- End Page Title -->

    <!-- Chairman Message Section -->
    <section class="chair-message-section">
        <div class="container">
            <div class="chair-wrap">
                <div class="chair-card">

                    <aside class="chair-profile">
                        <div class="chair-logo-box">
                            <img src="{{ asset('frontend/images/logo-white.webp') }}" alt="Company Logo">
                        </div>

                        <div class="chair-photo-frame">
                            <img src="{{ asset('uploads/about/' . $md->image) }}" alt="{{ $md->title }}">
                        </div>

                        <div class="chair-profile-info">
                            <h3>{{ $md->title }}</h3>
                            <p class="designation">
                                <i class="fa-solid fa-award"></i>
                                ম্যানেজিং ডিরেক্টরের
                            </p>
                        </div>

                        <div class="chair-info-list">
                            <div class="chair-info-item">
                                <i class="fa-solid fa-handshake-angle"></i>
                                <span>মানবকল্যাণ ও সেবামূলক কার্যক্রম</span>
                            </div>

                            <div class="chair-info-item">
                                <i class="fa-solid fa-seedling"></i>
                                <span>টেকসই উন্নয়নের প্রতিশ্রুতি</span>
                            </div>

                            <div class="chair-info-item">
                                <i class="fa-solid fa-scale-balanced"></i>
                                <span>সততা, স্বচ্ছতা ও দায়বদ্ধতা</span>
                            </div>
                        </div>


                    </aside>

                    <main class="chair-content">
                        <div class="chair-content-head">
                            <div class="chair-kicker">
                                <i class="fa-solid fa-envelope-open-text"></i>
                                সম্মানিত ম্যানেজিং ডিরেক্টরের  বার্তা
                            </div>

                            <h5>
                                আপনাদের প্রতি আমাদের আন্তরিক শুভেচ্ছা ও কৃতজ্ঞতা
                            </h5>

                            <div class="chair-divider"></div>
                        </div>

                        <div class="chair-message-body">
                            @foreach(preg_split('/\r\n|\r|\n/', $md->description) as $message)
                                @if(trim(strip_tags($message)) !== '')
                                    {!! $message !!}
                                @endif
                            @endforeach
                        </div>

                        <div class="chair-signature-area">
                            <p class="chair-signature-note">
                                আপনাদের সহযোগিতা, দোয়া ও ভালোবাসা আমাদের অগ্রযাত্রার অনুপ্রেরণা।
                            </p>

                            <div class="chair-signature-box">
                                <strong>{{ $md->title }}</strong>
                                <span>

                                    ম্যানেজিং ডিরেক্টরের ,এ্যারাবিয়ান গ্রুপ
                                </span>
                            </div>
                        </div>
                    </main>

                </div>
            </div>
        </div>
    </section>
    <!-- End Chairman Message Section -->

@endsection

