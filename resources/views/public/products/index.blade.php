@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <x-page-breadcrumb title="Products" />

    <section class="tp-shop-area pb-120 tp-shop-full-width-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-shop-main-wrapper">
                        <div class="tp-shop-top mb-45">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="tp-shop-top-left d-flex align-items-center ">
                                        <div class="tp-shop-top-tab tp-tab">
                                            <ul class="nav nav-tabs" id="productTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="grid-tab" data-bs-toggle="tab"
                                                        data-bs-target="#grid-tab-pane" type="button" role="tab"
                                                        aria-controls="grid-tab-pane" aria-selected="true">
                                                        <svg width="18" height="18" viewBox="0 0 18 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M16.3327 6.01341V2.98675C16.3327 2.04675 15.906 1.66675 14.846 1.66675H12.1527C11.0927 1.66675 10.666 2.04675 10.666 2.98675V6.00675C10.666 6.95341 11.0927 7.32675 12.1527 7.32675H14.846C15.906 7.33341 16.3327 6.95341 16.3327 6.01341Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M16.3327 15.18V12.4867C16.3327 11.4267 15.906 11 14.846 11H12.1527C11.0927 11 10.666 11.4267 10.666 12.4867V15.18C10.666 16.24 11.0927 16.6667 12.1527 16.6667H14.846C15.906 16.6667 16.3327 16.24 16.3327 15.18Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M7.33268 6.01341V2.98675C7.33268 2.04675 6.90602 1.66675 5.84602 1.66675H3.15268C2.09268 1.66675 1.66602 2.04675 1.66602 2.98675V6.00675C1.66602 6.95341 2.09268 7.32675 3.15268 7.32675H5.84602C6.90602 7.33341 7.33268 6.95341 7.33268 6.01341Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M7.33268 15.18V12.4867C7.33268 11.4267 6.90602 11 5.84602 11H3.15268C2.09268 11 1.66602 11.4267 1.66602 12.4867V15.18C1.66602 16.24 2.09268 16.6667 3.15268 16.6667H5.84602C6.90602 16.6667 7.33268 16.24 7.33268 15.18Z"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="list-tab" data-bs-toggle="tab"
                                                        data-bs-target="#list-tab-pane" type="button" role="tab"
                                                        aria-controls="list-tab-pane" aria-selected="false">
                                                        <svg width="16" height="15" viewBox="0 0 16 15"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15 7.11108H1" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M15 1H1" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M15 13.2222H1" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tp-shop-top-result">
                                            <p>Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of
                                                {{ $products->total() }} results</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div
                                        class="tp-shop-top-right tp-shop-top-right-2 d-sm-flex align-items-center justify-content-md-end">
                                        <div class="tp-shop-top-select">
                                            <select>
                                                <option>Default Sorting</option>
                                                <option>Low to Hight</option>
                                                <option>High to Low</option>
                                                <option>New Added</option>
                                                <option>On Sale</option>
                                            </select>
                                        </div>
                                        <div class="tp-shop-top-filter">
                                            <button type="button" class="tp-filter-btn filter-open-btn">
                                                <span>
                                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M14.9998 3.45001H10.7998" stroke="currentColor"
                                                            stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M3.8 3.45001H1" stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M6.5999 5.9C7.953 5.9 9.0499 4.8031 9.0499 3.45C9.0499 2.0969 7.953 1 6.5999 1C5.2468 1 4.1499 2.0969 4.1499 3.45C4.1499 4.8031 5.2468 5.9 6.5999 5.9Z"
                                                            stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M15.0002 11.15H12.2002" stroke="currentColor"
                                                            stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M5.2 11.15H1" stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M9.4002 13.6C10.7533 13.6 11.8502 12.5031 11.8502 11.15C11.8502 9.79691 10.7533 8.70001 9.4002 8.70001C8.0471 8.70001 6.9502 9.79691 6.9502 11.15C6.9502 12.5031 8.0471 13.6 9.4002 13.6Z"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                Filter
                                            </button>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="tp-shop-items-wrapper tp-shop-item-primary">
                            <div class="tab-content" id="productTabContent">
                                <div class="tab-pane fade show active" id="grid-tab-pane" role="tabpanel"
                                    aria-labelledby="grid-tab" tabindex="0">
                                    <div
                                        class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                                        @foreach ($products as $product)
                                            <div class="col">
                                                <div class="tp-product-item-2 mb-40">
                                                    <div class="tp-product-thumb-2 p-relative z-index-1 fix w-img rounded">
                                                        <a href="{{ route('product.show', $product) }}">
                                                            <img src="{{ asset($product->image_url) }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tp-product-content-2 pt-15">
                                                        <div class="tp-product-tag-2">
                                                            <a
                                                                href="{{ route('product.index', ['category' => $product->kategori->slug]) }}">{{ $product->kategori->nama }}</a>
                                                        </div>
                                                        <h3 class="tp-product-title-2">
                                                            <a
                                                                href="{{ route('product.show', $product) }}">{{ $product->nama }}</a>
                                                        </h3>
                                                        <div class="tp-product-price-wrapper-2">
                                                            <span
                                                                class="tp-product-price-2 new-price">{{ number_format($product->harga) }}</span>
                                                            {{-- <span class="tp-product-price-2 old-price">$475.00</span> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-tab-pane" role="tabpanel" aria-labelledby="list-tab"
                                    tabindex="0">
                                    <div class="tp-shop-list-wrapper tp-shop-item-primary mb-70">
                                        <div class="row justify-content-center">
                                            @foreach ($products as $product)
                                                <div class="col-md-8 mb-3">
                                                    <div class="tp-product-list-item d-md-flex">
                                                        <div class="tp-product-list-thumb p-relative fix rounded"
                                                            style="width: 300px !important">
                                                            <a href="{{ route('product.show', $product) }}">
                                                                <img src="{{ asset($product->image_url) }}"
                                                                    alt="">
                                                            </a>
                                                        </div>
                                                        <div class="tp-product-list-content">
                                                            <div class="tp-product-content-2 pt-15">
                                                                <div class="tp-product-tag-2">
                                                                    <a
                                                                        href="{{ route('product.index', ['category' => $product->kategori->slug]) }}">{{ $product->kategori->nama }}</a>
                                                                </div>
                                                                <h3 class="tp-product-title-2">
                                                                    <a
                                                                        href="{{ route('product.show', $product) }}">{{ $product->nama }}</a>
                                                                </h3>
                                                                <div class="tp-product-price-wrapper-2">
                                                                    <span
                                                                        class="tp-product-price-2 new-price">{{ number_format($product->harga) }}</span>
                                                                    {{-- <span class="tp-product-price-2 old-price">$216.00</span> --}}
                                                                </div>
                                                                {!! Str::limit($product->deskripsi, 65) !!}
                                                                <div class="tp-product-list-add-to-cart">
                                                                    <a href="{{ route('product.show', $product) }}"
                                                                        class="tp-product-list-add-to-cart-btn">Detail</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tp-shop-pagination mt-20">
                            {{-- <div class="tp-pagination"> --}}
                            {{ $products->links() }}
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
