<?php
include('sidenav.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../gm_style.css" />
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
                  <p style="padding:1%"> Maintenance</p>
                </div>
                </div>
                <div class="form-column-view">
                <div class="submitted-answers">
                <p style="padding:1%"> Maintenance</p>
                </div>
                </div>

                <div class="form-column-view">
                <div class="submitted-answers">
                <p style="padding:1%; text-align:block;"> hkssjfhkefelfhnie dhfguhguryruthg kfjdfhiughruigh gjghryhtruthh hfuyhf <br>
              hfrjhgiurhguythytr eruthrytgrbgrhg bhgruyghurtyrh fhehfruhgyurhgyurht<br>hguhgiurghitrgruiytey hgfyrfuyebfyurber </p>
                </div>
                </div>

                <div class="form-column-view">
                <div class="submitted-answers">
                <img src="file.svg" class="complaint-view-file">
               </div>
               </div>
               <div class="form-column-view">
                  <select id="items" name="selectedItem">
                    <option value="0">Select Status</option>
                    <option value="1">In Progress</option>
                    <option value="2">Resolved</option>
                    <option value="3">Hold</option>
                    <option value="3">Completed</option>
                  </select>
                </div>
                 
              <div class="update-button">
                <button class="update-btn">Update Status</button>
              </div>
        </div>
          

      </div>
  </body>
  </html>