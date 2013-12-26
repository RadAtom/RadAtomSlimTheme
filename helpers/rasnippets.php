<?php
add_action( 'admin_menu', 'rasnippets_admin_menu' );
add_action( 'admin_init', 'ra_snippets_init' );


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
    
function create_admin_page( $current = 'homepage' ) 
{
    $options = get_option( 'radatom_ra_snippets_option' );
       
    echo '<div class="wrap"> ';
        screen_icon();
        echo '<h2>Ra Snippets</h2>';
        echo '<h4 class="nav-tab-wrapper">';
            echo '<a id="ra-snippets-home-tab" class="nav-tab" href="?page=radatom-ra-snippets&amp;tab=home">Home</a>';
            echo '<a id="ra-snippets-pageitemscope-tab" class="nav-tab" href="?page=radatom-ra-snippets&amp;tab=pageitemscope">Page ItemScope</a>';
            echo '<a id="ra-snippets-contentitemscope-tab" class="nav-tab" href="?page=radatom-ra-snippets&amp;tab=contentitemscope">Content ItemScope</a>';
            echo '<a id="ra-snippets-itemprop-tab" class="nav-tab" href="?page=radatom-ra-snippets&amp;tab=itemprop">ItemProp</a>';
        echo '</h4>';
        echo '<div>';
        echo '<form method="post" action="options.php">';
            echo rasnippets_tabs();
        echo '</form>';
        echo '</div>';
    echo '</div>';
}

function ra_snippets_init()
{
    wp_enqueue_style( 
        'rasettings', 
        get_template_directory_uri().'/helpers/css/rasettings.css', 
        false, 
        '1.0', 
        'all'
    );
    wp_enqueue_script("jquery");
    wp_register_script('rasnippets', get_template_directory_uri().'/helpers/js/ranippets.js', array('jquery') );  
    wp_enqueue_script('rasnippets'); 
}

function rasnippets_tabs()
{
    echo '<div id="ra-snippets-home-content">';
        echo 'Hello and Welcome to the Ra Snippets home tab! Above are two other tabs named "ItemScope" and "ItemProp" and there is where you can set the ItemScopes of each page and the ItemProps each of those scopes entail. Once you have completed the data input you are now ready to go to each page and generate your content! On the side of every post editor there is a Ra Snippet box that will tell you the shortcuts to use your ItemProps within your content.';
        echo '<div id="ra-snippets-buttons">';
            echo '<a id="ra-snippets-docs" href="" class="button">Documentation</a>';
            echo '<a id="ra-snippets-support" href="" class="button">Support</a>';
        echo '</div>';
        echo '<div id="ra-snippets-footer">';
            echo '<span id="radatomname">Rad Atom Technologies</span>';
        echo '</div>';
    echo '</div>';

    echo '<div id="ra-snippets-pageitemscope-content">';
        echo '<div id="ra-snippets-pageitemscope-header">';
            echo 'Hello and Welcome to the ItemScope tab where you will be able to set the different ItemScopes that pertain to each of your pages. An ItemScop is...';
        echo '</div>';
        echo '<div id="ra-snippets-pageitemscope-body">';
            echo '<span id="pagesitemscopeslist">';
                page_itemscopes();
            echo '</span>';
            echo ' -> ';
            echo '<span id="pageitemscopepages">';
                echo 'for Page : ';
                //want to know how to do this myself
                wp_dropdown_pages();
            echo '</span>';
            echo '<input type="submit" name="pageitemscopesubmit" id="pageitemscopesubmit" class="button" value="Save Changes">';
        echo '</div>';
        echo '<div id="ra-snippets-footer">';
            echo '<span id="radatomname">Rad Atom Technologies</span>';
        echo '</div>';
        echo '</div>';
    echo '</div>';

    echo '<div id="ra-snippets-contentitemscope-content">';
        echo 'THIS IS WHERE THE TWO REAMINING TABS WILL GO';
        echo '<div id="ra-snippets-footer">';
            echo '<span id="radatomname">Rad Atom Technologies</span>';
        echo '</div>';
    echo '</div>';

    echo '<div id="ra-snippets-itemprop-content">';
        echo 'THIS IS WHERE THE TWO REAMINING TABS WILL GO';
        echo '<div id="ra-snippets-footer">';
            echo '<span id="radatomname">Rad Atom Technologies</span>';
        echo '</div>';
    echo '</div>';
}

