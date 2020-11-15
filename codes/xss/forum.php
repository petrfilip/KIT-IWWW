<?php
session_start();

if ($_GET["action"] === "delete") {
    unset($_SESSION["messages"]);
    header("Location: ./forum.php");
}

if (!is_array($_SESSION["messages"])) {
    $_SESSION["messages"] = [];
}

if (!empty($_POST) && !empty($_POST["message"])) {
    array_push($_SESSION["messages"], $_POST["message"]);
    header("Location: ./forum.php");

}

?>
<h1>Diskusní fórum</h1>
<form method="post">
  <input type="text" name="message" placeholder="Napiš zprávu">
  <input type="submit">
</form>

<br>

<?php
foreach ($_SESSION["messages"] as $key => $message) {
//    echo $key . ' - ' . $message;
    echo htmlspecialchars($key . ' - ' . $message, ENT_QUOTES, 'UTF-8');
    echo '<br>';
}
?>


<a href="?action=delete">Smaž zprávy</a>

<pre>
    &lt;script&gt;alert('Takto vypadá javascript kód.');&lt;/script&gt;
</pre>


