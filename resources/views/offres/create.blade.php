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
  
    <h1>Creer une offre</h1>
    <form method="POST" action="{{route('store.offres')}}" style="color: rgb(75, 67, 67)">
        @include('includes.offres.form')
        <br><br><br>

        <div class="form-group">
            <button type="submit" class="form-control btn btn-primary">Envoyer l'offre</button>
        </div>
    
    </form>

@endsection