@extends('layouts.master')
@section('title')
    Home
@endsection

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif

@auth
    <h1>Selamat Datang {{Auth()->user()->name}}
        @if (Auth()->user()->profile)
            ({{Auth()->user()->profile->age}} Tahun)
        @else
            
        @endif
    </h1>
@endauth


{{-- <h1>SanberBook</h1>
<h2>Social Media Developer Santai Berkualitas</h2>
<p>Belajar dan Berbagi agar hidup ini semakin santai berkualitas</p>
<h3>Benefit Join di SanberBook</h3>
<ul>
    <li>Mendapatkan motivasi dari sesama developer</li>
    <li>Sharing knowledge dari para mastah Sanber</li>
    <li>Dibuat oleh calon developer terbaik</li>
</ul>
<h3>Cara Bergabung ke SanberBook</h3>
<ol>
    <li>Mengunjungi website ini</li>
    <li>Mendaftar di <a href="/register">Form Sign Up</a></li>
    <li>Selesai!!</li>
</ol> --}}
@endsection
    