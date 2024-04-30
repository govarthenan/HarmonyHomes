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
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/style.css'; ?>" />
</head>

<body>
    <div class="sidebar">
        <div class="company_profile">
            <img src="<?php echo URL_ROOT . '/public/resources/generals/abc.jpg' ?>" />
            <span class="company_name">Castle Care</span>
        </div>

        <div class="dropdown">
          <div class="user_profile">
             <img src="<?php echo URL_ROOT . '/public/resources/generals/abc.jpg' ?>"  class="profile-img"/>
             <p class="user_name">User Name</p>
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
                <a href="<?php echo URL_ROOT . '/technicians/index' ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"><span class="sidebar-title">Home</span></a>
            </div>
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/total-task.svg' ?>" />
                <a href="<?php echo URL_ROOT . '/technicians/viewNewTasks' ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"><span class="sidebar-title">New</span></a>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/ongoing-task.svg' ?>" />
                <a href="<?php echo URL_ROOT . '/technicians/taskOngoing' ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"><span class="sidebar-title">Tasks</span></a>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/sidebar_office-building-1.svg' ?>" />
                <a href="<?php echo URL_ROOT . '/technicians/ViewInventoryLevel' ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"><span class="sidebar-title">Inventory</span></a>
            </div>

            
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . '/public/resources/generals/completed-task.svg' ?>" />
                <a href="<?php echo URL_ROOT . '/technicians/completedTask' ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"><span class="sidebar-title">Completed</span></a>
            </div>
            
            <hr />
            <div class="navi-item">
            <img src="<?php echo URL_ROOT . '/resources/resident_side_nav/sidebar_log-out.svg' ?>" />
                <a href="<?php echo URL_ROOT . '/technicians/signout' ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"><span class="sidebar-title">Logout</span></a>
            </div>
        </nav>

        
    </div>
</body>

</html>

