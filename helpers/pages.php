<?php

/**
 * Calls the class on the post edit screen.
 */
function call_RadAtomWordpressPages() {
    new RadAtomWordpressPages();
}

if ( is_admin() ) {
	new RadAtomWordpressPages();
}

class RadAtomWordpressPages {
	function __construct() {
    	add_action( 'add_meta_boxes', array( $this, 'add_ra_snippet' ) );
		add_action( 'save_post', array( $this, 'save' ) );
   }


	public function add_ra_snippet() {
		add_meta_box(
			'ra_snippet'
			,__( 'Rad Atom Snippet Box', 'snippet_textdomain')
			,array( $this, 'render_ra_snippet_box' )
			,'page'
			,'advanced'
			,'high'
		);
	}


	public function save( $post_id ) {

		$nonce = $_POST['ra_snippet_box_nonce'];


		//if there is autosave
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		//check permissions
		if ( 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id) )
				return $post_id;
		}
		else {
			if ( ! current_user_can( 'edit_post', $post_id) )
				return $post_id;
		}

	$snippet = sanitize_text_field( $_POST['ra_snippet_field'] );

	update_post_meta( $post_id, 'ra_snippet_field', $snippet );
	
	}

	
	public function render_ra_snippet_box( $page ) {
		wp_nonce_field( 'ra_snippet_box', 'ra_snippet_box_nonce');

		echo '<label for="ra_snippet_field">';
		_e('Rich Snippet for this Page : ', 'snippet_textdomain');
		echo '</label>';
		echo '<input type="text" id="ra_snippet_field" name="ra_snippet_field" value="'. get_post_meta( $page->ID, 'ra_snippet_field', true).'" size="25"/>';
	}


}



