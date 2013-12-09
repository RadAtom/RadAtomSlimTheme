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

	$schema_snippet = sanitize_text_field( $_POST['schema_snippet_field'] );

	if( !isset( $_POST['schema_snippet_field'] ) ) {
		update_post_meta( $post_id, 'schema_snippet_field', $_POST['schema_snippet_field'] );
	} elseif( isset( $_POST['schema_snippet_field'] ) ) {
		update_post_meta( $post_id, 'schema_snippet_field', $_POST['schema_snippet_field'] );
	}
	if( isset( $_POST['ra_snippet_field'] ) ) {

		$ra_snippet = sanitize_text_field( $_POST['ra_snippet_field'] );

		update_post_meta( $post_id, 'schema_snippet_field', $_POST['schema_snippet_field'] );
		update_post_meta( $post_id, 'ra_snippet_field', $_POST['ra_snippet_field'] );
	}
}

	
	public function render_ra_snippet_box( $page ) {

		$ra_value = get_post_meta( $page->ID, 'ra_snippet_field', true);

		$schema_value = get_post_meta( $page->ID, 'schema_snippet_field', true);

		$value = trim($schema_value, 'http://');


		wp_nonce_field( 'ra_snippet_box', 'ra_snippet_box_nonce');
		echo '<label for="schema_snippet_field">';
		_e('Schema Snippet Selector : ', 'schema_textdomain');
		echo '<br>';
		echo '</label>';
		echo '<select name="schema_snippet_field" id="schema_snippet_field">';
			echo '<option value="" selected="selected">';
			_e( 'Click to See', 'schema_textdomain' );
			echo '</option>';
			echo '<option value="http://schema.org/LocalBusiness" >';
			echo 'LocalBusiness';
			echo '</option>';	
		echo '</select>';
		echo '<br>';
		if( !isset( $_GET['schema_snippet_field'] ) ) { 
			if( $schema_value == 'http://schema.org/LocalBusiness'){
				echo '<br>';
				echo $value;
				echo '<br>';
				echo '<label for="ra_snippet_field">';
				_e('Name of Business : ', 'snippet_textdomain');
				echo '</label>';
				echo '<input type="text" name="ra_snippet_field" id="ra_snippet_field" value="'. $ra_value.'" size="20"/>';
			}else{
				echo $value;
			}
		}
	}
	
}


