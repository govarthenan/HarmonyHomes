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
                
                <div class="issue_log">
                
                <img src="<?php echo URL_ROOT . '/resources/generals/hand-held-tablet-writing.svg' ?>"class="new-announcement-img" />
                    <a href="<?php echo URL_ROOT . '/facilities/fmIssueLog' ?>" style="text-decoration: none;"><span class="announcement-type-title">Issues log</span></a>

                </div>
                <div class="completed_issue">
                <img src="<?php echo URL_ROOT . '/resources/generals/hand-held-tablet-writing.svg' ?>"class="new-announcement-img" />
                  <span class="issue-log-type-title">Completed Issues</span>
                </div>
            </div>
            <div class="table-body">
      
    <table>
                           <tr class="issue-table-head">
                            <th>Date</th>
                            <th>Resident ID</th>
                            <th>Issue</th>
                            <th>Technician</th>
                            <th>View</th>
                            </tr>
                            <?php foreach ($data['completedIssues'] as $index => $issue) : ?>
                            <tr>
                                <td><?php echo $issue->Date; ?></td>
                                <td><?php echo $issue->door_number; ?></td>
                                <td><?php echo $issue->Issuetype; ?></td>
                                <td><?php echo ($issue->fname." ".$issue->lname); ?></td>
                                <td>
                                    <button class="facIssueButton">
                                    <a href="<?php echo URL_ROOT . '/facilities/fmIssueCompleteView/' .$issue->issue_id; ?>" style="text-decoration: none;"><span class="announcement-type-title">View</span></a>
                                    </button></td>
                            </tr>
                            <?php endforeach; ?>

                             
                           

                             
                            
                          </table>
        
    </div>
    </div>   
</div>
</div>
    <body>
</html>