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

    .tag{
        padding: 5px;
        margin-left: 10px;
        margin-right: 10px;
        border-radius: 3px ;
    }

    tr {
        margin-bottom: 10px;
    }
    </style>

    <form action="{{route('search.all')}}" method="POST">
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


    <!-- Search Competence --->
    <div class="container">
        @if(isset($competences) && count($competences) > 0)
            @foreach ($competences as $competence)
            @if (count($competence->demandes) > 0 || count($competence->offres) > 0)
            <h5 style="color: black">Compétences</h5>
                    @if($competence->demandes && count($competence->demandes) > 0)
                    <h6>Demandes</h6>
                        @foreach ($competence->demandes as $demande)
                        <ul>
                            <li scope="row"><span>{{$demande->titreDemande}}</span> 
                            <span class="tag">{{$demande->dureeDemande}}</span>
                            <span class="tagtag">{{$competence->nom}} </span>
                            <a href="/demandes/{{$demande->id}}">Voir la demande</a></li>
                        </ul>
                        @endforeach
                    @endif
                    @if($competence->offres && count($competence->offres) > 0)
                    <h6>Offres</h6>
                        @foreach ($competence->offres as $offre)
                        <ul>
                            <li scope="row"><span>{{$offre->nomOffre}}</span> 
                            <span class="tag">{{$offre->dureeOffre}}</span>
                            <span class="tagtag">{{$competence->nom}} </span>
                            <a href="/offres/{{$offre->id}}">Voir l'offre</a></li>
                        </ul>
                        @endforeach
                    @endif
            @endif
            @endforeach 
        @endif
    </div>


    <!--Search Users --->
    <div class="container">
        @if(isset($users) && count($users) > 0)
        <h5 style="color: black">Users</h5>
        @foreach ($users as $user)
                <ul>
                    <li scope="row"><span class="tagtag">{{$user->name}}</span> 
                    <span>{{$user->email}}</span>
                    <a href="/admin/profile/{{$user->id}}">Voir le profil</a></li>
                </ul>
        @endforeach 
        @endif
    </div>

    
    <div class="container">
        @if(!isset($demandes) || !isset($competences) || !isset($etudiants))
        <p>{{$message ?? '' }}</p>
        @endif
    </div>


@endsection

