<?php
function __autoload($class)
{
    include './../../classes/' . $class . '.php';
}

# https://restfulapi.net/rest-put-vs-post/
//je potřeba .htaccess soubor s konfigurací
$params = explode('/', $_GET['q']);

$entity = $params[0];
$id = $params[1];


if ($entity == "users") {
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && !empty($id)) {
        echo json_encode(UserRepository::deleteById($id));
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'PUT' && !empty($id)) {
        // todo update
        return;

    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($id)) {
        header('Content-Type: application/json');
        echo json_encode(UserRepository::getById($id));
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && empty($id)) {
        header('Content-Type: application/json');
        echo json_encode(UserRepository::getAll(5, 0));
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = json_decode(file_get_contents("php://input"), true);
        echo json_encode(UserRepository::insert($user["name"], $user["email"]));
        return;
    }
}







