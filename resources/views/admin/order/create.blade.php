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
                            class="badge bg-soft-dark text-dark rounded-circle ms-1">{{ number_format(Cart::getTotalQuantity()) }}</span>
                    </h4>
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
                                {{-- <a href="{{ route('admin.membership.create') }}">Tambah member</a> --}}
                                <a class="form-label text-primary" type="button" data-bs-toggle="modal" data-bs-target="#addMembership"></i>Tambah membership</a>
                            </div>


                            <div class="tom-select-custom">
                                <select class="js-select form-select" name="membership_id" autocomplete="off"
                                    data-hs-tom-select-options='{
                                    "searchInDropdown": false,
                                    "hidePlaceholderOnSearch": true
                                }'>
                                    {{-- <option value="">Pilih membership...</option> --}}
                                    @foreach ($memberships as $membership)
                                        <option value="{{ $membership->id }}"
                                            {{ old('membership_id') == $membership->id ? 'selected' : '' }}>
                                            {{ $membership->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_orderLabel" class="form-label">Tanggal pemesanan</label>

                            <input type="date" class="js-flatpickr form-control flatpickr-custom" id="tanggal_orderLabel"
                                name="tanggal_order"
                                data-hs-flatpickr-options='{
                                "dateFormat": "d/m/Y"
                              }'
                                value="{{ old('tanggal_order') ?? now()->format('Y-m-d') }}">
                        </div>

                        <div class="mb-4">
                            <label for="ongkirLabel" class="form-label">Biaya Pengiriman</label>

                            <input type="number" class="form-control" id="ongkirLabel" placeholder="cth. 10000"
                                name="ongkir" aria-label="cth. 10000" value="{{ old('ongkir') }}">
                        </div>

                        <div class="mb-4">
                            <label for="noteLabel" class="form-label">Catatan</label>

                            <textarea type="text" class="form-control" id="noteLabel" placeholder="Catatan pesanan" name="note" required>{{ old('note') }}</textarea>
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

    <x-admin-modal id="addMembership" title="Menambahkan member">
        <div class="card mb-3 mb-lg-5">
            <!-- Header -->
            <div class="card-header">
                <h4 class="card-header-title">Informasi member</h4>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="card-body">
                <form action="{{ route('admin.membership.store') }}" method="post" class="row"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="order" value="1">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="namaLabel" class="form-label">Nama</label>

                            <input type="text" class="form-control" name="nama" id="namaLabel"
                                placeholder="Nama lengkap" aria-label="Nama lengkap" value="{{ old('nama') }}"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="image_urlLabel" class="form-label">Foto</label>

                            <input type="file" class="form-control" name="image_url" id="image_urlLabel" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="nomor_hpLabel" class="form-label">Nomor HP</label>

                            <input type="text" class="form-control" name="nomor_hp" id="nomor_hpLabel"
                                placeholder="0896XXXXXXXX" aria-label="0896XXXXXXXX"
                                value="{{ old('nomor_hp') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="membership_type_idLabel" class="form-label">Tipe memberhsip</label>

                            <div class="tom-select-custom">
                                <select class="js-select form-select" autocomplete="off"
                                    id="membership_type_idLabel"
                                    data-hs-tom-select-options='{
                    "placeholder": "Pilih tipe"
                  }'
                                    name="membership_type_id" required>
                                    @foreach ($membership_types as $membership_type)
                                        <option value="{{ $membership_type->id }}">{{ $membership_type->nama }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="alamatLabel" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamatLabel" class="form-control" placeholder="Alamat lengkap" required>{{ old('alamat') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="provinsi_idLabel" class="form-label">Provinsi</label>

                            <div class="tom-select-custom">
                                <select class="js-select form-select" autocomplete="off" id="provinsi_idLabel"
                                    data-hs-tom-select-options='{
                    "placeholder": "Pilih tipe"
                  }'
                                    name="provinsi_id">
                                    <option>Pilih..</option>
                                    @foreach ($provinsis as $provinsi)
                                        <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                    @endforeach
                                </select required>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="kebupaten_idLabel" class="form-label">Kabupaten/Kota</label>

                            <select class="form-select" autocomplete="off" id="kebupaten_idLabel"
                                name="kabupaten_id">
                            </select required>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="kecamatan_idLabel" class="form-label">Kecamatan</label>

                            <select class="form-select" autocomplete="off" id="kecamatan_idLabel"
                                name="kecamatan_id">
                            </select required>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="kelurahan_idLabel" class="form-label">Kelurahan</label>

                            <div class="tom-select-custom">
                                <select class="form-select" autocomplete="off" id="kelurahan_idLabel"
                                    name="kelurahan_id" required>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="row form-check form-switch" for="statusSwitch">
                            <span class="col-8 col-sm-9 ms-0">
                                <span class="text-dark">Status <i class="bi-question-circle text-body ms-1"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Product availability switch toggler."></i></span>
                            </span>
                            <span class="col-4 col-sm-3 text-end">
                                <input type="checkbox" class="form-check-input" id="statusSwitch" name="status"
                                    value="1" checked>
                            </span>
                        </label>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </div>
                </form>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('change', '#provinsi_idLabel', function() {
                var prov_id = $(this).val();

                var div = $(this).parent();

                var op = " ";
                $('#kebupaten_idLabel').empty();
                $('#kecamatan_idLabel').empty();

                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('kabupaten-search') !!}',
                    data: {
                        'id': prov_id
                    },
                    success: function(data) {

                        $("#kebupaten_idLabel").append('<option>Pilih...</option>');
                        if (data) {
                            if (data == 0) {
                                $('#kebupaten_idLabel').empty();
                                $('#kecamatan_idLabel').empty();
                            }

                            $.each(data, function(key, value) {

                                $('#kebupaten_idLabel').append($("<option/>", {
                                    value: value.id,
                                    text: value.name
                                }));
                            });
                        }
                    },
                    error: function() {
                        console.log('error');
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('change', '#kebupaten_idLabel', function() {
                var prov_id = $(this).val();

                var div = $(this).parent();

                var op = " ";
                $('#kecamatan_idLabel').empty();
                $('#kelurahan_idLabel').empty();

                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('kecamatan-search') !!}',
                    data: {
                        'id': prov_id
                    },
                    success: function(data) {
                        $("#kecamatan_idLabel").append('<option>Pilih...</option>');
                        if (data) {
                            if (data == 0) {
                                $('#kecamatan_idLabel').empty();
                                $('#kelurahan_idLabel').empty();
                                // $('#kelurahan').empty();
                            }

                            $.each(data, function(key, value) {

                                $('#kecamatan_idLabel').append($("<option/>", {
                                    value: value.id,
                                    text: value.name
                                }));
                            });
                        }
                    },
                    error: function() {
                        console.log('error');
                    }
                });
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('change', '#kecamatan_idLabel', function() {
                var prov_id = $(this).val();

                var div = $(this).parent();

                var op = " ";
                // $('#kecamatan_idLabel').empty();
                $('#kelurahan_idLabel').empty();

                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('kelurahan-search') !!}',
                    data: {
                        'id': prov_id
                    },
                    success: function(data) {
                        $("#kecamatan_idLabel").append('<option>Pilih...</option>');
                        if (data) {
                            if (data == 0) {
                                // $('#kecamatan_idLabel').empty();
                                $('#kelurahan_idLabel').empty();
                                // $('#kelurahan').empty();
                            }

                            $.each(data, function(key, value) {

                                $('#kelurahan_idLabel').append($("<option/>", {
                                    value: value.id,
                                    text: value.name
                                }));
                            });
                        }
                    },
                    error: function() {
                        console.log('error');
                    }
                });
            });
        });
    </script>
@endsection
