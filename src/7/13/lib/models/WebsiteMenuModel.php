<?php
declare( strict_types=1 );

namespace lib\models;

use lib\DbConnection;
use PDOException;

class WebsiteMenuModel
{
    protected $_conn;

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
            $msg[] = '<div style="width: calc(100% - 2em);top: 0;left: 0;box-sizing: border-box;background: red;color: #fff;font-family: sans-serif;font-weight: bold;padding: .5em .75em;margin: 1em;border: 1px solid #9d0000;text-shadow: 0px 2px 0px #9d0000;z-index: 9;">';
            $msg[] = 'Помилка БД: ' . $e->getMessage();
            $msg[] = '</div>';
            
            $message = implode('', $msg);

            echo $message;
            return [];
        }
    }
}