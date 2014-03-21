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

        $categoria = Categorias::paginate(5);

        return View::make('admin.categorias.list')->with('categorias',$categoria);

    }
    public function edit($id)
    {

        $categoria = Categorias::find($id);

        return View::make('admin.categorias.form')->with('categorias',$categoria);

    }

}