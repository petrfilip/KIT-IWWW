<section class="centeredContentWrapper" style="width: 400px">


    <?php

    $controller = new BlogPostController();
    if ($_GET["action"] == "addForm") {
        $controller->addForm();
    } else if ($_GET["action"] == "addProcess") {
        $controller->addProcess();
    } else if ($_GET["action"] == "detail" && !empty($_GET["id"])) {
        $controller->detail($_GET["id"]);
    }  else {
        $controller->listAllInTable();
    }
    ?>


</section>