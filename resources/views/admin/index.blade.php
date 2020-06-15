@extends('admin.admin-layout')


@section('content')

<!-- dashboard + toolbar recherche + sidebar-->
@include('admin.admin-board')


<div class="admin-main">
    <div class="admin-content container-fluid">
        <div class="row mb-3">

            <div class="col-xl-3 col-sm-6 py-3">
                <div class="card bg-success text-white h-100">
                    <div class="card-body bg-success">
                        <h6 class="text-uppercase">administrateurs</h6>
                        <h1 class="display-4">{{$nbUsers}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 py-3">
                <div class="card text-white bg-danger h-100">
                    <div class="card-body bg-danger">
                        <h6 class="text-uppercase">offres</h6>
                        <h1 class="display-4">{{$total}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 py-3">
                <div class="card text-white bg-info h-100">
                    <div class="card-body bg-info">
                        <h6 class="text-uppercase">offres Signalées</h6>
                        <h1 class="display-4">{{ $signaled }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 py-3">
                <div class="card text-white bg-warning h-100">
                    <div class="card-body">
                        <h6 class="text-uppercase">Demandes</h6>
                        <h1 class="display-4">{{ $nbDemandes }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 py-3">
            <h1>LES OFFRES</h1>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-offre-valid-tab" data-toggle="pill" href="#pills-offre-valid"
                        role="tab" aria-controls="pills-offre-valid" aria-selected="true">Offres Validées</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-offre-flag-tab" data-toggle="pill" href="#pills-offre-flag" role="tab"
                        aria-controls="pills-offre-flag" aria-selected="false">Offres Signalées</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-offre-valid" role="tabpanel" aria-labelledby="gg">
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover table-striped ng-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Offre</th>
                                    <th>Entreprise</th>
                                    <th>Etat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offres as $offre)
                                <tr>
                                    @if ($offre->etat == 'Valide')
                                    <td style="width: 1%">{{$offre->id}}</td>
                                    <td style="width: 8%">{{$offre->created_at->format('Y-m-d')}}</td>
                                    <td style="width: 35%">{{$offre->nomOffre}}</td>
                                    <td style="width: 20%">({{$offre->entreprise->nomEntreprise}})</td>
                                    <td>{{$offre->etat}}</td>
                                    <td class="d-flex">

                                        <a class="btn btn-primary m-2"
                                            href="{{ route('offres.show', ['offre' => $offre->id]) }}">Voir</a>
                                        <a href="{{ route('offres.edit', ['offre' => $offre->id]) }}"
                                            class="btn btn-secondary m-2" style=" margin-right:5px;">Editer</a>
                                        <a class="btn btn-warning m-2" id="{{$offre->id}}"
                                            href="{{ url('admin/signal/offres', [$offre->id]) }}">Signaler</a>
                                        <form method="POST" action="{{ url('admin/offres', [$offre->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-2">Supprimer</button>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $offres->links() }}
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-offre-flag" role="tabpanel" aria-labelledby="pills-offre-flag-tab">
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover table-striped ng-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Offre</th>
                                    <th>Entreprise</th>
                                    <th>Etat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offres as $offre)
                                <tr>
                                    @if ($offre->etat != 'Valide')

                                    <td style="width: 1%">{{$offre->id}}</td>
                                    <td style="width: 8%">{{$offre->created_at->format('Y-m-d')}}</td>
                                    <td style="width: 35%">{{$offre->nomOffre}}</td>
                                    <td style="width: 20%">
                                        ({{$offre->entreprise->nomEntreprise}})</td>
                                    <td>{{$offre->etat}}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-primary m-2"
                                            href="{{ route('offres.show', ['offre' => $offre->id]) }}">Voir</a>
                                        <a href="{{ route('offres.edit', ['offre' => $offre->id]) }}"
                                            class="btn btn-secondary m-2" style=" margin-right:5px;">Editer</a>
                                        <a class="btn btn-danger m-2" id="{{$offre->id}}"
                                            href="{{ url("admin/unsignal/offres/{$offre->id}") }}">Désignaler</a>
                                        <form method="POST" action="{{ url("admin/offres/{$offre->id}") }}"
                                            style="margin: 0px">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-2">Supprimer</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 py-5">
            <h1>LES DEMANDES</h1>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-demande-valid-tab" data-toggle="pill"
                        href="#pills-demande-valid" role="tab" aria-controls="pills-demande-valid"
                        aria-selected="true">Demandes Validées</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-demande-flag-tab" data-toggle="pill" href="#pills-demande-flag"
                        role="tab" aria-controls="pills-demande-flag" aria-selected="false">Demandes Signalées</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-demande-valid" role="tabpanel"
                    aria-labelledby="pills-demande-valid-tab">

                    <div class="table-responsive">
                        <table class="table table-condensed table-hover table-striped ng-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Demande</th>
                                    <th>Etudiant</th>
                                    <th>Etat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demandes as $demande)
                                <tr>
                                    @if ($demande->etatDemande == 'Valide')

                                    <td style="width: 1%">{{$demande->id}}</td>
                                    <td style="width: 8%">{{$offre->created_at->format('Y-m-d')}}</td>
                                    <td style="width: 35%">{{$demande->titreDemande}}</td>
                                    <td style="width: 20%">({{$demande->etudiant->nomEtudiant}})
                                    </td>
                                    <td>{{$demande->etatDemande}}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-primary m-2"
                                            href="{{ route('demandes.show', [$demande->id]) }}">Voir</a>
                                        <a href="{{ route('demandes.edit', ['demande' => $demande->id]) }}"
                                            class="btn btn-secondary m-2" style=" margin-right:5px;">Editer</a>
                                        <a class="btn btn-warning m-2" id="{{$demande->id}}"
                                            href="{{ url("admin/signal/demandes/{$demande->id}") }}">Signaler</a>
                                        <form method="POST" action="{{ url("admin/demandes/{$demande->id}") }}"
                                            style="margin: 0px">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-2">Supprimer</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $demandes->links() }}
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-demande-flag" role="tabpanel"
                    aria-labelledby="pills-demande-flag-tab">

                    <div class="table-responsive">
                        <table class="table table-condensed table-hover table-striped ng-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Demande</th>
                                    <th>Etudiant</th>
                                    <th>Etat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demandes as $demande)
                                <tr>
                                    @if ($demande->etatDemande != 'Valide')

                                    <td style="width: 1%">{{$demande->id}}</td>
                                    <td style="width: 8%">{{$offre->created_at->format('Y-m-d')}}</td>
                                    <td style="width: 35%">{{$demande->titreDemande}}</td>
                                    <td style="width: 20%">({{$demande->etudiant->nomEtudiant}})
                                    </td>
                                    <td>{{$demande->etatDemande}}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-primary m-2" href="/offres/{{$demande->id}}">Voir</a>
                                        <a href="{{ route('demandes.edit', ['demande' => $demande->id]) }}"
                                            class="btn btn-secondary m-2" style=" margin-right:5px;">Editer</a>
                                        <a class="btn btn-danger m-2" id="{{$demande->id}}"
                                            href="{{ url("admin/unsignal/demandes/{$demande->id}") }}">Désignaler</a>
                                        <form method="POST" action="{{ url("admin/demandes/{$demande->id}") }}"
                                            style="margin: 0px">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-2">Supprimer</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection