@extends('layouts.app')

@section('body')
<nav class="navbar bg-body-light">
    <div class="container d-flex justify-between">
        <span class="navbar-brand mb-0 h1">Navbar Store</span>
        <a href="/">Beranda</a>
    </div>
</nav>
<div class="container">
    <h1>Transaksi</h1>
    <form action="{{ route('transaction.store') }}" method="post">
        @csrf
        <input type="text" class="form-control" hidden value="{{ $_GET["productId"] }}" name="product_id">
        <input type="text" class="form-control" name="qty">
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection