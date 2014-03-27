<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    'storage' => 'Session',

    /**
     * Consumers
     */
    'consumers' => array(

        /**
         * Facebook
         */
        'Facebook' => array(
            'client_id' => '706814422713940',
            'client_secret' => '63c665eb7f5a117fede882be74fd1cdf',
            'scope'         => array('email','read_friendlists','user_online_presence'),
        ),
        'Twitter' => array(
            'client_id'         => '3gU8b8iVmpvKU4q3rNwH0A',
            'client_secret'     => 'FQDqeMj2bFs9n31GOXmerMXh6cfpnjTJUE2xWNS310',
        ),
        'Google' => array(
            'client_id'     => '798327401166-gkbconqk72a7t73prfp8rd6svpdss9q4.apps.googleusercontent.com',
            'client_secret' => 't_W5VXwwU7Lsf0Q9F5z-M4jS',
            'scope'         => array('userinfo_email', 'userinfo_profile'),
        ),

    )

);