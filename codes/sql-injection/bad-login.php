<h1>SQL injection</h1>

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
    $email = $_POST["loginMail"];
    $password = $_POST["loginPassword"];


    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PASSWORD);

    $query = "SELECT id, name, email FROM `users` WHERE email='" . $email . "' and password='" . $password . "' LIMIT 1";

    echo 'Dotaz do DB: <pre class="with-border">' . $query . '</pre>';

    $stmt = $conn->prepare($query);
    $stmt->execute();


    $user = $stmt->fetch();


    if (!empty($user)) {
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
  <input type="text" name="loginPassword" placeholder="Password">
  <input type="submit" value="Log in">
</form>

Injection values:
<pre>
' or ''='
</pre>

<pre>
' or ''='';
</pre>

<pre>
' or ''='' order by id desc;
</pre>

<pre>
' or ''='' order by id desc limit 1 offset 1;
</pre>

<pre>
' or ''='' UNION SELECT 0, concat(email,'-', password), 0 from users order by id limit 1 offset 1;
</pre>
<hr>
<a href="fixed-login.php">Opraveno</a>




