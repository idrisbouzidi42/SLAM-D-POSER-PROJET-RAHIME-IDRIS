<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competence;
use App\Etudiant;
use App\Demande;

class DemandeController extends Controller
{
    public function index()
    {
        //$demandesEtat = Demande::etatDemande(); // probleme ici car si tu signal bah erreur dans la page
        $demandes = Demande::latest()->get();
        if(count($demandes) > 0)
        {
               return view('demandes.index', compact('demandes'));
        }
        else{
            return view('demandes.index')->withMessage('Aucune Offre pour l\'instant... Soyez le premier ! ');;
        }
    }

    public function create()
    {
        $competences = new Competence();
        $competences = Competence::all();

        $demande =  new Demande();
        $demande->etudiant = new Etudiant();
        $etudiant = new Etudiant();
        //$choisi = explode(' , ',$offre->competencesOffre);

        return view('demandes.create', [
            'etudiant' => $etudiant,
            'demande' => $demande,
            'competences' => $competences,

        ]);
    }

    public function store()
    {

        $etudiant = new Etudiant();
        $etudiant = Etudiant::create($this->validator());

        $demande = Demande::create($this->validator() + ['etudiant_id' => $etudiant->id]);

        $demande->competences()->attach(request('competences'));

        $demande->etudiant()->associate($etudiant);
        $demande->save();

        $this->storeCv($etudiant);

        return back()->with('demande', 'Vos informations ont été soumises avec succès');
    }


    public function show(Demande $demande)
    {
        
        return view('demandes.show', [
            'demande' => $demande
        ]);
    }
    

    
    public function edit(Demande $demande)
    {
        $tuteur = new Etudiant();
        $competences = Competence::all();
        return view('demandes.edit', [
            'demande' => $demande,
            'competences' => $competences,
            'tuteur' => $tuteur
        ]);
    }



    public function update(Demande $demande)
    {
        $lademande = request()->validate([
            'titreDemande' => 'required',
            'dureeDemande' => 'required',
            'teleTravailDemande' => 'required'
        ]);

        $letudiant = request()->validate([
        'nomEtudiant' => 'required',
        'presentationEtudiant' => 'required',
        'cvEtudiant' => 'required',
        'regionEtudiant' => 'required',
        'villeEtudiant' => 'required',
        'telEtudiant' => 'required',
        'siteEtudiant' => 'required',
        'emailEtudiant' => 'required'
        ]); 

        $demande->etudiant()->update($letudiant);
        $demande->update($lademande);
        $demande->competences()->sync(request('competences'));

        $etudiant = Etudiant::find($demande->etudiant->id);
        $this->storeCv($etudiant);
        
        return redirect('/demandes/'.$demande->id);   
    }



    public function destroy(Demande $demande)
    {
        $demande->etudiant()->delete();
        $demande->delete();

        return redirect('/demandes/index');
    }



    public function validator()
    {
        return request()->validate([
            'titreDemande' => 'required',
            'dureeDemande' => 'required',
            'teleTravailDemande' => 'required',

            'nomEtudiant' => 'required',
            'presentationEtudiant' => 'required',
            'cvEtudiant' => 'required',
            'regionEtudiant' => 'required',
            'villeEtudiant' => 'required',
            'telEtudiant' => 'required',
            'siteEtudiant' => 'required',
            'emailEtudiant' => 'required'           
            ]);
    }



    private function storeCv(Etudiant $etudiant)
    {
        if(request('cvEtudiant'))
        {
            $etudiant->update([
                'cvEtudiant' => request('cvEtudiant')->store('cv', 'public'),
            ]);
        }
    }
}