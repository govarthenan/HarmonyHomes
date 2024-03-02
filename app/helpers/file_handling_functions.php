<?php

/**
 * Get a file as input. Create a unique name for it by hashing it.
 * If the file already exists, append the current timestamp to the file name.
 * Return unique name along with the extension suffix.
 *
 * @param file $file
 */
function uploadFile($file)
{
    // Check if the upload was successful
    if ($file['error'] !== UPLOAD_ERR_OK) {
        // Handle error
        return false;
    }

    // Get the file extension
    $fileInfo = pathinfo($file['name']);
    $extension = isset($fileInfo['extension']) ? $fileInfo['extension'] : '';

    // Read the file content and generate a hash
    $fileContent = file_get_contents($file['tmp_name']);
    $hash = hash('sha256', $fileContent);

    // Create the new file name
    $newFileName = $hash . (!empty($extension) ? ".{$extension}" : '');

    // Define the upload directory
    $uploadDir = APP_ROOT . '/uploads/';

    // Check if file already exists, if so, append the current timestamp
    if (file_exists($uploadDir . $newFileName)) {
        $newFileName = $hash . '_' . time() . (!empty($extension) ? ".{$extension}" : '');
    }

    // Move the file to the upload directory
    if (!move_uploaded_file($file['tmp_name'], $uploadDir . $newFileName)) {
        // Handle error
        return false;
    }

    // Return the file path
    return $uploadDir . $newFileName;
}
