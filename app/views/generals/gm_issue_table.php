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
    <div class="fac-issue-content">
      <div class="issue-heading"> Issues Overview</div>
    <div class="table-body">
      
    <table>
                           <tr class="issue-table-head">
                            <th>Date</th>
                            <th>Resident ID</th>
                            <th>Issue</th>
                            <th>Technician</th>
                            <th>Mark As Read</th>
                            </tr>
                            <?php foreach ($data['issue'] as $index =>$issues):?>
                            <tr>
                                <td><?php echo $issues->Date ?></td>
                                <td><?php
                                $resident_id = $issues->floor_number."/".$issues->door_number;
                                echo $resident_id ?></td>
                                <td><?php echo $issues->subject ?></td>
                                <td><?php echo $issues->first_name ?></td>
                                <td><a href="<?php echo URL_ROOT.'/generals/deleteIssue/'.$issues->issue_id?>"><button class="assignButton"><i class="fa-solid fa-check"></i></button></a></td>
                             </tr>
                             <?php endforeach ?>

                          
                          </table>
            
    </div>
    </div>
  </body>
</html>
