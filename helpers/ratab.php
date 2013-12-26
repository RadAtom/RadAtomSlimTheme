<?php
/* Ra Settings Tab
 * Developed by: Andrew Verdin
 * For use by Rad Atom ONLY
 *
 * 
 */


add_action( 'admin_menu', 'add_ra_settings' );
add_action( 'admin_init', 'ra_tab_init' );

function add_ra_settings() {
    add_menu_page(
        'Ra Settings',
        'Ra Settings',
        'manage_options',
        'ra-settings',
        'render_ra_settings');
}

function ra_tab_init() {
    register_setting( 'ra_settings_tab', 'ra_settings' );
    wp_enqueue_style( 'panel_style', get_template_directory_uri().'/helpers/css/rasettings.css', false, '1.0', 'all');
}

function render_ra_settings() {
    echo '<div class="wrap">';
        echo '<h2>';
        screen_icon();
        _e( 'Ra Settings' );
        echo '</h2>';
        echo '<div id="ra_settings_header">';
        echo '<ul>';
            echo '<li><a href="">Documentation</a></li>';
            echo '<p><span id="seperator">|</span></p>';
            echo '<li><a href="">Support</a></li>';
            echo '<p><span id="seperator">|</span></p>';                echo '<li><a href="">More Ra Wordpress Helpers</a></li>';
            echo '<p><span id="radatomname">Rad Atom Technologies</span></p>';
        echo '</ul>';
        echo '</div>';
        echo '<div id="ra-settings-content">';
            echo '<div id="ra_settings_body">';
            	echo 'Hello and Welcome to the Ra Settings tab, where you will find all the technical settings of all your Ra Wordpress Helpers! Below you will find buttons that lead to the different Ra Wordpress Helper settings you have installed. If you have any questions or concerns there is a "Documentation" link that leads to the documentations of the Ra Wordpress Helpers, or you can just click on the "Support" link.';
            echo '</div>';
            echo '<div id="ra_settings_helpers">';
            	echo '<a href="" class="button">Ra Snippets</a>';
            echo '</div>';
            echo '<div id="ra_settings_footer">';
            echo '</div>';
        echo '</div>';
    echo '</div>';
}