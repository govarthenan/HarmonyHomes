<?php
include(APP_ROOT . '/views/inc/general_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create announcement</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/general_style.css' ?>" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.snow.css" rel="stylesheet" />

</head>

<body>
    <div class="main-content">
        <div class="announcement-container">
            <div class="announcement-type">
                <div class="new-next-announcement">
                    <img src="<?php echo URL_ROOT . '/resources/generals/announcement_log.svg' ?>" class="select-announcement-img" />
                    <a href="<?php echo URL_ROOT . '/generals/announcementsLog' ?>" style="text-decoration: none;"><span class="announcement-type-title">Announcement Log</span></a>
                </div>

                <div class="announcement-next-log">
                    <img src="<?php echo URL_ROOT . '/resources/complaint/hand-held-tablet-writing.svg' ?>" class="new-announcement-img" />
                    <span class="announcement-type-title">Create New Announcement</span>
                </div>
            </div>
            <form enctype="multipart/form-data" name="announcementForm" method="post" action="<?php echo URL_ROOT . '/generals/announcementEdit/' . $data['announcement']->announcement_id ?>">
                <div class="announcement-audience">
                    <div class="audience-heading">Audience</div>
                    <div class="audience-details">
                        <div class="send-heading">Send to :</div>
                        <div class="select-audience">
                            <select id="userType" name="receiver" onchange="toggleDropdowns()">
                                <option value="AllUsers" <?php echo ($data['announcement']->receiver == 'AllUsers') ? 'selected' : ''; ?>>All Users</option>
                                <option value="wings">Wings</option>
                            </select>
                            <div id="groupSelect" class="hidden">
                                <select id="groupType" name="receiver">
                                    <option value="Rightwing" <?php echo ($data['announcement']->receiver == 'Rightwing') ? 'selected' : ''; ?>>Right wing</option>
                                    <option value="Leftwing" <?php echo ($data['announcement']->receiver == 'Leftwing') ? 'selected' : ''; ?>>Left wing</option>
                                    <option value="Eastwing" <?php echo ($data['announcement']->receiver == 'Eastwing') ? 'selected' : ''; ?>>East wing</option>
                                    <option value="Westwing" <?php echo ($data['announcement']->receiver == 'Westwing') ? 'selected' : ''; ?>>West wing</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="announcement-message">
                    <div class="announcement-content-heading">Announcement Content</div>
                    <div class="announcement-content-details-title">
                        <div class="announcement-title">Title:</div>
                        <div class="title-for-announcement">
                            <input type="text" id="title" name="title" value="<?php echo $data['announcement']->title ?>" required>
                        </div>
                    </div>
                    <div class="announcement-content-details-message">
                        <div class="announcement-message-heading">Message:</div>
                        <div class="message-for-announcement">
                            <input id="editor" name="message" style="height:80%; width: 80%; name=" title" value="<?php echo $data['announcement']->message ?>"">
            </div>
          </div>
        </div>
        <div class=" announcement-send-container">
                            <div class="send-announcement-button">
                                <button type="submit" id="sendButton">Send</button>
                            </div>
                        </div>
            </form>

            <script src="<?php echo URL_ROOT . '/js/index.js' ?>"></script>
            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

</body>

</html>