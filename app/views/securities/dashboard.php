<?php
include(APP_ROOT . '/views/inc/security_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/security_style.css'; ?>" />
</head>

<body onload="randerDate()">
    <div class="main-content">
        <div class="dashboard-container">
            <div class="security-dashboard-column-1">
                <div class="secu-announcment-container">
                    <div class="secu-welcome-msg"> Announcment</div>
                    <div class="secu-announcment-tile">
                        <div class="secu-announcment-heading">Staff meeting</div>
                        <div class="announcment-sender">by General Manager</div>
                    </div>
                    <div class="secu-announcment-tile">
                        <div class="secu-announcment-heading">Staff meeting</div>
                        <div class="announcment-sender">by General Manager</div>
                    </div>
                </div>
                <div class="security-column-1-row-2">
                    <div class="Summary-heading">Today's summary</div>
                    <div class="secu-dash-tile-container">
                        <div class="security-dash-tiles">
                            <div class="visitor-log-heading">
                                Visitors
                            </div>
                            <div class="visitor-count-today">
                                20
                            </div>
                            <div class="visitor-count-summary">
                                <canvas id="visitorStatusDoughnut" style="display: block; box-sizing: border-box; width:5%; height: 10%;"></canvas>
                            </div>
                        </div>
                        <div class="security-dash-tiles1">
                            <div class="external-visitor-log-heading">
                                External
                            </div>
                            <div class="external-visitor-count-today">
                                15
                            </div>
                            <div class="external-visitor-log-heading">
                                <canvas id="externalPartiesDoughnut" style="display: block; box-sizing: border-box; width:5%; height: 8%; margin-bottom:-2%"></canvas>
                            </div>
                        </div>
                        <div class="security-dash-tiles">
                            <div class="delivery-log-heading">
                                Delivery
                            </div>
                            <div class="delivery-count-today">
                                30
                            </div>
                            <div class="delivery-count-summary">
                                <canvas id="deliveryStatusDoughnut"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="security-dashboard-column-2">
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo URL_ROOT . '/js/index.js'; ?>"></script>
</body>

</html>
