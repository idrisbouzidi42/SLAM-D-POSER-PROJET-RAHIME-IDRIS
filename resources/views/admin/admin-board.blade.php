<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('admin/') }}">
                            <i class="fa fa-home"></i>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/profile', [Auth::user()->id]) }}">
                            <i class="fa fa-user"></i>
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">
                            <i class="fa fa-power-off"></i>
                            Déconnexion
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Liens utiles</span>
                    <a class="d-flex align-items-center text-muted" href="">
                        <i class="fa fa-chevron-down"></i>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/competences') }}">
                            <i class="fa fa-tags"></i>
                            Admin Compétences
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('offres.create') }}">
                            <i class="fa fa-book"></i>
                            Poster une offre
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('demandes.create') }}">
                            <i class="fa fa-file-text"></i>
                            Poster une demande
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <form action="/search/all" method="POST">
                        @csrf
                        <div class="input-group md-form form-sm form-2 pl-0">
                            <input name="demande" class="form-control my-0 py-1 lime-border" type="text"
                                placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>