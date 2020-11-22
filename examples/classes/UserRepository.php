<?php


class UserRepository
{
    static function getAll($limit = 10, $offset = 0): array
    {
        $query = "SELECT id, name, email FROM user ORDER BY id DESC LIMIT :limit OFFSET :offset";

        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static function findByName($name): array
    {
        $query = "SELECT id, name, email FROM user WHERE name LIKE :name ORDER BY id DESC LIMIT 5";

        $nameParam = $name . '%';

        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $nameParam);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static function insert($name, $email) {
        $query = "INSERT INTO user (name, email, password) VALUE (:name, :email, :password)";

        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindValue(":password", '');
        return $stmt->execute();
    }

    static function getById($id): array
    {
        $query = "SELECT id, name, email FROM user WHERE id=:id";

        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    static function deleteById($id)
    {
        $query = "DELETE FROM user WHERE id=:id";

        $conn = Connection::getPdoInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


}