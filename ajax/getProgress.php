<?php
require_once("../includes/config.php");

if (isset($_POST["videoId"]) && isset($_POST["username"])) {
    $query = $con->prepare("SELECT progress FROM videoProgress
                            WHERE username=:username AND videoId=:videoId");
    $query->bindValue(":username", $_POST["username"]);
    $query->bindValue(":videoId", $_POST["videoId"]);
    $query->execute();

    //echo not returning because ajax will pass evrything is echoed not returned

    //if only a value
    echo $query->fetchColumn();
} else {
    echo "No videoId or Username passed";
}
