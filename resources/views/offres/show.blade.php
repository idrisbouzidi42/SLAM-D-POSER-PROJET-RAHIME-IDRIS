@extends('layouts.app')

@section('content')
<form action="/search/offres" method="POST">
    @csrf
    <div class="input-group md-form form-sm form-2 pl-0">
        <input name="demande" class="form-control my-0 py-1 lime-border" type="text" placeholder="Search"
            aria-label="Search">
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
    <a href="/offres/{{$offre->id}}/edit" class="btn btn-secondary" style=" margin-right:5px;">Editer</a>
    <form method="POST" action="/offres/{{$offre->id}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>
@endcan


<div class="show container" style="color: black;">

    Nom du offre: {{$offre->nomOffre}} <br>
    Duree du offre: {{$offre->dureeOffre}} <br>
    Description du offre: {{$offre->descriptionOffre}} <br>
    Télétrail: {{$offre->teleTravailOffre}} <br><br>

    Entreprise : {{$offre->entreprise->nomEntreprise}}<br>
    Type d'entreprise : {{$offre->entreprise->typeEntreprise}} <br>
    Téléphone: {{$offre->entreprise->telEntreprise}} <br>
    Site web: {{$offre->entreprise->adresseWebEntreprise}} <br>
    Nom du tuteur: {{$offre->entreprise->nomTuteurEntreprise}} <br>
    Email du tuteur: {{$offre->entreprise->mailEntreprise}} <br>
    Adresse: {{$offre->entreprise->rueEntreprise}}<br><br>

    Compétences requises:
    @foreach ($offre->competences as $competence)
    <a href="/search/{{$competence->nom}}">{{$competence->nom}}</a>
    @endforeach

</div>
<br><br>
@endsection