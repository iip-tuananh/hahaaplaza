@extends('site.layouts.master')
@section('title')
    Liên hệ
@endsection

@section('css')
    <link href="{{ asset('site/css/style_page.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('site/css/contact_style.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('site/css/breadcrumb_style.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('content')
<div class="breadcumb-wrapper" data-bg-src="{{ asset('site/img/breadcrumb-bg.webp') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-cue="slideInUp">Liên hệ</h1>
            <ul class="breadcumb-menu">
                <li data-cue="slideInUp" data-delay="100"><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                <li data-cue="slideInUp" data-delay="100">Liên hệ</li>
            </ul>
        </div>
    </div>
</div>
<div class="space" id="contact-sec" ng-controller="ContactUsController">
    <div class="container">
        <div class="contact-wrap1">
            <div class="row gy-40 gx-60 justify-content-center">
                <div class="col-lg-4">
                    <div class="contact-feature-wrap">
                        <div class="contact-feature-wrap-details">
                            <div class="footer-contact" data-cue="slideInLeft">
                                <div class="box-icon"><i class="fas fa-home"></i></div>
                                <div class="media-body">
                                    <p class="box-label">Địa chỉ</p>
                                    <h4 class="box-title">{{ $config->address_company }}</h4>
                                </div>
                            </div>
                            <div class="footer-contact" data-cue="slideInLeft">
                                <div class="box-icon"><i class="fas fa-phone"></i></div>
                                <div class="media-body">
                                    <p class="box-label">Điện thoại</p>
                                    <h4 class="box-title"><a href="tel:{{ str_replace(' ', '', $config->hotline) }}">{{ $config->hotline }}</a></h4>
                                </div>
                            </div>
                            <div class="footer-contact" data-cue="slideInLeft">
                                <div class="box-icon"><i class="fas fa-envelope"></i></div>
                                <div class="media-body">
                                    <p class="box-label">Email</p>
                                    <h4 class="box-title"><a href="mailto:{{ $config->email }}">{{ $config->email }}</a>
                                    </h4>
                                </div>
                            </div>
                            {{-- <div class="footer-contact" data-cue="slideInLeft">
                                <div class="box-icon"><i class="fas fa-fax"></i></div>
                                <div class="media-body">
                                    <p class="box-label">Fax</p>
                                    <h4 class="box-title"><a href="tel:+16365479658">+145278963</a></h4>
                                    <h4 class="box-title"><a href="tel:+16336983478">+236587954</a></h4>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-form1">
                        <h4 class="contact-form-title">Liên hệ với chúng tôi</h4>
                        <form id="contact" class="input-label ajax-contact">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control bg-white" placeholder="Họ tên" name="name" id="name" ng-model="your_name" required="">
                                    <div class="invalid-feedback d-block error" role="alert">
                                        <span ng-if="errors && errors.your_name">
                                            <% errors.your_name[0] %>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="email" class="form-control bg-white" placeholder="Email" name="email" id="email" ng-model="your_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                                    <div class="invalid-feedback d-block error" role="alert">
                                        <span ng-if="errors && errors.your_email">
                                            <% errors.your_email[0] %>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <textarea name="message" id="message" cols="30" placeholder="Nội dung" rows="3" class="form-control bg-white" ng-model="your_message" required=""></textarea>
                                    <div class="invalid-feedback d-block error" role="alert">
                                        <span ng-if="errors && errors.your_message">
                                            <% errors.your_message[0] %>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-btn col-12 mt-10"><button class="ot-btn" ng-click="submitContact()">Gửi tin <i
                                            class="fas fa-arrow-right ms-2"></i></button></div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        app.controller('ContactUsController', function($scope, $http) {
            $scope.loading = false;
            $scope.errors = {};
            $scope.submitContact = function() {
                $scope.loading = true;
                let data = {
                    your_name: $scope.your_name,
                    your_email: $scope.your_email,
                    your_message: $scope.your_message
                };
                jQuery.ajax({
                    url: '{{ route('front.post-contact') }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: data,
                    success: function(response) {
                        if (response.success) {
                            toastr.success('Thao tác thành công !')
                        } else {
                            $scope.errors = response.errors;
                            toastr.error('Thao tác thất bại !')
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                        $scope.loading = false;
                    }
                });
            };
        });
    </script>
@endpush
