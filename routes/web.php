<?php

use App\User;
use App\Offre;
use App\Competence;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');



Route::get('/', function () {
    return view('accueil');
});

//Admin
Route::get('/admin', 'Admin\AdminController@indexAdmin')->name('admin');
Route::get('/admin/profile/{user}', 'Admin\AdminController@profile');
//Changer l'email
Route::get('/admin/profile/{user}/edit', 'Admin\AdminController@editProfil');
Route::patch('/admin/profile/{user}', 'Admin\AdminController@UpdateEmail');
Route::get('/admin/password/reset/{user}', 'Admin\AdminController@resetPassForm')->name('PassResetForm');
Route::patch('/admin/password/reset/{user}', 'Admin\AdminController@updatePass')->name('UpdatePass');

Route::get('/admin/competences', 'Admin\AdminController@competences')->name('competences');
Route::post('/admin/AjouterCompetence','Admin\AdminController@createCompetence')->name('competences');
Route::get('/admin/competences/edit','Admin\AdminController@editCompetence')->name('competences');
Route::patch('/admin/competences/{comp}','Admin\AdminController@updateCompetence')->name('competences');
Route::delete('/admin/competences/{comp}', 'Admin\AdminController@destroyCompetence');

Route::get('/admin/signal/offres/{offre}','Admin\AdminController@signalOffre');
Route::get('/admin/unsignal/offres/{offre}','Admin\AdminController@unsignalOffre');
Route::delete('/admin/offres/{offre}', 'Admin\AdminController@destroyOffre');

Route::get('/admin/signal/demandes/{demande}','Admin\AdminController@signalDemande');
Route::get('/admin/unsignal/demandes/{demande}','Admin\AdminController@unsignalDemande');
Route::delete('/admin/demandes/{demande}', 'Admin\AdminController@destroyDemande');

//Search
Route::post('/search/offres', 'SearchController@searchOffre');
Route::post('/search/demandes', 'SearchController@searchDemande');
Route::post('/search/all', 'SearchController@searchAll');
Route::get('/search/{query}', 'SearchController@searchCompetence');

//Contact
Route::get('/contact', 'ContactController@create');
Route::post('/contact', 'ContactController@store');

//Offre
Route::get('/offres/index', 'OffreController@index');
Route::get('poster-une-offre.html', 'OffreController@create')->name('offres.create');
Route::post('poster-une-offre.html', 'OffreController@store')->name('offres.create');
Route::get('/offres/{offre}', 'OffreController@show')->name('offres.show');
Route::get('/editer-offre/{offre}', 'OffreController@edit')->name('offres.edit');
Route::patch('/offres/{offre}', 'OffreController@update')->name('offres.update');
Route::delete('/offres/{offre}', 'OffreController@destroy');



//Demande
Route::get('/demandes/index','DemandeController@index');
Route::get('poster-une-demande.html','DemandeController@create')->name('demandes.create');;
Route::post('poster-une-demande.html','DemandeController@store')->name('demandes.create');
Route::get('/demande/{demande}','DemandeController@show')->name('demandes.show');
Route::get('/editer-demande/{demande}','DemandeController@edit')->name('demandes.edit');
Route::patch('/demandes/{demande}','DemandeController@update')->name('demandes.update');
Route::delete('/demandes/{demande}','DemandeController@destroy');

/*
$pdo = new PDO('mysql:host=localhost;charset=utf8;dbname=depotstage','root','toor');
$req = $pdo->prepare('select * from competence_demande');
$req->execute();
$datas = $req->fetch();
foreach($datas as $data)
{
    dd($datas);
}
*/