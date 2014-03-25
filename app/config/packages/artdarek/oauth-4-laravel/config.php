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

    )

);