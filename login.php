<?php
if (isset($_POST["submitButton"])) {
    echo "form Submitted";
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
                <input type="text" placeholder="Username" name="username" required>
                <input type="password" placeholder="Password" name="password" required>
                <input type="submit" value="SUBMIT" name="submitButton">




            </form>
            <a href="register.php" class="signInMessage">Don't have an account? Sign Up Here!</a>

        </div>

    </div>

</body>

</html>