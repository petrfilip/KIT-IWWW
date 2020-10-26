<?php


class BlogPostController
{

    public function addProcess()
    {

        $_SESSION["messages"] = array();

        if ($_POST) {
            if (empty($_POST["heading"])) {
                FlashMessages::error("Není vyplněn nadpis");
            }

            if (empty($_POST["text"])) {
                FlashMessages::error("Není vyplněn text");
            }

            if (empty($_FILES["image"])) {
                FlashMessages::error("Není vyplněn obrázek");
            }


            if (FlashMessages::containsError()) {
                header("Location: /index.php?page=experiments&action=addForm");
                exit;
            }

            $pathToFile = FileUpload::upload("./img/", "image");
            echo $pathToFile;

            if (!empty($_SESSION["messages"])) {
                print_r($_SESSION["messages"]);
                return;
            }


            if (BlogPostRepository::save($_POST["heading"], $_POST["text"], $pathToFile)) {
                FlashMessages::info("Úspěšně uloženo");
                header("Location: /index.php?page=experiments");
                exit;
            }
        }

    }

    public function addForm()
    {
        echo '<form method="post" action="/index.php?page=experiments&action=addProcess" enctype="multipart/form-data">';
        echo '<input type="text" name="heading" placeholder="Titulek">';
        echo '<input type="file" name="image" placeholder="Obrázek">';
        echo '<textarea name="text" placeholder="Sem napiš text"></textarea>';
        echo '<input name="submit" type="submit">';
        echo '</form>';
    }

    public function listAllInTable()
    {
        echo '<a href="/index.php?page=experiments&action=addForm">Přidej</a>';
        $dataTable = new DataTable(BlogPostRepository::getAll());
        $dataTable->addColumn("heading", "Titulek");
        $dataTable->addColumn("read_counter", "Počet přečtení");
        $dataTable->render();
    }

    public function detail($id) {
        $item = BlogPostRepository::getOneById($id);
        echo '<h1>'.$item["heading"].'</h1>';
        echo '<div>'.$item["read_counter"].'</div>';
        BlogPostRepository::increaseReadCounter($id);

    }

}