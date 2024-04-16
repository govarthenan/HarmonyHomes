<?php
include('sidenav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Notification</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/finance_style.css'; ?>" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
   <div class="main-content">
     <div class="notification-container">
        <div class="notification-heading">
            New Notification
        </div>
        <div class="notification-audience">
          <div class="audience-heading">Audience</div> 
          <div class="audience-details">
            <div class="send-heading">Send to :</div>
            <div class="select-audience">
              <select id="userType" name="userType" onchange="toggleDropdowns()">
                <option value="allUsers">All Users</option>
                <option value="groups">Wings</option>
                <option value="customUser">Custom User</option>
              </select>
              <div id="groupSelect" class="hidden">
                <select id="groupType" name="groupType">
                  <option value="group1">Right wing</option>
                  <option value="group2">Left wing</option>
                  <option value="group3">East wing</option>
                  <option value="group3">West wing</option>
                </select>
              </div>
              <div id="residentIdSelect" class="hidden">
                <select id="residentId" name="residentId">
                  <option value="id1">ID 1</option>
                  <option value="id2">ID 2</option>
                  <option value="id3">ID 3</option>
                </select>
            </div>
          </div> 
         </div>
       </div>
       <div class="notification-message">
          <div class="notification-content-heading">Notification Content</div>
          <div class="notification-content-details-title">
            <div class="notification-title">Title:</div>
            <div class="title-for-notification">
               <input type="text" id="title" name="title" required>
            </div>
          </div>
          <div class="notification-content-details-message">
            <div class="notification-message-heading">Message:</div>
            <div class="message-for-notification">
               <div id="editor" style="height:80%; width: 82%; "></div>
            </div>
          </div>
       </div>
       <div class="notification-send-container">
         <div class="send-notification-button">
           <button type="submit" id="sendButton">Send</button>
         </div>
       </div>
   </div> 
   <script src="<?php echo URL_ROOT . '/js/index.js'; ?>"></script>
   <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
</body>
</html>



