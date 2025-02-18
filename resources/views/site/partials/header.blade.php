<div class="ot-menu-wrapper" ng-cloak>
    <div class="ot-menu-area text-center">
        <button class="ot-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo"><a href="{{ route('front.home-page') }}"><img
                    src="{{ $config->image->path ?? '' }}" alt="{{ $config->web_title }}"
                    loading="lazy"></a></div>
        <div class="ot-mobile-menu">
            <ul>
                <h4 class="mb-0">Danh mục sản phẩm</h4>
                @foreach($productCategories as $category)
                    <li class="menu-item-has-children">
                        <a href="{{ route('front.show-product-category', $category->slug) }}">{{ $category->name }} </a>
                        @if($category->childs->count() > 0)
                            <ul class="sub-menu">
                                @foreach($category->childs as $child)
                                <li><a href="{{ route('front.show-product-category', $child->slug) }}">{{ $child->name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
            <ul>
                <h4 class="mb-0 mt-3">Menu</h4>
                <li>
                    <a href="{{ route('front.home-page') }}">Trang chủ</a>
                </li>
                <li>
                    <a href="{{ route('front.about-us') }}">Giới thiệu</a>
                </li>
                @foreach($postCategories as $category)
                <li class="{{ Route::currentRouteName() == 'front.list-blog' && Route::current()->parameter('slug') == $category->slug ? 'menu-item-has-children' : '' }}">
                    <a href="{{ route('front.list-blog', $category->slug) }}">{{ $category->name }}</a>
                    @if($category->getChilds()->count() > 0)
                        <ul class="sub-menu">
                            @foreach($category->getChilds() as $child)
                            <li><a href="{{ route('front.list-blog', $child->slug) }}">{{ $child->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
                @endforeach
                <li><a href="{{ route('front.contact-us') }}">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</div>
<header class="ot-header header-layout2" ng-cloak>
    <div class="menu-top">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="header-logo"><a href="{{ route('front.home-page') }}"><img
                                src="{{ $config->image->path ?? '' }}" alt="{{ $config->web_title }}"
                                loading="lazy"></a>
                    </div>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <form action="{{ route('front.search') }}" method="get" class="header-form">
                        <div class="form-group" style="width: 64%">
                            <select name="category" id="category" class="form-select nice-select">
                                <option value="" selected="selected" disabled="disabled">Danh mục</option>
                                @foreach($productCategories as $category)
                                <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <i class="fa-sharp fa-solid fa-grid-2"></i>
                        </div>
                        <div class="form-group" style="width: 98%">
                            <input type="text" class="form-control" name="keyword" placeholder="Từ khóa tìm kiếm..">
                        </div>
                        <button type="submit" class="submit-btn simple-icon"><i
                                class="far fa-search"></i></button>
                    </form>
                </div>
                <div class="col-auto">
                    <div class="header-button">
                        <div class="call-btn d-xl-flex d-none">
                            <div class="box-icon"><i class="far fa-phone-volume"></i></div>
                            <div class="media-body">
                                <p class="box-subtitle">Chăm sóc khách hàng</p>
                                <h3 class="box-title"><a href="tel:{{ str_replace(' ', '', $config->hotline) }}">{{ $config->hotline }}</a></h3>
                            </div>
                        </div>
                        <a href="{{ route('front.client-account') }}" class="icon-btn d-sm-block">
                            @if (!empty($user_avatar))
                            <img src="{{$user_avatar}}" alt="avatar" loading="lazy" style="border-radius: 50%;">
                            @else
                            <i class="far fa-circle-user"></i>
                            @endif
                        </a>
                        <button type="button" class="icon-btn sideMenuCart"><span class="badge" ng-if="cart.count > 0"><% cart.count %></span> <i
                                class="far fa-basket-shopping"></i></button>
                        <button type="button" class="ot-menu-toggle d-block d-lg-none"><i
                                class="far fa-bars"></i></button>
                    </div>
                </div>
                <div class="col-auto d-block d-lg-none mt-2">
                    <form action="{{ route('front.search') }}" method="get" class="header-form" style="width: calc(100vw - 10%);">
                        <div class="form-group" style="width: 100%;">
                            <input type="text" class="form-control" name="keyword" placeholder="Từ khóa tìm kiếm.." style="border-left: none;">
                        </div>
                        <button type="submit" class="submit-btn simple-icon"><i
                                class="far fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-sm-between justify-content-center">
                    <div class="col-auto d-none d-xl-block">
                        <div class="category-menu-wrap">
                            <a class="menu-expand" href="#"><i class="fa-solid fa-grid-2"></i>Danh mục sản
                                phẩm <span><i class="fa-solid fa-angle-down"></i></span></a>
                            <nav class="category-menu {{ Route::currentRouteName() != 'front.home-page' ? 'close-category-other-page' : '' }}">
                                <style>
                                    .close-category-other-page {
                                        transform: scaleY(0);
                                    }
                                </style>
                                <ul>
                                    @foreach($productCategories as $category)
                                    <li class="menu-item-has-children">
                                        <a href="{{ route('front.show-product-category', $category->slug) }}">
                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                fill="currentcolor" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1_2722)">
                                                    <path
                                                        d="M7.36173 10.5566C6.58887 10.4125 2.9572 10.3862 2.0428 10.5566C1.241 10.7062 0.586816 11.3127 0.376218 12.1018C-0.125406 13.9811 -0.125406 16.0511 0.376218 17.9305C0.586816 18.7196 1.24096 19.3261 2.04284 19.4756C3.65622 19.7764 5.75284 19.7755 7.36169 19.4756C8.16353 19.3261 8.81771 18.7196 9.02831 17.9305C9.52994 16.0511 9.52994 13.9811 9.02831 12.1018C8.81771 11.3127 8.16357 10.7061 7.36173 10.5566ZM4.77254 17.1024H3.20229V12.9031H4.5084C5.45942 12.9318 6.16592 13.0224 6.20784 13.9659C6.21233 14.4114 5.99489 14.7995 5.5619 14.8735V14.9022C6.09977 15.0217 6.31002 15.3463 6.31408 15.8845C6.31045 16.741 5.60729 17.1052 4.77254 17.1024Z"
                                                        fill="currentcolor" />
                                                    <path
                                                        d="M4.64295 15.2727H4.0918V16.367H4.67163C5.10748 16.3635 5.38376 16.2334 5.38928 15.7954C5.38928 15.447 5.14056 15.2727 4.64295 15.2727ZM5.29457 14.0836C5.27675 13.6749 4.9659 13.6467 4.5597 13.6327H4.0918V14.5661H4.60851C5.01355 14.5575 5.28799 14.4934 5.29457 14.0836ZM19.6234 12.1018C19.4128 11.3127 18.7587 10.7061 17.9568 10.5566H17.9568C17.1615 10.4083 13.4333 10.4083 12.6379 10.5566C11.8361 10.7062 11.1819 11.3127 10.9713 12.1018C10.4697 13.9811 10.4697 16.0511 10.9713 17.9304C11.1819 18.7196 11.8361 19.3261 12.638 19.4756C14.2513 19.7763 16.348 19.7755 17.9568 19.4756C18.7586 19.3261 19.4128 18.7196 19.6234 17.9304C20.125 16.0511 20.125 13.9811 19.6234 12.1018ZM15.5801 16.4187C15.8747 16.4187 16.2317 16.3451 16.6508 16.1976V16.9444C15.8938 17.2729 14.6218 17.2741 14.0959 16.604C13.4873 15.9067 13.4583 14.6687 13.8491 13.861C14.3657 12.7449 15.778 12.6176 16.8086 13.1386L16.5216 13.8624C16.2247 13.7266 15.903 13.5807 15.5801 13.5838C14.1414 13.6055 14.1438 16.4187 15.5801 16.4187ZM10.001 3.43506C9.93782 3.67993 9.75688 4.28536 9.45816 5.2513H10.5524C10.2709 4.34655 10.1125 3.83485 10.0771 3.71626C10.0416 3.59767 10.0163 3.5039 10.001 3.43506Z"
                                                        fill="currentcolor" />
                                                    <path
                                                        d="M14.326 7.84188C14.8276 5.96256 14.8276 3.89256 14.326 2.0132C14.1154 1.22406 13.4613 0.617519 12.6594 0.468074C11.9373 0.333416 8.40154 0.162647 7.30132 0.477262C6.46363 0.716749 5.87047 1.27658 5.67389 2.01316C5.17226 3.89252 5.17226 5.96252 5.67389 7.84183C5.85863 8.53423 6.39628 9.04777 7.27188 9.3682C8.73269 9.9029 11.1574 9.66709 12.6594 9.38701C13.4612 9.2376 14.1155 8.63107 14.326 7.84188ZM11.0693 7.01376L10.765 6.01419H9.23491L8.93064 7.01376H7.97179L9.45303 2.79726H10.541L12.028 7.01376H11.0693Z"
                                                        fill="currentcolor" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1_2722">
                                                        <rect width="20" height="20"
                                                            fill="currentcolor" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
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
                                            {{ $category->name }} <span class="category-number">({{ $count }})</span>
                                        </a>
                                        @if($category->childs->count() > 0)
                                        <ul class="sub-menu">
                                            @foreach($category->childs as $child)
                                            <li><a href="{{ route('front.show-product-category', $child->slug) }}">{{ $child->name }}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-auto me-auto d-none d-sm-block">
                        <nav class="main-menu menu-style1 d-none d-lg-inline-block">
                            <ul>
                                <li>
                                    <a href="{{ route('front.home-page') }}">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="{{ route('front.about-us') }}">Giới thiệu</a>
                                </li>
                                @foreach($postCategories as $category)
                                <li class="{{ Route::currentRouteName() == 'front.list-blog' && Route::current()->parameter('slug') == $category->slug ? 'menu-item-has-children' : '' }}">
                                    <a href="{{ route('front.list-blog', $category->slug) }}">{{ $category->name }}</a>
                                    @if($category->getChilds()->count() > 0)
                                    <ul class="sub-menu">
                                        @foreach($category->getChilds() as $child)
                                        <li><a href="{{ route('front.list-blog', $child->slug) }}">{{ $child->name }}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                                <li><a href="{{ route('front.contact-us') }}">Liên hệ</a></li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="sidemenu-wrapper sidemenu-cart" ng-cloak>
    <div class="sidemenu-content">
        <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
        <div class="widget woocommerce widget_shopping_cart">
            <h3 class="widget_title">Giỏ hàng</h3>
            <div class="widget_shopping_cart_content" ng-if="cart.count > 0">
                <ul class="woocommerce-mini-cart cart_list product_list_widget" ng-if="cart.count > 0">
                    <li class="woocommerce-mini-cart-item mini_cart_item" ng-repeat="item in cart.items">
                        <a href="javascript:void(0)" class="remove remove_from_cart_button" ng-click='removeItem(item.id)'><i class="far fa-times"></i></a>
                        <a ng-href="/san-pham/<% item.attributes.slug %>.html">
                            <img ng-src="<% item.attributes.image %>"
                                alt="<% item.name %>" loading="lazy"><% item.name %>
                        </a>
                        <span class="quantity"><% item.quantity %> ×
                            <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol"></span><% item.price | number %>₫
                            </span>
                        </span>
                        <div class="cart_attribute">
                            <div ng-repeat="attribute in item.attributes.attributes" style="line-height: 1;">
                                <span class="cart_attribute_name" style="margin-left: 8px; font-weight: 600; font-size: 14px;"><% attribute.name %> :</span>
                                <span class="cart_attribute_value" style="font-size: 14px;"><% attribute.value %></span>
                            </div>
                        </div>
                    </li>
                </ul>
                <p class="woocommerce-mini-cart__total total"><strong>Tổng tiền:</strong> <span
                        class="woocommerce-Price-amount amount"><span
                            class="woocommerce-Price-currencySymbol"></span><% cart.total | number %>₫</span></p>
                <p class="woocommerce-mini-cart__buttons buttons">
                    <a href="{{ route('cart.index') }}" class="ot-btn wc-forward">Xem giỏ hàng</a>
                    <a href="{{ route('cart.checkout') }}" class="ot-btn checkout wc-forward">Thanh toán</a>
                </p>
            </div>
            <div class="widget_shopping_cart_content text-center" ng-if="!cart.items || cart.count == 0">
                <img width="52" height="52" src="/site/img/no-cart.png?1677998172667" loading="lazy">
                <p>Không có sản phẩm nào trong giỏ hàng của bạn</p>
            </div>
        </div>
    </div>
</div>
