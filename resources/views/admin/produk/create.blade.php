@extends('layouts.admin')

@section('content')
    <x-admin-page-header title='Menambahkan Produk' subtitle="Membuat produk baru" />

    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Informasi produk</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Form -->
                        <div class="mb-4">
                            <label for="namaLabel" class="form-label">Nama <i class="bi-question-circle text-body ms-1"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Products are the goods or services you sell."></i></label>

                            <input type="text" class="form-control" name="nama" id="namaLabel"
                                placeholder="cth. Beauty Skin Care" aria-label="cth. Beauty Skin Care"
                                value="{{ old('nama') }}" required>
                        </div>
                        <!-- End Form -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="categoryLabel" class="form-label">Tipe</label>

                                    <div class="tom-select-custom">
                                        <select class="js-select form-select" autocomplete="off" id="categoryLabel"
                                            data-hs-tom-select-options='{
                            "searchInDropdown": true,
                            "hideSearch": false,
                            "placeholder": "Pilih kategori"
                          }'
                                            name="kategori_id">
                                            @foreach ($kategoris as $kategori)
                                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-4">
                                    <label for="hargaLabel" class="form-label">Harga</label>

                                    <input type="number" class="form-control" name="harga" id="hargaLabel"
                                        placeholder="cth. 50000" aria-label="cth. 50000" required>
                                </div>
                            </div>
                        </div>

                        <label class="form-label">Description <span class="form-label-secondary">(Optional)</span></label>
                        <textarea name="deskripsi" id="summernote" required>{{ old('deskripsi') }}</textarea>
                    </div>
                    <!-- Body -->
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->

            <div class="col-lg-4">
                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Detail</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="imageUrlLabel" class="form-label">Foto</label>

                            <div class="input-group">
                                <input type="file" class="form-control" name="image_url" id="imageUrlLabel"
                                    placeholder="cth. 100" aria-label="cth. 100" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="stokLabel" class="form-label">Stok</label>

                            <div class="input-group">
                                <input type="number" class="form-control" name="stok" id="stokLabel"
                                    placeholder="cth. 100" aria-label="cth. 100" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="beratLabel" class="form-label">Berat</label>

                            <div class="input-group">
                                <input type="number" class="form-control" name="berat" id="beratLabel"
                                    placeholder="cth. 100" aria-label="cth. 100" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="beratLabel" class="form-label">Dimensi (p x l x t)</label>

                            <div class="row">
                                <div class="col-4">
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="panjangLabel"
                                            placeholder="Panjang" name="panjang" aria-label="Panjang" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="lebarLabel"
                                            placeholder="Lebar" name="lebar" aria-label="Lebar" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="tinggiLabel"
                                            placeholder="Tinggi" name="tinggi" aria-label="Tinggi" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <label class="row form-check form-switch mb-3" for="komisiSwitch">
                            <span class="col-8 col-sm-9 ms-0">
                                <span class="text-dark">Komisi membership <i class="bi-question-circle text-body ms-1"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Product availability switch toggler."></i></span>
                            </span>
                            <span class="col-4 col-sm-3 text-end">
                                <input type="checkbox" class="form-check-input" id="komisiSwitch" name="komisi">
                            </span>
                        </label>

                        <label class="row form-check form-switch" for="statusSwitch">
                            <span class="col-8 col-sm-9 ms-0">
                                <span class="text-dark">Status <i class="bi-question-circle text-body ms-1"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Product availability switch toggler."></i></span>
                            </span>
                            <span class="col-4 col-sm-3 text-end">
                                <input type="checkbox" class="form-check-input" id="statusSwitch" name="status" value="1" checked>
                            </span>
                        </label>
                        <!-- End Form Switch -->
                    </div>
                    <!-- Body -->
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->

        <div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3" style="max-width: 40rem;">
            <!-- Card -->
            <div class="card card-sm bg-dark border-dark mx-2">
                <div class="card-body">
                    <div class="row justify-content-center justify-content-sm-between">
                        <div class="col">
                            <a href="{{ route('admin.product.index') }}" class="btn btn-ghost-danger">Batal</a>
                        </div>
                        <!-- End Col -->

                        <div class="col-auto">
                            <div class="d-flex gap-3">
                                {{-- <button type="button" class="btn btn-ghost-light">Discard</button> --}}
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </div>
    </form>
@endsection

@section('script')
    <!-- include summernote css/js -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    // ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['codeview', 'help']]
                ]
            });
        });
    </script>
@endsection
