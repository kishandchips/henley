<?php
/**
 * Henley theme functions and definitions
 *
 * @package henley
 * @since henley 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since henley 1.0
 */

if ( ! function_exists( 'henley_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since henley 1.0
 */
function henley_setup() {

	require( get_template_directory() . '/inc/custom_post_type.php' );

	require( get_template_directory() . '/inc/options.php' );

	register_nav_menus( array(
		'primary_header' => __( 'Primary Header Menu', 'henley' ),
		'primary_footer' => __( 'Primary Footer Menu', 'henley' )
	) );

	add_editor_style('css/editor-styles.css');
	
}
endif; // henley_setup
add_action( 'after_setup_theme', 'henley_setup' );

add_action('tiny_mce_before_init', 'custom_tinymce_options');
if ( ! function_exists( 'custom_tinymce_options' )) {
	function custom_tinymce_options($init){
		$init['apply_source_formatting'] = true;
		return $init;
	}
}

	// Custom post types

	$work_item = new Custom_Post_Type( 'Work Item', 
 		array(
 			'rewrite' => array( 'with_front' => false, 'slug' => get_page_uri(get_kishandchips_option('work_archive_page_id'))),
 			'capability_type' => 'post',
 		 	'publicly_queryable' => true,
   			'has_archive' => true, 
    		'hierarchical' => true,
    		'exclude_from_search' => false,
    		'menu_position' => null,
    		'supports' => array('title', 'thumbnail', 'editor'),
    		'plural' => 'Our Work'
   		)
   	);	

 	// global $wp_rewrite;
	// $wp_rewrite->flush_rules();