@extends('layouts.master')
@section('title')
    Edit Book
@endsection

@section('content')
<form action="/books/{{$books->id}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('put')

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
    <label class="form-label">Genre</label>
    <select name="genre_id" id="" class="form-control">
        <option value="">--Pilih Genre--</option>
        @forelse ($genre as $item)
            @if ($item->id === $books->genre_id)
            <option value="{{$item->id}}" selected>{{$item->name}}</option> 
                
            @else
            <option value="{{$item->id}}">{{$item->name}}</option>

            @endif
        @empty
            <option value="">Genre belum ada</option>
        @endforelse
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Book Title</label>
    <input type="text" name="title" value="{{$books->title}}" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Book Summary</label>
    <textarea name="summary" class="form-control" cols="30" rows="10">{{$books->summary}}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Stock Book</label>
    <input type="text" name="stock" value="{{$books->stock}}" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>    

@endsection