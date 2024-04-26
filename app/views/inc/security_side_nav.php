<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/security_style.css'; ?>" />
</head>

<body>
    <div class="sidebar">
        <div class="company_profile">
            <img src="<?php echo URL_ROOT . '/resources/common/company-logo-small.png' ?>">

            <span class="company_name">Harmony Homes</span>
        </div>

        <div class="dropdown">
            <div class="user_profile">
                <img src="abc.jpg" class="profile-img" />
                <p class="user_name">User Name</p>
            </div>

            <div class="dropdown-content">
                <div class="dropdown-title">
                    <img src="<?php echo URL_ROOT . '/resources/securities/sidebar_user.svg' ?>" class="sidebar-user">
                    <span class="dropdown-item">Profile</span>
                </div>

                <div class="dropdown-title">
                    <img src="<?php echo URL_ROOT . '/resources/securities/sidebar_options.svg' ?>" class="sidebar-options">
                    <span class="dropdown-item">Settings</span>
                </div>
            </div>
        </div>
        <nav class="navigation">
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/securities/sidebar_amenities.svg' ?>">
                <span class="sidebar-title">Home</span>
            </div>
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/securities/visitor.svg' ?>" class="sidebar_icon">
                <span class="sidebar-title">Visitor Tracking</span>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/securities/external.svg' ?>" class="sidebar_icon">
                <span class="sidebar-title">External Personal</span>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/securities/delivery.svg' ?>" class="sidebar_icon">
                <span class="sidebar-title">Apartment Deliveries</span>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/securities/sidebar_help.svg' ?>">
                <span class="sidebar-title">Support</span>
            </div>

            <hr />
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/securities/sidebar_log-out.svg' ?>">
                <span class="sidebar-title">Logout</span>
            </div>
        </nav>


    </div>
</body>

</html>