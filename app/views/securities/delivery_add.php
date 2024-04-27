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
</head>

<body onload="randerDate()">
    <div class="main-content">
        <div class="delivery-container">
            <div class="visitor-registration-heading">Delivery Notification Form</div>
            <form enctype="multipart/form-data" name="deliveryInfo" method="post" action="<?php echo URL_ROOT . '/securities/deliveryAdd' ?>">
                <div class="delivery-reg-form-container">
                    <div class="visitor-form-1">
                        <div class="item">
                            <label for="doorNumber">Door Number: </label>
                            <input type="text" id="doorNumber" name="doorNumber" required>
                        </div>

                        <div class="item">
                            <label for="floorNumber">Floor Name:</label>
                            <input type="text" id="floorNumber" name="floorNumber" required>
                        </div>

                        <div class="item">
                            <label for="notes">Notes: </label>
                            <input type="text" id="notes" name="notes">
                        </div>
                    </div>
                    
                        
                        <button type="submit" class="submit">Send Notification</button>
                   
                </div>
            </form>
        </div>
    </div>
</body>

</html>