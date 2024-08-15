@extends('layout')
@section('body')
<form action="{{ route("classroom.store") }}" method="POST">
    @csrf
    {{-- Croside Request Forgery --}}
    <input type="text" name="nama" placeholder="Nama">
    @error('nama')
        {{ $message}}
    @enderror
    <button type="submit">Simpan</button>
</form>
@endsection