<?php
include (APP_ROOT . '/views/inc/facility_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/general_style.css' ?>" />

  </head>
  <body>
    <div class="main-content">
      <div class="new-issue-log-landing">
        <div class="issue-log-column-new">
          <div class="announcement-type">
                <div class="issue-log">
                  <img src="<?php echo URL_ROOT . '/resources/generals/hand-held-tablet-writing.svg' ?>" class="select-issue-log-img" />

                  <span class="issue-log-type-title">Issue log</span>
                </div>
                
                <div class="completed-issue">
                <img src="<?php echo URL_ROOT . '/resources/generals/hand-held-tablet-writing.svg' ?>"  class="new-announcement-img" />
                <a href="<?php echo URL_ROOT . '/facilities/fmIssueComplete' ?>" style="text-decoration: none;"><span class="announcement-type-title">Completed Issues</span></a>
                  <span class="issue-log-type-title"></span>
                </div>
            </div>
            <?php foreach ($data['issues'] as $index => $issue) : ?>
            <div class="announcement-log-content">
           
                <div class="id-column">
                  <h4 class="announcement-id-heading">Date</h4>
                  <p class="announcement-id"></p><?php echo $issue->Date; ?></p>
                </div>

               <div class="date-column">
                 <h4 class="announcement-date-heading">Resident ID</h4>
                 <p class="announcement-date"></p><?php echo $issue->user_id; ?></p>
               </div>
               
              

               <div class="audience-column">
                  <h4 class="announcement-type-heading">Issue</h4>
                  <p class="announcement-audience"></p><?php echo $issue->Issuetype; ?></p>
                </div>    
              
                <div class="description-column">
                  <h4 class="announcement-type-heading">Technician</h4>
                  <p class="announcement-description"></p><?php echo ($issue->fname." ".$issue->lname); ?></p>
                </div>

                <div class="status-column">
                  <h4 class="announcement-status-heading">Status</h4>
                  <p class="announcement-description"><button class="on-going-btn"><?php echo $issue->status; ?></button></p>
                </div>
                
            </div>
            <?php endforeach; ?>
                </div>
              
</div>
</div>
</div>
</body>
</html>