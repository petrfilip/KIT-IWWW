<?php


class GalleryRepository
{
    static function getAll($limit = 10, $offset = 0): array
    {
        $query = "SELECT * FROM gallery_fs ORDER BY id DESC LIMIT :limit OFFSET :offset";

        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    static function insert($pathToImage) {
        $query = "INSERT INTO gallery_fs (id, path_to_image) VALUE (null, :pathToImage)";

        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":pathToImage", $pathToImage);
        return $stmt->execute();
    }




}