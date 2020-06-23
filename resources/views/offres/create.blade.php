@section('title', 'DEPOT PROJET - Poster une offre')

@extends('layouts.base-all')


@section('pages-title', 'Soumettre une offre de stage')
@section('content')

<div id="all-annonces">
    <div class="container py-5">
        <h1>Proposez une offre de stage</h1>
        <p class="rules-form">
            Indiquez le type de contrat, les modalités d'embauche, les compétences recherchées… La
            rédaction de
            l'annonce en
            français est obligatoire.</p>
        <div class="annonces-form">
            <form method="POST" action="{{ route('offres.create') }}">
                @csrf
                <div class="row annonces-post">
                    <div class="form-group col-md-6">
                        <label for="nomOffre">Intitulé du poste/métier<span class="require-form">*</span></label>
                        <input type="text" name="nomOffre" id="nomOffre"
                            placeholder="Ex : Développeur·euse application web"
                            class="form-control @error('nomOffre') is-invalid @enderror"
                            value="{{ old('nomOffre') ?? $offre->nomOffre ?? '' }}">

                        @error('nomOffre')
                        <div class="invalid-feedback">
                            {{$errors->first('nomOffre')}}
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-md-4">
                        <label for="dureeOffre">Durée de l'offre<span class="require-form">*</span></label>
                        <input type="text" name="dureeOffre" id="dureeOffre" placeholder="En jours, mois, années..."
                            class="form-control @error('dureeOffre') is-invalid @enderror"
                            value="{{ old('dureeOffre') ?? $offre->dureeOffre ?? '' }}">

                        @error('dureeOffre')
                        <div class="invalid-feedback">
                            {{$errors->first('dureeOffre')}}
                        </div>
                        @enderror
                    </div>


                    <div class="form-group col-md-10">
                        <label for="descriptionOffre">Description du offre<span class="require-form">*</span></label>
                        <textarea cols="50" rows="10" type="text" name="descriptionOffre" id="descriptionOffre"
                            class="form-control @error('descriptionOffre') is-invalid @enderror"
                            value="{{ old('descriptionOffre') ?? $offre->descriptionOffre ?? ''}}">{{old('descriptionOffre') ?? $offre->descriptionOffre ?? ''}}</textarea>
                        @error('descriptionOffre')
                        <div class="invalid-feedback">
                            {{$errors->first('descriptionOffre')}}
                        </div>
                        @enderror
                        <p class="rules-form">
                            Pensez à donner le maximum d'informations : type de missions,
                            environnement,
                            salaire prévu, modalités de réponse pour les postulants, temps complet ou temps partiel.</p>
                    </div>
                </div>

                <div class="row py-3">
                    <label for="teleTravailOffre">Télétravail possible ?</label>
                    <div class="form-group col-md-2">

                        <select name="teleTravailOffre" id="teleTravailOffre"
                            class="form-control @error('teleTravailOffre') is-invalid @enderror">
                            <option {{ old('teleTravailOffre') == 'oui' ? 'selected' : '' }} value=oui>Oui</option>
                            <option {{ old('teleTravailOffre') == 'non' ? 'selected' : ''}} value='non'>Non</option>
                        </select>

                        @error('teleTravailOffre')
                        <div class="invalid-feedback">
                            {{$errors->first('teleTravailOffre')}}
                        </div>
                        @enderror
                    </div>
                    <legend class="fieldset-label py-3">Compétences souhaitées<span class="require-form">*</span>
                    </legend>
                    <div class="form-group col-md-6 checkbox">

                        @foreach ($competences as $comp)

                        <ul>
                            <li>
                                <label>
                                    <input class="form-check-input @error('competences') is-invalid @enderror"
                                        type="checkbox" name="competences[]" value='{{$comp->id}}'
                                        @if(is_array(old('competences'))){{in_array($comp->id,old('competences')) ? 'checked' : '' }}@endif>
                                    {{$comp->nom}}
                                </label>
                            </li>
                        </ul>
                        @endforeach
                        @error('competences')
                        <div class="invalid-feedback d-block">
                            {{$errors->first('competences')}}
                        </div>
                        @enderror
                    </div>

                </div>

                <h1>Employeur</h1>
                <div class="row annonces-post">
                    <div class="form-group col-md-4">
                        <label for="nomEntreprise">Nom de l'entreprise<span class="require-form">*</span></label>
                        <input type="text" name="nomEntreprise"
                            class="form-control @error('nomEntreprise') is-invalid @enderror" id="nomEntreprise"
                            value="{{ old('nomEntreprise') ?? $offre->entreprise->nomEntreprise ?? '' }}">

                        @error('nomEntreprise')
                        <div class="invalid-feedback">
                            {{$errors->first('nomEntreprise')}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="rueEntreprise">Adresse de l'entreprise<span class="require-form">*</span></label>
                        <input type="text" name="rueEntreprise" id="rueEntreprise"
                            class="form-control @error('rueEntreprise') is-invalid @enderror"
                            value="{{ old('rueEntreprise') ?? $offre->entreprise->rueEntreprise ?? ''}}">

                        @error('rueEntreprise')
                        <div class="invalid-feedback">
                            {{$errors->first('rueEntreprise')}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-3">
                        <label for="nomTuteurEntreprise">Nom du contact / tuteur<span
                                class="require-form">*</span></label>
                        <input type="text" name="nomTuteurEntreprise" id="nomTuteurEntreprise"
                            class="form-control @error('nomTuteurEntreprise') is-invalid @enderror"
                            value="{{ old('nomTuteurEntreprise') ?? $offre->entreprise->nomTuteurEntreprise ?? ''}}">

                        @error('nomTuteurEntreprise')
                        <div class="invalid-feedback">
                            {{$errors->first('nomTuteurEntreprise')}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-3">
                        <label for="telEntreprise">Téléphone</label>
                        <input type="tel" name="telEntreprise" pattern="[0-9]{10}" id="telEntreprise"
                            class="form-control @error('telEntreprise') is-invalid @enderror"
                            value="{{ old('telEntreprise') ?? $offre->entreprise->telEntreprise ?? ''}}">

                        @error('telEntreprise')
                        <div class="invalid-feedback">
                            {{$errors->first('telEntreprise')}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="mailEntreprise">Mail de l'entreprise / contact / tuteur<span
                                class="require-form">*</span></label>
                        <input type="email" name="mailEntreprise" id="mailEntreprise"
                            class="form-control @error('mailEntreprise') is-invalid @enderror"
                            value="{{ old('mailEntreprise') ?? $offre->entreprise->mailEntreprise ?? ''}}">

                        @error('mailEntreprise')
                        <div class="invalid-feedback">
                            {{$errors->first('mailEntreprise')}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="adresseWebEntreprise">Site web</label>
                        <input type="text" name="adresseWebEntreprise" id="adresseWebEntreprise"
                            class="form-control @error('adresseWebEntreprise') is-invalid @enderror"
                            value="{{ old('adresseWebEntreprise') ?? $offre->entreprise->adresseWebEntreprise ?? ''}}">

                        @error('adresseWebEntreprise')
                        <div class="invalid-feedback">
                            {{$errors->first('adresseWebEntreprise')}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-md-3">
                        <label for="typeEntreprise">Statut</label>

                        <select class="form-control @error('typeEntreprise') is-invalid @enderror"
                            name="typeEntreprise">
                            @foreach ($offre->entreprise->getStatusOptions() as $key => $value)
                            <option value="{{ $key }}" {{ old('typeEntreprise') == $key ? 'selected' : ''}}>
                                {{ $value }}
                            </option>
                            @endforeach
                        </select>
                        @error('typeEntreprise')
                        <div class="invalid-feedback">
                            {{$errors->first('typeEntreprise')}}
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="consignes-form">
                    <p>En Déposant votre annonce, vous certifiez que votre annonce vérifie le règlement général.
                        Conformément à la Loi Informatique et Libertés du 6 janvier 1978, vous disposez
                        d'un droit d'accès et de rectification aux données personnelles vous concernant en nous
                        contactant.
                    </p>
                    <span>
                        <p>Pensez à bien vous relire, qu'il n'y est aucune faute de frappe ou oubli.</p>
                    </span>
                </div>
                <div class="form-group btn-offre py-3">
                    <button type="submit" class="form-control">Envoyer l'offre</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection