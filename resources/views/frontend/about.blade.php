@extends("frontend.layouts.master")

@section("title", "আমাদের সম্পর্কে")

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



        </style>

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



            .leader-image-wrap img {
                width: 100%;
                height: 100%;
                min-height: 460px;
                object-fit: cover;
                display: block;
                transform: scale(1.01);
                transition: all .45s ease;
            }

            .leader-message-card:hover .leader-image-wrap img {
                transform: scale(1.06);
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

                .leader-content h2 {
                    font-size: 31px;
                }


                .leader-image-wrap img {
                    min-height: 380px;
                }
            }

            @media (max-width: 767px) {


                .leader-content h2 {
                    font-size: 26px;
                }


                .leader-quote p {
                    font-size: 14.5px;
                    line-height: 1.75;
                }



                .leader-badge h5 {
                    font-size: 20px;
                }


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



                .vision-card p {
                    font-size: 14.5px;
                    line-height: 1.7;
                }

                .subtitle {
                    font-size: 14px;
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
                                {!! $about->description !!}
                            </p>

                        </div>
                    </div>
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
