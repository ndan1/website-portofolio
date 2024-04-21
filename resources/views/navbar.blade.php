<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Custom Auth Laravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/434886babf.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column h-100">
    <header>
        <nav class="navbar navbar-expand-lg nav-border">
            <div class="container px-5">
                {{-- <h1 class="display-6 fw-bolder mb-3"><span class="text-gradient d-inline">Lin Dan Christiano</span></h1> --}}
              <a class="navbar-brand text-white" href="#">{{config('app.name')}}</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse nav-horizontal" id="navbarNav">
                <ul class="nav navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('home')}}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('project')}}">Projects</a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                  </li> --}}
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <ul class="dropdown-menu">
                        @if (Auth::check())
                        <li><a class="dropdown-item disabled">Hi, {{auth()->user()->name}}</a></li>
                        <li><a class="dropdown-item" href="{{route('edit')}}">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                        @endif
                        @if (Auth::guest())
                        <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                        @endif
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>
@yield('container')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
