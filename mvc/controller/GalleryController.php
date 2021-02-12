<?php


class GalleryController
{
    public function getAll()
    {
        $data = GalleryModel::getAllPaged(4, $_GET["offset"] ?? 0);
        $template = new Template("gallery", "getAll");
        return $template->render(['photos' => $data]);
    }

    public function addPhoto()
    {
        $template = new Template("gallery", "add");
        return $template->render();
    }

    public function addPhotoProcessing()
    {
        if ($_POST) {
            $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
            $imageData = (file_get_contents($_FILES['fileToUpload']['tmp_name']));
            GalleryModel::insert($imageData, $imageFileType);
            Template::redirect("?controller=gallery&method=getAll");
            exit;
        }

        ob_start();
        header('Location: ' . "?controller=gallery&method=getAll");
        exit;

    }

    public function deletePhotoProcessing()
    {
        GalleryModel::delete($_GET["id"]);

        $previousUri = parse_url($_SERVER['HTTP_REFERER']);
        Template::redirect("?" . $previousUri['query']);
        exit;
    }


}