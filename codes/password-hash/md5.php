
<h1>MD5</h1>
<?php
$hashed = md5($_GET["pass"]);
echo 'MD5 hash pro řetězec "' . $_GET["pass"] . '": ' . $hashed;
//rainbow tables - hashe pro všechny kombinace

echo '<br>';
echo 'Mrknout se na <a href="https://www.google.com/search?q=' . $hashed . '">google</a>.';
?>


<h1>Hashuj</h1>
<form method="get">
  <label>
    Co ti mám zaheshovat:
    <input type="text" name="pass">
  </label>
  <input type="submit">
</form>

<hr>
<a href="bcrypt.php">Ukázka BCRYPT</a>


