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

	require( get_template_directory() . '/inc/options.php' );

	register_nav_menus( array(
		'primary_header' => __( 'Primary Header Menu', 'henley' ),
		'primary_footer' => __( 'Primary Footer Menu', 'henley' ),
		'secondary_footer' => __( 'Secondary Footer Menu', 'henley' ),
	) );	

	add_editor_style('css/editor-styles.css');
}
endif; // henley_setup

add_shortcode('call', 'call_function');
function call_function() {
	return '<div id="call-now">
		<h1>Call Now:</h1> <p class="number">0800-XXX-XXX</p>
		<p>International Toll-free</p>
		<a href="#" class="button">Click To Call</a>
	</div>';
}


add_action( 'after_setup_theme', 'henley_setup' );

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Page Sidebar',
		'id' => 'page-sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));	
	register_sidebar(array(
		'name'=> 'Footer First Column',
		'id' => 'footer-first',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name'=> 'Footer Second Column',
		'id' => 'footer-second',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name'=> 'Footer Third Column',
		'id' => 'footer-third',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	
}

add_action('tiny_mce_before_init', 'custom_tinymce_options');
if ( ! function_exists( 'custom_tinymce_options' )) {
	function custom_tinymce_options($init){
		$init['apply_source_formatting'] = true;
		return $init;
	}
}

function get_henley_option($option){
	$options = get_option('henley_theme_options');
	return $options[$option];
}

add_action('init', 'set_custom_post_types');

if(!function_exists('set_custom_post_types')) {
	function set_custom_post_types(){
		require( get_template_directory() . '/inc/custom_post_type.php' );

		$news = new Custom_Post_Type( 'News Item', 
	 		array(
	 			'rewrite' => array( 'with_front' => false, 'slug' => get_page_uri(get_henley_option('news_archive_page_id'))),
	 			'capability_type' => 'post',
	 		 	'publicly_queryable' => true,
	   			'has_archive' => true, 
	    		'hierarchical' => true,
	    		'exclude_from_search' => false,
	    		'menu_position' => null,
	    		'supports' => array('title', 'thumbnail', 'editor'),
	    		'plural' => 'News'
	   		)
	   	);	

	 	// global $wp_rewrite;
		// $wp_rewrite->flush_rules();
}}

add_action("gform_field_standard_settings", "custom_gform_standard_settings", 10, 2);
function custom_gform_standard_settings($position, $form_id){
    if($position == 25){
    	?>
        <li style="display: list-item; ">
            <label for="field_placeholder">Placeholder Text</label>
            <input type="text" id="field_placeholder" size="35" onkeyup="SetFieldProperty('placeholder', this.value);">
        </li>
        <?php
    }
}

add_action('gform_enqueue_scripts',"custom_gform_enqueue_scripts", 10, 2);
function custom_gform_enqueue_scripts($form, $is_ajax=false){
    ?>
<script>
    jQuery(function(){
        <?php
        foreach($form['fields'] as $i=>$field){
            if(isset($field['placeholder']) && !empty($field['placeholder'])){
                ?>
                jQuery('#input_<?php echo $form['id']?>_<?php echo $field['id']?>').attr('placeholder','<?php echo $field['placeholder']?>');
                <?php
            }
        }
        ?>
    });
    </script>
    <?php
}