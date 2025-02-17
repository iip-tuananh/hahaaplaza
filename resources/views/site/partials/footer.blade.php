<footer class="footer-wrapper footer-layout1" data-bg-src="/site/img/footer_bg_1.webp">
    <div class="container">
        <div class="footer-top">
            <div class="footer-contact-wrap">
                <div class="footer-contact" data-cue="slideInUp">
                    <div class="box-icon"><img src="/site/img/phone.svg" alt="icon"></div>
                    <div class="media-body">
                        <p class="box-label">Hotline 24/7</p>
                        <h4 class="box-title"><a href="tel:{{ str_replace(' ', '', $config->hotline) }}">{{ $config->hotline }}</a></h4>
                    </div>
                </div>
                <div class="footer-contact" data-cue="slideInUp">
                    <div class="box-icon" data-theme-color="#FE5A86"><img src="/site/img/email.svg"
                            alt="icon"></div>
                    <div class="media-body">
                        <p class="box-label">Địa chỉ email</p>
                        <h4 class="box-title"><a href="mailto:{{ $config->email }}">{{ $config->email }}</a>
                        </h4>
                    </div>
                </div>
                <div class="footer-contact" data-cue="slideInUp">
                    <div class="box-icon" data-theme-color="#FC800A"><img src="/site/img/time.svg"
                            alt="icon"></div>
                    <div class="media-body">
                        <p class="box-label">Thời gian mở cửa</p>
                        <h4 class="box-title">Monday - Sunday: 9 AM - 6 PM</h4>
                    </div>
                </div>
                <div class="footer-contact" data-cue="slideInUp">
                    <div class="box-icon" data-theme-color="#16C4E3"><img src="/site/img/location.svg"
                            alt="icon"></div>
                    <div class="media-body">
                        <p class="box-label">Địa chỉ</p>
                        <h4 class="box-title">{{ $config->address_company }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-3 col-xl-auto" data-cue="slideInUp">
                    <div class="widget footer-widget">
                        <div class="ot-widget-about">
                            <div class="about-logo"><a href="{{ route('front.home-page') }}"><img src="{{ $config->image ? $config->image->path : '' }}"
                                        alt="{{ $config->web_title }}" loading="lazy"></a></div>
                            <p class="about-text">{{ $config->web_des }}</p>
                            <div class="ot-social"><a href="https://www.facebook.com/"><i
                                        class="fab fa-facebook-f"></i></a> <a href="https://www.twitter.com/"><i
                                        class="fab fa-twitter"></i></a> <a href="https://www.linkedin.com/"><i
                                        class="fab fa-linkedin-in"></i></a> <a
                                    href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-auto" data-cue="slideInUp">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Danh mục sản phẩm</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                @foreach ($product_categories as $category)
                                <li><a href="{{ route('front.show-product-category', $category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-auto" data-cue="slideInUp">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Danh mục menu</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                                <li><a href="{{ route('front.about-us') }}">Giới thiệu</a></li>
                                @foreach ($post_categories as $category)
                                <li><a href="{{ route('front.list-blog', $category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach
                                <li><a href="{{ route('front.contact-us') }}">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-auto" data-cue="slideInUp">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Vị trí</h3>
                        <div class="menu-all-pages-container">
                            {!! $config->location !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap bg-theme">
        <div class="container text-center">
            <div class="row gy-3 justify-content-between align-items-center">
                <div class="col-md-auto" data-cue="slideInUp">
                    <p class="copyright-text"><i class="fal fa-copyright"></i> Copyright {{ date('Y') }} <a
                            href="">{{ $config->web_title }}</a>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg>
</div>
<div onclick="window.location.href= 'tel:{{ str_replace(' ', '', $config->hotline) }}'" class="hotline-phone-ring-wrap">
    <div class="hotline-phone-ring">
        <div class="hotline-phone-ring-circle"></div>
        <div class="hotline-phone-ring-circle-fill"></div>
        <div class="hotline-phone-ring-img-circle">
            <a href="tel:{{ str_replace(' ', '', $config->hotline) }}" class="pps-btn-img">
                <img src="/site/img/phone.png" alt="Gọi điện thoại" width="50">
            </a>
        </div>
    </div>
    <a href="tel:{{ str_replace(' ', '', $config->hotline) }}">
    </a>
    <div class="hotline-bar"><a href="tel:{{ str_replace(' ', '', $config->hotline) }}">
        </a><a href="tel:{{ str_replace(' ', '', $config->hotline) }}">
            <span class="text-hotline">{{ $config->hotline }}</span>
        </a>
    </div>

</div>
<div class="inner-fabs">
    <a target="blank" href="" class="fabs roundCool" id="challenges-fab"
        data-tooltip="Nhắn tin facebook">
        <img class="inner-fab-icon" src="/site/img/messenger-icon.png" alt="challenges-icon" border="0">
    </a>
    <a target="blank" href="https://zalo.me/{{ $config->zalo }}" class="fabs roundCool" id="chat-fab"
        data-tooltip="Nhắn tin Zalo">
        <img class="inner-fab-icon" src="/site/img/zalo.png" alt="chat-active-icon" border="0">
    </a>

</div>
<div class="fabs roundCool call-animation" id="main-fab">
    <img class="img-circle" src="/site/img/lienhe.png" alt="" width="135">
</div>
