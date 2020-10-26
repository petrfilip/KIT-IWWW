<?php


class BlogPostRepository
{
    static function getAll(): array
    {
        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare("SELECT * FROM blog_post ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static function getAllByReadCounter(): array
    {
        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare("SELECT * FROM blog_post ORDER BY read_counter DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static function getAllSortByIdDesc($limit): array
    {
        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare("SELECT * FROM blog_post ORDER BY id DESC limit $limit");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static function save($heading, $text, string $pathToFile)
    {
        $conn = Connection::getPdoInstance();
        $sql = "INSERT INTO blog_post (heading, text, image) VALUES (:heading, :text, :pathToFile)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":heading", $heading);
        $stmt->bindParam(":text", $text);
        $stmt->bindParam(":pathToFile", $pathToFile);

        $stmt->execute();
        return true;
    }

    public static function getOneById($id)
    {
        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare("SELECT * FROM blog_post WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function increaseReadCounter($id) {
        $conn = Connection::getPdoInstance();
        $sql = "UPDATE blog_post SET read_counter = blog_post.read_counter+1 WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        $stmt->execute();
        return true;
    }


}