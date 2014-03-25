<?php

use Carbon\Carbon;

class Categorias extends Eloquent
{
    protected $perPage = 2;
    protected $fillable =
        [
            'nombre',
            'estado',
            'fecha_inicio',
            'fecha_cierre'
        ];
    private $errors;
    protected $table = 'categorias';

    public function ideas()
    {
        return $this->hasMany('Ideas', 'id_categorias');

    }

    public function images()
    {
        return $this->hasManyThrough('Ideas', 'Imagenes', 'id_categorias', 'id_idea');
    }

    public function active()
    {
        $categorias = Categorias::all();
        foreach ($categorias as $key => $value) {
            $categorias[$key]->estado =
                ($value->estado == 1 && Carbon::today()->between(
                        Carbon::parse($value->fecha_inicio),
                        Carbon::parse($value->fecha_cierre)
                    )) ? 1 : 0;

        }
        return $categorias;

    }

    static function  open($id)
    {
        $categoria = Categorias::find($id);

        return
            (!empty($categoria) && $categoria->estado == 1 && Carbon::today()->between(
                    Carbon::parse($categoria->fecha_inicio),
                    Carbon::parse($categoria->fecha_cierre)
                )) ? 1 : 0;
    }

   function isValid($data){
       $rules = [
           'nombre'       => 'required',
           'estado'       => 'required',
           'fecha_inicio' => 'required|date|before:fecha_cierre',
           'fecha_cierre' => 'required|date|after:fecha_inicio',
       ];
       $message = [
           'nombre.required'       => 'Nombre requerido',
           'estado.required'       => 'Estado requerido',
           'fecha_inicio.required' => 'Fecha requerido',
           'fecha_cierre.required' => 'Fecha requerido',
           'fecha_inicio.before'   => 'fecha incorrecta',
           'fecha_cierre.after'    => 'fecha incorrecta',

       ];
       $validator = Validator::make($data, $rules, $message);

       if ($validator->passes()) {
           return true;
       }
       $this->errors = $validator->errors();

       return false;
   }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }


}