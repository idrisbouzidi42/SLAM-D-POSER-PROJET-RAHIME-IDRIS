@extends('layouts.base-all')

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
            placeholder="offre, ville, compétence, société..." aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-secondary" type="submit">Rechercher</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-sm-12 py-5">
      <h1>Les dernières offres de stage</h1>
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
      <h3> {{$message}} </h3>
      @endforelse
    </div>
  </div>
</section>
@endsection