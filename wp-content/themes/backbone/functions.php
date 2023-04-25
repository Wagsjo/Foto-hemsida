<?php
/**
 * Initial setup of the theme
 * Contains theme supports, language setup, nav menus etc.
 */
function backbone_setup() {

	/**
	 * Make theme available for translation.
	 * Loads wp-content/languages/themes/backbone-sv_SE.mo.
	 * Loads wp-content/themes/backbone/languages/sv_SE.mo.
	 */
	load_theme_textdomain( 'backbone', trailingslashit( WP_LANG_DIR ) . 'themes/' );
	load_theme_textdomain( 'backbone', get_template_directory_uri() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 *  Declare support for selective refreshing of widgets.
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 *  Declare support for woocommerce.
	 */
	add_theme_support( 'woocommerce' );
   add_theme_support( 'wc-product-gallery-lightbox' );
   add_theme_support( 'wc-product-gallery-slider' );

	$logo_defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $logo_defaults );

	/**
	 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'widgets',
	) );

	/**
	 * Styles the visual editor to resemble the theme style
	 * Uncomment to use
	 */
	//add_editor_style( array( 'editor-style.css' ) );

	/**
	 * Add menu positions for wp_nav_menu
	 */
	register_nav_menus( array(
		'top-menu' => 'Top menu',
		'primary' => 'Primary menu',
		'footer' => 'Footer menu',
	) );

}
add_action( 'after_setup_theme', 'backbone_setup' );

/** Mega Menu Walker class */
require_once 'includes/walkers/class-backbone-mega-menu-walker.php';
/** Mobile Nav Walker class */
require_once 'includes/walkers/class-backbone-mobile-nav-walker.php';
//test this sht
require_once 'includes/walkers/walker-nav-menu.php';





/**
 * Enqueue stylesheets and javascript on frontend.
 */
function backbone_assets_enqueue() {

	if ( is_admin() ) {
		return;
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/**
	 * Additional scripts
	 */
	// Start remove
	//wp_deregister_script( 'jquery' );
	//wp_enqueue_script( 'jquery' );
	// End remove
	wp_enqueue_script( 'picturefill', get_template_directory_uri() . '/assets/js/libraries/picturefill.min.js', '', '', false );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/libraries/modernizr-custom.js', '', '', true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/libraries/swiper-bundle.min.js', '', '', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/libraries/isotopemasonry.min.js', '', '', true );

	/**
	 * Our custom script
	 * Ready to be used with wp_localize_script() for localization of js variables
	 */
 	wp_enqueue_script( 'scrolling-header', get_template_directory_uri() . '/assets/js/scrolling-header.js', array( 'jquery' ), filemtime( get_template_directory() . '/assets/js/scrolling-header.js' ), true );
	wp_register_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), filemtime( get_template_directory() . '/assets/js/script.js' ), true );
	wp_enqueue_script( 'script' );
	wp_localize_script(
		'script',
		'babo',
		array(
			// 'page_id' => get_queried_object_id(),
			// 'ajax_url'  => admin_url( 'admin-ajax.php' ),
			// 'security'  => wp_create_nonce( 'zcalc-security-nonce' ),
		)
	);

	// wp_dequeue_script( 'scrolling-header' ); //Remove scrolling header

	/**
	 * Styles
	 */

	wp_enqueue_style( 'bb-style', get_template_directory_uri() . '/style.css', array(), filemtime( get_template_directory() . '/style.css' ), 'all' );

}
add_action( 'wp_enqueue_scripts', 'backbone_assets_enqueue', 11 );

/**
 * admin style
 */
function backbone_add_admin_styles() {
  wp_enqueue_style('admin-style', get_template_directory_uri().'/assets/admin-style.css');
}
add_action('admin_enqueue_scripts', 'backbone_add_admin_styles');


/**
 * Remove
 * 1. WP-version
 *	2. WLW-manifest
 *	3. REST link
 *	4. Oembed link
 *	5. REST link header
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );


/**
 * Disable self pingback
 */
function disable_pingback( &$links ) {
	foreach ( $links as $l => $link )
	if ( 0 === strpos( $link, get_option( 'home' ) ) )
		unset($links[$l]);
}
add_action( 'pre_ping', 'disable_pingback' );

/**
 * Remove dns-prefetch Link from WordPress Head
 */
add_action( 'init', 'remove_dns_prefetch' );
function  remove_dns_prefetch () {
   remove_action( 'wp_head', 'wp_resource_hints', 2, 99 );
}

