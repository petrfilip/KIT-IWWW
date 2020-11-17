<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>JavaScript ukázky</title>
  <link rel="stylesheet" href="./../main.css">
</head>
<body>
<div id="sidebar">
  <h1>JavaScript ukázky</h1>

    <?php
    $files = array_diff(scandir("."), array(".", "..", "index.php"));
    ?>
  <nav>
      <?php
      $i = 1;
      foreach ($files as $key => $file) {
          $updatedFileName = substr($file, 0, strrpos($file, "."));
          $updatedFileName = str_replace("-", " ", $updatedFileName);
          $updatedFileName = substr($updatedFileName, 3);


          echo '<a href="?page=' . $file . '">' . $i . ' - ' . $updatedFileName . '</a>';
          $i++;
      }
      ?>
  </nav>
  <hr>

  <nav>
    <a href="https://caniuse.com/">Can I use</a>
    <a href="https://medium.com/@nickfleischhauer/es5-vs-es2015-es6-pt-1-differences-between-var-let-and-const-a26ef4bf185a">ES5 vs ES2015(ES6)</a>
  </nav>

</div>
<div id="main">
    <?php

    if (!empty($_GET["page"]) && preg_match("/^[a-z0-9-\.]+$/", $_GET["page"])) {
        include $_GET["page"];
    } else {
        echo '<h1>Tutorial JavaScript na webu</h1>';
    }

    ?>
</div>
</body>
</html>