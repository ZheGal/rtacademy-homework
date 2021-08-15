<?php

if ($file = getCities()) {
    $row = fgetcsv( $file );
    fclose( $file );
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
