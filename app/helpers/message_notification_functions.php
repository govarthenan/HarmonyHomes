<?php

session_start();  // to access session variables

/**
 * Registers or displays flash messages based on the provided parameters.
 *
 * @param string $name    The name of the flash message.
 * @param string $message The content of the flash message.
 * @param string $class   The CSS class to be applied to the flash message element.
 * @return void
 */
function flashMessage(string $name = '', string $message = '', string $class = 'alert alert-success'): void
{

    // if message and name was passed, register message
    // if message wasn't passed but only the name, display message

    if (!empty($name)) {  // name is needed in both cases
        if ((!empty($message)) && empty($_SESSION[$name])) {
            // if message is passed and session variable is empty, set session variable
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } elseif (empty($message) && !empty($_SESSION[$name])) {
            // if message is not passed and session variable is not empty, display message

            // get class
            if (!empty($_SESSION[$name . '_class'])) {
                $class = $_SESSION[$name . '_class'];
                unset($_SESSION[$name . '_class']);
            }

            // echo message html element
            echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';

            // unset session variable
            unset($_SESSION[$name]);
        }
    }
}
