<div id="menu">
  <div id="logo"></div>

  <label for="hamburger">&#9776;</label>
  <input type="checkbox" id="hamburger"/>

  <nav>
    <a href="index.php">Úvod</a>
    <a href="index.php?page=experiments">Články</a>
    <a href="index.php?page=contact">Kontakt</a>
      <?php
      if ($_SESSION["isLogged"]) {
          echo '<a href="index.php?page=messageList">Zprávy</a>';
          echo '<a href="index.php?page=logout">Odhlásit</a>';
          echo '<span style="color: white">Your email:' . $_SESSION["loggedUser"] . '</span>';
      } else {
          echo '<a href="index.php?page=login">Přihlásit</a>';
      }
      ?>
  </nav>
</div>