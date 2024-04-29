<?php
include(APP_ROOT . '/views/inc/security_side_nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/security_style.css'; ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body onload="randerDate()">
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
        <div class="acive-visitor-container">
            <div class="onsite-visitor-heading">
                Onsite Visitors
            </div>
            <div class="add-new-visitor">
                <a href="<?php echo URL_ROOT . '/securities/visitorAdd'; ?>" style="text-decoration: none; color: inherit;"><button class="add-btn"><i class="fa-solid fa-plus"></i> <b>Add</b></button></a>
            </div>

            <div class="table-body">
                <table>

                    <thead>
                        <tr class="onsite-visitor-head">
                            <th>Name</th>
                            <th>Host</th>
                            <th>Arrival</th>
                            <th>Departure</th>
                        </tr>
                    </thead>
                    <?php foreach ($data['visitors'] as $index => $visitor) : ?>
                        <tbody>
                            <tr>
                                <td><?php echo $visitor->fullName; ?></td>
                                <td><?php echo $visitor->hostName; ?></td>
                                <td><?php echo explode(':', $visitor->entryTime)[0] . ':' . explode(':', $visitor->entryTime)[1]; ?></td>
                                <td>
                                    <?php if ($visitor->exitTime == null) : ?>
                                        <form method="post" action="<?php echo URL_ROOT . '/securities/logVisitorDeparture/' . $visitor->visitor_id; ?>">
                                            <button value="submit" type="submit">Fetch Exit Time</button>
                                        </form>
                                    <?php else : ?>
                                        <?php echo explode(':', $visitor->exitTime)[0] . ':' . explode(':', $visitor->exitTime)[1]; ?>
                                    <?php endif; ?>
                                </td>
                            </tr>

                            <!-- Add more rows as needed -->
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>


        </div>
    </div>
</body>

</html>