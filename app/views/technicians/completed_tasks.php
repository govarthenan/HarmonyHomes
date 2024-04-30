<?php
include (APP_ROOT . '/views/inc/technician_sidenav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/technician_style.css' ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <div class="main-content">
        <div class="fac-inventory-content">
            <div class="inventory_heading">
                <div>Completed Tasks</div>
            </div>

            <div class="table-body">

                <table>
                    <tr class="inventory_table_head">
                        <th>Date</th>
                        <th>Resident Floor</th>
                        <th>Resident Door</th>
                        <th>Title</th>
                        <th>View</th>

                    </tr>

                    <?php foreach ($data['completed'] as $index => $finish): ?>
                        <tr>
                            <td><?php echo $finish->Date ?></td>
                            <td><?php echo $finish->floor_number ?></td>
                            <td><?php echo $finish->door_number ?></td>
                            <td><?php echo $finish->Issuetype ?></td>
                            <td><button class="accept-btn">
                                <a href="<?php echo URL_ROOT . '/technicians/ViewCompletedTask/' . $finish->issue_id; ?>"
                                        style="text-decoration: none; color: inherit;margin-left: 4%;">View</button></a>
                            </td>
                        </tr>
                    <?php endforeach ?>


                </table>

            </div>
        </div>
    </div>


</body>