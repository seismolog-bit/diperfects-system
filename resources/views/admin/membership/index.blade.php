@extends('layouts.admin')

@section('content')
    <x-admin-page-header
        title='Membership <span class="badge bg-soft-dark text-dark ms-2">{{ number_format($memberships->count()) }}</span>'
        subtitle="Daftar semua membership">
        <a class="btn btn-primary" href="{{ route('admin.membership.create') }}">
            <i class="bi-person-plus-fill me-1"></i> Tambah Membership
        </a>
    </x-admin-page-header>

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
                        <input id="datatableSearch" type="search" class="form-control" placeholder="Search"
                            aria-label="Search">
                    </div>
                    <!-- End Search -->
                </form>
            </div>

            <div class="d-grid d-sm-flex justify-content-md-end align-items-sm-center gap-2">

                <!-- Dropdown -->
                <div class="dropdown">
                    <button type="button" class="btn btn-white btn-sm dropdown-toggle w-100" id="usersExportDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
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
                                src="{{ asset('assets/svg/illustrations/print-icon.svg') }}" alt="Image Description">
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
                          "targets": [5],
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
                        <th>Tipe</th>
                        <th>Nomor HP</th>
                        <th> orders</th>
                        <th>Alamat</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($memberships as $membership)
                        <tr>
                            <td>
                                <a class="d-flex align-items-center" href="{{ route('admin.membership.show', $membership) }}">
                                    {{-- <div class="flex-shrink-0">
                                        <img class="avatar avatar-lg" src="{{ asset($membership->image_url) }}"
                                            alt="Image Description">
                                    </div> --}}
                                    <div class="flex-grow-1">
                                        <h5 class="text-inherit mb-0">{{ $membership->nama }}</h5>
                                    </div>
                                </a>
                            </td>
                            <td>{{ $membership->membership_type->nama }}</td>
                            <td>{{ $membership->nomor_hp }}</td>
                            <td>{{ $membership->orders->count() }}</td>
                            <td>{{ ucwords(strtolower($membership->kecamatan->name . ', ' . $membership->kabupaten->name . ', ' . $membership->provinsi->name)) }}</td>
                            <td class="text-end">
                                <div class="btn-group" role="group">
                                    <a class="btn btn-white btn-sm" href="{{ route('admin.membership.edit', $membership) }}">
                                        <i class="bi-pencil-fill me-1"></i> Edit
                                    </a>
                                    <div class="btn-group">
                                        <button type="button"
                                            class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty"
                                            id="membershipsEditDropdown8" data-bs-toggle="dropdown"
                                            aria-expanded="false"></button>

                                        <div class="dropdown-menu dropdown-menu-end mt-1"
                                            aria-labelledby="membershipsEditDropdown8">
                                            <form action="{{ route('admin.membership.destroy', $membership->id) }}" method="post"
                                                onsubmit="return confirm('Anda yakin ingin menghapus {{ $membership->nama }}?')">
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
                            <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto"
                                autocomplete="off"
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
