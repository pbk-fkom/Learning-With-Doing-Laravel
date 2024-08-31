@extends('layouts.app')

@section('body')
<div class="container">
  <div class="card p-3" >
    <form action="" method="GET">
      <div class="d-flex align-items-end">
      <div class="w-100">
        <label for="search" class="search">Search</label>
        <input class="form-control" type="text" id="search" name="search"
          @isset($_GET['search'])
              value="{{ $_GET['search']}}"
          @endisset
        >
      </div>
      @isset($_GET['search'])
          <a href="/"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
          </svg></a>
      @endisset
      <div><button class="btn btn-primary">Search</button></div>
    </div>
    </form>
  </div>
  <div class="row mt-3">
    @forelse ($products as $product)
        <div class="col-3">
          <div class="card">
            <img src="{{ asset('storage/image/' . $product -> image) }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $product -> name}}</h5>
              <p class="card-text">{{ $product -> description }}</p>
              <p class="card-text">Rp. {{ $product -> price }}</p>
              <!-- Button trigger modal -->
              {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detileProduct{{ $product -> id}}">
                Detail
              </button> --}}

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detileProduct" onclick="detileProduct('{{$product -> name}}', '{{$product -> image}}', '{{$product -> price}}', '{{$product -> description}}');">
                Detail
              </button>
            </div>
          </div> 
        </div>

<!-- Modal -->
{{-- <div class="modal fade" id="detileProduct{{ $product -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $product -> name}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="{{ asset('storage/image/' . $product -> image) }}" class="card-img-top" alt="...">
        <p class="card-text">Harga Rp. {{ $product -> price }}</p>
        <p class="card-text">{{ $product -> description }}</p>
      </div>
    </div>
  </div>
</div> --}}
    @empty
        <div class="text-center">Tidak Ada Product</div>
    @endforelse  

    <div class="modal fade" id="detileProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5"></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img src="" class="card-img-top" alt="...">
            <p class="price card-text"></p>
            <p class="description card-text"></p>
          </div>
        </div>
      </div>
    </div>

  </div> 
</div>
@endsection

@section('script')
  <script>
    const detileProduct = (name, img, price, desc) =>{
      const modalTitle = document.querySelector(".modal h1");
      modalTitle.innerHTML = name;

      const modalImg = document.querySelector(".modal-body img");
      modalImg.src = "http://127.0.0.1:8000/storage/image/" + img;

      const modalPrice = document.querySelector(".modal-body .price");
      console.log(modalPrice)
      modalPrice.innerHTML = "Rp. " + price;

      const modalDesc = document.querySelector(".modal-body .description");
      modalDesc.innerHTML = desc;

    }
  </script>
@endsection