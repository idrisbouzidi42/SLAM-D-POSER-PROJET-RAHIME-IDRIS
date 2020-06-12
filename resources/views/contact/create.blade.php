@extends('layouts.base-all')

@section('content')



<section class="contact-main">
    <div class="contact1-bg py-5">
        <div class="container py-5">
            <div class="row contact-main">
                <div class="grid col-lg-6">
                    <div class="column">
                        <h3>Comment on peut vous aider ?</h3>
                        <p class="head-main">Sur cette page vous pouvez nous contacter via ce formulaire ou bien par
                            mail ou par téléphone.</p>
                    </div>
                    <div class="column2">
                        <div class="contact-para contact-info-align">
                            <div class="icon">
                                <span class="fa fa-map-marker"></span>
                            </div>
                            <div>
                                <strong class="info">Adresse :</strong class="info">
                                <p>Lycée Simone Weil, Saint-Priest-en-Jarez</p>
                            </div>
                        </div>
                        <div class="contact-info-align">
                            <div class="icon">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div div class="icon-con-info">
                                <strong class="info">Mobile :</strong class="info"> <a href="tel:+33665702260"> 06 65 70
                                    22 60</a>
                            </div>
                        </div>
                        <div class="contact-info-align">
                            <div class="icon">
                                <span class="fa fa-envelope-open-o"> </span>
                            </div>
                            <div>
                                <strong class="info">Adresse E-mail :</strong> <a
                                    href="mailto:depot.projet.support@gmail.com">
                                    depot.projet.support@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="column3">
                        <h4>Rejoignez-nous sur les réseaux sociaux !</h4>
                        <a href="#facebook" class="facebook" title="facebook"><span class="fa fa-facebook"></span></a>
                        <a href="#twitter" class="twitter" title="twitter"><span class="fa fa-twitter"></span></a>
                        <a href="#linkedin" class="linkedin" title="linkedin"><span class="fa fa-linkedin"></span></a>
                        <a href="#instagram" class="instagram" title="instagram"><span
                                class="fa fa-instagram"></span></a>
                    </div>
                </div>
                <div class="map col-lg-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11190.880963359657!2d4.3675329!3d45.4754392!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x437e3f71138bd9b2!2sLyc%C3%A9e%20Simone%20Weil!5e0!3m2!1sfr!2sfr!4v1591979751806!5m2!1sfr!2sfr"
                        frameborder="0" style="border:0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-form py-5">
        <div class="container">
            <div class="contacts12-main">
                <h3 class="text-center">Envoyez-nous un message</h3>

                <p class="text-center">Note: pensez à mettre votre objet et préciser votre demande correctement.</p>

                <form action="/contact" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nom">Nom</label>
                            <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom"
                                id="nom">
                            @error('nom')
                            <div class="invalid-feedback">
                                {{$errors->first('nom')}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                                id="email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{$errors->first('email')}}
                            </div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                            id="message" cols="30" rows="10"></textarea>
                        @error('message')
                        <div class="invalid-feedback">
                            {{$errors->first('message')}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Envoyer un message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection