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

            $posts = [];
            
            while( $row = $statement->fetch( \PDO::FETCH_ASSOC ) )
            {
                $cover = new \lib\entities\Cover( $row['cover_id'], $row['title'] );

                $author = new \lib\entities\Author();
                $author->setId( $row['author_id'] );

                $category = new \lib\entities\Category();
                $category->setId( $row['category_id'] );

                $post = new \lib\entities\Post();
                $post->setId( $row['id'] );
                $post->setTitle( $row['title'] );
                $post->setAlias( $row['alias'] );
                $post->setDescription( $row['content'] );
                $post->setPublishDate( $row['publish_date'] );
                $post->setCover( $cover );
                $post->setAuthor( $author );
                $post->setCategory( $category );

                $posts[] = $post;
            }
            
            return $posts;
        }
        catch( PDOException $e)
        {
            die('Помилка БД: ' . $e->getMessage());
        }
    }
}