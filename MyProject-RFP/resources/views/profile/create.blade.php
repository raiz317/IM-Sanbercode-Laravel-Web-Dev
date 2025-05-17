@extends('layouts.master')
@section('title')
    Buat Profile
@endsection

@section('content')

    <form action="/profile" method="POST">
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
        <label class="form-label">Age</label>
        <input type="number" name="age" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea name="address" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>    
@endsection