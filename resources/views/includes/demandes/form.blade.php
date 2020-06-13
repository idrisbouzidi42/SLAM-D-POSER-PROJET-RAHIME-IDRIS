@csrf
<div class="offres-poste">
  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="titre">Poste recherché <span class="important">(en français)</span>&nbsp;:</label>
      <input type="text" class="form-control @error('titreDemande') is-invalid @enderror" name="titreDemande" id="titre"
        placeholder="Nom du poste" value="{{ old('titreDemande') ?? $demande->titreDemande ?? '' }}"
        data-desc="#titre_alert" />
      @error('titreDemande')
      <div class="invalid-feedback">
        {{$errors->first('titreDemande')}}
      </div>
      @enderror
    </div>


    <div class="form-group col-md-6">
      <label for="dureeDemande">Durée souhaitée &nbsp;:</label>
      <input type="text" class="form-control @error('dureeDemande') is-invalid @enderror" name="dureeDemande" id="duree"
        value="{{ old('dureeDemande') ?? $demande->dureeDemande ?? '' }}" placeholder="En jours, mois, années..." />
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
        <option value=""></option>
        <option {{ old('teleTravailDemande') ?? $demande->teleTravailDemande == 'oui' ? 'selected' : ''}} value=oui>Oui
        </option>
        <option {{ old('teleTravailDemande') ?? $demande->teleTravailDemande == 'non' ? 'selected' : ''}} value='non'>
          Non</option>
      </select>
      @error('teleTravailDemande')
      <div class="invalid-feedback">
        {{$errors->first('teleTravailDemande')}}
      </div>
      @enderror
    </div>

    <div class="row checkbox-offres">
      <legend class="fieldset-label">Vos compétences &nbsp;:</legend>
      @foreach ($competences as $comp)
      <div class="form-group-lg col-lg-6">
        <label>
          <input class="form-check-input @error('competences') is-invalid @enderror" type="checkbox"
            name="competences[]" value='{{$comp->id}}' @foreach($demande->competences as $choisi)
          {{$choisi->id == $comp->id ? 'checked' : ''}} @endforeach
          > {{$comp->nom}}</label>
      </div>
      @endforeach
      @error('competences')
      <div class="invalid-feedback d-block">
        {{$errors->first('competences')}}
      </div>
      @enderror
    </div>

  </div>
  <h3>Vous</h3>
  <div class="form-row">

    <div class="form-group col-md-4">
      <label for="nom">Votre prénom et nom</label>
      <input type="text" class="form-control @error('nomEtudiant') is-invalid @enderror" name="nomEtudiant" id="nom"
        value="{{ old('nomEtudiant') ?? $demande->etudiant->nomEtudiant ?? '' }}" data-desc="#nom_alert" />
      @error('nomEtudiant')
      <div class="invalid-feedback">
        {{$errors->first('nomEtudiant')}}
      </div>
      @enderror
    </div>

    <div class="form-group col-md-4">
      <label for="email">E-mail:</label>
      <input type="email" class="form-control @error('emailEtudiant') is-invalid @enderror" name="emailEtudiant"
        id="email" value="{{ old('emailEtudiant') ?? $demande->etudiant->emailEtudiant ?? '' }}" />
      @error('emailEtudiant')
      <div class="invalid-feedback">
        {{$errors->first('emailEtudiant')}}
      </div>
      @enderror
    </div>

    <div class="form-group col-md-4">
      <label for="tel">Téléphone de contact (facultatif)&nbsp;:</label>
      <input type="tel" class="form-control @error('telEtudiant') is-invalid @enderror" name="telEtudiant" id="tel"
        value="{{ old('telEtudiant') ?? $demande->etudiant->telEtudiant ?? '' }}" />
      @error('telEtudiant')
      <div class="invalid-feedback">
        {{$errors->first('telEtudiant')}}
      </div>
      @enderror
    </div>

    <div class="form-group col-md-8">
      <label for="presentation">Votre présentation :</label>

      <textarea name="presentationEtudiant" class="form-control @error('presentationEtudiant') is-invalid @enderror"
        id="presentation" cols="50" rows="10"
        data-desc="#description_alert">{{ old('presentationEtudiant') ?? $demande->etudiant->presentationEtudiant ?? '' }}</textarea>
      @error('presentationEtudiant')
      <div class="invalid-feedback">
        {{$errors->first('presentationEtudiant')}}
      </div>
      @enderror
      <p class="rules-form">
        Présentez-vous en quelques lignes : votre expérience, votre niveau d'études,
        vos atouts et hobbies. Bref, mettez-vous en valeur !
        Evitez les copier-coller de CV ou les lettre-types générales..</p>
    </div>

    <div class="form-group col-md-4">
      <label for="addcv">Votre CV à télécharger&nbsp;:</label>
      <div class="upload-row">
        <div class="upload-file">
          <div id="addcv-preview" class="upload-preview"></div>
          <input type="file" name="cvEtudiant" id="addcv"
            class="form-control @error('cvEtudiant') is-invalid @enderror upload-to-preview visuallyhidden"
            value="{{ old('cvEtudiant') ?? $demande->etudiant->cvEtudiant ?? '' }}">
          <label for="cvcv" class="upload awesome blue small"><i aria-hidden="true"
              class="icon icon-upload-cloud"></i></label>
        </div>
      </div>
      @error('cvEtudiant')
      <div class="invalid-feedback d-block">
        {{$errors->first('cvEtudiant')}}
      </div>
      @enderror

    </div>

    <div class="form-group col-md-4">
      <label for="region">Région&nbsp;<span class="important">(uniquement France) </span>:</label>
      <select name="regionEtudiant" class="form-control @error('regionEtudiant') is-invalid @enderror" id="region">
        @foreach ($demande->etudiant->getRegionEtudiantOptions() as $key => $value)
        <option value="{{$key}}"
          {{ old("regionEtudiant") == $key ?? $demande->etudiant->regionEtudiant  == $key ? 'selected' : '' }}>
          {{$value}}</option>
        @endforeach
      </select>
      @error('regionEtudiant')
      <div class="invalid-feedback">
        {{$errors->first('regionEtudiant')}}
      </div>
      @enderror
    </div>

    <div class="form-group col-md-4">
      <label for="ville">Précisions (ville)&nbsp;:</label>
      <input type="text" class="form-control" name="villeEtudiant" id="ville"
        value="{{$demande->etudiant->villeEtudiant}}" />
    </div>




    <div class="form-group col-md-4">
      <label for="site">Site web (personnel, portfolio...)&nbsp;:</label>
      <input type="site" class="form-control" name="siteEtudiant" id="site"
        value="{{$demande->etudiant->siteEtudiant}}" />
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
</div>