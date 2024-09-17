@extends('layouts.app')

@section('body')
<div class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3">
                <h3>{{ $productCount}}</h3>
                <h2>Product</h2>
                <form action="{{ route('product.index') }}">
                    <button class="btn btn-primary">See All Product</button>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h3>{{ $transactionCount}}</h3>
                <h2>Transaction</h2>
                <form action="/admin/transaction">
                    <button class="btn btn-primary">See All Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection