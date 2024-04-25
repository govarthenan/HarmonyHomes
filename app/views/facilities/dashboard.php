<?php
include(APP_ROOT . '/views/inc/facility_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/style_dashboard.css' ?>" />
</head>

<body onload="randerDate()">
  <div class="main-content">
    <div class="dashboard-container-facility-manger">
      <div class="dashboard-container-facility-column-1">
        <div class="dashboard-container-facility-announcment">
          <div class="announcment-container">
            <div class="announcment-heading">
              Announcment
            </div>
            <div class="announcment-tile-container">
              <div class="announcment-1">
                <div class="announcment-tile-heading">Monthly General meeting</div>
              </div>
              <div class="announcment-2">
                <div class="announcment-tile-heading">Power Cut Announcement</div>
              </div>
            </div>
          </div>
        </div>
        <div class="dashboard-facility-summary-container">
          <div class="dashboard-facility-summary-heading">
            Monthly Summary
          </div>
          <div class="dashboard-container-facility-tiles-container">
            <div class="dashboard-container-facility-tiles">
              <div class="tasks">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/file.svg' ?>" class="completed-task-icon">
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
            <div class="dashboard-container-facility-tiles">
              <div class="tasks">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/file.svg' ?>" class="ongoing-task-icon">
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
            <div class="dashboard-container-facility-tiles">
              <div class="tasks">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/file.svg' ?>" class="total-task-icon">
              </div>
              <div class="Number-task">
                <div class="task-name">
                  Technician
                </div>
                <div class="task-count-total">
                  8
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="dashboard-container-facility-column-2">
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
        <div class="a">

        </div>
      </div>
    </div>
  </div>
  <script src="index.js"></script>
</body>

</html>