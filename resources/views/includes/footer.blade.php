</main>

<section class="footer">
    <!-- footer-22 -->
    <div class="footer-hny py-5">
        <div class="container py-lg-4">
            <div class="sub-columns row">
                <div class="sub-one-left col-lg-4 col-md-6">
                    <h6>DEPOT PROJET </h6>
                    <p>Proposer aux entreprises et étudiants du lycée Simone Weil,
                        localisé à Saint-Priest-en-Jarez,
                        une application web qui va leur permettre de poster des offres et demandes de stages.
                    </p>

                </div>
                <div class="sub-two-right col-lg-4 col-md-6 my-md-0 my-5">
                    <h6>Liens utiles</h6>
                    <div class="footer-hny-ul">
                        <ul>
                            <li><a href="{{ url('/') }}">Accueil</a></li>
                            <li><a href="{{ url('offres/index') }}">Les offres</a></li>
                            <li><a href="{{ url('demandes/index') }}">Les demandes</a></li>
                            <li><a href="{{ route('offres.create') }}">Poster une offre</a></li>
                            <li><a href="{{ route('demandes.create') }}">Poster une demande</a></li>
                            <li><a href="{{ url('contact') }}">Contact</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Mentions Légales</a></li>
                            <li><a href="#">Politique de confidentialité</a></li>
                        </ul>
                    </div>
                </div>

                <div class="sub-one-left col-lg-4 col-md-6 mt-lg-0 mt-md-5">
                    <h6>Lorem ipsum</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="below-section">
        <div class="container">
            <div class="copyright-footer row">
                <div class="columns col-lg-6">
                    <ul class="social footer">
                        <li><a href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
                        <li><a href="#"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
                        <li><a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
                        <li><a href="#"><span class="fa fa-google" aria-hidden="true"></span></a></li>
                        <li><a href="#"><span class="fa fa-github" aria-hidden="true"></span></a></li>
                    </ul>
                </div>
                <div class="columns copy-right col-lg-6">
                    <p>Ce site est la propriété du lycée Simone Weil.<br>
                        © 2020 Tout droit réservé. Lycée Simone Weil, Saint-Priest-en-Jarez. Réaliser par
                        Idris Bouzidi et Rahime Soyiff étudiants BTS SIO.
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- Bootstrap JqueryJS Files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>




<!-- Template Main JS File -->
<script src="{{ asset('src/js/main.js') }}"></script>
<script src="{{ asset('src/js/validate.js') }}"></script>
</body>

</html>