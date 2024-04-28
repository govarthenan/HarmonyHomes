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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="main-content">
        <div class="gm-signup-request-container">
            <div class="sign-up-request-heading">Sign Up Requests</div>
            <div class="table-body">
                <table>
                    <tr>
                        <th class="sign-up-request-heading-table">Name</th>
                        <th class="sign-up-request-heading-table">Resident ID</th>
                        <th class="sign-up-request-heading-table">Status</th>
                        <th class="sign-up-request-heading-table">Action</th>
                    </tr>

                    <?php foreach ($data['signup_requests'] as $request) : ?>

                        <tr>
                            <td><?php echo $request->name; ?></td>
                            <td><?php echo $request->floor_number . '/' . $request->door_number; ?></td>
                            <td><?php echo ($request->approved == '1') ? 'Approved' : 'Pending'; ?></td>
                            <td><a href="<?php echo URL_ROOT . '/generals/signUpRequestDetails/' . $request->user_id; ?>"><button class="viewButton">View</button></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.viewButton').click(function() {
                $(this).closest('tr').next('.description-row').toggle(); // Toggle the visibility of the next description row
            });
        });
    </script>
</body>

</html>