<?php
require_once("includes/config.php");

require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");

require_once("includes/classes/Account.php");



$account = new Account($con);





if (isset($_POST["submitButton"])) {
    $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
    $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);

    $userName = FormSanitizer::sanitizeFormString($_POST["username"]);
    $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
    $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);

    $passowd = FormSanitizer::sanitizeFormPassword($_POST["password"]);
    $passowd2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

    $account->validateFirstName($firstName);
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Welcome to DavidFlix</title>
    <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
</head>

<body>
    <div class="signInContainer">

        <div class="column">


            <div class="header">
                <img src="assets/images//8c63c84e0ddcb9df7e7b598a09f54af5.png" title="Logo" alt="Site Logo" />

                <h3>Sign Up</h3>
                <span>to continue to DavidFlix</span>

            </div>

            <form method="POST">

                <?php echo $account->getError(Constants::$firstNameCharacter); ?>
                <input type="text" placeholder="First Name" name="firstName" required>


                <input type="text" placeholder="Last Name" name="lastName" required>


                <input type="text" placeholder="Username" name="username" required>


                <input type="email" placeholder="email" name="email" required>


                <input type="email" placeholder="Confirm Email" name="email2" required>


                <input type="password" placeholder="Password" name="password" required>


                <input type="passowrd" placeholder="Confirm Password" name="password2" required>


                <input type="submit" value="SUBMIT" name="submitButton">

            </form>
            <a href="login.php" class="signInMessage">Already have an account? Sign in here!</a>

        </div>

    </div>

</body>

</html>