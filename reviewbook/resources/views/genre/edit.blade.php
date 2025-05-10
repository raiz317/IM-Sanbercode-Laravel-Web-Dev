@extends('layouts.master')
@section('title')
    Edit Genre
@endsection

@section('content')
<form action="/genre/{{$genre->id}}" method="POST">
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
    @csrf
  <div class="mb-3">
    <label class="form-label">Genre Name</label>
    <input type="text" name="name" value="{{$genre->name}}" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" cols="30" rows="10">{{$genre->description}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>    

@endsection