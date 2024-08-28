@extends('layouts.app')

@section('body')
<div class="container d-flex justify-content-center align-items-center" style="width: 100%; height: 100vh;">
    <div class="box w-50">
        <h1 class="text-center">Tambah Produk</h1>
        <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf  
            <div class="mb-3">
              <label class="form-label">Nama Produk</label>
              <input type="text" name="name" class="form-control">
            </div>
            <select name="category_id" class="form-select mb-3" aria-label="Default select example">
                <option selected>Kategori</option>
                @forelse ($categories as $category)
                <option value="{{ $category -> id }}">{{ $category -> name }}</option>
                @empty
                <option value="">Tidak Ada</option>
                @endforelse
            </select>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="text" name="price" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>
@endsection