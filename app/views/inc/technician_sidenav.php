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
                <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/abc.jpg' ?>" class="profile-img" />
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
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_amenities.svg' ?>" />
                <span class="sidebar-title">Home</span>
            </div>
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_tasks.svg' ?>" />
                <span class="sidebar-title">Tasks Assigned</span>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_chat.svg' ?>" />
                <a href="<?php echo URL_ROOT . '/residents/complaintsLog'; ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"><span class="sidebar-title">Messages</span></a>
            </div>

            <hr />
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_log-out.svg' ?>" />
                <a href="<?php echo URL_ROOT . '/residents/signOut'; ?>" class="logout" style="text-decoration: none; color: inherit;margin-left: 4%;"><span class="sidebar-title">Logout</span></a>
            </div>
        </nav>
    </div>
</body>

</html>