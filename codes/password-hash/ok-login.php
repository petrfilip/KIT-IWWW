<h1>Bindované parametry</h1>
<style>

  .with-border {
    padding: 10px;
    border: 1px solid gray;
  }

  pre {
    white-space: normal;

  }
</style>
<?php

define('DB_HOST', 'iwww-db');
define('DB_USER', 'user');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'db_dev');


if (!empty($_POST) && !empty($_POST["loginMail"]) && !empty($_POST["loginPassword"])) {
    $email = $_POST["loginMail"]; // todo validace emailu :: https://www.w3schools.com/php/func_filter_var.asp
    $password = $_POST["loginPassword"]; // todo zde by měly být minimální požadavky na heslo (například přes regex)

    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PASSWORD);
    $query = "SELECT id, name, email, password FROM `fixed-users` WHERE email=:email LIMIT 1";

    echo 'Dotaz do DB: <pre class="with-border">' . $query . '</pre>';

    $stmt = $conn->prepare($query);
    $stmt->bindValue(':email', $email);
    $stmt->execute();


    $user = $stmt->fetch();

    $passwordMatchingResult = password_verify($password, $user["password"]);


    if (!empty($user) && !$passwordMatchingResult) {
        echo "Uživatel <b>" . $user["name"] . "</b> nalezen, ale nepovedlo se ověřit heslo.: ";
    } else if (!empty($user) && $passwordMatchingResult) {
        echo "Přihlášený uživatel <b>" . $user["name"] . "</b>, hurá.: ";
    } else {
        echo "Uživatel pod s e-mailem " . $_POST["loginMail"] . " nenalezen";
        // takovou informaci určitě nedávejte - je lepší napsat, že se přihlášení nepovedlo
        // útočním by mohl zkoušet, které emaily máte v systému
    }

} else if (!empty($_POST)) {
    echo "Username and password are required";
}

?>


<form method="post">
  <input type="text" name="loginMail" placeholder="Insert your email">
  <input type="password" name="loginPassword" placeholder="Password">
  <input type="submit" value="Log in">
</form>


Injection values:
<pre>
' or ''='
</pre>

<hr>
<a href="bad-login.php">S SQL chybou</a>

