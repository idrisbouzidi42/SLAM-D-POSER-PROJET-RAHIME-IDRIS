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
    return view('acceuil');
});

//Admin
Route::get('/admin', 'Admin\AdminController@indexAdmin')->name('admin');
Route::get('/admin/profile/{user}', 'Admin\AdminController@profile')->name('profile');
//Changer l'email
Route::get('/admin/profile/{user}/edit', 'Admin\AdminController@editProfil')->name('editProfil');
Route::patch('/admin/profile/{user}', 'Admin\AdminController@UpdateEmail')->name('UpdateEmail');
Route::get('/admin/password/reset/{user}', 'Admin\AdminController@resetPassForm')->name('PassResetForm');
Route::patch('/admin/password/reset/{user}', 'Admin\AdminController@updatePass')->name('UpdatePass');


Route::get('/admin/competences', 'Admin\AdminController@competences')->name('competences');
Route::post('/admin/AjouterCompetence','Admin\AdminController@createCompetence')->name('createCompetence');
Route::get('/admin/competences/edit','Admin\AdminController@editCompetence')->name('editCompetence');
Route::patch('/admin/competences/{comp}','Admin\AdminController@updateCompetence')->name('updateCompetence');
Route::delete('/admin/competences/{comp}', 'Admin\AdminController@destroyCompetence')->name('destroyCompetence');

Route::get('/admin/signal/offres/{offre}','Admin\AdminController@signalOffre')->name('signalOffre');
Route::get('/admin/unsignal/offres/{offre}','Admin\AdminController@unsignalOffre')->name('unsignalOffre');
Route::delete('/admin/offres/{offre}', 'Admin\AdminController@destroyOffre')->name('destroyOffre');

Route::get('/admin/signal/demandes/{demande}','Admin\AdminController@signalDemande')->name('signalDemande');
Route::get('/admin/unsignal/demandes/{demande}','Admin\AdminController@unsignalDemande')->name('unsignalDemande');
Route::delete('/admin/demandes/{demande}', 'Admin\AdminController@destroyDemande')->name('destroyDemande');





//Search
Route::post('/search/offres', 'SearchController@searchOffre')->name('search.offres');
Route::post('/search/demandes', 'SearchController@searchDemande')->name('search.demandes');
Route::post('/search/all', 'SearchController@searchAll')->name('search.all');
Route::get('/search/{query}', 'SearchController@searchCompetence')->name('search.competences');


//Contact
Route::get('/contact', 'ContactController@create')->name('create.contact');
Route::post('/contact', 'ContactController@store')->name('store.contact');

//Offre
Route::get('/offres/index', 'OffreController@index')->name('index.offres');
Route::get('/offres/create', 'OffreController@create')->name('create.offres');
Route::post('/offres/create', 'OffreController@store')->name('store.offres');
Route::get('/offres/{offre}', 'OffreController@show')->name('show.offres');
Route::get('/offres/{offre}/edit', 'OffreController@edit')->name('edit.offres');
Route::patch('/offres/{offre}', 'OffreController@update')->name('update.offres');
Route::delete('/offres/{offre}', 'OffreController@destroy')->name('destroy.offres');



//Demande
Route::get('/demandes/index','DemandeController@index')->name('index.demandes');
Route::get('/demandes/create','DemandeController@create')->name('create.demandes');
Route::post('/demandes/create','DemandeController@store')->name('store.demandes');
Route::get('/demandes/{demande}','DemandeController@show')->name('show.demandes');
Route::get('/demandes/{demande}/edit','DemandeController@edit')->name('edit.demandes');
Route::patch('/demandes/{demande}','DemandeController@update')->name('update.demandes');
Route::delete('/demandes/{demande}','DemandeController@destroy')->name('destroy.demandes');

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
