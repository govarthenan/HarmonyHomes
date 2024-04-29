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
                <h4>Inventory:</h4>
              </div>

            </div>
          </div>
          <div class="column">
            <div class="nested-grid">
              <div class="form-column-view">
                <div class="submitted-answers">
                  <p style="padding:1%">1</p>
                </div>
              </div>
              <div class="form-column-view">
                <div class="submitted-answers">
                  <p style="padding:1%">3</p>
                </div>
              </div>

              <div class="form-column-view">
                <div class="submitted-answers">
                  <p style="padding:1%; text-align:block;">plumbing</p>
                </div>
              </div>

              <div class="form-column-view">
                <div class="submitted-answers">
                  <p style="padding:1%; text-align:block;">inventory</p>
                </div>
              </div>

              <div class="form-column-view">
                <div class="submitted-answers">
                  <p style="padding:1%; text-align:block;">description</p>
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
        