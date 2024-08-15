@extends('layout')
@section('body')
<form action="{{ route("classroom.update", $classroom->id) }}" method="POST">
    @method('PUT')
    @csrf
    {{-- Croside Request Forgery --}}
    <input type="text" name="nama" placeholder="Nama" value="{{$classroom->nama}}">
    <button type="submit">Simpan</button>
</form>    
@endsection