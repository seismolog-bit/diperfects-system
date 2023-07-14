@extends('layouts.admin')

@section('content')
    <x-admin-page-header
        title='Edit Tipe Pembership'
        subtitle="Formulir perubahan tipe membership">

        <a class="btn btn-light" href="{{ route('admin.member-type.index') }}">
            <i class="bi-arrow-left me-1"></i> Kembali
        </a>
    </x-admin-page-header>

    <div class="row justify-content-lg-center">
        <div class="col-lg-8">
            <div class="card mb-3 mb-lg-5">
                <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title">Detail tipe</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <form action="{{ route('admin.member-type.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $membership_type->id }}">
                        <div class="mb-4">
                            <label for="namaLabel" class="form-label">Nama</label>

                            <input type="text" class="form-control" name="nama" id="namaLabel"
                                placeholder="cth. Juna Eau De Parfum" aria-label="cth. Juna Eau De Parfum"
                                value="{{ old('nama') ?? $membership_type->nama }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="komisiLabel" class="form-label">Komisi</label>

                            <input type="text" class="form-control" name="komisi" id="komisiLabel"
                                placeholder="cth. Juna Eau De Parfum" aria-label="cth. Juna Eau De Parfum"
                                value="{{ old('komisi') ?? $membership_type->komisi }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
