@extends('layout')
@section('body')
<a href="{{ route("classroom.create") }}">Tambah Data +</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Aksi</td>
        </tr>
        @forelse ($classrooms as $index => $classroom)
        <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $classroom -> nama }}</td>
            <td>
                <a href="{{route("classroom.edit", $classroom->id)}}">Edit</a>
                <form action="{{ route('classroom.destroy', $classroom->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button onclick="confirm('Yakin?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">
                <center>Data Kosong</center>
            </td>
        </tr>
        @endforelse
    </table>
@endsection