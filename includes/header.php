<?php
require_once("includes/config.php");
require("includes/classes/PreviewProvider.php");
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
    <script src="https://use.fontawesome.com/a17f9e8d57.js"></script>
    <script src="assets/js/script.js"></script>
</head>

<body>
    <div class='wrapper'>
    
    <!-- will be closed in index.php file -->