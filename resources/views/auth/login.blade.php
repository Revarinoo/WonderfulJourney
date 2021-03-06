@extends('layouts.template')

@section('content')
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="role" class="font-weight-bold">Login as:</label>
            <select class="form-control" id="role" name="role">
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email" class="font-weight-bold">Email:</label>
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="font-weight-bold">Password:</label>
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-light" style="border-color: black">Submit</button>
    </form>
@endsection
