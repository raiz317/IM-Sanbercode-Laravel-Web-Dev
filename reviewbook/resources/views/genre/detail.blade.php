@extends('layouts.master')
@section('title')
    Detail Genre
@endsection

@section('content')

    <h1 class="text-primary">{{$genre->name}}</h1>
    <p>{{$genre->description}}</p>

    <a href="/genre" class="btn btn-primary btn-sm">Kembali</a>
@endsection