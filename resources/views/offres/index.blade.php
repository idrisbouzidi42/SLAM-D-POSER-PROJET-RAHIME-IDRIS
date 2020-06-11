@extends('layouts.app')

@section('content')
<form action="{{route('search.offres')}}" method="POST">
  @csrf
  <div class="input-group md-form form-sm form-2 pl-0">
  <input name="demande" class="form-control my-0 py-1 lime-border" type="text" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="submit">Search</button>
    </div>
  </div>
</form>
<br><br>

<h1>Listes des offres</h1>
  @if (isset($offres))
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom du offre</th>
        <th scope="col">Durée</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($offres as $offre)
        <tr>
          <th scope="row">{{$offre->id}}</th>
          <td>{{$offre->nomOffre}}</td>
          <td>{{$offre->dureeOffre}}</td>
          <th><a href="{{route('show.offres', ['offre' => $offre->id])}}">Voir l'offre</a></th>
        </tr>
      @endforeach    
    </tbody>
  </table>
  @else
  {{$message}}
  @endif
@endsection