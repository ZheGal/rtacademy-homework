<?php
require_once('../index.php');
header("Content-type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$category = intval( preg_replace('#[^0-9]#', '', ( $_GET['id'] ?? 0 )) ?? 0 );
$api = new \lib\controllers\CategoryApiController();

$response = '';
switch( $method ?? 'GET' )
{
    case 'GET':
        $response = (isset($_GET['id'])) ? $api->getSingle($category) : $api->getList();
        break;
    
    case 'POST':
        $response = $api->create();
        break;
    
    case 'PUT':
        $response = $api->update($category);
        break;
    
    case 'DELETE':
        $response = $api->delete($category);
        break;
    
    default:
        $response = ['status' => '405', 'error' => 'Метод не знайдено'];
        break;
}

echo json_encode($response, JSON_PRETTY_PRINT);