@extends('layouts.app')

@section('body')
<nav class="navbar bg-body-light">
    <div class="container d-flex justify-between">
        <span class="navbar-brand mb-0 h1">Navbar Store</span>
        <a href="/">Beranda</a>
    </div>
</nav>
<div class="container">
    <div class="row">
        @forelse($carts as $cart)
        <div class="col-3">
            <div class="card">
                <img src="{{ asset('storage/image/' . $cart->product->image )}}" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $cart->product->name }}</h5>
                    <p class="card-text">{{ $cart->product->description }}</p>
                    <p class="card-text">{{ $cart->product->price }}</p>

                    <div class="d-flex gap-2">
                        <a href="{{ route('transaction.create', ["productId" => $cart->product->id]) }}" class="btn btn-primary">Beli</a>

                        <form action="{{ route('carts.destroy', $cart->id)}}" method="POST">
                            @method("DELETE")
                            @csrf
                            <input type="text" name="id" hidden value="{{ $cart->id }}">
                            <button onclick="return confirm('yakin?')" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div>Data Kosong</div>
        @endforelse

    </div>
</div>
@endsection