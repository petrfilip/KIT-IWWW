<?php


class GalleryRepository
{
    static function getAll($limit = 10, $offset = 0): array
    {
        $query = "SELECT * FROM gallery_db ORDER BY id DESC LIMIT :limit OFFSET :offset";

        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    static function insert($image, $imageFormat) {
        $query = "INSERT INTO gallery_db (id, image, image_format) VALUE (null, :image, :imageFormat)";

        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":imageFormat", $imageFormat);
        return $stmt->execute();
    }




}