@csrf
    <div id="form-demande">

      <div class="form-group">
        <label for="titre">Poste recherché <span class="important">(en français)</span>&nbsp;:</label>
        <input type="text" class="form-control" name="titreDemande" id="titre" placeholder="Nom du poste" value="{{$demande->titreDemande}}" data-desc="#titre_alert" />
      </div>
  
        
      <div class="form-group">
        <label for="duree">Durée souhaitée &nbsp;:</label>
        <input type="text" class="form-control" name="dureeDemande" id="duree" value="{{$demande->dureeDemande}}" placeholder="En jours, mois, années..." />
      </div>

      <div class="form-group">
        <label for="teleTravailDemande">Teletravail</label>
        <select name="teleTravailDemande" id="teleTravailDemande" class="form-control @error('teleTravailDemande') is-invalid @enderror" value="{{old('teleTravailDemande') ?? $demande->teleTravailDemande ?? ''}}">
        <option value=""></option>
        <option {{$demande->teleTravailDemande == 'oui' ? 'selected' : ''}} value=oui>Oui</option>
        <option {{$demande->teleTravailDemande == 'non' ? 'selected' : ''}} value='non'>Non</option>
        </select>
        @error('teleTravailDemande')
        <div class="invalid-feedback">
            {{$errors->first('teleTravailDemande')}}
        </div>
        @enderror
    </div>
  
    <div class="form-group">
        <legend class="fieldset-label">Vos compétences &nbsp;:</legend>              
        <ul class="emploi-competences unstyled">
            @foreach ($competences as $comp)
                <li>
                    <label>
                    <input type="checkbox"  name="competences[]" value='{{$comp->id}}' 
                    @foreach($demande->competences as $choisi) 
                    {{$choisi->id == $comp->id ? 'checked' : ''}} @endforeach
                    > {{$comp->nom}}</label>
                </li>
            @endforeach
        </ul>
    </div>
  

      

  

<br><br>
      <h3>Vous</h3>  
      <div class="form-group">
        <label for="nom">Votre prénom et nom</label>
        <input type="text" class="form-control" name="nomEtudiant" id="nom" value="{{$demande->etudiant->nomEtudiant}}" data-desc="#nom_alert" />
      </div>
  
      <div class="form-group">
        <label for="presentation">Votre présentation :</label>
        <textarea name="presentationEtudiant" class="form-control form-textarea utosize" id="presentation" cols="50" rows="10" data-desc="#description_alert">{{$demande->etudiant->presentationEtudiant}}</textarea>
      </div>
  
    <div class="form-group">
        <label for="addcv">Votre CV à télécharger&nbsp;:</label>    
        <div class="upload-row">
          <div class="upload-file">
            <div id="addcv-preview" class="upload-preview"></div>
            <input type="file" name="cvEtudiant" id="addcv" class="form-control upload-to-preview visuallyhidden" value="{{$demande->etudiant->cvEtudiant}}">
            <label for="cvcv" class="upload awesome blue small"><i aria-hidden="true" class="icon icon-upload-cloud"></i></label>
          </div>
        </div>  
    </div>
  
    <div class="form-group">
        <label for="region">Région&nbsp;<span class="important">(uniquement France) </span>:</label>
        <select name="regionEtudiant" class="form-control" id="region">
          @foreach ($demande->etudiant->getRegionEtudiantOptions() as $key => $value)
          <option value="{{$key}}"{{$demande->etudiant->regionEtudiant == $value ? 'selected' : ''}}>{{$value}}</option>
          @endforeach
        </select>    
    </div>
  
      <div class="form-group">
        <label for="ville">Précisions (ville)&nbsp;:</label>
        <input type="text" class="form-control" name="villeEtudiant" id="ville" value="{{$demande->etudiant->villeEtudiant}}" />
      </div>
  
  
      <div class="form-group">
        <label for="tel">Téléphone de contact (facultatif)&nbsp;:</label>
        <input type="tel" class="form-control" name="telEtudiant" id="tel" value="{{$demande->etudiant->telEtudiant}}" />
      </div>
  
      <div class="form-group">
        <label for="site">Site web (personnel, portfolio...)&nbsp;:</label>
        <input type="site" class="form-control" name="siteEtudiant" id="site" value="{{$demande->etudiant->siteEtudiant}}" />
      </div>
  
      <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" name="emailEtudiant" id="email" value="{{$demande->etudiant->emailEtudiant}}"  />
      </div>