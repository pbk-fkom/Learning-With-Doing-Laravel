@extends('layout')
@section('body')
<form action="{{ route("dosen.store") }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- Croside Request Forgery --}}
    <input type="text" name="nama" placeholder="Nama">
    <input type="file" name="foto">
    <input type="text" name="pengampu" placeholder="Pengampu" value="{{ old('nama') }}">
    @error('nama')
        {{ $message}}
    @enderror
    <select name="classroom_id">
        @foreach ($classrooms as $classroom)
            <option value="{{ $classroom -> id}}" value="{{ $classroom -> id}}"
            @if (old('classroom_id') == $classroom -> id)
                selected                    
            @endif
            >{{ $classroom -> nama}}</option>
        @endforeach
    </select>
    <button type="submit">Simpan</button>
</form>
@endsection