<!doctype html>
<html class="no-js" lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') - DI' Perfects Produk Skincare dan Parfum Berkualitas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Meta Keywords -->
    <meta name="keywords" content="DI Perfects Beauty, Authentic Perfume, Beauty Products, Perfume, Fragrance, Luxury Beauty, produk skincare, parfum, kecantikan, perawatan kulit, keindahan">

    <!-- Meta Shopee Online Shop -->
    @if (request()->routeIs('product.show'))
        <meta property="og:title"
            content="{{ $product->nama . ' ' . $product->kategori->nama }} - DI' Perfects Produk Skincare dan Parfum Berkualitas">
        <meta property="og:description" content="{!! strip_tags(Str::limit($product->deskripsi, 150)) !!}">

        <meta property="og:type" content="product">
        <meta property="product:price:amount" content="{{ $product->harga }}">
        <meta property="product:price:currency" content="IDR">
        <meta property="product:availability" content="Tersedia">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title"
            content="{{ $product->nama . ' ' . $product->kategori->nama }} - DI' Perfects Produk Skincare dan Parfum Berkualitas">
        <meta name="twitter:description" content="{!! strip_tags(Str::limit($product->deskripsi, 150)) !!}">
        <meta name="twitter:image" content="{{ asset($product->image_url) }}">
    @else
        <meta property="og:title" content="@yield('title') - DI' Perfects Produk Skincare dan Parfum Berkualitas">
        <meta property="og:description"
            content="Diperfects adalah pilihan terpercaya untuk produk skincare dan parfum berkualitas. Temukan kecantikan sejati melalui rangkaian produk perawatan kulit premium dan aroma parfum yang memikat. Keindahan alami dimulai dari sini.">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('title') - DI' Perfects Produk Skincare dan Parfum Berkualitas">
        <meta name="twitter:description"
            content="Diperfects adalah pilihan terpercaya untuk produk skincare dan parfum berkualitas. Temukan kecantikan sejati melalui rangkaian produk perawatan kulit premium dan aroma parfum yang memikat. Keindahan alami dimulai dari sini.">
        <meta name="twitter:image" content="{{ asset('img/logo/logo-only.png') }}">
    @endif

    <meta property="og:url" content="{{ request()->fullUrl() }}">

    <!-- Meta Maps Lokasi -->
    <meta name="geo.placename" content="DI' Perfects Beauty and Authentic Perfume">
    <meta name="geo.position" content="-6.3521397;106.5753687">

    <!-- Meta SEO Google -->
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">

    <!-- Untuk menonaktifkan deteksi otomatis nomor telepon dan memformat mereka secara otomatis di halaman seluler -->
    <meta name="format-detection" content="telephone=no">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}img/logo/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('/') }}css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/animate.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/swiper-bundle.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/slick.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/font-awesome-pro.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/flaticon_shofy.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/spacing.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/main.css">
</head>

