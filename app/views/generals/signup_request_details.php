<?php
include(APP_ROOT . '/views/inc/general_side_nav.php');
$request = $data['signup_request'];
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
                                <h4>Name:</h4>
                            </div>
                            <div class="form-column-view-subject">
                                <h4>Email</h4>
                            </div>
                            <div class="form-column-view-description">
                                <h4>Address:</h4>
                            </div>

                            <div class="form-column-view-description">
                                <h4>Phone:</h4>
                            </div>

                            <div class="form-column-view-description">
                                <h4>NIC No.:</h4>
                            </div>

                            <div class="form-attachment-column-view">
                                <h4>NIC:</h4>
                            </div>

                            <div class="form-attachment-column-view">
                                <h4>Agreement:</h4>
                            </div>

                            <div class="form-attachment-column-status">
                                <h4>Approval Status:</h4>
                            </div>

                        </div>
                    </div>
                    <div class="column">
                        <div class="nested-grid-complaint">
                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <p style="padding:1%"><?php echo $request->name; ?></p>
                                </div>
                            </div>
                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <p style="padding:1%"><?php echo $request->email; ?></p>
                                </div>
                            </div>

                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <p style="padding:1%; text-align:block;"><?php echo $request->floor_number . '/' . $request->door_number; ?></p>
                                </div>
                            </div>

                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <p style="padding:1%"><?php echo $request->phone; ?></p>
                                </div>
                            </div>

                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <p style="padding:1%"><?php echo $request->nic; ?></p>
                                </div>
                            </div>

                            <!-- show NIC photo -->
                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <?php

                                    $blob = $request->nic_path;

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

                            <!-- show agreement photo -->
                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <?php

                                    $blob = $request->agreement_path;

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

                            <div class="form-column-view">
                                <div class="submitted-answers">
                                    <p style="padding:1%"><?php echo ($request->approved == '0') ? 'Not Approved!' : 'Approved'; ?></p>
                                </div>
                            </div>
                        </div>

                        <form method="post" action="<?php echo URL_ROOT . '/generals/userManagement/' . $request->user_id ?>">
                            <!-- hidden input -->
                            <input type="hidden" value="<?php echo $request->approved; ?>" name="approval">
                            <div class="update-button">
                                <button type="submit" name="action" value="toggle-approval" class="update-btn"><?php echo ($request->approved == '0') ? 'Approve User' : 'Suspend User'; ?></button>
                                <button type="submit" name="action" value="delete-user" class="update-btn">Delete User</button>'
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