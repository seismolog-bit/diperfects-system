@extends('layouts.admin')

@section('content')
    <x-admin-page-header
        title='Laporan Pesanan <span class="badge bg-soft-dark text-dark ms-2">{{ number_format($orders->count()) }}</span>'
        subtitle="Tanggal {{$startDate->format('d-m-Y') . ' - ' . $endDate->format('d-m-Y')}}">
        {{-- <div class="d-flex"> --}}
            <form action="{{route('admin.report.index')}}" method="get" class="d-flex">
                <input type="text" class="js-daterangepicker form-control daterangepicker-custom-input me-3"
                data-hs-daterangepicker-options='{
                "autoApply": true
              }' value="{{ $dates }}" name="dates">
              <button type="submit" class="btn btn-icon-only btn-light"> <i class='bi-arrow-right'></i> </button>
            </form>
        {{-- </div> --}}
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
                          "targets": [0, 5, 6],
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
                        <th>Invoice</th>
                        <th>Member</th>
                        <th>Total</th>
                        <th>Pembayaran</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>
                                <a href="{{route('admin.order.show', $order->id)}}"><b>{{ $order->code }}</b></a>
                            </td>
                            <td>{{ $order->membership->nama }}</td>
                            <td class="text-end">{{ number_format($order->grand_total) }}</td>
                            <td class="text-end">{{ number_format($order->payment_cash + $order->payment_transfer) }}</td>
                            <td>{{ $order->tanggal_order->format('d-m-Y') }}</td>
                            <td>
                                @if ($order->status == 1)
                                    <span class="badge bg-soft-warning text-warning">
                                        Aktif
                                    </span>
                                @elseif($order->status == 2)
                                    <span class="badge bg-soft-success text-success">
                                        Selesai
                                    </span>
                                @else
                                    <span class="badge bg-soft-danger text-danger">
                                        Dibatalkan
                                    </span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="btn-group" role="group">
                                    <a class="btn btn-white btn-sm" href="{{ route('admin.order.edit', $order) }}">
                                        <i class="bi-pencil-fill me-1"></i> Edit
                                    </a>
                                    <div class="btn-group">
                                        <button type="button"
                                            class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty"
                                            id="ordersEditDropdown8" data-bs-toggle="dropdown"
                                            aria-expanded="false"></button>

                                        <div class="dropdown-menu dropdown-menu-end mt-1"
                                            aria-labelledby="ordersEditDropdown8">
                                            <form action="{{ route('admin.order.destroy', $order->id) }}" method="post"
                                                onsubmit="return confirm('Anda yakin ingin membatalkan pesanan ini?')">
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
        (function() {
            HSCore.components.HSDaterangepicker.init('.js-daterangepicker')
        })();
    </script>
@endsection
