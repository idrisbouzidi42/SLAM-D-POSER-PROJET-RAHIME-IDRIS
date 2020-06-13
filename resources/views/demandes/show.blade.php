@extends('layouts.base-all')

@section('content')


<section id="annonce-main">
    <div class="annonce-bg py-5">
        <div class="container py-5">
            <div class="row">

                <div class="col-md-8 annonce-content">
                    <div class="container" style="display: flex;  margin-bottom:10px;">
                        <a href="{{ route('demandes.edit', ['demande' => $demande->id]) }}" class="btn btn-secondary"
                            style=" margin-right:5px;">Editer</a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">
                            Supprimer
                        </button>
                        <form method="POST" action="{{ url("demandes/{$demande->id}") }}">
                            @csrf
                            @method('DELETE')

                            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            Êtes-vous sûr de vouloir supprimer cette annonce ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger" data-toggle="modal"
                                                data-target="#confirm-delete">
                                                Oui
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="annonce-post">
                        <h2>{{ $demande->titreDemande }}</h2>
                        <p class="annonce-post-time">{{ $demande->created_at->diffForHumans() }}</p>

                        <p class="annonce-post-desc">{!! nl2br(e($demande->etudiant->presentationEtudiant)) !!}</p>
                        <hr>
                        <div class="annonce-post-details">
                            <h3>Plus d'information</h3>
                            <ul>
                                <li><i class="fa fa-calendar-times-o"></i>{{$demande->dureeDemande}}</li>
                                <li><i
                                        class="fa fa-home"></i>{{ $demande->etudiant->telEtudiant ? 'Télétravail possible' : '' }}
                                </li>
                                <li><i class="fa fa-star"></i>Vos Compétences:<br>
                                    @foreach ($demande->competences as $competence)
                                    <a class="competences-check" href="{{ url("/search/{$competence->nom}") }}">
                                        <i class="fa fa-check-square-o"></i>{{$competence->nom}}
                                    </a>
                                    @endforeach.</li>
                            </ul>
                        </div>

                    </div>
                </div>

                <aside class="col-md-4 annonce-sidebar">
                    <div class="p-3 mb-3 bg-light rounded">
                        <h5>{{$demande->etudiant->nomEtudiant}}</h5>
                        <p>{{$demande->etudiant->villeEtudiant . '(' . $demande->etudiant->regionEtudiant . ')'}}<br>
                            <i class="fa fa-file-pdf-o"></i><a href="{{$demande->etudiant->cvEtudiant}}">Télécharger le
                                CV</a></p>
                    </div>

                    <div class="p-3 mb-3 bg-light rounded">
                        <h4>Postuler</h4>
                        <ul>
                            <li><i class="fa fa-envelope"></i>E-mail :<a
                                    href="mailto:{{$demande->etudiant->emailEtudiant}}">
                                    {{$demande->etudiant->emailEtudiant}}</a></li>
                            <li><i class="fa fa-link"></i>Site web : {{$demande->etudiant->siteEtudiant}}
                            </li>
                            <li><i class="fa fa-phone"></i>Téléphone : {{$demande->etudiant->telEtudiant}}</li>
                            <li><i class="fa fa-map-marker"></i>Adresse :
                                {{$demande->etudiant->villeEtudiant . '(' . $demande->etudiant->regionEtudiant . ')'}}
                            </li>
                        </ul>
                    </div>
                </aside><!-- /.annonce-sidebar -->
            </div><!-- /.row -->
        </div>
    </div>
</section>
@endsection