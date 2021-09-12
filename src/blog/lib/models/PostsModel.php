<?php
namespace lib\models;

use lib\DbConnection;
use PDOException;

class PostsModel
{
    public function getList()
    {
        try 
        {
            $db = new DbConnection();
            $conn = $db->getConnection();
            $statement = $conn->prepare("SELECT * FROM posts");
            $statement->execute();
            
            while( $row = $statement->fetch( \PDO::FETCH_ASSOC ) )
            {
                print_r( $row );
            }
        }
        catch( PDOException $e)
        {
            die('Помилка БД: ' . $e->getMessage());
        }
    }
}