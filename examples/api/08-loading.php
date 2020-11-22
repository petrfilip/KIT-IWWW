<?php

function __autoload($class)
{
    include './../classes/' . $class . '.php';
}

$limit = $_GET["limit"] ?? 5; //todo validace na číselný datový typ
$offset = $_GET["offset"] ?? 0; //todo validace na číselný datový typ

$offset = $limit * $offset;

sleep(3);

header('Content-Type: application/json');
echo json_encode(UserRepository::getAll($limit, $offset));
