<?php

header("Content-type: text/plain");

$pattern = '/\#([a-f0-9]{6})$/i';
$subject = '#123ABC';

preg_match($pattern, $subject, $matches);

print_r($matches);

/////////////////////

$pattern = '#@([a-z0-9_]{1,15})#i';
$user = '@badrqst';
if (preg_match($pattern, $user, $matches)) {
    print_r($matches);
    echo ($matches['1']); // badrqst
} else {
    echo ('Не знайдено співпадінь');
}
