<?php get_header(); ?>

<?php
while( have_posts() )
    { the_post(); ?>

        <div class="post_page_inner">
            <div class="cover">
                <?php the_post_thumbnail( 'large-thumbnail' ) ?>
            </div>
            <div class="post_header">
                <h1 class="title"><?= the_title(); ?></h1>
                <div class="pre_text">
                    <?= formated_short_text(); ?>
                </div>
                <div class="author"></div>
            </div>
            <div class="post_content">
                <?= formated_content(); ?>
            </div>
        </div>
<?php } ?>

<?php get_footer(); ?>