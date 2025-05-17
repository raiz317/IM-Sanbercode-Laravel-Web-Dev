@extends('layouts.master')
@section('title')
    Detail Book
@endsection

@section('content')

<img src="{{asset('image/'.$books->image)}}" width="100%" alt="">
<h1 class="text-primary">{{$books->title}}</h1>
<p>{{$books->summary}}</p>
<hr>

<h2>List Comments</h2>
@forelse ($books->comments as $item)
<div class="card my-3">
    <div class="card-header">
        {{$item->owner->name}}
    </div>
    <div class="card-body">
        <p class="card-text">{{$item->content}}</p>
    </div>
</div>
@empty
    <h5>Tidak ada Comment</h5>
@endforelse

<h3>Buat Commentar</h3>
@auth
    
<form action="/comments/{{$books->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- @method('PUT') tidak dibutuhkan karena ini POST --}}
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3">
        <textarea name="summary" placeholder="Silahkan comment..." class="form-control" cols="30" rows="10"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Buat Comment</button>
</form>


@endauth

@endsection