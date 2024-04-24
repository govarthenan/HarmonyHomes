<?php
include(APP_ROOT.'/views/inc/resident_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/final-style-resident.css'; ?>" />
  </head>
  <body onload="randerDate()">
    <div class="main-content">
      <div class="issue-landing">
        <div class="issue-column-">
          <div class="issue-type">
          
                <div class="issue-log">
                <a href="<?= URL_ROOT?> /residents/issueLanding">
                  <img src="<?php echo URL_ROOT . '/resources/residents/one-finger-tap.svg'?>" class="select-complaint-img" />
                  <span class="issue-type-title">Issue Log</span>
                 </a>
                </div>
          
              
                <div class="new-issue">
                <a href="<?= URL_ROOT?> /residents/issueCreate"> 
                  <img src="<?php echo URL_ROOT . '/resources/residents/hand-held-tablet-writing.svg'?>" class="new-complaint-img" />
                  <span class="issue-type-title">New Issue</span>
                </a>
                </div>
          
            </div>
            <?php foreach ($data['issue'] as $index => $issue) : ?>
            <div class="issue-log-content">
                <div class="id-column">
                  <h4 class="issue-id-heading">Issue ID</h4>
                  <p class="issue-id"></p><?php echo $issue->issue_id; ?></p>
                </div>

               <div class="date-column">
                 <h4 class="issue-date-heading">Issue Date</h4>
                 <p class="issue-date"></p><?php echo $issue->Date; ?></p>
               </div>
                   
               <div class="file-column">
                  <h4 class="issue-file-heading">Attachments</h4>
                  <img src="file.svg" class="file-image">
                </div>

                <div class="description-column">
                  <h4 class="issue-type-heading"><?php echo $issue->Issuetype; ?></h4>
                  <p class="issue-description"></p><?php echo $issue->Description; ?></p>
                </div>

                <div class="status-column">
                  <h4 class="issue-status-heading">Status</h4>
                  <p class="status-inprogress">submitted</p>
                </div>
               </div>
               <?php endforeach; ?>

</div>
</div>
</div>
</body>
</html>