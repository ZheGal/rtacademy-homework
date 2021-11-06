<?php

add_theme_support('title-tag');

remove_action('wp_head', 'wp_generator');

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 350, 197, true );
add_image_size( 'small-thumbnail', 310, 174, true );
add_image_size( 'middle-thumbnail', 550, 309, true );
add_image_size( 'big-thumbnail', 640, 360, true );
add_image_size( 'large-thumbnail', 1200, 675, true );

register_nav_menus(
    [
        'main' => 'Головне меню',
    ]
);

if( !function_exists( 'get_cover_list_tag' ) )
{
    function get_cover_list_tag()
    {
        the_post_thumbnail(
            'small-thumbnail',
            [
                'srcset' =>
                    implode(
                        ',',
                        [
                            get_the_post_thumbnail_url( null, 'small-thumbnail' ) . ' 310w',
                            get_the_post_thumbnail_url( null, 'thumbnail' ) . ' 350w',
                            get_the_post_thumbnail_url( null, 'middle-thumbnail' ) . ' 550w',
                            get_the_post_thumbnail_url( null, 'big-thumbnail' ) . ' 640w',
                        ]
                    ),
                'sizes' => '(max-width: 48rem) 550px, (max-width: 62rem) 350px, (max-width: 75rem) 310px, 550px',
                'alt'   => get_the_title(),
            ]
        );
    }
}

if ( !function_exists( 'get_post_category' ) )
{
    function get_post_category()
    {
        $categories = get_the_category();
        foreach ($categories as $category) {
            $category_names[] = $category->name;
        }
        $category_name = implode( ", ", $category_names );
        $tag = "<span class=\"post-tag\">{$category_name}</span>";
        echo $tag;
    }
}

if ( !function_exists( 'get_all_categories_list' ) )
{
    function get_all_categories_list()
    {
        $categories = get_categories();

        $tags[] = '<ul class="head">';
        foreach ($categories as $category) {
            $title = $category->name;
            $link = get_category_link( $category->cat_ID );
            $tags[] = "<li><a href=\"{$link}\">{$title}</a></li>";
        }
        $tags[] = '</ul>';

        echo implode("\n", $tags);
    }
}

if ( !function_exists( 'get_posting_time' ) )
{
    function get_posting_time()
    {
        $time = strtotime(get_post()->post_date);
        $time_formated = date("d.m.Y H:i", $time);
        echo $time_formated;
    }
}

add_action( 'show_user_profile', 'true_show_profile_fields' );
add_action( 'edit_user_profile', 'true_show_profile_fields' );
 
function true_show_profile_fields( $user ) {
 
 	echo '<h3>Додаткова інформація</h3>';
 	echo '<table class="form-table">';
 
	$user_about = get_the_author_meta( 'about', $user->ID );
 	echo '<tr><th><label for="about">Коротко про користувача</label></th>
 	<td><input type="text" name="about" id="about" value="' . esc_attr( $user_about ) . '" class="regular-text" /></td>
	</tr>';
    
	$gender = ( $gender = get_the_author_meta( 'gender', $user->ID ) ) ? $gender : 'male';
 	echo '<tr><th><label for="gender">Стать</label></th>
 		<td><ul>
 			<li><label><input value="male" name="gender"' . checked( $gender, 'male', false ) . ' type="radio" /> чоловіча</label></li>
 			<li><label><input value="female" name="gender"' . checked( $gender, 'female', false ) . ' type="radio" /> жіноча</label></li>
			<li><label><input value="other" name="gender"' . checked( $gender, 'other', false ) . ' type="radio" /> інша</label></li>
 		</ul></td>
 	</tr>';
 
 	echo '</table>';
 
}

add_action( 'personal_options_update', 'true_save_profile_fields' );
add_action( 'edit_user_profile_update', 'true_save_profile_fields' );
 
function true_save_profile_fields( $user_id ) {
	update_user_meta( $user_id, 'about', sanitize_text_field( $_POST[ 'about' ] ) );
	update_user_meta( $user_id, 'gender', sanitize_text_field( $_POST[ 'gender' ] ) );
}

function print_authors()
{
    $tags[] = '<h5 class="stroke"><span>Автори</span></h5>';
    $tags[] = '<ul class="authors-list">';
    $users = get_users();
    foreach ($users as $user) {
        $about = get_the_author_meta( 'about', $user->ID );
        if ($user->caps['author'] && !empty($about)) {
            $tags[] = '<li class="author-card">';
            $tags[] = '<div class="photo">';
            $tags[] = '<img src="' . get_template_directory_uri() . '/images/authors/01.jpg" alt="' . $user->data->display_name . '">';
            $tags[] = '</div>';
            $tags[] = '<div class="author-data">';
            $tags[] = '<div class="name">' . $user->data->display_name . '</div>';
            $tags[] = '<div class="desc">' . $about . '</div>';
            $tags[] = '</div>';
            $tags[] = '</li>';
        }
    }
    $tags[] = '</ul>';

    echo implode( "\n", $tags );
}

function formated_short_text()
{
    $text = get_the_excerpt();
    $array = explode("[&hellip;]", $text);
    return $array[0];
}

function formated_content()
{
    $content = get_the_content();
    $trimmed = explode( formated_short_text(), $content );
    array_shift( $trimmed );
    return "<p>" . implode( formated_short_text(), $trimmed );
}