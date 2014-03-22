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
    Route::post('password/nueva', 'LoginController@password');
    Route::post('register','admin_UsersController@store');
});

Route::group(['before' => 'auth'], function()
{
    Route::controller('sube-tu-idea','IdeasController');
});
Route::get('facebook', 'LoginController@facebook');
Route::get('twitter', 'LoginController@twitter');
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
Route::get('/', function(){return View::make('front.inicio');});
Route::get('preguntas', function(){return View::make('front.preguntas');});
Route::get('contacto', function(){return View::make('front.contacto');});
Route::get('servicios', function(){return View::make('front.servicios');});
Route::get('trabaja-en-lemur', function(){return View::make('front.trabaja-en-lemur');});
Route::get('terminos-y-condiciones', function(){return View::make('front.terminos');});

Route::get('registro', function(){return View::make('front.inicio', ['popUp'=>'true']);});

Route::resource('admin/categorias', 'CategoriasController');


Route::get("init", function()
{


    if(Auth::attempt($loginData, true))
    {

        return Redirect::to("home");

    }
    return Redirect::to("jajda");

});

Route::get('p', function()
{
    $users = User::find(2);
    return Hash::check('123456', $hashedPassword);;	return View::make('front.inicio', array('hidden' => 'hidden'));
});


Route::group(array('before' => 'session' ),function(){
    //Route::controller('/admin','AdminController');
    Route::get('/admins/{n?}', function($n = null)
    {
        return 'jaja slash ese cesar '.$n;
    });
});

Route::get('add',["before" => "roles:1,homde", function()
{

    return "Como mínimo tu role debe ser administrador, tu eres " . getRole(Auth::user()->role_id);

}]);

Route::resource('admin/users', 'admin_UsersController');
//Route::controller('admin','AdminController');
//Route::get('login', 'AuthController@showLogin');