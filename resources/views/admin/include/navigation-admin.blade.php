<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="/admin">DEPOT PROJET ADMIN</a><button
            class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fa fa-bars"></i></button><!-- Navbar Search-->
        <form action="/search/all" method="POST"
            class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            @csrf
            <div class="input-group">
                <input name="demande" class="form-control my-0 py-1 lime-border" type="text" placeholder="Recherche..."
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                    <div>{{ Auth::user()->name }}</div>
                    <a class="dropdown-item" href="{{ url('admin/profile', [Auth::user()->id]) }}">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('logout')}}">Déconnexion</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">ADMIN</div>

                        <a class="nav-link" href="{{ url('/') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-tachometer"></i></div>
                            Accueil
                        </a>
                        <a class="nav-link" href="{{ url('admin/profile', [Auth::user()->id]) }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                            Profile
                        </a>
                        <a class="nav-link" href="{{route('logout')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-power-off"></i></div>
                            Déconnexion
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesPoster"
                            aria-expanded="false" aria-controls="collapsePagesPoster">
                            <div class="sb-nav-link-icon"><i class="fa fa-columns"></i></div>
                            Pages Poster
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePagesPoster" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('offres.create') }}">Poster une Offre</a>
                                <a class="nav-link" href="{{ route('demandes.create') }}">Poster une Demande</a>
                                <a class="nav-link" href="{{ route('demandes.create') }}">Poster une compétence</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesView"
                            aria-expanded="false" aria-controls="collapsePagesView">
                            <div class="sb-nav-link-icon"><i class="fa fa-columns"></i></div>
                            Pages Annonces
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePagesView" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ url('offres/index') }}">Listes des Offres</a>
                                <a class="nav-link" href="{{ url('demandes/index') }}">Listes des Demandes</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="{{ url('/admin/competences') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-tags"></i></div>
                            Listes des Compétences
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Connecter en tant que :</div>
                    {{ Auth::user()->name }}
                </div>
            </nav>
        </div>