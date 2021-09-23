<?php

declare( strict_types=1 );

namespace lib\models;

use lib\DbConnection;
use PDOException;

class PostsModel
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

    public function getList(int $page = 1)
    {
        $limit = 4;
        $from = ($limit * $page) - $limit;

        try {
            $statement = $this->_conn->prepare("SELECT * FROM posts WHERE status_id = 201 AND publish_date <= NOW() LIMIT 4 OFFSET {$from}");
            $statement->execute();
            $posts = [];
            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $cover = new \lib\entities\Cover($row['cover_id'], $row['title']);

                $author = new \lib\entities\Author();
                $author->setId($row['author_id']);

                $category = new \lib\entities\Category();
                $category->setId($row['category_id']);

                $post = new \lib\entities\Post();
                $post->setId($row['id']);
                $post->setTitle($row['title']);
                $post->setAlias($row['alias']);
                $post->setDescription($row['content']);
                $post->setPublishDate($row['publish_date']);
                $post->setCover($cover);
                $post->setAuthor($author);
                $post->setCategory($category);

                $posts[] = $post;
            }

            return $posts;
        } catch (PDOException $e) {
            die('Помилка БД: ' . $e->getMessage());
        }
    }

    public function getTotalCount()
    {
        try {
            $statement = $this->_conn->prepare("SELECT COUNT(*) FROM posts WHERE status_id = 201 AND publish_date <= NOW()");
            $statement->execute();
            return $statement->fetch()[0];

        } catch (PDOException $e) {
            die('Помилка БД: ' . $e->getMessage());
        }
    }

    public function getSingle(int $id)
    {
        try {
            $statement = $this->_conn->prepare("SELECT * FROM posts WHERE status_id = 201 AND publish_date <= NOW() AND id = {$id} LIMIT 1");
            $statement->execute();
            $row = $statement->fetch(\PDO::FETCH_ASSOC);
            if (!empty($row)) {
                $cover = new \lib\entities\Cover($row['cover_id'], $row['title']);

                $author = new \lib\entities\Author();
                $author->setId($row['author_id']);

                $category = new \lib\entities\Category();
                $category->setId($row['category_id']);

                $post = new \lib\entities\Post();
                $post->setId($row['id']);
                $post->setTitle($row['title']);
                $post->setAlias($row['alias']);
                $post->setDescription($row['content']);
                $post->setPublishDate($row['publish_date']);
                $post->setCover($cover);
                $post->setAuthor($author);
                $post->setCategory($category);

                return $post;
            }
            
        } catch (PDOException $e) {
            die('Помилка БД: ' . $e->getMessage());
        }
    }
}
