<?php
/**
 * Theme name to replace functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Theme name to replace
 */

if ( ! function_exists( 'theme_name_to_replace_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function theme_name_to_replace_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Menu principal', 'theme_name_to_replace' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside',
	// 	'image',
	// 	'video',
	// 	'quote',
	// 	'link',
	// ) );
}
endif;
add_action( 'after_setup_theme', 'theme_name_to_replace_setup' );

if ( ! function_exists( 'twentysixteen_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 */
function theme_name_to_replace_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme_name_to_replace_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'theme_name_to_replace_content_width', 640 );
}
add_action( 'after_setup_theme', 'theme_name_to_replace_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_name_to_replace_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'theme_name_to_replace' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'theme_name_to_replace_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function theme_name_to_replace_scripts() {
	wp_enqueue_style( 'theme_name_to_replace-style', get_stylesheet_uri() );

	// register stylesheet
	wp_register_style( 'theme', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), '', 'all' );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
	
	wp_register_script( 'theme', get_stylesheet_directory_uri() . '/js/theme.min.js', array( 'jquery' ), '', true );

	// enqueue styles and scripts
	wp_enqueue_style( 'theme' );
	wp_enqueue_script( 'theme' );
}
add_action( 'wp_enqueue_scripts', 'theme_name_to_replace_scripts' );


// Suppression Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');


// Replace tags around images in the_content() with <div> tags (classic editor)
function filter_ptags_on_images($content) {
	return preg_replace('/<p[^>]*>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\/p>/', '<div class="img">$1</div>', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

// Images sizes
add_image_size( 'banner', 1920, 1080, false );

// Page d'options
if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme options',
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

// Gutenberg allowed block types
add_filter( 'allowed_block_types', 'theme_name_to_replace_abt' );

function theme_name_to_replace_abt( $allowed_block_types ) {
    return array(
		'core/block',

		// Common
		'core/paragraph',
		'core/image',
		'core/heading',
		'core/gallery',
		'core/list',
		'core/quote',
		'core/audio',
		'core/cover',
		'core/file',
		// 'core/video',

		// Formatting
		// 'core/table',
		// 'core/verse',
		// 'core/code',
		// 'core/freeform — Classic',
		// 'core/html — Custom HTML',
		// 'core/preformatted',
		// 'core/pullquote',

		// Layout
		// 'core/buttons',
		// 'core/text-columns',
		// 'core/media-text',
		// 'core/more',
		// 'core/nextpage',
		// 'core/separator',
		// 'core/spacer',

		// Widgets
		// 'core/shortcode',
		// 'core/archives',
		// 'core/categories',
		// 'core/latest-comments',
		// 'core/latest-posts',
		// 'core/calendar',
		// 'core/rss',
		// 'core/search',
		// 'core/tag-cloud',

		// Embed
		// 'core/embed',
		// 'core-embed/twitter',
		// 'core-embed/youtube',
		// 'core-embed/facebook',
		// 'core-embed/instagram',
		// 'core-embed/wordpress',
		// 'core-embed/soundcloud',
		// 'core-embed/spotify',
		// 'core-embed/flickr',
		// 'core-embed/vimeo',
		// 'core-embed/animoto',
		// 'core-embed/cloudup',
		// 'core-embed/collegehumor',
		// 'core-embed/dailymotion',
		// 'core-embed/funnyordie',
		// 'core-embed/hulu',
		// 'core-embed/imgur',
		// 'core-embed/issuu',
		// 'core-embed/kickstarter',
		// 'core-embed/meetup-com',
		// 'core-embed/mixcloud',
		// 'core-embed/photobucket',
		// 'core-embed/polldaddy',
		// 'core-embed/reddit',
		// 'core-embed/reverbnation',
		// 'core-embed/screencast',
		// 'core-embed/scribd',
		// 'core-embed/slideshare',
		// 'core-embed/smugmug',
		// 'core-embed/speaker',
		// 'core-embed/ted',
		// 'core-embed/tumblr',
		// 'core-embed/videopress',
		// 'core-embed/wordpress-tv',

    );
}