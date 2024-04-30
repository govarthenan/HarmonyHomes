<?php

session_start();  // to access session variables


/**
 * Displays or schedules a flash message for display.
 *
 * If both the name and message parameters are provided, the function schedules the message for display.
 * If only the name parameter is provided and the name is set inside the flash array in $_SESSION, the function displays the message.
 * By default, the message will be displayed in a div with the class 'flash_message'.
 * If a class string is provided, it will be used instead of the default class.
 *
 * @param string $name The name of the flash message.
 * @param string $message The content of the flash message.
 * @param string $class The class of the flash message (default: 'flash_message').
 * @return void
 */
function flash(string $name = '', string $message = '', string $class = 'alert'): void
{
    if ((!empty($name)) && (!empty($message))) {
        // schedule message for display
        $_SESSION['flash'][$name] = ['message' => $message, 'class' => $class];
    } elseif (!empty($name) && empty($message) && isset($_SESSION['flash'][$name])) {
        // display message
        echo '<div class="' . $_SESSION['flash'][$name]['class']
            . '" id="alert" name="alert-message"><span class="closebtn" onclick="closeAlert()">&times;</span>'
            . $_SESSION['flash'][$name]['message'] . '</div>';

        unset($_SESSION['flash'][$name]);
    }
}
