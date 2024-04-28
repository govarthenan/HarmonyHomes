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
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

<body>
  <div class="main-content">
    <div class="technician-container">
      <div class="add-button-container">
        <div class="technician-details-heading">Technician log</div>
        <button id="addnewTechnician" class="add-btn-technician">+ Add Technician</button>
      </div>

      <div class="technician-details-block-container">
        <div id="technicians" class="technicians-container">
          <?php foreach ($data['tech_detail'] as $index => $tech): ?>
            <div class="technician-card">
              <img src="<?php echo URL_ROOT . '/resources/generals/img-tec.png' ?>" class="technician-profile-image">
              <div class="technicain-name">Technician: <?php echo $tech->first_name; ?> </div>
              <div class="technicain-name">Phone no: <?php echo $tech->phone_number; ?> </div>
              <div class="specialization">Specialization: <?php echo $tech->specialization; ?></div>
              <div class="experience">Experience: <?php echo $tech->experience; ?> </div>
              <div class="technician-button-container">
                <div class="message-button">
                  <button id="messageTechnician" class="msg-button">Message</button>
                </div>
                <div class="delete-button">
                  <a href="<?php echo URL_ROOT . '/facilities/technicianDelete/' . $tech->technician_id; ?>">
                    <button id="removeTechnician" class="dlt-btn">Remove</button>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

          <!-- <div class="technician-card"  class="technician-profile-image">
                 <img src="image.png" class="technician-profile-image">
                 <div class="technicain-name"> Peter</div>
                 <div class="technician-id">TE02</div>
                 <div class="specialization"> Electrician</div>
                 <div class="experience">Experience: 5 Years</div>
                 <div class="technician-button-container">
                   <div class="message-button">
                     <button id="messageTechnician" class="msg-button">Message</button>
                   </div>
                   <div class="delete-button">
                     <button id="removeTechnician" class="dlt-btn">Remove</button>
                   </div>
                 </div>
              </div> -->
        </div>
      </div>
    </div>
  </div>
  <div id="myModal" class="modal" style="display: none;">
    <div class="add-technician-container">
      <span class="close">&times;</span>
      <div class="add-new-technician-heading">Add new technician</div>
      <form id="addTechnicianForm" name="technicianDetails" method="post"
        action="<?php echo URL_ROOT . '/facilities/technicianAdd' ?>">
        <div class="new-technician-input-container">
          <div class="technichian-left">
            <div class="form-group">
              <label for="firstName">First Name:</label>
              <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
              <label for="specialization">Specialization:</label>
              <select id="specialization" name="specialization" required>
                <option value="electrician">Electrician</option>
                <option value="plumber">Plumber</option>
              </select>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
              <label for="lastName">Password:</label>
              <input type="text" id="password" name="password" required>
            </div>
          </div>

          <div class="technician-right">
            <div class="form-group">
              <label for="lastName">Last Name:</label>
              <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
              <label for="experience">Experience (Years):</label>
              <input type="number" id="experience" name="experience" min="0" required>
            </div>
            <div class="form-group">
              <label for="lastName">Phone number:</label>
              <input type="tel" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
              <label for="firstName">Confirm password:</label>
              <input type="text" id="cpassword" name="cpassword" required>
            </div>

          </div>
          <div class="submit-column-confirmation">
            <button class="cancel-btn-technician">Cancel</button>
            <button class="submit-btn-technician">Add Technician</button>
          </div>
      </form>
    </div>

  </div>
  </div>
  </div>
  <script src="<?php echo URL_ROOT . '/js/script.js'; ?>"> </script>
</body>

</html>