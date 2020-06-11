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

    <form action="{{route('search.demandes')}}" method="POST">
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

    <!-- Search Demande -->
    <div class="container">
        <h1>Recherche dans le contenu "{{$query}}"</h1>
        @if(isset($demandes) && count($demandes) > 0)
        <h5 style="color: black">Demandes</h5>
            @foreach ($demandes as $demande)
            <ul>
                <li scope="row"><span>{{$demande->titreDemande}}</span> 
                <span class="tagtag">{{$demande->dureeDemande}}</span>
                <a href="/demandes/{{$demande->id}}">Voir l'offre</a></li>
            </ul>
            @endforeach 
        @endif
    </div>

    <!-- Search Etudiant -->
    <div class="container">
        @if(isset($etudiants) && count($etudiants) > 0)
        <h5 style="color: black">Etudiants</h5>
            @foreach ($etudiants as $entreprise)
                @foreach ($entreprise->demandes as $demande)
                    <ul>
                        <li scope="row"><span>{{$demande->titreDemande}}</span> 
                        <span class="tagtag">{{$demande->dureeDemande}}</span>
                        <a href="/demandes/{{$demande->id}}">Voir l'offre</a></li>
                    </ul>
                @endforeach
            @endforeach 
        @endif
    </div>


    <!-- Search Competence -->
    <div class="container">
        @if(isset($competences) && count($competences) > 0)
            @foreach ($competences as $competence)
                @if ($competence->demandes && count($competence->demandes) > 0)
                <h5 style="color: black">Competences</h5>  
                    @foreach ($competence->demandes as $demande)
                            <li scope="row"><span>{{$demande->titreDemande}}</span> 
                            <span class="tagtag">{{$demande->dureeDemande}}</span>
                            <a href="/demandes/{{$demande->id}}">Voir l'offre</a></li>
                        </ul>   
                    @endforeach
                    @else 
                    <p>{{$message ?? ''}}</p>
                @endif
            @endforeach 
        @endif
    </div>

    <!--Message pour query vide --->
    <div class="container">
        @if(empty($demandes) || empty($competences->demandes) || empty($etudiants))
        <p>{{$message ?? ''}}</p>
        @endif
    </div>
@endsection

