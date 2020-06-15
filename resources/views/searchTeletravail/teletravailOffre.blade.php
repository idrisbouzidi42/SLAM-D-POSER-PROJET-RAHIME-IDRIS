@extends('layouts.base-all')

@section('content')
<section id="list-annonces" class="section-padding  py-5">
    <div class="container">

        <div class="col-sm-12 py-5">
            <h1>Offres disponibles en télétravail</h1>
            @forelse($offres as $offre)

            <div class="row annonces-content">

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

            </div><br>
            @empty
            <h3>Aucune Offre pour l'instant... Soyez le premier ! </h3>
            @endforelse
        </div>
    </div>
</section>
@endsection