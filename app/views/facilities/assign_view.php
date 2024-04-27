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
    <div class="view-assign-technician-landing">
      <div class="inventory-column-new">
        <div class="assign-tech-heading">Assign technician</div>
        <div class="new-assign-technician-container">
          <!-- <div class="assign-technician-heading">Assign Technician</div> -->
          <div class="column">
            <div class="nested-grid">
              <div class="form-column-view">
                <h4>Technician Type:</h4>

              </div>
              <div class="form-column-view-technician">
                <h4>Choose a Technician:</h4>

              </div>
              <div class="form-column-view-description">
                <h4>Description:</h4>

              </div>



            </div>
          </div>
          <div class="column">
            <div class="nested-grid-assign-technician">
              <form action="<?php

              $issue_id = $data['issueId'];
              echo URL_ROOT . '/facilities/getAssignDetails/' . $issue_id ?>" method="post" >

                <div class="assignTechForm select">
                  <select id="techTypeSelect" name="techType">
                    <option value="electrician">Electrician</option>
                    <option value="plumber">Plumber</option>
                  </select>
                </div>


                <div class="assignTechForm select">

                  <select id="techSelect" name="technician">

                    <?php foreach ($data['tech_data'] as $index => $tech): ?>
                      <option value="<?php echo $tech->technician_id; ?>"><?php echo $tech->first_name ?></option>
                    <?php endforeach ?>
                </div>
                <div class="assignTechForm select">
                  <textarea id="description" name="description" rows="4"></textarea>
                </div>
                <div class="assign-Button">

                  <button class="technician-assign-btn" id="technician-assign-btn">Assign Technician </button>

                </div>
              </form>
            </div>
          </div>
         

</body>

</html>