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
    <h1>Liste des demandes</h1>

    @if(isset($demandes))
    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <td>Region</td>
                <td>Action</td>
            </tr>
        </thead>
            <tbody>
                @foreach ($demandes as $demande)
                <tr>
                    <td>
                        {{$demande->titreDemande}}<br>
                        Télétravail : {{$demande->teleTravailDemande}}
                    </td>
                    <td>{{$demande->etudiant->villeEtudiant}}, {{$demande->etudiant->regionEtudiant}} </td>
                    <td><a href="{{route('show.demandes', ['demande' => $demande->id])}}">Voir</a></td>
                </tr>
                @endforeach
            </tbody>
        
        </table>
    @else
    {{$message}}
    @endif

@endsection