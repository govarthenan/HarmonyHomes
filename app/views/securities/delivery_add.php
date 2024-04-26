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
        <div class="visitor-container">
            <div class="visitor-registration-heading">Delivery Notification Form</div>
            <form enctype="multipart/form-data" name="deliveryInfo" method="post" action="<?php echo URL_ROOT . '/securities/deliveryAdd' ?>">
                <div class="visitor-reg-form-container">
                    <div class="visitor-form-1">
                        <div class="item">
                            <label for="apartmentNumber">Apartment Number: </label>
                            <input type="text" id="apartmentNumber" name="apartmentNumber" required>
                        </div>

                        <div class="item">
                            <label for="residentName">Resident Name:</label>
                            <input type="text" id="residentName" name="residentName" required>
                        </div>

                        <div class="item">
                            <label for="contactNumber">Contact Number: </label>
                            <input type="tel" id="contactNumber" name="contactNumber">
                        </div>

                        <div class="item">
                            <label for="courierService">Courier Service:</label>
                            <input type="text" id="courierService" name="courierService" required>
                        </div>

                        <div class="item">
                            <label for="notes">Additional Notes</label>
                            <textarea id="notes" name="notes"></textarea>
                        </div>

                        <div class="item">
                            <label for="location">Storage Location: </label>
                            <input type="text" id="location" name="location" required>
                        </div>
                    </div>
                    
                        
                        <button type="submit" class="submit">Submit</button>
                   
                </div>
            </form>
        </div>
    </div>
</body>

</html>