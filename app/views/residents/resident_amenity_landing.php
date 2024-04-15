<?php
include('sidenav.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/style.css'; ?>">
  </head>
  <body>
    <div class="main-content">
      <div class="amenity">
        <div class="amenity-row-1">
          <div class="Up-coming-booking-amenity-landing">Upcoming </div>
          <div class="booking-log-amenity-landing">History</div>
        </div>
        <div class="amenity-row-2">
          <div class="amenity-fitness-center">
            <div class="amenity-icon">
              <img src="<?php echo URL_ROOT . '/resources/amenity/dumble.svg'; ?>" class="gym-icon" />
              <div class="amenity-name">Fitness Center</div>
            </div>
            <div class="amenity-description"><div class="direction">Book your slot,<br><i><b>Note:</b> Only 1 hour time slots are available</i></div><br><div class="fitness-center-booking-button">Book</div> </div>
          </div>
          <div class="amenity-common-area">
            <div class="amenity-icon">
              <img src="<?php echo URL_ROOT . '/resources/amenity/swimming.png'; ?>" class="swim-icon" />
              <div class="amenity-name">Swimming Pool</div>
            </div>
            <div class="amenity-description"><div class="direction">Book your slot,<br><i><b>Note:</b> Only 1 hour time slots are available</i></div><br><div class="swimming-pool-center-booking-button">Book</div> </div>
          </div>
          <div class="amenity-swimming-pool">
            <div class="amenity-icon">
              <img src="<?php echo URL_ROOT . '/resources/amenity/enterprise.png'; ?>" class="common-area" />
              <div class="amenity-name">Common Area</div>
            </div>
            <div class="amenity-description"><div class="direction">Book your slot,<br><i><b>Note:</b> Only 3 hour time slots are available</i></div><br><div class="common-area-booking-button">Book</div></div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>