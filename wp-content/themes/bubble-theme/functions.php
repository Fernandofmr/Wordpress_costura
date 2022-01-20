<?php
/**
 * Bubble functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bubble
 * @license GPL 2.0 
 */

define( 'BUBBLE_THEME_VERSION', '1.7.0' );
define( 'BUBBLE_THEME_JS_PREFIX', '.min' );
define( 'BUBBLE_THEME_CSS_PREFIX', '.min' );

if ( ! function_exists( 'bubble_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bubble_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bubble, use a find and replace
	 * to change 'bubble' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bubble', get_template_directory() . '/languages' );

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
	 * Enable support for Block Editor Wide Alignment.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment
	 */
	add_theme_support( 'align-wide' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Custom image sizes.
	add_image_size( 'bubble-247x164-crop', 247, 163, true );
	add_image_size( 'bubble-354x234-crop', 354, 234, true );
	add_image_size( 'bubble-720x480-crop', 720, 480, true );

	/*
	 * Enable support for the custom logo.
	 */
	add_theme_support( 'custom-logo' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Header Menu', 'bubble' ),
		'menu-2' => esc_html__( 'Footer Menu', 'bubble' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * @link https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'gallery',
		'image',
		'video',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bubble_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * Enable support for Gutenberg Editor Styles.
	 * https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#editor-styles
	 */
	add_theme_support( 'editor-styles' );

	// Disable WP 5.8+ Widget Area.
	if ( apply_filters( 'bubble_disable_new_widget_area', true ) ) {
		remove_theme_support( 'widgets-block-editor' );
	}

}
endif;
// bubble_setup
add_action( 'after_setup_theme', 'bubble_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bubble_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bubble_content_width', 1140 );
}
add_action( 'after_setup_theme', 'bubble_content_width', 0 );

/**
 * Add the viewport tag.
 */
function bubble_viewport_tag() { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<?php }
add_action( 'wp_head', 'bubble_viewport_tag' );

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bubble_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bubble' ),
		'id'            => 'sidebar-main',
		'description'   => esc_html__( 'Displays on posts and pages that use the default template.', 'bubble' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'bubble' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'A column will be automatically assigned to each widget inserted.', 'bubble' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	if ( function_exists( 'is_woocommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'bubble' ),
			'id'            => 'sidebar-shop',
			'description'   => esc_html__( 'Displays on WooCommerce pages.', 'bubble' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'bubble_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bubble_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'bubble-style', get_template_directory_uri() . '/style' . BUBBLE_THEME_CSS_PREFIX . '.css', array(), BUBBLE_THEME_VERSION );

	// FitVids.
	if ( !( function_exists( 'has_blocks' ) && has_blocks() ) ) {
		wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids' . BUBBLE_THEME_JS_PREFIX . '.js', array( 'jquery' ), '1.1', true );
	}
	// Flexslider.
	wp_register_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider' . BUBBLE_THEME_JS_PREFIX . '.js', array( 'jquery' ), '2.6.3', true );

	if ( is_home() && bubble_has_featured_posts() ) {
		wp_enqueue_script( 'jquery-flexslider' );
	}

	// Theme JavaScript.
	wp_enqueue_script( 'bubble-script', get_template_directory_uri() . '/js/jquery.theme' . BUBBLE_THEME_JS_PREFIX . '.js', array( 'jquery' ), BUBBLE_THEME_VERSION, true );

	// Mobile Menu Collapse and Sticky Logo Scaling localisation.
	$logo_sticky_scale = apply_filters( 'bubble_logo_sticky_scale', 0.775 );
	wp_localize_script( 'bubble-script', 'bubble', array(
		'collapse' => get_theme_mod( 'mobile_menu_collapse', 768 ),
		'logoScale' => is_numeric( $logo_sticky_scale ) ? $logo_sticky_scale : 0.775,
	) );

	// Theme icons.
	wp_enqueue_style( 'bubble-icons', get_template_directory_uri() . '/css/bubble-icons' . BUBBLE_THEME_CSS_PREFIX . '.css', array(), BUBBLE_THEME_VERSION );

	// Comment reply.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Skip link focus fix.
	wp_enqueue_script( 'bubble-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix' . BUBBLE_THEME_JS_PREFIX . '.js', array(), BUBBLE_THEME_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'bubble_scripts' );

/**
 * Enqueue FlexSlider.
 */
function bubble_enqueue_flexslider() {
	wp_enqueue_script( 'jquery-flexslider' );
}

/**
 * Enqueue Block Editor styles.
 */
function bubble_block_editor_styles() {
	wp_enqueue_style( 'bubble-block-editor-styles', get_template_directory_uri() . '/style-editor' . BUBBLE_THEME_CSS_PREFIX . '.css', BUBBLE_THEME_VERSION );
}
add_action( 'enqueue_block_editor_assets', 'bubble_block_editor_styles' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer-library/customizer-library.php';
require get_template_directory() . '/inc/customizer-options.php';
require get_template_directory() . '/inc/styles.php';
require get_template_directory() . '/inc/mods.php';

/**
 * Bubble Extras.
 */
require get_template_directory() . '/inc/extras/extras.php';
require get_template_directory() . '/inc/extras-options.php';

/**
 * Recommended plugins.
 */
require get_template_directory() . '/inc/recommended-plugins.php';

/**
 * Custom template tags.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Jetpack compatibility.
 */
if ( class_exists( 'Jetpack' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Page Builder by SiteOrigin compatibility.
 */
if ( defined( 'SITEORIGIN_PANELS_VERSION' ) ) {
	require get_template_directory() . '/inc/siteorigin-panels.php';
}

/**
 * Deprecated functions.
 */
require get_template_directory() . '/inc/deprecated.php';

/**
 * WooCommerce compatibility.
 */
if ( function_exists( 'is_woocommerce' ) ) {
	require get_template_directory() . '/woocommerce/functions.php';
}

/**
 *  Relate child stylesheet with parent stylesheet
 */
function bubble_child_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
}
add_action( 'wp_enqueue_scripts', 'bubble_child_styles' );

/**
 *  Fontawesome
 */
function enqueue_load_fa() {
	wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );

/*
** Functions to clean code
*/

// Remove "type" inside "script" and style tags added by Wordpress
function output_buffer_start() {
  ob_start("output_callback");
}
add_action('wp_loaded', 'output_buffer_start'); 

function output_callback($buffer) {
  return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
}

function output_buffer_end() {
 	if (ob_get_length() > 0) { ob_end_clean();}
}
add_action('shutdown', 'output_buffer_end');

// Remove "style" inside "body"
function output_buffer_start_2() {
	ob_start("output_callback_2");
  }
add_action('wp_loaded', 'output_buffer_start_2'); 

// Remove style tags added by SiteOrigin constructor at the footer
function output_callback_2($buffer) {
	return preg_replace('%<style[ ]\b[^>]*footer">(.*?)<\/style>%m', '', $buffer);
}

function output_buffer_end_2() {
 	if (ob_get_length() > 0) { ob_end_clean();}
}
add_action('shutdown', 'output_buffer_end_2');

// Remove "sizes" at "img"
function output_buffer_start_3() {
  ob_start("output_callback_3");
}

function output_callback_3($buffer) {
	return preg_replace('%[ ]sizes="(.*)px"%m', '', $buffer);
}

function output_buffer_end_3() {
 	if (ob_get_length() > 0) { ob_end_clean();}
}



/***
 * Bubble theme options at administration panel
 ***/
// Remove headers: wp_generator, wlwmanifest_link, rsd_link, access REST API.
$opt_theme_wpgenerator = get_option('opt_theme_wpgenerator');
  if($opt_theme_wpgenerator == 'yes'){
	remove_action('wp_head', 'wp_generator');
	remove_action( 'wp_head', 'wlwmanifest_link');
	remove_action( 'wp_head', 'rsd_link');
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	
	// Remove RSS version
	add_filter('the_generator', '__return_empty_string');

	// Remove version inside scripts and styles
	function quitar_version($src) {
		if (strpos($src, 'ver=')) {
			$src = remove_query_arg('ver', $src);
		}
		return $src;
	}
	add_filter('style_loader_src', 'quitar_version', 9999);
	add_filter('script_loader_src', 'quitar_version', 9999);
}

// Remove Wordpress version inside the backend footer and add other string
function scte_edit_backend_footer() {
	add_filter( 'admin_footer_text', 'scte_edit_backend_footer_text', 11 );
}

function scte_edit_backend_footer_text($content) {
	return 'Backend Bubble Theme';
}
add_action( 'admin_init', 'scte_edit_backend_footer' );

// Add headers X-Content-Type X-Frame-Options y X-XSS-Protection
function add_header_seguridad() {
	header( 'X-Content-Type-Options: nosniff' );
	header( 'X-Frame-Options: SAMEORIGIN' );
	header( 'X-XSS-Protection: 1;mode=block' );
}
add_action( 'send_headers', 'add_header_seguridad' );

// Add jQuery from backend
if(!function_exists('add_theme_scripts')){
	function add_theme_scripts() {
	  wp_enqueue_script( 'script', site_url().'/wp-content/themes/little-bubble/'.get_option("opt_theme_jquery_file") , array ( 'jquery' ), 1.1, true);
	}
	add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
}

// Add new widget zone at TopHeader
$opt_theme_top_header = get_option('opt_theme_top_header');
if($opt_theme_top_header == "yes"){
function widget_top_head() {
	register_sidebar( array(
		'name'          => __( 'Widgets Top-header', 'bubble' ),
		'id'            => 'top-header',
		'before_widget' => '<li class="elemento_widget">',
		'after_widget'  => '</li>',
	) );
}

add_action( 'widgets_init', 'widget_top_head' );
}

// Add new block at footer, generates a widget to adding blocks, same CSS basic footer
$opt_theme_footer2 = get_option('opt_theme_footer2');
if($opt_theme_footer2 == "yes"){
function widget_footer2() {
	register_sidebar( array(
		'name'          => __( 'Widgets Footer2', 'bubble' ),
		'id'            => 'footer-2',
		'before_widget' => '<div class="widget %1$s">',
		'after_widget'  => '</div>',
	) );
}

add_action( 'widgets_init', 'widget_footer2' );
}

// async load
function add_async_forscript($url) {
	if (strpos($url, '#asyncload')===false)
	  return $url;
	else if (is_admin())
	  return str_replace('#asyncload', '', $url);
	else
	  return str_replace('#asyncload', '', $url)."' async='async";
  }
  add_filter('clean_url', 'add_async_forscript', 11, 1);

// Add head with alternative title
function add_custom_titalt()
{
    $screens = ['post', 'page'];
    foreach ($screens as $screen) {
        add_meta_box(
            'titalt',           
            'Añadir título alternativo',  
            'titalt_head',  
            $screen                   
        );
    }
}
add_action('add_meta_boxes', 'add_custom_titalt');

function titalt_head($post)
{
	$input_titalt = get_post_meta($post->ID, '_meta_key_titalt', true);
	$check_titalt = get_post_meta($post->ID, '_meta_key_check_titalt', true);
	?>
	<p class="bloques_meta">
        <label for="titalt-pages"><?php _e("Título alternativo para las páginas:",'bubble'); ?><br> 
			<input type="text" name="input-titalt" id="input-titalt" value="<?php echo esc_html( $input_titalt ); ?>" />
		</label>
	</p>
	<?php if(!is_plugin_active( 'breadcrumbs-bubble/breadcrumbs-bubble.php' )){ ?>
	<p class="bloques_meta">
		<label for="titalt-pages">	
		<input type="checkbox" name="check-titalt" id="check-titalt" disabled="disabled"/>
		<?php _e("Habilitar Breadcrumbs para esta página",'bubble'); ?><br><small style="color:red;"><?php _e("Es necesario tener habilitado el plugin Bubble Breadcrumbs",'bubble'); ?></small>
		</label>
	</p>
	<?php }else{ ?>

	<p class="bloques_meta">
		<label for="titalt-pages">	
		<input type="checkbox" name="check-titalt" id="check-titalt" <?php checked( $check_titalt, 'on' ); ?>/>
		<span style="color:red;"><?php _e("Habilitar Breadcrumbs para esta página",'bubble'); ?></span>
		</label>
	</p>
	<?php
	}
}
function save_postdata_titalt($post_id)
{
    if (array_key_exists('input-titalt', $_POST)) {
        update_post_meta(
            $post_id,
            '_meta_key_titalt',
            $_POST['input-titalt']
		);
        update_post_meta(
            $post_id,
            '_meta_key_check_titalt',
            $_POST['check-titalt']
        );		
    }
}
add_action('save_post', 'save_postdata_titalt');




/* IMPORTANT NOTICE: Please don't edit this file; any changes made here will be lost during the theme update process. 
If you need to add custom functions, use the Code Snippets plugin (https://wordpress.org/plugins/code-snippets/) or a child theme. */
