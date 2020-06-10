@extends('layouts.app')

@section('content')
    <form action="/search" method="POST">
        @csrf
        <div class="input-group md-form form-sm form-2 pl-0">
        <input name="demande" class="form-control my-0 py-1 lime-border" type="text" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
              <button class="btn btn-secondary" type="submit">Search</button>
          </div>
        </div>
      </form>
      
      <br><br>

      <h1>Page d'acceuil</h1>
      <div style="color: black; font-size:x-large">
        <p><strong>Ce site est la propriété du lycée Simone Weil.</strong></p>
        <p>Il va permettre aux étudiants de chercher des stages et aux entrprises de trouver des stagières</p>
      </div>
      <div class="m-5" style="text-align: center">
        <a href="/offres/create" class="btn btn-secondary">Publier une offre d'emploi</a>
        &nbsp; &nbsp;
        <a href="/demandes/create" class="btn btn-secondary">Publier une demande <span class="awesome yellow tag-cv">+ CV</span></a>
      </div>
@endsection