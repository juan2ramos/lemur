<?php

use Carbon\Carbon;

class Categorias extends Eloquent
{
    protected $perPage = 2;
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

}