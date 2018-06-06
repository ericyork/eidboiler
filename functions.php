<?php
include( get_stylesheet_directory() . '/inc/customizer.php' );
add_action( 'after_setup_theme', 'eidboiler_setup' );
function eidboiler_setup()
{
load_theme_textdomain( 'eidboiler', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'eidboiler' ) )
);
}
add_action( 'wp_enqueue_scripts', 'eidboiler_load_scripts' );
/*-- adds support for custom logo to replace site title and tagline--*/
function eidboiler_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'eidboiler_custom_logo_setup' );
/*-- loads theme scripts--*/
function eidboiler_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'eidboiler_enqueue_comment_reply_script' );
function eidboiler_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'eidboiler_title' );
function eidboiler_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'eidboiler_filter_wp_title' );
function eidboiler_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'eidboiler_widgets_init' );
function eidboiler_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'eidboiler' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function eidboiler_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'eidboiler_comments_number' );
function eidboiler_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}
function _remove_script_version( $src ){
$parts = explode( '?', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
include( get_stylesheet_directory() . '/inc/customizer.php' );
