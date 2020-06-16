@extends('admin.layouts.sub-admin-layout')

@section('title-page')
Éditer demande
@endsection

@section('content')
<div class="all-offres">
  <h2 class="form-edit-title">Modifier cette demande</h2>
  <form action="{{ route('demandes.update', ['demande' => $demande->id]) }}" method="post" class="form-edit"
    enctype="multipart/form-data">
    @method('PATCH')
    @include('includes.demandes.form')

    <div class="form-group btn-offre py-3">
      <button type="submit" class="form-control">Modifier cette demande</button>
    </div>
  </form>
</div>
@endsection