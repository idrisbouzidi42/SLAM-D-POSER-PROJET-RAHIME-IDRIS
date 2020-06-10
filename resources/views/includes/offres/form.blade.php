@csrf     

<!-- Block 1 Entreprise --->
    <h5>[Entreprise]</h5>
    <div class="groups" style="display: flex">
        <div class="form-group">
            <label for="nomEntreprise">Nom de l'entreprise</label>
            <input type="text" name="nomEntreprise" class="form-control @error('nomEntreprise') is-invalid @enderror" id="nomEntreprise" value="{{old('nomEntreprise') ?? $offre->entreprise->nomEntreprise ?? '' }}">
            @error('nomEntreprise')
                <div class="invalid-feedback">
                    {{$errors->first('nomEntreprise')}}
                </div>
            @enderror
        </div>
        
        <div class="form-group ml-5">
            <label for="typeEntreprise">Type d'entreprise</label>
            <select name="typeEntreprise" class="form-control @error('typeEntreprise') is-invalid @enderror" id="typeEntreprise" value="{{old('typeEntreprise') ?? $offre->entreprise->typeEntreprise ?? ''}}">
                <option value=""></option>
                <option {{$offre->entreprise->typeEntreprise === 'particulier' ? 'selected' : ''}} value="particulier">Particulier</option>
                <option {{$offre->entreprise->typeEntreprise === 'sarl' ? 'selected' : ''}} value="sarl">SARL</option>
                <option {{$offre->entreprise->typeEntreprise === "sas" ? 'selected' : ''}} value="sas">SAS</option>
            </select>
            @error('typeEntreprise')
            <div class="invalid-feedback">
                {{$errors->first('typeEntreprise')}}
            </div>
            @enderror
        </div>
    </div>
    

<!-- Block 2 Entreprise --->
    <div class="groups" style="display: flex">
        <div class="form-group">
            <label for="telEntreprise">Téléphone de l'entreprise</label>
            <input type="text" name="telEntreprise" id="telEntreprise" class="form-control @error('telEntreprise') is-invalid @enderror" value="{{old('telEntreprise') ?? $offre->entreprise->telEntreprise ?? ''}}">
            @error('telEntreprise')
            <div class="invalid-feedback">
                {{$errors->first('telEntreprise')}}
            </div>
            @enderror
        </div>
    
        <div class="form-group ml-5">
            <label for="adresseWebEntreprise">Site web</label>
            <input type="text" name="adresseWebEntreprise" id="adresseWebEntreprise" class="form-control @error('adresseWebEntreprise') is-invalid @enderror" value="{{old('adresseWebEntreprise') ?? $offre->entreprise->adresseWebEntreprise ?? ''}}">
            @error('adresseWebEntreprise')
            <div class="invalid-feedback">
                {{$errors->first('adresseWebEntreprise')}}
            </div>
            @enderror
        </div>
    </div>

<!-- Block 3 Entreprise --->
    <div class="groups" style="display: flex">
        <div class="form-group">
            <label for="nomTuteur">Nom du tuteur</label>
            <input type="text" name="nomTuteurEntreprise" id="nomTuteurEntreprise" class="form-control @error('nomTuteurEntreprise') is-invalid @enderror" value="{{old('nomTuteurEntreprise') ?? $offre->entreprise->nomTuteurEntreprise ?? ''}}">
            @error('nomTuteur')
            <div class="invalid-feedback">
                {{$errors->first('nomTuteurEntreprise')}}
            </div>
            @enderror
        </div>


        <div class="form-group ml-5">
            <label for="rueEntreprise">Adresse de l'entreprise</label>
            <input type="text" name="rueEntreprise" id="rueEntreprise" class="form-control @error('rueEntreprise') is-invalid @enderror" value="{{old('rueEntreprise') ?? $offre->entreprise->rueEntreprise ?? ''}}">
            @error('nrueEntreprise')
            <div class="invalid-feedback">
                {{$errors->first('rueEntreprise')}}
            </div>
            @enderror
        </div>
    </div>

