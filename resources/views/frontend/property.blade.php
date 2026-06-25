@extends("frontend.layouts.master")

@section("title", "প্রজেক্ট | The Bachelor Group")

@section("content")

    @push('styles')
        <style>

            /* =========================
               PAGE TITLE
            ========================== */

            .page-title{
                padding:100px 0 80px;
                position:relative;
                overflow:hidden;
                display:flex;
                align-items:center;
            }

            .page-title_bg{
                position:absolute;
                inset:0;
                background-size:cover;
                background-position:center;
                background-repeat:no-repeat;
                transform:scale(1.05);
                transition:transform .5s ease;
            }

            .page-title:hover .page-title_bg{
                transform:scale(1);
            }

            .page-title_overlay{
                position:absolute;
                inset:0;
                background:linear-gradient(
                    135deg,
                    rgba(20,168,82,.85),
                    rgba(17,153,142,.75)
                );
            }

            .page-title_content{
                position:relative;
                z-index:2;
                max-width:800px;
                margin:0 auto;
            }

            .page-title_heading{
                font-size:clamp(30px,5vw,44px);
                font-weight:700;
                margin:0 0 16px;
                line-height:1.3;
                color:#fff;
            }

            .bread-crumb{
                display:flex;
                gap:8px;
                justify-content:center;
                align-items:center;
                flex-wrap:wrap;
                font-size:15px;
            }

            .bread-crumb a{
                color:#fff;
                text-decoration:none;
                transition:.3s;
                opacity:.9;
            }

            .bread-crumb a:hover{
                color:#ffd700;
            }

            .bread-crumb .separator{
                color:rgba(255,255,255,.7);
            }

            .bread-crumb .current{
                color:rgba(255,255,255,.9);
                font-weight:500;
            }

            /* =========================
               PROPERTY SECTION
            ========================== */

            .property-modern{
                background:linear-gradient(
                    180deg,
                    #f8fafc 0%,
                    #f1f5f9 100%
                );
                padding:80px 0;
            }

            /* =========================
               PROPERTY CARD
            ========================== */

            .property-card{
                background:#fff;
                border-radius:20px;
                overflow:hidden;
                box-shadow:0 20px 40px rgba(0,0,0,.08);
                transition:.35s ease;
                height:100%;
                display:flex;
                flex-direction:column;
            }

            .property-card:hover{
                transform:translateY(-5px);
                box-shadow:0 25px 50px rgba(0,0,0,.12);
            }

            .property-image{
                position:relative;
                overflow:hidden;
            }

            .property-image img{
                width:100%;
                height:250px;
                object-fit:cover;
                transition:transform .5s ease;
            }

            .property-card:hover .property-image img{
                transform:scale(1.06);
            }

            .property-content{
                padding:24px;
                flex:1;
            }

            .property-location{
                display:flex;
                align-items:center;
                gap:8px;
                color:#64748b;
                font-size:14px;
                margin-bottom:14px;
            }

            .property-location i{
                color:#14a852;
            }

            .property-title{
                font-size:22px;
                font-weight:700;
                line-height:1.5;
                margin:0;
            }

            .property-title a{
                color:#1e293b;
                text-decoration:none;
                transition:.3s;
            }

            .property-title a:hover{
                color:#14a852;
            }

            /* =========================
               PAGINATION
            ========================== */

            .styled-pagination{
                display:flex;
                justify-content:center;
                align-items:center;
                gap:10px;
                flex-wrap:wrap;
                margin-top:50px;
                padding:0;
                list-style:none;
            }

            .styled-pagination li a,
            .styled-pagination li span{
                width:46px;
                height:46px;
                border-radius:12px;
                background:#fff;
                display:flex;
                align-items:center;
                justify-content:center;
                text-decoration:none;
                color:#1e293b;
                font-weight:600;
                transition:.3s;
                box-shadow:0 5px 15px rgba(0,0,0,.06);
            }

            .styled-pagination li a:hover,
            .styled-pagination li a.active{
                background:linear-gradient(
                    135deg,
                    #14a852,
                    #11998e
                );
                color:#fff;
                transform:translateY(-2px);
            }

            .styled-pagination li.disabled span{
                opacity:.5;
                cursor:not-allowed;
            }

            /* =========================
               EMPTY STATE
            ========================== */

            .empty-property{
                background:#fff;
                border-radius:20px;
                padding:70px 30px;
                text-align:center;
                box-shadow:0 20px 40px rgba(0,0,0,.08);
            }

            .empty-property i{
                font-size:60px;
                color:#14a852;
                margin-bottom:20px;
            }

            .empty-property h4{
                font-size:28px;
                font-weight:700;
                color:#1e293b;
                margin-bottom:10px;
            }

            .empty-property p{
                color:#64748b;
                margin:0;
            }

            /* =========================
               RESPONSIVE
            ========================== */

            @media(max-width:991px){

                .page-title{
                    padding:70px 0 50px;
                }

                .property-modern{
                    padding:60px 0;
                }

            }

            @media(max-width:767px){

                .property-card{
                    border-radius:16px;
                }

                .property-image img{
                    height:220px;
                }

            }

        </style>
    @endpush

    <!-- PAGE TITLE -->
    <section class="page-title wow fadeIn"
             data-wow-delay="0ms"
             data-wow-duration="1200ms">

        <div class="page-title_bg wow zoomIn"
             data-wow-delay="0ms"
             data-wow-duration="1500ms"
             style="background-image:url('{{ asset('frontend/assets/images/background/test.jpg') }}');">
        </div>

        <div class="page-title_overlay"></div>

        <div class="container">
            <div class="page-title_content text-center wow fadeInUp"
                 data-wow-delay="200ms"
                 data-wow-duration="1200ms">

                <h1 class="page-title_heading wow fadeInUp"
                    data-wow-delay="300ms"
                    data-wow-duration="1200ms">
                    প্রজেক্ট
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
                    প্রজেক্ট
                </span>

                </div>

            </div>
        </div>

    </section>
    <!-- END PAGE TITLE -->


    <!-- PROPERTY SECTION -->
    <section class="property-modern wow fadeInUp"
             data-wow-delay="0ms"
             data-wow-duration="1200ms">

        <div class="container">

            <div class="row g-4">

                @forelse($properties as $property)

                    <div class="col-lg-4 col-md-6 wow fadeInUp"
                         data-wow-delay="{{ ($loop->index % 3) * 200 }}ms"
                         data-wow-duration="1200ms">

                        <div class="property-card">

                            <div class="property-image wow zoomIn"
                                 data-wow-delay="{{ (($loop->index % 3) * 200) + 100 }}ms"
                                 data-wow-duration="1200ms">

                                <a href="{{ route('frontend.propertyDetail', $property->title) }}">

                                    <img
                                        src="{{ $property->image ? asset('uploads/property/'.$property->image) : asset('frontend/assets/images/resource/news-1.jpg') }}"
                                        alt="{{ $property->title }}"
                                    >

                                </a>

                            </div>

                            <div class="property-content">

                                <div class="property-location wow fadeInUp"
                                     data-wow-delay="{{ (($loop->index % 3) * 200) + 200 }}ms"
                                     data-wow-duration="1000ms">

                                    <i class="fa-solid fa-location-dot"></i>

                                    {{ $property->location }}

                                </div>

                                <h4 class="property-title wow fadeInUp"
                                    data-wow-delay="{{ (($loop->index % 3) * 200) + 300 }}ms"
                                    data-wow-duration="1000ms">

                                    <a href="{{ route('frontend.propertyDetail', $property->title) }}">

                                        {{ Str::words(strip_tags($property->title), 10, '...') }}

                                    </a>

                                </h4>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 wow fadeInUp"
                         data-wow-delay="200ms"
                         data-wow-duration="1200ms">

                        <div class="empty-property wow zoomIn"
                             data-wow-delay="300ms"
                             data-wow-duration="1200ms">

                            <i class="fa-solid fa-house-circle-xmark"></i>

                            <h4>কোনো প্রজেক্ট পাওয়া যায়নি</h4>

                            <p>
                                বর্তমানে কোনো প্রজেক্ট যুক্ত করা হয়নি।
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

            <!-- PAGINATION -->
            @if ($properties->hasPages())

                <ul class="styled-pagination wow fadeInUp"
                    data-wow-delay="500ms"
                    data-wow-duration="1200ms">

                    {{-- Previous --}}
                    @if ($properties->onFirstPage())

                        <li class="disabled">
                        <span>
                            <i class="fa fa-angle-left"></i>
                        </span>
                        </li>

                    @else

                        <li>
                            <a href="{{ $properties->previousPageUrl() }}">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </li>

                    @endif

                    {{-- Pages --}}
                    @foreach ($properties->getUrlRange(1, $properties->lastPage()) as $page => $url)

                        <li class="wow fadeInUp"
                            data-wow-delay="{{ ($loop->index % 5) * 100 }}ms"
                            data-wow-duration="800ms">

                            <a href="{{ $url }}"
                               class="{{ $properties->currentPage() == $page ? 'active' : '' }}">
                                {{ $page }}
                            </a>

                        </li>

                    @endforeach

                    {{-- Next --}}
                    @if ($properties->hasMorePages())

                        <li>
                            <a href="{{ $properties->nextPageUrl() }}">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>

                    @else

                        <li class="disabled">
                        <span>
                            <i class="fa fa-angle-right"></i>
                        </span>
                        </li>

                    @endif

                </ul>

            @endif
            <!-- END PAGINATION -->

        </div>

    </section>
    <!-- END PROPERTY SECTION -->
@endsection
