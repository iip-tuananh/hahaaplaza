@extends('site.layouts.master')
@section('title')
    Về chúng tôi
@endsection

@section('css')
    <link href="{{ asset('site/css/style_page.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('site/css/breadcrumb_style.scss.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('content')
<div class="breadcumb-wrapper" data-bg-src="{{ asset('site/img/breadcrumb-bg.webp') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-cue="slideInUp">Giới thiệu</h1>
            <ul class="breadcumb-menu">
                <li data-cue="slideInUp" data-delay="100"><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                <li data-cue="slideInUp" data-delay="100">Giới thiệu</li>
            </ul>
        </div>
    </div>
</div>
<section class="page mt-5 mb-5">
    <div class="container">
        <div class="pg_page padding-top-15">
            <div class="row">
                <div class="col-12">
                    <div class="page-title category-title">
                        <h1 class="title-head"><a href="{{ route('front.about-us') }}" title="Giới thiệu">Giới thiệu</a></h1>
                    </div>
                    <div class="content-page rte">
                        {!! $config->introduction !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
@endpush
