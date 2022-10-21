@extends('layout.master')
@section('title','Mata Kuliah')
@section('active3','active')
@section('judulhalaman','Mata Kuliah Semester 5 TI')
@section('daftar')
<div class="container">
    <ol class="list-group list-group-flush">
        @foreach ($matkul as $mk)
            <li class="list-group-item">{{ $mk }}</li>
        @endforeach
    </ol>
</div>
    
@endsection