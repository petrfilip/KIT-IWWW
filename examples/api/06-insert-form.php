<?php

function __autoload($class)
{
    include './../classes/' . $class . '.php';
}


header('Content-Type: application/json');
$user = json_decode(file_get_contents("php://input"), true);
echo json_encode(UserRepository::insert($user["name"], $user["email"]));

