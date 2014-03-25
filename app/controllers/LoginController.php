<?php

class LoginController extends \BaseController
{

    public function login()
    {

        $userdata = [
            'email' => Input::get('email'),
            'password' => Input::get('password')
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

        if ($user = User::where('email','=',Input::get('email'))->first()) {
            $pass = '';
            $a_z = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+*[]{}";
            for ($i = 0; $i < 20; $i++) {
                $int = rand(0, 51);
                $pass .= $a_z[$int];
            }
            $data= ['pass' => $pass];
            $user->fill(['password' => $pass]);
            $user->save();
            Mail::send('emails.password', $data, function ($message){
                $message->subject('Restart password');
                $message->to(Input::get('email'));
            });
            return Response::json(['success' => 1]);
        } else {
            return Response::json(['success' => 0]);

        }
    }

    public function facebook()
    {

        $code = Input::get('code');
        $fb = OAuth::consumer('Facebook');

        if (!empty($code)) {

            $token = $fb->requestAccessToken($code);

            $result = json_decode($fb->request('/me'), true);
            $user = User::where('email', '=', $result['email'])->first();
            if (!empty($user)) {
                Auth::login($user);
                return Response::json(['success' => 1]);
            }
            return Response::json(['success' => 0]);


        } // if not ask for permission first
        else {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
            return Response::json(['success' => 0]);
        }

    }

    function twitter()
    {
        $code = Input::get('oauth_token');
        $oauth_verifier = Input::get('oauth_verifier');

        // get fb service
        $twitterService = OAuth::consumer('Twitter');

        // check if code is valid

        // if code is provided get user data and sign in
        if (!empty($code)) {

            $token = $twitterService->getStorage()->retrieveAccessToken('Twitter');

            // This was a callback request from google, get the token
            $twitterService->requestAccessToken($code, $oauth_verifier, $token->getRequestTokenSecret());

            // Send a request with it
            $result = json_decode($twitterService->request('account/verify_credentials.json'));

            // try to login

            // get user by twitter_id
            $user = User::where(['twitter_id' => $result->id])->first();

            // check if user exists
            if ($user) {
                // login user
                Auth::login($user);

                // build message with some of the resultant data
                $message = 'Your unique twitter user id is: ' . $result->id . ' and your name is ' . $result->name;

                // redirect to user profile
                return Redirect::route('home.index')
                    ->with('flash_success', $message);

            } else {
                // FIRST TIME TWITTER LOGIN

                // create new user
                $user = User::createNew([
                    'firstname' => $result->name,
                    'lastname' => null,
                    'username' => $result->screen_name,
                    'twitter_id' => $result->id,
                ]);
                $user->save();

                // login user
                Auth::login($user);

                // build message with some of the resultant data
                $message_success = 'Your unique twitter user id is: ' . $result->id . ' and your name is ' . $result->name;
                $message_notice = 'Account Created.';

                // redirect to game page
                return Redirect::route('home.index')
                    ->with('flash_success', $message_success)
                    ->with('flash_notice', $message_notice);

            }
        } // if not ask for permission first
        else {

            // extra request needed for oauth1 to request a request token :-)
            $token = $twitterService->requestRequestToken();
            $url = $twitterService->getAuthorizationUri(['oauth_token' => $token->getRequestToken()]);

            // return to twitter login url
            return Response::make()->header('Location', (string)$url);

        }

    }
}