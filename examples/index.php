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

    function only_files($dir_element)
    {
        if (!is_dir($dir_element)) {
            return $dir_element;
        }
    }

    $files = array_diff(scandir("."), array(".", "..", "index.php"));
    ?>
  <nav>
      <?php
      $i = 1;
      foreach ($files as $key => $file) {
          if (empty(pathinfo($file)["extension"])) {
              continue;
          }

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
    <a href="https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch">Using Fetch</a>
    <a href="https://restfulapi.net/">REST API Tutorial</a>
    <a href="https://denic.hashnode.dev/use-consolelog-like-a-pro">Use console.log</a>
  </nav>

</div>
<div id="main">
    <?php

    if (!empty($_GET["page"]) && preg_match("/^[a-z0-9-\.]+$/", $_GET["page"])) {
        include $_GET["page"];
    } else {
        echo '<h1>JavaScript na webu <br>& načítání dat ze serveru</h1>';
    }

    ?>
</div>
</body>
</html>