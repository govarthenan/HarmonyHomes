<?php
include(APP_ROOT . '/views/inc/general_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/public/css/general_style.css' ?>" />
</head>

<body onload="randerDate()">
    <div class="main-content">
        <div class="dashboard-container-general-manger">
            <div class="first-row-dashboard-general">
                <div class="dashboard-tile-column-1-gen">
                    <div class="dashboard-tile-column-1-gen-row-1">
                        <div class="no-of-flats">
                            <div class="content-info-flat">
                                <img src="<?php echo URL_ROOT . '/public/resources/generals/residential.png' ?>" class="flat-img">
                                <span class="title-dashboard-tiles">Flats Overview</span>
                            </div>
                            <div class="flat-details">
                                <div class="tot-flats">Total:<b>150</b></div><br>
                                <div class="sold-flats"> Sold:<b>120</b></div>
                            </div>
                        </div>
                        <div class="total-residents">
                            <div class="content-info-gender">
                                <img src="<?php echo URL_ROOT . '/public/resources/generals/population.png' ?>" class="population-img">
                                <span class="title-dashboard-tiles">Residents Overview</span>
                            </div>
                            <div class="flat-details">
                                <div class="tot-res">Total:<b><?php echo $data['resident'][0]->row_count; ?></b></div>
                            </div>
                        </div>
                        <div class="no-of-staff">
                            <div class="content-info-staff">
                                <img src="<?php echo URL_ROOT . '/public/resources/generals/teamwork.png' ?>" class="population-img">
                                <span class="title-dashboard-tiles">Staff Members</span>
                            </div>
                            <div class="flat-details">
                                <div class="tot-staff">Total:<b><?php echo $data['staff'][0]->staff_count; ?></b></div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-tile-column-1-gen-row-2">
                        <div class="sign-up-request-box">
                            <img src="<?php echo URL_ROOT . '/public/resources/generals/add-user.svg' ?>" class="add-user">
                            <span class="sign-up-request-heading">Sign Up requests</span>
                        </div>
                        <div class="amenity-request-box">
                            <img src="<?php echo URL_ROOT . '/public/resources/generals/request.svg' ?>" class="amenity-request-img">
                            <span class="amenity-request-heading">Amenity requests</span>
                        </div>
                    </div>
                </div>
                <div class="dashboard-tile-column-2-gen">
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
            </div>
            <div class="second-row-dashboard-general">
                <div class="consumption-overview">
                    <canvas id="consumptionChart"></canvas>
                </div>
                <div class="payment-overview-gm">
                    <canvas id="financeChart" width="150%" height="95%"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URL_ROOT . '/js/index.js' ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>