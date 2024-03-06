<?php

// Database parameters
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'harmonyhomes');

// /app/ folder path
define('APP_ROOT', dirname(__DIR__));

// site name
define('SITE_NAME', 'HarmonyHomes');

// URL root
define('URL_ROOT', 'http://localhost/sharmony/');

// import MyAutoLoader class and register static methods for autloading
spl_autoload_register('MyAutoLoader::autoLoadLibraries');  // register static function's name as string
spl_autoload_register('MyAutoLoader::autoLoadControllers');
spl_autoload_register('MyAutoLoader::autoLoadModels');
