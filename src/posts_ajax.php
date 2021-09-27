<?php

use lib\models\PostsModel;

spl_autoload_register(function ($class) {
    $file = './' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once($file);
    }
});

$page = ( isset($_GET['page']) ) ? $_GET['page'] : 1;

$postsModel = new PostsModel();
$posts = $postsModel->getList( $page );

$result = [];

foreach( $posts as $post ) {
    $result[] = [
        'id' => $post->getId(),
        'title' => $post->getTitle(),
        'alias' => $post->getAlias(),
        'start' => $post->getDescription(),
        'author' => [
            'id' => $post->getAuthor()->getId(),
            'first_name' => 'Name',
            'last_name' => 'Surname'
        ],
        'publish_date' => $post->getPublishDate(),
        'category' => [
            'id' => $post->getCategory()->getId(),
            'title' => 'Category',
            'alias' => 'category'
        ],
        'cover' => [
            'width' => 640,
            'height' => 480,
            'url' => '/blog/web/images/' . $post->getCover()->getImgAttributes()['filename'] . '.jpg',
            'alt' => $post->getCover()->getImgTag()
        ]
    ];
}

echo json_encode($result, JSON_PRETTY_PRINT);