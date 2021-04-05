<?php

require_once("includes/config.php");

require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");

require_once("includes/classes/Account.php");

$account = new Account($con);


if (isset($_POST["submitButton"])) {

    $userName = FormSanitizer::sanitizeFormUsername($_POST["username"]);

    $passowd = FormSanitizer::sanitizeFormPassword($_POST["password"]);

    //this is going to be true or false
    $success = $account->login($userName, $passowd);
    if ($success) {
        //store session variables in config file we put session start
        $_SESSION['userLoggedIn'] = $userName;

        header("Location: index.php");
    }
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

                <h3>Sign In</h3>
                <span>to continue to DavidFlix</span>

            </div>

            <form method="POST">
                <?php echo $account->getError(Constants::$loginFailed); ?>

                <input type="text" placeholder="Username" name="username" required>
                <input type="password" placeholder="Password" name="password" required>
                <input type="submit" value="SUBMIT" name="submitButton">




            </form>
            <a href="register.php" class="signInMessage">Don't have an account? Sign Up Here!</a>

        </div>

    </div>

</body>

</html>