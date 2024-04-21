<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="sidebar">
        <div class="company_profile">
            <img src="<?php echo URL_ROOT . '/resources/common/company-logo-small.png' ?>" />
            <span class="company_name">Harmony Homes</span>
        </div>

        <div class="dropdown">
            <div class="user_profile">
                <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/abc.jpg' ?>" class="profile-img" />
                <p class="user_name">User Name</p>
            </div>

            <div class="dropdown-content">
                <div class="dropdown-title">
                    <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_user.svg' ?>" class="sidebar-user" />
                    <span class="dropdown-item">Profile</span>
                </div>

                <div class="dropdown-title">
                    <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_options.svg' ?>" class="sidebar-options" />
                    <span class="dropdown-item">Settings</span>
                </div>
            </div>
        </div>
        <nav class="navigation">
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_amenities.svg' ?>" />
                <span class="sidebar-title">Home</span>
            </div>
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/finance_side_nav/sidebar_payment.svg' ?>" />
                <span class="sidebar-title">Payment</span>
            </div>
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/finance_side_nav/sidebar_bill.svg' ?>" />
                <span class="sidebar-title">Billing</span>
            </div>
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/finance_side_nav/sidebar_calendar.svg' ?>" />
                <span class="sidebar-title">Calendar events</span>
            </div>
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/finance_side_nav/sidebar_notification.svg' ?>" />
                <span class="sidebar-title">Notification</span>
            </div>

            <hr />
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/finance_side_nav/sidebar_log-out.svg' ?>" />
                <img src="sidebar_log-out.svg" />
                <span class="sidebar-title">Logout</span>
            </div>
        </nav>


    </div>
</body>

</html>