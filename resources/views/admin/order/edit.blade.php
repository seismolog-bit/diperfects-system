@extends('layouts.admin')

@section('content')
    <x-admin-page-header title='Merubah pesanan' subtitle="Formulir perubahan pesanan produk">
        <div class="d-flex">
            <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-soft-danger me-2">
                <i class="bi-x me-1"></i> Batalkan perubahan
            </a>
        </div>
    </x-admin-page-header>

    <div class="row">
        <div class="col-lg-8 mb-3 mb-lg-0">
            <div class="card mb-3 mb-lg-5">
                <div class="card-header card-header-content-between">
                    <h4 class="card-header-title">Detail pesanan <span
                            class="badge bg-soft-dark text-dark rounded-circle ms-1">{{ number_format($order->qty) }}</span>
                    </h4>
                    <div class="d-flex">
                        <button class="btn btn-soft-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#addProduct"><i class="bi-plus me-1"></i>Tambah produk</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1 ms-3">
                            <div class="row">
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <h5>Produk</h5>
                                </div>

                                <div class="col col-md-2 align-self-center">
                                    <h5>Harga</h5>
                                </div>
                                <div class="col col-md-3 align-self-center">
                                    <h5>Qty</h5>
                                </div>
                                <div class="col col-md-3 align-self-center text-center">
                                    <h5>Total</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    @forelse ($order->order_items as $item)
                        <div class="d-flex mb-3">
                            <div class="flex-grow-1 ms-3">
                                <div class="row">
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <input type="text" name="nama" class="form-control me-2"
                                            value="{{ $item->product->nama }}" disabled>
                                    </div>
                                    <div class="col col-md-5 align-self-center">
                                        <form action="{{ route('admin.order-item.update', $item->id) }}" method="post"
                                            class="d-flex">
                                            @csrf @method('patch')
                                            <input type="number" name="harga" class="form-control me-2"
                                                value="{{ $item->harga }}">
                                            <input type="number" name="qty" class="form-control me-2"
                                                value="{{ $item->qty }}">
                                            <button type="submit" class="btn btn-soft-primary"><i
                                                    class="bi-arrow-up-circle"></i> </button>
                                        </form>
                                    </div>
                                    <div class="col col-md-3 align-self-center text-end d-flex">
                                        <input type="text" name="total" class="form-control me-2"
                                            value="{{ number_format($item->total) }}" disabled>
                                        <form action="{{ route('admin.order-item.destroy', $item->id) }}" method="post"
                                            onsubmit="return confirm('Anda yakin ingin menghapus item ini?')">
                                            @csrf @method('delete')
                                            <button type="submit" class="btn btn-soft-danger"><i class="bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Data tidak ditemukan</p>
                    @endforelse

                    <hr>

                    <div class="row justify-content-md-end mb-3">
                        <div class="col-md-8 col-lg-7">
                            <dl class="row text-sm-end">
                                <dt class="col-sm-6">Subtotal:</dt>
                                <dd class="col-sm-6">{{ number_format($order->total) }}</dd>
                                <dt class="col-sm-6">Pengiriman:</dt>
                                <dd class="col-sm-6">{{ number_format($order->ongkir) }}</dd>
                                <dt class="col-sm-6">Total:</dt>
                                <dd class="col-sm-6">{{ number_format($order->grand_total) }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">

            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-header-title">Customer</h4>
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush list-group-no-gutters">
                        <li class="list-group-item">
                            <form action="{{ route('admin.order.update', $order->id) }}" method="post"
                                onsubmit="return confirm('Anda yakin ingin melakukan perubahan di pesanan ini?')">
                                @csrf @method('patch')

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="vendorLabel" class="form-label">Member</label>
                                        <a href="{{ route('admin.membership.create') }}">Tambah member</a>
                                    </div>


                                    <div class="tom-select-custom">
                                        <select class="js-select form-select" name="membership_id" autocomplete="off"
                                            data-hs-tom-select-options='{
                                            "searchInDropdown": false,
                                            "hidePlaceholderOnSearch": true
                                        }'>
                                            @foreach ($memberships as $membership)
                                                <option value="{{ $membership->id }}"
                                                    {{ $order->membership->id == $membership->id ? 'selected' : '' }}>
                                                    {{ $membership->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="tanggal_orderLabel" class="form-label">Tanggal pemesanan</label>

                                    <input type="date" class="js-flatpickr form-control flatpickr-custom"
                                        id="tanggal_orderLabel" name="tanggal_order"
                                        data-hs-flatpickr-options='{
                                        "dateFormat": "d/m/Y"
                                      }'
                                        value="{{ $order->tanggal_order->format('Y-m-d') }}">
                                </div>

                                <div class="mb-4">
                                    <label for="ongkirLabel" class="form-label">Biaya Pengiriman</label>

                                    <input type="number" class="form-control" id="ongkirLabel" placeholder="cth. 10000"
                                        name="ongkir" value="{{ $order->ongkir }}">
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Catatan</h5>
                                    </div>

                                    <span class="d-block text-body">
                                        <textarea name="note" class="form-control">{{ old('note') ?? $order->note }}</textarea>
                                    </span>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Simpan perubahan</button>
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header card-header-content-between">
                    <h4 class="card-header-title">Pembayaran</h4>
                    <a class="link" type="button" data-bs-toggle="modal" data-bs-target="#modalPembayaran">Edit
                        pembayaran</a>
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush list-group-no-gutters">
                        <li class="list-group-item py-0">
                            <div class="d-flex mb-2 justify-content-between align-items-center">
                                <h5>Total pembayaran</h5>
                                <p>{{ number_format($order->payment_cash + $order->payment_transfer) }}</p>
                            </div>
                            <div class="d-flex mb-2 justify-content-between align-items-center">
                                <p class="mb-0">Transfer</p>
                                <p class="mb-0">{{ number_format($order->payment_transfer) }}</p>
                            </div>
                            <div class="d-flex mb-2 justify-content-between align-items-center">
                                <p class="mb-0">Cash</p>
                                <p class="mb-0">{{ number_format($order->payment_cash) }}</p>
                            </div>
                            <hr>

                            <div class="d-flex mb-2 justify-content-between align-items-center">
                                <p class="mb-0">Kekurangan</p>
                                <p class="mb-0">
                                    {{ number_format($order->grand_total - ($order->payment_cash + $order->payment_transfer)) }}
                                </p>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="card-footer card-header-content-between">
                    <a type="button" class="text-primary" data-bs-toggle="modal"
                        data-bs-target="#modalRincianPembayaran">Rincian pembayaran</a>

                    <div class="flex-grow-1 text-end">
                        <i class="bi-chevron-right text-body"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <x-admin-modal id="modalPembayaran" title="Mengubah pembayaran">
        <form action="{{ route('admin.payment.store') }}" method="post">
            @csrf

            <input type="hidden" name="order_id" value="{{ $order->id }}">

            <div class="row mb-4">
                <div class="col-6">
                    <div class="form-check form-check-label-highlighter text-center">
                        <input type="radio" class="form-check-input" name="type" id="type1" checked value=1>
                        <label class="form-check-label p-3 w-100" for="type1">
                            <p class="mb-0">Tambah pembayaran</p>
                        </label>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-check form-check-label-highlighter text-center">
                        <input type="radio" class="form-check-input" name="type" id="type2" value=0>
                        <label class="form-check-label p-3 w-100" for="type2">
                            <p class="mb-0">Kurangi pembayaran</p>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="tanggal_transaksiLabel" class="form-label">Tanggal transaksi</label>
                    <input type="date" class="form-control" id="tanggal_transaksiLabel"
                        value="{{ now()->format('Y-m-d') }}" name="tanggal_transaksi">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="lampiranLabel" class="form-label">Lampiran</label>
                    <input type="file" class="form-control" id="lampiranLabel" name="lampiran" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label for="payment_transferLabel" class="form-label">Pembayaran transfer</label>
                    <input type="number" class="form-control" id="payment_transferLabel" placeholder="cth. 100000"
                        name="payment_transfer">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="payment_cashLabel" class="form-label">Pembayaran cash</label>
                    <input type="number" class="form-control" id="payment_cashLabel" placeholder="cth. 100000"
                        name="payment_cash">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Simpan pembayaran</button>
        </form>
    </x-admin-modal>

    <x-admin-modal id="modalRincianPembayaran" title="Rincian Pembayaran">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tanggal Pembayaran</th>
                    <th scope="col">Transfer</th>
                    <th scope="col">Cash</th>
                    <th scope="col">Status</th>
                    <th scope="col">Lampiran</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($order->payments as $payment)
                    <tr>
                        <td>{{ $payment->tanggal_transaksi }}</td>
                        <td class="text-end">{{ number_format($payment->payment_transfer) }}</td>
                        <td class="text-end">{{ number_format($payment->payment_cash) }}</td>
                        <td class="{{ $payment->type ? '' : 'text-danger' }}">
                            {{ $payment->type ? 'Tambah pembayaran' : 'Pengurangan pembayaran' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm"
                                href="{{ asset($payment->lampiran) }}" target="__blank">
                                    <i class="bi-eye me-1"></i> Lampiran
                                </a>
                                <div class="btn-group">
                                    <button type="button"
                                        class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty"
                                        id="productsEditDropdown8" data-bs-toggle="dropdown"
                                        aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-menu-end mt-1"
                                        aria-labelledby="productsEditDropdown8">
                                        <form action="{{ route('admin.payment.destroy', $payment) }}" method="post"
                                            onsubmit="return confirm('Anda yakin ingin menghapus pembayaran ini?')">
                                            @csrf @method('delete')
                                            <button class="dropdown-item" type="submit">
                                                <i class="bi-trash dropdown-item-icon"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada pembayaran</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-admin-modal>

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
                            <th>Harga x Qty</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>
                                    <p class="h5">{{ $product->nama }}</p>
                                </td>
                                <td>
                                    <form action="{{ route('admin.order-item.store') }}" class="d-flex" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="order_id" value="{{ $order->id }}">

                                        <input type="number" class="form-control me-2 text-end" name="harga"
                                            value="{{ $product->harga }}" required>

                                        <input type="number" class="form-control me-2 text-end" name="qty" required>
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
