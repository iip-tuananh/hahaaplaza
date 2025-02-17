@extends('site.layouts.master')
@section('title')
    {{ $product->name }}
@endsection
@section('description')
    {{ $product->short_des }}
@endsection

@section('css')
<style>
    .gallery-top {
    position: relative;
    margin-bottom: 10px;
    display: block
}

.gallery-top .swiper-slide {
    padding-bottom: 100%;
    display: block;
    height: 0
}

.gallery-top .swiper-slide img {
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    max-width: 99%;
    max-height: 90%;
    width: auto !important;
    height: auto !important;
    position: absolute
}
.gallery-thumbs {
    margin-top: 10px !important;
    position: relative;
    display: block;
    padding: 0px 2px
}

.gallery-thumbs .swiper-slide {
    border: 1px solid #ebebeb;
    cursor: pointer;
    background: #fff
}

.gallery-thumbs .swiper-slide .p-100 {
    padding-bottom: 100%;
    height: 0;
    position: relative
}

.gallery-thumbs .swiper-slide .p-100 img {
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    max-width: 100%;
    max-height: 100%;
    width: auto !important;
    height: auto !important;
    position: absolute
}

.gallery-thumbs .swiper-slide.swiper-slide-thumb-active {
    border-color: #0974ba;
    overflow: hidden
}

.gallery-thumbs .swiper-slide:hover {
    border-color: #0974ba
}

.gallery-thumbs .swiper-button-next {
    right: 0px
}

.gallery-thumbs .swiper-button-prev {
    left: 0px
}

.gallery-thumbs .swiper-button-next,.gallery-thumbs .swiper-button-prev {
    background: transparent
}

.gallery-thumbs .swiper-button-next:after,.gallery-thumbs .swiper-button-prev:after {
    font-size: 14px;
    font-weight: bold;
    background: #fff;
    padding: 8px 5px;
    color: #333;
    box-shadow: 0 1px 2px 2px rgba(0,0,0,0.04)
}

.gallery-thumbs .swiper-button-next:hover:after,.gallery-thumbs .swiper-button-prev:hover:after {
    color: #0974ba
}

.gallery-thumbs .swiper-button-next.swiper-button-disabled,.gallery-thumbs .swiper-button-prev.swiper-button-disabled {
    display: none
}
</style>
@endsection

@section('content')
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('site/img/breadcrumb-bg.webp') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title" data-cue="slideInUp">{{$product->name}}</h1>
                <ul class="breadcumb-menu">
                    <li data-cue="slideInUp" data-delay="100"><a href="{{route('front.home-page')}}">Trang chủ</a></li>
                    <li data-cue="slideInUp" data-delay="100"><a href="{{ route('front.show-product-category', $product->category->slug) }}">{{ $product->category->name }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="product-details mt-50 space-extra-bottom" ng-controller="ProductDetailController">
        <div class="container">
            <div class="row gx-60 gy-50">
                <div class="col-lg-6">
                    <div class="product-big-img">
                        {{-- <div class="img"><img src="{{ $product->image->path }}" alt="{{ $product->name }}"></div> --}}
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper" id="lightgallery">
                                @foreach ($product->galleries as $item)
                                <a class="swiper-slide" data-hash="0"
                                    href="{{ $item->image->path }}"
                                    title="Click để xem">
                                    <img height="480" width="480"
                                        src="{{ $item->image->path }}"
                                        alt="{{ $product->name }}"
                                        data-image="{{ $item->image->path }}"
                                        class="img-responsive mx-auto d-block swiper-lazy" />
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            @foreach ($product->galleries as $item)
                            <div class="swiper-slide" data-hash="0">
                                <div class="p-100">
                                    <img height="80" width="80"
                                        src="{{ $item->image->path }}"
                                        alt="{{ $product->name }}"
                                        data-image="{{ $item->image->path }}"
                                        class="swiper-lazy" />
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="col-xxl-6 align-self-center">
                    <div class="product-about">
                        <h2 class="product-title" data-cue="slideInUp">{{$product->name}}</h2>
                        <div class="product-rating" data-cue="slideInUp">
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span
                                    style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span
                                        class="rating">1</span> customer rating</span></div>
                            <a href="shop-details.html" class="woocommerce-review-link">(<span class="count"></span>
                                đánh giá sản phẩm)</a>
                        </div>
                        <div class="text" data-cue="slideInUp">
                            {!! $product->intro !!}
                        </div>
                        @if ($product->base_price > 0)
                            <p class="price" data-cue="slideInUp">{{ formatCurrency($product->price) }}₫<del>{{ formatCurrency($product->base_price) }}₫</del></p>
                        @else
                            <p class="price" data-cue="slideInUp">{{ formatCurrency($product->price) }}₫</p>
                        @endif
                        @if(isset($product->attributes) && count($product->attributes) > 0)
                        <div class="product-option" data-cue="slideInUp">
                            @foreach ($product->attributes as $index => $attribute)
                                <div class="product-size-wrap product-attribute-values">
                                    <div class="product-option-title">{{ $attribute['name'] }}:</div>
                                    @foreach ($attribute['values'] as $value)
                                        <a href="javascript:void(0)" class="value" data-value="{{ $value }}" data-name="{{ $attribute['name'] }}" data-index="{{ $index }}">{{ $value }}</a>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        @endif
                        <div class="actions">
                            <div class="quantity" data-cue="slideInUp">
                                <button class="qty-btn" onclick="minusQuantity()">
                                    <i class="far fa-minus"></i>
                                </button>
                                <input type="number" class="qty-input"
                                    step="1" min="1" max="100" name="quantity" ng-model="form.quantity"
                                    title="Qty">
                                <button class="qty-btn" onclick="plusQuantity()">
                                    <i class="far fa-plus"></i>
                                </button>
                            </div>
                            <button class="ot-btn" data-cue="slideInUp" ng-click="addToCartFromProductDetail()">
                                <i class="fa-light fa-basket-shopping me-1"></i> Thêm vào giỏ hàng
                            </button>
                        </div>
                        <div class="product_meta" data-cue="slideInUp">
                            <span class="posted_in">Danh mục: <a href="{{ route('front.show-product-category', $product->category->slug) }}">{{ $product->category->name }}</a></span>
                            @if(isset($productTags) && count($productTags) > 0)
                            <span>Tags:
                                @foreach ($productTags as $tag)
                                    <a href="{{ route('front.search').'?tag='.$tag }}">{{ $tag }}</a>
                                @endforeach
                            </span>
                            @endif
                            {{-- <span class="posted_in">Nguồn gốc: <a href="javascript:void(0)">{{ $product->origin }}</a></span> --}}
                        </div>
                        {{-- <div class="checklist-wrap" data-cue="slideInUp">
                            <div class="row gy-2">
                                <div class="col-lg-5">
                                    <div class="check-list">
                                        <ul>
                                            <li><i class="fas fa-check"></i> Free shipping orders from $150</li>
                                            <li><i class="fas fa-check"></i> 30 days exchange & return</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="check-list">
                                        <ul>
                                            <li><i class="fas fa-check"></i> Babymart Flash Discount: Starting at 30% Off
                                            </li>
                                            <li><i class="fas fa-check"></i> Safe & Secure online shopping</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <ul class="nav product-tab-style1" id="productTab" role="tablist">
                <li class="nav-item" role="presentation" data-cue="slideInUp"><a class="nav-link" id="description-tab"
                        data-bs-toggle="tab" href="#description" role="tab" aria-controls="description"
                        aria-selected="false">Chi tiết sản phẩm</a></li>
                {{-- <li class="nav-item" role="presentation" data-cue="slideInUp"><a class="nav-link" id="information-tab"
                        data-bs-toggle="tab" href="#information" role="tab" aria-controls="information"
                        aria-selected="false">Additional Information</a></li>
                <li class="nav-item" role="presentation" data-cue="slideInUp"><a class="nav-link active"
                        id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                        aria-selected="true">Reviews (1)</a></li> --}}
            </ul>
            <div class="tab-content" id="productTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    {!! $product->body !!}
                </div>
                {{-- <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab">
                    <table class="woocommerce-table mb-0">
                        <tbody>
                            <tr>
                                <th>Weight</th>
                                <td>15 kg</td>
                            </tr>
                            <tr>
                                <th>Dimensions</th>
                                <td>30 × 32 × 46 cm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade " id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="woocommerce-Reviews">
                        <div class="ot-comments-wrap">
                            <ul class="comment-list">
                                <li class="review ot-comment-item">
                                    <div class="ot-post-comment">
                                        <div class="comment-avater"><img src="assets/img/blog/comment-author-5.jpg"
                                                alt="Comment Author"></div>
                                        <div class="comment-content">
                                            <h4 class="name">Leslie Alexander</h4>
                                            <span class="commented-on">February 10, 2024 at 2:37 pm</span>
                                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                <span style="width:100%">Rated <strong class="rating">5.00</strong> out of
                                                    5 based on <span class="rating">1</span> customer rating</span></div>
                                            <p class="text">Neque porro est qui dolorem ipsum quia quaed inventor
                                                veritatis et quasi architecto var sed efficitur turpis gilla sed sit amet
                                                finibus eros. Lorem Ipsum is simply dummy</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="ot-comment-form">
                            <div class="form-title">
                                <h5 class="blog-inner-title">Add a review</h5>
                            </div>
                            <div class="row gy-30">
                                <div class="col-12 form-group rating-select d-flex align-items-center">
                                    <label>Your Rating</label>
                                    <p class="stars"><span><a class="star-1" href="#">1</a> <a class="star-2"
                                                href="#">2</a> <a class="star-3" href="#">3</a> <a
                                                class="star-4" href="#">4</a> <a class="star-5"
                                                href="#">5</a></span></p>
                                </div>
                                <div class="col-md-6 form-group"><label>Your Name*</label> <input type="text"
                                        placeholder="Your Name" class="form-control"></div>
                                <div class="col-md-6 form-group"><label>Your Email*</label> <input type="text"
                                        placeholder="Your Email" class="form-control"></div>
                                <div class="col-12 form-group"><label>Message*</label>
                                    <textarea placeholder="Write a Message" class="form-control"></textarea>
                                </div>
                                <div class="col-12 form-group"><input id="reviewcheck" name="reviewcheck"
                                        type="checkbox"> <label for="reviewcheck">I Accept Your Terms & Conditions<span
                                            class="checkmark"></span></label></div>
                                <div class="col-12 form-group mb-0"><button class="ot-btn">Submit Now</button></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="space-top mb-30">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-4">
                        <div class="title-area text-center">
                            <h2 class="sec-title">Sản phẩm liên quan</h2>
                        </div>
                    </div>
                </div>
                <div class="swiper ot-slider has-shadow" id="productSlider1"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1400":{"slidesPerView":"5"}}}'>
                    <div class="swiper-wrapper">
                        @foreach ($productsRelated as $item)
                        <div class="swiper-slide">
                            @include('site.products.product_item', ['product' => $item])
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 4,
            slidesPerView: 10,
            freeMode: true,
            lazy: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            hashNavigation: true,
            slideToClickedSlide: true,
            breakpoints: {
                260: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                300: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                500: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                1199: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
            },
            navigation: {
                nextEl: '.gallery-thumbs .swiper-button-next',
                prevEl: '.gallery-thumbs .swiper-button-prev',
            },
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 0,
            lazy: true,
            hashNavigation: true,
            thumbs: {
                swiper: galleryThumbs
            }
        });
        // Plus number quantiy product detail
        var plusQuantity = function() {
            if (jQuery('input[name="quantity"]').val() != undefined) {
                var currentVal = parseInt(jQuery('input[name="quantity"]').val());
                if (!isNaN(currentVal)) {
                    jQuery('input[name="quantity"]').val(currentVal + 1);
                } else {
                    jQuery('input[name="quantity"]').val(1);
                }
            } else {
                console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
            }
        }
        // Minus number quantiy product detail
        var minusQuantity = function() {
            if (jQuery('input[name="quantity"]').val() != undefined) {
                var currentVal = parseInt(jQuery('input[name="quantity"]').val());
                if (!isNaN(currentVal) && currentVal > 1) {
                    jQuery('input[name="quantity"]').val(currentVal - 1);
                }
            } else {
                console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
            }
        }
        app.controller('ProductDetailController', function($scope, $http, $interval, cartItemSync, $rootScope, $compile) {
            $scope.product = @json($product);
            $scope.form = {
                quantity: 1
            };

            $scope.selectedAttributes = [];
            jQuery('.product-attribute-values a.value').click(function() {
                if (!jQuery(this).hasClass('active')) {
                    jQuery(this).parent().find('.value').removeClass('active');
                    jQuery(this).addClass('active');
                    if ($scope.selectedAttributes.length > 0 && $scope.selectedAttributes.find(item => item
                            .index == jQuery(this).data('index'))) {
                        $scope.selectedAttributes.find(item => item.index == jQuery(this).data('index'))
                            .value = jQuery(this).data('value');
                    } else {
                        let index = jQuery(this).data('index');
                        $scope.selectedAttributes.push({
                            index: index,
                            name: jQuery(this).data('name'),
                            value: jQuery(this).data('value'),
                        });
                    }
                } else {
                    jQuery(this).parent().find('.value').removeClass('active');
                    jQuery(this).removeClass('active');
                    $scope.selectedAttributes = $scope.selectedAttributes.filter(item => item.index !=
                        jQuery(this).data('index'));
                }
                $scope.$apply();
                console.log($scope.selectedAttributes);
            });

            $scope.addToCartFromProductDetail = function() {
                let quantity = $('input[name="quantity"]').val();
                url = "{{ route('cart.add.item', ['productId' => 'productId']) }}";
                url = url.replace('productId', $scope.product.id);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'qty': parseInt(quantity),
                        'attributes': $scope.selectedAttributes
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.count > 0) {
                                $scope.hasItemInCart = true;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);
                            toastr.success('Thêm vào giỏ hàng thành công !')
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.addToCartCheckoutFromProductDetail = function() {
                let quantity = $('input[name="quantity"]').val();
                url = "{{ route('cart.add.item', ['productId' => 'productId']) }}";
                url = url.replace('productId', $scope.product.id);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'qty': parseInt(quantity),
                        'attributes': $scope.selectedAttributes
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.count > 0) {
                                $scope.hasItemInCart = true;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);
                            toastr.success('Thêm vào giỏ hàng thành công !')
                            window.location.href = "{{ route('cart.index') }}";
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }
        });
    </script>
@endpush
