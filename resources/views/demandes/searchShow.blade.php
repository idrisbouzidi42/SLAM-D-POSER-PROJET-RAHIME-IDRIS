@extends('layouts.base-all')

@section('content')
<section id="list-annonces" class="section-padding  py-5">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Rechercher dans les demandes</h2>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 search-content">
            <form action="{{ url('search/demandes') }}" method="POST">
                @csrf
                <div class="input-group md-form form-sm form-2 pl-0">
                    <input name="demande" class="form-control my-0 py-1 lime-border" type="text"
                        placeholder="demande, ville, compétence, société..." aria-label="Search" value="{{$query}}">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Rechercher</button>
                    </div>
                </div>
            </form>
        </div>
        <?php $compVide = false ?>

        <h1>Demandes trouvée pour la recherche "{{$query}}" </h1>
        @if(isset($demandes) && count($demandes) > 0)
        <div class="col-sm-12 py-5">
            @foreach($demandes as $demande)
            <div class="row annonces-content">

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
        </div>
        @endif


        @if(isset($etudiants) && count($etudiants) > 0)
        <div class="col-sm-12 py-5">
            @foreach($etudiants as $etudiant)
            @foreach ($etudiant->demandes as $demande)
            <div class="row annonces-content">
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
        </div>
        @endif




        @if(isset($competences) && count($competences) > 0)
        <div class="col-sm-12 py-5">
            @foreach($competences as $competence)
            @forelse ($competence->demandes as $demande)
            <div class="row annonces-content">
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
            <?php $commpVide = true; ?>

            @endforelse
            @endforeach
        </div>
        @endif


        @if(!isset($demandes) && $compVide == true && !isset($etudiants))
        <h1>{{$message}}</h1>
        @endif
    </div>

    <!---Search Competence 
        @if(isset($competences) && count($competences) > 0)
        @foreach ($competences as $competence)
        @if ($competence->demandes && count($competence->demandes) > 0)
        <h5 style="color: black">Competences</h5>
        @foreach ($competence->demandes as $demande)
        <li scope="row"><span>{{$demande->titreDemande}}</span>
            <span class="tagtag">{{$demande->dureeDemande}}</span>
            <a href="{{ route('demandes.show', ['demande' => $demande->id]) }}">Voir l'offre</a></li>
        </ul>
        @endforeach
        @else
        <p>{{$message ?? ''}}</p>
        @endif
        @endforeach
        @endif --->

    </div>
</section>
@endsection