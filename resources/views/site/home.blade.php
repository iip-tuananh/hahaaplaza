@extends('site.layouts.master')
@section('title')
    {{ $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection
@section('css')
@endsection
@section('content')
<div class="ot-hero-wrapper hero-2" id="hero">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-xl-9" style="padding: 0;">
                <div class="swiper ot-slider hero-slider2" id="heroSlider2"
                    data-slider-options='{"effect":"fade","autoHeight":true}'>
                    <div class="swiper-wrapper">
                        @foreach($banners as $banner)
                            <div class="swiper-slide swiper-slide-active">
                                <div class="hero-inner">
                                    <div class="hero-wrap2">
                                        <img class="w-100" src="{{ $banner->image->path }}"
                                            alt="{{ $banner->name }}" loading="lazy">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="mt-30">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-3 col-sm-6 col-6" data-cue="slideInUp">
                <div class="feature-list" data-theme-color="#00BBAE">
                    <div class="box-icon"><img src="/site/img/feature-icon1-1.svg" alt="icon"></div>
                    <div class="media-body">
                        <h3 class="box-title">Giao hàng nhanh chóng</h3>
                        <p class="box-text">Tốc độ giao hàng trong ngày</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6" data-cue="slideInUp">
                <div class="feature-list" data-theme-color="#C062D0">
                    <div class="box-icon"><img src="/site/img/feature-icon1-2.svg" alt="icon"></div>
                    <div class="media-body">
                        <h3 class="box-title">Thanh toán an toàn</h3>
                        <p class="box-text">Bảo mật thanh toán thông minh</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6" data-cue="slideInUp">
                <div class="feature-list" data-theme-color="#71D863">
                    <div class="box-icon"><img src="/site/img/feature-icon1-3.svg" alt="icon"></div>
                    <div class="media-body">
                        <h3 class="box-title">Chăm sóc khách hàng</h3>
                        <p class="box-text">Luôn luôn hỗ trợ khách hàng</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6" data-cue="slideInUp">
                <div class="feature-list" data-theme-color="#16C4E3">
                    <div class="box-icon"><img src="/site/img/feature-icon1-4.svg" alt="icon"></div>
                    <div class="media-body">
                        <h3 class="box-title">Nhiều mã giảm giá</h3>
                        <p class="box-text">Liên tục giảm giá ưu đãi lớn</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="space">
    <div class="container z-index-common">
        <div class="row gy-30 justify-content-center">
            @foreach($smallBanners as $banner)
            <div class="col-xl-3 col-lg-6 col-6">
                <div class="offer-card mega-hover" data-cue="slideInUp">
                    <a href="{{ $banner->link }}" title="{{ $banner->name }}">
                        <img src="{{$banner->image->path}}" alt="{{$banner->name}}" loading="lazy">
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="space-bottom">
    <div class="container">
        <div class="row justify-content-md-between justify-content-center text-center text-md-start">
            <div class="col-sm-auto">
                <div class="title-area">
                    <h2 class="sec-title" data-cue="slideInUp">{{ $categorySpecialFlashsale->name }}</h2>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="sec-btn">
                    <ul class="counter-list deal-counter" data-offer-date="{{date('m/d/Y', strtotime($categorySpecialFlashsale->end_date))}}">
                        <li data-cue="slideInUp">
                            <div>
                                <div class="day count-number">00</div>
                                <span class="count-name">Days</span>
                            </div>
                        </li>
                        <li data-cue="slideInUp">
                            <div>
                                <div class="hour count-number">00</div>
                                <span class="count-name">Hrs</span>
                            </div>
                        </li>
                        <li data-cue="slideInUp">
                            <div>
                                <div class="minute count-number">00</div>
                                <span class="count-name">Mins</span>
                            </div>
                        </li>
                        <li data-cue="slideInUp">
                            <div>
                                <div class="seconds count-number">00</div>
                                <span class="count-name">Secs</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="slider-area slider-drag-wrap">
            <div class="swiper" id="productGridSlider1">
                <div class="swiper-wrapper">
                    @foreach($categorySpecialFlashsale->products as $product)
                    <div class="swiper-slide">
                        @include('site.products.product_item', ['product' => $product])
                    </div>
                    @endforeach
                </div>
                <div class="slider-prev"><i class="fa-light fa-arrow-left"></i></div>
                <div class="slider-next"><i class="fa-light fa-arrow-right"></i></div>
            </div>
        </div>
    </div>
</section>
<section class="space bg-smoke3">
    <div class="container">
        <div class="row justify-content-xl-between justify-content-center align-items-center">
            <div class="col-xxl-4 col-lg-6 col-md-8">
                <div class="title-area text-xl-start text-center">
                    <h2 class="sec-title" data-cue="slideInUp">Sản phẩm nổi bật</h2>
                </div>
            </div>
            <div class="col-xl-auto">
                <div class="sec-btn">
                    <div class="filter-menu indicator-active filter-menu-active justify-content-center">
                        <button data-filter="all" class="link-btn tab-btn active" type="button"
                            data-cue="slideInUp">Tất Cả</button>
                        @foreach($productCategories as $category)
                        <button data-filter="{{ $category->slug }}" class="link-btn tab-btn" type="button"
                            data-cue="slideInUp">{{ $category->name }}</button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-area slider-drag-wrap">
            <div id="productGridSlider2" class="swiper">
                <div class="swiper-wrapper">
                    @foreach($listProducts as $product)
                    <div class="swiper-slide">
                        @include('site.products.product_item', ['product' => $product])
                    </div>
                    @endforeach
                </div>
                <div class="slider-prev"><i class="fa-light fa-arrow-left"></i></div>
                <div class="slider-next"><i class="fa-light fa-arrow-right"></i></div>
            </div>
        </div>
    </div>
</section>
@foreach($categorySpecial as $category)
<section class="space overflow-hidden ">
    <div class="container">
        <div class="row justify-content-md-between justify-content-center align-items-center">
            <div class="col-xl-4 col-lg-6 col-md-8">
                <div class="title-area text-md-start text-center">
                    <h2 class="sec-title" data-cue="slideInUp">{{$category->name}}</h2>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="sec-btn mb-30" data-cue="slideInUp"><a href="{{route('front.show-product-category', $category->slug)}}" class="ot-btn style10">Xem
                        Thêm<i class="fas fa-arrow-right ms-2"></i></a></div>
            </div>
        </div>
        <div class="row flex-row-reverse gy-30 justify-content-center">
            <div class="col-xxl-8">
                <div id="productGridSlider3" class="swiper">
                    <div class="swiper-wrapper">
                        {{-- <div class="row gy-30"> --}}
                            @foreach($category->products as $product)
                            <div class="swiper-slide">
                                @include('site.products.product_item', ['product' => $product])
                            </div>
                            @endforeach
                        {{-- </div> --}}
                    </div>
                    <div class="slider-prev"><i class="fa-light fa-arrow-left"></i></div>
                    <div class="slider-next"><i class="fa-light fa-arrow-right"></i></div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-6 col-lg-8"><a href="javascript:void(0);" class="ad-card"><img class="w-100"
                        src="{{ $category->image ? $category->image->path : '' }}" alt="img" loading="lazy"></a></div>
        </div>
    </div>
</section>
@endforeach
{{-- <section class="" data-bg-src="/site/img/cta_bg_4_1.webp">
    <div class="container">
        <div class="cta-box2 position-relative">
            <div class="body-particle" id="cta-particle"></div>
            <div class="row gy-40 align-items-center">
                <div class="col-xl-6">
                    <div class="box-content text-xl-start text-center">
                        <div class="title-area mb-30">
                            <h2 class="sec-title text-white" data-cue="slideInUp">Giảm giá 20% cho tất cả<br
                                    class="d-lg-block d-none">Sản phẩm trẻ em</h2>
                        </div>
                        <a href="" class="ot-btn style-white" data-cue="slideInUp"
                            data-delay="100">Xem Ngay<i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="cta-thumb2-1 text-xl-end text-center" data-cue="slideInUp" data-delay="100">
                        <img src="/site/img/cta-thumb4-1.webp" alt="img"></div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<div class="space-top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4">
                <div class="title-area text-center">
                    <h2 class="sec-title" data-cue="slideInUp">Đối Tác</h2>
                </div>
            </div>
        </div>
        <div class="swiper ot-slider" id="blogSlider1"
            data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"425":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}}'>
            <div class="swiper-wrapper">
                @foreach($partners as $partner)
                <div class="swiper-slide">
                    <a target="_blank" href="{{$partner->link}}" data-cue="slideInUp" class="brand-card2"
                        data-theme-color="#E4F4FF">
                        <img src="{{$partner->image->path}}" alt="{{$partner->name}}" loading="lazy">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@if ($categorySpecialPost->count() > 0)
@foreach ($categorySpecialPost as $category)
<section class="space">
    <div class="container">
        <div class="row justify-content-md-between justify-content-center align-items-center">
            <div class="col-xxl-4 col-lg-6 col-md-8">
                <div class="title-area text-md-start text-center">
                    <h2 class="sec-title" data-cue="slideInUp">{{$category->name}}</h2>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="sec-btn mb-30" data-cue="slideInUp"><a href="javascript:void(0)" class="ot-btn style10">Xem
                        Thêm<i class="fas fa-arrow-right ms-2"></i></a></div>
            </div>
        </div>
        <div class="row gy-4 justify-content-center">
            @foreach ($category->posts as $post)
            <div class="col-xxl-3 col-xl-4 col-md-6">
                <div class="blog-card style2" data-cue="slideInUp">
                    <div class="blog-img"><img src="{{$post->image ? $post->image->path : ''}}" alt="{{$post->name}}"> <span
                            class="blog-tag">{{$post->category->name}}</span></div>
                    <div class="blog-content">
                        <div class="blog-meta"><a href="javascript:void(0)"><i class="far fa-calendar-days"></i>{{date('d/m/Y', strtotime($post->created_at))}}</a> <a href="javascript:void(0)"><i class="far fa-user"></i>By Admin</a></div>
                        <h3 class="box-title"><a href="{{route('front.detail-blog', $post->slug)}}">{{$post->name}}</a></h3>
                        <a href="{{route('front.detail-blog', $post->slug)}}" class="link-btn">Đọc tiếp<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endforeach
@endif
@endsection
@push('script')
<script>
    const productGridSlider1 = new Swiper('#productGridSlider1', {
        slidesPerView: 5, // Số lượng slide hiển thị cùng lúc
        spaceBetween: 30, // Khoảng cách giữa các slide
        // loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            1400: {
                slidesPerView: 5,
            },
            1200: {
                slidesPerView: 4,
            },
            992: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 2,
            },
            600: {
                slidesPerView: 1,
            },
            0: {
                slidesPerView: 1,
            },
        },
        navigation: {
            nextEl: '.slider-next',
            prevEl: '.slider-prev',
        },
    });
    const productGridSlider2 = new Swiper('#productGridSlider2', {
        slidesPerView: 4, // Số lượng slide hiển thị cùng lúc

        spaceBetween: 30, // Khoảng cách giữa các slide
        breakpoints: {
            1400: {
                slidesPerView: 4,
                grid: {
                    rows: 2,
                    fill: 'row',
                },
            },
            1200: {
                slidesPerView: 3,
                grid: {
                    rows: 2,
                    fill: 'row',
                },
            },
            992: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row',
                },
            },
            768: {
                slidesPerView: 2,
            },
            600: {
                slidesPerView: 1,
            },
            0: {
                slidesPerView: 1,
            },
        },
        navigation: {
            nextEl: '.slider-next',
            prevEl: '.slider-prev',
        },
    });
    const productGridSlider3 = new Swiper('#productGridSlider3', {
        slidesPerView: 3, // Số lượng slide hiển thị cùng lúc

        spaceBetween: 20, // Khoảng cách giữa các slide
        breakpoints: {
            1400: {
                slidesPerView: 3,
                grid: {
                    rows: 2,
                    fill: 'row',
                },
            },
            1200: {
                slidesPerView: 3,
                grid: {
                    rows: 2,
                    fill: 'row',
                },
            },
            992: {
                slidesPerView: 2,
                grid: {
                    rows: 2,
                    fill: 'row',
                },
            },
            768: {
                slidesPerView: 2,
            },
            600: {
                slidesPerView: 1,
            },
            0: {
                slidesPerView: 1,
            },
        },
        navigation: {
            nextEl: '.slider-next',
            prevEl: '.slider-prev',
        },
    });
    $('.bg-smoke3 .filter-menu .tab-btn').click(function() {
        const filter = $(this).data('filter');
        productGridSlider2.destroy(true, true);
        $('.bg-smoke3 .filter-menu .tab-btn').removeClass('active');
        $(this).addClass('active');
        $.ajax({
            url: "{{route('front.load-product-home-page')}}",
            type: 'GET',
            data: {filter: filter},
            success: function(response) {
                $('#productGridSlider2').html(response.html);
                const productGridSlider2 = new Swiper('#productGridSlider2', {
                    slidesPerView: 4, // Số lượng slide hiển thị cùng lúc
                    grid: {
                        rows: 2,
                        fill: 'row',
                    },
                    spaceBetween: 30, // Khoảng cách giữa các slide
                    navigation: {
                        nextEl: '.slider-next',
                        prevEl: '.slider-prev',
                    },
                });
                // $('#productGridSlider2 .product-grid').attr('data-show', true);
            }
        });
    });
    $('.category-menu').on('open-category', function() {
        setTimeout(function() {
            $('.category-menu').removeClass('close-category');
            $('.category-menu').addClass('open-category');
        }, 100);
    });
</script>
@endpush
