<?php include(APP_ROOT.'/views/inc/resident_side_nav.php'); ?>
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
        <div class="up-coming-bookings">
            <div class="up-coming-bookings-1-container">
                <div class="Your-bokings-heading">Your Bookings</div>
                <div class="booking-filters">
                    <div class="topbar-upcoming-booking">
                        <a href="#all">All</a>
                        <a href="#fitness">Fitness Center</a>
                        <a href="#pool">Swimming Pool</a>
                        <a href="#common">Common area</a>
                    </div>
                </div>
            </div>
            <div class="up-coming-bookings-2-container">
                <div id="content-all" class="content-section" style="display:block;">
                  <div class="booking-details-container">
                     <div class="amenity-type-icon">
                       <img src="<?php echo URL_ROOT . '/resources/resident_dashboard/dumble.svg'?>" class="upcoming-icon-class-gym" >
                     </div>
                     <div class="booking-details">
                       <div class="booking-date-upcoming">March 5, 2024</div>
                       <div class="booking-time-upcoming">5.00 - 6.00 p.m</div>
                       <div class="booking-des-upcoming"></div>
                     </div>
                     <div class="up-coming-cancel-edit">
                       <div class="Cancel-button-upcoming">
                        Cancel
                       </div>
                       <div class="edit-button-upcoming">
                        Edit
                       </div>
                     </div>
                  </div>
                  <div class="booking-details-container">
                     <div class="amenity-type-icon">
                       <img src="<?php echo URL_ROOT . '/resources/resident_dashboard/swimming.png'?>" class="upcoming-icon-class-swim">
                     </div>
                     <div class="booking-details">
                       <div class="booking-date-upcoming">March 5, 2024</div>
                       <div class="booking-time-upcoming">5.00 - 6.00 p.m</div>
                       <div class="booking-des-upcoming"></div>
                     </div>
                     <div class="up-coming-cancel-edit">
                       <div class="Cancel-button-upcoming">
                        Cancel
                       </div>
                       <div class="edit-button-upcoming">
                        Edit
                       </div>
                     </div>
                  </div>
                  <div class="booking-details-container">
                     <div class="amenity-type-icon">
                       <img src="<?php echo URL_ROOT . '/resources/resident_dashboard/enterprise.png'?>" class="upcoming-icon-class-common">
                     </div>
                     <div class="booking-details">
                       <div class="booking-date-upcoming">March 5, 2024</div>
                       <div class="booking-time-upcoming">5.00 - 6.00 p.m</div>
                       <div class="booking-des-upcoming"></div>
                     </div>
                     <div class="up-coming-cancel-edit">
                       <div class="Cancel-button-upcoming">
                        Cancel
                       </div>
                       <div class="edit-button-upcoming">
                        Edit
                       </div>
                     </div>
                  </div>
                </div>
             </div>
        </div>
    </div>
    <script src="index.js"></script>
    
</body>
</html>