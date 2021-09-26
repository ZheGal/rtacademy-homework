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

$html_data = getFullHtml(getHtmlData($cities));

$newHtmlFile = __DIR__ . '/../data/cities.html';
if ($file = fopen($newHtmlFile, 'w')) {
    fwrite($file, $html_data);
    fclose($file);
    chmod($newHtmlFile, 0644);

    header("Location:/data/cities.html");
} else {
    die('Помилка: неможливо записати дані у файл.');
}

// functions

function getCities()
{
    $filepath = __DIR__ . '/../data/cities.csv';

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

function getHtmlData(array $array)
{
    $table_data = [
        '<th>Місто</th><th>Країна</th><th>Населення</th><th>Координати</th>'
    ];
    foreach ($array as $row) {
        $table_data[] = getOneCityRow($row);
    }
    $table_html = '<tr>' . implode("</tr>\n<tr>", $table_data) . '</tr>';
    return "<table>{$table_html}</table>";
}

function getOneCityRow(array $row) : string
{
    $array = [
        $row[0],
        $row[3],
        $row[4],
        "{$row[1]},{$row[2]}"
    ];
    return '<td>' . implode("</td><td>", $array) . '</td>';
}

function getFullHtml(string $table) : string
{
    $html_array = [
        '<!DOCTYPE html>',
        '<html lang="uk">',
        '<head>',
        '<meta charset="UTF-8">',
        '<meta http-equiv="X-UA-Compatible" content="IE=edge">',
        '<meta name="viewport" content="width=device-width, initial-scale=1.0">',
        '<title>Міста за населенням більше ніж мільйон</title>',
        '</head>',
        '<body>',
        $table,
        '</body>',
        '</html>'
    ];
    return implode("\n", $html_array);
}