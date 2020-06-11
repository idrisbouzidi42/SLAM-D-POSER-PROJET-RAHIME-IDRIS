@extends('layouts.app')

@section('content')
    <form action="{{route('store.contact')}}" method="POST" style="color: black">
        @csrf

        <div class="form-group">
            <label for="nom">Nom</label>
            <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" id="nom" placeholder="Votre nom...">
            @error('nom')
            <div class="invalid-feedback">
                {{$errors->first('nom')}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" placeholder="Votre email...">
            @error('email')
            <div class="invalid-feedback">
                {{$errors->first('email')}}
            </div>
            @enderror
        </div>


        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" cols="30" rows="10" placeholder="Votre message..."></textarea>
            @error('message')
            <div class="invalid-feedback">
                {{$errors->first('message')}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Envoyer un message</button>
        </div>
    </form>
@endsection