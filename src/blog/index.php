<?php

use lib\models\PostsModel;

spl_autoload_register(function ($class) {
    $file = './' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once($file);
    }
});

$postsModel = new PostsModel();
$posts = $postsModel->getList();

$count = $postsModel->getTotalCount();

require_once('./includes/header.php');
?>

<div class="top">
    <div class="wrapper">
        <div class="top_left">
            <h1>Привіт,<br> я веб-розробник</h1>
            <div class="desc">Зробіть підписку на мій сайт із чудовим та мінімалістичним дизайном.</div>
            <div class="subscribe">
                <form action="/" method="post">
                    <input type="email" name="email" placeholder="Ваша email-адреса">
                    <button type="submit">Підписатися</button>
                </form>
            </div>
        </div>
        <div class="top_right">
            <img src="/blog/web/images/girl-reading.png" alt="">
        </div>
    </div>
</div>

<div class="posts">
    <ul class="head">
        <li><a href="#">Освіта</a></li>
        <li><a href="#">Натхнення</a></li>
        <li><a href="#">Спосіб життя</a></li>
        <li><a href="#">Природа</a></li>
        <li><a href="#">Подорожі</a></li>
        <li><a href="#">Робота</a></li>
    </ul>

    <ul class="posts-list" id="postsList">
        <?php foreach ($posts as $post) : ?>

            <li>
                <a href="/blog/single.php">
                    <div class="cover">
                        <img src="/blog/web/images/<?= $post->getCover()->getImgAttributes()['filename'] ?>.jpg" alt="<?= $post->getCover()->getImgTag() ?>">
                    </div>
                    <div class="data">
                        <div class="info">
                            <span class="author">Amelia Harry</span>
                            <span class="date"><?= $post->getPublishDate(); ?></span>
                            <span class="post-tag">Public</span>
                        </div>
                        <h3 class="post-title"><?= $post->getTitle(); ?></h3>
                        <p class="desc"><?= $post->getDescription(); ?></p>
                    </div>
                </a>
            </li>

        <?php endforeach;?>
    </ul>

    <div class="more-posts-button">
        <a href="#" id="morePostsButton" data-total="<?=$postsModel->getTotalCount();?>">Більше записів</a>
    </div>
</div>

