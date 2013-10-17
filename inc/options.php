<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'henley_options', 'henley_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'henley' ), __( 'Theme Options', 'henley' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}



/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . wp_get_theme() . __( ' Theme Options', 'henley' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'henley' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'henley_options' ); ?>
			<?php $options = get_option( 'henley_theme_options' ); ?>

			<table class="form-table">
			
				<tr valign="top"><th scope="row"><?php _e( 'News Page ID', 'henley' ); ?></th>
					<td>
						 <input id="henley_theme_options[news_archive_page_id]" class="regular-text" type="text" name="henley_theme_options[news_archive_page_id]" value="<?php esc_attr_e( $options['news_archive_page_id'] ); ?>" />
					</td>
				</tr>	
			
			</table>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'henley' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	$input['news_archive_page_id'] = wp_filter_nohtml_kses( $input['news_archive_page_id'] );
	return $input;
}