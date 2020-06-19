<?php

namespace App\Http\Controllers;

use App\Competence;
use App\Demande;
use App\Etudiant;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function index()
    {
        //$demandesEtat = Demande::etatDemande(); // probleme ici car si tu signal bah erreur dans la page
        $demandes = Demande::latest()->etatDemande();
        if (count($demandes) > 0) {
            return view('demandes.index', compact('demandes'));
        } else {
            return view('demandes.index')->withMessage('Aucune demande pour l\'instant... Soyez le premier ! ');
        }
    }

    public function create()
    {
        $competences = new Competence();
        $competences = Competence::all();

        $demande = new Demande();
        $demande->etudiant = new Etudiant();
        $etudiant = new Etudiant();
        //$choisi = explode(' , ',$offre->competencesOffre);

        return view('demandes.create', [
            'etudiant' => $etudiant,
            'demande' => $demande,
            'competences' => $competences,

        ]);
    }

    public function store(Request $request)
    {

        $etudiant = new Etudiant();
        $etudiant = Etudiant::create($this->validator());

        $demande = Demande::create($this->validator() + ['etudiant_id' => $etudiant->id]);

        if ($request->hasfile('cvEtudiant')) {
            $fileimage = $request->file('cvEtudiant');
            // nom du fichier date + -curriculum + id unqiue + extentions final
            $filename = time() . '-' . 'curriculum' . '.' . $fileimage->getClientOriginalExtension();
            $fileimage->move(public_path('uploads/cv/'), $filename); // déplace dans le fichier public(la où est le css)

            $etudiant->cvEtudiant = $filename; // enregistre le fichier avec le nom choisi en haut

        }

        $demande->competences()->attach(request('competences'));

        $demande->etudiant()->associate($etudiant);
        $etudiant->save(); // obliger sinnon il reconnais pas le chemin dans la basse de donnée

        $demande->save();

        return redirect(url("demande", [$demande->id]))->with('message', 'Votre demande a bien été ajouter');
    }

    public function show(Demande $demande)
    {

        return view('demandes.show', [
            'demande' => $demande,
        ]);
    }

    public function edit(Demande $demande)
    {
        $tuteur = new Etudiant();
        $competences = Competence::all();
        return view('demandes.edit', [
            'demande' => $demande,
            'competences' => $competences,
            'tuteur' => $tuteur,
        ]);
    }

    public function update(Demande $demande, Request $request)
    {
        $this->validate($request, array(
            'titreDemande' => 'required|min:2|max:100',
            'dureeDemande' => 'required|min:3|max:50',
            'teleTravailDemande' => 'required',
            'competences' => 'required_without_all',
            'nomEtudiant' => 'required|min:5|',
            'presentationEtudiant' => 'required|min:2|max:5000',
            'regionEtudiant' => 'required',
            'villeEtudiant' => 'required',
            'telEtudiant' => 'required|min:5|max:100',
            'siteEtudiant' => 'required|min:5|max:100',
            'emailEtudiant' => 'required|email',
            'cvEtudiant' => 'mimes:doc,pdf,docx',
        ));
        $etudiant = Etudiant::find($demande->etudiant->id);

        if ($request->hasFile('cvEtudiant')) {

            $fileimage = $request->file('cvEtudiant');
            // nom du fichier date + -curriculum + id unqiue + extentions final
            $filename = time() . '-' . 'curriculum' . '.' . $fileimage->getClientOriginalExtension();

            $fileimage->move(public_path('uploads/cv/'), $filename);

            $oldFilename = $etudiant->cvEtudiant; // on enregistre ancien nom pour pouvoir le supprimer après

            $etudiant->cvEtudiant = $filename;

            unlink('uploads/cv/' . $oldFilename);

        } else {
            return 'aucun fichier';
        }
        $etudiant->save();
        $demande->save();

        $demande->competences()->sync(request('competences'));

        return redirect(url('/demande', [$demande->id]))->with('message', '"' . $demande->titreDemande . '" a bien été mise à jour');
    }

    public function destroy(Demande $demande)
    {
        unlink('uploads/cv/' . $demande->etudiant->cvEtudiant);
        $demande->etudiant()->delete();
        $demande->delete();
        return redirect(url('demandes/index'))->with('message', 'La demande "' . $demande->titreDemande . '" a bien été supprimer');
    }

    public function validator()
    {
        return request()->validate([
            'titreDemande' => 'required|min:2|max:100',
            'dureeDemande' => 'required|min:3|max:50',
            'teleTravailDemande' => 'required',
            'competences' => 'required_without_all',
            'cvEtudiant' => 'required|mimes:doc,docx,odt,pdf',
            'nomEtudiant' => 'required|min:5|',
            'presentationEtudiant' => 'required|min:2|max:5000',
            'regionEtudiant' => 'required',
            'villeEtudiant' => 'required',
            'telEtudiant' => 'required|min:5|max:100',
            'siteEtudiant' => 'required|min:5|max:100',
            'emailEtudiant' => 'required|email',
        ]);
    }
}
