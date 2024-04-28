<?php
include(APP_ROOT . '/views/inc/general_side_nav.php');
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
                <div class="form-column-view-amenity-type">
                  <p><b>Amenity type:</b></p>
                </div>
                <div class="form-column-view-date">
                  <p><b>Date:</b></p>
                </div>
                <div class="form-column-view-time">
                   <p><b>Time:</b></p>
                </div>
                <div class="form-column-no-of-people">
                   <p><b>Number of persons:</b></p>
                </div>
                <div class="form-column-purpose">
                   <p><b>Purpose:</b></p>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="nested-grid">
                <div class="form-column-view-amenity">
                  <div class="submitted-answers">
                    <p style="padding:1%"> Fitness Center</p>
                  </div>
                </div>
                <div class="form-column-view-amenity">
                  <div class="submitted-answers">
                    <p style="padding:1%"> 2024/01/28</p>
                  </div>
                </div>
                <div class="form-column-view-amenity">
                  <div class="submitted-answers">
                    <p style="padding:1%"> 8.00 am - 9.00 a.m</p>
                  </div>
                </div>
                <div class="form-column-view-amenity">
                  <div class="submitted-answers">
                    <p style="padding:1%">2</p>
                  </div>
                </div>
                 
                <div class="form-column-view-amenity">
                  <div class="submitted-answers">
                    <p style="padding:1%">For a birthday celebration.</p>
                  </div>
                </div>

                <div class="submit-column">
                  <button class="accept-btn">Accept</button>
                  <button id="decline-btn-amenity" class="decline-btn-amenity">Decline</button>
                </div>
        </div>
      </div>
    </div>

    <div id="myModal" class="modal" style="display: none;">
        <div class="decline-confirmation">
          <span class="close">&times;</span>
            <h2 class="decline-heading">Confirm Decline</h2>
                <h3>Are you sure you want to decline this request?</h3>
                <p>Click, "Confirm" to proceed with submission<br>or cancel to make changes.</p>
                <div class="decline-column-confirmation">
                    <button class="cancel-btn-confirmation">Cancel</button>
                    <button class="submit-btn-cofirmation">Confirm</button>
                </div>
        </div>
    </div>
  </div>

    <script src="index.js"></script>
  </body>
</html>

















































































