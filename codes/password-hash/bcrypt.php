<h1>BCrypt</h1>
<?php

echo 'Vstup z formuláře: ';
print_r($_POST);
echo '<br>';
// takto to máte uložené v databázi!!!
// zaheshovaný řetězec "heslo"
$heslo = '$2y$10$xGILJ8GUIwDg/sVy0dVZCeodGmmHQ2O6UrQ1QBL4ohFk.a04S2RAK';

echo 'Hash řetězce "heslo" přes BCRYPT: <b>' . $heslo . '</b>';
echo '<br>';


$hashed_password = password_hash($_POST["pass"], PASSWORD_BCRYPT); // má vždy 60 znaků
echo 'Hash vstupu "'.$_POST["pass"].'": <b>' . $hashed_password . '</b>';

echo '<br>';
if (password_verify($_POST["pass"], $heslo)) {
    echo '<span style="color: green">Password is valid!</span>';
} else {
    echo '<span style="color: red"> Invalid password.</span>';
}


?>

<h1>Změn heslo</h1>
<form method="post">
    <input type="text" name="pass"> <input type="submit">
</form>

<hr>

<a href="md5.php">Ukázka MD5</a>
