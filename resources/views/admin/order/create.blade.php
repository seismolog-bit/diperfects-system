@extends('layouts.admin')

@section('content')
    <x-admin-page-header title='Menambahkan pesanan' subtitle="Formulir menambahkan pesanan">
        <a class="btn btn-soft-danger" href="{{ route('admin.order.index') }}">
            <i class="bi-x me-1"></i> Batalkan pesanan
        </a>
    </x-admin-page-header>

    <div class="row">
        <div class="col-lg-8 mb-3 mb-lg-0">
            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <!-- Header -->
                <div class="card-header card-header-content-between">
                    <h4 class="card-header-title">Produk pesanan <span
                            class="badge bg-soft-dark text-dark rounded-circle ms-1">{{ number_format(Cart::getTotalQuantity()) }}</span></h4>
                    <div class="d-flex">
                        <form action="{{ route('cart.clear') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-soft-danger me-3"><i class="bi-trash me-1"></i>Hapus semua
                                produk</button>
                        </form>

                        <button class="btn btn-soft-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#addProduct"><i class="bi-plus me-1"></i>Tambah produk</button>
                    </div>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <!-- Media -->
                    @forelse ($carts as $cart)
                        <div class="d-flex mb-2">
                            <div class="flex-shrink-0">
                                <div class="avatar avatar-lg">
                                    <img class="img-fluid rounded" src="{{ asset($cart->attributes->image) }}"
                                        alt="Image Description">
                                </div>
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <a class="h5 d-block" href="#">{{ $cart->name }}</a>
                                        <p>{{ number_format($cart->price) }}</p>
                                    </div>

                                    <div class="col col-md-3 align-self-center">
                                        <form action="{{ route('carts.update', $cart->id) }}" method="post" class="d-flex">
                                            @csrf @method('patch')
                                            <input type="number" name="quantity" class="form-control me-2"
                                                value="{{ $cart->quantity }}">
                                            <button type="submit" class="btn btn-soft-primary"><i
                                                    class="bi-arrow-up-circle"></i> </button>
                                        </form>
                                    </div>

                                    <div class="col col-md-3 align-self-center d-flex align-items-center text-end">
                                        <div class="h5 w-100 me-2">{{ number_format($cart->price * $cart->quantity) }}</div>
                                        <form action="{{ route('carts.destroy', $cart->id) }}" method="post">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn btn-soft-danger"><i class="bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Produk belum ditambahkan</p>
                    @endforelse

                    <hr>

                    <div class="row justify-content-md-end mb-3">
                        <div class="col-md-8 col-lg-7">
                            <dl class="row text-sm-end">
                                <dt class="col-sm-6">Subtotal:</dt>
                                <dd class="col-sm-6">{{ number_format(Cart::getTotal()) }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-title">Member & Pengiriman</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.order.confirm') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="vendorLabel" class="form-label">Member</label>
                                <a href="{{route('admin.membership.create')}}">Tambah member</a>
                              </div>


                            <div class="tom-select-custom">
                                <select class="js-select form-select" name="membership_id" autocomplete="off"
                                    data-hs-tom-select-options='{
                                    "searchInDropdown": false,
                                    "hidePlaceholderOnSearch": true
                                }'>
                                    {{-- <option value="">Pilih membership...</option> --}}
                                    @foreach ($memberships as $membership)
                                        <option value="{{ $membership->id }}">{{ $membership->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_orderLabel" class="form-label">Tanggal pemesanan</label>

                            <input type="date" class="js-flatpickr form-control flatpickr-custom" id="tanggal_orderLabel" name="tanggal_order" data-hs-flatpickr-options='{
                                "dateFormat": "d/m/Y"
                              }' value="{{ now()->format('Y-m-d') }}">
                        </div>

                        <div class="mb-4">
                            <label for="ongkirLabel" class="form-label">Biaya Pengiriman</label>

                            <input type="number" class="form-control" id="ongkirLabel" placeholder="cth. 10000"
                                name="ongkir" aria-label="cth. 10000">
                        </div>

                        <div class="mb-4">
                            <label for="noteLabel" class="form-label">Catatan</label>

                            <textarea type="text" class="form-control" id="noteLabel" placeholder="Catatan pesanan" name="note"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Konfirmasi Pesanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <x-admin-modal id="addProduct" title="Menambahkan produk">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-12 col-md">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-header-title">Semua Produk</h5>
                        </div>
                    </div>

                    <div class="col-auto">
                        <!-- Filter -->
                        <form>
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend input-group-text">
                                    <i class="bi-search"></i>
                                </div>
                                <input id="datatableWithSearchInput" type="search" class="form-control"
                                    placeholder="Cari produk" aria-label="Cari produk">
                            </div>
                            <!-- End Search -->
                        </form>
                        <!-- End Filter -->
                    </div>
                </div>
            </div>

            <div class="table-responsive datatable-custom">
                <table
                    class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                    data-hs-datatables-options='{
                        "columnDefs": [{
                           "targets": [1],
                           "orderable": false
                         }],
                             "order": [],
                             "search": "#datatableWithSearchInput",
                             "isResponsive": false,
                             "isShowPaging": false,
                             "pagination": "datatableWithSearchPagination"
                           }'>
                    <thead class="thead-light">
                        <tr>
                            <th>Produk</th>
                            <th>Qty</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <div class="avatar avatar-md">
                                                <img class="img-fluid rounded" src="{{ asset($product->image_url) }}"
                                                    alt="Image Description">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="h5 d-block mb-0">{{ $product->nama }}</p>
                                            <p class="mb-1">{{ number_format($product->harga) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form action="{{ route('carts.store') }}" class="d-flex" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->nama }}">
                                        <input type="hidden" name="price" value="{{ $product->harga }}">
                                        <input type="hidden" name="image" value="{{ $product->image_url }}">

                                        <input type="number" class="form-control me-2" name="quantity" required>
                                        <button type="submit" class="btn btn-soft-primary btn-sm"><i
                                                class="bi-plus"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <div class="d-flex justify-content-center justify-content-sm-end">
                    <nav id="datatableWithSearchPagination" aria-label="Activity pagination"></nav>
                </div>
            </div>
        </div>
    </x-admin-modal>
@endsection

@section('script')
    <script>
        (function() {
            HSCore.components.HSDatatables.init('.js-datatable')
            HSCore.components.HSTomSelect.init('.js-select')
            // HSCore.components.HSFlatpickr.init('.js-flatpickr')
        })()
    </script>
@endsection
