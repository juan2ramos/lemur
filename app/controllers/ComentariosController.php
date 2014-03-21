<?php


class ComentariosController extends  \BaseController{

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function create(){
        $data['id_user'] = Auth::user()->id;
        $data['id_idea'] = Input::get('id_idea');
        $data['comentario'] = Input::get('comentario');
        Comentarios::create($data);
        return Response::json(['message' => 'Mensaje enviado']);
    }
    public function show(){

        $comentarios = Cometarios::where('id_idea', '=', Input::get('id_idea'))->get();

        $user = $comentario->users();
    }

} 