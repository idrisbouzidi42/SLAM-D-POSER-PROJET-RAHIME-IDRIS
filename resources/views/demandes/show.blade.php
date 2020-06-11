@extends('layouts.app')

@section('content')
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

@can('delete', App\Offre::class)
<div class="container" style="display: flex;  margin-bottom:10px;">
    <a href="{{route('edit.demandes', ['demande' => $demande->id])}}" class="btn btn-secondary" style=" margin-right:5px;">Editer</a>
    <form method="POST" action="{{route('destroy.demandes', ['demande' => $demande->id])}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form> 
    </div>
    @endcan


 
   

    <div class="show container" style="color: black;">
        
        Poste : {{$demande->titreDemande}} <br>
        Duree souhaitée : {{$demande->dureeDemande}} <br>
        Télétrail: {{$demande->teleTravailDemande}} <br><br>
       
        Etudiant :  {{$demande->etudiant->nomEtudiant}}<br>
        Présentation de l'etudiant :  {{$demande->etudiant->presentationEtudiant}}<br>
        Cv de l'etudiant : {{$demande->etudiant->cvEtudiant}}   <br>
        Téléphone: {{$demande->etudiant->telEtudiant}} <br>
        Email : {{$demande->etudiant->emailEtudiant}} <br>
        Portfolio : {{$demande->etudiant->siteEtudiant}} <br>
        Lieu:  {{$demande->etudiant->villeEtudiant}}, {{$demande->etudiant->regionEtudiant}}<br><br>
        
        Compétences requises:
        @foreach ($demande->competences as $competence)
        <a href="{{route('search.competences', ['query' => $competence->nom])}}">{{$competence->nom}}</a> 
        @endforeach
        
    </div>
<br><br>
@endsection