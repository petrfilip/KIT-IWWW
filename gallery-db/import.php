<?php
    echo <<<HEREDOC
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
<h1>Import example - JSON</h1>
</div>
<div id="main">

  <form action="import.php" method="post" enctype="multipart/form-data">
    Select file to import:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload import file" name="submit">
  </form>
HEREDOC;


if ($_POST) {
    // print_r(file_get_contents($_FILES['fileToUpload']['tmp_name'])); // string

    $items = json_decode(file_get_contents($_FILES['fileToUpload']['tmp_name']), true); // true => asocitivní pole místo třídy

    foreach ($items as $item) {
        echo "<img src='data:image/" . $item["image_format"] . ";base64," . ($item["image"]) . "' >";
    }
}
?>

<br>
<a href="export.php">Export to file</a> | <a href="./../gallery-db/index.php">File upload - DB</a>
</div>