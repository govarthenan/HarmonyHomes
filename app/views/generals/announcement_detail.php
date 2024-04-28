<?php
include(APP_ROOT . '/views/inc/general_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/general_style.css'; ?>" />
</head>

<body onload="randerDate()">
    <div class="main-content">
        <div class="view-complaint-landing">
            <div class="complaint-column-new">
                <div class="new-complaint-container">
                    <div class="column">
                        <div class="nested-grid">
                            <div class="form-column-view">
                                <h4>Announcement ID :</h4>
                            </div>
                            <div class="form-column-view-subject">
                                <h4>Announcement Date :</h4>
                            </div>
                            <div class="form-column-view-description">
                                <h4>Audience :</h4>
                            </div>
                            <div class="form-column-view-subject">
                                <h4>Announcement Title :</h4>
                            </div>
                            <div class="form-column-view-description">
                                <h4>Message:</h4>
                            </div>

                        </div>
                    </div>
                    <div class="column">
                        <div class="nested-grid">
                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <p style="padding:1%"><?php echo $data['announcement']->announcement_id; ?></p>
                                </div>
                            </div>
                            <div class="form-column-view">
                                <div class="submitted-answers-subject">
                                    <p style="padding:1%"><?php echo $data['announcement']->created_date; ?></p>
                                </div>
                            </div>

                            <div class="form-column-view">
                                <div class="submitted-answers-subject">
                                    <p style="padding:1%"><?php echo $data['announcement']->receiver; ?></p>
                                </div>
                            </div>

                            <div class="form-column-view">
                                <div class="submitted-answers-subject">
                                    <p style="padding:1%"><?php echo $data['announcement']->title; ?></p>
                                </div>
                            </div>

                            <div class="form-column-view">
                                <div class="submitted-answers-description">
                                    <p style="padding:1%; text-align:block;"><?php echo $data['announcement']->message; ?></p>
                                </div>
                            </div>



                            <div class="submit-column">
                                <a href="<?php echo URL_ROOT . '/generals/announcementEdit/' . $data['announcement']->announcement_id; ?>"><button class="edit-btn">Edit</button></a>
                                <a href="<?php echo URL_ROOT . '/generals/announcementDelete/' . $data['announcement']->announcement_id; ?>"><button class="delete-btn">Delete</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URL_ROOT . '/js/index.js'; ?>"></script>
</body>

</html>