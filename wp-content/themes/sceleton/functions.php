<?php

/**
 * Initial setup of the theme
 * Contains theme supports, language setup, nav menus etc.
 */

function sceleton_setup() {

	/**
	 * Make theme available for translation.
	 * Loads wp-content/languages/themes/sceleton-sv_SE.mo.
	 * Loads wp-content/themes/sceleton/languages/sv_SE.mo.
	 */
	load_theme_textdomain( 'sceleton', trailingslashit( WP_LANG_DIR ) . 'themes/' );
	load_theme_textdomain( 'sceleton', get_template_directory() . '/languages' );

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


	//Addar logga 
	add_theme_support( 'custom-logo', array(
		'height:' => 65,
		'width:' => 276,
	) );


	/**
	 * Styles the visual editor to resemble the theme style
	 */
	add_editor_style( array( 'editor-style.css' ) );

	/**
	 * Add menu positions for wp_nav_menu
	 */
	register_nav_menus( array(
		'primary' => 'Huvudmeny',
	) );
	

}
add_action( 'after_setup_theme', 'sceleton_setup' );


/**
 * Enqueue stylesheets and javascript on frontend.
 */
function sceleton_assets_enqueue() {

	if ( is_admin() ) {
		return;
	}

	/**
	 * IE < 9 scripts
	 * Loads in polyfills for IE 7 and 8
	 */
	$u = $_SERVER['HTTP_USER_AGENT'];
	$is_ie7  = (bool) preg_match( '/msie 7./i', $u );
	$is_ie8  = (bool) preg_match( '/msie 8./i', $u );
	if ( $is_ie7 || $is_ie8 ) {
		wp_enqueue_script( 'selectivizr', get_template_directory_uri() . '/libraries/selectivizr-min.js' );
		wp_enqueue_script( 'respond', get_template_directory_uri() . '/libraries/respond.min.js' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/**
	 * Additional scripts
	 */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'picturefill', get_template_directory_uri() . '/libraries/picturefill.min.js', '', '', false );
	//wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/includes/js/modernizr-custom.js', '', '', true );
	// wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/libraries/isotope.pkgd.min.js', '', '', true );
	require_once 'includes/walkers/walker-nav-menu.php';
	require_once 'includes/walkers/walker-nav-menu-mobile.php';
	
	//shortcode
	require_once get_template_directory() . '/includes/functions/shortcodes.php';
	add_shortcode( 'clickboxes', 'clickboxes' );
	/**
	 * Our custom script
	 * Ready to be used with wp_localize_script() for localization of js variables
	 */
	wp_register_script( 'script', get_template_directory_uri() . '/includes/js/script-min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'script' );

	/**
	 * Styles
	 */
	wp_enqueue_style( 'style', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'sceleton_assets_enqueue', 11 );



/**
 * Register widget areas
 */
function sceleton_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Sidebar Widgets', 'sceleton' ),
		'id'   => 'sidebar-widgets',
		'description'   => __( 'These are widgets for the sidebar.','sceleton' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));
}
add_action( 'widgets_init', 'sceleton_widgets_init' );


/**
 * Adds async parameter to specific scripts by targetting their handles
 * Useful for scripts loading in <head>
 */
function sceleton_make_scripts_async( $tag, $handle, $src ) {
	if ( 'picturefill' != $handle ) {
		return $tag;
	}
	return str_replace( '<script', '<script async', $tag );
}
add_filter( 'script_loader_tag', 'sceleton_make_scripts_async', 10, 3 );


/**
 * Stop Redirect Canonical from trying to redirect 404 errors.
 * @link https://core.trac.wordpress.org/ticket/16557
 */
function sceleton_stop_404_guessing( $url ) {
	return ( is_404() ) ? false : $url;
}
add_filter( 'redirect_canonical', 'sceleton_stop_404_guessing' );


/**
 * Sanitize all uploads from anything not a-Z 0-9
 */
function sceleton_extended_sanitize_file_name( $filename ) {
	$sanitized_filename = remove_accents( $filename );
	return $sanitized_filename;
}
add_filter( 'sanitize_file_name', 'sceleton_extended_sanitize_file_name', 10, 2 );


/**
 * Modifies the default comment form fields to better suit our needs.
 * @param  array $fields An array of field markups
 */
function sceleton_modify_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields['author'] = '
	<div class="comment-form-item comment-form-name">' .
		'<label for="author">' . __( 'Name', 'sceleton' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
		'<input type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
	</div>';

	$fields['email'] = '
	<div class="comment-form-item comment-form-email">
		<label for="email">' . __( 'Email', 'sceleton' ) . '</label> ' .
		( $req ? '<span class="required">*</span>' : '' ) .
		'<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />
	</div>';

	//we don't want their url..
	$fields['url'] = '';

	return $fields;
}
add_filter( 'comment_form_default_fields', 'sceleton_modify_comment_form_fields', 10, 1 );


/**
 * Remove emoji support (which adds external files to sources)
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Remove The SEO Framework notices in source code
 */
add_filter( 'the_seo_framework_indicator', '__return_false' );
add_filter( 'sybre_waaijer_<3', '__return_false' );
add_filter( 'the_seo_framework_indicator_timing', '__return_false' );

/**
 * Move priority for the SEO meta box below ACF etc.
 */
function sceleton_seo_metabox_prio() {
	return 'low';
}
add_filter( 'the_seo_framework_metabox_priority', 'sceleton_seo_metabox_prio' );


/**
 * Add reference to Tigerton in the admin footer
 */
function sceleton_custom_admin_footer() {
	echo '<a href="http://tigerton.se/">' . __( 'Webbplats byggd av Tigerton Webbyrå', 'sceleton' ) . '</a>';
}
add_filter( 'admin_footer_text', 'sceleton_custom_admin_footer' );


/**
 * NOTICE: Custom Code are added below this mark.
 */

function create_kunder_post_type() {
    $labels = array(
        'name' => __('Kunder', 'kunder'),
        'singular_name' => __('Kund', 'kunder'),
        'add_new' => __('Add New', 'kunder'),
        'add_new_item' => __('Add New Kund', 'kunder'),
        'edit_item' => __('Edit Kund', 'kunder'),
        'new_item' => __('New Kund', 'kunder'),
        'view_item' => __('View Kund', 'kunder'),
        'search_items' => __('Search Kunder', 'kunder'),
        'not_found' => __('No Kunder found', 'kunder'),
        'not_found_in_trash' => __('No Kunder found in Trash', 'kunder'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'rewrite' => array('slug' => 'kunder'),
        'capability_type' => 'post',
        // 'taxonomies' => array('category', 'post_tag')
    );

    register_post_type('kunder', $args);
}

add_action('init', 'create_kunder_post_type');

	
add_post_type_support( 'page', 'excerpt' );
