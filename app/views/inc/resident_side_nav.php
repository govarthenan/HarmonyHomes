<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . 'css/style.css'; ?>" />
</head>

<body>
    <div class="sidebar">
        <div class="company_profile">
            <img src="<?php echo URL_ROOT . 'resources/company-logo-small.png'?>" />
            <span class="company_name">Harmony Homes</span>
        </div>

        <div class="dropdown">
          <div class="user_profile">
             <img src="<?php echo URL_ROOT . 'resources/abc.jpg'?>"  class="profile-img"/>
             <p class="user_name">User Name</p>
          </div>
             
        <div class="dropdown-content">
               <div class="dropdown-title">
                    <img src="<?php echo URL_ROOT . 'resources/sidebar_user.svg'?>" class="sidebar-user" />
                    <span class="dropdown-item">Profile</span>
              </div>
             
              <div class="dropdown-title">
                    <img src="<?php echo URL_ROOT . 'resources/sidebar_options.svg'?>" class="sidebar-options" />
                    <span class="dropdown-item">Settings</span>
              </div>
        </div>
    </div>
        <nav class="navigation">
        <div class="navi-item">
                <img src="<?php echo URL_ROOT . 'resources/sidebar_amenities.svg'?>" />
                <span class="sidebar-title">Home</span>
            </div>
            <div class="navi-item">
                <img src="<?php echo URL_ROOT . 'resources/sidebar_building.svg'?>" class="sidebar_office_building"/>
                <span class="sidebar-title">Amenities</span>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . 'resources/sidebar_complaints.svg'?>" />
                <span class="sidebar-title">Complaints</span>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . 'resources/sidebar_issues.svg'?>" />
                <span class="sidebar-title">Issues</span>
            </div>

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . 'resources/sidebar_payment.svg'?>" />
                <span class="sidebar-title">Payment</span>
            </div>
            
            <div class="navi-item">
                    <img src="<?php echo URL_ROOT . 'resources/sidebar_notification.svg'?>"/>
                    <span class="sidebar-title">Notification</span>
                </div>
            

            <div class="navi-item">
                <img src="<?php echo URL_ROOT . 'resources/sidebar_help.svg'?>" />
                <span class="sidebar-title">Support</span>
            </div>

            <hr />
            <div class="navi-item">
                    <img src="<?php echo URL_ROOT . 'resources/sidebar_log-out.svg'?>" />
                    <span class="sidebar-title">Logout</span>
                </div>
        </nav>
    </div>
</body>

</html>