@extends('layouts.app')

@section('content')
    <style>
        .tagtag{
        color: white;
        padding: 5px;
        margin-left: 10px;
        margin-right: 10px;
        border-radius: 3px ;
        background-color: #113448;
    }

    tr {
        margin-bottom: 10px;
    }
    </style>

    <form action="/search/offres" method="POST">
        @csrf
        <div class="input-group md-form form-sm form-2 pl-0">
        <input name="demande" class="form-control my-0 py-1 lime-border" type="text" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-secondary" type="submit">Search</button>
        </div>
        </div>
    </form>

    <br>
    <hr>
    <br>

    <h1>Recherche dans le contenu "{{$query}}"</h1>

    <!-- Search Offre -->
    <div class="container">
        @if(isset($offres) && count($offres) > 0)
                <h5 style="color: black">Offres</h5>
                @foreach ($offres as $offre)
                <ul>
                    <li scope="row"><span>{{$offre->nomOffre}}</span> 
                    <span class="tagtag">{{$offre->dureeOffre}}</span>
                    <a href="/offres/{{$offre->id}}">Voir l'offre</a></li>
                </ul>
                @endforeach 
        @endif
    </div>


    <!-- Search Entreprise -->
    <div class="container">
        @if(isset($entreprises) && count($entreprises) > 0)
                <h5 style="color: black">Entreprises</h5>
                @foreach ($entreprises as $entreprise)
                    @foreach ($entreprise->offres as $offre)
                        <ul>
                            <li scope="row"><span>{{$offre->nomOffre}}</span> 
                            <span class="tagtag">{{$offre->dureeOffre}}</span>
                            <a href="/offres/{{$offre->id}}">Voir l'offre</a></li>
                        </ul>
                    @endforeach
                @endforeach
        @endif
    </div> 


    <!-- Search Competence -->
    <div class="container">
        @if(isset($competences) && count($competences) > 0)
            @foreach ($competences as $competence)
                @if ($competence->offres && count($competence->offres) > 0)
                    <h5 style="color: black">Competences</h5>
                    @foreach ($competence->offres as $offre)
                        <ul>
                            <li scope="row"><span>{{$offre->nomOffre}}</span> 
                            <span class="tagtag">{{$offre->dureeOffre}}</span>
                            <a href="/offres/{{$offre->id}}">Voir l'offre</a></li>
                        </ul>
                    @endforeach                  
                @endif
            @endforeach 
        @endif
    </div>

    <div class="container">
        @if(empty($offres) && empty($competences) && empty($entreprises))
        <p>{{$message}}</p>
        @endif
    </div>


@endsection

