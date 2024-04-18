<?php
include(APP_ROOT . '/views/inc/resident_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/style.css'; ?>" />
</head>

<body onload="randerDate()">
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

                            <div class="attachment-column-view">
                                <h4>Attachments:</h4>
                            </div>

                        </div>
                    </div>
                    <div class="column">
                        <div class="nested-grid">
                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <p style="padding:1%"><?php echo $data['complaint']->topic; ?></p>
                                </div>
                            </div>
                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <p style="padding:1%"><?php echo $data['complaint']->subject; ?></p>
                                </div>
                            </div>

                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <p style="padding:1%; text-align:block;"><?php echo $data['complaint']->description; ?></p>
                                </div>
                            </div>

                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <img src="file.svg" class="complaint-view-file">
                                </div>
                            </div>

                            <div class="submit-column">
                                <a href="<?php echo URL_ROOT . '/residents/complaintEdit/' . $data['complaint']->complaint_id; ?>"><button class="edit-btn">Edit</button></a>
                                <a href="<?php echo URL_ROOT . '/residents/complaintDelete/' . $data['complaint']->complaint_id; ?>"><button class="delete-btn">Delete</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>