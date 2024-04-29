<?php
include(APP_ROOT . '/views/inc/general_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/general_style.css' ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="main-content">
        <?php
        // flash messages
        try {
            foreach ($_SESSION['flash'] as $key => $value) {
                flash($key);
            }
        } catch (Throwable $th) {
            echo '';
        }
        ?>
    <div class="new-announcement-landing">
      <div class="announcement-column-new">
        <div class="announcement-type">
          <div class="announcement-log">
            <img src="<?php echo URL_ROOT . '/resources/generals/announcement_log.svg' ?>" class="select-announcement-img" />
            <span class="announcement-type-title">Announcement Log</span>
          </div>

          <div class="new-announcement">
            <img src="<?php echo URL_ROOT . '/resources/complaint/hand-held-tablet-writing.svg' ?>" class="new-announcement-img" />
            <a href="<?php echo URL_ROOT . '/generals/announcementAdd' ?>" style="text-decoration: none;"><span class="announcement-type-title">Create New Announcement</span></a>
          </div>
        </div>


        <?php foreach ($data['announcements'] as $index => $announcement) : ?>
          <div class="announcement-log-content">

            <div class="id-column">
              <h4 class="announcement-id-heading">Announcement ID</h4>
              <p class="announcement-id"></p><?php echo $announcement->announcement_id; ?></p>
            </div>

            <div class="date-column">
              <h4 class="announcement-date-heading">Announcement Date</h4>
              <p class="announcement-date"></p><?php echo $announcement->created_date; ?></p>
            </div>

            <div class="audience-column">
              <h4 class="announcement-type-heading">Audience</h4>
              <p class="announcement-audience"></p><?php echo $announcement->receiver; ?></p>
            </div>

            <div class="description-column">
            <h4 class="announcement-type-heading">Title</h4>
            <p class="announcement-description"></p><?php echo $announcement->title; ?></p>
          </div>

            <div class="action-column">
              <h4 class="announcement-status-heading">Action</h4>
              <div class="button-action">
                <a href="<?php echo URL_ROOT . '/generals/announcementDetail/' . $announcement->announcement_id; ?>">
                  <button class="viewButton">View</button>
                </a>
                <a href="<?php echo URL_ROOT . '/generals/announcementEdit/' . $announcement->announcement_id; ?>">
                  <button class="updateButton">Update</button>
                </a>
                <a href="<?php echo URL_ROOT . '/generals/announcementDelete/' . $announcement->announcement_id; ?>">
                  <button class="delete-btn">Delete</button>
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>


      </div>
    </div>
  </div>
  </div>
  </div>
  <script src="<?php echo URL_ROOT . '/js/index.js'; ?>"></script>
</body>

</html>