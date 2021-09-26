<?php

$a = '123';
$b = ['test', 'test1', 'test2'];
$c = fn($x) => $x + 1;
$d = fn($a = 1, $b = 1) => ((($a + $b) * $b) / $a);

function testFunc() {
    $a = 'test';
    global $b;
    $c = '123';
    $result = [
        $GLOBALS,
        get_defined_vars()
    ];
    return $result;
}

$array = testFunc();
print_r($array);