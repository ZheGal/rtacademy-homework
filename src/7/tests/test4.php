<?php
header("Content-type: text/plain");

$get = $_GET['get'] ?? 'Null';
$getA = isset($_GET['get']) ? $_GET['get'] : 'Null A';

echo $get;
echo "\n";
echo $getA;