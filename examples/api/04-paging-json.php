<?php

function __autoload($class)
{
    include './../classes/' . $class . '.php';
}

$limit = $_GET["limit"] ?? 5; //todo validace na číselný datový typ
$offset = $_GET["offset"] ?? 0; //todo validace na číselný datový typ

// https://www.php.net/manual/en/language.operators.comparison.php#language.operators.comparison.coalesce
// $foo = $bar ?? 'default value';
// $foo = isset($bar) ? $bar : 'default value';
// echo $foo ?? $bar ?? $baz ?? $qux;

$offset = $limit * $offset;

header('Content-Type: application/json');
echo json_encode(UserRepository::getAll($limit, $offset));
