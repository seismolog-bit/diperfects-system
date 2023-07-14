@extends('layouts.admin')

@section('content')
    <x-admin-page-header
        title='Tipe Membership <span class="badge bg-soft-dark text-dark ms-2">{{ number_format($membership_types->count()) }}</span>'
        subtitle="Daftar semua tipe membership" />

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-3 mb-lg-5">
                <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title">Menambahkan tipe</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <form action="{{ route('admin.member-type.store') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label for="namaLabel" class="form-label">Nama</label>

                            <input type="text" class="form-control" name="nama" id="namaLabel"
                                placeholder="cth. Agen Kecil" aria-label="cth. Agen Kecil"
                                value="{{ old('nama') ?? '' }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="komisiLabel" class="form-label">Komisi</label>

                            <input type="text" class="form-control" name="komisi" id="komisiLabel"
                                placeholder="cth. 15" aria-label="cth. 15"
                                value="{{ old('komisi') ?? '' }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-3 mb-lg-0">
            <div class="card">
                <!-- Header -->
                <div class="card-header card-header-content-md-between">
                    <div class="mb-2 mb-md-0">
                        <form>
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend input-group-text">
                                    <i class="bi-search"></i>
                                </div>
                                <input id="datatableSearch" type="search" class="form-control" placeholder="Search users"
                                    aria-label="Search users">
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>

                    <div class="d-grid d-sm-flex justify-content-md-end align-items-sm-center gap-2">

                        <!-- Dropdown -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-white btn-sm dropdown-toggle w-100"
                                id="usersExportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-download me-2"></i> Export
                            </button>

                            <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                                <span class="dropdown-header">Options</span>
                                <a id="export-copy" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="{{ asset('assets/svg/illustrations/copy-icon.svg') }}" alt="Image Description">
                                    Copy
                                </a>
                                <a id="export-print" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="{{ asset('assets/svg/illustrations/print-icon.svg') }}"
                                        alt="Image Description">
                                    Print
                                </a>
                                <div class="dropdown-divider"></div>
                                <span class="dropdown-header">Download options</span>
                                <a id="export-excel" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="{{ asset('assets/svg/brands/excel-icon.svg') }}" alt="Image Description">
                                    Excel
                                </a>
                                <a id="export-csv" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="{{ asset('assets/svg/components/placeholder-csv-format.svg') }}"
                                        alt="Image Description">
                                    .CSV
                                </a>
                                <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4x3 me-2"
                                        src="{{ asset('assets/svg/brands/pdf-icon.svg') }}" alt="Image Description">
                                    PDF
                                </a>
                            </div>
                        </div>
                        <!-- End Dropdown -->
                    </div>
                </div>
                <!-- End Header -->

                <!-- Table -->
                <div class="table-responsive datatable-custom">
                    <table id="datatable"
                        class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                        data-hs-datatables-options='{
                           "columnDefs": [{
                              "targets": [2],
                              "orderable": false
                            }],
                           "order": [],
                           "info": {
                             "totalQty": "#datatableWithPaginationInfoTotalQty"
                           },
                           "search": "#datatableSearch",
                           "entries": "#datatableEntries",
                           "pageLength": 15,
                           "isResponsive": false,
                           "isShowPaging": false,
                           "pagination": "datatablePagination"
                         }'>
                        <thead class="thead-light">
                            <tr>
                                <th>Nama</th>
                                <th>Komisi</th>
                                <th>Total Membership</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($membership_types as $membership_type)
                                <tr>
                                    <td>{{ $membership_type->nama }}</td>
                                    <td>{{ $membership_type->komisi }} %</td>
                                    <td>{{ $membership_type->memberships->count() }} member</td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-white btn-sm"
                                                href="{{ route('admin.member-type.edit', $membership_type->id) }}">
                                                <i class="bi-pencil-fill me-1"></i> Edit
                                            </a>
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty"
                                                    id="productsEditDropdown8" data-bs-toggle="dropdown"
                                                    aria-expanded="false"></button>

                                                <div class="dropdown-menu dropdown-menu-end mt-1"
                                                    aria-labelledby="productsEditDropdown8">
                                                    <form action="{{ route('admin.member-type.destroy', $membership_type->id) }}" method="post"
                                                        onsubmit="return confirm('Anda yakin ingin menghapus {{ $membership_type->nama }}?')">
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
                                    <td colspan="3">Data tidak ditemukan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- End Table -->

                <!-- Footer -->
                <div class="card-footer">
                    <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                        <div class="col-sm mb-2 mb-sm-0">
                            <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                                <span class="me-2">Showing:</span>

                                <!-- Select -->
                                <div class="tom-select-custom">
                                    <select id="datatableEntries"
                                        class="js-select form-select form-select-borderless w-auto" autocomplete="off"
                                        data-hs-tom-select-options='{
                                    "searchInDropdown": false,
                                    "hideSearch": true
                                  }'>
                                        <option value="10">10</option>
                                        <option value="15" selected>15</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                                <!-- End Select -->

                                <span class="text-secondary me-2">of</span>

                                <!-- Pagination Quantity -->
                                <span id="datatableWithPaginationInfoTotalQty"></span>
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="col-sm-auto">
                            <div class="d-flex justify-content-center justify-content-sm-end">
                                <!-- Pagination -->
                                <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).on('ready', function() {
            // INITIALIZATION OF DATATABLES
            // =======================================================
            HSCore.components.HSDatatables.init($('#datatable'), {
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copy',
                        className: 'd-none'
                    },
                    {
                        extend: 'excel',
                        className: 'd-none'
                    },
                    {
                        extend: 'csv',
                        className: 'd-none'
                    },
                    {
                        extend: 'pdf',
                        className: 'd-none'
                    },
                    {
                        extend: 'print',
                        className: 'd-none'
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child input[type="checkbox"]',
                    classMap: {
                        checkAll: '#datatableCheckAll',
                        counter: '#datatableCounter',
                        counterInfo: '#datatableCounterInfo'
                    }
                },
                language: {
                    zeroRecords: `<div class="text-center p-4">
              <img class="mb-3" src="./assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="./assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
            <p class="mb-0">No data to show</p>
            </div>`
                }
            });

            const datatable = HSCore.components.HSDatatables.getItem(0)

            $('#export-copy').click(function() {
                datatable.button('.buttons-copy').trigger()
            });

            $('#export-excel').click(function() {
                datatable.button('.buttons-excel').trigger()
            });

            $('#export-csv').click(function() {
                datatable.button('.buttons-csv').trigger()
            });

            $('#export-pdf').click(function() {
                datatable.button('.buttons-pdf').trigger()
            });

            $('#export-print').click(function() {
                datatable.button('.buttons-print').trigger()
            });

            $('.js-datatable-filter').on('change', function() {
                var $this = $(this),
                    elVal = $this.val(),
                    targetColumnIndex = $this.data('target-column-index');

                datatable.column(targetColumnIndex).search(elVal).draw();
            });
        });
    </script>
@endsection
