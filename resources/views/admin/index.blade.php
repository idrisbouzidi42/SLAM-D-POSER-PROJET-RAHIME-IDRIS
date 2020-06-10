@extends('layouts.admin')


@section('content')
<form action="/search/all" method="POST">
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

<h1 style="text-align: center">DASHBOARD</h1>
<div class="container" style="margin-bottom: 30px; color:white;" >
    <div style="height: 150px;">
        <div class="h-100 d-inline-block bg-primary" style="width: 200px; margin-left:55px; padding:13px">
            <p style="font-size:x-large; text-align:center; font-:bold;">Administrateurs</p>
            <p style="text-align:center; font-size:x-large;">{{$nbUsers}}</p>
        </div>
        <div class="h-100 d-inline-block bg-success" style="width: 200px; margin-left:55px; padding:13px">
            <p style="font-size:x-large; text-align:center; font-:bold;">Offres total</p>
            <p style="text-align:center; font-size:x-large;">{{$total}}</p>
        </div>
        <div class="h-100 d-inline-block bg-warning" style="width: 200px; margin-left:55px; padding:13px">
            <p style="font-size:x-large; text-align:center; font-:bold;">En attentes</p>
            <p style="text-align:center; font-size:x-large;">{{$attente}}</p>
        </div>
        <div class="h-100 d-inline-block bg-danger" style="width: 200px; margin-left:55px; padding:13px">
            <p style="font-size:x-large; text-align:center; font-:bold;">Offres signalées</p>
            <p style="text-align:center; font-size:x-large;">{{$signaled}}</p>
        </div>
    </div>
</div>

<h4>Offres</h4>
<table class="table table-dark">
    <thead>
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Etat</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($offres as $offre)
        <tr>
            <td>{{$offre->id}}</td>
            <td>{{$offre->nomOffre}} ({{$offre->entreprise->nomEntreprise}})</td>
            <td>{{$offre->etat}}</td>
            <td>
                <div class="container" style="display: flex;">
                    <a class="btn btn-primary m-2" href="/offres/{{$offre->id}}">Voir</a>
                    @if ($offre->etat == 'Valide')
                    <a class="btn btn-warning m-2" id="{{$offre->id}}" href="/admin/signal/offres/{{$offre->id}}/">Signaler</a>
                    @else
                    <a class="btn btn-danger m-2" id="{{$offre->id}}" href="/admin/unsignal/offres/{{$offre->id}}/">Désignaler</a>
                    @endif
                    <form method="POST" action="/admin/offres/{{$offre->id}}" style="margin: 0px">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger m-2">Supprimer</button>
                    </form>                        
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<br><br><br>
<h4>Demandes</h4>
<table class="table table-dark">
    <thead>
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Etat</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($demandes as $demande)
        <tr>
            <td>{{$demande->id}}</td>
            <td>{{$demande->titreDemande}} ({{$demande->etudiant->nomEtudiant}})</td>
            <td>{{$demande->etatDemande}}</td>
            <td>
                <div id="{{$demande->id}}" class="container" style="display: flex;">
                    <a class="btn btn-primary m-2" href="/offres/{{$demande->id}}">Voir</a>
                    @if ($demande->etatDemande == 'Valide')
                    <a class="btn btn-warning m-2"  href="/admin/signal/demandes/{{$demande->id}}/">Signaler</a>
                    @else
                    <a class="btn btn-danger m-2"  href="/admin/unsignal/demandes/{{$demande->id}}/">Désignaler</a>
                    @endif
                    <form method="POST" action="/admin/demandes/{{$demande->id}}" style="margin: 0px">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger m-2">Supprimer</button>
                    </form>                        
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<br><br><br>
<h3>Modifier des tables</h3>
<a href="/admin/competences">Compétences</a>
@endsection

