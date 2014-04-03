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
                $user = User::where('email', '=', $user_profile['email'])->first();
                if (is_null($user)) {
                    $data = [
                        'email' => $user_profile['email'],
                        'nombre' => $user_profile['first_name'],
                        'apellidos' => $user_profile['last_name'],
                        'habilitado' => 1
                    ];
                    $user = new User;
                    Mail::send('emails.newUser', $data, function ($message) use ($user_profile) {
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

    public function Twitter()
    {
        $path = explode('/', dirname(__FILE__));
        array_pop($path);
        $path = implode('/', $path);
        require($path . '/config/packages/twitter/EpiCurl.php');
        require($path . '/config/packages/twitter/EpiOAuth.php');
        require($path . '/config/packages/twitter/EpiTwitter.php');

        $twitterObj = new EpiTwitter('3gU8b8iVmpvKU4q3rNwH0A', 'FQDqeMj2bFs9n31GOXmerMXh6cfpnjTJUE2xWNS310');
        $authenticateUrl = $twitterObj->getAuthenticateUrl();

        return Redirect::to($authenticateUrl);
    }

    function twitterLogin()
    {
        $path = explode('/', dirname(__FILE__));
        array_pop($path);
        $path = implode('/', $path);
        require($path . '/config/packages/twitter/EpiCurl.php');
        require($path . '/config/packages/twitter/EpiOAuth.php');
        require($path . '/config/packages/twitter/EpiTwitter.php');


        if (isset($_GET['oauth_token'])) {

            $twitterObj = new EpiTwitter('3gU8b8iVmpvKU4q3rNwH0A', 'FQDqeMj2bFs9n31GOXmerMXh6cfpnjTJUE2xWNS310');

            $twitterObj->setToken($_GET['oauth_token']);

            $token = $twitterObj->getAccessToken();

            $twitterObj->setToken($token->oauth_token, $token->oauth_token_secret);

            $userdata = $twitterObj->get_accountVerify_credentials();

            $user = User::where('screen_name_twitter', '=', $userdata->screen_name)->first();
            if (is_null($user)) {
                $data = [
                    'email' => $userdata->screen_name,
                    'nombre' => $userdata->screen_name,
                    'screen_name_twitter' => $userdata->screen_name,
                    'habilitado' => 1

                ];
                $user = new User;
                Mail::send('emails.newUser', $data, function ($message) use ($userdata) {
                    $message->subject('Nuevo usuario plataforma lemur');
                    $message->to('juan2ramos@gmail.com');
                });
                $user->fill($data);
                $user->save();
            }

            Auth::login($user);

            return Redirect::to('/');

        }

    }


    public function Google()
    {
        if (!Auth::check()) {
            $user = User::where('email', '=', Input::get('email'))->first();
            if (is_null($user)) {
                $data = [
                    'email' => Input::get('email'),
                    'nombre' => Input::get('username'),
                    'habilitado' => 1
                ];
                $user = new User;
                Mail::send('emails.newUser', $data, function ($message) use ($userdata) {
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