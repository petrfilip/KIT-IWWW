
<h1>Nezabezpečený formulář</h1>
<form method="get">
    <input type="text" name="name" placeholder="your name">
    <input type="submit">
</form>

<br>

<?php
if (!empty($_GET["name"])) {
    echo "Hello " . ($_GET["name"]);
}

?>


<br>
<pre>
  <?=htmlspecialchars("<script>alert('Takto vypadá javascript kód.');</script>");?>
</pre>

<a href="?name=<script>alert('Toto je úspěšný XSS útok.');</script>">XSS basic</a>
<a href="./payment/?name=%3Cscript%3Ewindow.onkeyup+%3D+function+%28event%29+%7B+++++console.log%28event.key%29%3B+%7D%3B%3C%2Fscript%3E">XSS payment gateway</a>


