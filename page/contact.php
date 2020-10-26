<?php


$servername = "iwww-db";
$username = "user";
$password = "password";
$db = "db_dev";


if ($_POST) {
    if (empty($_POST["userName"])) {
        $validation["username"] = "Username je prázdný";
    }

    if (count($validation) == 0) {

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";


            $userName = $_POST["userName"];
            $email = $_POST["email"];
            $message = $_POST["message"];

            $sql = "INSERT INTO iwww (name, email, message) VALUES (:userName, :email, :message)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':userName', $userName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);


            $stmt->execute();
            echo "New record created successfully";

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    } else {
        print_r($validation);
    }
}


?>

<section class="centeredContentWrapper" style="width: 400px">

  <form action="/index.php?page=contact" method="post">

    <div class="row">
      <label>Jméno:</label>
      <input name="userName" type="text">
    </div>
    <div class="row">
      <label>Email:</label>
      <input name="email" type="email">
    </div>
    <div class="row">
      <label>Oblíbená barva:</label>
      <select name="favouriteColor">
        <option>Zelená</option>
        <option>Červená</option>
      </select>
    </div>

    <div class="row">
      <label>Zpráva:</label>
      <textarea name="message"></textarea>
    </div>

    <div class="row">
      <label></label>
      <input type="submit">
    </div>
  </form>


</section>