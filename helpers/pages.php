<?php

/**
 * Calls the class on the post edit screen.
 */
function call_someClass() {
    new RadAtomWordpressPages();
}

if ( is_admin() ) {
	new RadAtomWordpressPages();
}

class RadAtomWordpressPages {
	function __construct() {
    	add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
   }


	public function add_meta_box() {
		add_meta_box(
			'schema_snippet'
			,'Schema Rich Snippet'
			,array( $this, 'render_meta_box_content' )
			,'page'
			,'advanced'
			,'high'
		);
	}

	public function save() {

	}

	public function render_meta_box_content( $post ) {
		wp_nonce_field( 'rad_atom_snippet_box', 'rad_atom_snippet_box_nonce');

		$value = get_post_meta( $post->ID, 'schema_key');
		echo var_dump($value);

		echo '<label for="snippet_field">';
		_e('Description', 'snippit_textdomain');
		echo '</label>';
		echo '<input type="text" id="snippet_field" name="snippet_field" value="' . esc_attr( $value ) .'" size="25"/>';
	}

}



