<?php

namespace App\Http\Controllers;

use App\User;
use App\Offre;
use App\Tuteur;
use App\Competence;
use App\Entreprise;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Route;


class OffreController extends Controller
{

    public function search()
    {
        $query = request('demande');
        if($query != '')
        {
            $offres = Offre::where('nomOffre', 'LIKE', '%'. $query. '%')
                                ->orWhere('dureeOffre', 'LIKE', '%'. $query. '%')
                                ->orWhere('descriptionOffre', 'LIKE', '%' .$query. '%')
                                ->orWhere('teleTravailOffre', 'LIKE', '%' .$query. '%')
                                ->get();

            $entreprises = Entreprise::where('nomEntreprise', 'LIKE', '%'. $query. '%')
                                ->orWhere('typeEntreprise', 'LIKE', '%'. $query. '%')
                                ->orWhere('telEntreprise', 'LIKE', '%' .$query. '%')
                                ->orWhere('adresseWebEntreprise', 'LIKE', '%' .$query. '%')
                                ->orWhere('nomTuteurEntreprise', 'LIKE', '%' .$query. '%')
                                ->orWhere('rueEntreprise', 'LIKE', '%' .$query. '%')
                                ->orWhere('codePostalEntreprise', 'LIKE', '%' .$query. '%')
                                ->orWhere('villeEntreprise', 'LIKE', '%' .$query. '%')
                                ->get();
   
            $competences = Competence::where('nom', 'LIKE', '%'.$query.'%')->get();
    
            if(count($offres) > 0 || count($competences) > 0 || count($entreprises) > 0 )
            {
                return view('showSearch', [
                    'offres' => $offres,
                    'competences' => $competences,
                    'entreprises' => $entreprises
                ])->withQuery($query);
            }
        }
        return view('showSearch')->withMessage('No results for your query')->withQuery($query);
    }


    public function index()
    {
        $offres = \App\Offre::etat();
        if(count($offres) > 0)
        {
            return view('offres.index', [
                'offres' => $offres,
            ]);
        }
        return view('offres.index')->withMessage('Aucune offre pour le moment');
    }



    public function create()
    {
        $competences = new Competence();
        $competences = Competence::all();

        $offre =  new Offre();
        $offre->entreprise = new Entreprise();
        $entreprise = new Entreprise();
        //$choisi = explode(' , ',$offre->competencesOffre);

        return view('offres.create', [
            'entreprise' => $entreprise,
            'offre' => $offre,
            'competences' => $competences
        ]);
    }




    public function store()
    {
        
        $entreprise = new Entreprise();       
        $entreprise= Entreprise::create($this->validator());

        //Model offre
        /*
        $competences = implode(' , ',request('competencesOffre'));
        'competencesOffre' => $competences,*/

        $offre = Offre::create($this->validator() + [            
            'entreprise_id' => $entreprise->id
        ]);

        $offre->competences()->attach(request('competences'));


        //Association
        $offre->entreprise()->associate($entreprise);
        $offre->save();
        

        return back()->with('offre', 'Votre offre à été soumise avec succès');
    }



    public function show(Offre $offre)
    {

        return view('offres.show', [
            'offre' => $offre,

        ]);
        
    }



    public function edit(Offre $offre)
    {
        
    //$choisi = explode(' , ',$offre->competencesOffre);
    //Retransformation du string en tableau pour pouvoir faire un foreach et check
    //dd($comp,$choisi);

        $competences = Competence::all();
        return view('offres.edit', [
            'offre' => $offre,
            'competences' => $competences,
        ]);
    }



    public function update(Offre $offre)
    {        
        $entreprises = request()->validate([
            'nomEntreprise' => 'required',
            'typeEntreprise' => 'required',
            'telEntreprise' => 'required',
            'adresseWebEntreprise' => 'required',
            'nomTuteurEntreprise' => 'required',
            'rueEntreprise' =>'required',
            'mailEntreprise' => 'required|email'
        ]);

        $offres = request()->validate([
            'nomOffre' => 'required',
            'dureeOffre' => 'required',
            'descriptionOffre' => 'required',
            'teleTravailOffre' => 'required'
        ]);
        /* $competences = implode(' , ',request('competencesOffre')); //Transforme l'array des competences en string*/
        $offre->entreprise()->update($entreprises);
        $offre->update($offres);
        $offre->competences()->sync(request('competences'));
        return redirect('/offres/'.$offre->id);
    }



    public function destroy(Offre $offre)
    {
        $offre->entreprise->delete();
        $offre->delete();
        return redirect('/offres/index');               
    }



    public function validator()
    {
        return request()->validate([
            'nomEntreprise' => 'required',
            'typeEntreprise' => 'required',
            'telEntreprise' => 'required',
            'adresseWebEntreprise' => 'required',
            'nomTuteurEntreprise' => 'required',
            'rueEntreprise' =>'required',
            'mailEntreprise' => 'required|email',

            'nomOffre' => 'required',
            'dureeOffre' => 'required',
            'descriptionOffre' => 'required',
            'teleTravailOffre' => 'required']);
    }

    public static function remplir()
    {
        Competence::create(['nom' => 'HTML']);
        Competence::create(['nom' => 'CSS']);
        Competence::create(['nom' => 'JavaScript']);
        Competence::create(['nom' => 'Ajax']);
        Competence::create(['nom' => 'NodeJS']);
        Competence::create(['nom' => 'jQuery']);
        Competence::create(['nom' => 'Accessibilité']);
        Competence::create(['nom' => 'Référencement']);
        Competence::create(['nom' => 'Graphisme']);
        Competence::create(['nom' => 'Photoshop']);
        Competence::create(['nom' => 'Illustrator']);
        Competence::create(['nom' => 'PHP']);
        Competence::create(['nom' => 'MySQL']);
        Competence::create(['nom' => 'CMS']);
        Competence::create(['nom' => 'WordPress']);
        Competence::create(['nom' => '.Net']);
        Competence::create(['nom' => 'C#']);
        Competence::create(['nom' => 'Python']);
        Competence::create(['nom' => 'Ruby']);
        Competence::create(['nom' => 'Java']);
        Competence::create(['nom' => 'XML']);
        Competence::create(['nom' => 'Linux']);
    
    }

}














