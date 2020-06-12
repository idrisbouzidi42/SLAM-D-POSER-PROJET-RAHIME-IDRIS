@extends('layouts.base-all')

@section('content')

<div class="all-offres">
    <div class="container py-5">
        <h1>Soumettre une offre de stage</h1>
        <form method="POST" action="/offres/create">
            @include('includes.offres.form')
            <div class="form-group btn-offre py-3">
                <button type="submit" class="form-control">Envoyer l'offre</button>
            </div>
        </form>
    </div>
</div>

@endsection