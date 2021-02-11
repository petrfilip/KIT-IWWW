<?php
include 'Connection.php';
include 'GalleryRepository.php';

if ($_POST) {
    $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
    $imageData = (file_get_contents($_FILES['fileToUpload']['tmp_name']) );
    GalleryRepository::insert($imageData, $imageFileType);
    header('Location: '.$_SERVER['PHP_SELF']);
    die;
}

?>

<style>
    img {
        margin: 10px;
        border: 1px solid #666666;
        object-fit: cover;
        width:230px;
        height:230px;
    }
</style>

<h1>File upload - DB</h1>


<form action="index.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php

foreach (GalleryRepository::getAll() as $item) {
    echo "<img src='data:image/".$item["image_format"].";base64,".base64_encode($item["image"])."' >";
}


?>
