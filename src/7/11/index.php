<?php
spl_autoload_register(function ($class) {
    $file = "./classes/{$class}.php";
    if (file_exists($file)) {
        require_once($file);
    }
});

////////////// authors

$authorOne = new Author();
$authorTwo = new Author();

////////////// posts
$postOne = new Post();
$postOne->setId(1);
$postOne->setTitle('Заголовок першого посту');
$postOne->setAlias('zaholovok_pershoho_postu');
// $postOne->setAuthor();

$postTwo = new Post();
$postTwo->setId(2);
$postTwo->setTitle('Заголовок другого посту');
$postTwo->setAlias('zaholovok_druhoho_postu');

$postThree = new Post();
$postThree->setId(3);
$postThree->setTitle('Заголовок третього посту');
$postThree->setAlias('zaholovok_tretyoho_postu');