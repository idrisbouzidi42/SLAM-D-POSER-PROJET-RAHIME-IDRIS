<!--Navbar -->
<nav id="admin-nav" class="mb-1 navbar navbar-expand-lg navbar-dark default-color fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('admin/') }}">ADMIN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Accueil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Poster une annonce de stage
                    </a>
                    <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="{{ route('offres.create') }}">Poster une offre de
                            stage</a>
                        <a class="dropdown-item" href="{{ route('demandes.create') }}">Poster une demande de
                            stage</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('offres/index') }}">Offres de stage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('demandes/index') }}">demandes de stage</a>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <!-- Authentication Links -->
                @guest
                <!-- Nothing -->
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>{{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-hover"
                        aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="{{ url('admin/profile', [Auth::user()->id]) }}">
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">Déconnexion</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<!--/.Navbar -->