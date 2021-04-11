<?php
require_once("includes/header.php");
//need to use id in link
if (!isset($_GET["id"])) {
    //class for error message
    ErrorMessage::show("NO ID was passed in url");
}

$entityId = $_GET["id"];
$entity = new Entity($con, $entityId);

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createPreviewVideo($entity);

$seasonProvider = new SeasonProvider($con, $userLoggedIn);
echo $seasonProvider->create($entity);

$categotyContainers = new  CategoryContainers($con, $userLoggedIn);
echo $categotyContainers->showCategory($entity->getCategoryId(), "You might also like");
