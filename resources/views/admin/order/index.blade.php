@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <form action="{{ route('order.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="">Produk</label>
                                        <select name="product_id" id="" class="form-control">
                                            <option selected disabled>-- Pilih produk --</option>
                                            @foreach ($product as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Qty</label>
                                        <input type="number" class="form-control" name="qty">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Order now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Qty</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $cart)
                                            <tr>
                                                <td>{{ $cart->product->name }}</td>
                                                <td>{{ $cart->qty }}</td>
                                                <td>{{ $cart->sub_total }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <h4>Total : Rp. {{ number_format($carts->sum('sub_total')) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
