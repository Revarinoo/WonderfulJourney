@extends('layouts.template')

@section('user-home')

    <div class="col-md-4 mt-5">
        <h5 class="font-weight-bold">{{$article->title}}</h5>
        <img src="{{url('storage/images/'.$article->image)}}" alt="Article Image" style="border-radius: 7px;" height="250px" width="320px">
        <p class="mt-3">{{$article->description}}</p>
        <button class="btn btn-outline-primary w-25" onclick="location.href='{{ url()->previous() }}'">Back</button>
    </div>

@endsection