<div class="more-posts">
    <div class="col">
        <h5 class="stroke"><span>Роботи</span></h5>
        <ul class="posts-list">
            <li class="posts-list-item">
                <a href="/blog/single.php">
                    <div class="title">
                        <div class="name">Початок повсякденної роботи</div>
                        <div class="date">29 Лист 2020</div>
                    </div>
                    <div class="cover"><img src="/blog/web/images/more/01.jpg" alt=""></div>
                </a>
            </li>
            <li class="posts-list-item">
                <a href="/blog/single.php">
                    <div class="title">
                        <div class="name">Важливі завдання</div>
                        <div class="date">28 Лист 2020</div>
                    </div>
                    <div class="cover"><img src="/blog/web/images/more/02.jpg" alt=""></div>
                </a>
            </li>
            <li class="posts-list-item">
                <a href="/blog/single.php">
                    <div class="title">
                        <div class="name">Чудовий взiрець такого малюнка</div>
                        <div class="date">23 Лист 2020</div>
                    </div>
                    <div class="cover"><img src="/blog/web/images/more/03.jpg" alt=""></div>
                </a>
            </li>
            <li class="posts-list-item">
                <a href="/blog/single.php">
                    <div class="title">
                        <div class="name">Аж двома негацiями</div>
                        <div class="date">20 Лист 2020</div>
                    </div>
                    <div class="cover"><img src="/blog/web/images/more/04.jpg" alt=""></div>
                </a>
            </li>
        </ul>
    </div>
    <div class="col">
        <h5 class="stroke"><span>Натхнення</span></h5>
        <ul class="posts-list">
            <li class="posts-list-item">
                <a href="/blog/single.php">
                    <div class="title">
                        <div class="name">Я певний, що се сталося несвiдомо</div>
                        <div class="date">28 Лист 2020</div>
                    </div>
                    <div class="cover"><img src="/blog/web/images/more/05.jpg" alt=""></div>
                </a>
            </li>
            <li class="posts-list-item">
                <a href="/blog/single.php">
                    <div class="title">
                        <div class="name">Яка ж є сугестiя лiтературного критика</div>
                        <div class="date">19 Лист 2020</div>
                    </div>
                    <div class="cover"><img src="/blog/web/images/more/06.jpg" alt=""></div>
                </a>
            </li>
            <li class="posts-list-item">
                <a href="/blog/single.php">
                    <div class="title">
                        <div class="name">Ми знаємо зверхнiй свiт не такий, як вiн є на дiлi</div>
                        <div class="date">17 Лист 2020</div>
                    </div>
                    <div class="cover"><img src="/blog/web/images/more/07.jpg" alt=""></div>
                </a>
            </li>
            <li class="posts-list-item">
                <a href="/blog/single.php">
                    <div class="title">
                        <div class="name">Коли в нашiй уявi повстане образ пожару</div>
                        <div class="date">16 Лист 2020</div>
                    </div>
                    <div class="cover"><img src="/blog/web/images/more/08.jpg" alt=""></div>
                </a>
            </li>
        </ul>
    </div>
    <div class="col">
        <h5 class="stroke"><span>Навчання</span></h5>
        <ul class="posts-list">
            <li class="posts-list-item">
                <a href="/blog/single.php">
                    <div class="title">
                        <div class="name">Основний мотив чисто музикальний</div>
                        <div class="date">25 Лист 2020</div>
                    </div>
                    <div class="cover"><img src="/blog/web/images/more/09.jpg" alt=""></div>
                </a>
            </li>
            <li class="posts-list-item">
                <a href="/blog/single.php">
                    <div class="title">
                        <div class="name">Навiть лишаючи на боцi порiвняння</div>
                        <div class="date">20 Лист 2020</div>
                    </div>
                    <div class="cover"><img src="/blog/web/images/more/10.jpg" alt=""></div>
                </a>
            </li>
            <li class="posts-list-item">
                <a href="/blog/single.php">
                    <div class="title">
                        <div class="name">Нiякiсiньких риторичних прикрас</div>
                        <div class="date">10 Лист 2020</div>
                    </div>
                    <div class="cover"><img src="/blog/web/images/more/11.jpg" alt=""></div>
                </a>
            </li>
            <li class="posts-list-item">
                <a href="/blog/single.php">
                    <div class="title">
                        <div class="name">Тиша се, властиво, брак вражень</div>
                        <div class="date">03 Лист 2020</div>
                    </div>
                    <div class="cover"><img src="/blog/web/images/more/12.jpg" alt=""></div>
                </a>
            </li>
        </ul>
    </div>

</div>

<div class="authors">
    <h5 class="stroke"><span>Автори</span></h5>
    <ul class="authors-list">
        <li class="author-card">
            <div class="photo">
                <img src="/blog/web/images/authors/01.jpg" alt="Софія Горбунова">
            </div>
            <div class="author-data">
                <div class="name">Софія Горбунова</div>
                <div class="desc">Автор та розробник теми оформлення.</div>
            </div>
        </li>
        <li class="author-card">
            <div class="photo">
                <img src="/blog/web/images/authors/02.jpg" alt="Артем Зайцев">
            </div>
            <div class="author-data">
                <div class="name">Артем Зайцев</div>
                <div class="desc">Автор текстів та статей.</div>
            </div>
        </li>
        <li class="author-card">
            <div class="photo">
                <img src="/blog/web/images/authors/03.jpg" alt="Іван Маркін">
            </div>
            <div class="author-data">
                <div class="name">Іван Маркін</div>
                <div class="desc">Розробник сайту.</div>
            </div>
        </li>
    </ul>
</div>

<?php require_once('./includes/footer.php'); ?>