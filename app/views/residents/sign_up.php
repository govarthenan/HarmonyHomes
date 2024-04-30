<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up - Harmony Homes</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/style.css'; ?>" />
</head>

<body>
    <div class="main-container-sign-up">
        <?php
        // flash
        flash('erro_missing_signup_data');
        flash('error_signup_validation');
        flash('error_signup');
        ?>
        <div class="company-profile-sign-up">
            <img src="<?php echo URL_ROOT . '/resources/common/company-logo-small.png' ?>" class="logo-sign-up">
            <div class="company-name-sign-up">Harmony Homes</div>
        </div>
        <div class="sign-up-img">
            <img src="<?php echo URL_ROOT . '/resources/sign_up/Sign up.svg' ?>" class="sign-up-image">
        </div>
        <div class="sign-up-container">
            <div class="sign-up-message">Sign up to become a member of our residence management system...</div>
            <form action="<?php echo URL_ROOT; ?>/residents/signUp" method="post" enctype="multipart/form-data" class="registration-form">
                <div class="sign-up-input-container">
                    <div class="sign-up-left">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="phone">Phone Number (In 94771234567 format):</label>
                        <input type="tel" id="phone" name="phone" required>

                        <label for="birthday">Birthday:</label>
                        <input type="date" id="birthday" name="birthday" required>

                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" required>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Other</option>
                        </select>

                        <label for="floorNumber ">Floor Number:</label>
                        <input type="text" id="floorNumber" name="floor_number" required>

                        <label for="doorNumber">Door Number:</label>
                        <input type="text" id="doorNumber" name="door_number" required>

                        <label for="nic">NIC:</label>
                        <input type="text" id="nic" name="nic" required>

                        <div class="file-upload-wrapper">
                            <label for="nicPhoto">Photo of NIC:</label>
                            <button type="button" onclick="document.getElementById('nicPhoto').click()" class="custom-file-upload">Choose File</button>
                            <span id="nicPhotoName">No file chosen</span>
                            <input type="file" id="nicPhoto" name="nic_photo" accept="image/*" required style="display: none;">
                        </div>

                        <div class="file-upload-wrapper">
                            <label for="agreementPhoto">Photo of Agreement Document:</label>
                            <button type="button" onclick="document.getElementById('agreementPhoto').click()" class="custom-file-upload">Choose File</button>
                            <span id="agreementPhotoName">No file chosen</span>
                            <input type="file" id="agreementPhoto" name="agreement_photo" accept="image/*" required style="display: none;">
                        </div>
                    </div>
                    <div class="sign-up-bottom">
                        <label for="password">Enter Password:</label>
                        <input type="password" id="password" name="password" required>

                        <label for="confirmPassword">Confirm Password:</label>
                        <input type="password" id="confirmPassword" name="confirm_password" required>

                        <label class="agree">
                            <input type="checkbox" name="terms" required><span>I agree to the Terms and Conditions</span>
                        </label>

                        <button type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="<?php echo URL_ROOT . '/js/index.js'; ?>"></script>

</body>

</html>