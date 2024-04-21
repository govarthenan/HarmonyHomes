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
      <div class="amenity">
        <div class="amenity-row-1">
         <div class="Up-coming-booking-amenity-landing"><a href="<?php echo URL_ROOT . '/residents/amenetyUpcoming'; ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"> Upcoming</a> </div>
          <div class="booking-log-amenity-landing"><a href="<?php echo URL_ROOT . '/residents/amenetyHistory'; ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"> History </a></div>
        </div>
        <div class="amenity-row-2">
          <div class="amenity-fitness-center">
            <div class="amenity-icon">
              <img src="<?php echo URL_ROOT . '/resources/resident_dashboard/dumble.svg'?>" class="gym-icon">
              <div class="amenity-name">Fitness Center</div>
            </div>
            <div class="amenity-description"><div class="direction">Book your slot,<br><i><b>Note:</b> Only 1 hour time slots are available</i></div><br> <a href="<?php echo URL_ROOT . '/residents/amenetyGym'; ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"> <div class="fitness-center-booking-button">Book</div> </a></div>
          </div>
          <div class="amenity-common-area">
            <div class="amenity-icon">
              <img src="<?php echo URL_ROOT . '/resources/resident_dashboard/swimming.png'?>" class="swim-icon">
              <div class="amenity-name">Swimming Pool</div>
            </div>
            <div class="amenity-description"><div class="direction">Book your slot,<br><i><b>Note:</b> Only 1 hour time slots are available</i></div><br><a href="<?php echo URL_ROOT . '/residents/amenetyPool'; ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"><div class="swimming-pool-center-booking-button">Book</div> </a> </div>
          </div>
          <div class="amenity-swimming-pool">
            <div class="amenity-icon">
              <img src="<?php echo URL_ROOT . '/resources/resident_dashboard/enterprise.png'?>" class="common-area">
              <div class="amenity-name">Common Area</div>
            </div>
            <div class="amenity-description"><div class="direction">Book your slot,<br><i><b>Note:</b> Only 3 hour time slots are available.<br></i></div><br><div class="common-area-booking-button"><a href="<?php echo URL_ROOT . '/residents/amenetyCommon'; ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"> Book</div></a></div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>