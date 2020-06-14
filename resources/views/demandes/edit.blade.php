@extends('admin.admin-layout')


@section('content')

<!-- dashboard + toolbar recherche + sidebar-->
@include('admin.admin-board')

<div class="container">
  <div class="all-offres">
    <div class="container py-5">
      <h2 class="form-edit-title">Modifier cette demande</h2>
      <form action="{{ route('demandes.update', ['demande' => $demande->id]) }}" method="post" class="form-edit"
        enctype="multipart/form-data">
        @method('PATCH')
        @include('includes.demandes.form')
        <p class="center">
          <input type="submit" value="Modifier cette demande" id="valider" class="btn btn-primary awesome large red">
        </p>
    </div> <!-- form-offre -->
    </form>
  </div>
</div>

@endsection