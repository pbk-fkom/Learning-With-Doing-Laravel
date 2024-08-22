@extends('layout')
@section('body')
<a href="{{ route("dosen.create") }}">Tambah Data +</a>

{{-- akan di tampilkan kepada users yang sudah login --}}
@auth
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Foto</td>
        <td>Pengampu</td>
        <td>Kelas</td>
        <td>Aksi</td>
    </tr>
    {{-- @foreach ($dosens as $index => $dosen)
        <tr>
            <td>{{ $index+1 }}</td>
    <td>{{ $dosen -> nama }}</td>
    <td>{{ $dosen -> pengampu }}</td>
    <td>
        <a href="">Edit</a>
        <a href="">Hapus</a>
    </td>
    </tr>
    @endforeach --}}
    @forelse ($dosens as $index => $dosen)
    <tr>
        <td>{{ $index+1 }}</td>
        <td>{{ $dosen -> nama }}</td>
        <td>
            {{-- php artisan storage:link --}}
            <img src="{{ asset("storage/image/" . $dosen -> foto) }}" style="width:100px; height:100px; object-fit:cover;" alt="">
        </td>
        <td>{{ $dosen -> pengampu }}</td>
        <td>{{ $dosen -> classroom -> nama }}</td>
        <td>
            <a href="{{route("dosen.show", $dosen->id)}}">Detile</a>
            <a href="{{route("dosen.edit", $dosen->id)}}">Edit</a>
            <form action="{{ route('dosen.destroy', $dosen->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button onclick="confirm('Yakin?')">Hapus</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5">
            <center>Data Kosong</center>
        </td>
    </tr>
    @endforelse
</table>    
@endauth

{{-- Akan di tampilkan kepada users yang belum login --}}
@guest
    Anda Belum Login!
@endguest
@endsection