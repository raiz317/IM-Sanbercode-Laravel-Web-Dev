@extends('layouts.master')
@section('title')
    Tambah Book
@endsection

@section('content')
<form action="/books" method="POST" enctype="multipart/form-data">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @csrf

  <div class="mb-3">
    <label class="form-label">Genre</label>
    <select name="genre_id" id="" class="form-control">
        <option value="">--Pilih Genre--</option>
        @forelse ($genre as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @empty
            <option value="">Genre belum ada</option>
        @endforelse
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Book Title</label>
    <input type="text" name="title" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Book Summary</label>
    <textarea name="summary" class="form-control" cols="30" rows="10"></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Stock Book</label>
    <input type="text" name="stock" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>    

@endsection