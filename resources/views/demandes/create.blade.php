@section('title', 'DEPOT PROJET - Poster une demande')

@extends('layouts.base-all')

@section('pages-title', 'Soumettre une demandes de stage')

@section('content')

<div id="all-annonces">
  <div class="container py-5">
    <h1>Proposez une demande de stage</h1>
    <p class="rules-form">
      Précisez ici votre demande, vos compétences, votre présentation, votre CV…
    </p>
    <form action="{{ route('demandes.create') }}" method="post" class="form-edit" enctype="multipart/form-data">
      @csrf
      <div class="row annonces-form">

        <div class="form-group col-md-6">
          <label for="titre">Poste recherché<span class="require-form">*</span></label>
          <input type="text" class="form-control @error('titreDemande') is-invalid @enderror" name="titreDemande"
            id="titre" placeholder="Nom du poste" value="{{ old('titreDemande') ?? '' }}" data-desc="#titre_alert" />
          @error('titreDemande')
          <div class="invalid-feedback">
            {{$errors->first('titreDemande')}}
          </div>
          @enderror
        </div>


        <div class="form-group col-md-6">
          <label for="dureeDemande">Durée souhaitée<span class="require-form">*</span></label>
          <input type="text" class="form-control @error('dureeDemande') is-invalid @enderror" name="dureeDemande"
            id="duree" value="{{ old('dureeDemande') ?? '' }}" placeholder="En jours, mois, années..." />
          @error('dureeDemande')
          <div class="invalid-feedback">
            {{$errors->first('dureeDemande')}}
          </div>
          @enderror
        </div>


        <div class="form-group col-md-2">
          <label for="teleTravailDemande">Teletravail</label>
          <select name="teleTravailDemande" id="teleTravailDemande"
            class="form-control @error('teleTravailDemande') is-invalid @enderror"
            value="{{old('teleTravailDemande') ?? $demande->teleTravailDemande ?? ''}}">
            <option {{ old('teleTravailDemande') == 'oui' ? 'selected' : ''}} value='oui'>Oui
            </option>
            <option {{ old('teleTravailDemande') == 'non' ? 'selected' : ''}} value='non'>Non
            </option>
          </select>
          @error('teleTravailDemande')
          <div class="invalid-feedback">
            {{$errors->first('teleTravailDemande')}}
          </div>
          @enderror
        </div>

        <legend class="fieldset-label">Vos compétences<span class="require-form">*</span></legend>
        <div class="form-group col-md-6 checkbox">
          @foreach ($competences as $comp)
          <ul>
            <li>
              <label>
                <input class="form-check-input @error('competences') is-invalid @enderror" type="checkbox"
                  name="competences[]" value='{{$comp->id}}' @if(is_array(old('competences')))
                  {{in_array($comp->id, old('competences')) ? 'checked': ''}} @endif>
                {{$comp->nom}}</label>
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


      <h3>Vous</h3>
      <div class="row annonces-post">

        <div class="form-group col-md-4">
          <label for="nom">Votre prénom et nom<span class="require-form">*</span></label>
          <input type="text" class="form-control @error('nomEtudiant') is-invalid @enderror" name="nomEtudiant" id="nom"
            value="{{ old('nomEtudiant') ?? '' }}" data-desc="#nom_alert" />
          @error('nomEtudiant')
          <div class="invalid-feedback">
            {{$errors->first('nomEtudiant')}}
          </div>
          @enderror
        </div>

        <div class="form-group col-md-4">
          <label for="email">E-mail<span class="require-form">*</span></label>
          <input type="email" class="form-control @error('emailEtudiant') is-invalid @enderror" name="emailEtudiant"
            id="email" value="{{ old('emailEtudiant') ?? '' }}" />
          @error('emailEtudiant')
          <div class="invalid-feedback">
            {{$errors->first('emailEtudiant')}}
          </div>
          @enderror
        </div>

        <div class="form-group col-md-4">
          <label for="tel">Téléphone de contact<span class="require-form">*</span></label>
          <input type="tel" class="form-control @error('telEtudiant') is-invalid @enderror" name="telEtudiant" id="tel"
            value="{{ old('telEtudiant') ?? '' }}" pattern="[0-9]{10}" />
          @error('telEtudiant')
          <div class="invalid-feedback">
            {{$errors->first('telEtudiant')}}
          </div>
          @enderror
        </div>

        <div class="form-group col-md-8">
          <label for="presentation">Votre présentation<span class="require-form">*</span></label>

          <textarea name="presentationEtudiant" class="form-control @error('presentationEtudiant') is-invalid @enderror"
            id="presentation" cols="50" rows="10"
            data-desc="#description_alert">{{ old('presentationEtudiant') ?? '' }}</textarea>
          @error('presentationEtudiant')
          <div class="invalid-feedback">
            {{$errors->first('presentationEtudiant')}}
          </div>
          @enderror
          <p class="rules-textarea">
            Présentez-vous en quelques lignes : votre expérience, votre niveau d'études,
            vos atouts et hobbies. Bref, mettez-vous en valeur !
            Evitez les copier-coller de CV ou les lettre-types générales..</p>
        </div>

        <div class="form-group col-md-4">
          <label for="addcv">Votre CV à télécharger<span class="require-form">*</span></label>
          <div class="upload-row">
            <div class="upload-file">
              <div id="addcv-preview" class="upload-preview"></div>
              <input type="file" name="cvEtudiant" id="addcv" class="form-control upload-to-preview visuallyhidden"
                value="{{ old('cvEtudiant') ?? '' }}">
              <label for="cvcv" class="upload awesome blue small"><i aria-hidden="true"
                  class="icon icon-upload-cloud"></i></label>
            </div>
          </div>


        </div>

        <div class="form-group col-md-4">
          <label for="region">Région</label>
          <select name="regionEtudiant" class="form-control @error('regionEtudiant') is-invalid @enderror" id="region">
            @foreach ($demande->etudiant->getRegionEtudiantOptions() as $key => $value)
            <option value="{{ $key }}" {{ old('regionEtudiant') == $key ? 'selected' : ''}}>
              {{ $value }}
            </option>
            @endforeach
          </select>
          @error('regionEtudiant')
          <div class="invalid-feedback">
            {{$errors->first('regionEtudiant')}}
          </div>
          @enderror
        </div>

        <div class="form-group col-md-4">
          <label for="ville">Précisions (ville)<span class="require-form">*</span></label>
          <input type="text" class="form-control" name="villeEtudiant" id="ville"
            value="{{old('villeEtudiant') ?? ''}}" />
        </div>

        <div class="form-group col-md-4">
          <label for="site">Site web (personnel, portfolio...)&nbsp;:</label>
          <input type="site" class="form-control" name="siteEtudiant" id="site" value="{{old('siteEtudiant') ?? ''}}" />
        </div>

      </div>
      <div class="consignes-form">
        <p>En Déposant votre annonce, vous certifiez que votre annonce vérifie le règlement général.
          Conformément à la Loi Informatique et Libertés du 6 janvier 1978, vous disposez
          d'un droit d'accès et de rectification aux données personnelles vous concernant en nous contactant.</p>
        <span>
          <p>Pensez à bien vous relire, qu'il n'y est aucune faute de frappe ou oubli.</p>
        </span>
      </div>
      <div class="form-group btn-offre py-3">
        <button type="submit" class="form-control">Envoyer la demande</button>
      </div>
    </form>
  </div>
</div>
</div>

@endsection