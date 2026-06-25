@extends("frontend.layouts.master")

@section("title", " আমাদের চলমান প্রজেক্ট ")

@section("content")

    @push('styles')

    @endpush



    <section class="relative overflow-hidden text-light" data-bgimage="url({{ asset('frontend/images/background/3.webp') }}) center">
        <div class="spacer-single"></div>
        <div class="container relative z-2">
            <div class="row g-4 gx-5 align-items-center">
                <div class="spacer-single"></div>
                <div class="col-lg-8">
                    <h2 class="mb-0 wow fadeInUp" data-wow-delay=".2s">
                        আমাদের চলমান প্রজেক্ট
                    </h2>
                </div>
                <div class="col-lg-4 text-end">
                    <ul class="crumb">
                        <li><a href="{{ route('frontend.index') }}">
                                হোম
                            </a></li>
                        <li class="active">
                            আমাদের চলমান প্রজেক্ট
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



            <div class="row g-4">


                @foreach($resortConventionHall as $property)
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
@endsection
