<?php

namespace App\Http\Controllers;

use App\User;
use App\Offre;
use App\Demande;
use App\Etudiant;
use App\Competence;
use App\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchOffre()
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
                                ->get();
   
            $competences = Competence::where('nom', 'LIKE', '%'.$query.'%')->get();

            //$testcompt = DB::table('competence_offre')->where('competence_name', 'LIKE', '%'.$query.'%')->get();
            //dd($competences,$testcompt);


            if(count($offres) > 0 || count($competences) > 0 || count($entreprises) > 0 )
            {
                return view('offres.searchShow', [
                    'offres' => $offres,
                    'competences' => $competences,
                    'entreprises' => $entreprises
                ])->withQuery($query);
            }
        }
        return view('offres.searchShow')->withMessage('Aucun résultat trouvé dans les offres...')->withQuery($query);
    }




    public function searchDemande()
    {
        $query = request('demande');

        $demandes = Demande::where('titreDemande', 'LIKE', '%'.$query.'%')
                            ->orWhere('dureeDemande', 'LIKE', '%'.$query.'%')
                            ->orWhere('teleTravailDemande', 'LIKE', '%'.$query.'%')
                            ->get();

        $etudiants = Etudiant::where('nomEtudiant', 'LIKE', '%'.$query.'%')
                            ->orWhere('presentationEtudiant', 'LIKE', '%'.$query.'%')
                            ->orWhere('cvEtudiant', 'LIKE', '%'.$query.'%')
                            ->orWhere('regionEtudiant', 'LIKE', '%'.$query.'%')
                            ->orWhere('villeEtudiant', 'LIKE', '%'.$query.'%')
                            ->orWhere('telEtudiant', 'LIKE', '%'.$query.'%')
                            ->orWhere('siteEtudiant', 'LIKE', '%'.$query.'%')
                            ->orWhere('emailEtudiant', 'LIKE', '%'.$query.'%')
                            ->get();

        $competences = Competence::where('nom', 'LIKE', '%'.$query.'%')->get();

        if(count($demandes) > 0 || count($competences) > 0 || count($etudiants) > 0 )
        {
            return view('demandes.searchShow', [
                'demandes' => $demandes,
                'etudiants' => $etudiants,
                'competences' => $competences
            ])->withQuery($query);
        }
        return view('demandes.searchShow')->withMessage('Aucun résultat trouvé dans les demandes...')->withQuery($query);
    }


    public function searchAll()
    {
        $query = request('demande');

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
                                ->get();

        $competences = Competence::where('nom', 'LIKE', '%'.$query.'%')->get();


        $demandes = Demande::where('titreDemande', 'LIKE', '%'.$query.'%')
                                ->orWhere('dureeDemande', 'LIKE', '%'.$query.'%')
                                ->orWhere('teleTravailDemande', 'LIKE', '%'.$query.'%')
                                ->get();

        $etudiants = Etudiant::where('nomEtudiant', 'LIKE', '%'.$query.'%')
                                ->orWhere('presentationEtudiant', 'LIKE', '%'.$query.'%')
                                ->orWhere('cvEtudiant', 'LIKE', '%'.$query.'%')
                                ->orWhere('regionEtudiant', 'LIKE', '%'.$query.'%')
                                ->orWhere('villeEtudiant', 'LIKE', '%'.$query.'%')
                                ->orWhere('telEtudiant', 'LIKE', '%'.$query.'%')
                                ->orWhere('siteEtudiant', 'LIKE', '%'.$query.'%')
                                ->orWhere('emailEtudiant', 'LIKE', '%'.$query.'%')
                                ->get();

        $users = User::where('name','LIKE', '%'.$query.'%')
                        ->orWhere('email','LIKE','%'.$query.'%')
                        ->get();

        
        if(count($offres) > 0 || count($entreprises) > 0 || count($competences) > 0 || count($demandes) > 0 || count($etudiants) > 0 || count($users) > 0)
        {
            return view('admin.searchShow', [
                'offres' => $offres,
                'demandes' => $demandes,
                'competences' => $competences,
                'etudiants' => $etudiants,
                'entreprises' => $entreprises,
                'users' => $users
            ])->withQuery($query);
        }
        return view('admin.searchShow')->withMessage('Aucun résultat trouvé du tout...')->withQuery($query);
    }


    
    public function searchCompetence($query)
    {
        $competences = Competence::where('nom','LIKE', '%'.$query.'%')->get();
        if(count($competences) >  0)
        {
            return view('admin.competences.searchShow', [
                'competences' => $competences
            ])->withQuery($query);
        }
        return view('admin.competences.searhShow')->withMessage('Aucune compétences trouvé')->withQuery($query);
    }
}