<?php


class ComentariosController extends  \BaseController{

    public function __construct()
    {

    }

    public function create(){
        if (!Auth::user()) {
            return Response::json(['success' => 2]);
        }
        $data['id_user'] = Auth::user()->id;
        $data['id_idea'] = Input::get('id_idea');
        $data['comentario'] = Input::get('comentario');
        $comemtario = new Comentarios;
        if($comemtario->isValid($data)){
            $comemtario->fill($data);
            $comemtario->save();

            Mail::send('emails.comentario', $data, function ($message)  {
                $message->subject('Nuevo Comentario plataforma Lemur Studio');
                $message->to('plataforma@lemurstudio.com.co');
            });
            return Response::json(['success' => 1]);
        }else{
            return Response::json($comemtario->getErrors());
        }

    }
    public function show(){

        $comentarios = Cometarios::where('id_idea', '=', Input::get('id_idea'))->get();

        $user = $comentario->users();
    }
    function update(){
        $comentario = Comentarios::find(Input::get('id'));
        $comentario->fill(Input::all());
        $comentario->save();
        return Response::json(['success' => 'ok']);
    }

} 