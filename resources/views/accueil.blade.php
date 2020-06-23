@extends('layouts.base')

@section('content')

<section class="front-dp-main">
    <!-- /content-grids-->
    <div class="front-dp-content py-5">
        <div class="container py-lg-3">
            <h3 class="title text-center">
                DIFFUSEZ VOS OFFRES & DEMANDES</h3>
            <!-- /row-->
            <div class="front-dp-photo row mt-lg-5 mt-4 px-lg-5">
                <div class="dp-photo-inf-left col-lg-6 pr-lg-4" data-aos="fade-up">
                    <img src="{{ asset('src/img/search.png') }}" class="img-fluid" alt="">
                </div>
                <div class="dp-photo-inf-right col-lg-6 text-left pl-lg-5" data-aos="fade-down">

                    <h4>La recherche d'une annonce juste en 1 click !</h4>
                    <p>La page offre de stage permet à l'étudiant de voir toutes les offres émises par les recruteurs,
                        détaillant toutes les
                        informations sur le poste en question.. La page demande permet aux étudiants de poster une
                        demande de stage afin d'être
                        recruté par une entreprise.</p>
                </div>
            </div>
            <!-- //row-->
            <div class="front-dp-photo row py-lg-5 py-4 mt-lg-5 mt-4 px-lg-5">

                <div class="dp-photo-inf-right col-lg-6 text-left pr-lg-5" data-aos="fade-down">
                    <h4>
                        Un profil performant pour être repéré par les recruteurs</h4>
                    <h5>OPTIMISER VOTRE CANDIDATURE : </h5>
                    <ul>
                        <li><a class="fa fa-check"></a>CV, lettres, profil</li>
                        <li><a class="fa fa-check"></a>Entretiens</li>
                        <li><a class="fa fa-check"></a>Réseaux Sociaux</li>
                    </ul>
                    <p>Soigner votre orthographe et utiliser des intitulés simples et compréhensibles, peut vous
                        permettre de rendre plus
                        efficace votre profil. L’objectif : mieux ressortir dans les résultats des
                        recherches effectuées par les
                        recruteurs et attirer leur attention.
                    </p>
                </div>
                <div class="dp-photo-inf-left col-lg-6 pr-lg-4" data-aos="fade-up">
                    <img src="{{ asset('src/img/recrutement.png') }}" class="img-fluid" alt="">
                </div>
            </div>

            <div class="front-dp-photo row mt-lg-5 mt-4 px-lg-5">
                <div class="dp-photo-inf-left col-lg-6 pr-lg-4" data-aos="fade-up">
                    <img src="{{ asset('src/img/lsw-new-new.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="dp-photo-inf-right col-lg-6 text-left pl-lg-5" data-aos="fade-down">

                    <h4>Projet demandé par le Lycée Simone Weil</h4>
                    <p>Objectif : Proposer aux entreprises et étudiants du lycée Simone Weil, localisé à
                        Saint-Priest-en-Jarez, une application web qui va
                        leur permettre de poster des offres et demandes de stages.</p>
                </div>
            </div>
            <div class="row features-main">
                <div class="col-md-4 feature-gird">
                    <div class="row features-hny-inner-gd">
                        <div class="col-md-3 featured_grid_left">
                            <div class="icon_left_grid">
                                <span class="fa fa-users" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="col-md-9 featured_grid_right_info pl-lg-0">
                            <h4>OPTIMISER VOTRE CANDIDATURE</h4>
                            <p>Poste rechercher, compétences, etc...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 feature-gird">
                    <div class="row features-hny-inner-gd">
                        <div class="col-md-3 featured_grid_left">
                            <div class="icon_left_grid">
                                <span class="fa fa-tachometer" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="col-md-9 featured_grid_right_info pl-lg-0">
                            <h4>FACILITÉ LA VISIBILITÉ WEB</h4>
                            <p>CV, lettres, profil, Entretiens
                                , Réseaux Sociaux</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 feature-gird">
                    <div class="row features-hny-inner-gd">
                        <div class="col-md-3 featured_grid_left">
                            <div class="icon_left_grid">
                                <span class="fa fa-handshake-o" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="col-md-9 featured_grid_right_info pl-lg-0">
                            <h4>VOUS ACCOMPAGNÉ</h4>
                            <p>Stratégie de recherche, Cibler les opportunités, Job étudiant, service civique, intérim,
                                etc…</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection