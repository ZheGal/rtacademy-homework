<?php

try
{
    $count = count(scandir(__DIR__)) + 10;
    $filepath = './test' . rand( 1, $count ) . '.php';

    if (!file_exists($filepath)) {
        throw new Exception( "Жах. Файл {$filepath} не існує!!! " );
    }

    echo "Ура! Файл {$filepath} існує! ";

}
catch ( Exception $e )
{
    echo $e->getMessage();
}

echo 'Цей текст пишеться в кінці документу.';