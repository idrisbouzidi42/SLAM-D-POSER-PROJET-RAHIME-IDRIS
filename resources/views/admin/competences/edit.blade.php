@extends('admin.admin-layout')


@section('content')

<!-- dashboard + toolbar recherche + sidebar-->
@include('admin.admin-board')

<div class="container">
    <h1>Les Compétences </h1>
    <div class="row mb-3">
        <div class="col-lg-8 py-3">
            <div class="table-responsive">
                <table class="table table-condensed table-hover table-striped ng-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nom & Etat & Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competences as $competence)
                        <tr>
                            <td>{{$competence->id}}</td>
                            <td>
                                <div style="display: flex">
                                    <form action="{{ route('competences.update', ['comp' => $competence->id])}} "
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input class="form-control" type="text" name="nom" value="{{$competence->nom}}">
                                        <button class="btn btn-primary m-1" type="submit">Enregistrer</button>
                                    </form>

                                    <form action="{{ url("/admin/competences/{$competence->id}") }}" method="POST">
                                        @csrf
                                        @method('DELETE')<button class="btn btn-danger m-1">Supprimer</button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$competences->links()}}
            </div>
        </div>

        <div class="col-lg-4 py-3">
            <form action="{{ route('competences.create') }}" method="POST">
                @csrf
                <div style="display: flex">
                    <input class="form-control m-2" type="text" name="nom" placeholder="Nom">
                    <button class="btn btn-primary m-2">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection