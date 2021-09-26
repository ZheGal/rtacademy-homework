<?php

$file = getCities();

if (!$file) {
    die('Файл \'cities.csv\' не знайдено');
}

$cities = getMoreMillion($file);
fclose( $file );

if (empty($cities)) {
    die('Не знайдено міст із населенням більше ніж мільйон');
}

$json_data = getArrayData($cities);

$newJsonFile = __DIR__ . '/../../data/cities.json';
if ($file = fopen($newJsonFile, 'w')) {
    fwrite($file, $json_data);
    fclose($file);
    chmod($newJsonFile, 0644);

    header("Content-Type: application/json");
    echo file_get_contents($newJsonFile);
} else {
    die('Помилка: неможливо записати дані у файл.');
}

// functions

function getCities()
{
    $filepath = __DIR__ . '/../../data/cities.csv';

    if (file_exists($filepath)) {
        return fopen( $filepath, 'r' );
    }    
    return false;
}

function getMoreMillion($data) : array
{
    $result = [];
    while (($row = fgetcsv( $data, 0, ',' )) != false) {
        if ($row[4] > 1000000) {
            $result[] = $row;
        }
    }
    return $result;
}

function getArrayData(array $array)
{
    $result = [];
    foreach ($array as $row) {
        $result[] = [
            'city' => $row[0],
            'country' => $row[3],
            'population' => $row[4],
            'latitude' => $row[1],
            'longitude' => $row[2]
        ];
    }
    return json_encode($result, JSON_PRETTY_PRINT);
}