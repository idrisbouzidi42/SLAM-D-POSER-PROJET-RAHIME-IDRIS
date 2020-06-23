@section('title', 'DEPOT PROJET - Rechercher des offres')

@extends('layouts.base-all')


@section('pages-title', 'Rechercher des offres de stage')

@section('content')

<section id="list-annonces" class="section-padding  py-5">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Rechercher dans les offres</h2>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 search-content">
            <form action="{{ url('search/offres') }}" method="POST">
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

        <div class="col-sm-12 py-5">
            @if(isset($offres) && count($offres) > 0)
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
                <div class="col-lg-1 right-annonces">
                    <a href="{{ url('/search/offres/teletravail') }}">
                        {{ $offre->teleTravailOffre == 'oui' ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @empty
            @endforelse
            @endif


            @if(isset($entreprises) && count($entreprises) > 0)
            @foreach($entreprises as $entreprise)
            @foreach ($entreprise->offres as $offre)
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
                <div class="col-lg-1 right-annonces">
                    <a href="{{ url('/search/offres/teletravail') }}">
                        {{ $offre->teleTravailOffre == 'oui' ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @endforeach
            @endforeach
            @endif




            @if(isset($competences) && count($competences) > 0)
            @foreach($competences as $competence)
            @forelse ($competence->offres as $offre)
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
                <div class="col-lg-1 right-annonces">
                    <a href="{{ url('/search/offres/teletravail') }}">
                        {{ $offre->teleTravailOffre == 'oui' ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @empty
            <div class="h3 text-center">{{ $message }}</div>
            @endforelse
            @endforeach
            @endif

            @if(!isset($offres) && !isset($entreprises))
            <div class="h3 text-center">
                {{ $message }}
            </div>
            @endif
        </div>
    </div>

</section>
@endsection