@extends('layouts.template')

@section('content')
    <form action="{{route('user.update',$user->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="font-weight-bold">Name:</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name}}" required autocomplete="name" autofocus >
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email" class="font-weight-bold">Email:</label>
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone" class="font-weight-bold">Phone:</label>
            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$user->phone}}" required autocomplete="phone" autofocus >
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-outline-dark">Update</button>
    </form>
@endsection
