<?php
session_start();

if ($_GET["action"] === "delete") {
    unset($_SESSION["notes"]);
    header("Location: ./index.php");
}

if (!is_array($_SESSION["notes"])) {
    $_SESSION["notes"] = [];
}

if (!empty($_POST) && !empty($_POST["message"])) {
    array_push($_SESSION["notes"], $_POST["message"]);
    header("Location: ./index.php");

}

?>
<h1>Osobní poznámky - session stealing</h1>
<form method="post">
    <input type="text" name="message" placeholder="Napiš poznámku">
    <input type="submit">
</form>

<br>

<?php
foreach ($_SESSION["notes"] as $key => $message) {
    echo $key . ' - ' . $message;
//    echo htmlspecialchars($key . ' - ' . $message, ENT_QUOTES, 'UTF-8');
    echo '<br>';
}
?>

<br>
<a href="?action=delete">Smaž poznámky</a>

<!--<script>console.log(document.cookie)</script>-->

<pre id="cookie">
</pre>
<script>
  document.getElementById("cookie").innerHTML = document.cookie;
</script>


<hr>
Předchozí stránka <?=$_SERVER['HTTP_REFERER']?>


