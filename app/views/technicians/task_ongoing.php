<?php
include(APP_ROOT . '/views/inc/technician_sidenav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/technician_style.css' ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
<div class="main-content">
        <div class="fac-inventory-content">
            <div class="inventory_heading">
                <div>Ongoing Tasks</div>
            </div>

            <div class="table-body">

                <table>
                    <tr class="inventory_table_head">
                        <th>Task ID</th>
                        <th>Resident Address</th>
                        <th>Status</th>
                        <th>Update</th>
                        <th>View</th>

                    </tr>
             <form enctype="multipart/form-data" name="technicianForm" method="post" action="<?php echo URL_ROOT . '/technicians/updateStatus' ?>">
            <?php foreach ($data['ongoing'] as $index =>$new): ?>
                    <tr>
                    <td><?php echo $new->issue_id?></td>
                    <td><?php
                    $resident_id = $new->floor_number.'/'.$new->door_number;
                    echo $resident_id ?></td>
                   <td>
    <select name="status">
        <option value="ongoing" <?php $status=''; echo ($status == 'ongoing') ? 'selected' : ''; ?>>Ongoing</option>
        <option value="onhold" <?php echo ($status == 'onhold') ? 'selected' : ''; ?>>On Hold</option>
        <option value="finished" <?php echo ($status == 'finished') ? 'selected' : ''; ?>>Finished</option>
        <option value="other" <?php echo ($status == 'other') ? 'selected' : ''; ?>>Other</option>
    </select>
</td>
              <td><?php echo $new->status ?> </td>

                        <td><a href="<?php echo URL_ROOT. '/technicians/taskOngoingView'; ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"><button class="View-btn-ongoing">View</button></a>
                        <a href="<?php echo URL_ROOT . '/technicians/updateStatus/' . $new->issue_id; ?>" style="text-decoration: none; color: inherit;margin-left: 4%;">
                    <button type="submit" name="issue_id" value="<?php echo $new->issue_id; ?>" class="update-Button-ongoing">Update</button>
                </a> 
                <input type="hidden" name="issue_id" value="<?php echo $new->issue_id; ?>">                  
             </td>
                       
                    </tr>
                    <?php endforeach ?>
                </form>

                    
                    </tr>
                </table>

            </div>
</div>
    </div>


</body>
    
</body>
</html>