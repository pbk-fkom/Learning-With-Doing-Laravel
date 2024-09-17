@extends('layouts.app')

@section('body')
<div class="container mt-3">
    <form action="{{ route('product.create')}}">
        <button class="btn btn-primary">Tambah Transaksi +</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Invoice</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga Produk</th>
                <th scope="col">Total Beli</th>
                <th scope="col">Tanggal Beli</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactionDetail as $index => $transaction)
            <tr>
                <th scope="row">{{ $index+1 }}</th>
                <td>{{$transaction -> transaction -> transaction_code}}</td>
                <td>{{$transaction -> transaction -> user -> name}}</td>
                <td>{{$transaction -> product -> name}}</td>
                <td>{{$transaction -> product -> price}}</td>
                <td>{{$transaction -> total}}</td>
                <td>{{$transaction -> transaction -> date}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Tidak Ada Transaksi</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection