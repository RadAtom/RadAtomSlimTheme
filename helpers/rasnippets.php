<?php
if( is_admin())
    $my_settings_page = new snipper();

class snipper {
    function __construct()
    {
    add_action( 'admin_menu', array( $this, 'rasnippets_admin_menu' ) );
    add_action( 'admin-init', array( $this, 'page_init' ) );
    add_action( 'init', array( $this, 'do_settings' ) );
    }

    private $options;

    public function rasnippets_admin_menu()  
    {  
        // add subsetting to settings
        add_options_page(
            "Ra Snippets", 
            "Ra Snippets", 
            'manage_options', 
            'radatom-ra-snippets', 
            array( $this, 'create_admin_page' )
        );
    } 
    
    public function create_admin_page() 
    {
        $this->options = get_option( 'radatom_ra_snippets_option' );
       
        echo '<div class="wrap"> ';
            screen_icon();
            echo var_dump($this->options);
            echo '<h2>Wordpress Ra Snippet Settings</h2>';          
            echo '<form method="post" action="options.php">';
                // This prints out all hidden setting fields
                settings_fields( 'radatom_ra_snippets' );   
                do_settings_sections( 'radatom-ra-snippets' );
                submit_button(); 
            echo '</form>';
        '</div>';

    }

    public function page_init()
    {
        register_settings(
            'radatom_ra_snippets',                  //Options Group
            'radatom_ra_snippets_option',            //Options Name
            array( $this, 'sanitize')               //Sanitize
        );

        add_settings_section(
            'radatom_ra_snippets_id',                //ID
            'Ra Snipppet Settings',                 //Title
            array( $this, 'print_section_info'),    //Callback
            'radatom-ra-snippets'                   //Page
        );

        add_settings_field(
            'localbusiness_settings',               //ID
            'LocalBusiness Snippet Settings',       //Title
            array( $this, 'localbusiness_settings_callback'),   //Callback
            'radatom-ra-snippets',                  //Page
            'radatom_ra_snippets_id'                 //Section
        );
    }

    public function do_settings()
    {
        $options = get_option( 'radatom_ra_snippets_option');
        if($options){
            //check input
            if($options['localbusiness_settings'] == 0)
            {
                //should probably make it do something
            }else if($options['localbusiness_settings'] == 1)
            {
                //same goes here
            }
        }
    }

    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['localbusiness_settings'] ) )
            $new_input['localbusiness_settings'] = absint( $input['localbusiness_settings'] );
        echo var_dump($input);
        return $new_input;
    }

    public function print_section_info()
    {
        echo 'This section is home to all of the specific itemscopes and itemprops that you may need to use to generate your structured content.';
        echo '<br>';
        echo 'To use "Ra Snippets" you must;';
        echo '<br>';
        echo 'Step 1: Enter an itemscope for your page';
        echo '<br>';
        echo 'Step 2: Fill in the data for each itemprop that appears';
        echo '<br>';
        echo 'Step 3: Use the the itemprop caller';
        echo '<br>';
    }

    public function localbusiness_settings_callback()
    {
        if( isset($options['localbusiness_settings'] ) ){
            printf( 
            '<select  id="localbusiness_settings" name="radatom_ra_snippets_option[localbusiness_settings]" >
            <option %s value="1">Click to See</option >
            <option %s value="2">LocalBusiness</option>
            </select>', 
            ($options['localbusiness_settings']) ? 'selected="selected"' : '', 
            ($options['localbusiness_settings']) ? 'selected="selected"' : '' 
            );
        }else{
            print 
            '<select  id="localbusiness_settings" name="radatom_ra_snippets_option[localbusiness_settings]" >
            <option value="1">Click to See</option >
            <option selected="selected" value="2">LocalBusiness</option>
            </select>';
            }
        }
    }
