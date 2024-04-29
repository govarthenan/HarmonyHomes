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
                        <th>Resident Id</th>
                        <th>Staus</th>
                        <th>View</th>

                    </tr>
                    <tr>
                        <td>I01</td>
                        <td>2</td>
                        <td>Ongoing</td>
                        <td><button class="View-btn-ongoing">View</button>
                        <a href="<?php echo URL_ROOT. '/technicians/taskOngoingView'; ?>" style="text-decoration: none; color: inherit;margin-left: 4%;"><button class="update-Button-ongoing" > Update</button></a>
                    </td>
                    </tr>

                    
                    </tr>
                </table>

            </div>
</div>
    </div>


</body>
    
</body>
</html>