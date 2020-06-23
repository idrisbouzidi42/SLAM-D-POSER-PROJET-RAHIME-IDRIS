@section('title', 'DEPOT PROJET - Rechercher les offres et demandes')

@extends('admin.layouts.sub-admin-layout')

@section('content')

<section id="list-annonces" class="section-padding">
    <div class="text-center ml-5">
        <div class="section-header text-center">
            <h2 class="section-title">Recherche d'annonces stage</h2>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 search-content">
            <form action="{{ url('search/all') }}" method="POST">
                @csrf
                <div class="input-group md-form form-sm form-2 pl-0">
                    <input name="demande" class="form-control my-0 py-1 lime-border" type="text"
                        placeholder="demande, ville, compétence, société..." aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Rechercher</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-10 py-5 ml-5">
            @if(isset($offres) && count($offres) > 0)
            <h2>Offres pour la recherche <strong>"{{$query}}"</strong></h2>
            @foreach($offres as $offre)
            <div class="row annonces-content mb-5">

                <div class="col-lg-6 left-annonces">
                    <a href="{{ route('offres.show', ['offre' => $offre->id]) }}">
                        <h4>{{ $offre->nomOffre }}</h4>
                    </a>
                    <h5>{{ $offre->entreprise->nomEntreprise . ', ' . $offre->entreprise->rueEntreprise }}</h5>
                    <p>{{ substr($offre->descriptionOffre,0,200).'...' }}</p>
                    <p><b>{{ $offre->created_at->diffForHumans() }}</b></p>
                </div>

                <div class="col-lg-5 center-annonces">
                    @foreach ($offre->competences as $competence)
                    <a href="{{ url('/search/'. $competence->nom) }}">{{$competence->nom}}</a>
                    @endforeach
                </div>

                <div class="col-lg-1 right-annonces">
                    <a href="{{ url('/search/offres/teletravail') }}">
                        {{ $offre->teleTravailOffre == 'oui' ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @endforeach
            @endif



            @if(isset($demandes) && count($demandes) > 0)
            <h2>Demandes pour la recherche <strong>"{{$query}}"</strong></h2>
            @foreach($demandes as $demande)
            <div class="row annonces-content mb-5">
                <div class="col-lg-6 left-annonces">
                    <a href="{{ route('demandes.show', ['demande' => $demande->id]) }}">
                        <h4>{{ $demande->titreDemande }}</h4>
                    </a>
                    <h5>{{ $demande->etudiant->nomEtudiant . ', ' . 
                                            $demande->etudiant->regionEtudiant .'('. $demande->etudiant->villeEtudiant .')' }}
                    </h5>
                    <p>{{ substr($demande->etudiant->presentationEtudiant,0,200).'...' }}</p>
                    <p><b>{{ $demande->created_at->diffForHumans() }}</b></p>
                </div>

                <div class="col-lg-5 center-annonces">
                    @foreach ($demande->competences as $competence)
                    <a href="{{ url('/search/'. $competence->nom) }}">{{$competence->nom}}</a>
                    @endforeach
                </div>

                <div class="col-lg-1 right-annonces">
                    <a href="{{ url('/search/demandes/teletravail') }}">
                        {{ $demande->teleTravailDemande == 'oui' ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @endforeach
            @endif



            @if(isset($entreprises) && count($entreprises) > 0)
            <h2>Entreprises pour la recherche <strong>"{{$query}}"</strong></h2>
            @foreach($entreprises as $entreprise)
            @foreach ($entreprise->offres as $offre)
            <div class="row annonces-content mb-5">
                <div class="col-lg-6 left-annonces">
                    <a href="{{ route('offres.show', ['offre' => $offre->id]) }}">
                        <h4>{{ $offre->nomOffre }}</h4>
                    </a>
                    <h5>{{ $offre->entreprise->nomEntreprise . ', ' . $offre->entreprise->rueEntreprise }}</h5>
                    <p>{{ substr($offre->descriptionOffre,0,200).'...' }}</p>
                    <p><b>{{ $offre->created_at->diffForHumans() }}</b></p>
                </div>

                <div class="col-lg-5 center-annonces">
                    @foreach ($offre->competences as $competence)
                    <a href="{{ url('/search/'. $competence->nom) }}">{{$competence->nom}}</a>
                    @endforeach
                </div>

                <div class="col-lg-1 right-annonces">
                    <a href="{{ url('/search/offres/teletravail') }}">
                        {{ $offre->teleTravailOffre == 'oui' ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @endforeach
            @endforeach
            @endif



            @if(isset($etudiants) && count($etudiants) > 0)
            <h2>Etudiants pour la recherche <strong>"{{$query}}"</strong></h2>
            @foreach($etudiants as $etudiant)
            @foreach ($etudiant->demandes as $demande)
            <div class="row annonces-content mb-5">
                <div class="col-lg-6 left-annonces">
                    <a href="{{ route('demandes.show', ['demande' => $demande->id]) }}">
                        <h4>{{ $demande->titreDemande }}</h4>
                    </a>
                    <h5>{{ $demande->etudiant->nomEtudiant . ', ' . 
                                                                        $demande->etudiant->regionEtudiant .'('. $demande->etudiant->villeEtudiant .')' }}
                    </h5>
                    <p>{{ substr($demande->etudiant->presentationEtudiant,0,200).'...' }}</p>
                    <p><b>{{ $demande->created_at->diffForHumans() }}</b></p>
                </div>

                <div class="col-lg-5 center-annonces">
                    @foreach ($demande->competences as $competence)
                    <a href="{{ url('/search/'. $competence->nom) }}">{{$competence->nom}}</a>
                    @endforeach
                </div>

                <div class="col-lg-1 right-annonces">
                    <a href="{{ url('/search/demandes/teletravail') }}">
                        {{ $demande->teleTravailDemande == 'oui' ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @endforeach
            @endforeach
            @endif



            @if(isset($competences) && count($competences) > 0)
            @foreach($competences as $competence)
            @if(count($competence->demandes) > 0 || count($competence->offres) > 0)
            @if (count($competence->demandes) > 0)
            <h2>Demandes liées à la compétence <strong>"{{$query}}"</strong></h2>
            @forelse ($competence->demandes as $demande)
            <div class="row annonces-content mb-5">
                <div class="col-lg-6 left-annonces">
                    <a href="{{ route('demandes.show', ['demande' => $demande->id]) }}">
                        <h4>{{ $demande->titreDemande }}</h4>
                    </a>
                    <h5>{{ $demande->etudiant->nomEtudiant . ', ' . 
                                                            $demande->etudiant->regionEtudiant .'('. $demande->etudiant->villeEtudiant .')' }}
                    </h5>
                    <p>{{ substr($demande->etudiant->presentationEtudiant,0,200).'...' }}</p>
                    <p><b>{{ $demande->created_at->diffForHumans() }}</b></p>
                </div>

                <div class="col-lg-5 center-annonces">
                    @foreach ($demande->competences as $competence)
                    <a href="{{ url('/search/'. $competence->nom) }}">{{$competence->nom}}</a>
                    @endforeach
                </div>

                <div class="col-lg-1 right-annonces">
                    <a href="{{ url('/search/demandes/teletravail') }}">
                        {{ $demande->teleTravailDemande == 'oui' ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @empty
            @endforelse
            @endif

            @if (count($competence->offres) > 0)
            <h2>Offres liées à la compétence <strong>"{{$query}}"</strong></h2>
            @forelse ($competence->offres as $offre)
            <div class="row annonces-content mb-5">
                <div class="col-lg-6 left-annonces">
                    <a href="{{ route('offres.show', ['offre' => $offre->id]) }}">
                        <h4>{{ $offre->nomOffre }}</h4>
                    </a>
                    <h5>{{ $offre->entreprise->nomEntreprise . ', ' . $offre->entreprise->rueEntreprise }}</h5>
                    <p>{{ substr($offre->descriptionOffre,0,200).'...' }}</p>
                    <p><b>{{ $offre->created_at->diffForHumans() }}</b></p>
                </div>

                <div class="col-lg-5 center-annonces">
                    @foreach ($offre->competences as $competence)
                    <a href="{{ url('/search/'. $competence->nom) }}">{{$competence->nom}}</a>
                    @endforeach
                </div>

                <div class="col-lg-1 right-annonces">
                    <a href="{{ url('/search/offres/teletravail') }}">
                        {{ $offre->teleTravailOffre == 'oui' ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @empty
            @endforelse
            @endif
            @else
            <div class="h3 text-center">{{ $message }}</div>
            @endif
            @endforeach
            @endif


            @if(!isset($offres) && !isset($demandes) && !isset($entreprises) && !isset($etudiants) && !isset($users) )
            <div class="h3 text-center">
                {{ $message }}
            </div>
            @endif

        </div>
    </div>
</section>
@endsection