<?php
include(APP_ROOT.'/views/inc/resident_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/style_residents.css'; ?>" />
  </head>
  <body onload="randerDate()">
    <div class="main-content">
     <div class="new-issue-landing">
      <div class="issue-column-new">
            <div class="issue-type">
           
                <div class="new-issue-log">
                <a href="<?= URL_ROOT?> /residents/issueLanding">
                  <img src="<?php echo URL_ROOT . '/resources/resident_dashboard/one-finger-tap.svg'?>" class="select-complaint-img" />
                  <span class="issue-type-title">Issue Log</span>
                  </a>
                </div>

                
                <div class="new-issue-new">
                  <img src="<?php echo URL_ROOT . '/resources/resident_dashboard/hand-held-tablet-writing.svg'?>" class="new-complaint-img" />
                  <span class="issue-type-title">New Issue</span>
                </div>
              </div>
                <div class="new-issue-container">
                <div class="column">
            <div class="nested-grid">
                <div class="form-column">
                  <h4>Issue type:</h4>
                </div>
                <div class="form-column">
                  <h4>Subject:</h4>
                </div>
                <div class="form-column">
                   <h4>Description:</h4>
                  </div>
                  
                <div class="attachment-column">
                   <h4>Attachments:</h4>
                  </div>
                
            </div>
        </div>
        <div class="column">
        <form name="issueForm" method="post" class="new-issue-form" action="<?php echo URL_ROOT . '/residents/issueCreate' ?>">
            <div class="nested-grid">
                <div class="form-column">
                <select id="items" name="IssueType">
            <option value="Electricity">Electricity</option>
            <option value="Water">water</option>
            <option value="Plumbing">Plumbing</option>
            <option value="other">Other</option>
            <!-- Add more options as needed -->
        </select>
                </div>
                <div class="form-column">
                <input type="text" id="shortAnswer" name="subject" required>
                </div>

                <div class="form-column">
                <textarea id="answer" name="Description" rows="8" required></textarea>
                </div>

                <!-- <div class="drop-area">
                  <img src=<?php echo URL_ROOT . '/resources/residents/upload-cloud.svg'?> class="upload-cloud-img">
                  <p>Drag and Drop to upload files <br> or </p>
                  <label for="file-input" class="custom-file-upload">Choose File</label>
                     <input type="file" id="file-input" name="Attachments" >
               </div> -->
               <div class="submit-column">
               <button class="cancel-btn">Cancel</button>
               <button class="submit-btn">Submit</button>
    
                </div>
               </div>
        </form> 
               
            </div>
        </div>
          

        </div>
  </body>
  </html>