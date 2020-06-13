@extends('layouts.base-all')

@section('content')

<div class="all-offres">
  <div class="container py-5">
    <h1>Soumettre une demande de stage</h1>
    <form action="{{ route('demandes.create') }}" method="post" class="form-edit" enctype="multipart/form-data">
      @include('includes.demandes.form')
      <div class="form-group btn-offre py-3">
        <button type="submit" class="form-control">Envoyer la demande</button>
      </div>
    </form>
  </div>
</div>

@endsection