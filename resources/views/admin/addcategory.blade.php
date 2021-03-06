@extends('layouts.template')

@section('content')
    <form action="{{route('admin.storecategory')}}" method="POST" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="name" class="font-weight-bold">Name</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button class="btn btn-outline-dark" type="submit">Create</button>

    </form>
@endsection
