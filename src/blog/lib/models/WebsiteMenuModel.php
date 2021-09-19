<?php

namespace lib\models;

use lib\DbConnection;
use PDOException;

class WebsiteMenuModel
{
    private $_conn;

    public function __construct()
    {
        try {
            $db = new DbConnection();
            $this->_conn = $db->getConnection();
        } catch (PDOException $e) {
            die('Помилка БД: ' . $e->getMessage());
        }
    }

    public function getList()
    {
        try {
            $statement = $this->_conn->prepare("SELECT * FROM website_menu ORDER by `order` ASC");
            $statement->execute();

            $result = [];
            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $item = new \lib\entities\WebsiteMenu();
                $item->setId( $row['id'] );
                $item->setTitle( $row['title'] );
                $item->setHref( $row['href'] );

                $result[] = $item;
            }
            return $result;

        } catch (PDOException $e) {
            die('Помилка БД: ' . $e->getMessage());
        }
    }
}