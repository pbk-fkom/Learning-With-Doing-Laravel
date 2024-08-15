@extends('layout')
@section('body')
<form action="{{ route("dosen.update", $dosen->id) }}" method="POST">
    @method('PUT')
    @csrf
    {{-- Croside Request Forgery --}}
    <input type="text" name="nama" placeholder="Nama" value="{{$dosen->nama}}">
    <input type="text" name="pengampu" placeholder="Pengampu" value="{{$dosen->pengampu}}">
    <button type="submit">Simpan</button>
</form>    
@endsection