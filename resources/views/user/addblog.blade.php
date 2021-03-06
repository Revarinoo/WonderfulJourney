@extends('layouts.template')

@section('content')
    <h4 class="font-weight-bold">New Blog</h4>
    <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" class="font-weight-bold">Title:</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" required autocomplete="title">
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="category" class="font-weight-bold">Category:</label>
            <select name="category_id" id="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image" class="font-weight-bold">Photo:</label>
            <input type="file" id="image" style="padding-bottom: 36px;" name="image" class="form-control overflow-hidden @error('image') is-invalid @enderror" required autocomplete="image">

            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="font-weight-bold">Story</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-outline-dark">Create</button>
    </form>

@endsection
