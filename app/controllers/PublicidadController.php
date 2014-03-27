<?php


class PublicidadController extends \BaseController
{


    public function index()
    {
        $publicidad = Publicidad::all();
        $publicidad = $publicidad[0];
        $comboBox = [
            0 => 'No Activado',
            1 => 'Activado',
        ];
        return View::make('admin/publicidad/form', compact('publicidad', 'comboBox'));

    }

    function store()
    {
        $comboBox = [
            0 => 'No Activado',
            1 => 'Activado',
        ];
        $publicidad = Publicidad::find(Input::get('id'));

        $input = Input::except('imagen');
        if (Input::hasFile('imagen')) {

            $file = Input::file('imagen');
            $destinationPath = 'images';
            $filename = str_random(10).$file->getClientOriginalName();
            Input::file('imagen')->move($destinationPath, $filename);

            $input['imagen'] = $filename;
        }
        $publicidad->fill($input);
        $publicidad->save();


        return View::make('admin/publicidad/form', compact('publicidad', 'comboBox'));

    }

}