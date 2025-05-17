@extends('layouts.master')
@section('title')
    Tampilkan Book
@endsection

@section('content')
@auth
    @if (Auth()->user()->role === 'admin')
        
    <a href="/books/create" class="btn btn-primary my-3">Tambah</a>   
    @endif
    
@endauth

<div class="row">
    @forelse ($books as $item)
        <div class="col-4">
            <div class="card">
                <img src="{{asset('image/'.$item->image)}}" class="card-img-top" height="300px" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <span class="badge bg-primary">{{$item->genre->name}}</span>
                    <p class="card-text">{{Str::limit($item->summary, 100)}}</p>
                    <div class="d-grid gap-2">
                        <a href="/books/{{$item->id}}" class="btn btn-primary">Read More</a>
                    </div>
                    @auth
                    @if (Auth()->user()->role === 'admin')
                    <div class="row mt-3">
                        <div class="col">
                            <div class="d-grid gap-2">
                                <a href="/books/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                            </div>
                        </div>
                        <div class="col">
                            <form action="/books/{{$item->id}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <div class="d-grid gap-2">
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    @empty
        <h1>Belum ada postingan</h1>
    @endforelse
</div>

@endsection