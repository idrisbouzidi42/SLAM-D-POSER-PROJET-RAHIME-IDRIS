@extends('admin.layouts.admin-layout')


@section('content')

<!-- dashboard + toolbar recherche + sidebar-->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
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
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fa fa-table mr-1"></i>LES OFFRES</div>
                        <div class="card-body">

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
                                            <td style="width: 60%">{{$offre->nomOffre}}</td>
                                            <td style="width: 10%">({{$offre->entreprise->nomEntreprise}})</td>
                                            <td>{{$offre->etat}}</td>


                                            <td class="d-flex">
                                                <a class="btn btn-primary mb-2"
                                                    href="{{ route('offres.show', ['offre' => $offre->id]) }}">Voir</a><br>
                                                <a href="{{ route('offres.edit', ['offre' => $offre->id]) }}"
                                                    class="btn btn-secondary mb-2">Editer</a><br>
                                                <a class="btn btn-warning mb-2" id="{{$offre->id}}"
                                                    href="{{ url('admin/signal/offres', [$offre->id]) }}">Signaler</a><br>
                                                <form method="POST" action="{{ url('admin/offres', [$offre->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </form>

                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $offres->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fa fa-table mr-1"></i>LES OFFRES SIGNALÉS</div>
                        <div class="card-body">
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
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fa fa-table mr-1"></i>LES DEMANDES</div>
                        <div class="card-body">

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
                                            <td style="width: 8%">{{$demande->created_at->format('Y-m-d')}}</td>
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
                                                <form method="POST" action="{{ url("demandes/{$demande->id}") }}"
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
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fa fa-table mr-1"></i>LES DEMANDES SIGNALÉS</div>
                        <div class="card-body">

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
                                            <td style="width: 8%">{{$demande->created_at->format('Y-m-d')}}</td>
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