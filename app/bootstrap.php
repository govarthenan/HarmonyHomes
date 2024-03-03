<?php

/**
 * Require core files and other configs.
 */

// class that contains autoload methods
require_once '../app/config/MyAutoLoader.php';  // class containing all autoload functions

// load config
require_once '../app/config/config.php';

// load helpers
require_once APP_ROOT . '/helpers/file_handling_functions.php';
require_once APP_ROOT . '/helpers/message_notification_functions.php';

// load libraries - now handled by autoload
// require_once APP_ROOT . '/libraries/Core.php';
// require_once APP_ROOT . '/libraries/Controller.php';
// require_once APP_ROOT . '/libraries/Database.php';
