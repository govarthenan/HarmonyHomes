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


<body>
    <div class="main-content">
        <div class="gm-complaint-content">
            <div class="complaint-heading"> Complaints Overview</div>

            <!-- display complaints if there are more than one -->
            <?php if (!empty($data['complaints'])) : ?>
                <!-- show header row -->
                <div class="table-body">
                    <table>
                        <tr class="complaint-table-head">
                            <th>ID</th>
                            <th>Resident Name</th>
                            <th>Complaints</th>
                            <th>Date</th>
                            <th>View</th>
                        </tr>

                        <!-- show complaints one by one -->
                        <?php foreach ($data['complaints'] as $index => $complaint) : ?>
                            <tr>
                                <td><?php echo $complaint->complaint_id; ?></td>
                                <td><?php echo $complaint->name; ?></td>
                                <td><?php echo $complaint->subject; ?></td>
                                <td><?php echo $complaint->created_date; ?></td>
                                <td><button class="viewButton"><a href="<?php echo URL_ROOT . '/generals/complaintDetails/' . $complaint->complaint_id; ?>">View</a></button></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php else : ?>
                <!-- ToDO: improve error message -->
                <p>No complaints found</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>