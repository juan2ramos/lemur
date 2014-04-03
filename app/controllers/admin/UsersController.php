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
        $users = User::paginate(20);
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
        $data['key'] = $string = str_random(40);
        if ($user->isValid($data)) {
            // Si la data es valida se la asignamos al usuario
            Mail::send('emails.newUser', $data, function ($message){
                $message->subject('Nuevo usuario plataforma lemur');
                $message->to(Input::get('email'));
            });
            $user->fill($data);
            // Guardamos el usuario
            $user->save();
            return Response::json(['success' => 2]);
            $userdata = [
                'email' => Input::get('email'),
                'password' => Input::get('password')
            ];
            Auth::attempt($userdata, Input::get('remember-me', 0));
            $data = ['email' => Input::get('email')];


            return Response::json(['success' => 1]);
            #return Redirect::route('admin.users.show', array($user->id));
        } else {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            //return Redirect::route('admin.users.create')->withInput()->withErrors($user->getErrors());
            return Response::json($user->getErrors());
        }

        //return Input::all();
    }
     function finalizar($key){
         $user = User::where('key','=',$key);

         if (is_null($user)) {
             return 'error 404';
         }
         $user['activo'] = 1;
         Mail::send('emails.confirmarUser', $user, function ($message) use ($user){
             $message->subject('Nuevo usuario plataforma lemur');
             $message->to($user->email);
         });
         $user->fill($data);
         // Guardamos el usuario
         $user->save();
         $userdata = [
             'email' => Input::get('email'),
             'password' => Input::get('password')
         ];
         Auth::attempt($userdata, Input::get('remember-me', 0));

         return View::make('/');
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
        User::destroy($id);
        return Redirect::to('admin/users');
    }
    function excel(){
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'nombre')
            ->setCellValue('B1', 'apellidos')
            ->setCellValue('C1', 'email')
            ->setCellValue('D1', 'Fecha inscripcion')
            ->setCellValue('E1', 'edad')
            ->setCellValue('F1', 'genero')
            ->setCellValue('G1', 'profesion')
            ->setCellValue('H1', 'nivel_estudios')
            ->setCellValue('I1', 'intereses')
            ->setCellValue('J1', 'estado_civil')
            ->setCellValue('K1', 'pais')
            ->setCellValue('L1', 'ciudad')
            ->setCellValue('M1', 'sobre_ti')
            ->setCellValue('N1', 'habilidades')


        ;
        $users = User::all();
        $i = 2;
        foreach($users as $user ){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $user->nombre)
                ->setCellValue('B'.$i, $user['apellidos'])
                ->setCellValue('C'.$i, $user['email'])
                ->setCellValue('D'.$i, $user['Fecha inscripcion'])
                ->setCellValue('E'.$i, $user['edad'])
                ->setCellValue('F'.$i, $user['genero'])
                ->setCellValue('G'.$i, $user['profesion'])
                ->setCellValue('H'.$i, $user['nivel_estudios'])
                ->setCellValue('I'.$i, $user['intereses'])
                ->setCellValue('J'.$i, $user['estado_civil'])
                ->setCellValue('K'.$i, $user['pais'])
                ->setCellValue('L'.$i, $user['ciudad'])
                ->setCellValue('M'.$i, $user['sobre_ti'])
                ->setCellValue('N'.$i, $user['habilidades'])


            ;
            $i++;
        }


        $objPHPExcel->getActiveSheet()->setTitle('Usuarios');
      $objPHPExcel->setActiveSheetIndex(0);



        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="ReporteUsuarios.xls"');
        header('Cache-Control: max-age=0');

        header('Cache-Control: max-age=1');


        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

}