function page_itemscopes(){
    echo 'ItemScopes : ';
    echo '<select id="pageitemscope">';
        echo '<option value="">Select an ItemScope</option>';
        echo '<option value="http://schema.org/DataType">DataType</option>';
        echo '<option value="http://schema.org/Thing">Thing</option>';
    echo '</select>';
    echo '<select id="pageitemscopedatatype">';
        echo '<option value="">Select a Data Type</option>';
        echo '<option value="http://schema.org/Boolean">Boolean</option>';
        echo '<option value="http://schema.org/Date">Date</option>';
        echo '<option value="http://schema.org/DateTime">DateTime</option>';
        echo '<option value="http://schema.org/Number">Number</option>';
        echo '<option value="http://schema.org/Text">Text</option>';
        echo '<option value="http://schema.org/Time">Time</option>';
    echo '</select>';
    echo '<select id="pageitemscopenumber">';
        echo '<option value="">Select a Number Type</option>';
        echo '<option value="http://schema.org/Float">Float</option>';
        echo '<option value="http://schema.org/Integer">Integer</option>';
    echo '</select>';
    echo '<select id="pageitemscopetext">';
        echo '<option value="">Select a Text Type</option>';
        echo '<option value="http://schema.org/URL">URL</option>';
    echo '</select>';
    echo '<select id="pageitemscopething">';
        echo '<option value="">Select a Thing Type</option>';
        echo '<option value="http://schema.org/Action">Action</option>';
        echo '<option value="http://schema.org/BroadcastService">BroadcastService</option>';
        echo '<option value="http://schema.org/Class">Class</option>';
        echo '<option value="http://schema.org/CreativeWork">CreativeWork</option>';
        echo '<option value="http://schema.org/Event">Event</option>';
        echo '<option value="http://schema.org/Intangible">Intangible</option>';
        echo '<option value="http://schema.org/MedicalEntity">MedicalEntity</option>';
        echo '<option value="http://schema.org/Organization">Organization</option>';
        echo '<option value="http://schema.org/Person">Person</option>';
        echo '<option value="http://schema.org/Place">Place</option>';
        echo '<option value="http://schema.org/Property">Property</option>';
    echo '</select>';
    echo '<select id="pageitemscopeaction">';
        echo '<option value="">Select a Action Type</option>';
        echo '<option value="http://schema.org/AchieveAction">AchieveAction</option>';
        echo '<option value="http://schema.org/AssessAction">AssessAction</option>';
        echo '<option value="http://schema.org/ConsumeAction">ConsumeAction</option>';
        echo '<option value="http://schema.org/CreateAction">CreateAction</option>';
        echo '<option value="http://schema.org/FindAction">FindAction</option>';
        echo '<option value="http://schema.org/InteractAction">InteractAction</option>';
        echo '<option value="http://schema.org/MoveAction">MoveAction</option>';
        echo '<option value="http://schema.org/OrganizeAction">OrganizeAction</option>';
        echo '<option value="http://schema.org/PlayAction">PlayAction</option>';
        echo '<option value="http://schema.org/SearchAction">SearchAction</option>';
        echo '<option value="http://schema.org/TradeAction">TradeAction</option>';
        echo '<option value="http://schema.org/TransferAction">TransferAction</option>';
        echo '<option value="http://schema.org/UpdateAction">UpdateAction</option>';
    echo '</select>';
    echo '<select id="pageitemscope ">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscope ">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscope ">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscope ">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscope ">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscope ">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscope ">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscope ">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscope ">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscope ">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscope ">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscope ">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscope ">';
        echo '<option></option>';
    echo '</select>';
    

    echo '<select id="pageitemscopebroadcastservice">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscopeclass">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscopecreativcework">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscopeevent">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscopeintangible">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscopemedicalentity">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscopeorganization">';
        echo '<option value="">Select a Organization Type</option>';
        echo '<option value="http://schema.org/Corporation">Corporation</option>';
        echo '<option value="http://schema.org/EducationalOrganization">EducationalOrganization</option>';
        echo '<option value="http://schema.org/GovernmentOrganization">GovernmentOrganization</option>';
        echo '<option value="http://schema.org/LocalBusiness">LocalBusiness</option>';
        echo '<option value="http://schema.org/NGO">NGO</option>';
        echo '<option value="http://schema.org/PerformingGroup">PerformingGroup</option>';
        echo '<option value="http://schema.org/SportsTeam">SportsTeam</option>';
    echo '</select>';
     echo '<select id="pageitemscopelocalbusiness">';
         echo '<option value="">Select a LocalBusiness Type</option>';
        echo '<option value="http://schema.org/AnimalShelter">AnimalShelter</option>';
        echo '<option value="http://schema.org/AutomotiveBusiness">AutomotiveBusiness</option>';
        echo '<option value="http://schema.org/ChildCare">ChildCare</option>';
        echo '<option value="http://schema.org/DryCleaningOrLaundry">DryCleaningOrLaundry</option>';
        echo '<option value="http://schema.org/EmergencyService">EmergencyService</option>';
        echo '<option value="http://schema.org/EmploymentAgency">EmploymentAgency</option>';
        echo '<option value="http://schema.org/EntertainmentBusiness">EntertainmentBusiness</option>';
        echo '<option value="http://schema.org/FinancialService">FinancialService</option>';
        echo '<option value="http://schema.org/FoodEstablishment">FoodEstablishment</option>';
        echo '<option value="http://schema.org/GovernmentOffice">GovernmentOffice</option>';
        echo '<option value="http://schema.org/HealthAndBeautyBusiness">HealthAndBeautyBusiness</option>';
        echo '<option value="http://schema.org/HomeAndConstructionBusiness">HomeAndConstructionBusiness</option>';
        echo '<option value="http://schema.org/InternetCafe">InternetCafe</option>';
        echo '<option value="http://schema.org/Library">Library</option>';
        echo '<option value="http://schema.org/LodgingBusiness">LodgingBusiness</option>';
        echo '<option value="http://schema.org/MedicalOrganization">MedicalOrganization</option>';
        echo '<option value="http://schema.org/ProfessionalService">ProfessionalService</option>';
        echo '<option value="http://schema.org/RadioStation">RadioStation</option>';
        echo '<option value="http://schema.org/RealEstateAgent">RealEstateAgent</option>';
        echo '<option value="http://schema.org/RecyclingCenter">RecyclingCenter</option>';
        echo '<option value="http://schema.org/SelfStorage">SelfStorage</option>';
        echo '<option value="http://schema.org/ShoppingCenter">ShoppingCenter</option>';
        echo '<option value="http://schema.org/SportsActivityLocation">SportsActivityLocation</option>';
        echo '<option value="http://schema.org/Store">Store</option>';
        echo '<option value="http://schema.org/TelevisionStation">TelevisionStation</option>';
        echo '<option value="http://schema.org/TouristInformationCenter">TouristInformationCenter</option>';
        echo '<option value="http://schema.org/TravelAgency">TravelAgency</option>';
    echo '</select>';
    echo '<select id="pageitemscopeoerson">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscopeplace">';
        echo '<option></option>';
    echo '</select>';
    echo '<select id="pageitemscopeproperty">';
        echo '<option></option>';
    echo '</select>';

    echo '<select id="pageitemscope ">';
        echo '<option></option>';
    echo '</select>';
}