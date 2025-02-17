<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('site.partials.head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/site/css/app.min.css">
    <link rel="stylesheet" href="/site/css/fontawesome.min.css">
    <link rel="stylesheet" href="/site/css/style.css">
    <link rel="stylesheet" href="/site/css/callbutton.css">
    @yield('css')
</head>

<body ng-app="App" ng-controller="AppController">
    <div id="QuickView" class="white-popup mfp-hide">
        <div class="container bg-white rounded-10">
            <div class="row gx-60">
                <div class="col-lg-6">
                    <div class="product-big-img">
                        <div class="img"><img
                                ng-src="<% quickViewProduct.image.path %>"
                                alt="<% quickViewProduct.name %>"></div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="product-about">
                        <p class="price" ng-if="quickViewProduct.base_price"><% quickViewProduct.price | number:0 %>đ<del><% quickViewProduct.base_price | number:0 %>đ</del></p>
                        <p class="price" ng-if="!quickViewProduct.base_price"><% quickViewProduct.price | number:0 %>đ</p>
                        <h2 class="product-title"><% quickViewProduct.name %></h2>
                        <div class="product-rating">
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span
                                    style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on
                                    <span class="rating">1</span> đánh giá</span></div>
                            <a href="" class="woocommerce-review-link">(<span class="count"></span> Đánh giá sản phẩm)</a>
                        </div>
                        <div class="text" ng-bind-html="quickViewProduct.intro"></div>
                        <div class="product-option" data-cue="slideInUp" ng-if="quickViewProduct.attributes">
                            <div class="product-size-wrap product-attribute-values" ng-repeat="(index, attribute) in quickViewProduct.attributes">
                                <div class="product-option-title"><% attribute.name %></div>
                                <div class="product-option-values" ng-repeat="value in attribute.values">
                                    <a href="javascript:void(0)" ng-click="selectAttribute(attribute, value, index)" class="value"><% value %></a>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <div class="quantity">
                                <button class="qty-btn" onclick="minusQuantity()">
                                    <i class="far fa-minus"></i>
                                </button>
                                <input type="number" class="qty-input"
                                    step="1" min="1" max="100" name="quantity_quickview" ng-model="quantity_quickview"
                                    title="Qty">
                                <button class="qty-btn" onclick="plusQuantity()">
                                    <i class="far fa-plus"></i>
                                </button>
                            </div>
                            <button class="ot-btn" ng-click="addToCartFromQuickView()">Thêm giỏ hàng</button>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">Danh mục: <a href="javascript:void(0)"><% quickViewProduct.category.name %></a></span>
                                <span ng-if="quickViewProduct.tags.length > 0">Tags:
                                    <a href="javascript:void(0)" ng-repeat="tag in quickViewProduct.tags"><% tag.name %></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
        </div>
    </div>
    @include('site.partials.header')
    @yield('content')
    @include('site.partials.footer')
    <script src="/site/js/jquery-3.7.1.min.js"></script>
    <script src="/site/js/app.min.js"></script>
    <script src="/site/js/particles-config.js"></script>
    <script src="/site/js/main.js"></script>
    <script src="/site/js/callbutton.js"></script>

    <!-- Angular Js -->
    <script src="{{ asset('libs/angularjs/angular.js?v=222222') }}"></script>
    <script src="{{ asset('libs/angularjs/angular-resource.js') }}"></script>
    <script src="{{ asset('libs/angularjs/sortable.js') }}"></script>
    <script src="{{ asset('libs/dnd/dnd.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular-sanitize.js"></script>
    <script src="{{ asset('libs/angularjs/select.js') }}"></script>
    <script src="{{ asset('js/angular.js') }}?version={{ env('APP_VERSION', '1') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    @stack('script')

    <script>
        // Plus number quantiy product detail
        var plusQuantity = function() {
            if (jQuery('input[name="quantity_quickview"]').val() != undefined) {
                var currentVal = parseInt(jQuery('input[name="quantity_quickview"]').val());
                if (!isNaN(currentVal)) {
                    jQuery('input[name="quantity_quickview"]').val(currentVal + 1);
                } else {
                    jQuery('input[name="quantity_quickview"]').val(1);
                }
            } else {
                console.log('error: Not see elemnt ' + jQuery('input[name="quantity_quickview"]').val());
            }
        }
        // Minus number quantiy product detail
        var minusQuantity = function() {
            if (jQuery('input[name="quantity_quickview"]').val() != undefined) {
                var currentVal = parseInt(jQuery('input[name="quantity_quickview"]').val());
                if (!isNaN(currentVal) && currentVal > 1) {
                    jQuery('input[name="quantity_quickview"]').val(currentVal - 1);
                }
            } else {
                console.log('error: Not see elemnt ' + jQuery('input[name="quantity_quickview"]').val());
            }
        }
        app.controller('AppController', function($rootScope, $scope, cartItemSync, $interval, $compile){
            $scope.currentUser = @json(Auth::guard('client')->user());
            $scope.isAdminClient = @json(Auth::guard('client')->check());
            // $scope.showMenuAdminClient = localStorage.getItem('showMenuAdminClient') ? localStorage.getItem('showMenuAdminClient') : false;

            // const currentUrl = window.location.href;
            // if (currentUrl != "{{route('front.client-account')}}" && currentUrl != "{{route('front.user-order')}}" && currentUrl != "{{route('front.user-revenue')}}" && currentUrl != "{{route('front.user-level')}}") {
            //     $scope.showMenuAdminClient = false;
            //     localStorage.removeItem('showMenuAdminClient');
            // }

            // $scope.changeMenuClient = function($event, url){
            //     $event.preventDefault();
            //     $scope.showMenuAdminClient = !$scope.showMenuAdminClient;
            //     if(url == '{{route('front.user-order')}}' || url == '{{route('front.user-revenue')}}' || url == '{{route('front.user-level')}}') {
            //         $scope.showMenuAdminClient = true;
            //     }

            //     if($scope.showMenuAdminClient){
            //         localStorage.setItem('showMenuAdminClient', $scope.showMenuAdminClient);
            //         window.location.href = url;
            //     }else{
            //         localStorage.removeItem('showMenuAdminClient');
            //         window.location.href = '{{ route('front.home-page') }}';
            //     }
            // }

            // Biên dịch lại nội dung bên trong container
            var container = angular.element(document.getElementsByClassName('item_product_main'));
            $compile(container.contents())($scope);

            // var quickView = angular.element(document.getElementById('QuickView'));
            // $compile(quickView.contents())($scope);

            var popup = angular.element(document.getElementById('popup-cart-mobile'));
            $compile(popup.contents())($scope);

            // Đặt mua hàng
            $scope.hasItemInCart = false;
            $scope.cart = cartItemSync;
            $scope.item_qty = 1;
            $scope.quantity_quickview = 1;
            $scope.noti_product = {};

            $scope.addToCart = function (productId, quantity = 1) {
                url = "{{route('cart.add.item', ['productId' => 'productId'])}}";
                url = url.replace('productId', productId);
                let item_qty = quantity;

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: {
                        'qty': parseInt(item_qty)
                    },
                    success: function (response) {
                        if (response.success) {
                            if (response.count > 0) {
                                $scope.hasItemInCart = true;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function () {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);
                            toastr.success('Thêm vào giỏ hàng thành công !')
                            $scope.noti_product = response.noti_product;
                            $scope.$applyAsync();
                        }
                    },
                    error: function () {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.changeQty = function (qty, product_id) {
                updateCart(qty, product_id)
            }

            $scope.incrementQuantity = function (product) {
                product.quantity = Math.min(product.quantity + 1, 9999);
            };

            $scope.decrementQuantity = function (product) {
                product.quantity = Math.max(product.quantity - 1, 0);
            };

            function updateCart(qty, product_id) {
                jQuery.ajax({
                    type: 'POST',
                    url: "{{route('cart.update.item')}}",
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: {
                        product_id: product_id,
                        qty: qty
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;
                            $scope.total_qty = response.count;
                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            // xóa item trong giỏ
            $scope.removeItem = function (product_id) {
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('cart.remove.item')}}",
                    data: {
                        product_id: product_id
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.cart.items = response.items;
                            $scope.cart.count = Object.keys($scope.cart.items).length;
                            $scope.cart.totalCost = response.total;

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            if ($scope.cart.count == 0) {
                                $scope.hasItemInCart = false;
                            }
                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        jQuery.toast.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            // Xem nhanh
            $scope.quickViewProduct = {};
            $scope.showQuickView = function (productId) {
                $.ajax({
                    url: "{{route('front.get-product-quick-view')}}",
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: {
                        product_id: productId
                    },
                    success: function (response) {
                        // $('#quick-view-product .quick-view-product').html(response.html);
                        // var quickView = angular.element(document.getElementById('quick-view-product'));
                        // $compile(quickView.contents())($scope);
                        $scope.quickViewProduct= response.data
                        $scope.$applyAsync();
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.selectedAttributes = [];
            $scope.selectAttribute = function(attribute, value, index) {
                if (!jQuery(this).hasClass('active')) {
                    jQuery('.product-attribute-values').parent().find('.value').removeClass('active');
                    jQuery(this).addClass('active');
                    if ($scope.selectedAttributes.length > 0 && $scope.selectedAttributes.find(item => item
                            .index == index)) {
                        $scope.selectedAttributes.find(item => item.index == index)
                            .value = value;
                    } else {
                        $scope.selectedAttributes.push({
                            index: index,
                            name: attribute.name,
                            value: value,
                        });
                    }
                } else {
                    jQuery('.product-attribute-values').parent().find('.value').removeClass('active');
                    jQuery(this).removeClass('active');
                    $scope.selectedAttributes = $scope.selectedAttributes.filter(item => item.index !=
                        index);
                }
                // $scope.$apply();
                console.log($scope.selectedAttributes);
            };

            $scope.addToCartFromQuickView = function() {
                let quantity = $('input[name="quantity_quickview"]').val();
                url = "{{ route('cart.add.item', ['productId' => 'productId']) }}";
                url = url.replace('productId', $scope.quickViewProduct.id);

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

            // Search product
            jQuery('#live-search').keyup(function() {
                var keyword = jQuery(this).val();
                jQuery.ajax({
                    type: 'post',
                    url: '{{route("front.auto-search-complete")}}',
                    headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
                    data: {keyword: keyword},
                    success: function(data) {
                        jQuery('.live-search-results').html(data.html);
                    }
                })
            });
        })

        app.factory('cartItemSync', function ($interval) {
            var cart = {items: null, total: null};

            cart.items = @json($cartItems);
            cart.count = {{$cartItems->sum('quantity')}};
            cart.total = {{$totalPriceCart}};

            return cart;
        });

        @if(Session::has('token'))
        localStorage.setItem('{{ env("prefix") }}-token', "{{Session::get('token')}}")
        @endif
        @if(Session::has('logout'))
        localStorage.removeItem('{{ env("prefix") }}-token');
        @endif
        var CSRF_TOKEN = "{{ csrf_token() }}";
        @if (Auth::guard('client')->check())
        const DEFAULT_CLIENT_USER = {
            id: "{{ Auth::guard('client')->user()->id }}",
            fullname: "{{ Auth::guard('client')->user()->name }}"
        };
        @else
        const DEFAULT_CLIENT_USER = null;
        @endif
    </script>
</body>

</html>
