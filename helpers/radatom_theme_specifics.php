<?php 


/*
============================================================
These classes are used to hold various seetings and do some different things. dont be a wierdo mannnn
============================================================
*/
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
    	//since this class also acts as a helper we dont want to put this just here cuz we dont need to call it thousands of darned times!
        //add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        //add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    public function doNonHelperThings(){
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

    /*
	These are the actual helper functions of this helper class
    */
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







class ClosingCTASettings
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
    	//since this class also acts as a helper we dont want to put this just here cuz we dont need to call it thousands of darned times!
        //add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        //add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    public function doNonHelperThings(){
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
            'radatom-closingcta-settings', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'radatom_theme_closingcta_options' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>Closing CTA Settings</h2>
            <p>The Closing CTA is the little box that is on the home page with the three columns in it. These determine which three pages are linked in thsoe columns.</p>         
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'radatom_closingcta_options_group' );   
                do_settings_sections( 'radatom-closingcta-settings' );
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
            'radatom_closingcta_options_group', // Option group
            'radatom_theme_closingcta_options', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'radatom_closingcta_settings_section_id', // ID
            'Header Settings', // Title
            array( $this, 'print_header_settings_info' ), // Callback
            'radatom-closingcta-settings' // Page
        );  

        add_settings_field(
            'leftbox-page', // ID
            'Left Box Page', // Title 
            array( $this, 'leftbox_menu_render' ), // Callback
            'radatom-closingcta-settings', // Page
            'radatom_closingcta_settings_section_id' // Section           
        );      

        add_settings_field(
            'middlebox-page', 
            'Middle Box Page', 
            array( $this, 'middlebox_menu_render' ), 
            'radatom-closingcta-settings', 
            'radatom_closingcta_settings_section_id'
        );

        add_settings_field(
            'rightbox-page', 
            'Right Box Page', 
            array( $this, 'rightbox_menu_render' ), 
            'radatom-closingcta-settings', 
            'radatom_closingcta_settings_section_id'
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
        if( isset( $input['leftbox-page'] ) )
            $new_input['leftbox-page'] = sanitize_text_field( $input['leftbox-page'] );

        if( isset( $input['middlebox-page'] ) )
            $new_input['middlebox-page'] = sanitize_text_field( $input['middlebox-page'] );

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
    public function leftbox_menu_render()
    {
        printf(
            '<input type="text" id="leftbox-page" name="radatom_theme_closingcta_options[leftbox-page]" value="%s" />',
            isset( $this->options['leftbox-page'] ) ? esc_attr( $this->options['leftbox-page']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function middlebox_menu_render()
    {
        printf(
            '<input type="text" id="middlebox-page" name="radatom_theme_closingcta_options[middlebox-page]" value="%s" />',
            isset( $this->options['middlebox-page'] ) ? esc_attr( $this->options['middlebox-page']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function rightbox_menu_render()
    {
        printf(
            '<input type="text" id="rightbox-page" name="radatom_theme_closingcta_options[rightbox-page]" value="%s" />',
            isset( $this->options['rightbox-page'] ) ? esc_attr( $this->options['rightbox-page']) : ''
        );
    }

    /*
	These are the actual helper functions of this helper class
    */
    public function get_left_div_array(){
        $returnArray =  array();
        $this->options = get_option( 'radatom_theme_closingcta_options' );
        if($this->options && array_key_exists('leftbox-page', $this->options)){
            return $this->get_page_array($this->options['leftbox-page']);
        }
        return $this->get_page_array();
    }

    public function get_middle_div_array(){
        $returnArray =  array();
        $this->options = get_option( 'radatom_theme_closingcta_options' );
        if($this->options && array_key_exists('middlebox-page', $this->options)){
            return $this->get_page_array($this->options['middlebox-page']);
        }
        return $this->get_page_array();
    }

    public function get_right_div_array(){
        $this->options = get_option( 'radatom_theme_closingcta_options' );
        if($this->options && array_key_exists('rightbox-page', $this->options)){
            return $this->get_page_array($this->options['rightbox-page']);
        }
        return $this->get_page_array();
    }

    private function get_page_array($pageID = 0){
        $returnArray =  array();
        if($pageID > 0){
            $returnArray['heading'] = '';
            $returnArray['description'] = '';
            $returnArray['link'] = '';
        }else{
            $returnArray['heading'] = '';
            $returnArray['description'] = '';
            $returnArray['link'] = '';
        }
        return $returnArray;
    }
}




/*
============================================================
These functions can be used throught the theme files so that things like text on buttons and such can be changed an easily drawn back out type stuff.
============================================================
*/

function get_nav_menu_button_text(){
    $my_settings_page = new HeaderSettings();
    return $my_settings_page->get_nav_menu_text();
}

function get_social_menu_button_text(){
    $my_settings_page = new HeaderSettings();
    return $my_settings_page->get_social_menu_text();
}