@extends('layouts.template')

@section('user-home')
    @foreach($categories2 as $category)
        <h5 class="font-weight-bold" style="font-size: 22pt; margin-bottom: -20px;">{{$category->name}}</h5>
        <div class="row mt-5">
            @foreach($category->article as $article)
                <div class="col-md-4 mb-4">
                    <h3>{{$article->title}}</h3>
                    <p class="overflow-hidden">{{\Illuminate\Support\Str::limit($article->description, 81, '...')}} <a
                            href="{{route('article.fullstory',$article)}}">full story</a></p>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
