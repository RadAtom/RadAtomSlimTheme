<?php
add_action( 'admin_menu', 'rasnippets_admin_menu' );
add_action( 'admin_init', 'page_init' );
add_action( 'init', 'do_settings' );

function rasnippets_admin_menu()  
{  
    // add subsetting to settings
    add_options_page(
        'Ra Snippets',
        'Ra Snippets',
        'manage_options',
        'radatom-ra-snippets',
        'create_admin_page'
    );
}

function page_init()
{
    register_setting(
        'radatom_ra_snippets',                  //Options Group
        'radatom_ra_snippets_option',           //Options Name
        'sanitize'                              //Sanitize
    );

    add_settings_section(
        'radatom_ra_snippets_id',               //ID
        'Ra Snipppet Settings',                 //Title
        'print_section_info',                   //Callback
        'radatom-ra-snippets'                   //Page
    );

    add_settings_field(
        'localbusiness_settings',               //ID
        'LocalBusiness itemprops',       //Title
        'localbusiness_settings_callback',      //Callback
        'radatom-ra-snippets',                  //Page
        'radatom_ra_snippets_id'                //Section
    );
}

function do_settings()
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

function create_admin_page() 
{
    $options = get_option( 'radatom_ra_snippets_option' );
       
    echo '<div class="wrap"> ';
        screen_icon();
        echo '<h2>Wordpress Ra Snippet Settings</h2>';          
        echo '<form method="post" action="options.php">';
            // This prints out all hidden setting fields
            settings_fields( 'radatom_ra_snippets' );   
            do_settings_sections( 'radatom-ra-snippets' );
            submit_button(); 
        echo '</form>';
    echo '</div>';

}

function sanitize( $input )
{
    $new_input = array();
    if( isset( $input['localbusiness_settings'] ) )
        $new_input['localbusiness_settings'] = absint( $input['localbusiness_settings'] );
    return $new_input;
}

function print_section_info()
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

function localbusiness_settings_callback()
{
    echo '<br>';
    echo '<br>';
    echo '<div class="row">';
    echo '<table class="form-table" style="marginLeft: -2em">';
        echo '<tr>';
            echo 'Name of Business : ';
            echo '<input type="text" id="itemprop_name" name="itemprop_name" value=""/>';
        echo '</tr>';
        echo '<tr>';
            echo 'Email of Business : ';
            echo '<input type="text" id="itemprop_name" name="itemprop_name" value=""/>';
        echo '</tr>';
        echo '<tr>';
            echo 'Name of Business : ';
            echo '<input type="text" id="itemprop_name" name="itemprop_name" value=""/>';
        echo '</tr>';
    echo '</table>';
    echo '</div>';
}
