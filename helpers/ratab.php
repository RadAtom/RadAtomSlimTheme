
<?php
/* Rad Atom Tab
 * Developed by: Andrew Verdin
 * For use by Rad Atom ONLY
 *
 * 
 */

class RadAtomTab {
	function __construct() {
		add_menu_page( 'Rad Atom Tab', 'Ra Tab', 'manage_options', 'ra_tab', array( $this, 'add_ra_tab') );
	}
	/*
	 * Creates Tab
	 */
	public function add_ra_tab() 
	{
		echo '<h2>';
		__( 'Ra Tab', 'ra-toplevel');
		echo '</h2>';
	}

}



?>