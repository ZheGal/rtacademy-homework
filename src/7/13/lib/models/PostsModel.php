<?php
declare( strict_types=1 );

namespace lib\models;

class PostsModel
{
    public const COUNT_PER_PAGE = 9;

    public function getList(): array
    {
        try {
            $db = \lib\DbConnection::getConnection();

            $statement = $db->query('
                    SELECT
                        p.id,
                        p.title,
                        p.alias,
                        p.description,
                        p.publish_date,
                        p.category_id,
                        pc.title        AS category_title,
                        pc.alias        AS category_alias,
                        p.author_id,
                        u.firstname     AS author_firstname,
                        u.lastname      AS author_lastname,
                        pc2.filename    AS cover_filename,
                        pc2.alt         AS cover_alt
                    FROM
                        posts AS p
                    LEFT JOIN
                        posts_categories AS pc ON ( p.category_id = pc.id )
                    LEFT JOIN
                        users AS u ON ( p.author_id = u.id )
                    LEFT JOIN
                        posts_covers AS pc2 ON ( p.cover_id = pc2.id )
                    INNER JOIN
                        posts_statuses AS ps2 ON ( ps2.name = \'active\' AND p.status_id = ps2.id )
                    WHERE
                        p.status_id = ps2.id
                        AND
                        p.publish_date <= now()
                    ORDER BY
                        p.publish_date DESC
                    LIMIT '. self::COUNT_PER_PAGE, \PDO::FETCH_ASSOC);

            $posts = [];

            if (!empty($statement)) {
                foreach ($statement as $row) {
                    $author = new \lib\entities\Author();
                    $author->setId( intval($row['author_id']) );
                    $author->setFirstName( $row['author_firstname'] );
                    $author->setLastName( $row['author_lastname'] );

                    $category = new \lib\entities\Category();
                    $category->setId( intval($row['category_id']) );
                    $category->setTitle( $row['category_title'] );
                    $category->setAlias( $row['category_alias'] );

                    $cover = new \lib\entities\Cover( $row['cover_filename'], $row['cover_alt'] );

                    $post = new \lib\entities\Post();
                    $post->setId( intval($row['id'] ));
                    $post->setTitle( $row['title'] );
                    $post->setAlias( $row['alias'] );
                    $post->setDescription( $row['description'] );
                    $post->setAuthor( $author );
                    $post->setPublishDate( $row['publish_date'] );
                    $post->setCategory( $category );
                    $post->setCover( $cover );

                    $posts[] = $post;
                }
            }

            return $posts;
        } catch ( \PDOException $e ) {
            $msg[] = '<div style="position: fixed;width: calc(100% - 2em);top: 0;left: 0;box-sizing: border-box;background: red;color: #fff;font-family: sans-serif;font-weight: bold;padding: .5em .75em;margin: 1em;border: 1px solid #9d0000;text-shadow: 0px 2px 0px #9d0000;z-index: 9;">';
            $msg[] = 'Помилка БД: ' . $e->getMessage();
            $msg[] = '</div>';
            
            echo( implode("". $msg) );
            return [];
        }
    }
}