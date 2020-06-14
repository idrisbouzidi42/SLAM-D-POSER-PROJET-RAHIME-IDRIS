<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Offre;
use App\Demande;
use App\Competence;
use App\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    public $middleware;
    
    public function __construct()
    {
        $this->middleware('auth')->except('search');
    }

    public function indexAdmin()
    {
        $offres = Offre::etat(); //Pour compter
        $offres = Offre::latest()->paginate(5);
        $users = User::all();
        $demandes = Demande::latest()->paginate(10);

        $nbUsers = count($users);
        $total = count($offres);
        $affiche = count($offres);
        $signaled = $total - $affiche;
        return view('admin.index', [
            'offres' => $offres,
            'total' => $total,
            'signaled' => $signaled,
            'nbUsers' => $nbUsers,
            'attente' => 0,
            'demandes' => $demandes
        ]);
    }

    public function profile()
    {
        return view('admin.profil');
    }

    public function editProfil()
    {
        return view('admin.edit-profil');
    }

    public function UpdateEmail(User $user)
    {
        $email = request()->validate([
            'email' => 'required'
            ]);     
        $user->update(['email' => $email['email']]);
        return redirect('/admin/profile/'.$user->id);
    }

    public function resetPassForm(User $user)
    {
        $user = Auth::user();
        return view('auth.passwords.reset', [
            'user' => $user
        ]);
    }


    public function updatePass(User $user)
    {   
        $pass = request()->validate([
            'password' => 'required_with:password_confirmation|same:password_confirmation|min:6',
            'password_confirmation"' => 'min:6'
            ]);
        $user->update(['password' => Hash::make($pass['password'])]);
        return redirect(url("/admin/profile/{$user->id}"))
        ->with('message', ' Le mot de passe de "' . $user->name . '" a bien été mise à jour');
    }

    public function competences()
    {
        $competences = Competence::paginate(15);
        return view('admin.competences.index', [
            'competences' => $competences
        ]);
    }

    public function createCompetence()
    {
        $newComp = new Competence();
        $newComp->nom = request('nom');
        $newComp->save();

        return redirect(url('/admin/competences'))
        ->with('message', ' La compétence"' . $newComp->nom . '" a bien été  ajouter ^^');
    }


    public function editCompetence()
    {
        $competences = Competence::paginate(15);
        return view('admin.competences.edit', [
            'competences' => $competences
        ]);
    }

    public function updateCompetence(Competence $comp)
    {
        $data = request()->validate([
            'nom' => 'required'
        ]);
        $comp->update($data);
       return redirect(url('/admin/competences'))
       ->with('message', ' La compétence"' . $comp->nom . '" a bien été mise à jour ^^');
    }

    public function destroyCompetence(Competence $comp)
    {
        $comp->delete();
        return redirect(url('/admin/competences'))
        ->with('message', ' La compétence"' . $comp->nom . '" a bien été supprimer !');
    }


    //Offres
    public function signalOffre(Offre $offre)
    {
        $offre->etat = "Signalé";
        $offre->save();
        return redirect(url('/admin'))
        ->with('message', ' L\'offre "' . $offre->nomOffre . '" a été signaler !');
    }

    public function unsignalOffre(Offre $offre)
    {
        $offre->etat = "Valide";
        $offre->save();
        return redirect(url('/admin'))
        ->with('message', ' L\'offre "' . $offre->nomOffre . '" a bien été re-validé ^^');
    }
    
    public function destroyOffre(Offre $offre)
    {
        $offre->entreprise->delete();
        $offre->delete();
        return redirect(url('/admin'))
        ->with('message', 'L\'offre"' . $offre->nomOffre . '" a bien été supprimer !');
    }

    

    //Demandes
    public function signalDemande(Demande $demande)
    {
        $demande->etatDemande = 'Signalé';
        $demande->save();
        return redirect(url('/admin'))
        ->with('message', ' La demande "' . $demande->titreDemande . '" a été signaler !');
    }

    public function unsignalDemande(Demande $demande)
    {
        $demande->etatDemande = 'Valide';
        $demande->save();
        return redirect(url('/admin'))
        ->with('message', ' La demande "' . $demande->titreDemande . '" a bien été re-validé ^^');
    }


    public function destroyDemande(Demande $demande)
    {
        $demande->etudiant()->delete();
        $demande->delete();
        return redirect(url('/admin'))
        ->with('message', 'La demande "' . $demande->titreDemande . '" a bien été supprimer !');
    }

}