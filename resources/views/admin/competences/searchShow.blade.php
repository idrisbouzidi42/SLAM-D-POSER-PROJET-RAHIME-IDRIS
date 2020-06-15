@extends('layouts.base-all')

@section('content')

<!--- Liste des offres contenant le tag --->
<section id="list-annonces" class="section-padding  py-5">
    <div class="container">
        @forelse($competences as $competence)
        <div class="col-sm-12 py-5">
            <h1>Offres contenant le tag "{{$query}}"</h1>

            @forelse ($competence->offres as $offre)
            <div class="row annonces-content">

                <div class="col-lg-6 left-annonces">
                    <a href="{{ route('offres.show', ['offre' => $offre->id]) }}">
                        <h4>{{ $offre->nomOffre }}</h4>
                    </a>
                    <h5>{{ $offre->entreprise->nomEntreprise . ', ' . $offre->entreprise->rueEntreprise }}
                    </h5>
                    <p>{{ substr($offre->descriptionOffre,0,200).'...' }}</p>
                    <p><b>{{ $offre->created_at->diffForHumans() }}</b></p>
                </div>

                <div class="col-lg-5 center-annonces">
                    @foreach ($offre->competences as $competence)
                    <a href="{{ url('/search/'. $competence->nom) }}">{{$competence->nom}}</a>
                    @endforeach
                </div>

            </div><br>
            @endforeach
            @empty
            <h3>Aucune offre n'a ce tag </h3>
            @endforelse
        </div>
    </div>
</section>

<hr>

<!-- Liste des demandes contenant le tag --->
<section id="list-annonces" class="section-padding  py-5">
    <div class="container">
        @foreach($competences as $competence)
        <div class="col-sm-12 py-5">
            <h1>Demandes contenant le tag "{{$query}}"</h1>

            @forelse($competence->demandes as $demande)
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
            @empty
            <h3>Aucune demande n'a ce tag </h3>
            @endforelse
        </div>
</section>

@endsection