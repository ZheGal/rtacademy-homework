<?php
declare(strict_types=1);
define( 'MAX_FILE_SIZE', 10485760 );

$error_message = '';

function start() : void
{
    if (empty($_POST)) {
        return;
    }

    $input = 'userfile';
    if (!checkSendedFile( $input )) {
        return;
    }

    $cities = getCitiesFromFile( $_FILES[ $input ]['tmp_name'] ?? null );
}

function getCitiesFromFile( string $filepath ) : ?array
{
    global $error_message;

    if (!file_exists( $filepath)) {
        $error_message = 'Помилка. Файл не існує.';
        return null;
    }

    $stream = fopen( $filepath, 'r' );
    echo ($stream);

    return [];
}

function checkSendedFile( string $name, int $max_file_size = MAX_FILE_SIZE ) : bool
{
    global $error_message;
    $_f = $_FILES;
    $types = [ 'text/csv', 'application/octet-stream', 'application/vnd.ms-excel' ];

    if (empty( $_f[$name]) ) {
        $error_message = 'Помилка. Необхідно завантажити файл.';
        return false;
    }
    
    if ($_f[$name]['error'] !== UPLOAD_ERR_OK) {
        $error_message = 'Сталася помилка при завантаженні файлу.';
        return false;
    }

    if ($_f[$name]['size'] >= $max_file_size) {
        $error_message = 'Помилка. Розмір файлу перевищує допустиму кількість байтів.';
        return false;
    }

    if (!in_array($_f[$name]['type'], $types)) {
        $error_message = 'Помилка. Не допустимий формат файлу.';
        return false;
    }

    return true;
}

function getMainForm() : void
{
    global $error_message;
    $file = __DIR__ . '/_html.php';

    if (file_exists($file)) {
        require_once($file);
    }
}

start();
getMainForm();