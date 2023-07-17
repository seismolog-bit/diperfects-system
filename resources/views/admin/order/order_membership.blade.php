@extends('layouts.admin')

@section('content')
    <x-admin-page-header
        title='Pesanan membership <span class="badge bg-soft-dark text-dark ms-2">{{ number_format($memberships->count()) }}</span>'
        subtitle="Daftar semua pesanan berdasarkan membership">
        {{-- <a class="btn btn-primary" href="{{ route('admin.membership.create') }}">
            <i class="bi-person-plus-fill me-1"></i> Tambah Membership
        </a> --}}
    </x-admin-page-header>

    <div class="card card-body mb-3 mb-lg-5">
        <div class="row col-lg-divider gx-lg-6">
            <div class="col-lg-3">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h6 class="card-subtitle mb-3">Total Pesanan</h6>
                        <h3 class="card-title">{{number_format($orders->count())}}</h3>
                    </div>

                    <span class="icon icon-soft-primary icon-sm icon-circle ms-3">
                        <i class="bi-receipt"></i>
                    </span>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h6 class="card-subtitle mb-3">Total transaksi</h6>
                        <h3 class="card-title">{{number_format($orders->sum('grand_total'))}}</h3>
                    </div>

                    <span class="icon icon-soft-info icon-sm icon-circle ms-3">
                        <i class="bi-currency-dollar"></i>
                    </span>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h6 class="card-subtitle mb-3">Total Pembayaran</h6>
                        <h3 class="card-title">{{number_format($orders->sum('payment_transfer') + $orders->sum('payment_cash'))}}</h3>
                    </div>

                    <span class="icon icon-soft-warning icon-sm icon-circle ms-3">
                        <i class="bi-credit-card"></i>
                    </span>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h6 class="card-subtitle mb-3">Total Kekurangan</h6>
                        <h3 class="card-title">{{number_format($orders->sum('grand_total') - ($orders->sum('payment_transfer') + $orders->sum('payment_cash')))}}</h3>
                    </div>

                    <span class="icon icon-soft-danger icon-sm icon-circle ms-3">
                        <i class="bi-dash"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

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
                          "targets": [],
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
                        <th>Transaksi</th>
                        <th>Total pesanan</th>
                        <th>Pembayaran</th>
                        <th>Kekurangan </th>
                        {{-- <th></th> --}}
                    </tr>
                </thead>

                <tbody>
                    @forelse ($memberships as $membership)
                        <tr>
                            <td>
                                <a class="d-flex align-items-center" href="{{ route('admin.order_membership.show', $membership->id) }}">
                                    <div class="flex-grow-1">
                                        <h5 class="text-inherit mb-0">{{ $membership->nama }}</h5>
                                    </div>
                                </a>
                            </td>
                            <td>{{ $membership->membership_type->nama }}</td>
                            <td>{{ $membership->nomor_hp }}</td>
                            <td class="text-center">{{ number_format($membership->orders->count()) }}</td>
                            <td class="text-end">{{ number_format($membership->orders->sum('grand_total')) }}</td>
                            <td class="text-end">{{ number_format($membership->orders->sum('payment_transfer') + $membership->orders->sum('payment_cash')) }}</td>
                            <td class="text-end">{{ number_format($membership->orders->sum('grand_total') - ($membership->orders->sum('payment_transfer') + $membership->orders->sum('payment_cash'))) }}</td>
                            {{-- <td class="text-end">
                                <div class="btn-group" role="group">
                                    <a class="btn btn-white btn-sm" href="{{ route('admin.membership.edit', $membership) }}">
                                        <i class="bi-eye me-1"></i> View
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
                            </td> --}}
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
