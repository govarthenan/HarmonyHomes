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


/**
 * Sends an SMS message using the NotifyLk API.
 *
 * @param string $phone_number The phone number to send the SMS to.
 * @param string $message The text of the message to send. Maximum 320 characters.
 * @param string $from The name of the sender.
 * @return bool Returns true if the SMS was sent successfully, false otherwise.
 */
function sendSMS($phone_number, $message, $from): bool
{
    $api_instance = new NotifyLk\Api\SmsApi();
    $user_id = "27041"; // string | API User ID - Can be found in your settings page.
    $api_key = "HZCXpHkYTtcrCqNLq5xY"; // string | API Key - Can be found in your settings page.
    $message = $message . PHP_EOL . '- ' . $from . ', HarmonyHomes.'; // string | Text of the message. 320 chars max.
    $to = $phone_number; // string | Number to send the SMS. Better to use 9471XXXXXXX format.
    $sender_id = "NotifyDEMO"; // string | This is the from name recipient will see as the sender of the SMS. Use \\\"NotifyDemo\\\" if you have not ordered your own sender ID yet.
    $contact_fname = ""; // string | Contact First Name - This will be used while saving the phone number in your Notify contacts (optional).
    $contact_lname = ""; // string | Contact Last Name - This will be used while saving the phone number in your Notify contacts (optional).
    $contact_email = ""; // string | Contact Email Address - This will be used while saving the phone number in your Notify contacts (optional).
    $contact_address = ""; // string | Contact Physical Address - This will be used while saving the phone number in your Notify contacts (optional).
    $contact_group = 0; // int | A group ID to associate the saving contact with (optional).
    $type = null; // string | Message type. Provide as unicode to support unicode (optional).

    try {
        $result = $api_instance->sendSMS($user_id, $api_key, $message, $to, $sender_id, $contact_fname, $contact_lname, $contact_email, $contact_address, $contact_group, $type);
    } catch (Throwable $e) {
        flash('err_sms', $e->getMessage(), 'alert alert-danger');
        header('Location: ' . URL_ROOT . '/finances/createNotification');
    }
}
