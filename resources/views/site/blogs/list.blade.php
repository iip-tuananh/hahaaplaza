@extends('site.layouts.master')
@section('title')
    {{ $cate_title }}
@endsection
@section('description')
    {{ $cate_des ?? '' }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="breadcumb-wrapper" data-bg-src="{{ asset('site/img/breadcrumb-bg.webp') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title" data-cue="slideInUp">{{ $cate_title }}</h1>
                <ul class="breadcumb-menu">
                    <li data-cue="slideInUp" data-delay="100"><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                    <li data-cue="slideInUp" data-delay="100">{{ $cate_title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="space-top space-extra-bottom" id="blog-sec">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                @foreach ($blogs as $post)
                <div class="col-xl-4 col-md-6">
                    <div class="blog-card style2" data-cue="slideInUp">
                        <div class="blog-img"><img src="{{$post->image ? $post->image->path : ''}}" alt="{{$post->name}}">
                            {{-- <span class="blog-tag">{{$post->category->name}}</span> --}}
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta"><a href="javascript:void(0)"><i class="far fa-calendar-days"></i>{{date('d/m/Y', strtotime($post->created_at))}}</a> <a href="javascript:void(0)"><i class="far fa-user"></i>By Admin</a></div>
                            <h3 class="box-title"><a href="{{route('front.detail-blog', $post->slug)}}">{{$post->name}}</a></h3>
                            <a href="{{route('front.detail-blog', $post->slug)}}" class="link-btn">Đọc tiếp<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="ot-pagination text-center mt-40">
                {{ $blogs->links() }}
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
