<?php
/*
 * Local configuration file to provide any overrides to your app.php configuration.
 * Copy and save this file as app_local.php and make changes as required.
 * Note: It is not recommended to commit files with credentials such as app_local.php
 * into source code version control.
 */
return [
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

    /*
     * Security and encryption configuration
     *
     * - salt - A random string used in security hashing methods.
     *   The salt value is also used as the encryption key.
     *   You should treat it as extremely sensitive data.
     */
    'Security' => [
        'salt' => env('SECURITY_SALT', '__SALT__'),
    ],

	/*
     * Configure basic information about the application.
     *
	 * - paths - Configure paths for non class based resources. Supports the
     *   `plugins`, `templates`, `locales` subkeys, which allow the definition of
     *   paths for plugins, view templates and locale files respectively.
     */
	
    'App' => [
        'paths' => [
            'plugins' => [ROOT . DS . 'plugins' . DS],
            'templates' => ['/var/www/html/templates/'],
            'locales' => [RESOURCES . 'locales' . DS],
        ],
    ],
	
    /*
     * Connection information used by the ORM to connect
     * to your application's datastores.
     *
     * See app.php for more configuration options.
     */
    'Datasources' => [
        'default' => [
            'driver' => Mysql::class,
            'host' => 'database',
            /*
             * CakePHP will use the default DB port based on the driver selected
             * MySQL on MAMP uses port 8889, MAMP users will want to uncomment
             * the following line and set the port accordingly
             */
            //'port' => 'non_standard_port_number',

            'username' => 'DB_USER',
            'password' => 'DB_PASSWORD',

            'database' => 'DB_NAME',
            /*
             * If not using the default 'public' schema with the PostgreSQL driver
             * set it here.
             */
            //'schema' => 'myapp',

            /*
             * You can use a DSN string to set the entire configuration
             */
            'url' => env('DATABASE_URL', null),
        ],

        /*
         * The test connection is used during the test suite.
         */
        'test' => [
            'driver' => Mysql::class,
            'host' => 'localhost',
            //'port' => 'non_standard_port_number',
            'username' => 'my_app',
            'password' => 'secret',
            'database' => 'test_myapp',
            //'schema' => 'myapp',
            'url' => env('DATABASE_TEST_URL', 'sqlite://127.0.0.1/tests.sqlite'),
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
    ],
	
	/**
	 * Configure the cache adapters.
	 */
	'Cache' => [
		'default' => [
			'className' => 'Redis',
			'path' => CACHE,
			'password' => false,
			'server' => 'redis',
			'port' => 6379,
		],

		/**
		 * Configure the cache used for general framework caching.
		 * Translation cache files are stored with this configuration.
		 */
		'_cake_core_' => [
			'className' => 'Redis',
			'prefix' => 'myapp_cake_core_',
			'path' => CACHE . 'persistent/',
			'serialize' => true,
			'duration' => '+2 minutes',
			'server' => 'redis',
			'port' => 6379,
			'password' => false,
		],

		/**
		 * Configure the cache for model and datasource caches. This cache
		 * configuration is used to store schema descriptions, and table listings
		 * in connections.
		 */
		'_cake_model_' => [
			'className' => 'Redis',
			'prefix' => 'myapp_cake_model_',
			'path' => CACHE . 'models/',
			'serialize' => true,
			'duration' => '+2 minutes',
			'server' => 'redis',
			'port' => 6379,
			'password' => false,
		],
	],
];
