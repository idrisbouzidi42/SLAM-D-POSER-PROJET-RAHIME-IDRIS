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
<h2 class="form-edit-title">Déposer une demande</h2>
<form action="{{route('store.demandes')}}" method="post" class="form-edit" enctype="multipart/form-data">
    @include('includes.demandes.form')
      <p class="center">
        <input type="submit" value="Enregistrer la demande" id="valider" class="btn btn-primary awesome large red">
      </p>
    </div> <!-- form-offre -->
  </form>

@endsection