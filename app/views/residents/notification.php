<?php include('sidenav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/style.css'; ?>" />
</head>
<body>
<div class="main-content">
    <div class="notification-landing">
        <div class="notification-heading">Notification</div>
        <div class="notification">
            <div class="notification-sender-profile">profile pic of sender</div>
            <div class="notification-content">
                <div class="notification-header" onclick="toggleMessage(this)">Power cut</div>
                <div class="sender"> by
                    <span class="sender-staff">General manager -
                        <span class="notification-time">Monday, 22nd of January 2024</span>
                    </span> 
                </div>
                <div class="notification-body" style="display: none;">Dear residents,<br>
                There will be a power cut on 23rd of january 2024 from 11.00 a.m to 1.00 p.m. Sorry for the inconvenience.
                </div>
            </div>
        </div>

        <div class="notification">
            <div class="notification-sender-profile">profile pic of sender</div>
            <div class="notification-content">
                <div class="notification-header" onclick="toggleMessage(this)">Maintenance fees</div>
                <div class="sender"> by
                    <span class="sender-staff">Finance manager -
                        <span class="notification-time">Monday, 23rd of January 2024</span>
                    </span> 
                </div>
                <div class="notification-body" style="display: none;">Dear residents,<br>
                Final date for the monthly maintenance payment will be 2nd of February 2024. Late payments will be fined.
                </div>
            </div>
        </div>
    </div>
</div>
  <script src="<?php echo URL_ROOT . '/js/index.js'; ?>"></script>
</body>
</html>