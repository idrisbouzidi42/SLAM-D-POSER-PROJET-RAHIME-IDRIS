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

    <h1>Resultat pour les tag "{{$query}}" </h1> 
        @foreach ($competences as $competence)
        @if (count($competence->offres) > 0 || count($competence->demandes) > 0)
            @if ($competence->offres && count($competence->offres) > 0)
            <h5 style="color: black">Offres</h5>
                @foreach ($competence->offres as $offre)
                <ul>
                    <li scope="row"><span>{{$offre->nomOffre}}</span> 
                    <span class="tag">{{$offre->dureeOffre}}</span>
                    <span class="tagtag">{{$competence->nom}} </span>
                    <a href="/offres/{{$offre->id}}">Voir l'offre</a></li>
                </ul>
                @endforeach
            @endif
            @if ($competence->demandes && count($competence->demandes) > 0)
            <h5 style="color: black">Demandes</h5>
                @foreach ($competence->demandes as $demande)
                <ul>
                    <li scope="row"><span>{{$demande->titreDemande}}</span> 
                    <span class="tag">{{$demande->dureeDemande}}</span>
                    <span class="tagtag">{{$competence->nom}} </span>
                    <a href="/demandes/{{$demande->id}}">Voir la demande</a></li>
                </ul>
                @endforeach
            @endif
        @else
        <p>{{$message}}</p>
        @endif
        @endforeach 

@endsection