<section class="centeredContentWrapper" style="width: 400px">
    <?php
    $isLogged = $_SESSION["isLogged"];

    if (!$isLogged) {
        echo "Nejsi přihlášen!! Přihlaš se do aplikace!";
        include "login.php";
        exit;
    }




    try {

        $conn = $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare("SELECT * FROM iwww ORDER BY id DESC");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $dataset = $stmt->fetchAll();

        $dataTable = new DataTable($dataset);
        $dataTable->addColumn("name", "Jméno");
        $dataTable->addColumn("email", "Email");
        $dataTable->render();


    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    echo "</table>";

    ?>

</section>