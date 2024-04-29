<?php
include (APP_ROOT . '/views/inc/facility_side_nav.php');
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
    <div class="view-completed-issue-landing">
    <div class="completed-column-new">
           
                <div class="new-completed-issue-container">
                <div class="column">
            <div class="nested-grid">
                <div class="form-column-view">
                  <h4>Resident ID:</h4>
                </div>
                <div class="form-column-view-subject">
                  <h4>Date:</h4>
                </div>
                <div class="form-column-view-description">
                  <h4>Issue:</h4>
                  </div>
                <div class="form-column-view-description">
                  <h4>Technician:</h4>
                  </div>  
                <div class="form-attachment-fac-column-view">
                   <h4>Attachments:</h4>
                  </div>
                
                  
                
            </div>
        </div>
        <div class="column">
            <div class="nested-grid-completed-issue">
                <div class="form-column-view">
                <div class="submitted-answers">
                  <p style="padding:1%"><?php echo $data['completedOne'] ->user_id ?> </p>
                </div>
                </div>
                <div class="form-column-view">
                <div class="submitted-answers">
                <p style="padding:1%"><?php echo $data['completedOne'] ->Date ?> </p>
                </div>
                </div>

                <div class="form-column-view">
                <div class="submitted-answers">
                <p style="padding:1%; text-align:block;"> <?php echo $data['completedOne'] ->Issuetype ?>  </p>
                </div>
                </div>

                <div class="form-column-view">
                <div class="submitted-answers">
                <p style="padding:1%; text-align:block;"><?php echo ($data['completedOne'] -> fname ." ".$data['completedOne'] -> lname)?> </p>
                </div>
                </div>

                <div class="form-column-view">
                <div class="submitted-answers">
                <?php

                                    $blob = $data['completedOne']->Attachment;

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
                                        echo '<img width="65rem" src="' . $imgSrc . '" alt="Issue Attachment">';
                                    }
                                    ?>
               </div>
               </div>
               <!-- <div class="form-column-view">
                  <select id="items" name="selectedItem">
                    <option value="0">Select Status</option>
                    <option value="1">In Progress</option>
                    <option value="2">Resolved</option>
                    <option value="3">Hold</option>
                    <option value="3">Completed</option>
                  </select>
                </div> -->
                 
              <div class="close_button">
                <button class="close-issue-btn">
                  <b><a href="<?php echo URL_ROOT . '/facilities/fmIssueComplete/'?>" style="text-decoration: none;"><span class="announcement-type-title">Close</span></a></b>
                </button>
              </div>
        </div>
          

      </div>
  </body>
  </html>