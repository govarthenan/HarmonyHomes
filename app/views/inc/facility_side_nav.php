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
                <a href="<?php echo URL_ROOT . '/facilities/index' ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"><span class="sidebar-title">Home</span></a>
            </div>
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/sidebar_issues.svg' ?>" class="sidebar_office_building" />
                <a href="<?php echo URL_ROOT . '/facilities/issueAssign' ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"> <span class="sidebar-title">Issues</span> </a>
            </div>

          

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/sidebar_complaints.svg' ?>" />
                <a href="<?php echo URL_ROOT . '/facilities/technicianLog' ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"><span class="sidebar-title">Technician</span></a>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/Notes-Checklist-Flip--Streamline-Ultimate.svg' ?>" />
                <a href="<?php echo URL_ROOT . '/facilities/inventoryLog'; ?>" style="text-decoration: none; color: inherit;margin-left: 4%;">    <span class="sidebar-title">Inventory</span> </a>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/sidebar_office-building-1.svg' ?>" />
                <a href="<?php echo URL_ROOT . '/facilities/inventoryLog'; ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"><span class="sidebar-title">Announcement</span>
            </div>
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/sidebar_office-building-1.svg' ?>" />
                <a href="<?php echo URL_ROOT . '/facilities/inventoryLog'; ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"><span class="sidebar-title">Log</span>
            </div>


            <hr />
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/sidebar_log-out.svg' ?>" />
                <a href="<?php echo URL_ROOT . '/facilities/signOut' ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"><span class="sidebar-title">Logout</span></a>
            </div>
        </nav>


    </div>
</body>

</html>