@extends('layouts.admin')

@section('content')
    <x-admin-page-header title='Confirmasi pesanan' subtitle="Formulir konfirmasi pesanan produk">
        <div class="d-flex">
            <button onclick="location.href='{{ route('admin.order.edit', $order->id) }}'" type="submit"
                class="btn btn-light me-2" {{ $order->status != 1 ? 'disabled' : '' }}>
                <i class="bi-pencil me-1"></i> Edit pesanan
            </button>
            <a class="btn btn-soft-primary me-2" href="{{ route('admin.order.invoice', $order->id) }}">
                <i class="bi-receipt me-1"></i> Cetak invoice
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
                    {{-- <a class="link" href="{{ route('admin.order.create') }}">Edit pesanan</a> --}}
                </div>

                <div class="card-body">

                    @forelse ($order->order_items as $item)
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <div class="avatar avatar-lg">
                                    <img class="img-fluid rounded" src="{{ asset($item->product->image_url) }}"
                                        alt="Image Description">
                                </div>
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <a class="h5 d-block"
                                            href="ecommerce-product-details.html">{{ $item->product->nama }}</a>
                                    </div>

                                    <div class="col col-md-2 align-self-center">
                                        <h5>{{ number_format($item->harga) }}</h5>
                                    </div>
                                    <div class="col col-md-2 align-self-center">
                                        <h5>{{ number_format($item->qty) }}</h5>
                                    </div>
                                    <div class="col col-md-2 align-self-center text-end">
                                        <h5>{{ number_format($item->total) }}</h5>
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

            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-title">Customer</h4>
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush list-group-no-gutters">
                        <li class="list-group-item">
                            <a class="d-flex align-items-center mb-3" href="#">
                                <div class="avatar avatar-circle">
                                    <img class="avatar-img" src="{{ asset($membership->image_url) }}"
                                        alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span class="text-body text-inherit">{{ $membership->nama }}</span>
                                </div>
                                <div class="flex-grow-1 text-end">
                                    <i class="bi-chevron-right text-body"></i>
                                </div>
                            </a>

                            <ul class="list-unstyled list-py-2 text-body">
                                <li><i class="bi-phone me-2"></i>{{ $membership->nomor_hp }}</li>
                                <li><i class="bi-pin me-2"></i>{{ $membership->alamat }}</li>
                            </ul>
                        </li>

                        <li class="list-group-item">
                            <div class="d-flex mb-2 justify-content-between align-items-center">
                                <h5>Tanggal pesanan</h5>

                                <p>{{ $order->tanggal_order->format('d-m-Y') }}</p>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Catatan</h5>
                            </div>

                            <span class="d-block text-body">
                                {{ $order->note }}
                            </span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3" style="max-width: 40rem;">
        <div class="card card-sm bg-dark border-dark mx-2">
            <div class="card-body">
                <div class="row justify-content-center justify-content-sm-between">
                    <div class="col">
                        <a href="{{ route('admin.order.index') }}" class="btn btn-ghost-danger">Kembali</a>
                    </div>

                    <div class="col-auto">
                        <div class="d-flex gap-3">

                            <form action="{{ route('admin.order.finish', $order->id) }}" method="post"
                                onsubmit="return confirm('Anda yakin ingin membatalkan pesanan ini?')">
                                @csrf
                                <input type="hidden" name="type" value="batal">
                                <button type="submit" class="btn btn-danger"
                                    {{ $order->status != 1 ? 'disabled' : '' }}>Batalkan</button>
                            </form>

                            <form action="{{ route('admin.order.finish', $order->id) }}" method="post"
                                onsubmit="return confirm('Anda yakin ingin menyelesaikan pesanan ini?')">
                                @csrf
                                <input type="hidden" name="type" value="finish">
                                <button type="submit" class="btn btn-success"
                                    {{ $order->status != 1 ? 'disabled' : '' }}>Selesaikan pesanan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <x-admin-modal id="modalPembayaran" title="Mengubah pembayaran">
        <form action="{{ route('admin.payment.store') }}" method="post" enctype="multipart/form-data">
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
                    <input type="file" class="form-control" id="lampiranLabel" name="lampiran">
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
@endsection
