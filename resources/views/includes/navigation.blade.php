<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <div class="container">
            <div class="navbar-brand">
                <a class="logo-text" href="index.php">DEPOT STAGE</a><br>
                <em>Projet scolaire, Lycée Simone Weil</em>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fa fa-bars"></span>
                <span class="navbar-toggler-awesome fa fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link page-scroll active" href="index.php">Accueil</a></li>
                    <!-- Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle page-scroll" href="#about" id="navbarDropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">Stage</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('offres/create') }}"><span class="item-text">Poster
                                    une offre de stage</span></a>
                            <div class="dropdown-items-divide-hr"></div>
                            <a class="dropdown-item" href="{{ url('demandes/create') }}"><span class="item-text">Poster
                                    une demande de stage</span></a>
                        </div>
                    </li>
                    <!-- end of dropdown menu -->
                    <li class="nav-item"><a class="nav-link page-scroll" href="{{ url('offres/index') }}">Les offres</a>
                    </li>
                    <li class="nav-item"><a class="nav-link page-scroll" href="{{ url('demandes/index') }}">Les
                            demandes</a></li>

                </ul>
            </div>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->