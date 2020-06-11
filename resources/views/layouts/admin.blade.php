<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="/src/css/style.css" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    Dashbord
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="{{route('index.offres')}}" class="nav-link">Offres</a></li>
                        <li class="nav-item"><a href="{{route('create.offres')}}" class="nav-link">Déposer une offre</a></li>
                        <li class="nav-item"><a class="nav-link">|</a></li>
                        <li class="nav-item"><a href="{{route('index.demandes')}}" class="nav-link">Demandes</a></li>
                        <li class="nav-item"><a href="{{route('create.demandes')}}" class="nav-link">Déposer une demande</a></li>
                        <li class="nav-item"><a class="nav-link">|</a></li>
                        <li class="nav-item"><a href="{{route('create.contact')}}" class="nav-link">Contact</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                            <a class="btn btn-primary" href="{{route('profile', ['user' => Auth::user()->id])}}" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                            </li>



                            <li class="nav-item">
                            <a href="{{route('logout')}}" class="nav-link">Logout</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        @if (session()->has('offre'))
        <div class="alert alert-success container" role="alert">
            {{session()->get('offre')}}
        </div>
        @endif

        <main class="py-4 container">
            @yield('content')
        </main>
   
    </div>
</body>
</html>
