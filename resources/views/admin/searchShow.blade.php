@extends('admin.layouts.admin-layout')

@section('content')

<section id="list-annonces" class="section-padding container py-5">
    <div class="container text-center">
        <div class="section-header text-center mt-5">
            <h2 class="section-title">Recherche d'annonces stage</h2>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 search-content">
            <form action="{{ url('search/all') }}" method="POST">
                @csrf
                <div class="input-group md-form form-sm form-2 pl-0">
                    <input name="demande" class="form-control my-0 py-1 lime-border" type="text"
                        placeholder="demande, ville, compétence, société..." aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Rechercher</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-10 py-5">

            @if(isset($offres) && count($offres) > 0)
            <h2>Offres pour la recherche <strong>"{{$query}}"</strong></h2>
            @foreach($offres as $offre)
            <div class="row annonces-content">

                <div class="col-lg-6 left-annonces">
                    <a href="{{ route('offres.show', ['offre' => $offre->id]) }}">
                        <h4>{{ $offre->nomOffre }}</h4>
                    </a>
                    <h5>{{ $offre->entreprise->nomEntreprise . ', ' . $offre->entreprise->rueEntreprise }}</h5>
                    <p>{{ substr($offre->descriptionOffre,0,200).'...' }}</p>
                    <p><b>{{ $offre->created_at->diffForHumans() }}</b></p>
                </div>

                <div class="col-lg-5 center-annonces">
                    @foreach ($offre->competences as $competence)
                    <a href="{{ url('/search/'. $competence->nom) }}">{{$competence->nom}}</a>
                    @endforeach
                </div>

                <div class="col-lg-1 right-annonces">
                    <a href="{{ url('/search/offres/teletravail') }}">
                        {{ $offre->teleTravailOffre == 'oui' ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @endforeach
            @endif



            @if(isset($demandes) && count($demandes) > 0)
            <h2>Demandes pour la recherche <strong>"{{$query}}"</strong></h2>
            @foreach($demandes as $demande)
            <div class="row annonces-content">
                <div class="col-lg-6 left-annonces">
                    <a href="{{ route('demandes.show', ['demande' => $demande->id]) }}">
                        <h4>{{ $demande->titreDemande }}</h4>
                    </a>
                    <h5>{{ $demande->etudiant->nomEtudiant . ', ' . 
                                            $demande->etudiant->regionEtudiant .'('. $demande->etudiant->villeEtudiant .')' }}
                    </h5>
                    <p>{{ substr($demande->etudiant->presentationEtudiant,0,200).'...' }}</p>
                    <p><b>{{ $demande->created_at->diffForHumans() }}</b></p>
                </div>

                <div class="col-lg-5 center-annonces">
                    @foreach ($demande->competences as $competence)
                    <a href="{{ url('/search/'. $competence->nom) }}">{{$competence->nom}}</a>
                    @endforeach
                </div>

                <div class="col-lg-1 right-annonces">
                    <a href="{{ url('/search/demandes/teletravail') }}">
                        {{ $demande->teleTravailDemande == 'oui' ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @endforeach
            @endif



            @if(isset($entreprises) && count($entreprises) > 0)
            <h2>Entreprises pour la recherche <strong>"{{$query}}"</strong></h2>
            @foreach($entreprises as $entreprise)
            @foreach ($entreprise->offres as $offre)
            <div class="row annonces-content">
                <div class="col-lg-6 left-annonces">
                    <a href="{{ route('offres.show', ['offre' => $offre->id]) }}">
                        <h4>{{ $offre->nomOffre }}</h4>
                    </a>
                    <h5>{{ $offre->entreprise->nomEntreprise . ', ' . $offre->entreprise->rueEntreprise }}</h5>
                    <p>{{ substr($offre->descriptionOffre,0,200).'...' }}</p>
                    <p><b>{{ $offre->created_at->diffForHumans() }}</b></p>
                </div>

                <div class="col-lg-5 center-annonces">
                    @foreach ($offre->competences as $competence)
                    <a href="{{ url('/search/'. $competence->nom) }}">{{$competence->nom}}</a>
                    @endforeach
                </div>

                <div class="col-lg-1 right-annonces">
                    <a href="{{ url('/search/offres/teletravail') }}">
                        {{ $offre->teleTravailOffre == 'oui' ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @endforeach
            @endforeach
            @endif



            @if(isset($etudiants) && count($etudiants) > 0)
            <h2>Etudiants pour la recherche <strong>"{{$query}}"</strong></h2>
            @foreach($etudiants as $etudiant)
            @foreach ($etudiant->demandes as $demande)
            <div class="row annonces-content">
                <div class="col-lg-6 left-annonces">
                    <a href="{{ route('demandes.show', ['demande' => $demande->id]) }}">
                        <h4>{{ $demande->titreDemande }}</h4>
                    </a>
                    <h5>{{ $demande->etudiant->nomEtudiant . ', ' . 
                                                                        $demande->etudiant->regionEtudiant .'('. $demande->etudiant->villeEtudiant .')' }}
                    </h5>
                    <p>{{ substr($demande->etudiant->presentationEtudiant,0,200).'...' }}</p>
                    <p><b>{{ $demande->created_at->diffForHumans() }}</b></p>
                </div>

                <div class="col-lg-5 center-annonces">
                    @foreach ($demande->competences as $competence)
                    <a href="{{ url('/search/'. $competence->nom) }}">{{$competence->nom}}</a>
                    @endforeach
                </div>

                <div class="col-lg-1 right-annonces">
                    <a href="{{ url('/search/demandes/teletravail') }}">
                        {{ $demande->teleTravailDemande == 'oui' ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @endforeach
            @endforeach
            @endif



            @if(isset($competences) && count($competences) > 0)
            @foreach($competences as $competence)
            @if (count($competence->demandes) > 0)
            <h2>Compétences liés aux demandes pour la recherche <strong>"{{$query}}"</strong></h2>
            @endif
            @forelse ($competence->demandes as $demande)
            <div class="row annonces-content">
                <div class="col-lg-6 left-annonces">
                    <a href="{{ route('demandes.show', ['demande' => $demande->id]) }}">
                        <h4>{{ $demande->titreDemande }}</h4>
                    </a>
                    <h5>{{ $demande->etudiant->nomEtudiant . ', ' . 
                                                            $demande->etudiant->regionEtudiant .'('. $demande->etudiant->villeEtudiant .')' }}
                    </h5>
                    <p>{{ substr($demande->etudiant->presentationEtudiant,0,200).'...' }}</p>
                    <p><b>{{ $demande->created_at->diffForHumans() }}</b></p>
                </div>

                <div class="col-lg-5 center-annonces">
                    @foreach ($demande->competences as $competence)
                    <a href="{{ url('/search/'. $competence->nom) }}">{{$competence->nom}}</a>
                    @endforeach
                </div>

                <div class="col-lg-1 right-annonces">
                    <a href="{{ url('/search/demandes/teletravail') }}">
                        {{ $demande->teleTravailDemande == 'oui' ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @empty
            <?php $commpVide = true; ?>

            @endforelse
            @if (count($competence->offres) > 0)
            <h2>Compétences liés aux offres pour la recherche <strong>"{{$query}}"</strong></h2>
            @endif
            @forelse ($competence->offres as $offre)
            <div class="row annonces-content">
                <div class="col-lg-6 left-annonces">
                    <a href="{{ route('offres.show', ['offre' => $offre->id]) }}">
                        <h4>{{ $offre->nomOffre }}</h4>
                    </a>
                    <h5>{{ $offre->entreprise->nomEntreprise . ', ' . $offre->entreprise->rueEntreprise }}</h5>
                    <p>{{ substr($offre->descriptionOffre,0,200).'...' }}</p>
                    <p><b>{{ $offre->created_at->diffForHumans() }}</b></p>
                </div>

                <div class="col-lg-5 center-annonces">
                    @foreach ($offre->competences as $competence)
                    <a href="{{ url('/search/'. $competence->nom) }}">{{$competence->nom}}</a>
                    @endforeach
                </div>

                <div class="col-lg-1 right-annonces">
                    <a href="{{ url('/search/offres/teletravail') }}">
                        {{ $offre->teleTravailOffre == 'oui' ? 'Télétravail possible' : '' }}
                    </a>
                </div>
            </div><br>
            @empty
            <?php $commpVide = true; ?>
            @endforelse
            @endforeach
            @endif

        </div>
</section>
@endsection
<!--
<style>
    .tagtag {
        color: white;
        padding: 5px;
        margin-left: 10px;
        margin-right: 10px;
        border-radius: 3px;
        background-color: #113448;
    }

    .tag {
        padding: 5px;
        margin-left: 10px;
        margin-right: 10px;
        border-radius: 3px;
    }

    tr {
        margin-bottom: 10px;
    }
</style>



Search Demande
<div class="container">
    <h1>Recherche dans le contenu "{{$query}}"</h1>
    @if(isset($demandes) && count($demandes) > 0)
    <h5 style="color: black">Demandes</h5>
    @foreach ($demandes as $demande)
    <ul>
        <li scope="row"><span>{{$demande->titreDemande}}</span>
            <span class="tagtag">{{$demande->dureeDemande}}</span>
            <a href="/demande/{{$demande->id}}">Voir l'offre</a></li>
    </ul>
    @endforeach
    @endif
</div>


Search Etudiant
<div class="container">
    @if(isset($etudiants) && count($etudiants) > 0)
    <h5 style="color: black">Etudiants</h5>
    @foreach ($etudiants as $entreprise)
    @foreach ($entreprise->demandes as $demande)
    <ul>
        <li scope="row"><span>{{$demande->titreDemande}}</span>
            <span class="tagtag">{{$demande->dureeDemande}}</span>
            <a href="/demandes/{{$demande->id}}">Voir l'offre</a></li>
    </ul>
    @endforeach
    @endforeach
    @endif
</div>


Search Offre
<div class="container">
    @if(isset($offres) && count($offres) > 0)
    <h5 style="color: black">Offres</h5>
    @foreach ($offres as $offre)
    <ul>
        <li scope="row"><span>{{$offre->nomOffre}}</span>
            <span class="tagtag">{{$offre->dureeOffre}}</span>
            <a href="/offres/{{$offre->id}}">Voir l'offre</a></li>
    </ul>
    @endforeach
    @endif
</div>


Search Entreprise
<div class="container">
    @if(isset($entreprises) && count($entreprises) > 0)
    <h5 style="color: black">Entreprises</h5>
    @foreach ($entreprises as $entreprise)
    @foreach ($entreprise->offres as $offre)
    <ul>
        <li scope="row"><span>{{$offre->nomOffre}}</span>
            <span class="tagtag">{{$offre->dureeOffre}}</span>
            <a href="/offres/{{$offre->id}}">Voir l'offre</a></li>
    </ul>
    @endforeach
    @endforeach
    @endif
</div>


Search Competence
<div class="container">
    @if(isset($competences) && count($competences) > 0)
    @foreach ($competences as $competence)
    @if (count($competence->demandes) > 0 || count($competence->offres) > 0)
    <h5 style="color: black">Compétences</h5>
    @if($competence->demandes && count($competence->demandes) > 0)
    <h6>Demandes</h6>
    @foreach ($competence->demandes as $demande)
    <ul>
        <li scope="row"><span>{{$demande->titreDemande}}</span>
            <span class="tag">{{$demande->dureeDemande}}</span>
            <span class="tagtag">{{$competence->nom}} </span>
            <a href="/demandes/{{$demande->id}}">Voir la demande</a></li>
    </ul>
    @endforeach
    @endif
    @if($competence->offres && count($competence->offres) > 0)
    <h6>Offres</h6>
    @foreach ($competence->offres as $offre)
    <ul>
        <li scope="row"><span>{{$offre->nomOffre}}</span>
            <span class="tag">{{$offre->dureeOffre}}</span>
            <span class="tagtag">{{$competence->nom}} </span>
            <a href="/offres/{{$offre->id}}">Voir l'offre</a></li>
    </ul>
    @endforeach
    @endif
    @endif
    @endforeach
    @endif
</div>


Search Users
<div class="container">
    @if(isset($users) && count($users) > 0)
    <h5 style="color: black">Users</h5>
    @foreach ($users as $user)
    <ul>
        <li scope="row"><span class="tagtag">{{$user->name}}</span>
            <span>{{$user->email}}</span>
            <a href="/admin/profile/{{$user->id}}">Voir le profil</a></li>
    </ul>
    @endforeach
    @endif
</div>


<div class="container">
    @if(!isset($demandes) || !isset($competences) || !isset($etudiants))
    <p>{{$message ?? '' }}</p>
    @endif
</div>

--->