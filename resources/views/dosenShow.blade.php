@extends('layout')
@section('body')
<h1>{{ $dosen -> nama }}</h1>
<h3>Mengampu Mata Kuliah : {{ $dosen -> pengampu }}</h3>
@endsection