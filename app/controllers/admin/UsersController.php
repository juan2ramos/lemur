<?php

/**
 * Class Admin_UsersController
 */
class Admin_UsersController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::paginate(5);
        //dd($users);
        return View::make('admin/users/list')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $form_data = array('route' => array('admin.users.store'), 'method' => 'POST');
        $action = 'Crear';
        $user = new User;
        return View::make('admin/users/form', compact('user', 'form_data', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $user = new User;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        if ($user->isValid($data)) {
            // Si la data es valida se la asignamos al usuario
            $user->fill($data);
            // Guardamos el usuario
            $user->save();
            $userdata = [
                'email' => Input::get('email'),
                'password' => Input::get('password')
            ];
            Auth::attempt($userdata, Input::get('remember-me', 0));
            return Response::json(['success' => 1]);
            #return Redirect::route('admin.users.show', array($user->id));
        } else {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            //return Redirect::route('admin.users.create')->withInput()->withErrors($user->getErrors());
            return Response::json($user->getErrors());
        }

        //return Input::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return 'error 404';
        }
        $comboBox = [
            1 => 'administrador',
            2 => 'Visitante',
        ];
        $success = false;
        return View::make('admin.users.form', compact('user', 'success', 'comboBox'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return 'error 404';
        }
        $form_data = array('route' => array('admin.users.update', $user->id), 'method' => 'PATCH');
        $action = 'Editar';

        return View::make('front.perfil', compact('user', 'form_data', 'action'));


    }

    public function updatePerfil()
    {
        $user = User::find(Auth::user()->id);
        return View::make('front.perfil', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update()
    {
        // Creamos un nuevo objeto para nuestro nuevo usuario
        $user = User::find(Auth::user()->id);

        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null($user)) {
            App::abort(404);
        }

        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        if ($data['images'] != 'null') {
            $imagen = explode(';', $data['images']);
            $data['imagen'] = $imagen[1];
        }

        // Revisamos si la data es válido
        if ($user->isValid($data)) {
            // Si la data es valida se la asignamos al usuario
            $user->fill($data);
            // Guardamos el usuario
            $user->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Response::json(['success' => 1]);
        } else {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Response::json($user->getErrors());
        }
    }
    function changeRole(){
        $user = User::find(Input::get('id'));
        $user->fill(Input::all());
        $user->save();
        $comboBox = [
            1 => 'administrador',
            2 => 'Visitante',
        ];
        $success = false;
        return View::make('admin.users.form', compact('user', 'success', 'comboBox'));

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}