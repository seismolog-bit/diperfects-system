@extends('layouts.admin')

@section('content')
    <x-admin-page-header title='Confirmasi pesanan' subtitle="Formulir konfirmasi pesanan produk">
        <div class="d-flex">
            <a class="btn btn-soft-danger me-2" href="{{ route('admin.order.index') }}">
                <i class="bi-x me-1"></i> Kembali
            </a>
            <form action="{{route('admin.order.store')}}" method="post">
                @csrf
                <input type="hidden" name="membership_id" value="{{$membership->id}}">
                <input type="hidden" name="ongkir" value="{{$ongkir}}">
                <input type="hidden" name="note" value="{{$note}}">
                <input type="hidden" name="tanggal_order" value="{{$tanggal_order}}">
                <button type="submit" class="btn btn-primary" href="{{ route('admin.order.index') }}">
                    Konfirmasi pesanan
                </button>
            </form>
        </div>
    </x-admin-page-header>

    <div class="row">
        <div class="col-lg-8 mb-3 mb-lg-0">
            <div class="card mb-3 mb-lg-5">
                <div class="card-header card-header-content-between">
                    <h4 class="card-header-title">Detail pesanan <span
                            class="badge bg-soft-dark text-dark rounded-circle ms-1">{{Cart::getTotalQuantity()}}</span></h4>
                    <a class="link" href="{{route('admin.order.create')}}">Edit pesanan</a>
                </div>

                <div class="card-body">

                    @forelse ($carts as $cart)
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                            <div class="avatar avatar-lg">
                                <img class="img-fluid rounded" src="{{asset($cart->attributes->image)}}" alt="Image Description">
                            </div>
                        </div>

                        <div class="flex-grow-1 ms-3">
                            <div class="row">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <a class="h5 d-block" href="ecommerce-product-details.html">{{$cart->name}}</a>
                                </div>

                                <div class="col col-md-2 align-self-center">
                                    <h5>{{number_format($cart->price)}}</h5>
                                </div>
                                <div class="col col-md-2 align-self-center">
                                    <h5>{{number_format($cart->quantity)}}</h5>
                                </div>
                                <div class="col col-md-2 align-self-center text-end">
                                    <h5>{{number_format($cart->price * $cart->quantity)}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p>Data tidak ditemukan</p>
                    @endforelse

                    <hr>

                    <div class="row justify-content-md-end mb-3">
                        <div class="col-md-8 col-lg-7">
                            <dl class="row text-sm-end">
                                <dt class="col-sm-6">Subtotal:</dt>
                                <dd class="col-sm-6">{{number_format(Cart::getSubTotal())}}</dd>
                                <dt class="col-sm-6">Pengiriman:</dt>
                                <dd class="col-sm-6">{{number_format($ongkir)}}</dd>
                                <dt class="col-sm-6">Total:</dt>
                                <dd class="col-sm-6">{{number_format($ongkir + Cart::getTotal())}}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-header-title">Customer</h4>
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush list-group-no-gutters">
                        <li class="list-group-item">
                            <a class="d-flex align-items-center mb-3" href="#">
                                <div class="avatar avatar-circle">
                                    <img class="avatar-img" src="{{asset($membership->image_url)}}" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span class="text-body text-inherit">{{$membership->nama}}</span>
                                </div>
                                <div class="flex-grow-1 text-end">
                                    <i class="bi-chevron-right text-body"></i>
                                </div>
                            </a>

                            <ul class="list-unstyled list-py-2 text-body">
                                <li><i class="bi-phone me-2"></i>{{$membership->nomor_hp}}</li>
                                <li><i class="bi-pin me-2"></i>{{$membership->alamat}}</li>
                            </ul>
                        </li>

                        <li class="list-group-item">
                            <div class="d-flex mb-2 justify-content-between align-items-center">
                                <h5>Tanggal pesanan</h5>

                                <p>{{$tanggal_order}}</p>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Catatan</h5>
                            </div>

                            <span class="d-block text-body">
                                {{$note}}
                            </span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
