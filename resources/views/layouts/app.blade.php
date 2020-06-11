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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li>
                            <div class="dropdown">
                                <button class="mr-2 btn dropdown-toggle nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Offres
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('index.offres')}}" >Voir les offres</a>
                                <a class="dropdown-item" href="{{route('create.offres')}}">Déposer une offre </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Demandes
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('index.demandes')}}" >Voir les demandes</a>
                                <a class="dropdown-item" href="{{route('create.demandes')}}">Déposer une demande </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item"><a href="{{route('create.contact')}}" class="nav-link">Contact</a></li>
                    </ul>
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <!-- Nothing -->
                        @else
                        @can('delete', App\Offre::class)
                            <li class="nav-item">
                                <a href="{{route('admin')}}" class="btn btn-dark">Dashbord</a>
                            </li>
                        @endcan
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link dropdown" href="#" role="button">
                                    {{ Auth::user()->name }} <span class="caret"></span>
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

        @if (session()->has('demande'))
        <div class="alert alert-success container" role="alert">
            {{session()->get('demande')}}
        </div>
        @endif

        @if (session()->has('contact'))
        <div class="alert alert-success container" role="alert">
            {{session()->get('contact')}}
        </div>
        @endif
        

        <main class="py-4 container">
            @yield('content')
        </main>
        @include('includes.footer')
    </div>
</body>
</html>
