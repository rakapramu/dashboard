@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary float-end mb-2">Tambah
                            product</a>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>Rp. {{ number_format($product->price) }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>
                                            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <div class="btn-group">
                                                    <a href="{{ route('product.edit', $product->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class='bx bx-pencil'></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah anda yakin mau menghapus?')">
                                                        <i class='bx bx-trash'></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada produk</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
