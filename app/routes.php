<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['before' => 'csrf'], function()
{
    Route::post('login','LoginController@login');
    Route::post('sube-tu-idea/nueva', 'IdeasController@create');

    Route::post('register','admin_UsersController@store');
    Route::post('search','IdeasController@search');



});
Route::group(['prefix' => 'admin','before' => 'admin'], function()
{
    Route::resource('/', 'CategoriasController');
    Route::resource('users', 'admin_UsersController');
    Route::resource('publicidad', 'PublicidadController');
    Route::resource('categorias', 'CategoriasController');
    Route::get('idea/{id?}', 'ideasController@adminShow');
    Route::get('ideas/{id}', 'ideasController@adminUpdate');
    Route::group(['before' => 'csrf'], function(){
        Route::post('categoria/update','CategoriasController@update');
        Route::post('categoria/store','CategoriasController@store');
        Route::post('users/changeRole','admin_UsersController@changeRole');
        Route::post('ideas/updateAdmin','ideasController@updateAdmin');


    });
    Route::post('comentario/update','ComentariosController@update');
    Route::get('categorias/destroy/{id}','Categorias@destroy');
    Route::get('users/destroy/{id}','admin_UsersController@destroy');
    Route::get('ideas/destroy/{id}','IdeasController@destroy');
    Route::get('categorias/destroy/{id}','CategoriasController@destroy');
    Route::get('excel','admin_UsersController@excel');
    Route::get('users/ingresar/{id}',function($id){

        Auth::login(User::find($id));
        return Redirect::to('/');
    });
});
Route::post('password/new', 'LoginController@password');

Route::group(['before' => 'auth'], function()
{
    Route::controller('sube-tu-idea','IdeasController');
});
Route::get('facebook', 'LoginController@Facebook');
Route::get('twitter', 'LoginController@Twitter');
Route::get('password', function(){return View::make('front.password');});

Route::post('updateUser','admin_UsersController@update');
Route::get('perfil','admin_UsersController@UpdatePerfil');
Route::post('uploadImage','UploadImageController@upload');
Route::post('votar','IdeasController@votar');
Route::get('logout', 'LoginController@logOut');

Route::controller('categorias','CategoriasController');
Route::get('vota-por-una-idea/{id}', 'IdeasController@showAllForCategories');
Route::get('detalle-idea/{id}', 'IdeasController@show');
Route::post('comentario','ComentariosController@create');

#
Route::get('/', function(){
    $p = Publicidad::all();
    $publicidad = $p[0];
    $popUpPublicidad = ($publicidad->estado == 1)?TRUE:FALSE;
    return View::make('front.inicio',compact('publicidad','popUpPublicidad'));
});
Route::get('preguntas', function(){return View::make('front.preguntas');});
Route::get('contacto', function(){return View::make('front.contacto');});
Route::get('servicios', function(){return View::make('front.servicios');});
Route::get('trabaja-en-lemur', function(){return View::make('front.trabaja-en-lemur');});
Route::get('terminos-y-condiciones', function(){return View::make('front.terminos');});

Route::get('registro', function(){return View::make('front.inicio', ['popUp'=>'true','popUpPublicidad'=>'false', 'publicidad' => false]);});







//Route::controller('admin','AdminController');
//Route::get('login', 'AuthController@showLogin');