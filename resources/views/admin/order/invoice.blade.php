<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Laralink">
    <!-- Site Title -->
    <title>Invoice #{{ $order->code }}</title>
    <link rel="stylesheet" href="{{ asset('assets/invoice/css/style.css') }}">
</head>

<body>
    <div class="tm_container">
        <div class="tm_invoice_wrap">
            <div class="tm_invoice tm_style2" id="tm_download_section">
                <div class="tm_invoice_in">
                    <div class="tm_invoice_head tm_mb20">
                        <div class="tm_invoice_left">
                            <div class="tm_logo">
                                <img src="{{ asset('assets/img/logo-text.png') }}" alt="Logo">
                                {{-- <p>DI' Perfects Beauty & Authentic Perfume</p> --}}
                            </div>
                        </div>
                        <div class="tm_invoice_right">
                            <div class="tm_grid_row tm_col_2">
                                <div>
                                    <b class="tm_primary_color">Kontak</b> <br> +62 821-6141-6162
                                    <br> kontakdperfect@gmail.com
                                </div>
                                <div>
                                    <b class="tm_primary_color">Alamat</b> <br> Sentraland Paradise RC-19, Parung
                                    Panjang, Bogor - Indonesia <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tm_invoice_info tm_mb10">
                        <div class="tm_invoice_info_left">
                            <p class="tm_mb2"><b>Untuk:</b></p>
                            <p>
                                <b class="tm_f16 tm_primary_color">{{ $order->membership->nama }}</b> <br>
                                {{ $order->membership->alamat }} <br>
                                {{ $order->membership->nomor_hp }}
                            </p>
                        </div>
                        <div class="tm_invoice_info_right">
                            {{-- <div class="tm_ternary_color tm_f50 tm_text_uppercase tm_text_center tm_invoice_title tm_mb15 tm_mobile_hide"> Invoice</div> --}}
                            <div class="tm_grid_row tm_col_2 tm_invoice_info_in tm_gray_bg tm_round_border">
                                <div>
                                    <span>Nomor Invoice:</span> <br>
                                    <b class="tm_primary_color">#{{ $order->code }}</b>
                                </div>
                                <div>
                                    <span>Tanggal:</span> <br>
                                    <b class="tm_primary_color">{{ $order->tanggal_order->format('d-m-Y') }}</b>
                                </div>
                                <div>
                                    <span>Status Pemesanan:</span> <br>
                                    <b class="tm_sucess_bg">
                                        @if ($order->status == 1)
                                            Aktif
                                        @elseif ($order->status == 2)
                                            Selesai
                                        @else
                                            Dibatalkan
                                        @endif
                                    </b>
                                </div>
                                {{-- <div>
                                    <span>Metode Pembayaran:</span> <br>
                                    <b class="tm_primary_color">{{ $order->payment->method }}</b>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="tm_table tm_style1">
                        <div class="tm_round_border">
                            <div class="tm_table_responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="tm_width_6 tm_semi_bold tm_primary_color">PRODUK</th>
                                            <th class="tm_width_2 tm_semi_bold tm_primary_color tm_text_center">JUMLAH
                                            </th>
                                            <th class="tm_width_2 tm_semi_bold tm_primary_color tm_text_center">SATUAN
                                            </th>
                                            <th class="tm_width_2 tm_semi_bold tm_primary_color tm_text_center">TOTAL
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->order_items as $item)
                                            <tr>
                                                <td class="tm_width_6">
                                                    {{ $item->product->nama }}
                                                </td>
                                                <td class="tm_width_2 tm_text_center">{{ $item->qty }}</td>
                                                <td class="tm_width_2 tm_text_right">
                                                    {{ number_format($item->harga) }}
                                                </td>
                                                <td class="tm_width_2 tm_text_right">
                                                    {{ number_format($item->total) }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tm_invoice_footer">
                            <div class="tm_left_footer">
                                <p class="tm_mb2"><b class="tm_primary_color">Catatan: </b></p>
                                <p>{{ $order->note ?? '-' }}</p>

                                <p class="tm_mb2"><b class="tm_primary_color">Info Pembayaran: </b></p>
                                <p>Lalukan pembayaran langsung ke rekening Bank kami. Gunakan Nomor Invoice anda sebagai
                                    referensi pembayaran.</p>
                                <p class="tm_m0">Bank BCA - <b>1720 02 1991 (Dede Nuryanah) </b></p>
                                {{-- <p class="tm_m0">Bank Mandiri - <b>1720 02 1991 (Dede Nuryanah) </b></p> --}}
                            </div>
                            <div class="tm_right_footer">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">SUBTOTAL
                                                ({{ $order->qty }} Produk)</td>
                                            <td
                                                class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">
                                                {{ number_format($order->total) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tm_width_3 tm_border_none tm_pt0">Pengiriman</td>
                                            <td class="tm_width_3 tm_text_right tm_border_none tm_pt0">
                                                {{ number_format($order->ongkir) }}</td>
                                        </tr>
                                        {{-- <tr>
                                            <td class="tm_width_3 tm_border_top_0 tm_pt0">Komisi </td>
                                            <td class="tm_width_3 tm_text_right tm_border_none tm_pt0">
                                                {{ number_format($order->grand_total) }}</td>
                                        </tr> --}}

                                        <tr>
                                            <td
                                                class="tm_width_3 tm_bold tm_border_top_0 tm_f16 tm_white_color tm_accent_bg tm_radius_6_0_0_6">
                                                Total Pembayaran </td>
                                            <td
                                                class="tm_width_3 tm_bold tm_border_top_0 tm_f16 tm_primary_color tm_text_right tm_white_color tm_accent_bg tm_radius_0_6_6_0">

                                                {{ number_format($order->grand_total, 0) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="tm_pb10 tm_border_top_0"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                Komisi hanya didapat dari total pemesanan produk dan tidak termasuk
                                                biaya pengiriman.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tm_note tm_text_center tm_m0_md">
                        <p class="tm_m0">Invoice ini dinyatakan sah dan diproses oleh komputer. <br>
                            Silakan hubungi <a href="tel:+62821-6141-6162"><b>Customer Service</b></a> apabila kamu
                            membutuhkan bantuan.</p>
                    </div>
                    <!-- .tm_note -->
                </div>
            </div>
            <div class="tm_invoice_btns tm_hide_print">
                <a href="javascript:window.print()" class="tm_invoice_btn tm_color2">
                    <span class="tm_btn_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                            <path
                                d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                                fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <rect x="128" y="240" width="256" height="208" rx="24.32"
                                ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round"
                                stroke-width="32" />
                            <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                                stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <circle cx="392" cy="184" r="24" fill='currentColor' />
                        </svg>
                    </span>
                    <span class="tm_btn_text">Print</span>
                </a>
                <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
                    <span class="tm_btn_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                            <path
                                d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="32" />
                        </svg>
                    </span>
                    <span class="tm_btn_text">Download</span>
                </button>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/invoice/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/invoice/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('assets/invoice/js/html2canvas.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/invoice/js/main.js') }}"></script> --}}

    <script>
        (function($) {
            'use strict';

            $('#tm_download_btn').on('click', function() {
                var downloadSection = $('#tm_download_section');
                var cWidth = downloadSection.width();
                var cHeight = downloadSection.height();
                var topLeftMargin = 0;
                var pdfWidth = cWidth + topLeftMargin * 2;
                var pdfHeight = pdfWidth * 1.5 + topLeftMargin * 2;
                var canvasImageWidth = cWidth;
                var canvasImageHeight = cHeight;
                var totalPDFPages = Math.ceil(cHeight / pdfHeight) - 1;

                html2canvas(downloadSection[0], {
                    allowTaint: true
                }).then(function(
                    canvas
                ) {
                    canvas.getContext('2d');
                    var imgData = canvas.toDataURL('image/jpg', 1.0);
                    var pdf = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);
                    pdf.addImage(
                        imgData,
                        'jpg',
                        topLeftMargin,
                        topLeftMargin,
                        canvasImageWidth,
                        canvasImageHeight
                    );
                    for (var i = 1; i <= totalPDFPages; i++) {
                        pdf.addPage(pdfWidth, pdfHeight);
                        pdf.addImage(
                            imgData,
                            'jpg',
                            topLeftMargin, -(pdfHeight * i) + topLeftMargin * 0,
                            canvasImageWidth,
                            canvasImageHeight
                        );
                    }
                    pdf.save(
                        "Invoice_{{ $order->code }} - {{ $order->membership->nama }}.pdf"
                    );
                });
            });

        })(jQuery);
    </script>

</body>

</html>
