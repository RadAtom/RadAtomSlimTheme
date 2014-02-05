<?php
if( is_admin() )
    $my_settings_page = new RadAtomWordpressExcerpts();

class RadAtomWordpressExcerpts {
	//this may not be needed.... i had this realization
	function __construct() {
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
        add_action( 'init', array( $this, 'do_settings' ) );
	}


	/**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_submenu_page(
            'ra-settings',
            'Excerpts', 
            'Excerpts', 
            'manage_options', 
            'radatom-wordpress-excerpts', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'radatom_wordpress_excerpts_option' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>Wordpress Excerpts Settings</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'radatom_wordpress_excerpts' );   
                do_settings_sections( 'radatom-wordpress-excerpts' );
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
            'radatom_wordpress_excerpts', // Option group
            'radatom_wordpress_excerpts_option', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'radatom_wordpress_excerpts_id', // ID
            'RadAtom Wordpress excerpts', // Title
            array( $this, 'print_section_info' ), // Callback
            'radatom-wordpress-excerpts' // Page
        );  

        add_settings_field(
            'show_excerpts', // ID
            'Allow Excerpts For', // Title 
            array( $this, 'show_excerpts_callback' ), // Callback
            'radatom-wordpress-excerpts', // Page
            'radatom_wordpress_excerpts_id' // Section           
        );

        add_settings_field(
            'hide_excerpts', // ID
            'Deny Excerpts For', // Title 
            array( $this, 'hide_excerpts_callback' ), // Callback
            'radatom-wordpress-excerpts', // Page
            'radatom_wordpress_excerpts_id' // Section           
        );      
    }

    /*
    * Check to make sure that each setting is added into the wordpress isntallation appropriately
    if the setting is not set then nothing will be done, but if the setting is set then it will add or remove actions from wordpress accordingly

    */
    public function do_settings(){
        $this->options = get_option( 'radatom_wordpress_excerpts_option' );
        if($this->options){
            //at this point it didnt return false so we know that the settings exist, but we have to check what they actually are.
            if(array_key_exists('show_excerpts',$this->options)){
                foreach ( $this->options['show_excerpts']as $showType) {
                    echo $showType;
                    RadAtomWordpressexcerpts::add_excerpt_support($showType);
                }
            }
            if(array_key_exists('hide_excerpts',$this->options)){
                foreach ($this->options['hide_excerpts'] as $hideType) {
                    RadAtomWordpressexcerpts::remove_excerpt_support($hideType);
                }
            }
        }
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['show_excerpts'] ) )
            $new_input['show_excerpts'] = $input['show_excerpts'] ;
        if( isset( $input['hide_excerpts'] ) )
            $new_input['hide_excerpts'] = $input['hide_excerpts'] ;
        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'These settings will manage the various aspects of the Exceprts throughout wordpress. They are made to allow for other plugins to also control excerpts so if you do not specify functionality here, then the other plugin will take over, or it will default to the WordPress default.</br>Be sure that you have excerpts enablesd on screen options when you are editing a post/page/etc.';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function show_excerpts_callback()
    {
    	$postTypes = get_post_types('', 'names');

        if( !empty($this->options['show_excerpts'] ) ){
        	foreach ($postTypes as $postType) {
        		$selected = '';
        		foreach ($this->options['show_excerpts']  as $hideType) {
	        		if($hideType == $postType){
	        			$selected = 'checked';
	        		}
	        	}
        		echo '<input type="checkbox" name="radatom_wordpress_excerpts_option[show_excerpts][]" id="show_'.$postType.'_id" value="'.$postType.'" '.$selected.' ><label for="show_'.$postType.'_id" style="padding-right: 10px;">'.$postType.'</label>';
        	}
        }else{
        	foreach ($postTypes as $postType) {
        		echo '<input type="checkbox" name="radatom_wordpress_excerpts_option[show_excerpts][]" id="show_'.$postType.'_id" value="'.$postType.'"><label for="show_'.$postType.'_id" style="padding-right: 10px;">'.$postType.'</label>';
        	}
        }
    }

    public function hide_excerpts_callback()
    {
    	$postTypes = get_post_types('', 'names');

        if( !empty($this->options['hide_excerpts'] ) ){
        	foreach ($postTypes as $postType) {
        		$selected = '';
        		foreach ($this->options['hide_excerpts']  as $hideType) {
        			if($hideType == $postType){
	        			$selected = 'checked';
	        		}
	        	}
        		echo '<input type="checkbox" name="radatom_wordpress_excerpts_option[hide_excerpts][]" id="hide_'.$postType.'_id" value="'.$postType.'" '.$selected.'><label for="hide_'.$postType.'_id" style="padding-right: 10px;">'.$postType.'</label>';
        	}
        }else{
        	foreach ($postTypes as $postType) {
        		echo '<input  type="checkbox" name="radatom_wordpress_excerpts_option[hide_excerpts][]" id="hide_'.$postType.'_id" value="'.$postType.'"><label for="hide_'.$postType.'_id" style="padding-right: 10px;">'.$postType.'</label>';
        	}
        }
    }

    public static function add_excerpt_support($postType){
    	add_post_type_support( $postType, 'excerpt' );
    }

    public static function remove_excerpt_support($postType){
    	remove_post_type_support( $postType, 'excerpt' );
    }


	public static function get_excerpt_and_link($string = ''){
		return apply_filters('the_excerpt', $string);
	}



}