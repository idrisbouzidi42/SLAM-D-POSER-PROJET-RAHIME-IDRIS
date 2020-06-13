@extends('layouts.admin')

@section('content')

<h2 class="form-edit-title">Modifier cette demande</h2>
<form action="{{ route('demandes.edit', ['demande' => $demande->id]) }}" method="post" class="form-edit"
  enctype="multipart/form-data">
  @method('PATCH')
  @include('includes.demandes.form')
  <p class="center">
    <input type="submit" value="Modifier cette demande" id="valider" class="btn btn-primary awesome large red">
  </p>
  </div> <!-- form-offre -->
</form>

@endsection