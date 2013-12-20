<?php
/* Ra Settings Tab
 * Developed by: Andrew Verdin
 * For use by Rad Atom ONLY
 *
 * 
 */

add_action( 'admin_menu', 'add_ra_tab');

function add_ra_tab()
{
	add_menu_page( 
		'Ra Settings', 
		'Ra Settings', 
		'manage_options', 
		'ra_tab', 
		'render_ra_tab'
	);
	add_action( 'admin-init', 'register_mysettings' );
}
function register_mysettings(){
	register_setting( 'ra-settings-group', 'radatom_ra_snippets' );
}
/*
 * Creates Tab
 */
function render_ra_tab() 
{
	echo '<h1>';
		_e( 'Ra Settings', 'ra-toplevel');
	echo '</h1>';
	echo '<h4 class="subheader">';
	echo 'Hello and Welcome to the Ra Settings tab! Here you will find all sorts of things that you will find helpful when making a wordpress website! Below are buttons that lead to the different "Ra Wordpress Helpers" that are currently installed on this wordpress site!';
	echo '</h4>';
	echo '<a href="" class="button">';
		echo 'Ra Snippets';
	echo '</a>';
}


?>