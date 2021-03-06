<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Revarino Putra</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/template.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4">Wonderful Journey</h1>
            <p class="lead">Blog of Indonesia Tourism</p>
        </div>
    </div>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        @if(Auth::guest())
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Category
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach($categories as $category)
                                <a class="dropdown-item" href="{{route('article.categorize',$category->name)}}">{{$category->name}}</a>
                                @endforeach
                            </div>

                        @elseif(Auth::user()->role == "Admin")
                            <a href="{{route('admin.category')}}" class="nav-link">Admin</a>

                        @elseif(Auth::user()->role == "User")
                            <a href="{{route('user.edit',Auth::user())}}" class="nav-link">Profil</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if(Auth::guest())
                            <a class="nav-link" href="{{route('about')}}">About Us</a>
                        @elseif(Auth::user()->role == "Admin")
                            <a href="{{route('admin.listuser')}}" class="nav-link">User</a>
                        @elseif(Auth::user()->role == "User")
                            <a href="{{route('article.show',Auth::user()->id)}}" class="nav-link">Blog</a>
                        @endif
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto right-position">
                    @if(Auth::user())
                        <li class="nav-item">
                            <form action="{{route('logout')}}" method="POST">
                                @csrf

                                <a class="nav-link" href="{{route('logout')}}"><img src="{{url('storage/icon/logout.png')}}" alt="Logout Icon" class="icon-1">Logout</a>
                            </form>
                        </li>

                    @else
                        <li class="nav-item signup">
                            <a class="nav-link" href="/register"><img src="{{url('storage/icon/user.png')}}" alt="SignUp Icon" class="icon-1">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login"><img src="{{url('storage/icon/login.png')}}" alt="Login Icon" class="icon-1">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
        <div class="container">
            @if(session('msg'))
                <div class="alert alert-success" role="alert" style="margin: 20px">
                    {{ session('msg') }}
                </div>
            @endif
        </div>

        <div style="margin-right: 350px; margin-left: 350px; margin-top: 20px;">
            @yield('content')
        </div>

        @yield('user-home')

    </div>

    <footer style="margin-top: 70px">

    </footer>
</body>
</html>
