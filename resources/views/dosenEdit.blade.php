<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route("dosen.update", $dosen->id) }}" method="POST">
        @method('PUT')
        @csrf
        {{-- Croside Request Forgery --}}
        <input type="text" name="nama" placeholder="Nama" value="{{$dosen->nama}}">
        <input type="text" name="pengampu" placeholder="Pengampu" value="{{$dosen->pengampu}}">
        <button type="submit">Simpan</button>
    </form>
</body>
</html>