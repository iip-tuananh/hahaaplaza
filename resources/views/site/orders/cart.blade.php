@extends('site.layouts.master')
@section('title')
    Giỏ hàng
@endsection

@section('css')
@endsection

@section('content')
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('site/img/breadcrumb-bg.webp') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title" data-cue="slideInUp">Giỏ hàng</h1>
                <ul class="breadcumb-menu">
                    <li data-cue="slideInUp" data-delay="100"><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                    <li data-cue="slideInUp" data-delay="100">Giỏ hàng của bạn</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="ot-cart-wrapper space-top space-extra-bottom" ng-controller="CartController">
        <div class="container">
            <form class="woocommerce-cart-form">
                <table class="cart_table">
                    <thead>
                        <tr>
                            <th colspan="3" class="cart-col-image">Sản phẩm</th>
                            <th class="cart-col-price">Giá</th>
                            <th class="cart-col-quantity">Số lượng</th>
                            <th class="cart-col-total">Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="cart_item" ng-repeat="item in items track by $index">
                            <td data-title="Remove"><a href="javascript:void(0)" class="remove" ng-click="removeItem(item.id)"><i class="far fa-close"></i></a></td>
                            <td data-title="Product"><a class="cart-productimage" href="/san-pham/<%item.attributes.slug%>.html"><img
                                        width="91" height="91" ng-src="<%item.attributes.image%>"
                                        alt="Image"></a></td>
                            <td data-title="Name">
                                <a class="cart-productname" href="/san-pham/<%item.attributes.slug%>.html"><%item.name%></a>
                                <div class="cart_attribute">
                                    <div ng-repeat="attribute in item.attributes.attributes" style="line-height: 1;">
                                        <span class="cart_attribute_name" style="margin-left: 8px; font-weight: 600; font-size: 14px;"><% attribute.name %> :</span>
                                        <span class="cart_attribute_value" style="font-size: 14px;"><% attribute.value %></span>
                                    </div>
                                </div>
                            </td>
                            <td data-title="Price"><span class="amount"><bdi><span></span><% item.price | number %>₫</bdi></span></td>
                            <td data-title="Quantity">
                                <div class="quantity">
                                    <button class="qty-btn" ng-click="decrementQuantity(item); changeQty(item.quantity, item.id)"><i class="far fa-minus"></i></button>
                                    <input type="number" class="qty-input" ng-model="item.quantity" value="<%item.quantity%>" min="1" max="99" ng-change="changeQty(item.quantity, item.id)">
                                    <button class="qty-btn" ng-click="incrementQuantity(item); changeQty(item.quantity, item.id)"><i class="far fa-plus"></i></button>
                                </div>
                            </td>
                            <td data-title="Total"><span class="amount"><bdi><span></span><% item.price * item.quantity | number %>₫</bdi></span></td>
                        </tr>
                        <tr>
                            <td colspan="6" class="actions">
                                {{-- <div class="ot-cart-coupon"><input type="text" class="form-control"
                                        placeholder="Coupon Code..."> <button type="submit" class="ot-btn">Apply
                                        Coupon</button></div> --}}
                                <button type="submit" class="ot-btn" onclick="window.location.href = '{{ route('cart.checkout') }}'">Thanh toán</button> <a href="{{ route('front.home-page') }}"
                                    class="ot-btn">Tiếp tục mua hàng</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        app.controller('CartController', function($scope, cartItemSync, $interval, $rootScope) {
            $scope.items = @json($cartCollection);

            // Object.keys($scope.items).forEach(function(item) {
            //     $scope.items[item].selected = false;
            // });
            $scope.total_selected = 0;
            $scope.total_qty = "{{ $total_qty }}";
            $scope.checkCart = true;
            $scope.cart_items_selected = [];

            $scope.countItem = Object.keys($scope.items).length;

            jQuery(document).ready(function() {
                if ($scope.total == 0) {
                    $scope.checkCart = false;
                    $scope.$applyAsync();
                }
            })

            // $scope.selectAllItems = function() {
            //     $scope.total_selected = 0;
            //     $scope.cart_items_selected = [];
            //     Object.keys($scope.items).forEach(function(item) {
            //         $scope.items[item].selected = $scope.selectAll;
            //         if ($scope.items[item].selected) {
            //             $scope.cart_items_selected.push($scope.items[item]);
            //         } else {
            //             $scope.cart_items_selected.splice($scope.cart_items_selected.indexOf($scope
            //                 .items[item].id), 1);
            //         }
            //     });
            //     $scope.total_selected = $scope.cart_items_selected.reduce(function(total, item) {
            //         return total + item.price * item.quantity;
            //     }, 0);
            //     $scope.$applyAsync();
            // }

            // $scope.selectItem = function(item) {
            //     const existingItemIndex = $scope.cart_items_selected.findIndex(selectedItem => selectedItem
            //         .id === item.id);
            //     if (existingItemIndex == -1 && item.selected) {
            //         $scope.cart_items_selected.push(item);
            //     } else {
            //         $scope.cart_items_selected.splice(existingItemIndex, 1);
            //     }
            //     $scope.total_selected = $scope.cart_items_selected.reduce(function(total, item) {
            //         return total + item.price * item.quantity;
            //     }, 0);

            //     let check = true;
            //     Object.keys($scope.items).forEach(function(item) {
            //         if (!$scope.items[item].selected) {
            //             check = false;
            //             return;
            //         }
            //     });
            //     $scope.selectAll = check;

            //     $scope.$applyAsync();
            // }

            // $scope.submitCart = function() {
            //     if ($scope.cart_items_selected.length == 0 || $scope.total_selected == 0) {
            //         toastr.warning('Chọn sản phẩm thanh toán');
            //         return;
            //     }
            //     localStorage.setItem('cart_items_selected', JSON.stringify($scope.cart_items_selected));
            //     localStorage.setItem('total_selected', $scope.total_selected);
            //     window.location.href = "{{ route('cart.checkout') }}";
            // }

            $scope.changeQty = function(qty, product_id) {
                updateCart(qty, product_id)
            }

            $scope.incrementQuantity = function(product) {
                product.quantity = Math.min(product.quantity + 1, 9999);
            };

            $scope.decrementQuantity = function(product) {
                product.quantity = Math.max(product.quantity - 1, 0);
            };

            function updateCart(qty, product_id) {
                jQuery.ajax({
                    type: 'POST',
                    url: "{{ route('cart.update.item') }}",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        product_id: product_id,
                        qty: qty
                    },
                    success: function(response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;
                            $scope.total_qty = response.count;
                            $scope.total_selected = 0;
                            $scope.cart_items_selected = [];
                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.$applyAsync();
                        }
                    },
                    error: function(e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.removeItem = function(product_id) {
                jQuery.ajax({
                    type: 'GET',
                    url: "{{ route('cart.remove.item') }}",
                    data: {
                        product_id: product_id
                    },
                    success: function(response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;
                            $scope.total_qty = response.count;
                            $scope.total_selected = 0;
                            $scope.cart_items_selected = [];
                            if ($scope.total == 0) {
                                $scope.checkCart = false;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.countItem = Object.keys($scope.items).length;

                            $scope.$applyAsync();
                        }
                    },
                    error: function(e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }
        });
    </script>
@endpush