<body>

    <!-- pre loader area start -->
    {{-- <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <!-- loading content here -->
                <div class="tp-preloader-content">
                    <div class="tp-preloader-logo mb-3">
                        <div class="tp-preloader-circle">
                            <svg width="190" height="190" viewBox="0 0 380 380" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6"
                                    stroke-linecap="round"></circle>
                                <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6"
                                    stroke-linecap="round"></circle>
                            </svg>
                        </div>
                        <img src="{{ asset('/') }}img/logo/preloader/preloader-icon.png" alt=""
                            width="106">
                    </div>
                    <h3 class="tp-preloader-title" style="font-size: 62px !important;">DI' Perfects</h3>
                    <p class="tp-preloader-subtitle" style="font-size: 32px !important;">Beauty</p>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- pre loader area end -->

    <!-- back to top start -->
    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <!-- back to top end -->

    <!-- offcanvas area start -->
    <div class="offcanvas__area offcanvas__style-darkRed">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__close">
                <button class="offcanvas__close-btn offcanvas-close-btn">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo logo">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('/') }}img/logo/logo.png" alt="logo">
                        </a>
                    </div>
                </div>
                {{-- <div class="offcanvas__category pb-40">
                    <button class="tp-offcanvas-category-toggle">
                        <i class="fa-solid fa-bars"></i>
                        All Categories
                    </button>
                    <div class="tp-category-mobile-menu">

                    </div>
                </div> --}}
                <div class="tp-main-menu-mobile fix mb-40"></div>

                <div class="offcanvas__contact align-items-center d-none">
                    <div class="offcanvas__contact-icon mr-20">
                        <span>
                            <img src="{{ asset('img/icon/contact.png') }}" alt="">
                        </span>
                    </div>
                    <div class="offcanvas__contact-content">
                        <h3 class="offcanvas__contact-title">
                            <a href="tel:+6282161416162">+62 821-6141-6162</a>
                        </h3>
                    </div>
                </div>
                <div class="offcanvas__btn">
                    <a href="{{route('contact')}}" class="tp-btn-2 tp-btn-border-2">Contact Us</a>
                </div>
            </div>
            {{-- <div class="offcanvas__bottom">
                <div class="offcanvas__footer d-flex align-items-center justify-content-between">
                    <div class="offcanvas__currency-wrapper currency">
                        <span class="offcanvas__currency-selected-currency tp-currency-toggle"
                            id="tp-offcanvas-currency-toggle">Currency : USD</span>
                        <ul class="offcanvas__currency-list tp-currency-list">
                            <li>USD</li>
                            <li>ERU</li>
                            <li>BDT </li>
                            <li>INR</li>
                        </ul>
                    </div>
                    <div class="offcanvas__select language">
                        <div class="offcanvas__lang d-flex align-items-center justify-content-md-end">
                            <div class="offcanvas__lang-img mr-15">
                                <img src="{{ asset('/') }}img/icon/language-flag.png" alt="">
                            </div>
                            <div class="offcanvas__lang-wrapper">
                                <span class="offcanvas__lang-selected-lang tp-lang-toggle"
                                    id="tp-offcanvas-lang-toggle">English</span>
                                <ul class="offcanvas__lang-list tp-lang-list">
                                    <li>Spanish</li>
                                    <li>Portugese</li>
                                    <li>American</li>
                                    <li>Canada</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->

    <!-- mobile menu area start -->
    @include('layouts.components.public_menus')
    <!-- mobile menu area end -->

    <!-- search area start -->
    <section class="tp-search-area tp-search-style-secondary">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-search-form">
                        <div class="tp-search-close text-center mb-20">
                            <button class="tp-search-close-btn tp-search-close-btn"></button>
                        </div>
                        <form action="#">
                            <div class="tp-search-input mb-10">
                                <input type="text" placeholder="Search for product...">
                                <button type="submit"><i class="flaticon-search-1"></i></button>
                            </div>
                            <div class="tp-search-category">
                                <span>Search by : </span>
                                <a href="#">Men, </a>
                                <a href="#">Women, </a>
                                <a href="#">Children, </a>
                                <a href="#">Shirt, </a>
                                <a href="#">Demin</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- search area end -->

    <!-- cart mini area start -->
    <div class="cartmini__area cartmini__style-darkRed">
        <div class="cartmini__wrapper d-flex justify-content-between flex-column">
            <div class="cartmini__top-wrapper">
                <div class="cartmini__top p-relative">
                    <div class="cartmini__top-title">
                        <h4>Shopping cart</h4>
                    </div>
                    <div class="cartmini__close">
                        <button type="button" class="cartmini__close-btn cartmini-close-btn"><i
                                class="fal fa-times"></i></button>
                    </div>
                </div>
                <div class="cartmini__shipping">
                    <p> Free Shipping for all orders over <span>$50</span></p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                            data-width="70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="cartmini__widget">
                    <div class="cartmini__widget-item">
                        <div class="cartmini__thumb">
                            <a href="product-details.html">
                                <img src="{{ asset('/') }}img/product/product-1.jpg" alt="">
                            </a>
                        </div>
                        <div class="cartmini__content">
                            <h5 class="cartmini__title"><a href="product-details.html">Level Bolt Smart Lock</a></h5>
                            <div class="cartmini__price-wrapper">
                                <span class="cartmini__price">$46.00</span>
                                <span class="cartmini__quantity">x2</span>
                            </div>
                        </div>
                        <a href="#" class="cartmini__del"><i class="fa-regular fa-xmark"></i></a>
                    </div>
                </div>
                <!-- for wp -->
                <!-- if no item in cart -->
                <div class="cartmini__empty text-center d-none">
                    <img src="{{ asset('/') }}img/product/cartmini/empty-cart.png" alt="">
                    <p>Your Cart is empty</p>
                    <a href="shop.html" class="tp-btn">Go to Shop</a>
                </div>
            </div>
            <div class="cartmini__checkout">
                <div class="cartmini__checkout-title mb-30">
                    <h4>Subtotal:</h4>
                    <span>$113.00</span>
                </div>
                <div class="cartmini__checkout-btn">
                    <a href="cart.html" class="tp-btn mb-10 w-100"> view cart</a>
                    <a href="checkout.html" class="tp-btn tp-btn-border w-100"> checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- cart mini area end -->

    <!-- header area start -->
    <header>
        <div class="tp-header-area tp-header-style-darkRed tp-header-height">
            <!-- header top start  -->
            @include('layouts.components.public_topheader')

            <!-- header bottom start -->
            <div id="header-sticky" class="tp-header-bottom-2 tp-header-sticky">
                <div class="container">
                    <div class="tp-mega-menu-wrapper p-relative">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-5 col-md-5 col-sm-4 col-6">
                                <div class="logo">
                                    <a href="{{ route('index') }}">
                                        <img src="{{ asset('/') }}img/logo/logo.png" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-5 d-none d-xl-block">
                                @include('layouts.components.public_navbar')
                                {{-- <div class="tp-category-menu-wrapper d-none">
                                    <nav class="tp-category-menu-content">
                                        <ul>
                                            <li>
                                                <a href="shop.html">
                                                    <span>
                                                        <svg width="16" height="17" viewBox="0 0 16 17"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5.90532 14.8316V12.5719C5.9053 11.9971 6.37388 11.5301 6.95443 11.5262H9.08101C9.66434 11.5262 10.1372 11.9944 10.1372 12.5719V12.5719V14.8386C10.1371 15.3266 10.5305 15.7254 11.0233 15.7368H12.441C13.8543 15.7368 15 14.6026 15 13.2035V13.2035V6.77525C14.9925 6.22482 14.7314 5.70794 14.2911 5.37171L9.44253 1.50496C8.59311 0.83168 7.38562 0.83168 6.5362 1.50496L1.70886 5.37873C1.26693 5.7136 1.00544 6.23133 1 6.78227V13.2035C1 14.6026 2.1457 15.7368 3.55899 15.7368H4.97671C5.48173 15.7368 5.89114 15.3315 5.89114 14.8316V14.8316"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    New Arrivals</a>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="shop.html" class="has-mega-menu">
                                                    <span>
                                                        <svg width="18" height="18" viewBox="0 0 18 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2.6856 4.54975C2.6856 3.52014 3.51984 2.6859 4.54945 2.68508H5.3977C5.88984 2.68508 6.36136 2.48971 6.71089 2.14348L7.30359 1.54995C8.02984 0.819578 9.21031 0.816281 9.94068 1.54253L9.9415 1.54336L9.94892 1.54995L10.5425 2.14348C10.892 2.49053 11.3635 2.68508 11.8556 2.68508H12.7031C13.7327 2.68508 14.5677 3.51932 14.5677 4.54975V5.39636C14.5677 5.88849 14.7623 6.36084 15.1093 6.71037L15.7029 7.3039C16.4332 8.03015 16.4374 9.21061 15.7111 9.94098L15.7103 9.94181L15.7029 9.94923L15.1093 10.5428C14.7623 10.8915 14.5677 11.363 14.5677 11.8551V12.7034C14.5677 13.733 13.7335 14.5672 12.7039 14.5672H12.7031H11.854C11.3619 14.5672 10.8895 14.7626 10.5408 15.1096L9.94727 15.7024C9.22185 16.4327 8.04221 16.4368 7.31183 15.7122C7.31101 15.7114 7.31019 15.7106 7.30936 15.7098L7.30194 15.7024L6.70924 15.1096C6.36054 14.7626 5.88819 14.568 5.39605 14.5672H4.54945C3.51984 14.5672 2.6856 13.733 2.6856 12.7034V11.8535C2.6856 11.3613 2.49023 10.8898 2.14318 10.5411L1.55047 9.94758C0.820097 9.22215 0.815976 8.04251 1.5414 7.31214C1.5414 7.31132 1.54223 7.31049 1.54305 7.30967L1.55047 7.30225L2.14318 6.70872C2.49023 6.35919 2.6856 5.88767 2.6856 5.39471V4.54975"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M6.50787 10.7453L10.745 6.50812"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M10.6823 10.6862H10.6897" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M6.56053 6.56446H6.56795" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Electronics</a>

                                                <ul class="mega-menu tp-submenu">
                                                    <li>
                                                        <a href="shop.html" class="mega-menu-title">Featured</a>
                                                        <ul>
                                                            <li>
                                                                <a href="shop.html"><img
                                                                        src="{{ asset('/') }}img/header/menu/menu-1.jpg"
                                                                        alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html">New Arrivals</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html">Best Seller</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html">Top Rated</a>
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <a href="shop.html" class="mega-menu-title">Computer &
                                                            Laptops</a>
                                                        <ul>
                                                            <li>
                                                                <a href="shop.html"><img
                                                                        src="{{ asset('/') }}img/header/menu/menu-2.jpg"
                                                                        alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html">Top Brands</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html">Weekly Best Selling</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html">Most Viewed</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="shop.html" class="mega-menu-title">Accessories</a>
                                                        <ul>
                                                            <li>
                                                                <a href="shop.html"><img
                                                                        src="{{ asset('/') }}img/header/menu/menu-3.jpg"
                                                                        alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html">Headphones</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html">TWS Earphone</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html">Gaming Headset</a>
                                                            </li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li>
                                                <a href="shop.html">
                                                    <span>
                                                        <svg width="17" height="17" viewBox="0 0 17 17"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.5 8.5V16H2.50003V8.5" stroke="currentColor"
                                                                stroke-width="1.4" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M16 4.75H1V8.5H16V4.75Z" stroke="currentColor"
                                                                stroke-width="1.4" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M8.5 16V4.75" stroke="currentColor"
                                                                stroke-width="1.4" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M8.49997 4.75H5.12497C4.62769 4.75 4.15077 4.55246 3.79914 4.20083C3.44751 3.84919 3.24997 3.37228 3.24997 2.875C3.24997 2.37772 3.44751 1.90081 3.79914 1.54917C4.15077 1.19754 4.62769 1 5.12497 1C7.74997 1 8.49997 4.75 8.49997 4.75Z"
                                                                stroke="currentColor" stroke-width="1.4"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M8.5 4.75H11.875C12.3723 4.75 12.8492 4.55246 13.2008 4.20083C13.5525 3.84919 13.75 3.37228 13.75 2.875C13.75 2.37772 13.5525 1.90081 13.2008 1.54917C12.8492 1.19754 12.3723 1 11.875 1C9.25 1 8.5 4.75 8.5 4.75Z"
                                                                stroke="currentColor" stroke-width="1.4"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Gifts</a>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="shop.html">
                                                    <span>
                                                        <svg width="17" height="16" viewBox="0 0 17 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M14.5 1H2.5C1.67157 1 1 1.67157 1 2.5V10C1 10.8284 1.67157 11.5 2.5 11.5H14.5C15.3284 11.5 16 10.8284 16 10V2.5C16 1.67157 15.3284 1 14.5 1Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M5.5 14.5H11.5" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M8.5 11.5V14.5" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Computers</a>

                                                <ul class="tp-submenu">
                                                    <li class="has-dropdown">
                                                        <a href="shop.html">Desktop</a>
                                                        <ul class="tp-submenu">
                                                            <li><a href="shop.html">Gaming</a></li>
                                                            <li><a href="shop.html">WorkSpace</a></li>
                                                            <li><a href="shop.html">Customize</a></li>
                                                            <li><a href="shop.html">Luxury</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="shop.html">Laptop</a></li>
                                                    <li><a href="shop.html">Console</a></li>
                                                    <li><a href="shop.html">Top Rated</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="shop.html">
                                                    <span>
                                                        <svg width="15" height="18" viewBox="0 0 15 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.375 1H2.625C1.72754 1 1 1.72754 1 2.625V15.625C1 16.5225 1.72754 17.25 2.625 17.25H12.375C13.2725 17.25 14 16.5225 14 15.625V2.625C14 1.72754 13.2725 1 12.375 1Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M7.5 14H7.50875" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Smartphones & Tablets</a>
                                            </li>
                                            <li>
                                                <a href="shop.html">
                                                    <span>
                                                        <svg width="18" height="18" viewBox="0 0 18 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9 1C13.4176 1 17 4.5816 17 9C17 13.4184 13.4176 17 9 17C4.5816 17 1 13.4184 1 9C1 4.5816 4.5816 1 9 1Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11.5263 8.99592C11.5263 8.31286 8.02529 6.12769 7.62814 6.5206C7.23099 6.9135 7.19281 11.0413 7.62814 11.4712C8.06348 11.9027 11.5263 9.67898 11.5263 8.99592Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    TV, Video & Musice</a>
                                            </li>
                                            <li>
                                                <a href="shop.html">
                                                    <span>
                                                        <svg width="18" height="16" viewBox="0 0 18 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11.6292 1.26076C12.5027 1.60843 12.7699 2.81924 13.1271 3.20843C13.4843 3.59762 13.9955 3.72995 14.2783 3.72995C15.7814 3.72995 17 4.94854 17 6.45081V11.4627C17 13.4778 15.3654 15.1124 13.3503 15.1124H4.64973C2.63373 15.1124 1 13.4778 1 11.4627V6.45081C1 4.94854 2.21859 3.72995 3.72173 3.72995C4.00368 3.72995 4.51481 3.59762 4.87287 3.20843C5.23005 2.81924 5.49643 1.60843 6.36995 1.26076C7.24432 0.913081 10.7557 0.913081 11.6292 1.26076Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M13.7527 5.97314H13.7605" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11.7491 9.11086C11.7491 7.59215 10.5184 6.36145 8.99974 6.36145C7.48104 6.36145 6.25034 7.59215 6.25034 9.11086C6.25034 10.6296 7.48104 11.8603 8.99974 11.8603C10.5184 11.8603 11.7491 10.6296 11.7491 9.11086Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Cameras</a>
                                            </li>
                                            <li>
                                                <a href="shop.html">
                                                    <span>
                                                        <svg width="17" height="17" viewBox="0 0 17 17"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M2.30431 1C1.58423 1 1 1.59405 1 2.32534V3.10537C1 3.64706 1.20599 4.16798 1.57446 4.55981L5.61258 8.8536L5.61436 8.8509C6.39393 9.64899 6.83254 10.7279 6.83254 11.8528V15.6626C6.83254 15.9172 7.09891 16.0798 7.32 15.9597L9.61963 14.7066C9.96679 14.517 10.1834 14.1486 10.1834 13.7487V11.8428C10.1834 10.7242 10.6158 9.64989 11.3883 8.8536L15.4264 4.55981C15.794 4.16798 16 3.64706 16 3.10537V2.32534C16 1.59405 15.4167 1 14.6966 1H2.30431Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Cooking</a>
                                            </li>
                                            <li>
                                                <a href="shop.html">
                                                    <span>
                                                        <svg width="18" height="16" viewBox="0 0 18 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M15.7462 7.16473V13.167C15.7462 13.6457 15.556 14.1049 15.2175 14.4434C14.8789 14.782 14.4197 14.9722 13.941 14.9722H4.3058C3.82703 14.9722 3.3679 14.782 3.02936 14.4434C2.69083 14.1049 2.50061 13.6457 2.50061 13.167V9.36255"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M3.46186 1.00001C3.18176 0.999863 2.90854 1.08659 2.6798 1.24825C2.45106 1.4099 2.27807 1.63852 2.18471 1.9026L1.11062 5.01655C0.713475 6.15382 1.41752 7.16021 2.71274 7.16021C3.18296 7.14863 3.64325 7.02257 4.05374 6.79294C4.46424 6.56331 4.81255 6.23705 5.0685 5.84243C5.20151 6.24071 5.46067 6.58479 5.80676 6.82258C6.15285 7.06036 6.56702 7.17889 6.98651 7.16021C7.18566 6.7642 7.4909 6.43132 7.86823 6.19871C8.24556 5.96611 8.68013 5.84294 9.1234 5.84294C9.56666 5.84294 10.0012 5.96611 10.3785 6.19871C10.7558 6.43132 11.0611 6.7642 11.2603 7.16021V7.16021C11.679 7.17789 12.0922 7.0589 12.4373 6.82119C12.7825 6.58348 13.041 6.23994 13.1738 5.84243C13.431 6.23686 13.7802 6.56288 14.1914 6.79243C14.6026 7.02199 15.0633 7.1482 15.5341 7.16021C16.8293 7.16021 17.5288 6.15382 17.1362 5.01655L16.0621 1.9026C15.9685 1.6378 15.7948 1.40866 15.5652 1.24694C15.3355 1.08522 15.0613 0.998927 14.7804 1.00001H3.46186Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M11.0707 14.9722H7.19861V11.4701C7.19861 10.983 7.3921 10.5158 7.73656 10.1713C8.08102 9.82685 8.54822 9.63333 9.03536 9.63333H9.22041C9.70755 9.63333 10.1747 9.82685 10.5192 10.1713C10.8637 10.5158 11.0572 10.983 11.0572 11.4701L11.0707 14.9722Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Accessories</a>
                                            </li>
                                            <li>
                                                <a href="shop.html">
                                                    <span>
                                                        <svg width="18" height="17" viewBox="0 0 18 17"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M6.92384 11.3525C10.1178 11.3525 12.8477 11.8365 12.8477 13.7698C12.8477 15.7032 10.136 16.201 6.92384 16.201C3.72902 16.201 1 15.7213 1 13.7871C1 11.8529 3.71084 11.3525 6.92384 11.3525Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M6.92383 8.59311C4.82685 8.59311 3.1264 6.89354 3.1264 4.79656C3.1264 2.69958 4.82685 1 6.92383 1C9.01994 1 10.7204 2.69958 10.7204 4.79656C10.7282 6.88575 9.03986 8.58532 6.95067 8.59311H6.92383Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M12.8906 7.60761C14.2768 7.41281 15.3443 6.22319 15.3469 4.78336C15.3469 3.3643 14.3123 2.18681 12.9556 1.96429"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M14.7195 10.9416C16.0623 11.1416 17 11.6126 17 12.5823C17 13.2498 16.5584 13.6827 15.845 13.9537"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Sports</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div> --}}
                            </div>
                            <div class="col-xl-5 col-lg-7 col-md-7 col-sm-8 col-6">
                                <div
                                    class="tp-header-bottom-right d-flex align-items-center justify-content-end pl-30">
                                    <div class="tp-header-search-2 d-none d-sm-block">
                                        <form action="#">
                                            <input type="text" placeholder="Search for Products...">
                                            <button type="submit">
                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M18.9999 19L14.6499 14.65" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="tp-header-action d-flex align-items-center ml-30">
                                        <div class="tp-header-action-item tp-header-hamburger mr-20 d-xl-none">
                                            <button type="button" class="tp-offcanvas-open-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16"
                                                    viewBox="0 0 30 16">
                                                    <rect x="10" width="20" height="2" fill="currentColor" />
                                                    <rect x="5" y="7" width="25" height="2"
                                                        fill="currentColor" />
                                                    <rect x="10" y="14" width="20" height="2"
                                                        fill="currentColor" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

    <main>

        @yield('content')

        @yield('modal')

    </main>

    <!-- footer area start -->
    <footer>
        <div class="tp-footer-area tp-footer-style-2" data-bg-color="footer-bg-white">
            <div class="tp-footer-top pt-95 pb-40">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12">
                            <div class="tp-footer-widget footer-col-1 mb-50">
                                <div class="tp-footer-widget-content">
                                    <div class="tp-footer-logo">
                                        <a href="{{ route('index') }}">
                                            <img src="{{ asset('/') }}img/logo/logo.png" alt="logo">
                                        </a>
                                    </div>
                                    <p class="text-muted">Diperfects adalah pilihan terpercaya untuk produk skincare dan parfum berkualitas. Temukan kecantikan sejati melalui rangkaian produk perawatan kulit premium dan aroma parfum yang memikat. Keindahan alami dimulai dari sini.</p>
                                    <div class="tp-footer-social">
                                        <a href="https://www.instagram.com/diperfects_official/"><i class="fa-brands fa-instagram"></i></a>
                                        <a href="https://www.tiktok.com/@diperfects_official"><i class="fa-brands fa-tiktok"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="tp-footer-widget footer-col-2 mb-50">
                                <h4 class="tp-footer-widget-title">My Account</h4>
                                <div class="tp-footer-widget-content">
                                    <ul>
                                        <li><a href="#">Track Orders</a></li>
                                        <li><a href="#">Shipping</a></li>
                                        <li><a href="#">Wishlist</a></li>
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="#">Returns</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="tp-footer-widget footer-col-3 mb-50">
                                <h4 class="tp-footer-widget-title">Infomation</h4>
                                <div class="tp-footer-widget-content">
                                    <ul>
                                        {{-- <li><a href="#">Our Story</a></li> --}}
                                        <li><a href="#">Careers</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        {{-- <li><a href="#">Latest News</a></li> --}}
                                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="tp-footer-widget footer-col-4 mb-50">
                                <h4 class="tp-footer-widget-title">Talk To Us</h4>
                                <div class="tp-footer-widget-content">
                                    <div class="tp-footer-talk mb-20">
                                        <span>Got Questions? Call us</span>
                                        <h4><a href="tel:+6282161416162">+628 21-6141-6162</a></h4>
                                    </div>
                                    <div class="tp-footer-contact">
                                        <div class="tp-footer-contact-item d-flex align-items-start">
                                            <div class="tp-footer-contact-icon">
                                                <span>
                                                    <svg width="18" height="16" viewBox="0 0 18 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1 5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6H5"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M13 5.40039L10.496 7.40039C9.672 8.05639 8.32 8.05639 7.496 7.40039L5 5.40039"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M1 11.4004H5.8" stroke="currentColor"
                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M1 8.19922H3.4" stroke="currentColor"
                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="tp-footer-contact-content">
                                                <p><a
                                                        href="mailto:kontakdiperfects@gmail.com">kontakdiperfects@gmail.com</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tp-footer-contact-item d-flex align-items-start">
                                            <div class="tp-footer-contact-icon">
                                                <span>
                                                    <svg width="17" height="20" viewBox="0 0 17 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.50001 10.9417C9.99877 10.9417 11.2138 9.72668 11.2138 8.22791C11.2138 6.72915 9.99877 5.51416 8.50001 5.51416C7.00124 5.51416 5.78625 6.72915 5.78625 8.22791C5.78625 9.72668 7.00124 10.9417 8.50001 10.9417Z"
                                                            stroke="currentColor" stroke-width="1.5" />
                                                        <path
                                                            d="M1.21115 6.64496C2.92464 -0.887449 14.0841 -0.878751 15.7889 6.65366C16.7891 11.0722 14.0406 14.8123 11.6313 17.126C9.88298 18.8134 7.11704 18.8134 5.36006 17.126C2.95943 14.8123 0.210885 11.0635 1.21115 6.64496Z"
                                                            stroke="currentColor" stroke-width="1.5" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="tp-footer-contact-content">
                                                <p>
                                                    <a href="https://maps.app.goo.gl/WGfmL6XsAqdQJ59y7"
                                                        target="_blank">Sentraland Paradise RC-19<br> Parung Panjang,
                                                        Bogor 16360</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tp-footer-bottom">
                <div class="container">
                    <div class="tp-footer-bottom-wrapper">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="tp-footer-copyright">
                                    <p>© 2023 All Rights Reserved | Made with love DI' Perfects.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tp-footer-payment text-md-end">
                                    <p>
                                        <img src="{{ asset('/') }}img/footer/footer-pay-2.png" alt="">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- JS here -->
    <script src="{{ asset('/') }}js/vendor/jquery.js"></script>
    <script src="{{ asset('/') }}js/vendor/waypoints.js"></script>
    <script src="{{ asset('/') }}js/bootstrap-bundle.js"></script>
    <script src="{{ asset('/') }}js/meanmenu.js"></script>
    <script src="{{ asset('/') }}js/swiper-bundle.js"></script>
    <script src="{{ asset('/') }}js/slick.js"></script>
    <script src="{{ asset('/') }}js/range-slider.js"></script>
    <script src="{{ asset('/') }}js/magnific-popup.js"></script>
    <script src="{{ asset('/') }}js/nice-select.js"></script>
    <script src="{{ asset('/') }}js/purecounter.js"></script>
    <script src="{{ asset('/') }}js/countdown.js"></script>
    <script src="{{ asset('/') }}js/wow.js"></script>
    <script src="{{ asset('/') }}js/isotope-pkgd.js"></script>
    <script src="{{ asset('/') }}js/imagesloaded-pkgd.js"></script>
    <script src="{{ asset('/') }}js/ajax-form.js"></script>
    <script src="{{ asset('/') }}js/main.js"></script>
</body>

</html>
