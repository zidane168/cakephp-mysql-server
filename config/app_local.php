<?php
/*
 * Local configuration file to provide any overrides to your app.php configuration.
 * Copy and save this file as app_local.php and make changes as required.
 * Note: It is not recommended to commit files with credentials such as app_local.php
 * into source code version control.
 */
return [

    'env' => 'local',
    /*
     * Debug Level:
     *
     * Production Mode:
     * false: No error messages, errors, or warnings shown.
     *
     * Development Mode:
     * true: Errors and warnings shown.
     */
    'debug' => filter_var(env('DEBUG', true), FILTER_VALIDATE_BOOLEAN),
    // 'debug' => false,   // hide debug toolkit

    'App' => [
        'namespace' => 'App',
        'encoding' => env('APP_ENCODING', 'UTF-8'),
        // 'defaultLocale' => env('APP_DEFAULT_LOCALE', 'en_US'),
        'defaultLocale' => env('APP_DEFAULT_LOCALE', 'en_US'),
    ],

    //'backend_url' => 'http://localhost/cakephp425_adminlte',

    'admin' => [
        'pepper' => 'vi.lh@vtl-vtl.com',    //'vilh-1984',
    ],

    'member' => [
        'pepper' => 'ecpark-2022',
    ],

    'area_code' => [
        '+84', 
        '+851',
        '+852',
    ],

    'slug' => '-',

    'push' => [
        'server_key' => '',
        'sender_id'	 =>	'',
        'server_feedback_url' => '',
    ],
    
    'site' => array(
        'name'          => 'ECPark',
        'keywords'      => '',
        'description'   => '',
        'version'       => 'v1.0', // . date('Y-m-d H:i:s') if get date('y-m-d') server will get the current defaultLocale from CAKEPHP vendor (so the time will be UTC)
    ),

    /*
     * Security and encryption configuration
     *
     * - salt - A random string used in security hashing methods.
     *   The salt value is also used as the encryption key.
     *   You should treat it as extremely sensitive data.
     */
    'Security' => [
        'salt' => env('SECURITY_SALT', 'f40635b5022a633ccee383412d9cc7d92278cfd690aa0436bfc258601094f4f8'),
    ],

    /*
     * Connection information used by the ORM to connect
     * to your application's datastores.
     *
     * See app.php for more configuration options.
     */
    'Datasources' => [
        'default' => [           

            // sql server
            //'host' => 'DESKTOP-14DA0RI', 
            'host' => 'localhost', 
            'database' => 'vmc',    
            'username' => 'sa',
            'password' => 'Aa123456',

            
            // 'host' => 'localhost', 
            // 'database' => 'ec_parking',    
            // 'username' => 'root',
            // 'password' => '123456',
            /*
             * CakePHP will use the default DB port based on the driver selected
             * MySQL on MAMP uses port 8889, MAMP users will want to uncomment
             * the following line and set the port accordingly
             */
          
            
            /*
             * If not using the default 'public' schema with the PostgreSQL driver
             * set it here.
             */
            //'schema' => 'myapp',

            /*
             * You can use a DSN string to set the entire configuration
             */
            // 'url' => env('DATABASE_URL', null),
        ],

        /*
         * The test connection is used during the test suite.
         */
        'test' => [
            'host' => 'localhost',
            //'port' => 'non_standard_port_number',
            'username' => 'my_app',
            'password' => 'secret',
            'database' => 'test_myapp',
            //'schema' => 'myapp',
            'url' => env('DATABASE_TEST_URL', null),
        ],
    ],

    /*
     * Email configuration.
     *
     * Host and credential configuration in case you are using SmtpTransport
     *
     * See app.php for more configuration options.
     */
    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
        'gmail' => [
            'host' => 'smtp.gmail.com',
            'port' => 587,
            'username' => '',
            'password' => '',
            'tls' => true,
            'className' => 'Smtp',
        ]
    ],

    'web' => array(
        'default_language' => 'zh_HK',
        'limit' => 100,             // limit display in index home page, max = 100
        'available_languages' => array( 'zh_HK' ), // array( 'zh_HK', 'en_US' ),
        'log_action' => array('add', 'edit', 'delete'),
     
        'super_role' => 'role-admin',
    ),

];
