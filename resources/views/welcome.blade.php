@extends('layouts.app')

@section('body')
<nav class="navbar bg-body-light">
  <div class="container d-flex justify-between">
    <span class="navbar-brand mb-0 h1">Navbar Store</span>
    <a href="{{ route('carts.index') }}" class="btn btn-success">Keranjang</a>
  </div>
</nav>
<div class="container">
  <div class="card border-0 mb-3">
    <form action="" class="d-flex align-items-end gap-3">
      <div style="width: 90%;">
        <label for="search">Search</label>
        <input type="text" class="form-control" id="search" name="search" @isset($_GET['search']) value="{{ $_GET["search"]}}" @endisset>
      </div>
      <div class="d-flex gap-1" style="width: 10%">
        @isset($_GET['search'])
        <a href="/" class="btn btn-danger">Reset</a>
        @endisset
        <button class="btn btn-primary d-block">Search</button>
      </div>
    </form>
  </div>
  <div class="row">
    @forelse($products as $product)
    <div class="col-3">
      <div class="card">
        <img src="{{ asset('storage/image/' . $product->image )}}" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title">{{ $product->name }}</h5>
          <p class="card-text">{{ $product->description }}</p>
          <p class="card-text">{{ $product->price }}</p>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailProduct" onclick="detailProduct('{{ $product->name}}', '{{ $product->image}}', '{{ $product->description}}', '{{ $product->price}}', '{{ $product->id}}')">
            Detail
          </button>
        </div>
      </div>
    </div>
    @empty
    <div>Data Kosong</div>
    @endforelse

    <!-- Modal -->
    <form action="{{ route('carts.store') }}" method="POST">
      <div class="modal fade" id="detailProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <img src="" class="card-img-top modal-img" alt="..." style="height: 200px; object-fit: cover;">
              <h2 class="modal-title"></h2>
              <p class="modal-desc"></p>
              <p class="modal-price"></p>
            </div>
            <div class="modal-footer">
              @csrf
              <input type="text" value="{{$product->id}}" hidden name="product_id">
              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Beli</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('script')
<script>
  const detailProduct = (name, img, desc, price, id) => {
    const modalTitle = document.querySelector('.modal-title')
    modalTitle.innerHTML = name;

    const modalImg = document.querySelector('.modal-img')
    modalImg.src = "http://127.0.0.1:8000/storage/image/" + img;

    const modalDesc = document.querySelector('.modal-desc')
    modalDesc.innerHTML = desc;

    const modalPrice = document.querySelector('.modal-price')
    modalPrice.innerHTML = price;

    const inputProductId = document.querySelector(".modal .modal-footer form input")
    inputProductId.value = id;
  }
</script>
@endsection