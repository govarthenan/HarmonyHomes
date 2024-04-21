<?php
// Your PHP code here (if needed)

// For example:

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/public/css/generals_style.css' ?>" />
</head>

<body>
    <div class="sidebar">
        <div class="company_profile">
            <img src="<?php echo URL_ROOT . '/public/resources/generals/company-logo-small.png' ?>" />
            <span class="company_name">Harmony Homes</span>
        </div>

        <div class="dropdown">
            <div class="user_profile">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/abc.jpg' ?>" class="profile-img" />
                <p class="user_name"><?php echo $_SESSION['user_name'] ?></p>
            </div>

            <div class="dropdown-content">
                <div class="dropdown-title">
                    <img src="<?php echo URL_ROOT . '/public/resources/generals/sidebar_user.svg' ?>" class="sidebar-user" />
                    <span class="dropdown-item">Profile</span>
                </div>

                <div class="dropdown-title">
                    <img src="<?php echo URL_ROOT . '/public/resources/generals/sidebar_options.svg' ?>" class="sidebar-options" />
                    <span class="dropdown-item">Settings</span>
                </div>
            </div>
        </div>
        <nav class="navigation">
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/sidebar_amenities.svg' ?>" />
                <a href="<?php echo URL_ROOT . '/generals/index' ?>"><span class="sidebar-title">Home</span></a>
            </div>
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/sidebar_issues.svg' ?>" class="sidebar_office_building" />
                <span class="sidebar-title">Issues</span>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/sidebar_payment.svg' ?>" />
                <span class="sidebar-title">Payments</span>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/sidebar_complaints.svg' ?>" />
                <a href="<?php echo URL_ROOT . '/generals/complaintsLog' ?>"><span class="sidebar-title">Complaints</span></a>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/sidebar_notification.svg' ?>" />
                <span class="sidebar-title">Notification</span>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/sidebar_office-building-1.svg' ?>" />
                <span class="sidebar-title">Announcement</span>
            </div>

            <hr />
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/sidebar_log-out.svg' ?>" />
                <a href="<?php echo URL_ROOT . '/generals/signOut' ?>"><span class="sidebar-title">Logout</span></a>
            </div>
        </nav>


    </div>
</body>

</html>