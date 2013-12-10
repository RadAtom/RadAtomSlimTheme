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
		if( isset( $_POST['name_snippet_field'] ) ) {

			$name_snippet = sanitize_text_field( $_POST['name_snippet_field'] );

			$address_snippet = sanitize_text_field( $_POST['address_snippet_field'] );

			$phone_snippet = sanitize_text_field( $_POST['phone_snippet_field'] );

			$email_snippet = sanitize_text_field( $_POST['email_snippet_field'] );

			update_post_meta( $post_id, 'schema_snippet_field', $_POST['schema_snippet_field'] );
			update_post_meta( $post_id, 'name_snippet_field', $_POST['name_snippet_field'] );
			update_post_meta( $post_id, 'address_snippet_field', $_POST['address_snippet_field'] );
			update_post_meta( $post_id, 'phone_snippet_field', $_POST['phone_snippet_field'] );
			update_post_meta( $post_id, 'email_snippet_field', $_POST['email_snippet_field'] );
		}
	}


	public function render_ra_snippet_box( $page ) {

		$schema_value = get_post_meta( $page->ID, 'schema_snippet_field', true);

		$value = trim($schema_value, '/:/.///');
		
		$name_value = get_post_meta( $page->ID, 'name_snippet_field', true);

		$address_value = get_post_meta( $page->ID, 'address_snippet_field', true);

		$phone_value = get_post_meta( $page->ID, 'phone_snippet_field', true);

		$email_value = get_post_meta( $page->ID, 'email_snippet_field', true);


		wp_nonce_field( 'ra_snippet_box', 'ra_snippet_box_nonce');
		echo '<label for="schema_snippet_field">';
		_e('Schema Snippet Selector : ', 'schema_textdomain');
		echo '<br>';
		echo '</label>';
		echo '<select name="schema_snippet_field" id="schema_snippet_field">';
    		if( !isset( $_POST['$schema_snippet_field'] ) ) { 
					if( $schema_value == 'http://schema.org/LocalBusiness'){
						echo '<option value="Select a Snippet">';
						_e( 'Click to See', 'schema_textdomain' );
						echo '</option>';
						echo '<option value="http://schema.org/LocalBusiness" selected="selected">';
						echo 'LocalBusiness';
						echo '</option>';
					}else{
						echo '<option value="Select a Snippet">';
						_e( 'Click to See', 'schema_textdomain' );
						echo '</option>';
						echo '<option value="http://schema.org/LocalBusiness">';
						echo 'LocalBusiness';
						echo '</option>';
					}
				}
		echo '</select>';

		echo '<br>';
		if( !isset( $_POST['schema_snippet_field'] ) ) { 
			if( $schema_value == 'http://schema.org/LocalBusiness'){
				echo '<label id="name_snippet_field">';
				echo '<br>';
				echo $value;
				echo '<br>';
				echo '<br>';
				_e('Name of Business : ', 'snippet_textdomain');
				echo '</label>';
				echo '<input type="text" name="name_snippet_field" id="name_snippet_field" value="'. $name_value.'" size="20"/>';
				echo '<br>';
				echo '<br>';
				echo '<label for="address_snippet_field">';
				_e('Address of Business : ', 'snippet_textdomain');
				echo '</label>';
				echo '<input type="text" name="address_snippet_field" id="address_snippet_field" value="'. $address_value.'" size="20"/>';
				echo '<br>';
				echo '<br>';
				echo '<label for="phone_snippet_field">';
				_e('Phone Number of Business : ', 'snippet_textdomain');
				echo '</label>';
				echo '<input type="text" name="phone_snippet_field" id="phone_snippet_field" value="'. $phone_value.'" size="20"/>';
				echo '<br>';
				echo '<br>';
				echo '<label for="email_snippet_field">';
				_e('Email of Business : ', 'snippet_textdomain');
				echo '</label>';
				echo '<input type="text" name="email_snippet_field" id="email_snippet_field" value="'. $email_value.'" size="20"/>';
			}else{
				echo '<br>';
				echo 'Select a Snippet from the menu above this sentence.';
			}
		}

	}
	
}





