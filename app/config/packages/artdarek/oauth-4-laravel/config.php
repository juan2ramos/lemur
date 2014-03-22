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
            'scope' => array(

                'email'


            ),
        ),

    )

);