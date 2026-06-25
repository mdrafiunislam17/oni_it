@extends("frontend.layouts.master")

@section("title", "আমাদের সম্পর্কে")

@section("content")

    @push('styles')
        <style>
            :root {
                --about-primary: #14a852;
                --about-primary-dark: #08743d;
                --about-secondary: #11998e;
                --about-dark: #0f241f;
                --about-text: #344054;
                --about-muted: #667085;
                --about-white: #ffffff;
                --about-soft: #f5fff9;
                --about-border: rgba(20, 168, 82, 0.16);
                --about-shadow-sm: 0 12px 32px rgba(15, 36, 31, 0.08);
                --about-shadow-md: 0 22px 60px rgba(15, 36, 31, 0.12);
                --about-shadow-lg: 0 34px 90px rgba(15, 36, 31, 0.18);
            }

            /* =========================
               Premium Page Hero
            ========================== */


            .about-hero:hover {
                transform: scale(1.02);
            }


            .about-breadcrumb a {
                color: var(--about-white);
                text-decoration: none;
                font-weight: 700;
                transition: color 0.25s ease;
            }

            .about-breadcrumb a:hover {
                color: #ffe680;
            }

            .about-breadcrumb .separator {
                opacity: 0.68;
            }

            .about-breadcrumb .current {
                opacity: 0.92;
                font-weight: 700;
            }

            /* =========================
               About PDF Section
            ========================== */
            .about-pdf-section {
                position: relative;
                padding: 105px 0;
                background:
                    radial-gradient(circle at 12% 8%, rgba(20, 168, 82, 0.12), transparent 30%),
                    radial-gradient(circle at 88% 85%, rgba(17, 153, 142, 0.13), transparent 34%),
                    linear-gradient(180deg, #ffffff 0%, var(--about-soft) 100%);
                overflow: hidden;
            }

            .about-pdf-section::before,
            .about-pdf-section::after {
                content: "";
                position: absolute;
                border-radius: 50%;
                pointer-events: none;
            }

            .about-pdf-section::before {
                width: 420px;
                height: 420px;
                left: -235px;
                top: 190px;
                background: rgba(20, 168, 82, 0.08);
            }

            .about-pdf-section::after {
                width: 470px;
                height: 470px;
                right: -250px;
                bottom: 70px;
                background: rgba(17, 153, 142, 0.09);
            }

            .about-pdf-card {
                position: relative;
                z-index: 2;
                display: grid;
                grid-template-columns: minmax(320px, 455px) 1fr;
                gap: 0;
                border-radius: 38px;
                background: rgba(255, 255, 255, 0.88);
                border: 1px solid rgba(255, 255, 255, 0.95);
                box-shadow: var(--about-shadow-lg);
                overflow: hidden;
                backdrop-filter: blur(14px);
            }

            .about-pdf-card::before {
                content: "";
                position: absolute;
                inset: 14px;
                border: 1px solid rgba(20, 168, 82, 0.09);
                border-radius: 30px;
                pointer-events: none;
                z-index: 3;
            }

            .about-pdf-info {
                position: relative;
                min-height: 620px;
                padding: 54px 42px;
                background:
                    linear-gradient(180deg, rgba(8, 116, 61, 0.97), rgba(17, 153, 142, 0.94)),
                    url('{{ asset('frontend/assets/images/background/test.jpg') }}');
                background-size: cover;
                background-position: center;
                color: var(--about-white);
                overflow: hidden;
            }

            .about-pdf-info::before,
            .about-pdf-info::after {
                content: "";
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.14);
                pointer-events: none;
            }

            .about-pdf-info::before {
                width: 280px;
                height: 280px;
                top: -120px;
                left: -115px;
            }

            .about-pdf-info::after {
                width: 260px;
                height: 260px;
                right: -125px;
                bottom: -105px;
            }

            .about-pdf-icon {
                position: relative;
                z-index: 2;
                width: 98px;
                height: 98px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 34px;
                border-radius: 28px;
                background: rgba(255, 255, 255, 0.18);
                border: 1px solid rgba(255, 255, 255, 0.24);
                box-shadow: 0 20px 42px rgba(0, 0, 0, 0.14);
            }

            .about-pdf-icon i {
                color: var(--about-white);
                font-size: 42px;
            }

            .about-pdf-info h2 {
                position: relative;
                z-index: 2;
                margin: 0 0 18px;
                color: var(--about-white);
                font-size: clamp(30px, 4vw, 44px);
                line-height: 1.24;
                font-weight: 950;
                letter-spacing: -0.55px;
            }

            .about-pdf-info .about-pdf-text {
                position: relative;
                z-index: 2;
                margin: 0;
                color: rgba(255, 255, 255, 0.90);
                font-size: 16px;
                line-height: 1.95;
            }

            .about-pdf-actions {
                position: relative;
                z-index: 2;
                display: flex;
                flex-wrap: wrap;
                gap: 13px;
                margin-top: 30px;
            }

            .about-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                min-height: 52px;
                padding: 13px 22px;
                border-radius: 999px;
                text-decoration: none;
                font-weight: 900;
                transition: transform 0.28s ease, box-shadow 0.28s ease, background 0.28s ease;
            }

            .about-btn:hover {
                transform: translateY(-3px);
                text-decoration: none;
            }

            .about-btn--light {
                background: var(--about-white);
                color: var(--about-primary-dark);
                box-shadow: 0 16px 36px rgba(0, 0, 0, 0.15);
            }

            .about-btn--light:hover {
                color: var(--about-primary-dark);
                box-shadow: 0 20px 44px rgba(0, 0, 0, 0.20);
            }

            .about-btn--outline {
                background: rgba(255, 255, 255, 0.13);
                color: var(--about-white);
                border: 1px solid rgba(255, 255, 255, 0.30);
            }

            .about-btn--outline:hover {
                color: var(--about-white);
                background: rgba(255, 255, 255, 0.20);
            }

            .about-info-grid {
                position: relative;
                z-index: 2;
                display: grid;
                grid-template-columns: 1fr;
                gap: 14px;
                margin-top: 38px;
            }

            .about-info-item {
                display: flex;
                align-items: flex-start;
                gap: 13px;
                padding: 16px;
                border-radius: 18px;
                background: rgba(255, 255, 255, 0.14);
                border: 1px solid rgba(255, 255, 255, 0.20);
                backdrop-filter: blur(10px);
            }

            .about-info-item i {
                width: 38px;
                height: 38px;
                flex: 0 0 38px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 14px;
                background: rgba(255, 255, 255, 0.18);
                color: var(--about-white);
            }

            .about-info-item h6 {
                margin: 0 0 4px;
                color: var(--about-white);
                font-size: 16px;
                font-weight: 900;
            }

            .about-info-item p {
                margin: 0;
                color: rgba(255, 255, 255, 0.86);
                font-size: 14px;
                line-height: 1.65;
            }

            .about-pdf-preview-wrap {
                position: relative;
                padding: 54px;
                background:
                    radial-gradient(circle at 90% 8%, rgba(20, 168, 82, 0.08), transparent 28%),
                    var(--about-white);
            }

            .about-preview-head {
                position: relative;
                z-index: 2;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 18px;
                margin-bottom: 24px;
            }

            .about-preview-title span {
                display: inline-flex;
                align-items: center;
                gap: 9px;
                margin-bottom: 10px;
                padding: 9px 15px;
                border-radius: 999px;
                background: rgba(20, 168, 82, 0.10);
                color: var(--about-primary-dark);
                font-size: 14px;
                font-weight: 900;
            }

            .about-preview-title h3 {
                margin: 0;
                color: var(--about-dark);
                font-size: clamp(26px, 3vw, 36px);
                line-height: 1.28;
                font-weight: 950;
            }

            .about-preview-mini-icon {
                width: 70px;
                height: 70px;
                flex: 0 0 70px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 22px;
                background: linear-gradient(135deg, var(--about-primary), var(--about-secondary));
                color: var(--about-white);
                font-size: 30px;
                box-shadow: 0 18px 40px rgba(20, 168, 82, 0.26);
            }

            .about-pdf-preview {
                position: relative;
                z-index: 2;
                min-height: 535px;
                border-radius: 28px;
                overflow: hidden;
                background:
                    linear-gradient(135deg, rgba(20, 168, 82, 0.09), rgba(17, 153, 142, 0.07)),
                    #ffffff;
                border: 1px solid var(--about-border);
                box-shadow: var(--about-shadow-md);
            }

            .about-pdf-preview iframe,
            .about-pdf-preview object {
                width: 100%;
                height: 535px;
                border: 0;
                display: block;
                background: #ffffff;
            }

            .about-pdf-fallback {
                height: 535px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 16px;
                padding: 30px;
                text-align: center;
            }

            .about-pdf-fallback i {
                width: 82px;
                height: 82px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 26px;
                background: linear-gradient(135deg, var(--about-primary), var(--about-secondary));
                color: #ffffff;
                font-size: 34px;
            }

            .about-pdf-fallback p {
                max-width: 420px;
                margin: 0;
                color: var(--about-muted);
                line-height: 1.8;
            }

            .about-note-card {
                position: relative;
                z-index: 2;
                display: flex;
                gap: 14px;
                align-items: flex-start;
                margin-top: 22px;
                padding: 18px 20px;
                border-radius: 20px;
                background: rgba(20, 168, 82, 0.08);
                border: 1px solid rgba(20, 168, 82, 0.12);
            }

            .about-note-card i {
                width: 38px;
                height: 38px;
                flex: 0 0 38px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 14px;
                background: #ffffff;
                color: var(--about-primary-dark);
                box-shadow: var(--about-shadow-sm);
            }

            .about-note-card p {
                margin: 0;
                color: var(--about-text);
                font-size: 15px;
                line-height: 1.75;
            }

            /* =========================
               Responsive
            ========================== */
            @media (max-width: 1199px) {
                .about-pdf-card {
                    grid-template-columns: minmax(300px, 390px) 1fr;
                }

                .about-pdf-preview-wrap {
                    padding: 44px;
                }
            }

            @media (max-width: 991px) {
                .about-hero {
                    padding: 100px 0 78px;
                }

                .about-pdf-section {
                    padding: 75px 0;
                }

                .about-pdf-card {
                    grid-template-columns: 1fr;
                }

                .about-pdf-card::before {
                    inset: 10px;
                    border-radius: 27px;
                }

                .about-pdf-info {
                    min-height: auto;
                    padding: 42px 32px;
                    text-align: center;
                }

                .about-pdf-icon {
                    margin-left: auto;
                    margin-right: auto;
                }

                .about-pdf-actions {
                    justify-content: center;
                }

                .about-info-grid {
                    grid-template-columns: repeat(3, 1fr);
                }

                .about-info-item {
                    text-align: left;
                }
            }

            @media (max-width: 767px) {


                .about-pdf-section {
                    padding: 52px 0;
                }

                .about-pdf-card {
                    border-radius: 26px;
                }

                .about-pdf-card::before {
                    display: none;
                }

                .about-pdf-info {
                    padding: 34px 20px;
                }

                .about-pdf-icon {
                    width: 86px;
                    height: 86px;
                    border-radius: 24px;
                    margin-bottom: 26px;
                }

                .about-info-grid {
                    grid-template-columns: 1fr;
                    margin-top: 28px;
                }

                .about-pdf-preview-wrap {
                    padding: 34px 20px 26px;
                }

                .about-preview-head {
                    align-items: flex-start;
                }

                .about-preview-mini-icon {
                    width: 58px;
                    height: 58px;
                    flex-basis: 58px;
                    border-radius: 18px;
                    font-size: 24px;
                }

                .about-pdf-preview {
                    min-height: 430px;
                    border-radius: 22px;
                }

                .about-pdf-preview iframe,
                .about-pdf-preview object,
                .about-pdf-fallback {
                    height: 430px;
                }

                .about-note-card {
                    padding: 16px;
                }
            }

            @media (max-width: 480px) {

                .about-preview-title span {
                    font-size: 14px;
                }

                .about-pdf-actions {
                    display: grid;
                    grid-template-columns: 1fr;
                }

                .about-btn {
                    width: 100%;
                }

                .about-preview-head {
                    flex-direction: column;
                }
            }
        </style>
    @endpush

    @php
        $aboutPdf = asset('uploads/BachelorGroupProfile_compressed.pdf');
    @endphp


    <section class="relative overflow-hidden text-light" data-bgimage="url({{ asset('frontend/images/background/3.webp') }}) center">
        <div class="spacer-single"></div>
        <div class="container relative z-2">
            <div class="row g-4 gx-5 align-items-center">
                <div class="spacer-single"></div>
                <div class="col-lg-8">
                    <h2 class="mb-0 wow fadeInUp" data-wow-delay=".2s">
                        আমাদের সম্পর্কে
                    </h2>
                </div>
                <div class="col-lg-4 text-end">
                    <ul class="crumb">
                        <li><a href="{{ route('frontend.index') }}">
                                হোম
                            </a></li>
                        <li class="active">
                            আমাদের সম্পর্কে
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sw-overlay op-6"></div>
        <div class="gradient-edge-start w-50"></div>
        <div class="spacer-single"></div>
    </section>




    <!-- About PDF Section -->
    <section class="about-pdf-section">
        <div class="container">
            <div class="about-pdf-card">

                <aside class="about-pdf-info">
                    <div class="about-pdf-icon">
                        <i class="fa-solid fa-file-pdf"></i>
                    </div>

                    <h4>
                        আমাদের সম্পর্কে বিস্তারিত জানতে PDF ফাইলটি দেখুন
                    </h4>

                    <p class="about-pdf-text">
                        এখানে আমাদের প্রতিষ্ঠানের পরিচিতি, লক্ষ্য, উদ্দেশ্য এবং কার্যক্রম সম্পর্কে বিস্তারিত তথ্য সংযুক্ত করা হয়েছে। আপনি চাইলে PDF ফাইলটি সরাসরি দেখতে বা ডাউনলোড করতে পারেন।
                    </p>

                    <div class="about-pdf-actions">
                        <a href="{{ $aboutPdf }}" class="about-btn about-btn--light" target="_blank" rel="noopener">
                            <i class="fa-solid fa-eye"></i>
                            PDF দেখুন
                        </a>

                        <a href="{{ $aboutPdf }}" class="about-btn about-btn--outline" download>
                            <i class="fa-solid fa-download"></i>
                            ডাউনলোড করুন
                        </a>
                    </div>

                    <div class="about-info-grid">
                        <div class="about-info-item">
                            <i class="fa-solid fa-bullseye"></i>
                            <div>
                                <h6>লক্ষ্য</h6>
                                <p>মানবকল্যাণ, উন্নয়ন ও সেবামূলক কার্যক্রমকে এগিয়ে নেওয়া।</p>
                            </div>
                        </div>

                        <div class="about-info-item">
                            <i class="fa-solid fa-handshake-angle"></i>
                            <div>
                                <h6>সেবা</h6>
                                <p>স্বচ্ছতা, দায়বদ্ধতা ও আন্তরিকতার সঙ্গে মানুষের পাশে থাকা।</p>
                            </div>
                        </div>

                        <div class="about-info-item">
                            <i class="fa-solid fa-seedling"></i>
                            <div>
                                <h6>উন্নয়ন</h6>
                                <p>পরিকল্পিত উদ্যোগের মাধ্যমে টেকসই অগ্রগতি নিশ্চিত করা।</p>
                            </div>
                        </div>
                    </div>
                </aside>

                <main class="about-pdf-preview-wrap">
                    <div class="about-preview-head">
                        <div class="about-preview-title">
                            <span>
                                <i class="fa-solid fa-file-lines"></i>
                                PDF Preview
                            </span>
                            <h3>
                                পরিচিতি ডকুমেন্ট
                            </h3>
                        </div>

                        <div class="about-preview-mini-icon">
                            <i class="fa-solid fa-file-arrow-down"></i>
                        </div>
                    </div>

                    <div class="about-pdf-preview">
                        <object data="{{ $aboutPdf }}#toolbar=0" type="application/pdf">
                            <div class="about-pdf-fallback">
                                <i class="fa-solid fa-file-pdf"></i>
                                <p>
                                    আপনার ব্রাউজারে PDF preview দেখা যাচ্ছে না। নিচের button থেকে PDF ফাইলটি খুলুন অথবা ডাউনলোড করুন।
                                </p>
                                <a href="{{ $aboutPdf }}" class="about-btn about-btn--light" target="_blank" rel="noopener">
                                    <i class="fa-solid fa-up-right-from-square"></i>
                                    PDF খুলুন
                                </a>
                            </div>
                        </object>
                    </div>

                    <div class="about-note-card">
                        <i class="fa-solid fa-circle-check"></i>
                        <p>
                            PDF ফাইলটি নতুন tab-এ খুলতে “PDF দেখুন” button ব্যবহার করুন, আর offline রাখতে “ডাউনলোড করুন” button চাপুন।
                        </p>
                    </div>
                </main>

            </div>
        </div>
    </section>
    <!-- End About PDF Section -->

@endsection
