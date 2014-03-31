<?php

class mails extends \BaseController{

    function contacto(){
        $data = Input::all();


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
            $mensaje = "Mensaje enviado correctamente, gracias!!";
            Mail::send('emails.mensajeContacto', $data, function ($message)  {
                $message->subject('Contacto lemur plataforma');
                $message->to('juan2ramos@gmail.com');
            });
            return View::make('front.mensaje',compact('mensaje'));
        }

        $errors = $validator->errors();
        return View::make('front.contacto',compact('errors'));
    }
    function trabajo(){
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
                $message->subject('Trabaja lemur plataforma');
                $message->to('juan2ramos@gmail.com');
            });
            $mensaje = "Mensaje enviado correctamente, gracias!!";
            return View::make('front.mensaje',compact('mensaje'));
        }

        $errors = $validator->errors();
        return View::make('front.trabaja-en-lemur',compact('errors'));
    }
}