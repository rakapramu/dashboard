@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>
                                                    <form action="{{ route('category.destroy', $item->id) }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <div class="btn-group">
                                                            <a href="{{ route('category.edit', $item->id) }}"
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
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="card-body">
                                <form action="{{ route('category.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="">Nama</label>
                                        <input type="text" name="name" class="form-control">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Description</label>
                                        <textarea name="description" rows="5" class="form-control"></textarea>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success px-4 text-right">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
