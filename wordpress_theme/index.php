<?php get_header(); ?>

        <div class="top">
            <div class="wrapper">
                <div class="top_left">
                    <h1>Привіт,<br> я веб-розробник</h1>
                    <div class="desc">Зробіть підписку на мій сайт із чудовим та мінімалістичним дизайном.</div>
                    <div class="subscribe">
                        <form action="./" method="post">
                            <input type="email" name="email" placeholder="Ваша email-адреса">
                            <button type="submit">Підписатися</button>
                        </form>
                    </div>
                </div>
                <div class="top_right">
                    <img src="<?= get_template_directory_uri() ?>/images/girl-reading.png" alt="">
                </div>
            </div>
        </div>

        <div class="posts">
            <?php get_all_categories_list(); ?>

        <?php
        if( have_posts() ) {?>
        <ul class="posts-list" id="postsList">
            <?php while( have_posts() )
            {
                the_post(); ?>
                <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <a href="<?= esc_url( get_permalink() ) ?>">
                        <div class="cover">
                            <?php get_cover_list_tag() ?>
                        </div>
                        <div class="data">
                            <div class="info">
                                <span class="author"><?php the_author(); ?></span>
                                <span class="date"><?php get_posting_time(); ?></span>
                                <?php get_post_category(); ?>
                            </div>
                            <h3 class="post-title"><?= the_title(); ?></h3>
                            <p class="desc"><?php the_excerpt() ?></p>
                        </div>
                    </a>
                </li>
                <?php
            }?>
        </ul>
        <?php } else { ?>
            <div class="main_posts_empty">
                <h2>Записи на сайті відусутні</h2>
            </div>
        <?php
        }
        ?>
        </div>

        <div class="more-posts">
            <div class="col">
                <h5 class="stroke"><span>Роботи</span></h5>
                <ul class="posts-list">
                    <li class="posts-list-item">
                        <a href="#">
                            <div class="title">
                                <div class="name">Початок повсякденної роботи</div>
                                <div class="date">29 Лист 2020</div>
                            </div>
                            <div class="cover"><img src="<?= get_template_directory_uri() ?>/images/more/01.jpg" alt=""></div>
                        </a>
                    </li>
                    <li class="posts-list-item">
                        <a href="#">
                            <div class="title">
                                <div class="name">Важливі завдання</div>
                                <div class="date">28 Лист 2020</div>
                            </div>
                            <div class="cover"><img src="<?= get_template_directory_uri() ?>/images/more/02.jpg" alt=""></div>
                        </a>
                    </li>
                    <li class="posts-list-item">
                        <a href="#">
                            <div class="title">
                                <div class="name">Чудовий взiрець такого малюнка</div>
                                <div class="date">23 Лист 2020</div>
                            </div>
                            <div class="cover"><img src="<?= get_template_directory_uri() ?>/images/more/03.jpg" alt=""></div>
                        </a>
                    </li>
                    <li class="posts-list-item">
                        <a href="#">
                            <div class="title">
                                <div class="name">Аж двома негацiями</div>
                                <div class="date">20 Лист 2020</div>
                            </div>
                            <div class="cover"><img src="<?= get_template_directory_uri() ?>/images/more/04.jpg" alt=""></div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col">
                <h5 class="stroke"><span>Натхнення</span></h5>
                <ul class="posts-list">
                    <li class="posts-list-item">
                        <a href="#">
                            <div class="title">
                                <div class="name">Я певний, що се сталося несвiдомо</div>
                                <div class="date">28 Лист 2020</div>
                            </div>
                            <div class="cover"><img src="<?= get_template_directory_uri() ?>/images/more/05.jpg" alt=""></div>
                        </a>
                    </li>
                    <li class="posts-list-item">
                        <a href="#">
                            <div class="title">
                                <div class="name">Яка ж є сугестiя лiтературного критика</div>
                                <div class="date">19 Лист 2020</div>
                            </div>
                            <div class="cover"><img src="<?= get_template_directory_uri() ?>/images/more/06.jpg" alt=""></div>
                        </a>
                    </li>
                    <li class="posts-list-item">
                        <a href="#">
                            <div class="title">
                                <div class="name">Ми знаємо зверхнiй свiт не такий, як вiн є на дiлi</div>
                                <div class="date">17 Лист 2020</div>
                            </div>
                            <div class="cover"><img src="<?= get_template_directory_uri() ?>/images/more/07.jpg" alt=""></div>
                        </a>
                    </li>
                    <li class="posts-list-item">
                        <a href="#">
                            <div class="title">
                                <div class="name">Коли в нашiй уявi повстане образ пожару</div>
                                <div class="date">16 Лист 2020</div>
                            </div>
                            <div class="cover"><img src="<?= get_template_directory_uri() ?>/images/more/08.jpg" alt=""></div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col">
                <h5 class="stroke"><span>Навчання</span></h5>
                <ul class="posts-list">
                    <li class="posts-list-item">
                        <a href="#">
                            <div class="title">
                                <div class="name">Основний мотив чисто музикальний</div>
                                <div class="date">25 Лист 2020</div>
                            </div>
                            <div class="cover"><img src="<?= get_template_directory_uri() ?>/images/more/09.jpg" alt=""></div>
                        </a>
                    </li>
                    <li class="posts-list-item">
                        <a href="#">
                            <div class="title">
                                <div class="name">Навiть лишаючи на боцi порiвняння</div>
                                <div class="date">20 Лист 2020</div>
                            </div>
                            <div class="cover"><img src="<?= get_template_directory_uri() ?>/images/more/10.jpg" alt=""></div>
                        </a>
                    </li>
                    <li class="posts-list-item">
                        <a href="#">
                            <div class="title">
                                <div class="name">Нiякiсiньких риторичних прикрас</div>
                                <div class="date">10 Лист 2020</div>
                            </div>
                            <div class="cover"><img src="<?= get_template_directory_uri() ?>/images/more/11.jpg" alt=""></div>
                        </a>
                    </li>
                    <li class="posts-list-item">
                        <a href="#">
                            <div class="title">
                                <div class="name">Тиша се, властиво, брак вражень</div>
                                <div class="date">03 Лист 2020</div>
                            </div>
                            <div class="cover"><img src="<?= get_template_directory_uri() ?>/images/more/12.jpg" alt=""></div>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="authors">
            <?php print_authors();?>
        </div>
            

<?php get_footer(); ?>