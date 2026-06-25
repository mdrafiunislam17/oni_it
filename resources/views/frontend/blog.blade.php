@extends("frontend.layouts.master")

@section("title", "ব্লগ")

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
            <h2>ব্লগ</h2>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('frontend.index')}}"><i class="fa-solid fa-house fa-fw"></i> হোম</a></li>
                <li>ব্লগ</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    @php
        $properties = [
            [
                'image' => 'news-1.jpg',
                'author' => 'অ্যাডমিন',
                'read_time' => '৬ মিনিট পড়ার সময়',
                'title' => 'বাড়ি কেনার জন্য প্রয়োজনীয় গুরুত্বপূর্ণ টিপস',
                'link' => 'blog-detail.html',
            ],
            [
                'image' => 'news-2.jpg',
                'author' => 'অ্যাডমিন',
                'read_time' => '৬ মিনিট পড়ার সময়',
                'title' => 'স্বপ্নের বাড়ি খুঁজে পাওয়ার ধাপে ধাপে নির্দেশনা',
                'link' => 'blog-detail.html',
            ],
            [
                'image' => 'news-3.jpg',
                'author' => 'অ্যাডমিন',
                'read_time' => '৬ মিনিট পড়ার সময়',
                'title' => 'বাড়ি বিক্রির সহজ ও কার্যকর প্রফেশনাল টিপস',
                'link' => 'blog-detail.html',
            ],
        ];
    @endphp





    <section class="property-three">
        <div class="auto-container">
            <div class="row clearfix">
                @foreach($properties as $blog)
                <!-- Property Block One -->


                    <div class="news-block_one style-two col-lg-4 col-md-6 col-sm-12">
                        <div class="news-block_one-inner">
                            <div class="news-block_one-image">
                                <a href="{{route('frontend.blogDetail')}}">
                                    <img src="{{ asset('frontend/assets/images/resource/' . $blog['image']) }}" alt="" /></a>
                            </div>
                            <div class="news-block_one-content">
                                <ul class="news-block_one-meta">
                                    <li> By {{ $blog['author'] }}</li>
                                    <li>{{ $blog['read_time'] }}</li>
                                </ul>
                                <h4 class="news-block_one-title"><a href="{{route('frontend.blogDetail')}}">
                                        {{ $blog['title'] }}</a></h4>
                                <a class="news-block_one-more" href="{{route('frontend.blogDetail')}}">
                                    আরও পড়ুন <i class="flaticon-next-1"></i></a>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>

            <!-- Styled Pagination -->
            <ul class="styled-pagination text-center">
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="next"><a href="#"><span class="fa-solid fa-angle-right fa-fw"></span></a></li>
            </ul>
            <!-- End Styled Pagination -->

        </div>
    </section>



@endsection
