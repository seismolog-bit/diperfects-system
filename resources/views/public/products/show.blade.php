@extends('layouts.app')

@section('content')
    <section class="breadcrumb__area breadcrumb__style-2 include-bg pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <div class="breadcrumb__list has-icon">
                            <span class="breadcrumb-icon">
                                <i class="fas fa-home me-3"></i>
                            </span>
                            <span><a href="{{ route('index') }}">Home</a></span>
                            <span><a href="{{ route('product.index') }}">Products</a></span>
                            <span><a
                                    href="{{ route('product.index', ['category' => $product->kategori->slug]) }}">{{ $product->kategori->nama }}</a></span>
                            <span>{{ $product->nama }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tp-product-details-area">
        <div class="tp-product-details-top pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                            <nav>
                                <div class="nav nav-tabs flex-sm-column " id="productDetailsNavThumb" role="tablist">
                                    <button class="nav-link active" id="nav-1-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1"
                                        aria-selected="true">
                                        <img src="{{ asset($product->image_url) }}" alt="">
                                    </button>
                                    {{-- <button class="nav-link" id="nav-2-tab" data-bs-toggle="tab" data-bs-target="#nav-2" type="button" role="tab" aria-controls="nav-2" aria-selected="false">
                            <img src="assets/img/product/details/nav/product-details-nav-2.jpg" alt="">
                         </button>
                         <button class="nav-link" id="nav-3-tab" data-bs-toggle="tab" data-bs-target="#nav-3" type="button" role="tab" aria-controls="nav-3" aria-selected="false">
                            <img src="assets/img/product/details/nav/product-details-nav-3.jpg" alt="">
                         </button>
                         <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-4" type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                            <img src="assets/img/product/details/nav/product-details-nav-4.jpg" alt="">
                         </button>
                         <button class="nav-link" id="nav-5-tab" data-bs-toggle="tab" data-bs-target="#nav-5" type="button" role="tab" aria-controls="nav-5" aria-selected="false">
                            <img src="assets/img/product/details/nav/product-details-nav-5.jpg" alt="">
                         </button> --}}
                                </div>
                            </nav>
                            <div class="tab-content m-img" id="productDetailsNavContent">
                                <div class="tab-pane fade show active" id="nav-1" role="tabpanel"
                                    aria-labelledby="nav-1-tab" tabindex="0">
                                    <div class="tp-product-details-nav-main-thumb">
                                        <img src="{{ asset($product->image_url) }}" alt="" class="rounded">
                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab" tabindex="0">
                         <div class="tp-product-details-nav-main-thumb">
                            <img src="assets/img/product/details/main/product-details-main-2.jpg" alt="">
                         </div>
                      </div>
                      <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab" tabindex="0">
                         <div class="tp-product-details-nav-main-thumb">
                            <img src="assets/img/product/details/main/product-details-main-3.jpg" alt="">
                         </div>
                      </div>
                      <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab" tabindex="0">
                         <div class="tp-product-details-nav-main-thumb">
                            <img src="assets/img/product/details/main/product-details-main-4.jpg" alt="">
                         </div>
                      </div>
                      <div class="tab-pane fade" id="nav-5" role="tabpanel" aria-labelledby="nav-5-tab" tabindex="0">
                         <div class="tp-product-details-nav-main-thumb">
                            <img src="assets/img/product/details/main/product-details-main-5.jpg" alt="">
                         </div>
                      </div> --}}
                            </div>
                        </div>
                    </div> <!-- col end -->
                    <div class="col-xl-5 col-lg-6">
                        <div class="tp-product-details-wrapper">
                            <div class="tp-product-details-category">
                                <span>{{ $product->kategori->nama }}</span>
                            </div>
                            <h3 class="tp-product-details-title">{{ $product->nama }}</h3>

                            <!-- inventory details -->
                            <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                                <div class="tp-product-details-stock mb-10">
                                    <span>In Stock</span>
                                </div>
                                <div class="tp-product-details-reviews mb-10">
                                    <span>Views : {{number_format($product->views)}}</span>
                                </div>
                                {{-- <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                         <div class="tp-product-details-rating">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                         </div>
                         <div class="tp-product-details-reviews">
                            <span>(36 Reviews)</span>
                         </div>
                      </div> --}}
                            </div>

                            <!-- price -->
                            <div class="tp-product-details-price-wrapper mb-20">
                                {{-- <span class="tp-product-details-price old-price">$320.00</span> --}}
                                <span class="tp-product-details-price new-price">{{ number_format($product->harga) }}</span>
                            </div>
                            <hr>
                            <div class="tp-product-details-social">
                                <span>Share: </span>
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#"><i class="fa-brands fa-vimeo-v"></i></a>
                            </div>
                            <div class="tp-product-details-msg mb-15">
                                <ul>
                                    <li>30 days easy returns</li>
                                    <li>Order yours before 2.30pm for same day dispatch</li>
                                </ul>
                            </div>
                            <div
                                class="tp-product-details-payment d-flex align-items-center flex-wrap justify-content-between">
                                <p>Guaranteed safe <br> & secure checkout</p>
                                <img src="{{ asset('img/footer/footer-pay-2.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tp-product-details-bottom pb-140">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-product-details-tab-nav tp-tab">
                            <nav>
                                <div class="nav nav-tabs justify-content-center p-relative tp-product-tab" id="nav-tab"
                                    role="tablist">
                                    <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-description" type="button" role="tab"
                                        aria-controls="nav-description" aria-selected="true">Description</button>
                                    <button class="nav-link" id="nav-addInfo-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-addInfo" type="button" role="tab"
                                        aria-controls="nav-addInfo" aria-selected="false">Additional information</button>

                                    <span id="productTabMarker" class="tp-product-details-tab-line"></span>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                                    aria-labelledby="nav-description-tab" tabindex="0">
                                    <div class="tp-product-details-desc-wrapper pt-80">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <div class="tp-product-details-desc-item pb-105">
                                                    <div class="tp-product-details-desc-content pt-25">
                                                        <span>{{ $product->nama }}</span>

                                                        {!! $product->deskripsi !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-addInfo" role="tabpanel"
                                    aria-labelledby="nav-addInfo-tab" tabindex="0">

                                    <div class="tp-product-details-additional-info ">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>Produk</td>
                                                            <td>{{ $product->nama }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Harga</td>
                                                            <td>{{ number_format($product->harga) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kategori</td>
                                                            <td>{{ $product->kategori->nama }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>BPOM</td>
                                                            <td>{{ $product->bpom }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Berat</td>
                                                            <td>{{ $product->berat }} gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dimensi</td>
                                                            <td>{{ $product->panjang }} x {{ $product->lebar }} x
                                                                {{ $product->tinggi }} cm</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tp-related-product pt-95 pb-120">
        <div class="container">
            <div class="row">
                <div class="tp-section-title-wrapper-6 text-center mb-40">
                    <span class="tp-section-title-pre-6">Next day Products</span>
                    <h3 class="tp-section-title-6">Related Products</h3>
                </div>
            </div>
            <div class="row">
                <div class="tp-product-related-slider">
                    <div class="tp-product-related-slider-active swiper-container  mb-10">
                        <div class="swiper-wrapper">
                            @foreach ($relates as $product)
                                <div class="swiper-slide">
                                    <div class="tp-product-item-3 tp-product-style-primary mb-50">
                                        <div class="tp-product-thumb-3 mb-15 fix p-relative z-index-1 rounded">
                                            <a href="{{ route('product.show', $product) }}">
                                                <img src="{{ asset($product->image_url) }}" alt="">
                                            </a>

                                            <!-- product badge -->
                                            {{-- <div class="tp-product-badge">
                                 <span class="product-offer">-25%</span>
                              </div> --}}

                                            <div class="tp-product-add-cart-btn-large-wrapper">
                                                <a href="{{route('product.show', $product)}}" class="tp-product-add-cart-btn-large text-center">
                                                    DETAIL
                                                </a>
                                            </div>
                                        </div>
                                        <div class="tp-product-content-3">
                                            <div class="tp-product-tag-3">
                                                <span>{{ $product->kategori->nama }}</span>
                                            </div>
                                            <h3 class="tp-product-title-3">
                                                <a href="{{ route('product.show', $product) }}">{{ $product->nama }}</a>
                                            </h3>
                                            <div class="tp-product-price-wrapper-3">
                                                <span
                                                    class="tp-product-price-3 new-price">{{ number_format($product->harga) }}</span>
                                                {{-- <span class="tp-product-price-3 old-price">$226.00</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tp-related-swiper-scrollbar tp-swiper-scrollbar"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
