@extends('layouts.admin')

@section('content')
    <x-admin-page-header
        title='Edit Kategori'
        subtitle="Formulir perubahan kategori">

        <a class="btn btn-light" href="{{ route('admin.kategori.index') }}">
            <i class="bi-arrow-left me-1"></i> Kembali
        </a>
    </x-admin-page-header>

    <div class="row justify-content-lg-center">
        <div class="col-lg-8">
            <div class="card mb-3 mb-lg-5">
                <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title">Detail Kategori</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <form action="{{ route('admin.kategori.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $kategori->id }}">
                        <div class="mb-4">
                            <label for="namaLabel" class="form-label">Nama</label>

                            <input type="text" class="form-control" name="nama" id="namaLabel"
                                placeholder="cth. Juna Eau De Parfum" aria-label="cth. Juna Eau De Parfum"
                                value="{{ old('nama') ?? $kategori->nama }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
