    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-container">
                            <h1><span id="js-rotating">Publiez vos offres & demandes<br> sans inscription ! </span></h1>
                            <h2>Trouver un stagiaire n'a jamais été aussi  <span>facile !</span></h2>
                            <div class="social mt-4">
                              <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                              <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                              <a class="github" href="#"><i class="fa fa-github"></i></a>
                              <a class="gitlab" href="#"><i class=" fa fa-gitlab"></i></a>
                            </div>

                            <div class="btn-header">
                                <div class="button-4 mx-auto mt-4">
                                    <div class="eff-4"></div>
                                        <a href="{{ url('offres/create') }}" class="cd-btn js-cd-panel-trigger" data-panel="main">Publier une offre d'emploi</a>
                                </div>
                                <div class="button-4 mx-auto mt-4">
                                    <div class="eff-4"></div>
                                        <a href="{{ url('demandes/create') }}" class="cd-btn js-cd-panel-trigger" data-panel="main">Publier une demande + CV</a>
                                </div>
                            </div>

                            <a href="#features" class="target-scroll"><i class="fa fa-chevron-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header> <!-- end of header -->