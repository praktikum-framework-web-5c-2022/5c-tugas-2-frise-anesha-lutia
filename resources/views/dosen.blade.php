@extends('layout.master')
@section('title','Dosen')
@section('active1','active')
@section('judulhalaman','Dosen Teknik Informatika')
@section('daftar')
<div class="container">
    <ol class="list-group list-group-flush">
        @foreach ($dosen as $dsn)
            <li class="list-group-item">{{ $dsn }}</li>
        @endforeach
    </ol>
</div>
@endsection