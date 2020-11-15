
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="./ok-index.php">Úvod</a></li>
        <li><a href="?page=blog-post1.html">První příspěvek</a></li>
        <li><a href="?page=blog-post2.html">Druhý příspěvek</a></li>
    </ul>
</nav>

Ale co třeba ručně zadat toto:
<ul>
  <li>../../webserver/README.md</li>
  <li>/etc/passwd</li>
</ul>

<?php

if (!empty($_GET["page"]) && preg_match("/^[a-z0-9-\.]+$/", $_GET["page"])) {
    include $_GET["page"];
} else {
   include "./main.html";
}
?>
</body>
</html>
