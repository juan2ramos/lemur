<?php
class LoginController extends \BaseController
{

    public function login()
    {

        $userdata = [
            'email' => Input::get('email'),
            'password'=> Input::get('password')
        ];
        if(Auth::attempt($userdata, Input::get('remember-me', 0)))
        {
            return Response::json(['success' => 1]);
        }

        return Response::json(['success' => 0]);

    }
    public function logOut()
    {
        Auth::logout();
        return Redirect::to('/')
            ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }
}