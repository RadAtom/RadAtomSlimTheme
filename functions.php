<?php

require_once('radatomautoload.php');

function register_my_menus() {
  register_nav_menus(
    array(
      'menu-header' => __( 'Header Menu' ),
      'menu-footer' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


function my_widgets_init() {
	register_sidebar(array(
	'name' => __( 'Sidebar' ),
	'id' => 'sidebar',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
	));

	//this is for the homepage reliability info
	register_sidebar(array(
	'name' => __( 'Plan Home-Page' ),
	'id' => 'plan',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5>',
	'after_title' => '</h5>',
	));

	//this is for the efficient bit on the home page
	register_sidebar(array(
	'name' => __( 'Produce Home-Page' ),
	'id' => 'produce',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5>',
	'after_title' => '</h5>',
	));

	//this is for the precise bit on the home page
	register_sidebar(array(
	'name' => __( 'Deploy Home-Page' ),
	'id' => 'deploy',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5>',
	'after_title' => '</h5>',
	));

	//this is for the news letter
	register_sidebar(array(
	'name' => __( 'Footer News-Letter' ),
	'id' => 'footer-news-letter',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
	));

	//this is for the follow us section
	register_sidebar(array(
	'name' => __( 'Footer Follow-Us' ),
	'id' => 'footer-follow-us',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
	));

	//this is for the follow us section
	register_sidebar(array(
	'name' => __( 'Portfolio Widgets' ),
	'id' => 'portfolio',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
	));
}
add_action( 'init', 'my_widgets_init' );

//just a little dev trick that I use to make things simpler when using Foundation CSS
function my_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'my_filter_head');

//so we can have some featured images
add_theme_support( 'post-thumbnails' );

//keeping the generator tag hidden like a silly man
remove_action('wp_head', 'wp_generator');


function my_deregister_javascript() {
        if (!is_admin()) {
                wp_deregister_script('jquery');
        }
}
add_action( 'wp_enqueue_scripts', 'my_deregister_javascript', 100 );

class HeaderSettings
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_theme_page(
            'Header', 
            'Header', 
            'manage_options', 
            'radatom-header-settings', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'radatom_theme_options' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>Header Settings</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'radatom_header_options_group' );   
                do_settings_sections( 'radatom-header-settings' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'radatom_header_options_group', // Option group
            'radatom_theme_options', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'radatom_header_settings_section_id', // ID
            'Header Settings', // Title
            array( $this, 'print_header_settings_info' ), // Callback
            'radatom-header-settings' // Page
        );  

        add_settings_field(
            'nav-menu-text', // ID
            'Nav Menu Text', // Title 
            array( $this, 'nav_menu_render' ), // Callback
            'radatom-header-settings', // Page
            'radatom_header_settings_section_id' // Section           
        );      

        add_settings_field(
            'social-menu-text', 
            'Social Menu Text', 
            array( $this, 'social_menu_render' ), 
            'radatom-header-settings', 
            'radatom_header_settings_section_id'
        );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['nav-menu-text'] ) )
            $new_input['nav-menu-text'] = sanitize_text_field( $input['nav-menu-text'] );

        if( isset( $input['social-menu-text'] ) )
            $new_input['social-menu-text'] = sanitize_text_field( $input['social-menu-text'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_header_settings_info()
    {
        print 'These settings manage the header of the ';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function nav_menu_render()
    {
        printf(
            '<input type="text" id="nav-menu-text" name="radatom_theme_options[nav-menu-text]" value="%s" />',
            isset( $this->options['nav-menu-text'] ) ? esc_attr( $this->options['nav-menu-text']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function social_menu_render()
    {
        printf(
            '<input type="text" id="social-menu-text" name="radatom_theme_options[social-menu-text]" value="%s" />',
            isset( $this->options['social-menu-text'] ) ? esc_attr( $this->options['social-menu-text']) : ''
        );
    }

    public function get_nav_menu_text(){
        $this->options = get_option( 'radatom_theme_options' );
        if($this->options){
            if(array_key_exists('nav-menu-text', $this->options)){
                return $this->options['nav-menu-text'];
            }
        }
        return '';
    }

    public function get_social_menu_text(){
        $this->options = get_option( 'radatom_theme_options' );
        if($this->options){
            if(array_key_exists('social-menu-text', $this->options)){
                return $this->options['social-menu-text'];
            }
        }
        return '';
    }
}

if( is_admin() )
    $my_settings_page = new HeaderSettings();


function get_nav_menu_text(){
    $my_settings_page = new HeaderSettings();
    return $my_settings_page->get_nav_menu_text();
}

function get_social_menu_text(){
    $my_settings_page = new HeaderSettings();
    return $my_settings_page->get_social_menu_text();
}
?>