<!-- Block 4 Entreprise --->
    <div class="groups" style="display: flex">
        <div class="form-group">
            <label for="codePostalEntreprise">Code postale</label>
            <input type="text" name="codePostalEntreprise" id="codePostalEntreprise" class="form-control @error('codePostalEntreprise') is-invalid @enderror" value="{{old('codePostalEntreprise') ?? $offre->entreprise->codePostalEntreprise ?? ''}}">
            @error('codePostalEntreprise')
            <div class="invalid-feedback">
                {{$errors->first('codePostalEntreprise')}}
            </div>
            @enderror
        </div>

        <div class="form-group ml-5">
            <label for="villeEntreprise">Ville</label>
            <input type="text" name="villeEntreprise" id="villeEntreprise" class="form-control @error('villeEntreprise') is-invalid @enderror"  value="{{old('villeEntreprise') ?? $offre->entreprise->villeEntreprise ?? ''}} ">
            @error('villeEntreprise')
            <div class="invalid-feedback">
                {{$errors->first('villeEntreprise')}}
            </div>
            @enderror
        </div>
    </div>



        <br><br><br>

<!-- Block 1 Offre --->
<h5>[Offre]</h5>
<div class="groups" style="display: flex">
        <div class="form-group">
            <label for="nomOffre">Nom du offre</label>
            <input type="text" name="nomOffre" id="nomOffre" class="form-control @error('nomOffre') is-invalid @enderror" value="{{old('nomOffre') ?? $offre->nomOffre ?? ''}}">
            @error('nomOffre')
            <div class="invalid-feedback">
                {{$errors->first('nomOffre')}}
            </div>
            @enderror
        </div>

        <div class="form-group ml-5">
            <label for="dureeOffre">Durée du stage</label>
            <input type="text" name="dureeOffre" id="dureeOffre" class="form-control @error('dureeOffre') is-invalid @enderror" value="{{old('dureeOffre') ?? $offre->dureeOffre ?? ''}}">
            @error('dureeOffre')
            <div class="invalid-feedback">
                {{$errors->first('dureeOffre')}}
            </div>
            @enderror
        </div>
</div>


<!-- Block 2 Offre --->
<div class="groups" style="display: flex">
        <div class="form-group">
            <label for="descriptionOffre">Description du offre</label>
            <textarea style="width:500px" cols="30" rows="10" type="text" name="descriptionOffre" id="descriptionOffre" class="form-control @error('descriptionOffre') is-invalid @enderror" value="{{old('descriptionOffre') ?? $offre->descriptionOffre ?? ''}}">{{old('descriptionOffre') ?? $offre->descriptionOffre ?? ''}}</textarea>
            @error('descriptionOffre')
            <div class="invalid-feedback">
                {{$errors->first('descriptionOffre')}}
            </div>
            @enderror

        </div>


        <div class="form-group ml-5">
            <label for="teleTravailOffre">Teletravail</label>
            <select name="teleTravailOffre" id="teleTravailOffre" class="form-control @error('teleTravailOffre') is-invalid @enderror" value="{{old('teleTravailOffre') ?? $offre->teleTravailOffre ?? ''}}">
            <option value=""></option>
            <option {{$offre->teleTravailOffre == 'oui' ? 'selected' : ''}} value=oui>Oui</option>
            <option {{$offre->teleTravailOffre == 'non' ? 'selected' : ''}} value='non'>Non</option>
            </select>
            @error('teleTravailOffre')
            <div class="invalid-feedback">
                {{$errors->first('teleTravailOffre')}}
            </div>
            @enderror
        </div>
</div>

        <div class="form-group">
            <legend class="fieldset-label">Vos compétences &nbsp;:</legend>              
            <ul class="emploi-competences unstyled">
                @foreach ($competences as $comp)
                    <li>
                        <label>
                        <input type="checkbox"  name="competences[]" value='{{$comp->id}}' 
                        @foreach($offre->competences as $choisi) 
                        {{$choisi->id == $comp->id ? 'checked' : ''}} @endforeach
                        > {{$comp->nom}}</label>
                    </li>
                @endforeach
            </ul>
      </div>

        <br><br><br>


        <style>
            .groups input, select {
                width: 500px;
            }
            
            .groups select {
                width: 500px;
            }
            </style>


       



