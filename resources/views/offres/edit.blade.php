@extends('layouts.admin')

@section('content')

<div class="all-offres">
    <div class="container py-5">
        <h1>Modifier une offre de stage</h1>
        <form method="POST" action="{{ route('offres.update', ['offre' => $offre->id]) }}">
            @method('PATCH')
            @include('includes.offres.form')

            <div class="form-group btn-offre py-3">
                <button type="submit" class="form-control">Modifier l'offre</button>
            </div>

        </form>

        @endsection