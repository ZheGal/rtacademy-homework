<?php
header("Content-type: text/plain");

function A( $v )
{
    return $v * 2;
}

$a = 123;
$b = A( $a );

echo $b;

echo "\n\n";
////////////////////////

function B( &$v )
{
    $v = $v * 2;
    return $v;
}

$a = 123;
echo B($a);