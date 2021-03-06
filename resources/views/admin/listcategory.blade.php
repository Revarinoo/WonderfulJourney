@extends('layouts.template')

@section('content')
    <button type="submit" class="btn btn-outline-primary mb-4 mt-3" onclick="location.href='{{route('admin.createcategory')}}'">+ Create Category</button>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>
                        <a href="{{route('article.categorize',$category->name)}}">{{$category->name}}</a>
                    </td>
                    <td>
                        <form action="{{route('admin.deletecategory',$category)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-primary custom-button">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
