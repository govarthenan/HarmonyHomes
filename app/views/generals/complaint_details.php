<?php
include(APP_ROOT . '/views/inc/general_side_nav.php');
$complaint = $data['complaint'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/general_style.css' ?>" />
</head>

<body>
    <div class="main-content">
        <div class="view-complaint-landing">
            <div class="complaint-column-new">

                <div class="new-complaint-container">
                    <div class="column">
                        <div class="nested-grid">
                            <div class="form-column-view">
                                <h4>Complaint type:</h4>
                            </div>
                            <div class="form-column-view-subject">
                                <h4>Subject:</h4>
                            </div>
                            <div class="form-column-view-description">
                                <h4>Description:</h4>
                            </div>

                            <div class="form-attachment-column-view">
                                <h4>Attachments:</h4>
                            </div>
                            <div class="form-attachment-column-status">
                                <h4>Status:</h4>
                            </div>

                        </div>
                    </div>
                    <div class="column">
                        <div class="nested-grid-complaint">
                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <p style="padding:1%"><?php echo $complaint->topic; ?></p>
                                </div>
                            </div>
                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <p style="padding:1%"><?php echo $complaint->subject; ?></p>
                                </div>
                            </div>

                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <p style="padding:1%; text-align:block;"><?php echo $complaint->description; ?></p>
                                </div>
                            </div>

                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <?php

                                    $blob = $complaint->attachments;

                                    if (empty($blob)) {
                                        echo '<p style="padding:1%; text-align:block;">No Attachments</p>';
                                    } else {
                                        $base64 = base64_encode($blob);

                                        // Determine the content type
                                        $finfo = new finfo(FILEINFO_MIME_TYPE);
                                        $type = $finfo->buffer($blob); // Get the MIME type of the blob data

                                        // Generate the src attribute for the img tag
                                        $imgSrc = 'data:' . $type . ';base64,' . $base64;

                                        // Output the img tag
                                        echo '<img width="65rem" src="' . $imgSrc . '" alt="Complaint Attachment">';
                                    }
                                    ?>
                                </div>
                            </div>
                            <form method="post" action="<?php echo URL_ROOT . '/generals/complaintStatusUpdate/' . $complaint->complaint_id ?>">
                                <div class="form-column-view">
                                    <select id="items" name="new_status">
                                        <option value="Submitted" <?php echo ($data['complaint']->status == 'Submitted') ? 'selected' : ''; ?>>Submitted</option>
                                        <option value="In Progress" <?php echo ($data['complaint']->status == 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
                                        <option value="On Hold" <?php echo ($data['complaint']->status == 'On Hold') ? 'selected' : ''; ?>>On Hold</option>
                                        <option value="Resolved" <?php echo ($data['complaint']->status == 'Resolved') ? 'selected' : ''; ?>>Resolved</option>
                                    </select>
                                </div>
                                <div class="update-button">
                                    <button type="submit" class="update-btn">Update Status</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>