<?php
declare( strict_types=1 );
header("Content-type: text/plain");

spl_autoload_register(function ($class) {
    $file = "./classes/{$class}.php";
    if (file_exists($file)) {
        require_once($file);
    }
});

// authors

$author1 = new Author();
$author1->setId( 1 );
$author1->setFirstName( 'James' );
$author1->setLastName( 'Trainor' );

$author2 = new Author();
$author2->setId( 2 );
$author2->setFirstName( 'William' );
$author2->setLastName( 'Glougal' );

// categories

$category1 = new Category();
$category1->setId( 1 );
$category1->setTitle( 'Nunc cursus' );
$category1->setAlias( 'nunc_cursus' );

$category2 = new Category();
$category2->setId( 2 );
$category2->setTitle( 'A laoreet convallis' );
$category2->setAlias( 'a_laoreet_convallis' );

$category3 = new Category();
$category3->setId( 3 );
$category3->setTitle( 'Egestas Magna Lacus' );
$category3->setAlias( 'egestas_magna_lacus' );

// covers
$cover1 = new Cover('cover1', 'Cover 1');
$cover2 = new Cover('cover2', 'Cover 2');
$cover3 = new Cover('cover3', 'Cover 3');

// posts

$post1 = new Post();
$post1->setId(1);
$post1->setTitle('Заголовок першого посту');
$post1->setAlias('zaholovok_pershoho_postu');
$post1->setDescription('Заголовок для першого посту, який про перший пост');
$post1->setPublishDate( '2021-06-01 13:10:00' );
$post1->setAuthor( $author1 );
$post1->setCategory( $category1 );
$post1->setCover( $cover1 );

$post2 = new Post();
$post2->setId(2);
$post2->setTitle('Заголовок другого посту');
$post2->setAlias('zaholovok_druhoho_postu');
$post2->setDescription('Заголовок для другого посту, який про другий пост');
$post2->setPublishDate( '2021-06-07 15:10:00' );
$post2->setAuthor( $author2 );
$post2->setCategory( $category2 );
$post2->setCover( $cover2 );

$post3 = new Post();
$post3->setId(3);
$post3->setTitle('Заголовок третього посту');
$post3->setAlias('zaholovok_tretyoho_postu');
$post3->setDescription('Заголовок для третього посту, який про третій пост');
$post3->setPublishDate( '2021-06-15 12:30:00' );
$post3->setAuthor( $author1 );
$post3->setCategory( $category3 );
$post3->setCover( $cover3 );

// array
$posts = [
    $post1, $post2, $post3
];

var_dump($posts);