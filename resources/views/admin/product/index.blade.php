@extends('layouts.app')

@section('body')
<div class="container mt-3">
    <form action="{{ route('product.create')}}">
        <button class="btn btn-primary">Tambah Produk +</button>
    </form>
    <table class="table">
</div>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Kategori</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Harga</th>
        <th scope="col">Gambar</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($products as $index => $product)
        <tr>
            <th scope="row">{{ $index+1 }}</th>
                <td>{{$product -> name}}</td>
                <td>{{$product -> Category -> name}}</td>
                <td>{{$product -> description}}</td>
                <td>{{$product -> price}}</td>
                <td>{{$product -> image}}</td>
                <td  class="d-flex">
                    <a class="btn btn-secondary" href="">Detile</a>
                    <a class="btn btn-success" href="">Edit</a>
                    <form action="">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Tidak Ada Produk</td>
            </tr>
        @endforelse
    </tbody>
  </table>
@endsection