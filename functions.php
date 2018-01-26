<?php include 'shortcodes.php'; ?>
<?php
/**
 * responsive-documentation functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package responsive-documentation
 */

if ( ! function_exists( 'responsive_documentation_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function responsive_documentation_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on responsive-documentation, use a find and replace
	 * to change 'responsive-documentation' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'responsive-documentation', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'responsive-documentation' ),
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
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'responsive_documentation_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'responsive_documentation_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function responsive_documentation_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'responsive_documentation_content_width', 640 );
}
add_action( 'after_setup_theme', 'responsive_documentation_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function responsive_documentation_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'responsive-documentation' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'responsive-documentation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'responsive_documentation_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function responsive_documentation_scripts() {
	wp_enqueue_style( 'responsive-documentation-style', get_stylesheet_uri() );

	wp_enqueue_script( 'responsive-documentation-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'responsive-documentation-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'responsive_documentation_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
  * Add Bootstrap 3.3.6 Navigation Functionality
  */
require_once('wp_bootstrap_navwalker.php');

/**
  * Adds a CSS File to the tinyMCE
  */
add_editor_style('/css/tinymce.css');


/** SearchWP - ACF Relationship Search

Advanced Custom Fields has a Relationship field that allows you to define what
is considered related to the current post. Under the hood it simply stores the
post IDs of the related items, but post IDs don’t make much sense to add as
searchable content. To inject your own code during the time SearchWP is indexing
this Custom Field and tell SearchWP to index the titles instead of the post IDs,
add the following to your active theme’s functions.php:

https://searchwp.com/docs/hooks/searchwp_custom_fields/
*/
function my_searchwp_custom_fields( $customFieldValue, $customFieldName, $thePost ) {
  // by default we're just going to send the original value back
  $contentToIndex = $customFieldValue;
  // check to see if this is one of the ACF Relationship fields we want to process
  if( in_array( strtolower( $customFieldName ), array( 'associated_elements', 'associated_elements_addons' ) ) ) {
    // we want to index the titles, not the post IDs, so we'll wipe this out and append our titles to it
    $contentToIndex = '';
    // related posts are stored in an array
    if( is_array( $customFieldValue ) ) {
      foreach( $customFieldValue as $relatedPostData ) {
        if( is_numeric( $relatedPostData ) ) { // if you set the Relationship to store post IDs, it's numeric
          $title = get_the_title( $relatedPostData );
          $contentToIndex .= $title . ' ';
        } else { // it's an array of objects
          $postData = maybe_unserialize( $relatedPostData );
          if( is_array( $postData ) && !empty( $postData ) ) {
            foreach( $postData as $postID ) {
              $title = get_the_title( absint( $postID ) );
              $component_variation_name = get_field('component_variation_name', $postID);
              $component_content = get_the_content();
              $component_description = get_field('component_description', $postID);
              $component_use = get_field('component_use', $postID);
              $component_options = get_field('component_options', $postID);
              $contentToIndex .= $title . ' ' . $component_variation_name . ' ' . $component_content . ' ' . $component_description . ' ' . $component_use . ' ' . $component_options . ' ';
            }
          }
        }
      }
    }
  }
  return $contentToIndex;
}
add_filter( 'searchwp_custom_fields', 'my_searchwp_custom_fields', 10, 3 );

/**
  * Enable WP-API CORS
	*/

function allow_get_over_cors() {
	remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
	add_filter( 'rest_pre_serve_request', function( $value ) {
		header( 'Access-Control-Allow-Origin: *' );
		header( 'Access-Control-Allow-Methods: GET' );
		header( 'Access-Control-Allow-Credentials: true' );
		header( 'Access-Control-Expose-Headers: Link', false );
		return $value;
	} );
}
add_action( 'rest_api_init', 'allow_get_over_cors', 15 );



