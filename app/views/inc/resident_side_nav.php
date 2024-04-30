<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/style.css'; ?>" />
</head>

<body>
    <div class="sidebar">
        <div class="company_profile">
            <img src="<?php echo URL_ROOT . '/resources/common/company-logo-small.png' ?>" />
            <span class="company_name">Harmony Homes</span>
        </div>

        <div class="dropdown">
            <div class="user_profile">
                
                <p class="user_name"><?php $this->displayUserName(); ?></p>
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
            <a href="<?php echo URL_ROOT . '/residents/index' ?>" style="text-decoration: none; color: inherit;margin-left: 4%;">
                <div class="navi-item">
                    <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_amenities.svg' ?>" />
                    <span class="sidebar-title">Home</span>
                </div>
            </a>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_building.svg' ?>" />
                <span class="sidebar-title">Amenities</span>
            </div>

            <a href="<?php echo URL_ROOT . '/residents/complaintsLog'; ?>" style="text-decoration: none; color: inherit;margin-left: 4%;">
                <div class="navi-item">
                    <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_complaints.svg' ?>" />
                    <span class="sidebar-title">Complaints</span>
                </div>
            </a>

            <a href="<?php echo URL_ROOT . '/residents/issueLanding'; ?>" style="text-decoration: none; color: inherit;margin-left: 4%;">
                <div class="navi-item">
                    <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_issues.svg' ?>" />
                    <span class="sidebar-title">Issues</span>
                </div>
            </a>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_payment.svg' ?>" />
                <span class="sidebar-title">Payment</span>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_notification.svg' ?>" />
                <span class="sidebar-title">Notification</span>
            </div>


            <a href="<?php echo URL_ROOT . '/residents/supportLog'; ?>" style="text-decoration: none; color: inherit;margin-left: 4%;">
                <div class="navi-item">
                    <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_help.svg' ?>" />
                    <span class="sidebar-title">Support</span>
                </div>
            </a>

            <hr />
            <a href="<?php echo URL_ROOT . '/residents/signOut'; ?>" class="logout" style="text-decoration: none; color: inherit;margin-left: 4%;">
                <div class="navi-item">
                    <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_log-out.svg' ?>" />
                    <span class="sidebar-title">Logout</span>
                </div>
            </a>
        </nav>
    </div>
</body>

</html>