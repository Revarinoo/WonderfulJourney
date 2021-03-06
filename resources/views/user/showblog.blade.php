@extends('layouts.template')

@section('content')
    @if(Auth::user()->role == "User")
        <button type="submit" class="btn btn-outline-primary" onclick="location.href='{{route('article.create')}}'">+ Create Blog</button>
    @endif
        <div>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->article as $article)
                    <tr>
                        <td><a href="{{route('article.fullstory',$article)}}">{{$article->title}}</a></td>

                        <td>
                            <form action="{{route('article.destroy',$article)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-primary custom-button">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