/**
 * Disable RSD link (pingback, xmlrpc)
 */
add_action( 'init', 'disable_rsd_link' );
function disable_rsd_link() {
	remove_action( 'wp_head', 'rsd_link', 10, 0 );
}

/**
 * Disable shortlink
 */
add_action( 'init', 'disable_shortlink' );
function disable_shortlink() {
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
}

/**
 * Disable embed
 */
add_action( 'wp_footer', 'disable_embed' );
function disable_embed(){
	wp_dequeue_script( 'wp-embed' );
}

/**
 * Disable xmlrpc
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
	return array();
	}
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
	/** This filter is documented in wp-includes/formatting.php */
	$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

	$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}

	return $urls;
}

/**
 * Disable dashicons in frontend
 */
function wpdocs_dequeue_dashicon() {
	if ( current_user_can( 'update_core' ) ) {
	   return;
	}
	wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );

/**
 * Register widget areas
 */
function backbone_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Sidebar Widgets', 'backbone' ),
		'id'   => 'sidebar-widgets',
		'description'   => __( 'These are widgets for the sidebar.', 'backbone' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));
}
add_action( 'widgets_init', 'backbone_widgets_init' );

/**
 * Sanitize all uploads from anything not a-Z 0-9
 */
function backbone_extended_sanitize_file_name( $filename ) {
	$sanitized_filename = remove_accents( $filename );
	return $sanitized_filename;
}
add_filter( 'sanitize_file_name', 'backbone_extended_sanitize_file_name', 10, 2 );

/**
 * Add reference to Tigerton in the admin footer
 */
function backbone_custom_admin_footer() {
	echo '<a href="https://tigerton.se/" target="_blank">' . __( 'Built by Tigerton', 'backbone' ) . '</a>';
}
add_filter( 'admin_footer_text', 'backbone_custom_admin_footer' );

/**
 * Add ACF save with local JSON
 */
add_filter('acf/settings/save_json', 'backbone_acf_json_save_point');
function backbone_acf_json_save_point( $path ) {
	// update path
	$path = get_template_directory() . '/assets/acf-json';

	// return
	return $path;
}

/**
 * Add ACF with local JSON from theme
 */
 add_filter('acf/settings/load_json', 'backbone_acf_json_load_point');
 function backbone_acf_json_load_point( $paths ) {
 	// remove original path (optional)
 	unset( $paths[0] );

 	// append path
 	$paths[0] = get_template_directory() . '/assets/acf-json';

 	// return
 	return $paths;

 }

/**
 * Custom functions files
 * Uncomment to use
 */

//include_once( 'includes/functions/custom.php' );
include_once( 'includes/functions/acf-settings.php');
include_once( 'includes/functions/acf-sections.php');
include_once( 'includes/functions/acf-columns.php');
include_once( 'includes/functions/lightboxes.php');
require_once 'includes/walkers/walker-nav-menu.php';

/**
 * NOTICE: Custom Code are added below this mark.
 */

 /**
 * ACF-options page
 */
add_action('acf/init', 'bb_acf_options_page', 10 );
function bb_acf_options_page() {
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'Alternativ',
			'menu_title'	=> 'Alternativ',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Header',
			'menu_title'	=> 'Header',
			'parent_slug'	=> 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Footer',
			'menu_title'	=> 'Footer',
			'parent_slug'	=> 'theme-general-settings',
		));

	}
}


//Ändrar text på previous och next knapparna inne på posterna.
add_filter( 'previous_post_link', function( $output, $format, $link, $post ) {
	if ( ! $post ) {
	return '';
  }
  return sprintf(
	  '<a href="%1$s" class="nav-previous" title="%2$s"><span class="prev"><img src="http://annalisafotobb.local/wp-content/uploads/2023/02/32-arrow-left-flat-1.gif" alt=""></span><p>' . $post->post_title . '</p></a>',
		get_permalink( $post ),
		$post->post_title
  );
}, 10, 4 );
add_filter( 'next_post_link', function( $output, $format, $link, $post ) {
	if ( ! $post ) {
	return '';
  }

  return sprintf(
	  '<a href="%1$s" class="nav-previous" title="%2$s"><p>' . $post->post_title . '</p><span class="prev"><img src="http://annalisafotobb.local/wp-content/uploads/2023/02/31-arrow-right-flat-1.gif" alt=""></span></a>' ,
		get_permalink( $post ),
		$post->post_title
  );
}, 10, 4 );