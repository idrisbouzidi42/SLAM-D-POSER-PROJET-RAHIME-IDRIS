@extends('layouts.admin')

@section('content')
<form action="/search/all" method="POST">
    @csrf
    <div class="input-group md-form form-sm form-2 pl-0">
    <input name="demande" class="form-control my-0 py-1 lime-border" type="text" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
          <button class="btn btn-secondary" type="submit">Search</button>
      </div>
    </div>
  </form>
<br>
<hr>
<br>

<h4>Compétences</h4>
<div>
    <table class="table table-dark w-50">
        <thead>
            <tr>
                <th>Nom</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <td>
                <form action="/admin/AjouterCompetence" method="POST">
                    @csrf
                    <div style="display: flex">
                            <input class="form-control m-2" type="text" name="nom" placeholder="Nom">
                            <button class="btn btn-primary m-2">Ajouter</button>
                            <a class="btn btn-secondary m-2" href="/admin/competences/edit">Modifier</a>
                    </div>
                </form>     
            </td>

            @foreach ($competences as $competence)
            <tr>
                <td>
                    {{$competence->nom}}  
                    <div style="display: flex;">
                        <form action="/admin/competences/{{$competence->id}}" method="POST"> @csrf @method('DELETE')<button class="btn btn-danger m-1">Supprimer</button></form>                   
                    </div>
                </td>
                <td>{{$competence->id}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>  
    {{$competences->links()}}
</div>

@endsection