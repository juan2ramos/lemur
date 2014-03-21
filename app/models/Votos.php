<?php


class Votos extends Eloquent{
    protected $table = 'votos';
    protected $fillable = ['id_usuario','id_idea'];

    public function isValid($input){
            $rules = ['votos' => 'unique:votos,id_usuario,id_idea'];

        $validator = Validator::make($input,$rules );

        if ($validator->passes()) {
            return true;
        }
        return false;
    }
} 