<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>

<body>

    <div id="app">
        <div class="container-fluid text-center p-5 mb-3" style="background-color: #d3d3d3;">
            <h1>Wonderful Journey</h1>
            Blog of Indonesian Tourism
        </div>
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm mb-4">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Home
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Category
                                </a>

                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/blog/category/Beach">
                                        Beach
                                    </a>
                                    <a class="dropdown-item" href="/blog/category/Mountain">
                                        Mountain
                                    </a>
                                </div>
                            </li>
                            
                            @guest
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/profile') }}">
                                    Profile
                                </a>
                            </li>
                            @if(Auth::user()->role=="user")
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/blog') }}">
                                    Blog
                                </a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/alluser') }}">
                                    All User
                                </a>
                            </li>
                            @endif
                            @endguest
                            

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/about_us') }}">
                                    About us
                                </a>
                            </li>

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <span class="oi oi-person" style="display:inline-block"></span> Sign up
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <span class="oi oi-account-login" style="display:inline-block"></span> Login
                                </a>
                            </li>
                            @else
                            <li class="nav-item">


                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="oi oi-account-logout" style="display:inline-block"></span> Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>



                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>
</body>

</html>