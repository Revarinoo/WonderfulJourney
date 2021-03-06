@extends('layouts.template')

@section('user-home')

    @if(!Auth::guest() &&Auth::user()->role == "User")
        <h4>Welcome, {{Auth::user()->name}}!</h4>
    @endif

    <div class="row mt-4">
        @foreach($articles as $article)
            <div class="col-md-4 mb-4">
                <h3>{{$article->title}}</h3>
                <p class="overflow-hidden">{{\Illuminate\Support\Str::limit($article->description, 81, ' ')}} <a
                        href="{{route('article.fullstory',$article)}}">...full story</a></p>
                <p class="font-italic">Category: <a href="{{route('article.categorize',$article->category->name)}}">{{$article->category->name}}</a></p>
            </div>
        @endforeach
    </div>



@endsection


