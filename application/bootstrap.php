<?php

defined('SYSPATH') or die('No direct script access.');

//Some Const definition
define('APP_NAME', 'Athênâ');
define('APP_CODENAME', '');
define('APP_RELEASE_NAME', '');
define('APP_VERSION', '0.1.4');

// -- Environment setup --------------------------------------------------------
// Load the core Kohana class
require SYSPATH . 'classes/Kohana/Core' . EXT;

if (is_file(APPPATH . 'classes/Kohana' . EXT)) {
    // Application extends the core
    require APPPATH . 'classes/Kohana' . EXT;
} else {
    // Load empty core extension
    require SYSPATH . 'classes/Kohana' . EXT;
}

/**
 * Set the default time zone.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/timezones
 */
date_default_timezone_set('Europe/Paris');

/**
 * Set the default locale.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/function.setlocale
 */
setlocale(LC_ALL, 'fr_FR.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @link http://kohanaframework.org/guide/using.autoloading
 * @link http://www.php.net/manual/function.spl-autoload-register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Optionally, you can enable a compatibility auto-loader for use with
 * older modules that have not been updated for PSR-0.
 *
 * It is recommended to not enable this unless absolutely necessary.
 */
//spl_autoload_register(array('Kohana', 'auto_load_lowercase'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @link http://www.php.net/manual/function.spl-autoload-call
 * @link http://www.php.net/manual/var.configuration#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

/**
 * Set the mb_substitute_character to "none"
 *
 * @link http://www.php.net/manual/function.mb-substitute-character.php
 */
mb_substitute_character('none');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
I18n::lang('fr');

if (isset($_SERVER['SERVER_PROTOCOL'])) {
    // Replace the default protocol.
    HTTP::$protocol = $_SERVER['SERVER_PROTOCOL'];
}

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV'])) {
    Kohana::$environment = constant('Kohana::' . strtoupper($_SERVER['KOHANA_ENV']));
}

Kohana::$environment = Kohana::DEVELOPMENT;

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - integer  cache_life  lifetime, in seconds, of items cached              60
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 * - boolean  expose      set the X-Powered-By header                        FALSE
 */
Kohana::init(array(
    'base_url' => '/',
    'index_file' => FALSE,
    'errors' => TRUE,
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH . 'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);


/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
    'auth' => MODPATH . 'auth', // Basic authentication
    // 'cache'      => MODPATH.'cache',      // Caching with multiple backends
    // 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
    'database' => MODPATH . 'database', // Database access
    // 'image'      => MODPATH.'image',      // Image manipulation
    // 'minion'     => MODPATH.'minion',     // CLI Tasks
    'orm' => MODPATH . 'orm', // Object Relationship Mapping
    // 'unittest'   => MODPATH.'unittest',   // Unit testing
    'userguide' => MODPATH . 'userguide', // User guide and API documentation
    'notice' => MODPATH . 'notice', //Notice for notification
    'pagination' => MODPATH . 'pagination', //Pagination
    'mysqli' => MODPATH . 'mysqli', //MySQLi support
    'logreader' => MODPATH . 'logreader', //Basic log reader
    'email' => MODPATH . 'email', //SwiftMailer Support
    'parsedown' => MODPATH . 'parsedown', //Parsedown Support
    'developerbar' => MODPATH . 'developerbar', //DeveloperBar
));

//How to force developerBar to appear (never use it in production)
//Developerbar::factory()->enabled(TRUE);

set_exception_handler(array('Kohana_Exception', 'handler'));

/**
 * Cookie Salt
 * @see  http://kohanaframework.org/3.3/guide/kohana/cookies
 * 
 * If you have not defined a cookie salt in your Cookie class then
 * uncomment the line below and define a preferrably long salt.
 */

/*
 * This is suppose to be a cookie salt
 */
Cookie::$salt = 'You want me to serve the man who murdered men, who butchered women, who crippled child?!';

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
//Route::set('default', 'athena/dashboard(/<action>(/<id>))')
//        ->defaults(array(
//            'directory' => 'athena',
//            'controller' => 'dashboard',
//        ));
//

//Dashboard route
Route::set('dashboard', 'dashboard(/<action>(/<id>))')
        ->defaults(array(
            'directory' => 'athena',
            'controller' => 'dashboard',
        ));
//login route
Route::set('login', 'login(/<action>(/<id>))')
        ->defaults(array(
            'directory' => 'athena',
            'controller' => 'account',
            'action' => 'login'
        ));
//signup route
Route::set('signup', 'signup(/<action>(/<id>))')
        ->defaults(array(
            'directory' => 'athena',
            'controller' => 'account',
            'action' => 'signup'
        ));
//account route
Route::set('account', 'account(/<action>(/<id>))')
        ->defaults(array(
            'directory' => 'athena',
            'controller' => 'account',
        ));
//Users administration route
Route::set('users', 'users(/<action>(/<id>))')
        ->defaults(array(
            'directory' => 'athena',
            'controller' => 'users',
        ));
//Mentions administration route
Route::set('mentions', 'mentions(/<action>(/<id>))')
        ->defaults(array(
            'directory' => 'athena',
            'controller' => 'mentions',
        ));
//Specialites administration route
Route::set('specialites', 'specialites(/<action>(/<id>))')
        ->defaults(array(
            'directory' => 'athena',
            'controller' => 'specialites',
        ));
//Parcours administration route
Route::set('parcours', 'parcours(/<action>(/<id>))')
        ->defaults(array(
            'directory' => 'athena',
            'controller' => 'parcours',
        ));
//Periodes administration route
Route::set('periodes', 'periodes(/<action>(/<id>))')
        ->defaults(array(
            'directory' => 'athena',
            'controller' => 'periodes',
        ));
//Modules administration route
Route::set('modules', 'modules(/<action>(/<id>))')
        ->defaults(array(
            'directory' => 'athena',
            'controller' => 'modules',
        ));
//Groupes administration route
Route::set('groupes', 'groupes(/<action>(/<id>))')
        ->defaults(array(
            'directory' => 'athena',
            'controller' => 'groupes',
        ));
//Default route redirect to login action
Route::set('default', '(<controller>(/<action>(/<id>)))')
        ->defaults(array(
            'directory' => 'athena',
            'controller' => 'account',
            'action' => 'login',
        ));


//
