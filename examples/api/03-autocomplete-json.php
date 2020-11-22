<?php

function __autoload($class)
{
    include './../classes/' . $class . '.php';
}

$name = htmlspecialchars($_GET["name"]);

header('Content-Type: application/json');
echo json_encode(UserRepository::findByName($name));
