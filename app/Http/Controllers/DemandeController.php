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
        if (count($demandes) > 0) {
            return view('demandes.index', compact('demandes'));
        } else {
            return view('demandes.index')->withMessage('Aucune demande pour l\'instant... Soyez le premier ! ');;
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

        return redirect(url("demande", [$demande->id]))->with('message', 'Votre demande a bien été ajouter');
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
        $letudiant = request()->validate([
            'nomEtudiant' => 'required|min:5|',
            'presentationEtudiant' => 'required|min:100|max:5000',
            'cvEtudiant' => 'required|mimes:doc,docx,odt,pdf',
            'regionEtudiant' => 'required',
            'villeEtudiant' => 'required',
            'telEtudiant' => 'required|min:5|max:100',
            'siteEtudiant' => 'required|min:5|max:100',
            'emailEtudiant' => 'required|email'
        ]);

        $demande->etudiant()->update($letudiant);
        $demande->update($this->validator());
        $demande->competences()->sync(request('competences'));

        $etudiant = Etudiant::find($demande->etudiant->id);
        $this->storeCv($etudiant);

        return redirect(url('demandes', [$demande->id]))->with('message', '"' . $demande->titreDemande .  '" a bien été mise à jour');
    }



    public function destroy(Demande $demande)
    {
        $demande->etudiant()->delete();
        $demande->delete();
        return redirect(url('demandes/index'))->with('message',  'La demande "' . $demande->titreDemande .  '" a bien été supprimer');
    }



    public function validator()
    {
        return request()->validate([
            'titreDemande' => 'required|min:2|max:100',
            'dureeDemande' => 'required|min:3|max:50',
            'teleTravailDemande' => 'required',
            'competences' => 'required_without_all',

            'nomEtudiant' => 'required|min:5|',
            'presentationEtudiant' => 'required|min:100|max:5000',
            'cvEtudiant' => 'required|mimes:doc,docx,odt,pdf',
            'regionEtudiant' => 'required',
            'villeEtudiant' => 'required',
            'telEtudiant' => 'required|min:5|max:100',
            'siteEtudiant' => 'required|min:5|max:100',
            'emailEtudiant' => 'required|email'
        ]);
    }



    private function storeCv(Etudiant $etudiant)
    {
        if (request('cvEtudiant')) {
            $etudiant->update([
                'cvEtudiant' => request('cvEtudiant')->store('cv', 'public'),
            ]);
        }
    }
}
