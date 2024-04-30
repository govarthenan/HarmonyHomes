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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body onload="randerDate()">
  <div class="main-content">
    <div class="technician-dashboard-container">
      <div class="tech-dashboard-row-1">
        <div class="tech-announcment-container">
          <div class="tech-welcome-msg"> Announcment</div>
          <div class="tech-announcment-tile">
            <div class="tech-announcment-heading">Staff meeting</div>
            <div class="announcment-sender">by General Manager</div>
          </div>
          <div class="tech-announcment-tile">
            <div class="tech-announcment-heading">Staff meeting</div>
            <div class="announcment-sender">by General Manager</div>
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
      <div class="tech-dashboard-row-2">
        <div class="tech-total-task-tile">
          <div class="tasks">
            <img src="<?php echo URL_ROOT . '/resources/generals/total-task.svg' ?>" class="total-task-icon">
          </div>
          <div class="Number-task">
            <div class="task-name">
              Total
            </div>
            <div class="task-count-total">
              8
            </div>
          </div>
        </div>
        <div class="tech-ongoing-task-tile">
          <div class="tasks">
            <img src="<?php echo URL_ROOT .  '/resources/generals/ongoing-task.svg' ?>" class="ongoing-task-icon">
          </div>
          <div class="Number-task">
            <div class="task-name">
              Ongoing
            </div>
            <div class="task-count-ongoing">
              2
            </div>
          </div>
        </div>
        <div class="tech-completed-task-tile">
          <div class="tasks">
            <img src="<?php echo URL_ROOT .  '/resources/generals/completed-task.svg' ?>" class="completed-task-icon">
          </div>
          <div class="Number-task">
            <div class="task-name">
              Completed
            </div>
            <div class="task-count-completed">
              6
            </div>
          </div>
        </div>
      </div>
      <div class="tech-dashboard-row-3">
        <div class="chart-1">
        <div style="width: 57%; margin:-1% 10%;">
        <canvas id="taskChart"></canvas>
    </div>
        </div>
        <div class="chart-1">
        <div style="width: 75%; height:95%; margin:-1% 10%;">
        <canvas id="inventoryChart"></canvas>
    </div>
        </div>
        
      </div>
    </div>
  </div>
  <!-- <script src="index.js"></script> -->
  <script src="<?php echo URL_ROOT . '/js/technician.js' ?>"></script>
  
</body>

</html>