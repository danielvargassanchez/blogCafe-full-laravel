<?php
return array(
    // set your paypal credential
    'client_id' => 'AVeSPLDylAr2YSlVwmCQv4M8XS7NVb8BIOjwGgb35foNFNqhxPZ9WR6lhLYwGOp6v8AI58dSUdm-1nzP',
    'secret' => 'ECS2FVwt5cZU3LdHst6BQokGWZ0hjCmQG46PbzU27vHHX3I92M3iaxq0bjiYXa_85k708MR79TlnJEjO',

    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);