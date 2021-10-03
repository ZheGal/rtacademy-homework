<?php

declare( strict_types=1 );

spl_autoload_register(
    function( $class )
    {
        require_once( __DIR__ . '/' . str_replace( '\\', '/', $class ) . '.php' );
    }
);

$users = [ 'user', 'login', 'admin' ];

foreach ($users as $user) {
    $obj = new \lib\models\UsersModel();
    $item = $obj->getByLoginPassword( $user, 'password' );
    print_r($item);
}