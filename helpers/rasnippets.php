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

function ra_snippets_init()
{
    wp_enqueue_style( 'rasettings', get_template_directory_uri().'/helpers/css/rasettings.css', false, '1.0', 'all');
    wp_enqueue_script('jquery');
    wp_register_script('rasnippets', get_template_directory_uri().'/helpers/js/rasnippets.js', array('jquery'), null ); 
    wp_enqueue_script('rasnippets');

}
    
function create_admin_page( $current = 'homepage' ) 
{
    $options = get_option( 'radatom_ra_snippets_option' );
    ?>
    <div class="wrap">
        <?php screen_icon(); ?>
        <h2>Ra Snippets</h2>
        <?php settings_errors(); ?>
        <?php
            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'home';
            } // end if  
        ?> 
        <h2 class="nav-tab-wrapper">
            <a id="ra-snippets-home-tab" class="nav-tab <?php echo $active_tab == '' ? 'nav-tab-active' : ''; ?>" href="?page=radatom-ra-snippets">Home</a>
            <a id="ra-snippets-pageitemscope-tab" class="nav-tab <?php echo $active_tab == 'pageitemscope' ? 'nav-tab-active' : ''; ?>" href="?page=radatom-ra-snippets&amp;tab=pageitemscope">Page ItemScope</a>
            <a id="ra-snippets-contentitemscope-tab" class="nav-tab <?php echo $active_tab == 'contentitemscope' ? 'nav-tab-active' : ''; ?>" href="?page=radatom-ra-snippets&amp;tab=contentitemscope">Content ItemScope</a>
            <a id="ra-snippets-itemprop-tab" class="nav-tab <?php echo $active_tab == 'itemprop' ? 'nav-tab-active' : ''; ?>" href="?page=radatom-ra-snippets&amp;tab=itemprop">ItemProp</a>
        </h2>
        <div>
        <form method="post" action="options.php">
            <?php  
                $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'home';
                if( $active_tab == 'pageitemscope' ) {  
                    pageitemscope_content();
                }else if( $active_tab == 'contentitemscope' ) {
                    contentitemscope_content();
                }else if( $active_tab == 'itemprop' ) {
                    itemprop_content();
                }else { 
                    home_content();
                }
                submit_button();
            ?> 
        </form>
        </div>
    </div>
    <?
}

function home_content()
{
    ?>
    <div id="ra-snippets-home-content">
        Hello and Welcome to the Ra Snippets home tab! Above are two other tabs named "ItemScope" and "ItemProp" and there is where you can set the ItemScopes of each page and the ItemProps each of those scopes entail. Once you have completed the data input you are now ready to go to each page and generate your content! On the side of every post editor there is a Ra Snippet box that will tell you the shortcuts to use your ItemProps within your content.
        <div id="ra-snippets-buttons">
            <a id="ra-snippets-docs" href="" class="button">Documentation</a>
            <a id="ra-snippets-support" href="" class="button">Support</a>
        </div>
        <div id="ra-snippets-footer">
            <span id="radatomname">Rad Atom Technologies</span>
        </div>
    </div>
    <?php
}

function pageitemscope_content()
{
?>
    <div id="ra-snippets-pageitemscope-content">
        <div id="ra-snippets-pageitemscope-header">
            Hello and Welcome to the ItemScope tab where you will be able to set the different ItemScopes that pertain to each of your pages. An ItemScop is...
        </div>
        <div id="ra-snippets-pageitemscope-body">
            <span id="pagesitemscopeslist">
                <?php page_itemscopes(); ?>
            </span>
            <span id="pageitemscopepages">
                <br>
                <br>
                for Page:
                <?php wp_dropdown_pages(); ?>
            </span>
        </div>
        <div id="ra-snippets-footer">
            <span id="radatomname">Rad Atom Technologies</span>
        </div>
        </div>
    </div>
<?
}

function contentitemscope_content()
{
?>
    <div id="ra-snippets-contentitemscope-content">
        THIS IS WHERE THE TWO REAMINING TABS WILL GO
        <div id="ra-snippets-footer">
            <span id="radatomname">Rad Atom Technologies</span>
        </div>
    </div>
<?
}

function itemprop_content()
{
?>
    <div id="ra-snippets-contentitemscope-content">
        THIS IS WHERE THE TWO REAMINING TABS WILL GO
        <div id="ra-snippets-footer">
            <span id="radatomname">Rad Atom Technologies</span>
        </div>
    </div>
<?
}

