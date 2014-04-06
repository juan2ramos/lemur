<?php


class Menu extends Eloquent
{

    protected $table = 'menu';
    protected $fillable = ['url', 'texto', 'id_html','activo'];




}