<?php
declare(strict_types=1);
namespace lib;

class DbConnection
{
    private const HOST       = 'rtacademy_database';
    private const PORT       = 3306;
    private const DBNAME     = 'helloworld';
    private const DBUSER     = 'helloworld';
    private const DBPASSWORD = 'helloworld';

    private static ?\PDO $_db = null;
    
    public static function getConnection(): \PDO
    {
        if( empty( self::$_db ) )
        {
            self::$_db = new \PDO(
                'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DBNAME,
                self::DBUSER,
                self::DBPASSWORD
            );
            
            self::$_db->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
        }

        return self::$_db;
    }
}