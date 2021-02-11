<?php
include 'Connection.php';
include 'GalleryRepository.php';

if ($_POST) {
    $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
    $imageData = (file_get_contents($_FILES['fileToUpload']['tmp_name']));
    GalleryRepository::insert($imageData, $imageFileType);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die;
}

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
  <h1>File upload - DB</h1>
</div>

<div id="main">
  <form action="index.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
  </form>

  <h2>Gallery</h2>

    <?php

    foreach (GalleryRepository::getAll() as $item) {
        echo "<img src='data:image/" . $item["image_format"] . ";base64," . base64_encode($item["image"]) . "' >";
    }

    ?>
  <br>
  <a href="export.php">Export to file</a> | <a href="./../gallery-fs/index.php">File upload - FS</a>
</div>