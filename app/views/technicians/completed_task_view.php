<?php
include(APP_ROOT . '/views/inc/technician_sidenav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/technician_style.css' ?>" />
</head>

<body>
  <div class="main-content">
    <div class="column-new">
    <div class="view-landing">
        <div class="task-container">
          <div class="column">
            <div class="nested-grid">
            <div class="attachment-column-view">
                <h4>Date:</h4>
              </div>
              <div class="form-column-view">
                <h4>Task ID:</h4>
              </div>
              <div class="form-column-view-subject">
                <h4>Resident ID:</h4>
              </div>
              <div class="form-column-view-description">
                <h4>Title:</h4>
              </div>

              <div class="attachment-column-view">
                <h4>Description:</h4>
              </div>
              

            </div>
          </div>
          <div class="column">
            <div class="nested-grid">
            <div class="form-column-view">
                <div class="submitted-answers">
                  <p style="padding:1%; text-align:block;"><?php echo $data['completed_view']->Date; ?></p>
                </div>
              </div>

              <div class="form-column-view">
                <div class="submitted-answers">
                  <p style="padding:1%"><?php echo $data['completed_view']->issue_id; ?></p>
                </div>
              </div>
              <div class="form-column-view">
                <div class="submitted-answers">
                  <p style="padding:1%"><?php $resident_id = $data['completed_view']->floor_number . '/' . $data['completed_view']->door_number;
                   echo $resident_id; ?></p>
                </div>
              </div>

              <div class="form-column-view">
                <div class="submitted-answers">
                  <p style="padding:1%; text-align:block;"><?php echo $data['completed_view']->Issuetype; ?></p>
                </div>
              </div>

              <div class="form-column-view">
                <div class="submitted-answers">
                  <p style="padding:1%; text-align:block;"><?php echo $data['completed_view']->Description; ?></p>
                </div>
              </div>

              

            </div>
          </div>
        </div>
    </div>
    </div>
  </div>
</body>
</html>
        