@extends('layouts.base-all')

@section('content')

<section id="list-offres" class="section-padding  py-5">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Recherche d'annonces stage</h2>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 content">
            <form action="/search/demandes" method="POST">
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
        <div class="col-sm-12 py-5">
            <h1>Demande de stage</h1>

            @if(isset($demandes))
            @foreach($demandes as $demande)
            <div class="row offres-content">

                <div class="col-lg-6 left-offres">
                    <a href="/demandes/{{ $demande->id }}">
                        <h4>{{ $demande->titreDemande }}</h4>
                    </a>
                    <h5>{{ $demande->etudiant->nomEtudiant . ', ' . 
                    $demande->etudiant->regionEtudiant .'('. $demande->etudiant->villeEtudiant .')' }}
                    </h5>
                    <p>{{ substr($demande->etudiant->presentationEtudiant,0,200).'...' }}</p>
                    <p><b>{{ $demande->created_at->diffForHumans() }}</b></p>
                </div>

                <div class="col-lg-5 center-offres">
                    @foreach ($demande->competences as $competence)
                    <a href="/search/{{$competence->nom}}">{{$competence->nom}}</a>
                    @endforeach
                </div>

                <div class="col-lg-1 right-offres">
                    <a href="/search/{{$demande->teleTravailDemande}}">
                        {{ $demande->teleTravailDemande ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @endforeach
            @else
            <h3>{{$message}}</h3>
            @endif
        </div>
    </div>
</section>
@endsection