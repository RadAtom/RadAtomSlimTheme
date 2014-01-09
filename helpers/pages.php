<?php
require_once('excerpts.php');

add_action( 'add_meta_boxes', 'add_ra_snippet_box');
add_action( 'save_post', 'ra_snippet_save' );

/*
 *Adds Ra Snippet box to Pages and Posts
 */
function add_ra_snippet_box() {

	$screens = array( 'post', 'page' );

	foreach ( $screens as $screen ) {
		add_meta_box(
			'ra_snippet',
			__( 'Ra Snippets', 'ra_snippet_textdomain' ),
			'render_ra_snippet_box',
			$screen,
			'side'
		);
	}
}
/*
 *Saves Data
 */
function ra_snippet_save( $post_id ) {

	$nonce = $_POST['ra_snippet_box_nonce'];

	//Restricts saves to 'Submits' only
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;
	//Checks user permissions
	if ( 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) )
			return $post_id;
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) )
			return $post_id;
	}
	//Sanitizes input

	$mydata = sanitize_text_field( $_POST['ra_snippet_field'] );

	//Updates Ra Snippet field
	update_post_meta( $post_id, 'ra_snippet_field', $mydata );
}
/*
 *Prints Ra Snippet box content
 */
function render_ra_snippet_box( $post ) {
	//Adds nonce
	wp_nonce_field( 'ra_snippet_box', 'ra_snippet_box_nonce' );

	$value = get_post_meta( $post->ID, 'ra_snippet_field', true );

	echo '<label for="ra_snippet_field">';
		_e( 'Ra Snippet for this Page : ', 'ra_snippet_textdomain');
	echo '</label>';
	echo '<select id="ra_snippet_field" name="ra_snippet_field">';
			echo '<option value="'.$value.'">';
				_e( 'Click Here to See', 'ra_snippet_textdomain' );
			echo '</option>';
			echo '<option value="">';
				_e( 'Remove Snippet', 'ra_snippet_textdomain' );
			echo '</option>';
			echo '<option value="http://schema.org/LocalBusiness">';
				_e( 'LocalBusiness', 'ra_snippet_textdomain' );
			echo '</option>';	
	echo '</select>';
	echo '<br>';
	echo '<br>';
	if( !isset( $_POST['schema_snippet_field'] ) ) { 
		echo 'Currently Selected Snippet : '.$value.'';
	}
}



















