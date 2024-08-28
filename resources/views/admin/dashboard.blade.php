@extends('layouts.app')

@section('body')
    <form action="{{ route('product.index') }}">
        <button>Product</button>
    </form>
@endsection