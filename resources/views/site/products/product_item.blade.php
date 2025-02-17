<div class="ot-product product-grid style2" data-cue="slideInUp">
    <div class="product-img">
        <img src="{{ $product->image->path }}" alt="{{ $product->name }}" loading="lazy">
        @if ($product->base_price > 0)
        <span class="product-tag">-{{ round((($product->base_price - $product->price) / $product->base_price) * 100) }}%</span>
        @endif
        <div class="actions">
            {{-- <a href="" class="icon-btn">
                <i class="far fa-heart"></i>
            </a>
            <button class="icon-btn">
                <i class="fa-light fa-arrows-cross"></i>
            </button> --}}
            <a href="#QuickView" ng-click="showQuickView({{ $product->id }})"
                class="icon-btn popup-content">
                <i class="far fa-eye"></i>
            </a>
        </div>
    </div>
    <div class="product-content">
        <h3 class="box-title"><a href="{{route('front.show-product-detail', $product->slug)}}">{{ $product->name }}</a></h3>
        @if ($product->base_price > 0)
        <span class="price">{{formatCurrency($product->price)}}đ <del>{{formatCurrency($product->base_price)}}đ</del></span>
        @else
        <span class="price">{{formatCurrency($product->price)}}đ</span>
        @endif
        <div class="woocommerce-product-rating">
            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span
                        class="rating">1</span> customer rating</span></div>
        </div>
        <a class="ot-btn style7" href="javascript:void(0)" ng-click="addToCart({{ $product->id }})">
            <i class="fa-light fa-basket-shopping me-1"></i> Thêm giỏ hàng
        </a>
    </div>
</div>
