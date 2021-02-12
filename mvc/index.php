<?php
require 'Connection.php';
require './view/Template.php';
require './model/GalleryModel.php';
require './controller/GalleryController.php';
?>
<?php
$controllerName = $_GET["controller"] ? (ucfirst($_GET["controller"] . "Controller")) : ("GalleryController");
$methodName = $_GET["method"] ?? "getAll";

$controllerInstance = new $controllerName();
$content = $controllerInstance->{$methodName}();
?>


<link rel="stylesheet" href="./../main.css">
<style>
    img {
        margin: 10px;
        border: 1px solid #666666;
        object-fit: cover;
        width: 230px;
        height: 230px;
    }
</style>

<div id="sidebar">
  <h1>MVC</h1>
  <nav>
    <a href="?controller=gallery&method=getAll">List photos</a>
    <a href="?controller=gallery&method=addPhoto">Add photo</a>
  </nav>
</div>

<div id="main">
    <?php echo $content; ?>
</div>