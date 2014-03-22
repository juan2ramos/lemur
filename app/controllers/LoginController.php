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
    public function facebook() {

        $code = Input::get( 'code' );
        $fb = OAuth::consumer( 'Facebook' );

        if ( !empty( $code ) ) {

            $token = $fb->requestAccessToken( $code );

            $result = json_decode( $fb->request( '/me' ), true );
            $user = User::where('email', '=', $result['email'])->first();
            if(!empty($user)){
                    Auth::login($user);
                return Response::json(['success' => 1]);
            }


        }
        // if not ask for permission first
        else {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
            return Redirect::to( '/');
        }

    }
}