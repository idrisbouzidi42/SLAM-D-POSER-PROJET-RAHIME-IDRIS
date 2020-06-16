@extends('admin.layouts.sub-admin-layout')

@section('title-page')
Éditer offre
@endsection
@section('content')
<div class="all-offres">
    <h2 class="form-edit-title">Modifier une offre de stage</h2>
    <form method="POST" action="{{ route('offres.update', ['offre' => $offre->id]) }}">
        @method('PATCH')
        @include('includes.offres.form')

        <div class="form-group btn-offre py-3">
            <button type="submit" class="form-control">Modifier l'offre</button>
        </div>
    </form>
</div>
@endsection