@extends('layouts.template')

@section('user-home')
    <div class="container">
        <h1 class="text-center font-weight-bold">About Us</h1>
        <h5 class="text-justify">Wonderful Journey is Blog for Tourism who travel all around of Indonesia. Users are allowed to write
            their travelling experience when enjoying Indonesia tourism. We provide the facility for tourism to share their travelling story in Indonesia. By this activity, we hope many beautiful places in Indonesia will have more tourist. So, local residents will get more income to help their economic live.</h5>
        <div class="row text-center mt-5">
            <div class="col-md-4 ">
                <img src="{{url('storage/images/travel.jpg')}}" alt="" width="300px" height="200px">
            </div>
            <div class="col-md-4">
                <img src="{{url('storage/images/view1.png')}}" alt="" width="300px" height="200px">
            </div>
            <div class="col-md-4">
                <img src="{{url('storage/images/view2.png')}}" alt="" width="300px" height="200px">
            </div>
        </div>
    </div>
@endsection
