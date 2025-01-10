@extends('customer.layouts.master-one-col')

@section('content')
    <!-- start main one col -->
    {{-- <main id="main-body-one-col" class="main-body"> --}}

    <!-- start slideshow -->
    <section class="container-xxl my-4">
        <section class="row">
            <section class="col-md-8 pe-md-1 ">
                <section id="slideshow" class="owl-carousel owl-theme">

                    @foreach ($slideShowImages as $slideShowImage)
                        <section class="item"><a class="w-100 d-block h-auto text-decoration-none"
                                href="{{ urldecode($slideShowImage->url) }}"><img class="w-100 rounded-2 d-block h-auto"
                                    src="{{ asset('storage/' . $slideShowImage->image) }}"
                                    alt="{{ $slideShowImage->title }}"></a>
                        </section>
                    @endforeach

                </section>
            </section>
            <section class="col-md-4 ps-md-1 mt-2 mt-md-0">
                @foreach ($topBanners as $topBanner)
                    <section class="mb-2"><a href="#" class="d-block"><img class="w-100 rounded-2"
                                src="{{ asset('storage/' . $topBanner->image) }}" alt="{{ $topBanner->title }}"></a>
                    </section>
                @endforeach
            </section>
        </section>
    </section>
    <!-- end slideshow -->



    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پربازدیدترین کالاها</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="#">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">
                                @foreach ($mostVisitedProducts as $mostVisitedProduct)
                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                <section class="product-add-to-cart"><a href="#"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a>
                                                </section>
                                                {{-- @guest
                                                    <section class="product-add-to-favorite">
                                                        <button class="btn btn-light btn-sm text-decoration-none"
                                                            data-url="{{ route('customer.market.add-to-favorite', $mostVisitedProduct) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            title="افزودن به علاقه مندی">
                                                            <i class="fa fa-heart text-dark"></i>
                                                        </button>
                                                    </section>
                                                @endguest --}}


                                                @auth
                                                    @if ($mostVisitedProduct->user->contains(auth()->user()->id))
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                data-url="{{ route('customer.market.add-to-favorite', $mostVisitedProduct) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart text-danger"></i>
                                                            </button>
                                                        </section>
                                                    @else
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                data-url="{{ route('customer.market.add-to-favorite', $mostVisitedProduct) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="اضافه به علاقه مندی">
                                                                <i class="fa fa-heart text-dark"></i>
                                                            </button>
                                                        </section>
                                                    @endif
                                                @endauth
                                                @guest
                                                    <section class="product-add-to-favorite">
                                                        <button class="btn btn-light btn-sm text-decoration-none"
                                                            data-url="{{ route('customer.market.add-to-favorite', $mostVisitedProduct) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            title="افزودن به علاقه مندی">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </section>
                                                @endguest
                                                {{-- @auth
                                                    @if ($mostVisitedProduct->user->contains(auth()->user()->id))
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                data-url="{{ route('customer.market.add-to-favorite', $mostVisitedProduct) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart text-danger"></i>
                                                            </button>
                                                        </section>
                                                    @else
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                data-url="{{ route('customer.market.add-to-favorite', $mostVisitedProduct) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title=" اضافه به علاقه مندی">
                                                                <i class="fa fa-heart text-dark"></i>
                                                            </button>
                                                        </section>
                                                    @endif
                                                @endauth --}}

                                                <a class="product-link"
                                                    href="{{ route('customer.market.product', $mostVisitedProduct) }}">
                                                    <section class="product-image">
                                                        <img class=""
                                                            src="{{ asset('storage/' . $mostVisitedProduct->image) }}"
                                                            alt="{{ $mostVisitedProduct->name }}">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name">
                                                        <h3>{{ Str::limit($mostVisitedProduct->name, 10) }}</h3>
                                                    </section>
                                                    <section class="product-price-wrapper">
                                                        {{-- <section class="product-discount">
                                                            <span class="product-old-price">6,895,000 </span>
                                                            <span class="product-discount-amount">10%</span>
                                                        </section> --}}
                                                        <section class="product-price">{{ $mostVisitedProduct->price }} AFN
                                                        </section>
                                                    </section>

                                                    <section class="product-colors">
                                                        @foreach ($mostVisitedProduct->colors as $color)
                                                            <section class="product-colors-item"
                                                                style="background-color: {{ $color->color }}">
                                                            </section>
                                                        @endforeach
                                                    </section>
                                                </a>
                                            </section>
                                        </section>
                                    </section>
                                @endforeach
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end product lazy load -->



    <!-- start ads section -->
    <section class="mb-3">
        <section class="container-xxl">
            <!-- two column-->
            <section class="row py-4">
                @foreach ($middleBanners as $middleBanner)
                    <section class="col-12 col-md-6 mt-2 mt-md-0"><img class="d-block rounded-2 w-100"
                            src="{{ asset('storage/' . $middleBanner->image) }}" alt=""></section>
                @endforeach
            </section>

        </section>
    </section>
    <!-- end ads section -->


    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پیشنهاد آمازون به شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="#">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">
                                @foreach ($offerProducts as $offerProduct)
                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                <section class="product-add-to-cart"><a href="#"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a>
                                                </section>
                                                @guest
                                                    <section class="product-add-to-favorite">
                                                        <button class="btn btn-light btn-sm text-decoration-none"
                                                            data-url="{{ route('customer.market.add-to-favorite', $offerProduct) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            title="افزودن به علاقه مندی">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </section>
                                                @endguest

                                                @auth
                                                    @if ($offerProduct->user->contains(auth()->user()->id))
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                data-url="{{ route('customer.market.add-to-favorite', $offerProduct) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart text-danger"></i>
                                                            </button>
                                                        </section>
                                                    @else
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                data-url="{{ route('customer.market.add-to-favorite', $offerProduct) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="اضافه به علاقه مندی">
                                                                <i class="fa fa-heart text-dark"></i>
                                                            </button>
                                                        </section>
                                                    @endif
                                                @endauth
                                                <a class="product-link"
                                                    href="{{ route('customer.market.product', $offerProduct) }}">
                                                    <section class="product-image">
                                                        <img class=""
                                                            src="{{ asset('storage/' . $offerProduct->image) }}"
                                                            alt="{{ $offerProduct->name }}">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name">
                                                        <h3>{{ Str::limit($offerProduct->name, 10) }}</h3>
                                                    </section>
                                                    <section class="product-price-wrapper">
                                                        {{-- <section class="product-discount">
                                                        <span class="product-old-price">6,895,000 </span>
                                                        <span class="product-discount-amount">10%</span>
                                                    </section> --}}
                                                        <section class="product-price">{{ $offerProduct->price }} AFN
                                                        </section>
                                                    </section>
                                                    <section class="product-colors">
                                                        @foreach ($offerProduct->colors as $color)
                                                            <section class="product-colors-item"
                                                                style="background-color: {{ $color->color }}">
                                                            </section>
                                                        @endforeach
                                                    </section>
                                                </a>
                                            </section>
                                        </section>
                                    </section>
                                @endforeach

                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end product lazy load -->


    <!-- start ads section -->
    @if (!empty($bottomBanner))
        <section class="mb-3">
            <section class="container-xxl">
                <!-- one column -->
                <section class="row py-4">
                    <section class="col">
                        <img style="width: 100%" class="" src="{{ asset('storage/' . $bottomBanner->image) }}"
                            alt="{{ $bottomBanner->name }}">
                    </section>
                </section>
            </section>
        </section>
    @endif

    <!-- end ads section -->

    <!-- start brand part-->
    <section class="brand-part mb-4 py-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex align-items-center">
                            <h2 class="content-header-title">
                                <span>برندهای ویژه</span>
                            </h2>
                        </section>
                    </section>
                    <!-- start vontent header -->
                    <section class="brands-wrapper py-4">
                        <section class="brands dark-owl-nav owl-carousel owl-theme">
                            @foreach ($brands as $brands)
                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#">
                                            <img class="" src="{{ asset('storage/' . $brands->logo) }}"
                                                alt="{{ $brands->original_name }}">
                                    </section>
                                </section>
                            @endforeach
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end brand part-->

    <section class="position-fixed p-4 flex-row-reverse"
        style="z-index: 20000000; left: 0; top: 3rem; width: 26rem; max-width: 80%;">
        <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <div>
                        <p class="text-dark"> برای افزودن کالا به لیست علاقه مندی ها باید ابتدا وارد حساب خود شوید</p>
                    </div>
                    <div>
                        <a href="{{ route('auth.customer.login-register-form') }}" class="text-dark">ثبت نام/ ورود</a>
                    </div>
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </section>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $('.product-add-to-favorite button').click(function(e) {
                e.preventDefault(); // Prevent default button behavior
                var url = $(this).data('url');
                var button = $(this);
                console.log(url);
                $.ajax({
                    url: url,
                    method: 'get', // Assuming a POST request
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // CSRF token for Laravel
                    },

                    success: function(result) {
                        if (result.status === 1) {
                            button.find('i').removeClass('text-dark').addClass('text-danger');
                            button.attr('data-original-title', 'حذف از علاقه مندی').tooltip(
                                'show');
                        } else if (result.status === 2) {
                            button.find('i').removeClass('text-danger').addClass('text-dark');
                            button.attr('data-original-title', 'افزودن به علاقه مندی').tooltip(
                                'show');
                        } else if (result.status === 3) {
                            $('.toast').toast('show');
                        }
                    },
                    error: function() {
                        console.error('An error occurred while processing the request.');
                    }
                });
            });
        });
    </script>
@endsection
