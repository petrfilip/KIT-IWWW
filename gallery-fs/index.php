<?php
include 'Connection.php';
include 'GalleryRepository.php';
include 'FileUpload.php';

/**
 * Na co si dát pozor:
 * - adresář musí mít správně nastavená práva
 * - název souboru v adresáři musí být unikátní
 */
if ($_POST) {
    $pathToFile = FileUpload::upload("./img/", "fileToUpload");
    GalleryRepository::insert($pathToFile);
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
  <h1>File upload - FS</h1>
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
        echo "<img src='" . $item["path_to_image"] . "' /> ";
    }
    ?>

  <br>
  <a href="./../gallery-db/index.php">File upload - DB</a>

</div>
