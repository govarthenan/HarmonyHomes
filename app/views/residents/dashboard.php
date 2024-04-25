<?php
include(APP_ROOT.'/views/inc/resident_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/style.css'; ?>" />
  </head>
  <body onload="randerDate()">
    <div class="main-content">
      <div class="dashboard-container">
        <div class="first-row-resident-dashboard">
          <div class="announcment-container">
            <div class="announcment-heading">
              Announcment
            </div>
            
            <div class="announcment-tile-container">
            <?php foreach ($data['announcement'] as $index => $announcement) : ?>
               <div class="announcment-1">
                
                 <div class="announcment-tile-heading"><p><?php echo $announcement->title; ?></p></div>
                      
                   </div>
                 <?php endforeach?>
               
           </div>
          </div>
          <div class="calendar">
            <div class="calendar-container">
              <div class="month">
               <div class="prev" onclick="moveDate('prev')">
                <span class="arrow">&#10094</span>
              </div>

              <div>
                <h2 id="month">April-2023</h2>
                <p id="date">Tue April 20 2023</p>
              </div>

              <div class="next" onclick="moveDate('next')">
               <span class="arrow">&#10095</span>
              </div>
            </div>

            <div class="week">
              <div>Sun</div>
              <div>Mon</div>
              <div>Tue</div>
              <div>Wed</div>
              <div>Thu</div>
              <div>Fri</div>
              <div>Sat</div>
            </div>
            
            <div class="dates">
            </div>
           </div>
          </div>
        </div>
  
        <div class="second-row-resident-dashboard">
          <div class="booking-reminder">
            <img src="<?php echo URL_ROOT . '/resources/resident_dashboard/waiting-appointments-calendar.svg'?>" class="booking-reminder-img">
            <div class="reminder-heading">Booking</div>
          </div>
          <div class="event-reminder">
             <img src="<?php echo URL_ROOT . '/resources/resident_dashboard/calendar-star.svg'?>" class="event-reminder-img">
             <div class="reminder-heading">Events</div>
          </div>
          <div class="payment-reminder">
            <img src="<?php echo URL_ROOT . '/resources/resident_dashboard/subscription-cashflow.svg'?>" class="payment-reminder-img">
            <div class="reminder-heading">Payments</div>
          </div>
          <div class="private-files">
           <img src="<?php echo URL_ROOT . '/resources/resident_dashboard/business-user-curriculum.svg'?>" class="business-user-curriculum-img">
           <div class="private-files-heading">Private files</div>
          </div>
        </div>
        <div class="third-row-resident-dashboard">
          <div class="maitenance-payment-overview">
             <canvas id="maintenancePaymentChart" width="1500%" height="200%"></canvas>
          </div>
          <div class="utility-useage-overview">
             <canvas id="utilityUsageChart" width="100%" height="90%"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- modal part -->
        
    <div id="popupModal-booking" class="popup-booking" style="display:none;">
       <div class="modal-content-booking">
         <span class="close">&times;</span>
         <div class="bookin-msg">Fitness center<br>12/02/2024<br>10.30 a.m</div>
       </div>
    </div>

    <div id="popupModal-events" class="popup-events" style="display:none;">
       <div class="modal-content-events">
         <span class="close">&times;</span>
         <div class="event-msg">Sinhala and tamil new year celebration<br>11/04/2024<br>10.30 a.m</div>
       </div>
    </div>

    <div id="popupModal-payment" class="popup-payment" style="display:none;">
       <div class="modal-content-payment">
         <span class="close">&times;</span>
         <div class="event-msg">Maintenace fees<br>11/04/2024<br>11.55 p.m</div>
       </div>
    </div>

    <script src="<?php echo URL_ROOT . '/js/index.js'; ?>" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </body>
</html>