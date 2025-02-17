@extends('site.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('description')
    {{ $short_des }}
@endsection
@section('css')
@endsection

@section('content')
    <div class="breadcumb-wrapper" data-bg-src="{{asset('site/img/breadcrumb-bg.webp')}}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title" data-cue="slideInUp">{{$title}}</h1>
                <ul class="breadcumb-menu">
                    <li data-cue="slideInUp" data-delay="100"><a href="{{route('front.home-page')}}">Trang chủ</a></li>
                    <li data-cue="slideInUp" data-delay="100">{{$title_sub ?? $title}}</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="mt-50 space-extra-bottom" id="blog-sec">
        <div class="container">
            <div class="row justify-content-center flex-row-reverse">
                <div class="col-xl-9 col-lg-8">
                    <div class="ot-sort-bar">
                        <div class="row justify-content-md-between justify-content-center align-items-center">
                            <div class="col-auto">
                                <p class="woocommerce-result-count">Hiển thị <span class="count-product">{{$products->count()}}</span> trong <span class="count-product">{{$products->total()}}</span> kết quả</p>
                            </div>
                            <div class="col-auto">
                                <div class="sort-bar-ordering-wrap">
                                    <form class="woocommerce-ordering" method="get">
                                        <select name="orderby" class="orderby" aria-label="Shop order">
                                            <option value="menu_order" selected="selected">Mặc định</option>
                                            <option value="date">Sắp xếp theo mới nhất</option>
                                            <option value="price">Sắp xếp theo giá: thấp đến cao</option>
                                            <option value="price-desc">Sắp xếp theo giá: cao đến thấp</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="tab-grid" role="tabpanel"
                            aria-labelledby="tab-shop-grid">
                            <div class="row gy-30">
                                @foreach ($products as $product)
                                <div class="col-xxl-3 col-md-6">
                                    @include('site.products.product_item', ['product' => $product])
                                </div>
                                @endforeach
                            </div>
                            <div class="ot-pagination text-center mt-40">
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 sidebar-wrap">
                    <aside class="sidebar-area">
                        <div class="widget widget_categories2" data-cue="slideInUp">
                            <h3 class="widget_title">Danh mục sản phẩm</h3>
                            <ul>
                                @foreach ($categories as $category)
                                @php
                                    $count = $category->products->count();
                                    if($category->childs->count() > 0) {
                                        foreach($category->childs as $child) {
                                            if($child->childs->count() > 0) {
                                                foreach($child->childs as $child2) {
                                                    $count += $child2->products->count();
                                                }
                                            } else {
                                                $count += $child->products->count();
                                            }
                                        }
                                    }
                                @endphp
                                <li><input id="cat-check1" name="cat-check1" type="checkbox" checked="checked"> <label
                                        for="cat-check1">{{$category->name}} <span class="checkmark"></span></label> <span
                                        class="category-number">({{$count}})</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget widget_price_filter" data-cue="slideInUp">
                            <h4 class="widget_title">Lọc theo giá</h4>
                            <div class="price_slider_wrapper">
                                <div class="price_slider"></div>
                                <div class="price_label">Giá: <span class="from">0đ</span> - <span
                                        class="to">70đ</span> <button type="submit"
                                        class="button ot-btn">Lọc</button></div>
                            </div>
                        </div>
                        {{-- <div class="widget widget_categories2" data-cue="slideInUp">
                            <h3 class="widget_title">Shop By Age</h3>
                            <ul>
                                <li><input id="age-check1" name="age-check1" type="checkbox" checked="checked"> <label
                                        for="age-check1">0-3 years <span class="checkmark"></span></label> <span
                                        class="category-number">(16)</span></li>
                                <li><input id="age-check2" name="age-check2" type="checkbox"> <label
                                        for="age-check2">4-5 years <span class="checkmark"></span></label> <span
                                        class="category-number">(20)</span></li>
                                <li><input id="age-check3" name="age-check3" type="checkbox"> <label
                                        for="age-check3">6-7 years<span class="checkmark"></span></label> <span
                                        class="category-number">(14)</span></li>
                                <li><input id="age-check4" name="age-check4" type="checkbox"> <label
                                        for="age-check4">8-9 years <span class="checkmark"></span></label> <span
                                        class="category-number">(12)</span></li>
                                <li><input id="age-check5" name="age-check5" type="checkbox"> <label
                                        for="age-check5">10-11 years <span class="checkmark"></span></label> <span
                                        class="category-number">(7)</span></li>
                                <li><input id="age-check6" name="age-check6" type="checkbox"> <label
                                        for="age-check6">12+ years <span class="checkmark"></span></label> <span
                                        class="category-number">(5)</span></li>
                            </ul>
                        </div>
                        <div class="widget widget_categories2" data-cue="slideInUp">
                            <h3 class="widget_title">Shop By Size</h3>
                            <div class="widget-size-wrap"><a href="#">XL</a> <a href="#">M</a> <a
                                    href="#">L</a> <a href="#">S</a> <a href="#">XS</a></div>
                        </div>
                        <div class="widget widget_categories2" data-cue="slideInUp">
                            <h3 class="widget_title">Shop By Rating</h3>
                            <ul>
                                <li class="product-rating"><input id="rating-check1" name="rating-check1"
                                        type="checkbox" checked="checked"> <label for="rating-check1"><span
                                            class="rating"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                                class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                                class="fas fa-star"></i> </span>5 only <span
                                            class="checkmark"></span></label></li>
                                <li class="product-rating"><input id="rating-check2" name="rating-check2"
                                        type="checkbox"> <label for="rating-check2"><span class="rating"><i
                                                class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                                class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                                class="far fa-star"></i> </span>4 & up <span
                                            class="checkmark"></span></label></li>
                                <li class="product-rating"><input id="rating-check3" name="rating-check3"
                                        type="checkbox"> <label for="rating-check3"><span class="rating"><i
                                                class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                                class="fas fa-star"></i> <i class="far fa-star"></i> <i
                                                class="far fa-star"></i> </span>3 & up <span
                                            class="checkmark"></span></label></li>
                                <li class="product-rating"><input id="rating-check4" name="rating-check4"
                                        type="checkbox"> <label for="rating-check4"><span class="rating"><i
                                                class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                                class="far fa-star"></i> <i class="far fa-star"></i> <i
                                                class="far fa-star"></i> </span>2 & up <span
                                            class="checkmark"></span></label></li>
                                <li class="product-rating"><input id="rating-check5" name="rating-check5"
                                        type="checkbox"> <label for="rating-check5"><span class="rating"><i
                                                class="fas fa-star"></i> <i class="far fa-star"></i> <i
                                                class="far fa-star"></i> <i class="far fa-star"></i> <i
                                                class="far fa-star"></i> </span>1 & up <span
                                            class="checkmark"></span></label></li>
                            </ul>
                        </div> --}}
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
