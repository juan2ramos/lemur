<?php

class mails extends \BaseController{

    function contacto(){
        $data = Input::all();
        $send = false;

        $rules = [
            'email' => 'required|email',
            'nombre' => 'required',
            'mensaje' => 'required',
        ];
        $mesages = [
            'email.required' => 'El mail es requerido',
            'email.email' => 'Email invalido',
            'nombre.required' => 'Nombre es requerido',
            'apellidos.required' => 'El apellido es requerido',
            'mensaje.required' => 'El mensaje es requerido',
        ];
        $validator = Validator::make($data, $rules, $mesages);

        if ($validator->passes()) {
            Mail::send('emails.mensajeContacto', $data, function ($message)  {
                $message->subject('Contacto Lemur Studio plataforma');
                $message->to('plataforma@lemurstudio.com.co');
            });
            $send = true;
            return View::make('front.contacto',compact('send'));
        }

        $errors = $validator->errors();
        return View::make('front.contacto',compact('errors','send'));
    }
    function trabajo(){
        $send = false;
        $data = Input::all();
        $rules = [
            'email' => 'required|email',
            'nombre' => 'required'
        ];
        $mesages = [
            'email.required' => 'El mail es requerido',
            'email.email' => 'Email invalido',
            'nombre.required' => 'Nombre es requerido',

        ];

        $validator = Validator::make($data, $rules, $mesages);

        if ($validator->passes()) {
            Mail::send('emails.mensajeTrabaja', $data, function ($message)  {
                $message->subject('Trabaja Lemur Studio plataforma');
                $message->to('plataforma@lemurstudio.com.co');
            });
            $send = true;
            return View::make('front.trabaja-en-lemur',compact('success','send'));
        }

        $errors = $validator->errors();
        return View::make('front.trabaja-en-lemur',compact('errors','send'));
    }
}