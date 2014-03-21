<?php


class Comentarios extends Eloquent {

	protected $table = 'comentarios';

    protected $fillable = ['id_user','id_idea','comentario'];
    public function users()
    {
        return $this->belongsTo('User', 'id_users');
    }

}