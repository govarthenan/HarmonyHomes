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
            <div class="visitor-registration-heading">Visitor Registration</div>
            <form enctype="multipart/form-data" name="visitorForm" method="post" action="<?php echo URL_ROOT . '/securities/visitorAdd' ?>">
                <div class="visitor-reg-form-container">
                    <div class="visitor-form-1">
                        <div class="item">
                            <label for="fullName">Full Name *</label>
                            <input type="text" id="fullName" name="fullName" required>
                        </div>

                        <div class="item">
                            <label for="contactNumber">Contact Number</label>
                            <input type="tel" id="contactNumber" name="contactNumber">
                        </div>

                        <div class="item">
                            <label for="hostName">Host Name</label>
                            <input type="text" id="hostName" name="hostName">
                        </div>

                        <div class="item">
                            <label for="purposeOfVisit">Purpose of Visit</label>
                            <textarea id="purposeOfVisit" name="purposeOfVisit"></textarea>
                        </div>

                        <div class="item">
                            <label for="entryTime">Entry Time *</label>
                            <input type="time" id="entryTime" name="entryTime" required>
                        </div>
                    </div>
                    <div class="visitor-form-2">
                        <div class="item">
                            <label for="notes">Additional Notes</label>
                            <textarea id="notes" name="notes"></textarea>
                        </div>
                        <button type="submit" class="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>