<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . '/css/style.css'; ?>" />
</head>

<body>
    <div class="main-container-sign-in">
        <div class="sign-in-container">
            <div class="sign-in-image-container">
                <img src="<?php echo URL_ROOT . '/resources/login/login-bro.svg' ?>" class="sign-in-container-company-logo">
            </div>
            <div class="sign-in-form-container">
                <div class="login-form">
                    <div class="company-profile">
                        <img src="<?php echo URL_ROOT . '/resources/common/company-logo-small.png' ?>" class="logo-sign-in">
                        <div class="company-name-sign-in">Harmony Homes</div>
                    </div>
                    <?php flashMessage('signUp_success'); ?>
                    <form action="<?php echo URL_ROOT . '/staffs/signIn'; ?>" method="post" class="login-form">
                        <div class="sign-in-form-group">
                            <label for="username">Email:</label>
                            <input type="text" id="username" name="email" required>
                        </div>
                        <div class="sign-in-form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        
                        <div class="sign-in-form-group">
                            <label for="role">Role:</label>
                            <select id="items" name="role" required>
                                <option value="general">Genaral Manager</option>
                                <option value="finance">Finance Manager</option>
                                <option value="facility">Facility Manager</option>
                                <option value="security">Security</option>
                                <option value="technician">Technician</option>
                            </select>
                        </div>

                        <div class="sign-in-form-group forgot-password">
                            <a href="/forgot-password">Forgot Password?</a> <!-- ToDo: update link and implement functionality -->
                        </div>
                        <button type="submit" class="btn-login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>