function page_itemscopes()
{
?>
    <select id="pageitemscope">
        <option value="">Select an ItemScope</option>
        <option value="http://schema.org/DataType">DataType</option>
        <option value="http://schema.org/Thing">Thing</option>
    </select>
        <select id="pageitemscopedatatype">
            <option value="http://schema.org/DataType">Select a Data Type</option>
            <option value="http://schema.org/Boolean">Boolean</option>
            <option value="http://schema.org/Date">Date</option>
            <option value="http://schema.org/DateTime">DateTime</option>
            <option value="http://schema.org/Number">Number</option>
            <option value="http://schema.org/Text">Text</option>
            <option value="http://schema.org/Time">Time</option>
        </select>
            <select id="pageitemscopenumber">
                <option value="http://schema.org/Number">Select a Number Type</option>
                <option value="http://schema.org/Float">Float</option>
                <option value="http://schema.org/Integer">Integer</option>
            </select>
            <select id="pageitemscopetext">
                <option value="http://schema.org/Text">Select a Text Type</option>
                <option value="http://schema.org/URL">URL</option>
            </select>
        <select id="pageitemscopething">
            <option value="http://schema.org/Thing">Select a Thing Type</option>
            <option value="http://schema.org/Action">Action</option>
            <option value="http://schema.org/BroadcastService">BroadcastService</option>
            <option value="http://schema.org/Class">Class</option>
            <option value="http://schema.org/CreativeWork">CreativeWork</option>
            <option value="http://schema.org/Event">Event</option>
            <option value="http://schema.org/Intangible">Intangible</option>
            <option value="http://schema.org/MedicalEntity">MedicalEntity</option>
            <option value="http://schema.org/Organization">Organization</option>
            <option value="http://schema.org/Person">Person</option>
            <option value="http://schema.org/Place">Place</option>
            <option value="http://schema.org/Property">Property</option>
        </select>
            <select id="pageitemscopeaction">
                <option value="http://schema.org/Action">Select a Action Type</option>
                <option value="http://schema.org/AchieveAction">AchieveAction</option>
                <option value="http://schema.org/AssessAction">AssessAction</option>
                <option value="http://schema.org/ConsumeAction">ConsumeAction</option>
                <option value="http://schema.org/CreateAction">CreateAction</option>
                <option value="http://schema.org/FindAction">FindAction</option>
                <option value="http://schema.org/InteractAction">InteractAction</option>
                <option value="http://schema.org/MoveAction">MoveAction</option>
                <option value="http://schema.org/OrganizeAction">OrganizeAction</option>
                <option value="http://schema.org/PlayAction">PlayAction</option>
                <option value="http://schema.org/SearchAction">SearchAction</option>
                <option value="http://schema.org/TradeAction">TradeAction</option>
                <option value="http://schema.org/TransferAction">TransferAction</option>
                <option value="http://schema.org/UpdateAction">UpdateAction</option>
            </select>
                <select id="pageitemscopeachieveaction">
                    <option value="http://schema.org/AchieveAction">Select a AchieveAction Type</option>
                    <option value="http://schema.org/LoseAction">LoseAction</option>
                    <option value="http://schema.org/TieAction">TieAction</option>
                    <option value="http://schema.org/WinAction">WinAction</option>
                </select>
                <select id="pageitemscopeassessaction">
                        <option value="http://schema.org/AssessAction">Select a AssessAction Type</option>
                        <option value="http://schema.org/ChooseAction">ChooseAction</option>
                        <option value="http://schema.org/IgnoreAction">IgnoreAction</option>
                        <option value="http://schema.org/ReactAction">ReactAction</option>
                        <option value="http://schema.org/ReviewAction">ReviewAction</option>
                </select>
                    <select id="pageitemscopechooseaction">
                        <option value="http://schema.org/ChooseAction">Select a ChooseAction Type</option>
                        <option value="http://schema.org/VoteAction">VoteAction</option>
                    </select>
                    <select id="pageitemscopereactaction">
                        <option value="http://schema.org/ReactAction">Select a ReactAction Type</option>
                        <option value="http://schema.org/AgreeAction">AgreeAction</option>
                        <option value="http://schema.org/DisagreeAction">DisagreeAction</option>
                        <option value="http://schema.org/DislikeAction">DislikeAction</option>
                        <option value="http://schema.org/EndorseAction">EndorseAction</option>
                        <option value="http://schema.org/LikeAction">LikeAction</option>
                        <option value="http://schema.org/WantAction">WantAction</option>
                    </select>
                <select id="pageitemscopeconsumeaction">
                    <option value="http://schema.org/ConsumeAction">Select a ConsumeAction Type</option>
                    <option value="http://schema.org/DrinkAction">DrinkAction</option>
                    <option value="http://schema.org/EatAction">EatAction</option>
                    <option value="http://schema.org/InstallAction">InstallAction</option>
                    <option value="http://schema.org/ListenAction">ListenAction</option>
                    <option value="http://schema.org/ReadAction">ReadAction</option>
                    <option value="http://schema.org/UseAction">UseAction</option>
                    <option value="http://schema.org/ViewAction">ViewAction</option>
                    <option value="http://schema.org/WatchAction">WatchAction</option>
                </select>
                    <select id="pageitemscopeuseaction">
                        <option value="http://schema.org/UseAction">Select a UseAction Type</option>
                        <option value="http://schema.org/WearAction">WearAction</option>
                    </select>
                <select id="pageitemscopecreateaction">
                    <option value="http://schema.org/CreateAction">Select a CreateAction Type</option>
                    <option value="http://schema.org/CookAction">CookAction</option>
                    <option value="http://schema.org/DrawAction">DrawAction</option>
                    <option value="http://schema.org/FilmAction">FilmAction</option>
                    <option value="http://schema.org/PaintAction">PaintAction</option>
                    <option value="http://schema.org/PhotographAction">PhotographAction</option>
                    <option value="http://schema.org/WriteAction">WriteAction</option>
                </select>
                <select id="pageitemscopefindaction">
                    <option value="http://schema.org/FindAction">Select a FindAction Type</option>
                    <option value="http://schema.org/CheckAction">CheckAction</option>
                    <option value="http://schema.org/DiscoverAction">DiscoverAction</option>
                    <option value="http://schema.org/TrackAction">TrackAction</option>
                </select>
                <select id="pageitemscopeinteractaction">
                    <option value="http://schema.org/InteractAction">Select a InteractAction Type</option>
                    <option value="http://schema.org/BefriendAction">BefriendAction</option>
                    <option value="http://schema.org/CommunicateAction">CommunicateAction</option>
                    <option value="http://schema.org/FollowAction">FollowAction</option>
                    <option value="http://schema.org/JoinAction">JoinAction</option>
                    <option value="http://schema.org/LeaveAction">LeaveAction</option>
                    <option value="http://schema.org/MarryAction">MarryAction</option>
                    <option value="http://schema.org/RegisterAction">RegisterAction</option>
                    <option value="http://schema.org/SubscribeAction">SubscribeAction</option>
                    <option value="http://schema.org/UnRegisterAction">UnRegisterAction</option>
                </select>
                    <select id="pageitemscopecommunicateaction">
                        <option value="http://schema.org/CommunicateAction">Select a CommunicateAction Type</option>
                        <option value="http://schema.org/AskAction">AskAction</option>
                        <option value="http://schema.org/CheckInAction">CheckInAction</option>
                        <option value="http://schema.org/CheckOutAction">CheckOutAction</option>
                        <option value="http://schema.org/CommentAction">CommentAction</option>
                        <option value="http://schema.org/InformAction">InformAction</option>
                        <option value="http://schema.org/InviteAction">InviteAction</option>
                        <option value="http://schema.org/ReplyAction">ReplyAction</option>
                        <option value="http://schema.org/ShareAction">ShareAction</option>
                    </select>
                    <select id="pageitemscopeinformaction">
                            <option value="http://schema.org/InformAction">Select a InformAction Type</option>
                            <option value="http://schema.org/ConfirmAction">ConfirmAction
                            <option value="http://schema.org/RsvpAction">RsvpAction</option>
                    </select>
                <select id="pageitemscopemoveaction">
                    <option value="http://schema.org/MoveAction">Select a MoveAction Type</option>
                    <option value="http://schema.org/ArriveAction">ArriveAction</option>
                    <option value="http://schema.org/DepartAction">DepartAction</option>
                    <option value="http://schema.org/TravelAction">TravelAction</option>
                </select>
                <select id="pageitemscopeorganizeaction">
                    <option value="http://schema.org/OrganizeAction">Select a OrganizeAction Type</option>
                    <option value="http://schema.org/AllocateAction">AllocateAction</option>
                    <option value="http://schema.org/ApplyAction">ApplyAction</option>
                    <option value="http://schema.org/BookmarkAction">BookmarkAction</option>
                    <option value="http://schema.org/PlanAction">PlanAction</option>
                </select>
                    <select id="pageitemscopeallocateaction">
                        <option value="http://schema.org/AllocateAction">Select a AllocateAction Type</option>
                        <option value="http://schema.org/AcceptAction">AcceptAction</option>
                        <option value="http://schema.org/AssignAction">AssignAction</option>
                        <option value="http://schema.org/AuthorizeAction">AuthorizeAction</option>
                        <option value="http://schema.org/RejectAction">RejectAction</option>
                    </select>
                    <select id="pageitemscopeplanaction">
                        <option value="http://schema.org/PlanAction">Select a PlanAction Type</option>
                        <option value="http://schema.org/CancelAction">CancelAction</option>
                        <option value="http://schema.org/ReserveAction">ReserveAction</option>
                        <option value="http://schema.org/ScheduleAction">ScheduleAction</option>
                    </select>
                <select id="pageitemscopeplayaction">
                    <option value="http://schema.org/PlayAction">Select a PlayAction Type</option>
                    <option value="http://schema.org/ExerciseAction">ExerciseAction</option>
                    <option value="http://schema.org/PerformAction">PerformAction</option>
                </select>
                <select id="pageitemscopetradeaction">
                    <option value="http://schema.org/TradeAction">Select a TradeAction Type</option>
                    <option value="http://schema.org/BuyAction">BuyAction</option>
                    <option value="http://schema.org/DonateAction">DonateAction</option>
                    <option value="http://schema.org/OrderAction">OrderAction</option>
                    <option value="http://schema.org/PayAction">PayAction</option>
                    <option value="http://schema.org/QuoteAction">QuoteAction</option>
                    <option value="http://schema.org/RentAction">RentAction</option>
                    <option value="http://schema.org/SellAction">SellAction</option>
                    <option value="http://schema.org/TipAction">TipAction</option>
                </select>
                <select id="pageitemscopetransferaction">
                    <option value="http://schema.org/TransferAction">Select a TransferAction Type</option>
                    <option value="http://schema.org/BorrowAction">BorrowAction</option>
                    <option value="http://schema.org/DownloadAction">DownloadAction</option>
                    <option value="http://schema.org/GiveAction">GiveAction</option>
                    <option value="http://schema.org/LendAction">LendAction</option>
                    <option value="http://schema.org/ReceiveAction">ReceiveAction</option>
                    <option value="http://schema.org/ReturnAction">ReturnAction</option>
                    <option value="http://schema.org/SendAction">SendAction</option>
                    <option value="http://schema.org/TakeAction">TakeAction</option>
                </select>
                <select id="pageitemscopeupdateaction">
                    <option value="http://schema.org/UpdateAction">Select a UpdateAction Type</option>
                    <option value="http://schema.org/AddActionAddAction">AddAction</option>
                    <option value="http://schema.org/DeleteAction">DeleteAction</option>
                    <option value="http://schema.org/ReplaceAction">ReplaceAction</option>
                </select>
                    <select id="pageitemscopeaddaction">
                        <option value="http://schema.org/AddAction">Select a AddAction Type</option>
                        <option value="http://schema.org/InsertAction">InsertAction</option>
                    </select>
                    <select id="pageitemscopeinsertaction">
                            <option value="http://schema.org/InsertAction">Select a InsertAction Type</option>
                            <option value="http://schema.org/AppendAction">AppendAction</option>
                            <option value="http://schema.org/PrependAction">PrependAction</option>
                    </select>
            <select id="pageitemscopecreativework">
                <option value="http://schema.org/CreativeWork">Select a CreativeWork Type</option>
                <option value="http://schema.org/Article">Article</option>
                <option value="http://schema.org/Blog">Blog</option>
                <option value="http://schema.org/Book">Book</option>
                <option value="http://schema.org/Clip">Clip</option>
                <option value="http://schema.org/Code">Code</option>
                <option value="http://schema.org/Comment">Comment</option>
                <option value="http://schema.org/DataCatalog">DataCatalog</option>
                <option value="http://schema.org/Dataset">Dataset</option>
                <option value="http://schema.org/Diet">Diet</option>
                <option value="http://schema.org/Episode">Episode</option>
                <option value="http://schema.org/ExercisePlan">ExercisePlan</option>
                <option value="http://schema.org/ItemList">ItemList</option>
                <option value="http://schema.org/Map">Map</option>
                <option value="http://schema.org/MediaObject">MediaObject</option>
                <option value="http://schema.org/Movie">Movie</option>
                <option value="http://schema.org/MusicPlaylist">MusicPlaylist</option>
                <option value="http://schema.org/MusicRecording">MusicRecording</option>
                <option value="http://schema.org/Painting">Painting</option>
                <option value="http://schema.org/Photograph">Photograph</option>
                <option value="http://schema.org/Recipe">Recipe</option>
                <option value="http://schema.org/Review">Review</option>
                <option value="http://schema.org/Sculpture">Sculpture</option>
                <option value="http://schema.org/Season">Season</option>
                <option value="http://schema.org/Series">Series</option>
                <option value="http://schema.org/SoftwareApplication">SoftwareApplication</option>
                <option value="http://schema.org/TVSeason">TVSeason</option>
                <option value="http://schema.org/TVSeries">TVSeries</option>
                <option value="http://schema.org/WebPage">WebPage</option>
                <option value="http://schema.org/WebPageElement">WebPageElement</option>
            </select>
                <select id="pageitemscopearticle">
                    <option value="http://schema.org/Article">Select a Article Type</option>
                    <option value="http://schema.org/BlogPosting">BlogPosting</option>
                    <option value="http://schema.org/NewsArticle">NewsArticle</option>
                    <option value="http://schema.org/ScholarlyArticle">ScholarlyArticle</option>
                    <option value="http://schema.org/TechArticle">TechArticle</option>
                </select>
                    <select id="pageitemscopescholarlyarticle">
                        <option value="http://schema.org/ScholarlyArticle">Select a ScholarlyArticle Type</option>
                        <option value="http://schema.org/MedicalScholarlyArticle">MedicalScholarlyArticle</option>
                    </select>
                    <select id="pageitemscopetecharticle">
                        <option value="http://schema.org/TechArticle">Select a TechArticle Type</option>
                        <option value="http://schema.org/APIReference">APIReference</option>
                    </select>  
                <select id="pageitemscopeclip">
                    <option value="http://schema.org/Clip">Select a Clip Type</option>
                    <option value="http://schema.org/RadioClip">RadioClip</option>
                    <option value="http://schema.org/TVClip">TVClip</option>
                </select>
                <select id="pageitemscopeepisode">
                    <option value="http://schema.org/Episode">Select a Episode Type</option>
                    <option value="http://schema.org/RadioEpisode">RadioEpisode</option>
                    <option value="http://schema.org/TVEpisode">TVEpisode</option>
                </select>
                <select id="pageitemscopemediaobject">
                    <option value="http://schema.org/MediaObject">Select a MediaObject Type</option>
                    <option value="http://schema.org/AudioObject">AudioObject</option>
                    <option value="http://schema.org/DataDownload">DataDownload</option>
                    <option value="http://schema.org/ImageObject">ImageObject</option>
                    <option value="http://schema.org/MusicVideoObject">MusicVideoObject</option>
                    <option value="http://schema.org/VideoObject">VideoObject</option>
                </select>
                <select id="pageitemscopemusicplaylist">
                    <option value="http://schema.org/MusicPlaylist">Select a MusicPlaylist Type</option>
                    <option value="http://schema.org/MusicAlbum">MusicAlbum</option>
                </select>
                <select id="pageitemscopeseason">
                    <option value="http://schema.org/Season">Select a Season Type</option>
                    <option value="http://schema.org/RadioSeason">RadioSeason</option>
                    <option value="http://schema.org/TVSeason">TVSeason</option>
                </select>
                <select id="pageitemscopeseries">
                    <option value="http://schema.org/Series">Select a Series Type</option>
                    <option value="http://schema.org/RadioSeries">RadioSeries</option>
                    <option value="http://schema.org/TVSeries">TVSeries</option>
                </select>
                <select id="pageitemscopesoftwareapplication">
                    <option value="http://schema.org/SoftwareApplication">Select a SoftwareApplication Type</option>
                    <option value="http://schema.org/MobileApplication">MobileApplication/option>
                    <option value="http://schema.org/WebApplication">WebApplication</option>
                </select>
                <select id="pageitemscopewebpage">
                    <option value="http://schema.org/Webpage">Select a Webpage Type</option>
                    <option value="http://schema.org/AboutPage">AboutPage</option>
                    <option value="http://schema.org/CheckoutPage">CheckoutPage</option>
                    <option value="http://schema.org/CollectionPage">CollectionPage</option>
                    <option value="http://schema.org/ContactPage">ContactPage</option>
                    <option value="http://schema.org/ItemPage">ItemPage</option>
                    <option value="http://schema.org/MedicalWebPage">MedicalWebPage</option>
                    <option value="http://schema.org/ProfilePage">ProfilePage</option>
                    <option value="http://schema.org/SearchResultsPage">SearchResultsPage</option>
                </select>
                    <select id="pageitemscopecollectionpage">
                        <option value="http://schema.org/CollectionPage">Select a CollectionPage Type</option>
                        <option value="http://schema.org/ImageGallery">ImageGallery</option>
                        <option value="http://schema.org/VideoGallery">VideoGallery</option>
                    </select>
                <select id="pageitemscopewebpageelement">
                    <option value="http://schema.org/WebpageElement">Select a WebpageElement Type</option>
                    <option value="http://schema.org/SiteNavigationElement">SiteNavigationElement</option>
                    <option value="http://schema.org/Table">Table</option>
                    <option value="http://schema.org/WPAdBlock">WPAdBlock</option>
                    <option value="http://schema.org/WPFooter">WPFooter</option>
                    <option value="http://schema.org/WPHeader">WPHeader</option>
                    <option value="http://schema.org/WPSideBar">WPSideBar</option>
                </select>
            <select id="pageitemscopeevent">
                <option value="http://schema.org/Event">Select a Event Type</option>
                <option value="http://schema.org/BusinessEvent">BusinessEvent</option>
                <option value="http://schema.org/ChildrensEvent">ChildrensEvent</option>
                <option value="http://schema.org/ComedyEvent">ComedyEvent</option>
                <option value="http://schema.org/DanceEvent">DanceEvent</option>
                <option value="http://schema.org/DeliveryEvent">DeliveryEvent</option>
                <option value="http://schema.org/EducationEvent">EducationEvent</option>
                <option value="http://schema.org/Festival">Festival</option>
                <option value="http://schema.org/FoodEvent">FoodEvent</option>
                <option value="http://schema.org/LiteraryEvent">LiteraryEvent</option>
                <option value="http://schema.org/MusicEvent">MusicEvent</option>
                <option value="http://schema.org/PublicationEvent">PublicationEvent</option>
                <option value="http://schema.org/SaleEvent">SaleEvent</option>
                <option value="http://schema.org/SocialEvent">SocialEvent</option>
                <option value="http://schema.org/SportsEvent">SportsEvent</option>
                <option value="http://schema.org/TheaterEvent">TheaterEvent</option>
                <option value="http://schema.org/UserInteraction">UserInteraction</option>
                <option value="http://schema.org/VisualArtsEvent">VisualArtsEvent</option>
            </select>
                <select id="pageitemscopepublicationevent">
                    <option value="http://schema.org/PublicationEvent">Select a PublicationEvent Type</option>
                    <option value="http://schema.org/BroadcastEvent">BroadcastEvent</option>
                    <option value="http://schema.org/OnDemandEvent">OnDemandEvent</option>
                </select>
                <select id="pageitemscopeuserinteraction">
                    <option value="http://schema.org/UserInteraction">Select a UserInteraction Type</option>
                    <option value="http://schema.org/UserBlocks">UserBlocks</option>
                    <option value="http://schema.org/UserCheckins">UserCheckins</option>
                    <option value="http://schema.org/UserComments">UserComments</option>
                    <option value="http://schema.org/UserDownloads">UserDownloads</option>
                    <option value="http://schema.org/UserLikes">UserLikes</option>
                    <option value="http://schema.org/UserPageVisits">UserPageVisits</option>
                    <option value="http://schema.org/UserPlays">UserPlays</option>
                    <option value="http://schema.org/UserPlusOnes">UserPlusOnes</option>
                    <option value="http://schema.org/UserTweets">UserTweets</option>
                </select>
            <select id="pageitemscopeintangible">
                <option value="http://schema.org/Intangible">Select a Intangible Type</option>
                <option value="http://schema.org/AlignmentObject">AlignmentObject</option>
                <option value="http://schema.org/Audience">Audience</option>
                <option value="http://schema.org/Brand">Brand</option>
                <option value="http://schema.org/Demand">Demand</option>
                <option value="http://schema.org/Enumeration">Enumeration</option>
                <option value="http://schema.org/JobPosting">JobPosting</option>
                <option value="http://schema.org/Language">Language</option>
                <option value="http://schema.org/Offer">Offer</option>
                <option value="http://schema.org/Order">Order</option>
                <option value="http://schema.org/ParcelDelivery">ParcelDelivery</option>
                <option value="http://schema.org/Permit">Permit</option>
                <option value="http://schema.org/Quantity">Quantity</option>
                <option value="http://schema.org/Rating">Rating</option>
                <option value="http://schema.org/Service">Service</option>
                <option value="http://schema.org/ServiceChannel">ServiceChannel</option>
                <option value="http://schema.org/StructuredValue">StructuredValue</option>
            </select>
                <select id="pageitemscopeaudience">
                    <option value="http://schema.org/Audience">Select a Audience Type</option>
                    <option value="http://schema.org/BusinessAudience">BusinessAudience</option>
                    <option value="http://schema.org/EducationalAudience">EducationalAudience</option>
                    <option value="http://schema.org/MedicalAudience">MedicalAudience</option>
                    <option value="http://schema.org/PeopleAudience">PeopleAudience</option>
                    <option value="http://schema.org/Researcher">Researcher</option>
                </select>
                    <select id="pageitemscopemedicalaudience">
                        <option value="http://schema.org/MedicalAudience">Select a MedicalAudience Type</option>
                        <option value="http://schema.org/Clinician">Clinician</option>
                        <option value="http://schema.org/MedicalResearcher">MedicalResearcher</option>
                        <option value="http://schema.org/Patient">Patient</option>
                    </select>
                    <select id="pageitemscopepeopleaudience">
                        <option value="http://schema.org/PeopleAudience">Select a PeopleAudience Type</option>
                        <option value="http://schema.org/ParentAudience">ParentAudience</option>
                    </select>            
                <select id="pageitemscopeenumeration">
                    <option value="http://schema.org/Enumeration">Select a Enumeration Type</option>
                    <option value="http://schema.org/BookFormatType">BookFormatType</option>
                    <option value="http://schema.org/BusinessEntityType">BusinessEntityType</option>
                    <option value="http://schema.org/BusinessFunction">BusinessFunction</option>
                    <option value="http://schema.org/ContactPointOption">ContactPointOption</option>
                    <option value="http://schema.org/DayOfWeek">DayOfWeek</option>
                    <option value="http://schema.org/DeliveryMethod">DeliveryMethod</option>
                    <option value="http://schema.org/EventStatusType">EventStatusType</option>
                    <option value="http://schema.org/ItemAvailability">ItemAvailability</option>
                    <option value="http://schema.org/OfferItemCondition">OfferItemCondition</option>
                    <option value="http://schema.org/OrderStatus">OrderStatus</option>
                    <option value="http://schema.org/PaymentMethod">PaymentMethod</option>
                    <option value="http://schema.org/QualitativeValue">QualitativeValue</option>
                    <option value="http://schema.org/Specialty">Specialty</option>
                    <option value="http://schema.org/WarrantyScope">WarrantyScope</option>
                </select>
                    <select id="pageitemscopebookformattype">
                        <option value="http://schema.org/BookFormatType">Select a BookFormatType Type</option>
                        <option value="http://schema.org/EBook">EBook</option>
                        <option value="http://schema.org/Hardcover">Hardcover</option>
                        <option value="http://schema.org/Paperback">Paperback</option>
                    </select>
                    <select id="pageitemscopecontactpointoption">
                        <option value="http://schema.org/ContactPointOption">Select a ContactPointOption Type</option>
                        <option value="http://schema.org/HearingImpairedSupported">HearingImpairedSupported</option>
                        <option value="http://schema.org/TollFree">TollFree</option>
                    </select>
                    <select id="pageitemscopedeliverymethod">
                        <option value="http://schema.org/DeliveryMethod">Select a DeliveryMethod Type</option>
                        <option value="http://schema.org/LockerDelivery">LockerDelivery</option>
                        <option value="http://schema.org/OnSitePickup">OnSitePickup</option>
                        <option value="http://schema.org/ParcelService">ParcelService</option>
                    </select>
                    <select id="pageitemscopeeventstatustype">
                        <option value="http://schema.org/EventStatusType">Select a EventStatusType Type</option>
                        <option value="http://schema.org/EventCancelled">EventCancelled</option>
                        <option value="http://schema.org/EventPostponed">EventPostponed</option>
                        <option value="http://schema.org/EventRescheduled">EventRescheduled</option>
                        <option value="http://schema.org/EventScheduled">EventScheduled</option>
                    </select>
                    <select id="pageitemscopeitemavailability">
                        <option value="http://schema.org/ItemAvailability">Select a ItemAvailability Type</option>
                        <option value="http://schema.org/Discontinued">Discontinued</option>
                        <option value="http://schema.org/InStock">InStock</option>
                        <option value="http://schema.org/InStoreOnly">InStoreOnly</option>
                        <option value="http://schema.org/LimitedAvailability">LimitedAvailability</option>
                        <option value="http://schema.org/OnlineOnly">OnlineOnly</option>
                        <option value="http://schema.org/OutOfStock">OutOfStock</option>
                        <option value="http://schema.org/PreOrder">PreOrder</option>
                        <option value="http://schema.org/SoldOut">SoldOut</option>
                    </select>
                    <select id="pageitemscopeofferitemcondition">
                        <option value="http://schema.org/OfferItemCondition">Select a OfferItemCondition Type</option>
                        <option value="http://schema.org/DamagedCondition">DamagedCondition</option>
                        <option value="http://schema.org/NewCondition">NewCondition</option>
                        <option value="http://schema.org/RefurbishedCondition">RefurbishedCondition</option>
                        <option value="http://schema.org/UsedCondition">UsedCondition</option>
                    </select>
                    <select id="pageitemscopeorderstatus">
                        <option value="http://schema.org/OrderStatus">Select a OrderStatus Type</option>
                        <option value="http://schema.org/OrderCancelled">OrderCancelled</option>
                        <option value="http://schema.org/OrderDelivered">OrderDelivered</option>
                        <option value="http://schema.org/OrderInTransit">OrderInTransit</option>
                        <option value="http://schema.org/OrderPaymentDue">OrderPaymentDue</option>
                        <option value="http://schema.org/OrderPickupAvailable">OrderPickupAvailable</option>
                        <option value="http://schema.org/OrderProblem">OrderProblem</option>
                        <option value="http://schema.org/OrderProcessing">OrderProcessing</option>
                        <option value="http://schema.org/OrderReturned">OrderReturned</option>
                    </select>
                    <select id="pageitemscopepaymentmethod">
                        <option value="http://schema.org/PaymentMethod">Select a PaymentMethod Type</option>
                        <option value="http://schema.org/CreditCard">CreditCard</option>
                    </select>
                    <select id="pageitemscopespecialty">
                        <option value="http://schema.org/Specialty">Select a Specialty Type</option>
                        <option value="http://schema.org/MedicalSpecialty">MedicalSpecialty</option>
                    </select>
                        <select id="pageitemscopemedicalspecialty">
                            <option value="http://schema.org/MedicalSpecialty">Select a MedicalSpecialty Type</option>
                            <option value="http://schema.org/Anesthesia">Anesthesia</option>
                            <option value="http://schema.org/Cardiovascular">Cardiovascular</option>
                            <option value="http://schema.org/CommunityHealth">CommunityHealth</option>
                            <option value="http://schema.org/Dentistry">Dentistry</option>
                            <option value="http://schema.org/Dermatologic">Dermatologic</option>
                            <option value="http://schema.org/DietNutrition">DietNutrition</option>
                            <option value="http://schema.org/Emergency">Emergency</option>
                            <option value="http://schema.org/Endocrine">Endocrine</option>
                            <option value="http://schema.org/Gastroenterologic">Gastroenterologic</option>
                            <option value="http://schema.org/Genetic">Genetic</option>
                            <option value="http://schema.org/Geriatric">Geriatric</option>
                            <option value="http://schema.org/Gynecologic">Gynecologic</option>
                            <option value="http://schema.org/Hematologic">Hematologic</option>
                            <option value="http://schema.org/Infectious">Infectious</option>
                            <option value="http://schema.org/LaboratoryScience">LaboratoryScience</option>
                            <option value="http://schema.org/Midwifery">Midwifery</option>
                            <option value="http://schema.org/Musculoskeletal">Musculoskeletal</option>
                            <option value="http://schema.org/Neurologic">Neurologic</option>
                            <option value="http://schema.org/Nursing">Nursing</option>
                            <option value="http://schema.org/Obstetric">Obstetric</option>
                            <option value="http://schema.org/OccupationalTherapy">OccupationalTherapy</option>
                            <option value="http://schema.org/Oncologic">Oncologic</option>
                            <option value="http://schema.org/Optometic">Optometic</option>
                            <option value="http://schema.org/Otolaryngologic">Otolaryngologic</option>
                            <option value="http://schema.org/Pathology">Pathology</option>
                            <option value="http://schema.org/Pediatric">Pediatric</option>
                            <option value="http://schema.org/PharmacySpecialty">PharmacySpecialty</option>
                            <option value="http://schema.org/Physiotherapy">Physiotherapy</option>
                            <option value="http://schema.org/PlasticSurgery">PlasticSurgery</option>
                            <option value="http://schema.org/Podiatric">Podiatric</option>
                            <option value="http://schema.org/PrimaryCare">PrimaryCare</option>
                            <option value="http://schema.org/Psychiatric">Psychiatric</option>
                            <option value="http://schema.org/PublicHealth">PublicHealth</option>
                            <option value="http://schema.org/Pulmonary">Pulmonary</option>
                            <option value="http://schema.org/Radiograpy">Radiograpy</option>
                            <option value="http://schema.org/Renal">Renal</option>
                            <option value="http://schema.org/RespiratoryTherapy">RespiratoryTherapy</option>
                            <option value="http://schema.org/Rheumatologic">Rheumatologic</option>
                            <option value="http://schema.org/SpeechPathology">SpeechPathology</option>
                            <option value="http://schema.org/Surgical">Surgical</option>
                            <option value="http://schema.org/Toxicologic">Toxicologic</option>
                            <option value="http://schema.org/Urologic">Urologic</option>
                        </select>
                <select id="pageitemscopeoffer">
                    <option value="http://schema.org/Offer">Select a Offer Type</option>
                    <option value="http://schema.org/AggregateOffer">AggregateOffer</option>
                </select>
                <select id="pageitemscopepermit">
                    <option value="http://schema.org/Permit">Select a Permit Type</option>
                    <option value="http://schema.org/GovernmentPermit">GovernmentPermit</option>
                </select>
                <select id="pageitemscopequantity">
                    <option value="http://schema.org/Quantity">Select a Quantity Type</option>
                    <option value="http://schema.org/Distance">Distance</option>
                    <option value="http://schema.org/Duration">Duration</option>
                    <option value="http://schema.org/Energy">Energy</option>
                    <option value="http://schema.org/Mass">Mass</option>
                </select>
                <select id="pageitemscoperating">
                    <option value="http://schema.org/Rating">Select a Rating Type</option>
                    <option value="http://schema.org/AggregateRating">AggregateRating</option>
                </select>
                <select id="pageitemscopeservice">
                    <option value="http://schema.org/Service">Select a Service Type</option>
                    <option value="http://schema.org/GovernmentService">GovernmentService</option>
                </select>
                <select id="pageitemscopestructuredvalue">
                    <option value="http://schema.org/StructuredValue">Select a StructuredValue Type</option>
                    <option value="http://schema.org/ContactPoint">ContactPoint</option>
                    <option value="http://schema.org/GeoCoordinates">GeoCoordinates</option>
                    <option value="http://schema.org/GeoShape">GeoShape</option>
                    <option value="http://schema.org/NutritionInformation">NutritionInformation</option>
                    <option value="http://schema.org/OpeningHoursSpecification">OpeningHoursSpecification</option>
                    <option value="http://schema.org/OwnershipInfo">OwnershipInfo</option>
                    <option value="http://schema.org/PriceSpecification">PriceSpecification</option>
                    <option value="http://schema.org/QuantitativeValue">QuantitativeValue</option>
                    <option value="http://schema.org/TypeAndQuantityNode">TypeAndQuantityNode</option>
                    <option value="http://schema.org/WarrantyPromise">WarrantyPromise</option>
                </select>
                    <select id="pageitemscopecontactpoint">
                        <option value="http://schema.org/ContactPoint">Select a ContactPoint Type</option>
                        <option value="http://schema.org/PostalAddress">PostalAddress</option>
                    </select>
                    <select id="pageitemscopepricespecification">
                        <option value="http://schema.org/PriceSpecification">Select a PriceSpecification Type</option>
                        <option value="http://schema.org/DeliveryChargeSpecification">DeliveryChargeSpecification</option>
                        <option value="http://schema.org/PaymentChargeSpecification">PaymentChargeSpecification</option>
                        <option value="http://schema.org/UnitPriceSpecification">UnitPriceSpecification</option>
                    </select>
            <select id="pageitemscopemedicalentity">
                <option value="http://schema.org/MedicalEntity">Select a MedicalEntity Type</option>
                <option value="http://schema.org/AnatomicalStructure">AnatomicalStructure</option>
                <option value="http://schema.org/AnatomicalSystem">AnatomicalSystem</option>
                <option value="http://schema.org/MedicalCause">MedicalCause</option>
                <option value="http://schema.org/MedicalCondition">MedicalCondition</option>
                <option value="http://schema.org/MedicalContraindication">MedicalContraindication</option>
                <option value="http://schema.org/MedicalDevice">MedicalDevice</option>
                <option value="http://schema.org/MedicalGuideline">MedicalGuideline</option>
                <option value="http://schema.org/MedicalIndication">MedicalIndication</option>
                <option value="http://schema.org/MedicalIntangible">MedicalIntangible</option>
                <option value="http://schema.org/MedicalProcedure">MedicalProcedure</option>
                <option value="http://schema.org/MedicalRiskEstimator">MedicalRiskEstimator</option>
                <option value="http://schema.org/MedicalRiskFactor">MedicalRiskFactor</option>
                <option value="http://schema.org/MedicalSignOrSymptom">MedicalSignOrSymptom</option>
                <option value="http://schema.org/MedicalStudy">MedicalStudy</option>
                <option value="http://schema.org/MedicalTest">MedicalTest</option>
                <option value="http://schema.org/MedicalTherapy">MedicalTherapy</option>
                <option value="http://schema.org/SuperficialAnatomy">SuperficialAnatomy</option>
            </select>
                <select id="pageitemscopeanatomicalstructure">
                    <option value="http://schema.org/AnatomicalStructure">Select a AnatomicalStructure Type</option>
                    <option value="http://schema.org/Bone">Bone</option>
                    <option value="http://schema.org/BrainStructure">BrainStructure</option>
                    <option value="http://schema.org/Joint">Joint</option>
                    <option value="http://schema.org/Ligament">Ligament</option>
                    <option value="http://schema.org/Muscle">Muscle</option>
                    <option value="http://schema.org/Nerve">Nerve</option>
                    <option value="http://schema.org/Vessel">Vessel</option>
                </select>
                    <select id="pageitemscopevessel">
                        <option value="http://schema.org/Vessel">Select a Vessel Type</option>
                        <option value="http://schema.org/Artery">Artery</option>
                        <option value="http://schema.org/LymphaticVessel">LymphaticVessel</option>
                        <option value="http://schema.org/Vein">Vein</option>
                    </select>
                <select id="pageitemscopemedicalcondition">
                    <option value="http://schema.org/MedicalCondition">Select a MedicalCondition Type</option>
                    <option value="http://schema.org/InfectiousDisease">InfectiousDisease</option>
                </select>
                <select id="pageitemscopemedicalguideline">
                    <option value="http://schema.org/MedicalGuidline">Select a MedicalGuidline Type</option>
                    <option value="http://schema.org/MedicalGuidelineContraindication">MedicalGuidelineContraindication</option>
                    <option value="http://schema.org/MedicalGuidelineRecommendation">MedicalGuidelineRecommendation</option>
                </select>
                <select id="pageitemscopemedicalindication">
                    <option value="http://schema.org/MedicalIndication">Select a MedicalIndication Type</option>
                    <option value="http://schema.org/ApprovedIndication">ApprovedIndication</option>
                    <option value="http://schema.org/PreventionIndication">PreventionIndication</option>
                    <option value="http://schema.org/TreatmentIndication">TreatmentIndication</option>
                </select>
                <select id="pageitemscopemedicalintangible">
                    <option value="http://schema.org/MedicalIntangible">Select a MedicalIntangible Type</option>
                    <option value="http://schema.org/DDxElement">DDxElement</option>
                    <option value="http://schema.org/DoseSchedule">DoseSchedule</option>
                    <option value="http://schema.org/DrugCost">DrugCost</option>
                    <option value="http://schema.org/DrugLegalStatus">DrugLegalStatus</option>
                    <option value="http://schema.org/DrugStrength">DrugStrength</option>
                    <option value="http://schema.org/MedicalCode">MedicalCode</option>
                    <option value="http://schema.org/MedicalConditionStage">MedicalConditionStage</option>
                    <option value="http://schema.org/MedicalEnumeration">MedicalEnumeration</option>
                </select>
                    <select id="pageitemscopedoseschedule">
                        <option value="http://schema.org/DoseSchedule">Select a DoseSchedule Type</option>
                        <option value="http://schema.org/MaximumDoseSchedule">MaximumDoseSchedule</option>
                        <option value="http://schema.org/RecommendedDoseSchedule">RecommendedDoseSchedule</option>
                        <option value="http://schema.org/ReportedDoseSchedule">ReportedDoseSchedule</option>
                    </select>
                    <select id="pageitemscopemedicalenumeration">
                        <option value="http://schema.org/MedicalEnumeration">Select a MedicalEnumeration Type</option>
                        <option value="http://schema.org/DrugCostCategory">DrugCostCategory</option>
                        <option value="http://schema.org/DrugPregnancyCategory">DrugPregnancyCategory</option>
                        <option value="http://schema.org/DrugPrescriptionStatus">DrugPrescriptionStatus</option>
                        <option value="http://schema.org/InfectiousAgentClass">InfectiousAgentClass</option>
                        <option value="http://schema.org/MedicalAudience">MedicalAudience</option>
                        <option value="http://schema.org/MedicalDevicePurpose">MedicalDevicePurpose</option>
                        <option value="http://schema.org/MedicalEvidenceLevel">MedicalEvidenceLevel</option>
                        <option value="http://schema.org/MedicalImagingTechnique">MedicalImagingTechnique</option>
                        <option value="http://schema.org/MedicalObservationalStudyDesign">MedicalObservationalStudyDesign</option>
                        <option value="http://schema.org/MedicalProcedureType">MedicalProcedureType</option>
                        <option value="http://schema.org/MedicalSpecialty">MedicalSpecialty</option>
                        <option value="http://schema.org/MedicalStudyStatus">MedicalStudyStatus</option>
                        <option value="http://schema.org/MedicalTrialDesign">MedicalTrialDesign</option>
                        <option value="http://schema.org/MedicineSystem">MedicineSystem</option>
                        <option value="http://schema.org/PhysicalActivityCategory">PhysicalActivityCategory</option>
                        <option value="http://schema.org/PhysicalExam">PhysicalExam</option>
                    </select>
                        <select id="pageitemscopedrugcostcategory">
                            <option value="http://schema.org/DrugCostCatagory">Select a DrugCostCategory Type</option>
                            <option value="http://schema.org/ReimbursementCap">ReimbursementCap</option>
                            <option value="http://schema.org/Retail">Retail</option>
                            <option value="http://schema.org/Wholesale">Wholesale</option>
                        </select>
                        <select id="pageitemscopedrugpregnancycategory">
                            <option value="http://schema.org/DrugPregnancy">Select a DrugPregnancyCategory Type</option>
                            <option value="http://schema.org/FDAcategoryA">FDAcategoryA</option>
                            <option value="http://schema.org/FDAcategoryB">FDAcategoryB</option>
                            <option value="http://schema.org/FDAcategoryC">FDAcategoryC</option>
                            <option value="http://schema.org/FDAcategoryD">FDAcategoryD</option>
                            <option value="http://schema.org/FDAcategoryX">FDAcategoryX</option>
                            <option value="http://schema.org/FDAnotEvaluated">FDAnotEvaluated</option>
                        </select>
                        <select id="pageitemscopedrugprescriptionstatus">
                            <option value="http://schema.org/DrugPrescriptionStatus">Select a DrugPrescriptionStatus Type</option>
                            <option value="http://schema.org/OTC">OTC</option>
                            <option value="http://schema.org/PrescriptionOnly">PrescriptionOnly</option>
                        </select>
                        <select id="pageitemscopeinfectiousagentclass">
                            <option value="http://schema.org/InfectiousAgentClass">Select a InfectiousAgentClass Type</option>
                            <option value="http://schema.org/Bacteria">Bacteria</option>
                            <option value="http://schema.org/Fungus">Fungus</option>
                            <option value="http://schema.org/MulticellularParasite">MulticellularParasite</option>
                            <option value="http://schema.org/Prion">Prion</option>
                            <option value="http://schema.org/Protozoa">Protozoa</option>
                            <option value="http://schema.org/Virus">Virus</option>
                        </select>
                        <select id="pageitemscopemedicaldevicepurpose">
                            <option value="http://schema.org/MedicalDevicePurpose">Select a MedicalDevicePurpose Type</option>
                            <option value="http://schema.org/Diagnostic">Diagnostic</option>
                            <option value="http://schema.org/Therapeutic">Therapeutic</option>
                        </select>
                        <select id="pageitemscopemedicalevidencelevel">
                            <option value="http://schema.org/">Select a MedicalEvidenceLevel Type</option>
                            <option value="http://schema.org/EvidenceLevelA">EvidenceLevelA</option>
                            <option value="http://schema.org/EvidenceLevelB">EvidenceLevelB</option>
                            <option value="http://schema.org/EvidenceLevelC">EvidenceLevelC</option>
                        </select>
                        <select id="pageitemscopemedicalimagingtechnique">
                            <option value="http://schema.org/MedicalImagingTechnique">Select a MedicalImagingTechnique Type</option>
                            <option value="http://schema.org/CT">CT</option>
                            <option value="http://schema.org/MRI">MRI</option>
                            <option value="http://schema.org/PET">PET</option>
                            <option value="http://schema.org/Ultrasound">Ultrasound</option>
                            <option value="http://schema.org/XRay">XRay</option>
                        </select>
                        <select id="pageitemscopemedicalobservationalstudydesign">
                            <option value="http://schema.org/MedicalObservationalStudyDesign">Select a MedicalObservationalStudyDesign Type</option>
                            <option value="http://schema.org/CaseSeries">CaseSeries</option>
                            <option value="http://schema.org/CohortStudy">CohortStudy</option>
                            <option value="http://schema.org/CrossSectional">CrossSectional</option>
                            <option value="http://schema.org/Longitudinal">Longitudinal</option>
                            <option value="http://schema.org/Observational">Observational</option>
                            <option value="http://schema.org/Registry">Registry</option>
                        </select>
                        <select id="pageitemscopemedicalproceduretype">
                            <option value="http://schema.org/MedicalProcedureType">Select a MedicalProcedureType Type</option>
                            <option value="http://schema.org/NoninvasiveProcedure">NoninvasiveProcedure</option>
                            <option value="http://schema.org/PercutaneousProcedure">PercutaneousProcedure</option>
                            <option value="http://schema.org/SurgicalProcedure">SurgicalProcedure</option>
                        </select>
                        </select>
                        <select id="pageitemscopemedicalstudystatus">
                            <option value="http://schema.org/MedicalStudyStatus">Select a MedicalStudyStatus Type</option>
                            <option value="http://schema.org/ActiveNotRecruiting">ActiveNotRecruiting</option>
                            <option value="http://schema.org/Completed">Completed</option>
                            <option value="http://schema.org/EnrollingByInvitation">EnrollingByInvitation</option>
                            <option value="http://schema.org/NotYetRecruiting">NotYetRecruiting</option>
                            <option value="http://schema.org/Recruiting">Recruiting</option>
                            <option value="http://schema.org/ResultsAvailable">ResultsAvailable</option>
                            <option value="http://schema.org/ResultsNotAvailable">ResultsNotAvailable</option>
                            <option value="http://schema.org/Suspended">Suspended</option>
                            <option value="http://schema.org/Terminated">Terminated</option>
                            <option value="http://schema.org/Withdrawn">Withdrawn</option>
                        </select>
                        <select id="pageitemscopemedicaltrialdesign">
                            <option value="http://schema.org/MedicalTrialDesign">Select a MedicalTrialDesign Type</option>
                            <option value="http://schema.org/DoubleBlindedTrial">DoubleBlindedTrial</option>
                            <option value="http://schema.org/InternationalTrial">InternationalTrial</option>
                            <option value="http://schema.org/MultiCenterTrial">MultiCenterTrial</option>
                            <option value="http://schema.org/OpenTrial">OpenTrial</option>
                            <option value="http://schema.org/PlaceboControlledTrial">PlaceboControlledTrial</option>
                            <option value="http://schema.org/RandomizedTrial">RandomizedTrial</option>
                            <option value="http://schema.org/SingleBlindedTrial">SingleBlindedTrial</option>
                            <option value="http://schema.org/SingleCenterTrial">SingleCenterTrial</option>
                            <option value="http://schema.org/TripleBlindedTrial">TripleBlindedTrial</option>
                        </select>
                        <select id="pageitemscopemedicinesystem">
                            <option value="http://schema.org/MedicineSystem">Select a MedicineSystem Type</option>
                            <option value="http://schema.org/Ayurvedic">Ayurvedic</option>
                            <option value="http://schema.org/Chiropractic">Chiropractic</option>
                            <option value="http://schema.org/Homeopathic">Homeopathic</option>
                            <option value="http://schema.org/Osteopathic">Osteopathic</option>
                            <option value="http://schema.org/TraditionalChinese">TraditionalChinese</option>
                            <option value="http://schema.org/WesternConventional">WesternConventional</option>
                        </select>
                        <select id="pageitemscopephysicalactivitycategory">
                            <option value="http://schema.org/PhysicalActivityCategory">Select a PhysicalActivityCategory Type</option>
                            <option value="http://schema.org/AerobicActivity">AerobicActivity</option>
                            <option value="http://schema.org/AnaerobicActivity">AnaerobicActivity</option>
                            <option value="http://schema.org/Balance">Balance</option>
                            <option value="http://schema.org/Flexibility">Flexibility</option>
                            <option value="http://schema.org/LeisureTimeActivity">LeisureTimeActivity</option>
                            <option value="http://schema.org/OccupationalActivity">OccupationalActivity</option>
                            <option value="http://schema.org/StrengthTraining">StrengthTraining</option>
                        </select>
                        <select id="pageitemscopephysicalexam">
                            <option value="http://schema.org/PhysicalExam">Select a PhysicalExam Type</option>
                            <option value="http://schema.org/Abdomen">Abdomen</option>
                            <option value="http://schema.org/Appearance">Appearance</option>
                            <option value="http://schema.org/CardiovascularExam">CardiovascularExam</option>
                            <option value="http://schema.org/Ear">Ear</option>
                            <option value="http://schema.org/Eye">Eye</option>
                            <option value="http://schema.org/Genitourinary">Genitourinary</option>
                            <option value="http://schema.org/Head">Head</option>
                            <option value="http://schema.org/Lung">Lung</option>
                            <option value="http://schema.org/MusculoskeletalExam">MusculoskeletalExam</option>
                            <option value="http://schema.org/Neck">Neck</option>
                            <option value="http://schema.org/Neuro">Neuro</option>
                            <option value="http://schema.org/Nose">Nose</option>
                            <option value="http://schema.org/Skin">Skin</option>
                            <option value="http://schema.org/Throat">Throat</option>
                            <option value="http://schema.org/VitalSign">VitalSign</option>
                        </select>
                <select id="pageitemscopemedicalprocedure">
                    <option value="http://schema.org/MedicalProcedure">Select a MedicalProcedure Type</option>
                    <option value="http://schema.org/DiagnosticProcedure">DiagnosticProcedure</option>
                    <option value="http://schema.org/PalliativeProcedure">PalliativeProcedure</option>
                    <option value="http://schema.org/TherapeuticProcedure">TherapeuticProcedure</option>
                </select>
                <select id="pageitemscopemedicalriskestimator">
                    <option value="http://schema.org/MedicalRiskEstimator">Select a MedicalRiskEstimator Type</option>
                    <option value="http://schema.org/MedicalRiskCalculator">MedicalRiskCalculator</option>
                    <option value="http://schema.org/MedicalRiskScore">MedicalRiskScore</option>
                </select>
                <select id="pageitemscopemedicalsignorsymptom">
                    <option value="http://schema.org/MedicalSignorSymptom">Select a MedicalSignorSymptom Type</option>
                    <option value="http://schema.org/MedicalSign">MedicalSign</option>
                    <option value="http://schema.org/MedicalSymptom">MedicalSymptom</option>
                </select>
                <select id="pageitemscopemedicalstudy">
                    <option value="http://schema.org/MedicalStudy">Select a MedicalStudy Type</option>
                    <option value="http://schema.org/MedicalObservationalStudy">MedicalObservationalStudy</option>
                    <option value="http://schema.org/MedicalTrial">MedicalTrial</option>
                </select>
                <select id="pageitemscopemedicaltest">
                    <option value="http://schema.org/MedicalTest">Select a MedicalTest Type</option>
                    <option value="http://schema.org/BloodTest">BloodTest</option>
                    <option value="http://schema.org/DiagnosticProcedure">DiagnosticProcedure</option>
                    <option value="http://schema.org/ImagingTest">ImagingTest</option>
                    <option value="http://schema.org/MedicalTestPanel">MedicalTestPanel</option>
                    <option value="http://schema.org/PathologyTest">PathologyTest</option>
                </select>
                <select id="pageitemscopemedicaltherapy">
                    <option value="http://schema.org/MedicalTherapy">Select a MedicalTherapy Type</option>
                    <option value="http://schema.org/DietarySupplement">DietarySupplement</option>
                    <option value="http://schema.org/Drug">Drug</option>
                    <option value="http://schema.org/DrugClass">DrugClass</option>
                    <option value="http://schema.org/LifestyleModification">LifestyleModification</option>
                    <option value="http://schema.org/PalliativeProcedure">PalliativeProcedure</option>
                    <option value="http://schema.org/PhysicalTherapy">PhysicalTherapy</option>
                    <option value="http://schema.org/PsychologicalTreatment">PsychologicalTreatment</option>
                    <option value="http://schema.org/RadiationTherapy">RadiationTherapy</option>
                    <option value="http://schema.org/TherapeuticProcedure">TherapeuticProcedure</option>
                </select>
                    <select id="pageitemscopelifestylemodification">
                        <option value="http://schema.org/LifestyleModification">Select a LifestyleModification Type</option>
                        <option value="http://schema.org/Diet">Diet</option>
                        <option value="http://schema.org/PhysicalActivity">PhysicalActivity</option>
                    </select>
                    <select id="pageitemscopephysicalactivity">
                        <option value="http://schema.org/">Select a PhysicalActivity Type</option>
                        <option value="http://schema.org/ExercisePlan">ExercisePlan</option>
                </select>
            <select id="pageitemscopeorganization">
                <option value="http://schema.org/Organization">Select a Organization Type</option>
                <option value="http://schema.org/Corporation">Corporation</option>
                <option value="http://schema.org/EducationalOrganization">EducationalOrganization</option>
                <option value="http://schema.org/GovernmentOrganization">GovernmentOrganization</option>
                <option value="http://schema.org/LocalBusiness">LocalBusiness</option>
                <option value="http://schema.org/NGO">NGO</option>
                <option value="http://schema.org/PerformingGroup">PerformingGroup</option>
                <option value="http://schema.org/SportsTeam">SportsTeam</option>
            </select>
                <select id="pageitemscopeeducationalorganization">
                    <option value="http://schema.org/EducationalOrganization">Select a EducationalOrganization Type</option>
                    <option value="http://schema.org/CollegeOrUniversity">CollegeOrUniversity</option>
                    <option value="http://schema.org/ElementarySchool">ElementarySchool</option>
                    <option value="http://schema.org/HighSchool">HighSchool</option>
                    <option value="http://schema.org/MiddleSchool">MiddleSchool</option>
                    <option value="http://schema.org/Preschool">Preschool</option>
                    <option value="http://schema.org/School">School</option>
                </select>
                <select id="pageitemscopelocalbusiness">
                    <option value="http://schema.org/LocalBusiness">Select a LocalBusiness Type</option>
                    <option value="http://schema.org/AnimalShelter">AnimalShelter</option>
                    <option value="http://schema.org/AutomotiveBusiness">AutomotiveBusiness</option>
                    <option value="http://schema.org/ChildCare">ChildCare</option>
                    <option value="http://schema.org/DryCleaningOrLaundry">DryCleaningOrLaundry</option>
                    <option value="http://schema.org/EmergencyService">EmergencyService</option>
                    <option value="http://schema.org/EmploymentAgency">EmploymentAgency</option>
                    <option value="http://schema.org/EntertainmentBusiness">EntertainmentBusiness</option>
                    <option value="http://schema.org/FinancialService">FinancialService</option>
                    <option value="http://schema.org/FoodEstablishment">FoodEstablishment</option>
                    <option value="http://schema.org/GovernmentOffice">GovernmentOffice</option>
                    <option value="http://schema.org/HealthAndBeautyBusiness">HealthAndBeautyBusiness</option>
                    <option value="http://schema.org/HomeAndConstructionBusiness">HomeAndConstructionBusiness</option>
                    <option value="http://schema.org/InternetCafe">InternetCafe</option>
                    <option value="http://schema.org/Library">Library</option>
                    <option value="http://schema.org/LodgingBusiness">LodgingBusiness</option>
                    <option value="http://schema.org/MedicalOrganization">MedicalOrganization</option>
                    <option value="http://schema.org/ProfessionalService">ProfessionalService</option>
                    <option value="http://schema.org/RadioStation">RadioStation</option>
                    <option value="http://schema.org/RealEstateAgent">RealEstateAgent</option>
                    <option value="http://schema.org/RecyclingCenter">RecyclingCenter</option>
                    <option value="http://schema.org/SelfStorage">SelfStorage</option>
                    <option value="http://schema.org/ShoppingCenter">ShoppingCenter</option>
                    <option value="http://schema.org/SportsActivityLocation">SportsActivityLocation</option>
                    <option value="http://schema.org/Store">Store</option>
                    <option value="http://schema.org/TelevisionStation">TelevisionStation</option>
                    <option value="http://schema.org/TouristInformationCenter">TouristInformationCenter</option>
                    <option value="http://schema.org/TravelAgency">TravelAgency</option>
                </select>
                    <select id="pageitemscopeautomotivebusiness">
                        <option value="http://schema.org/AutomotiveBusiness">Select a AutomotiveBusiness Type</option>
                        <option value="http://schema.org/AutoBodyShop">AutoBodyShop</option>
                        <option value="http://schema.org/AutoDealer">AutoDealer</option>
                        <option value="http://schema.org/AutoPartsStore">AutoPartsStore</option>
                        <option value="http://schema.org/AutoRental">AutoRental</option>
                        <option value="http://schema.org/AutoRepair">AutoRepair</option>
                        <option value="http://schema.org/AutoWash">AutoWash</option>
                        <option value="http://schema.org/GasStation">GasStation</option>
                        <option value="http://schema.org/MotorcycleDealer">MotorcycleDealer</option>
                        <option value="http://schema.org/MotorcycleRepair">MotorcycleRepair</option>
                    </select>
                    <select id="pageitemscopeemergencyservice">
                        <option value="http://schema.org/EmergencyService">Select a EmergencyService Type</option>
                        <option value="http://schema.org/FireStation">FireStation</option>
                        <option value="http://schema.org/Hospital">Hospital</option>
                        <option value="http://schema.org/PoliceStation">PoliceStation</option>
                    </select>
                    <select id="pageitemscopeentertainmentbusiness">
                        <option value="http://schema.org/EntertainmentBusiness">Select a EntertainmentBusiness Type</option>
                        <option value="http://schema.org/AdultEntertainment">AdultEntertainment</option>
                        <option value="http://schema.org/AmusementPark">AmusementPark</option>
                        <option value="http://schema.org/ArtGallery">ArtGallery</option>
                        <option value="http://schema.org/Casino">Casino</option>
                        <option value="http://schema.org/ComedyClub">ComedyClub</option>
                        <option value="http://schema.org/MovieTheater">MovieTheater</option>
                        <option value="http://schema.org/NightClub">NightClub</option>
                    </select>
                    <select id="pageitemscopefinancialservice">
                        <option value="http://schema.org/FinancialService">Select a FinancialService Type</option>
                        <option value="http://schema.org/AccountingService">AccountingService</option>
                        <option value="http://schema.org/AutomatedTeller">AutomatedTeller</option>
                        <option value="http://schema.org/BankOrCreditUnion">BankOrCreditUnion</option>
                        <option value="http://schema.org/InsuranceAgency">InsuranceAgency</option>
                    </select>
                    <select id="pageitemscopefoodestablishment">
                        <option value="http://schema.org/FoodEstablishment">Select a FoodEstablishment Type</option>
                        <option value="http://schema.org/Bakery">Bakery</option>
                        <option value="http://schema.org/BarOrPub">BarOrPub</option>
                        <option value="http://schema.org/Brewery">Brewery</option>
                        <option value="http://schema.org/CafeOrCoffeeShop">CafeOrCoffeeShop</option>
                        <option value="http://schema.org/FastFoodRestaurant">FastFoodRestaurant</option>
                        <option value="http://schema.org/IceCreamShop">IceCreamShop</option>
                        <option value="http://schema.org/Restaurant">Restaurant</option>
                        <option value="http://schema.org/Winery">Winery</option>
                    </select>
                    <select id="pageitemscopegovernmentoffice">
                        <option value="http://schema.org/GovernmentOffice">Select a GovernmentOffice Type</option>
                        <option value="http://schema.org/PostOffice">PostOffice</option>
                    </select>
                    <select id="pageitemscopehealthandbeautybusiness">
                        <option value="http://schema.org/HealthAndBeautyBusiness">Select a HealthAndBeautyBusiness Type</option>
                        <option value="http://schema.org/BeautySalon">BeautySalon</option>
                        <option value="http://schema.org/DaySpa">DaySpa</option>
                        <option value="http://schema.org/HairSalon">HairSalon</option>
                        <option value="http://schema.org/HealthClub">HealthClub</option>
                        <option value="http://schema.org/NailSalon">NailSalon</option>
                        <option value="http://schema.org/TattooParlor">TattooParlor</option>
                    </select>
                    <select id="pageitemscopehomeandconstructionbusiness">
                        <option value="http://schema.org/HomeAndConstructionBusiness">Select a HomeAndConstructionBusiness Type</option>
                        <option value="http://schema.org/Electrician">Electrician</option>
                        <option value="http://schema.org/GeneralContractor">GeneralContractor</option>
                        <option value="http://schema.org/HVACBusiness">HVACBusiness</option>
                        <option value="http://schema.org/HousePainter">HousePainter</option>
                        <option value="http://schema.org/Locksmith">Locksmith</option>
                        <option value="http://schema.org/MovingCompany">MovingCompany</option>
                        <option value="http://schema.org/Plumber">Plumber</option>
                        <option value="http://schema.org/RoofingContractor">RoofingContractor</option>
                    </select>
                    <select id="pageitemscopelodgingbusiness">
                        <option value="http://schema.org/LodgingBusiness">Select a LodgingBusiness Type</option>
                        <option value="http://schema.org/BedAndBreakfast">BedAndBreakfast</option>
                        <option value="http://schema.org/Hostel">Hostel</option>
                        <option value="http://schema.org/Hotel">Hotel</option>
                        <option value="http://schema.org/Motel">Motel</option>
                    </select>
                    <select id="pageitemscopemedicalorganization">
                        <option value="http://schema.org/MedicalOrganization">Select a MedicalOrganization Type</option>
                        <option value="http://schema.org/Dentist">Dentist</option>
                        <option value="http://schema.org/DiagnosticLab">DiagnosticLab</option>
                        <option value="http://schema.org/Hospital">Hospital</option>
                        <option value="http://schema.org/MedicalClinic">MedicalClinic</option>
                        <option value="http://schema.org/Optician">Optician</option>
                        <option value="http://schema.org/Pharmacy">Pharmacy</option>
                        <option value="http://schema.org/Physician">Physician</option>
                        <option value="http://schema.org/VeterinaryCare">VeterinaryCare</option>
                    </select>
                    <select id="pageitemscopeprofessionalservice">
                        <option value="http://schema.org/ProfessionalService">Select a ProfessionalService Type</option>
                        <option value="http://schema.org/AccountingService">AccountingService</option>
                        <option value="http://schema.org/Attorney">Attorney</option>
                        <option value="http://schema.org/Dentist">Dentist</option>
                        <option value="http://schema.org/Electrician">Electrician</option>
                        <option value="http://schema.org/GeneralContractor">GeneralContractor</option>
                        <option value="http://schema.org/HousePainter">HousePainter</option>
                        <option value="http://schema.org/Locksmith">Locksmith</option>
                        <option value="http://schema.org/Notary">Notary</option>
                        <option value="http://schema.org/Plumber">Plumber</option>
                        <option value="http://schema.org/RoofingContractor">RoofingContractor</option>
                    </select>
                    <select id="pageitemscopesportsactivitylocation">
                        <option value="http://schema.org/SportsActivityLocation">Select a SportsActivityLocation Type</option>
                        <option value="http://schema.org/BowlingAlley">BowlingAlley</option>
                        <option value="http://schema.org/ExerciseGym">ExerciseGym</option>
                        <option value="http://schema.org/GolfCourse">GolfCourse</option>
                        <option value="http://schema.org/HealthClub">HealthClub</option>
                        <option value="http://schema.org/PublicSwimmingPool">PublicSwimmingPool</option>
                        <option value="http://schema.org/SkiResort">SkiResort</option>
                        <option value="http://schema.org/SportsClub">SportsClub</option>
                        <option value="http://schema.org/StadiumOrArena">StadiumOrArena</option>
                        <option value="http://schema.org/TennisComplex">TennisComplex</option>
                    </select>
                    <select id="pageitemscopestore">
                        <option value="http://schema.org/Store">Select a Store Type</option>
                        <option value="http://schema.org/AutoPartsStore">AutoPartsStore</option>
                        <option value="http://schema.org/BikeStore">BikeStore</option>
                        <option value="http://schema.org/BookStore">BookStore</option>
                        <option value="http://schema.org/ClothingStore">ClothingStore</option>
                        <option value="http://schema.org/ComputerStore">ComputerStore</option>
                        <option value="http://schema.org/ConvenienceStore">ConvenienceStore</option>
                        <option value="http://schema.org/DepartmentStore">DepartmentStore</option>
                        <option value="http://schema.org/ElectronicsStore">ElectronicsStore</option>
                        <option value="http://schema.org/Florist">Florist</option>
                        <option value="http://schema.org/FurnitureStore">FurnitureStore</option>
                        <option value="http://schema.org/GardenStore">GardenStore</option>
                        <option value="http://schema.org/GroceryStore">GroceryStore</option>
                        <option value="http://schema.org/HardwareStore">HardwareStore</option>
                        <option value="http://schema.org/HobbyShop">HobbyShop</option>
                        <option value="http://schema.org/HomeGoodsStore">HomeGoodsStore</option>
                        <option value="http://schema.org/JewelryStore">JewelryStore</option>
                        <option value="http://schema.org/LiquorStore">LiquorStore</option>
                        <option value="http://schema.org/MensClothingStore">MensClothingStore</option>
                        <option value="http://schema.org/MobilePhoneStore">MobilePhoneStore</option>
                        <option value="http://schema.org/MovieRentalStore">MovieRentalStore</option>
                        <option value="http://schema.org/MusicStore">MusicStore</option>
                        <option value="http://schema.org/OfficeEquipmentStore">OfficeEquipmentStore</option>
                        <option value="http://schema.org/OutletStore">OutletStore</option>
                        <option value="http://schema.org/PawnShop">PawnShop</option>
                        <option value="http://schema.org/PetStore">PetStore</option>
                        <option value="http://schema.org/ShoeStore">ShoeStore</option>
                        <option value="http://schema.org/SportingGoodsStore">SportingGoodsStore</option>
                        <option value="http://schema.org/TireShop">TireShop</option>
                        <option value="http://schema.org/ToyStore">ToyStore</option>
                        <option value="http://schema.org/WholesaleStore">WholesaleStore</option>
                    </select>
                <select id="pageitemscopeperforminggroup">
                    <option value="http://schema.org/PerformingGroup">Select a PerformingGroup Type</option>
                    <option value="http://schema.org/DanceGroup">DanceGroup</option>
                    <option value="http://schema.org/MusicGroup">MusicGroup</option>
                    <option value="http://schema.org/TheaterGroup">TheaterGroup</option>
                </select>
            <select id="pageitemscopeplace">
                <option value="http://schema.org/Place">Select a Place Type</option>
                <option value="http://schema.org/AdministrativeArea">AdministrativeArea</option>
                <option value="http://schema.org/CivicStructure">CivicStructure</option>
                <option value="http://schema.org/Landform">Landform</option>
                <option value="http://schema.org/LandmarksOrHistoricalBuildings">LandmarksOrHistoricalBuildings</option>
                <option value="http://schema.org/Residence">Residence</option>
                <option value="http://schema.org/TouristAttraction">TouristAttraction</option>
            </select>
                <select id="pageitemscopeadministrativearea">
                    <option value="http://schema.org/AdministrativeArea">Select a AdministrativeArea Type</option>
                    <option value="http://schema.org/City">City</option>
                    <option value="http://schema.org/Country">Country</option>
                    <option value="http://schema.org/State">State</option>
                </select>
                <select id="pageitemscopecivicstructure">
                    <option value="http://schema.org/CivicStructure">Select a CivicStructure Type</option>
                    <option value="http://schema.org/Airport">Airport</option>
                    <option value="http://schema.org/Aquarium">Aquarium</option>
                    <option value="http://schema.org/Beach">Beach</option>
                    <option value="http://schema.org/BusStation">BusStation</option>
                    <option value="http://schema.org/BusStop">BusStop</option>
                    <option value="http://schema.org/Campground">Campground</option>
                    <option value="http://schema.org/Cemetery">Cemetery</option>
                    <option value="http://schema.org/Crematorium">Crematorium</option>
                    <option value="http://schema.org/EventVenue">EventVenue</option>
                    <option value="http://schema.org/FireStation">FireStation</option>
                    <option value="http://schema.org/GovernmentBuilding">GovernmentBuilding</option>
                    <option value="http://schema.org/Hospital">Hospital</option>
                    <option value="http://schema.org/MovieTheater">MovieTheater</option>
                    <option value="http://schema.org/Museum">Museum</option>
                    <option value="http://schema.org/MusicVenue">MusicVenue</option>
                    <option value="http://schema.org/Park">Park</option>
                    <option value="http://schema.org/ParkingFacility">ParkingFacility</option>
                    <option value="http://schema.org/PerformingArtsTheater">PerformingArtsTheater</option>
                    <option value="http://schema.org/PlaceOfWorship">PlaceOfWorship</option>
                    <option value="http://schema.org/Playground">Playground</option>
                    <option value="http://schema.org/PoliceStation">PoliceStation</option>
                    <option value="http://schema.org/RVPark">RVPark</option>
                    <option value="http://schema.org/StadiumOrArena">StadiumOrArena</option>
                    <option value="http://schema.org/SubwayStation">SubwayStation</option>
                    <option value="http://schema.org/TaxiStand">TaxiStand</option>
                    <option value="http://schema.org/TrainStation">TrainStation</option>
                    <option value="http://schema.org/Zoo">Zoo</option>
                </select>
                    <select id="pageitemscopegovernmentbuilding">
                    <option value="http://schema.org/GovernmentBuilding">Select a GovernmentBuilding Type</option>
                    <option value="http://schema.org/CityHall">CityHall</option>
                    <option value="http://schema.org/Courthouse">Courthouse</option>
                    <option value="http://schema.org/DefenceEstablishment">DefenceEstablishment</option>
                    <option value="http://schema.org/Embassy">Embassy</option>
                    <option value="http://schema.org/LegislativeBuilding">LegislativeBuilding</option>
                    </select>
                    <select id="pageitemscopeplaceofworship">
                        <option value="http://schema.org/PlaceOfWorship">Select a PlaceOfWorship Type</option>
                        <option value="http://schema.org/BuddhistTemple">BuddhistTemple</option>
                        <option value="http://schema.org/CatholicChurch">CatholicChurch</option>
                        <option value="http://schema.org/Church">Church</option>
                        <option value="http://schema.org/HinduTemple">HinduTemple</option>
                        <option value="http://schema.org/Mosque">Mosque</option>
                        <option value="http://schema.org/Synagogue">Synagogue</option>
                    </select>
                <select id="pageitemscopelandform">
                    <option value="http://schema.org/Landform">Select a Landform Type</option>
                    <option value="http://schema.org/BodyOfWater">BodyOfWater</option>
                    <option value="http://schema.org/Continent">Continent</option>
                    <option value="http://schema.org/Mountain">Mountain</option>
                    <option value="http://schema.org/Volcano">Volcano</option>
                </select>
                    <select id="pageitemscopebodyofwater">
                        <option value="http://schema.org/BodyOfWater">Select a BodyOfWater Type</option>
                        <option value="http://schema.org/Canal">Canal</option>
                        <option value="http://schema.org/LakeBodyOfWater">LakeBodyOfWater</option>
                        <option value="http://schema.org/OceanBodyOfWater">OceanBodyOfWater</option>
                        <option value="http://schema.org/Pond">Pond</option>
                        <option value="http://schema.org/Reservoir">Reservoir</option>
                        <option value="http://schema.org/RiverBodyOfWater">RiverBodyOfWater</option>
                        <option value="http://schema.org/SeaBodyOfWater">SeaBodyOfWater</option>
                        <option value="http://schema.org/Waterfall">Waterfall</option>
                    </select>
                <select id="pageitemscoperesidence">
                    <option value="http://schema.org/Residence">Select a Residence Type</option>
                    <option value="http://schema.org/ApartmentComplex">ApartmentComplex</option>
                    <option value="http://schema.org/GatedResidenceCommunity">GatedResidenceCommunity</option>
                    <option value="http://schema.org/SingleFamilyResidence">SingleFamilyResidence</option>
                </select>
            <select id="pageitemscopeproduct">
                    <option value="http://schema.org/Product">Select a Product Type</option>
                    <option value="http://schema.org/IndividualProduct">IndividualProduct</option>
                    <option value="http://schema.org/ProductModel">ProductModel</option>
                    <option value="http://schema.org/SomeProducts">SomeProducts</option>
            </select>
                
<?php
}