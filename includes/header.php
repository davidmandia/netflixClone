<?php
require_once("includes/config.php");
require_once("includes/classes/PreviewProvider.php");
require_once("includes/classes/CategoryContainers.php");
require_once("includes/classes/EntityProvider.php");
require_once("includes/classes/ErrorMessage.php");
require_once("includes/classes/SeasonProvider.php");
require_once("includes/classes/Season.php");
require_once("includes/classes/Video.php");
require_once("includes/classes/videoProvider.php");
require_once("includes/classes/User.php");




require("includes/classes/Entity.php");


if (!isset($_SESSION["userLoggedIn"])) {
    header("Location: register.php");
}

$userLoggedIn = $_SESSION["userLoggedIn"];


?>

<!DOCTYPE html>
<html>

<head>
    <title>Welcome to DavidFlix</title>
    <link rel="stylesheet" type="text/css" href="assets/style/style.css" />


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/019317da42.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="assets/js/script.js"></script>
</head>

<body>
    <div class='wrapper'>
       

    <?php
    //if we do not want nav bar we need to assign a value to var hidenav
    if(!isset($hideNav)) {
        include_once("includes/navbar.php");
    }

?>

        <!-- will be closed in index.php file -->