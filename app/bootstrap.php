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



/**
 * Custom error handler function that converts PHP errors into exceptions.
 *
 * @param int $errno The level of the error raised.
 * @param string $errstr The error message.
 * @param string $errfile The filename that the error was raised in.
 * @param int $errline The line number the error was raised at.
 * @throws ErrorException
 */
function exception_error_handler($errno, $errstr, $errfile, $errline)
{
    throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
}

// Set the custom error handler
set_error_handler("exception_error_handler");
