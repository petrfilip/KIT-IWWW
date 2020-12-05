<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>JavaScript ukázky</title>
  <link rel="stylesheet" href="../main.css">
  <style>

    img[src*="#300"] {
      width: 300px;
    }


  </style>
</head>
<body>
<div id="sidebar">
  <h1>Přístup uživatelů</h1>

    <?php

    $files = array_diff(scandir("."), array(".", "..", "index.php", "default.html"));
    ?>
  <nav>
    <a href="./">Úvod</a>
    <a href="?page=01-logged-in.md">0 - Přihlášen/Nepřihlášen</a>
    <a href="?page=01-user-one-exact-role.md">1 - Shoda role</a>
    <a href="?page=02-level-access.md">2 - Minimální úroveň</a>
    <a href="?page=03-task-per-user.md">3 - Individuální oprávnění</a>
    <a href="?page=04-task-per-roles.md">4 - Role na úlohu</a>
    <a href="?page=10-comparison.md">Porovnání</a>
    <a href="?page=10-context-permission.md">Kontextová práva</a>
  </nav>
  <hr>

  <nav>
    <a href="https://doc.nette.org/cs/3.0/access-control">Nette</a>
    <a href="https://restfulapi.net/">REST API Tutorial</a>
    <a href="https://denic.hashnode.dev/use-consolelog-like-a-pro">Use console.log</a>
  </nav>

</div>
<div id="main">
    <?php
    $page = $_GET["page"];

    if (!empty($page) && preg_match("/^[a-z0-9-\.]+$/", $page)) {
        if (pathinfo($page)["extension"] === "md") {
            require_once './../Parsedown.php';
            $Parsedown = new Parsedown();
            echo $Parsedown->text(file_get_contents($page));
        } else {
            include $page;
        }
    } else {
        require_once './../Parsedown.php';
        $Parsedown = new Parsedown();
        echo $Parsedown->text(file_get_contents('00-intro.md'));
    }
    ?>
</div>

<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.0/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.0/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

</body>
</html>