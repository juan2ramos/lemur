<?php


/**
 * User: juan2ramos
 * Date: 11/03/14
 * Time: 9:03
 */
class CategoriasController extends \BaseController
{


    /**
     * @return View
     */
    public function getIndex()
    {

        $categoria = new Categorias();
        $categorias = $categoria->active();
        $hidden = 'hidden';


        return View::make('front.categorias', compact('categorias', 'hidden'));

    }

    public function index()
    {

        $categoria = Categorias::paginate(20);

        return View::make('admin.categorias.list')->with('categorias', $categoria);

    }

    public function edit($id)
    {

        $categoria = Categorias::find($id);

        return View::make('admin.categorias.form')->with('categorias', $categoria);

    }

    function show($id)
    {
        $categoria = Categorias::find($id);
        $comboBox = [
            0 => 'Inactiva',
            1 => 'Activa',
        ];
        $success = false;
        return View::make('admin.categorias.form', compact('categoria', 'comboBox', 'success'));
    }

    function update()
    {


        $categoria = Categorias::find(Input::get('id'));
        $comboBox = [
            0 => 'Inactiva',
            1 => 'Activa',
        ];
        if ($categoria->isValid(Input::all())) {
            $input = Input::except('imagen');
            if (Input::hasFile('imagen'))
            {

                $file = Input::file('imagen');
                $destinationPath = 'images';
                $filename = $file->getClientOriginalName();
                Input::file('imagen')->move($destinationPath, $filename);

                $input['imagen'] = $filename;
            }
            $categoria->fill($input);
            $categoria->save();
        } else {
            $errors = $categoria->getErrors();
            $success = false;
            return View::make('admin.categorias.form', compact('categoria', 'comboBox', 'errors', 'success'));
        }
        $success = true;

        return View::make('admin.categorias.form', compact('categoria', 'comboBox', 'success'));
    }

    function create()
    {
        $comboBox = [
            0 => 'Inactiva',
            1 => 'Activa',
        ];
        $success = false;
        return View::make('admin.categorias.new', compact('categoria', 'comboBox', 'success'));
    }

    function store()
    {
        Input::flash();
        $comboBox = [
            0 => 'Inactiva',
            1 => 'Activa',
        ];
        $categoria = new Categorias;
        $input = Input::except('imagen');
        if ($categoria->isValid($input)) {
            if (Input::hasFile('imagen'))
            {

                $file = Input::file('imagen');
                $destinationPath = 'images';
                $filename = $file->getClientOriginalName();
                Input::file('imagen')->move($destinationPath, $filename);

                $input['imagen'] = $filename;
            }
            $categoria->fill($input);
            $categoria->save();
        } else {
            $errors = $categoria->getErrors();
            $success = false;
            return View::make('admin.categorias.new', compact('categoria', 'comboBox', 'errors', 'success'));
        }
        $success = true;
        return View::make('admin.categorias.new', compact('categoria', 'comboBox', 'success'));
    }

}