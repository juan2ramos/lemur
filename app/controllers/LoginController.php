<?php

class LoginController extends \BaseController
{

    public function login()
    {

        $userdata = [
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'activo' => 1
        ];
        if (Auth::attempt($userdata, Input::get('remember-me', 0))) {
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

    public function password()
    {

        if ($user = User::where('email', '=', Input::get('email'))->first()) {
            $pass = '';
            $a_z = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+*[]{}";
            for ($i = 0; $i < 20; $i++) {
                $int = rand(0, 51);
                $pass .= $a_z[$int];
            }
            $data = ['pass' => $pass];
            $user->fill(['password' => $pass]);
            $user->save();
            Mail::send('emails.password', $data, function ($message) {
                $message->subject('Restart password');
                $message->to(Input::get('email'));
            });
            return Response::json(['success' => 1]);


        } else {
            return Response::json(['success' => 0]);

        }
    }

    public function Facebook()
    {
        $path = explode('/', dirname(__FILE__));
        array_pop($path);
        $path = implode('/', $path);
        require($path . '/config/packages/face/src/facebook.php');
        $facebook = new Facebook([
            'appId' => '706814422713940',
            'secret' => '63c665eb7f5a117fede882be74fd1cdf',
        ]);
        $user = $facebook->getUser();
        if ($user) {
            try {
                $user_profile = $facebook->api('/me');
                $email = (empty($user_profile['email']))?'':$user_profile['email'] ;
                $user = User::where('email', '=', $email)->first();
                if (is_null($user)) {
                    $url = 'http://graph.facebook.com/'. $user_profile ['username'].'/picture?type=large';
                    $prefijo = sha1(time());
                    $name = $prefijo.$user_profile ['username'].'.jpg';
                    $img =  "upload/".$name;

                    file_put_contents($img, file_get_contents($url));


                    $data = [
                        'email'      => $user_profile['email'],
                        'nombre'     => $user_profile['first_name'],
                        'apellidos'  => $user_profile['last_name'],
                        'activo' => 1,
                        'imagen'     => $name
                    ];
                    $user = new User;
                    Mail::send('emails.newUserSocial', $data, function ($message) use ($user_profile) {
                        $message->subject('Nuevo usuario plataforma lemur');
                        $message->to($user_profile['email']);
                    });
                    $user->fill($data);
                    // Guardamos el usuario
                    $user->save();
                }

                Auth::login($user);

                return Redirect::to('/');
            } catch (FacebookApiException $e) {
                error_log($e);
                $user = null;
            }
        }
        if ($user) {
            $logoutUrl = $facebook->getLogoutUrl(array('next' => 'https://www.myapp.com/after_logout'));
        } else {
            $statusUrl = $facebook->getLoginStatusUrl();
            $loginUrl = $facebook->getLoginUrl();
            return Redirect::to($loginUrl);
        }

        dd($user_profile["email"]);
        return ' <img src="https://graph.facebook.com/' . $user . '/picture">';

    }



    public function Google()
    {
        if (!Auth::check()) {
            $user = User::where('email', '=', Input::get('email'))->first();
            if (is_null($user)) {
                $url = Input::get('image');
                $prefijo = sha1(time());
                $name = $prefijo.Input::get('username').'.jpg';
                $img =  "upload/".$name;

                file_put_contents($img, file_get_contents($url));
                $data = [
                    'email' => Input::get('email'),
                    'nombre' => Input::get('username'),
                    'habilitado' => 1,
                    'imagen'     => $name
                ];
                $user = new User;
                Mail::send('emails.newUserSocial', $data, function ($message) use ($data) {
                    $message->subject('Nuevo usuario plataforma lemur');
                    $message->to($data['email']);
                });
                $user->fill($data);
                $user->save();
            }

            Auth::login($user);

        };
        return Response::json(['success' => 1]);
    }
}