<?php
require_once "../includes/config_session.php";
require_once "../includes/signup_view.php";
require_once "../includes/signin_view.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Animated Login Page</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form class="form-up" action="../includes/signup.php" method="post" name="sign-up">
                <h1 style="margin-bottom: 20px;">Create Account</h1>

                <div class="form-element">
                    <input type="text" id="Name" name="Name" placeholder="username" />
                    <?php
                    check_signup();
                    ?>
                    <span id="name-error" class="error-message"></span>
                </div>
                <div class="form-element">
                    <input type="text" id="Email" name="Email" placeholder="Email" />
                    <span id="email-error" class="error-message"></span>
                </div>

                <div class="form-element">
                    <input type="tel" id="phone" name="phone" placeholder="Phone number ">
                    <span id="phone-error" class="error-message"></span>
                </div>

                <div class="form-element">
                    <select id="item" name="item" required>
                        <option value="" disabled selected hidden>--Select your role--</option>
                        <option value="Member">Member</option>
                        <option value="Owner">Owner</option>
                        <option value="Trainer">Trainer</option>

                    </select>
                </div>

                <div class="form-element">
                    <input type="number" id="age" name="age" placeholder="Your age " />
                    <span id="age-error" class="error-message"></span>
                </div>

                <div class="form-element">
                    <input type="password" id="password" name="pwd" placeholder="Password" />
                    <span id="password-error" class="error-message"></span>
                </div>


                <button type="submit">Sign up </button>

            </form>
        </div>

        <div class="form-container sign-in">
            <form class="form-in" action="../includes/signin.php" method="post">
                <h1 style="margin-bottom: 20px;">Sign In</h1>

                <div class="form-element">
                    <input type="text" id="signin-email" name="email" placeholder="Email" />
                    <?php
                    check_signin();
                    ?>
                    <span id="signin-email-error" class="error-message"></span>
                </div>

                <div class="form-element">
                    <input type="password" id="signin-password" name="psw" placeholder="Password" />
                    <span id="signin-password-error" class="error-message"></span>
                </div>

                
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>

                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/login.js"></script>

</body>

</html>