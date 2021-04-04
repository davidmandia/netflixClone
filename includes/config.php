<?php

    ob_start(); // Turns on output buffering, it tells to wait for all php code to be executed before outputting it
    session_start(); //can use session in our code to save values, if user logged


    date_default_timezone_set("Europe/London");


    try {
        $con = new PDO("mysql:dbname=davidflix;host=localhost:3307", "root", "secret");
        //output the error to 
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        
    } catch (PDOException $e) {
        exit("Connection failed: ". $e->getMessage());
    }
