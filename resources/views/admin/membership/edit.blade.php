@extends('layouts.admin')

@section('content')
    <x-admin-page-header title='Mengubah Data Member' subtitle="Formulir mengubah data member">

        <a class="btn btn-light" href="{{ route('admin.membership.index') }}">
            <i class="bi-arrow-left me-1"></i> Kembali
        </a>
    </x-admin-page-header>

    <div class="row justify-content-lg-center">
        <div class="col-lg-8">
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
                        <input type="hidden" name="id" value="{{$membership->id}}">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="namaLabel" class="form-label">Nama</label>

                                <input type="text" class="form-control" name="nama" id="namaLabel"
                                    placeholder="cth. Juna Eau De Parfum" aria-label="cth. Juna Eau De Parfum"
                                    value="{{ old('nama') ?? $membership->nama }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="image_urlLabel" class="form-label">Foto</label>

                                <input type="file" class="form-control" name="image_url" id="image_urlLabel"
                                    placeholder="cth. Juna Eau De Parfum" aria-label="cth. Juna Eau De Parfum">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="nomor_hpLabel" class="form-label">Nomor HP</label>

                                <input type="text" class="form-control" name="nomor_hp" id="nomor_hpLabel"
                                    placeholder="cth. Juna Eau De Parfum" aria-label="cth. Juna Eau De Parfum"
                                    value="{{ old('nomor_hp') ?? $membership->nomor_hp }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="membership_type_idLabel" class="form-label">Tipe memberhsip</label>

                                <div class="tom-select-custom">
                                    <select class="js-select form-select" autocomplete="off" id="membership_type_idLabel"
                                        data-hs-tom-select-options='{
                        "placeholder": "Pilih tipe"
                      }'
                                        name="membership_type_id" required>
                                        @foreach ($membership_types as $membership_type)
                                            <option value="{{ $membership_type->id }}" {{$membership_type->id == $membership->membership_type_id ? 'selected' : ''}}>{{ $membership_type->nama }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="alamatLabel" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamatLabel" class="form-control" required>{{ old('alamat') ?? $membership->alamat }}</textarea>
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
                                            <option value="{{ $provinsi->id }}" {{$membership->provinsi_id == $provinsi->id ? 'selected' : ''}}>{{ $provinsi->name }}</option>
                                        @endforeach
                                    </select required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="kebupaten_idLabel" class="form-label">Kabupaten/Kota</label>

                                <select class="form-select" autocomplete="off" id="kebupaten_idLabel" name="kabupaten_id">
                                    <option value="{{$membership->kabupaten_id}}">{{$membership->kabupaten->name}}</option>
                                </select required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="kecamatan_idLabel" class="form-label">Kecamatan</label>

                                <select class="form-select" autocomplete="off" id="kecamatan_idLabel" name="kecamatan_id">
                                    <option value="{{$membership->kecamatan_id}}">{{$membership->kecamatan->name}}</option>
                                </select required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="kelurahan_idLabel" class="form-label">Kelurahan</label>

                                <div class="tom-select-custom">
                                    <select class="form-select" autocomplete="off" id="kelurahan_idLabel" name="kelurahan_id" required>
                                        <option value="{{$membership->kelurahan_id}}">{{$membership->kelurahan->name}}</option>
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
                                    <input type="checkbox" class="form-check-input" id="statusSwitch" name="status" value="1" {{$membership->status ? 'checked' : ''}}>
                                </span>
                            </label>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
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
