@extends('layouts.app')

@section('content')
    <form action="/contact" method="POST" style="color: black">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" id="email">
        </div>

        <div class="form-group">
            <label for="nom">Nom</label>
            <input class="form-control" type="text" name="nom" id="nom">
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Envoyer un message</button>
        </div>
    </form>
@endsection