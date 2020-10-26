<?php
function __autoload($class) {
    require_once  './classes/' . $class .'.php';
}
session_start();
ob_start();
if ($_POST["password"] == "heslo") {
    $_SESSION["isLogged"] = true;
    $_SESSION["loggedUser"] = "your@email.com";
}

if ($_GET["page"] == "logout") {
    $_SESSION = [];
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cestovatelský blog</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/responsive-menu.css">
  <link rel="stylesheet" href="css/responsive-menu.css">
  <link rel="stylesheet" href="css/responsive-content.css">
  <link rel="stylesheet" href="css/responsive-print.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/experiments.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/logo.css">
</head>
<body>

<?php
// vykreslení menu
include "menu.php";
?>
<div id="content">
<?php

FlashMessages::displayAllMessages();

# vykreslení obsahu
$pathToFile = "./page/" . $_GET["page"] . ".php";
if (file_exists($pathToFile)) {
    include $pathToFile;
} else {
    include "./page/main.php";
}
?>
</div>
<?php
/*
 * vykreslení patičky
 */
include "footer.php";
?>


</body>
</html>