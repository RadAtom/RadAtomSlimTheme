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
            <option value="">Select a Data Type</option>
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
            <option value="">Select a Thing Type</option>
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
                    <option value="">Select a AchieveAction Type</option>
                    <option value="http://schema.org/LoseAction">LoseAction</option>
                    <option value="http://schema.org/TieAction">TieAction</option>
                    <option value="http://schema.org/WinAction">WinAction</option>
                </select>
                    <select id="pageitemscopeassessaction">
                        <option value="">Select a AssessAction Type</option>
                        <option value="http://schema.org/ChooseAction">ChooseAction</option>
                        <option value="http://schema.org/IgnoreAction">IgnoreAction</option>
                        <option value="http://schema.org/ReactAction">ReactAction</option>
                        <option value="http://schema.org/ReviewAction">ReviewAction</option>
                    </select>
                    <select id="pageitemscopechooseaction">
                        <option value="">Select a ChooseAction Type</option>
                        <option value="http://schema.org/VoteAction">VoteAction</option>
                    </select>
                    <select id="pageitemscopereactaction">
                        <option value="">Select a ReactAction Type</option>
                        <option value="http://schema.org/AgreeAction">AgreeAction</option>
                        <option value="http://schema.org/DisagreeAction">DisagreeAction</option>
                        <option value="http://schema.org/DislikeAction">DislikeAction</option>
                        <option value="http://schema.org/EndorseAction">EndorseAction</option>
                        <option value="http://schema.org/LikeAction">LikeAction</option>
                        <option value="http://schema.org/WantAction">WantAction</option>
                    </select>
                <select id="pageitemscopeconsumeaction">
                    <option value="">Select a ConsumeAction Type</option>
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
                        <option value="">Select a UseAction Type</option>
                        <option value="http://schema.org/WearAction">WearAction</option>
                    </select>
                <select id="pageitemscopecreateaction">
                    <option value="">Select a CreateAction Type</option>
                    <option value="http://schema.org/CookAction">CookAction</option>
                    <option value="http://schema.org/DrawAction">DrawAction</option>
                    <option value="http://schema.org/FilmAction">FilmAction</option>
                    <option value="http://schema.org/PaintAction">PaintAction</option>
                    <option value="http://schema.org/PhotographAction">PhotographAction</option>
                    <option value="http://schema.org/WriteAction">WriteAction</option>
                </select>
                <select id="pageitemscopefindaction">
                    <option value="">Select a FindAction Type</option>
                    <option value="http://schema.org/CheckAction">CheckAction</option>
                    <option value="http://schema.org/DiscoverAction">DiscoverAction</option>
                    <option value="http://schema.org/TrackAction">TrackAction</option>
                </select>
                <select id="pageitemscopeinteractaction">
                    <option value="">Select a InteractAction Type</option>
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
                        <option value="">Select a CommunicateAction Type</option>
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
                            <option value="">Select a InformAction Type</option>
                            <option value="http://schema.org/ConfirmAction">ConfirmAction
                            <option value="http://schema.org/RsvpAction">RsvpAction</option>
                    </select>
                <select id="pageitemscopemoveaction">
                    <option value="">Select a MoveAction Type</option>
                    <option value="http://schema.org/ArriveAction">ArriveAction</option>
                    <option value="http://schema.org/DepartAction">DepartAction</option>
                    <option value="http://schema.org/TravelAction">TravelAction</option>
                </select>
                <select id="pageitemscopeorganizeaction">
                    <option value="">Select a OrganizeAction Type</option>
                    <option value="http://schema.org/AllocateAction">AllocateAction</option>
                    <option value="http://schema.org/ApplyAction">ApplyAction</option>
                    <option value="http://schema.org/BookmarkAction">BookmarkAction</option>
                    <option value="http://schema.org/PlanAction">PlanAction</option>
                </select>
                    <select id="pageitemscopeallocateaction">
                        <option value="">Select a AllocateAction Type</option>
                        <option value="http://schema.org/AcceptAction">AcceptAction</option>
                        <option value="http://schema.org/AssignAction">AssignAction</option>
                        <option value="http://schema.org/AuthorizeAction">AuthorizeAction</option>
                        <option value="http://schema.org/RejectAction">RejectAction</option>
                    </select>
                    <select id="pageitemscopeplanaction">
                        <option value="">Select a PlanAction Type</option>
                        <option value="http://schema.org/CancelAction">CancelAction</option>
                        <option value="http://schema.org/ReserveAction">ReserveAction</option>
                        <option value="http://schema.org/ScheduleAction">ScheduleAction</option>
                    </select>
                <select id="pageitemscopeplayaction">
                    <option value="">Select a PlayAction Type</option>
                    <option value="http://schema.org/ExerciseAction">ExerciseAction</option>
                    <option value="http://schema.org/PerformAction">PerformAction</option>
                </select>
                <select id="pageitemscopetradeaction">
                    <option value="">Select a TradeAction Type</option>
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
                    <option value="">Select a TransferAction Type</option>
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
                    <option value="">Select a UpdateAction Type</option>
                    <option value="http://schema.org/AddAction">AddAction</option>
                    <option value="http://schema.org/DeleteAction">DeleteAction</option>
                    <option value="http://schema.org/ReplaceAction">ReplaceAction</option>
                </select>
                    <select id="pageitemscopeaddaction">
                        <option value="">Select a AddAction Type</option>
                        <option value="http://schema.org/InsertAction">InsertAction</option>
                    </select>
                    <select id="pageitemscopeinsertaction">
                            <option value="">Select a InsertAction Type</option>
                            <option value="http://schema.org/AppendAction">AppendAction</option>
                            <option value="http://schema.org/PrependAction">PrependAction</option>
                    </select>
            <select id="pageitemscopecreativework">
                <option value="">Select a CreativeWork Type</option>
                <option>Article</option>
                <option>Blog</option>
                <option>Book</option>
                <option>Clip</option>
                <option>Code</option>
                <option>Comment</option>
                <option>DataCatalog</option>
                <option>Dataset</option>
                <option>Diet</option>
                <option>Episode</option>
                <option>ExercisePlan</option>
                <option>ItemList</option>
                <option>Map</option>
                <option>MediaObject</option>
                <option>Movie</option>
                <option>MusicPlaylist</option>
                <option>MusicRecording</option>
                <option>Painting</option>
                <option>Photograph</option>
                <option>Recipe</option>
                <option>Review</option>
                <option>Sculpture</option>
                <option>Season</option>
                <option>Series</option>
                <option>SoftwareApplication</option>
                <option>TVSeason</option>
                <option>TVSeries</option>
                <option>WebPage</option>
                <option>WebPageElement</option>
            </select>
                <select id="pageitemscopearticle">
                    <option value="">Select a Article Type</option>
                    <option>BlogPosting</option>
                    <option>NewsArticle</option>
                    <option>ScholarlyArticle</option>
                    <option>TechArticle</option>
                </select>
                    <select id="pageitemscopescholarlyarticle">
                        <option value="">Select a ScholarlyArticle Type</option>
                        <option>MedicalScholarlyArticle</option>
                    </select>
                    <select id="pageitemscopetecharticle">
                        <option value="">Select a TechArticle Type</option>
                        <option>APIReference</option>
                    </select>  
                <select id="pageitemscopeclip">
                    <option value="">Select a Clip Type</option>
                    <option>RadioClip</option>
                    <option>TVClip</option>
                </select>
                <select id="pageitemscopeepisode">
                    <option value="">Select a Episode Type</option>
                    <option>RadioEpisode</option>
                    <option>TVEpisode</option>
                </select>
                <select id="pageitemscopemediaobject">
                    <option value="">Select a MediaObject Type</option>
                    <option>AudioObject</option>
                    <option>DataDownload</option>
                    <option>ImageObject</option>
                    <option>MusicVideoObject</option>
                    <option>VideoObject</option>
                </select>
                <select id="pageitemscopemusicplaylist">
                    <option value="">Select a MusicPlaylist Type</option>
                    <option>MusicAlbum</option>
                </select>
                <select id="pageitemscopeseason">
                    <option value="">Select a Season Type</option>
                    <option>RadioSeason</option>
                    <option>TVSeason</option>
                </select>
                <select id="pageitemscopeseries">
                    <option value="">Select a Series Type</option>
                    <option>RadioSeries</option>
                    <option>TVSeries</option>
                </select>
                <select id="pageitemscopesoftwareapplication">
                    <option value="">Select a SoftwareApplication Type</option>
                    <option>MobileApplication/option>
                    <option>WebApplication</option>
                </select>
                <select id="pageitemscopewebpage">
                    <option value="">Select a Webapage Type</option>
                    <option>AboutPage</option>
                    <option>CheckoutPage</option>
                    <option>CollectionPage</option>
                    <option>ContactPage</option>
                    <option>ItemPage</option>
                    <option>MedicalWebPage</option>
                    <option>ProfilePage</option>
                    <option>SearchResultsPage</option>
                </select>
                    <select id="pageitemscopecollectionpage">
                        <option value="">Select a CollectionPage Type</option>
                        <option>ImageGallery</option>
                        <option>VideoGallery</option>
                    </select>
                <select id="pageitemscopewebpageelement">
                    <option value="">Select a WebpageElement Type</option>
                    <option>SiteNavigationElement</option>
                    <option>Table</option>
                    <option>WPAdBlock</option>
                    <option>WPFooter</option>
                    <option>WPHeader</option>
                    <option>WPSideBar</option>
                </select>
            <select id="pageitemscopeevent">
                <option value="">Select a Event Type</option>
                <option>BusinessEvent</option>
                <option>ChildrensEvent</option>
                <option>ComedyEvent</option>
                <option>DanceEvent</option>
                <option>DeliveryEvent</option>
                <option>EducationEvent</option>
                <option>Festival</option>
                <option>FoodEvent</option>
                <option>LiteraryEvent</option>
                <option>MusicEvent</option>
                <option>PublicationEvent</option>
                <option>SaleEvent</option>
                <option>SocialEvent</option>
                <option>SportsEvent</option>
                <option>TheaterEvent</option>
                <option>UserInteraction</option>
                <option>VisualArtsEvent</option>
            </select>
                <select id="pageitemscopepublicationevent">
                    <option value="">Select a PublicationEvent Type</option>
                    <option>BroadcastEvent</option>
                    <option>OnDemandEvent</option>
                </select>
                <select id="pageitemscopeuserinteraction">
                    <option value="">Select a UserInteraction Type</option>
                    <option>UserBlocks</option>
                    <option>UserCheckins</option>
                    <option>UserComments</option>
                    <option>UserDownloads</option>
                    <option>UserLikes</option>
                    <option>UserPageVisits</option>
                    <option>UserPlays</option>
                    <option>UserPlusOnes</option>
                    <option>UserTweets</option>
                </select>
            <select id="pageitemscopeintangible">
                <option value="">Select a Intangible Type</option>
                <option>AlignmentObject</option>
                <option>Audience</option>
                <option>Brand</option>
                <option>Demand</option>
                <option>Enumeration</option>
                <option>JobPosting</option>
                <option>Language</option>
                <option>Offer</option>
                <option>Order</option>
                <option>ParcelDelivery</option>
                <option>Permit</option>
                <option>Quantity</option>
                <option>Rating</option>
                <option>Service</option>
                <option>ServiceChannel</option>
                <option>StructuredValue</option>
            </select>
                <select id="pageitemscopeaudience">
                    <option value="">Select a Audience Type</option>
                    <option>BusinessAudience</option>
                    <option>EducationalAudience</option>
                    <option>MedicalAudience</option>
                    <option>PeopleAudience</option>
                    <option>Researcher</option>
                </select>
                    <select id="pageitemscopemedicalaudience">
                        <option value="">Select a Medical Audience Type</option>
                        <option>Clinician</option>
                        <option>MedicalResearcher</option>
                        <option>Patient</option>
                    </select>
                    <select id="pageitemscopepeopleaudience">
                        <option value="">Select a PeopleAudience Type</option>
                        <option>ParentAudience</option>
                    </select>            
                <select id="pageitemscopeenumeration">
                    <option value="">Select a Enumeration Type</option>
                    <option>BookFormatType</option>
                    <option>BusinessEntityType</option>
                    <option>BusinessFunction</option>
                    <option>ContactPointOption</option>
                    <option>DayOfWeek</option>
                    <option>DeliveryMethod</option>
                    <option>EventStatusType</option>
                    <option>ItemAvailability</option>
                    <option>OfferItemCondition</option>
                    <option>OrderStatus</option>
                    <option>PaymentMethod</option>
                    <option>QualitativeValue</option>
                    <option>Specialty</option>
                    <option>WarrantyScope</option>
                </select>
                    <select id="pageitemscopebookformattype">
                        <option value="">Select a BookFormatType Type</option>
                        <option>EBook</option>
                        <option>Hardcover</option>
                        <option>Paperback</option>
                    </select>
                    <select id="pageitemscopecontactpointoption">
                        <option value="">Select a ContactPointOption Type</option>
                        <option>HearingImpairedSupported</option>
                        <option>TollFree</option>
                    </select>
                    <select id="pageitemscopedeliverymethod">
                        <option value="">Select a DeliveryMethod Type</option>
                        <option>LockerDelivery</option>
                        <option>OnSitePickup</option>
                        <option>ParcelService</option>
                    </select>
                    <select id="pageitemscopeeventstatusstype">
                        <option value="">Select a EventStatusType Type</option>
                        <option>EventCancelled</option>
                        <option>EventPostponed</option>
                        <option>EventRescheduled</option>
                        <option>EventScheduled</option>
                    </select>
                    <select id="pageitemscopeitemavailability">
                        <option value="">Select a ItemAvailability Type</option>
                        <option>Discontinued</option>
                        <option>InStock</option>
                        <option>InStoreOnly</option>
                        <option>LimitedAvailability</option>
                        <option>OnlineOnly</option>
                        <option>OutOfStock</option>
                        <option>PreOrder</option>
                        <option>SoldOut</option>
                    </select>
                    <select id="pageitemscopeofferitemcondition">
                        <option value="">Select a OfferItemCondition Type</option>
                        <option>DamagedCondition</option>
                        <option>NewCondition</option>
                        <option>RefurbishedCondition</option>
                        <option>UsedCondition</option>
                    </select>
                    <select id="pageitemscopeorderstatus">
                        <option value="">Select a OrderStatus Type</option>
                        <option>OrderCancelled</option>
                        <option>OrderDelivered</option>
                        <option>OrderInTransit</option>
                        <option>OrderPaymentDue</option>
                        <option>OrderPickupAvailable</option>
                        <option>OrderProblem</option>
                        <option>OrderProcessing</option>
                        <option>OrderReturned</option>
                    </select>
                    <select id="pageitemscopepaymentmethod">
                        <option value="">Select a PaymentMethod Type</option>
                        <option>CreditCard</option>
                    </select>
                    <select id="pageitemscopespecialty">
                        <option value="">Select a Specialty Type</option>
                        <option>MedicalSpecialty</option>
                    </select>
                        <select id="pageitemscopemedicalspecialty">
                            <option value="">Select a MedicalSpecialty Type</option>
                            <option>Anesthesia</option>
                            <option>Cardiovascular</option>
                            <option>CommunityHealth</option>
                            <option>Dentistry</option>
                            <option>Dermatologic</option>
                            <option>DietNutrition</option>
                            <option>Emergency</option>
                            <option>Endocrine</option>
                            <option>Gastroenterologic</option>
                            <option>Genetic</option>
                            <option>Geriatric</option>
                            <option>Gynecologic</option>
                            <option>Hematologic</option>
                            <option>Infectious</option>
                            <option>LaboratoryScience</option>
                            <option>Midwifery</option>
                            <option>Musculoskeletal</option>
                            <option>Neurologic</option>
                            <option>Nursing</option>
                            <option>Obstetric</option>
                            <option>OccupationalTherapy</option>
                            <option>Oncologic</option>
                            <option>Optometic</option>
                            <option>Otolaryngologic</option>
                            <option>Pathology</option>
                            <option>Pediatric</option>
                            <option>PharmacySpecialty</option>
                            <option>Physiotherapy</option>
                            <option>PlasticSurgery</option>
                            <option>Podiatric</option>
                            <option>PrimaryCare</option>
                            <option>Psychiatric</option>
                            <option>PublicHealth</option>
                            <option>Pulmonary</option>
                            <option>Radiograpy</option>
                            <option>Renal</option>
                            <option>RespiratoryTherapy</option>
                            <option>Rheumatologic</option>
                            <option>SpeechPathology</option>
                            <option>Surgical</option>
                            <option>Toxicologic</option>
                            <option>Urologic</option>
                        </select>
                <select id="pageitemscopeoffer">
                    <option value="">Select a Offer Type</option>
                    <option>AggregateOffer</option>
                </select>
                <select id="pageitemscopepermit">
                    <option value="">Select a Permit Type</option>
                    <option>GovernmentPermit</option>
                </select>
                <select id="pageitemscopequantity">
                    <option value="">Select a Quantity Type</option>
                    <option>Distance</option>
                    <option>Duration</option>
                    <option>Energy</option>
                    <option>Mass</option>
                </select>
                <select id="pageitemscoperating">
                    <option value="">Select a Rating Type</option>
                    <option>AggregateRating</option>
                </select>
                <select id="pageitemscopeservice">
                    <option value="">Select a Service Type</option>
                    <option>GovernmentService</option>
                </select>
                <select id="pageitemscopestructuredvalue">
                    <option value="">Select a StructuredValue Type</option>
                    <option>ContactPoint</option>
                    <option>GeoCoordinates</option>
                    <option>GeoShape</option>
                    <option>NutritionInformation</option>
                    <option>OpeningHoursSpecification</option>
                    <option>OwnershipInfo</option>
                    <option>PriceSpecification</option>
                    <option>QuantitativeValue</option>
                    <option>TypeAndQuantityNode</option>
                    <option>WarrantyPromise</option>
                </select>
                    <select id="pageitemscopecontactpoint">
                        <option value="">Select a ContactPoint Type</option>
                        <option>PostalAddress</option>
                    </select>
                    <select id="pageitemscopepricespecification">
                        <option value="">Select a PriceSpecification Type</option>
                        <option>DeliveryChargeSpecification</option>
                        <option>PaymentChargeSpecification</option>
                        <option>UnitPriceSpecification</option>
                    </select>
            <select id="pageitemscopemedicalentity">
                <option value="">Select a MedicalEntity Type</option>
                <option>AnatomicalStructure</option>
                <option>AnatomicalSystem</option>
                <option>MedicalCause</option>
                <option>MedicalCondition</option>
                <option>MedicalContraindication</option>
                <option>MedicalDevice</option>
                <option>MedicalGuideline</option>
                <option>MedicalIndication</option>
                <option>MedicalIntangible</option>
                <option>MedicalProcedure</option>
                <option>MedicalRiskEstimator</option>
                <option>MedicalRiskFactor</option>
                <option>MedicalSignOrSymptom</option>
                <option>MedicalStudy</option>
                <option>MedicalTest</option>
                <option>MedicalTherapy</option>
                <option>SuperficialAnatomy</option>
            </select>
                <select id="pageitemscopeanatomicalstructure">
                    <option value="">Select a AnatomicalStructure Type</option>
                    <option>Bone</option>
                    <option>BrainStructure</option>
                    <option>Joint</option>
                    <option>Ligament</option>
                    <option>Muscle</option>
                    <option>Nerve</option>
                    <option>Vessel</option>
                </select>
                    <select id="pageitemscopevessel">
                        <option value="">Select a Vessel Type</option>
                        <option>Artery</option>
                        <option>LymphaticVessel</option>
                        <option>Vein</option>
                    </select>
                <select id="pageitemscopemedicalcondition">
                    <option value="">Select a MedicalCondition Type</option>
                    <option>InfectiousDisease</option>
                </select>
                <select id="pageitemscopemedicalguideline">
                    <option value="">Select a MedicalGuidline Type</option>
                    <option>MedicalGuidelineContraindication</option>
                    <option>MedicalGuidelineRecommendation</option>
                </select>
                <select id="pageitemscopemedicalindication">
                    <option value="">Select a MedicalIndication Type</option>
                    <option>ApprovedIndication</option>
                    <option>PreventionIndication</option>
                    <option>TreatmentIndication</option>
                </select>
                <select id="pageitemscopemedicalintangible">
                    <option value="">Select a MedicalIntangible Type</option>
                    <option>DDxElement</option>
                    <option>DoseSchedule</option>
                    <option>DrugCost</option>
                    <option>DrugLegalStatus</option>
                    <option>DrugStrength</option>
                    <option>MedicalCode</option>
                    <option>MedicalConditionStage</option>
                    <option>MedicalEnumeration</option>
                </select>
                <select id="pageitemscopedoseschedule">
                    <option value="">Select a DoseSchedule Type</option>
                    <option>MaximumDoseSchedule</option>
                    <option>RecommendedDoseSchedule</option>
                    <option>ReportedDoseSchedule</option>
                </select>
                <select id="pageitemscopemedicalenumeration">
                    <option value="">Select a MedicalEnumeration Type</option>
                    <option>DrugCostCategory</option>
                    <option>DrugPregnancyCategory</option>
                    <option>DrugPrescriptionStatus</option>
                    <option>InfectiousAgentClass</option>
                    <option>MedicalAudience</option>
                    <option>MedicalDevicePurpose</option>
                    <option>MedicalEvidenceLevel</option>
                    <option>MedicalImagingTechnique</option>
                    <option>MedicalObservationalStudyDesign</option>
                    <option>MedicalProcedureType</option>
                    <option>MedicalSpecialty</option>
                    <option>MedicalStudyStatus</option>
                    <option>MedicalTrialDesign</option>
                    <option>MedicineSystem</option>
                    <option>PhysicalActivityCategory</option>
                    <option>PhysicalExam</option>
                </select>
                <select id="pageitemscopedrugcostcatagory">
                    <option value="">Select a DrugCostCatagory Type</option>
                    <option>ReimbursementCap</option>
                    <option>Retail</option>
                    <option>Wholesale</option>
                </select>
                <select id="pageitemscopedrugpregnancy">
                    <option value="">Select a DrugPregnancy Type</option>
                    <option>FDAcategoryA</option>
                    <option>FDAcategoryB</option>
                    <option>FDAcategoryC</option>
                    <option>FDAcategoryD</option>
                    <option>FDAcategoryX</option>
                    <option>FDAnotEvaluated</option>
                </select>
                <select id="pageitemscopedrugprescriptionstatus">
                    <option value="">Select a DrugPrescriptionStatus Type</option>
                    <option>OTC</option>
                    <option>PrescriptionOnly</option>
                </select>
                <select id="pageitemscopeinfectionagentclass">
                    <option value="">Select a InfectionAgentClass Type</option>
                    <option>Bacteria</option>
                    <option>Fungus</option>
                    <option>MulticellularParasite</option>
                    <option>Prion</option>
                    <option>Protozoa</option>
                    <option>Virus</option>
                </select>
                <select id="pageitemscopemedicaldevicepurpose">
                    <option value="">Select a MedicalDevicePurpose Type</option>
                    <option>Diagnostic</option>
                    <option>Therapeutic</option>
                </select>
                <select id="pageitemscopemedicalevidencelevel">
                    <option value="">Select a MedicalEvidenceLevel Type</option>
                    <option>EvidenceLevelA</option>
                    <option>EvidenceLevelB</option>
                    <option>EvidenceLevelC</option>
                </select>
                <select id="pageitemscopemedicalimagingtechnique">
                    <option value="">Select a MedicalImagingTechnique Type</option>
                    <option>CT</option>
                    <option>MRI</option>
                    <option>PET</option>
                    <option>Ultrasound</option>
                    <option>XRay</option>
                </select>
                <select id="pageitemscopemedicalobservationalstudydesign">
                    <option value="">Select a MedicalObservationalStudyDesign Type</option>
                    <option>CaseSeries</option>
                    <option>CohortStudy</option>
                    <option>CrossSectional</option>
                    <option>Longitudinal</option>
                    <option>Observational</option>
                    <option>Registry</option>
                </select>
                <select id="pageitemscopemedicalproceduretype">
                    <option value="">Select a MedicalProcedureType Type</option>
                    <option>NoninvasiveProcedure</option>
                    <option>PercutaneousProcedure</option>
                    <option>SurgicalProcedure</option>
                </select>
                </select>
                <select id="pageitemscopemedicalstudystatus">
                    <option value="">Select a MedicalStudyStatus Type</option>
                    <option>ActiveNotRecruiting</option>
                    <option>Completed</option>
                    <option>EnrollingByInvitation</option>
                    <option>NotYetRecruiting</option>
                    <option>Recruiting</option>
                    <option>ResultsAvailable</option>
                    <option>ResultsNotAvailable</option>
                    <option>Suspended</option>
                    <option>Terminated</option>
                    <option>Withdrawn</option>
                </select>
                <select id="pageitemscopemedicaltrialdesign">
                    <option value="">Select a MedicalTrialDesign Type</option>
                    <option>DoubleBlindedTrial</option>
                    <option>InternationalTrial</option>
                    <option>MultiCenterTrial</option>
                    <option>OpenTrial</option>
                    <option>PlaceboControlledTrial</option>
                    <option>RandomizedTrial</option>
                    <option>SingleBlindedTrial</option>
                    <option>SingleCenterTrial</option>
                    <option>TripleBlindedTrial</option>
                </select>
                <select id="pageitemscopemedicinesystem">
                    <option value="">Select a MedicineSystem Type</option>
                    <option>Ayurvedic</option>
                    <option>Chiropractic</option>
                    <option>Homeopathic</option>
                    <option>Osteopathic</option>
                    <option>TraditionalChinese</option>
                    <option>WesternConventional</option>
                </select>
                <select id="pageitemscopephysicalactivitycategory">
                    <option value="">Select a PhysicalActivityCategory Type</option>
                    <option>AerobicActivity</option>
                    <option>AnaerobicActivity</option>
                    <option>Balance</option>
                    <option>Flexibility</option>
                    <option>LeisureTimeActivity</option>
                    <option>OccupationalActivity</option>
                    <option>StrengthTraining</option>
                </select>
                <select id="pageitemscopephysicalexam">
                    <option value="">Select a PhysicalExam Type</option>
                    <option>Abdomen</option>
                    <option>Appearance</option>
                    <option>CardiovascularExam</option>
                    <option>Ear</option>
                    <option>Eye</option>
                    <option>Genitourinary</option>
                    <option>Head</option>
                    <option>Lung</option>
                    <option>MusculoskeletalExam</option>
                    <option>Neck</option>
                    <option>Neuro</option>
                    <option>Nose</option>
                    <option>Skin</option>
                    <option>Throat</option>
                    <option>VitalSign</option>
                </select>
                <select id="pageitemscopemedicalprocedure">
                    <option value="">Select a MedicalProcedure Type</option>
                    <option>DiagnosticProcedure</option>
                    <option>PalliativeProcedure</option>
                    <option>TherapeuticProcedure</option>
                </select>
                <select id="pageitemscopemedicalriskestimator">
                    <option value="">Select a MedicalRiskEstimator Type</option>
                    <option>MedicalRiskCalculator</option>
                    <option>MedicalRiskScore</option>
                </select>
                <select id="pageitemscopemedicalsignorsymptom">
                    <option value="">Select a MedicalSignorSymptom Type</option>
                    <option>MedicalSign</option>
                    <option>MedicalSymptom</option>
                </select>
                <select id="pageitemscopemedicalstudy">
                    <option value="">Select a MedicalStudy Type</option>
                    <option>MedicalObservationalStudy</option>
                    <option>MedicalTrial</option>
                </select>
                <select id="pageitemscopemedicaltest">
                    <option value="">Select a MedicalTest Type</option>
                    <option>BloodTest</option>
                    <option>DiagnosticProcedure</option>
                    <option>ImagingTest</option>
                    <option>MedicalTestPanel</option>
                    <option>PathologyTest</option>
                </select>
                <select id="pageitemscopemedicaltherapy">
                    <option value="">Select a MedicalTherapy Type</option>
                    <option>DietarySupplement</option>
                    <option>Drug</option>
                    <option>DrugClass</option>
                    <option>LifestyleModification</option>
                    <option>PalliativeProcedure</option>
                    <option>PhysicalTherapy</option>
                    <option>PsychologicalTreatment</option>
                    <option>RadiationTherapy</option>
                    <option>TherapeuticProcedure</option>
                </select>
                <select id="pageitemscopelifestylemodification">
                    <option value="">Select a LifestyleModification Type</option>
                    <option>Diet</option>
                    <option>PhysicalActivity</option>
                </select>
                <select id="pageitemscopephysicalactivity">
                    <option value="">Select a PhysicalActivity Type</option>
                    <option>ExercisePlan</option>
                </select>
            <select id="pageitemscopeorganization">
                <option value="">Select a Organization Type</option>
                <option value="http://schema.org/Corporation">Corporation</option>
                <option value="http://schema.org/EducationalOrganization">EducationalOrganization</option>
                <option value="http://schema.org/GovernmentOrganization">GovernmentOrganization</option>
                <option value="http://schema.org/LocalBusiness">LocalBusiness</option>
                <option value="http://schema.org/NGO">NGO</option>
                <option value="http://schema.org/PerformingGroup">PerformingGroup</option>
                <option value="http://schema.org/SportsTeam">SportsTeam</option>
            </select>
                <select id="pageitemscopeeducationalorganization">
                    <option value="">Select a EducationalOrganization Type</option>
                    <option>CollegeOrUniversity
                    <option>ElementarySchool
                    <option>HighSchool
                    <option>MiddleSchool
                    <option>Preschool
                    <option>School</option>
                </select>
                <select id="pageitemscopelocalbusiness">
                    <option value="">Select a LocalBusiness Type</option>
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
                    <option value="">Select a AutomotiveBusiness Type</option>
                    <option>AutoBodyShop</option>
                    <option>AutoDealer</option>
                    <option>AutoPartsStore</option>
                    <option>AutoRental</option>
                    <option>AutoRepair</option>
                    <option>AutoWash</option>
                    <option>GasStation</option>
                    <option>MotorcycleDealer</option>
                    <option>MotorcycleRepair</option>
                </select>
                <select id="pageitemscopeemergencyservice">
                    <option value="">Select a EmergencyService Type</option>
                    <option>FireStation</option>
                    <option>Hospital</option>
                    <option>PoliceStation</option>
                </select>
                <select id="pageitemscopeentertainmentbusiness">
                    <option value="">Select a EntertainmentBusiness Type</option>
                    <option>AdultEntertainment</option>
                    <option>AmusementPark</option>
                    <option>ArtGallery</option>
                    <option>Casino</option>
                    <option>ComedyClub</option>
                    <option>MovieTheater</option>
                    <option>NightClub</option>
                </select>
                <select id="pageitemscopefinancialservice">
                    <option value="">Select a FinancialService Type</option>
                    <option>AccountingService</option>
                    <option>AutomatedTeller</option>
                    <option>BankOrCreditUnion</option>
                    <option>InsuranceAgency</option>
                </select>
                <select id="pageitemscopefoodestablishment">
                    <option value="">Select a FoodEstablishment Type</option>
                    <option>Bakery</option>
                    <option>BarOrPub</option>
                    <option>Brewery</option>
                    <option>CafeOrCoffeeShop</option>
                    <option>FastFoodRestaurant</option>
                    <option>IceCreamShop</option>
                    <option>Restaurant</option>
                    <option>Winery</option>
                </select>
                <select id="pageitemscopegovernmentoffice">
                    <option value="">Select a GovernmentOffice Type</option>
                    <option>PostOffice</option>
                </select>
                <select id="pageitemscopehealthandbeautybusiness">
                    <option value="">Select a HealthAndBeautyBusiness Type</option>
                    <option>BeautySalon</option>
                    <option>DaySpa</option>
                    <option>HairSalon</option>
                    <option>HealthClub</option>
                    <option>NailSalon</option>
                    <option>TattooParlor</option>
                </select>
                <select id="pageitemscopehomeandconstructionbusiness">
                    <option value="">Select a HomeAndConstructionBusiness Type</option>
                    <option>Electrician</option>
                    <option>GeneralContractor</option>
                    <option>HVACBusiness</option>
                    <option>HousePainter</option>
                    <option>Locksmith</option>
                    <option>MovingCompany</option>
                    <option>Plumber</option>
                    <option>RoofingContractor</option>
                </select>
                <select id="pageitemscopelodgingbusiness">
                    <option value="">Select a LodgingBusiness Type</option>
                    <option>BedAndBreakfast</option>
                    <option>Hostel</option>
                    <option>Hotel</option>
                    <option>Motel</option>
                </select>
                <select id="pageitemscopemedicalorganization">
                    <option value="">Select a MedicalOrganization Type</option>
                    <option>Dentist</option>
                    <option>DiagnosticLab</option>
                    <option>Hospital</option>
                    <option>MedicalClinic</option>
                    <option>Optician</option>
                    <option>Pharmacy</option>
                    <option>Physician</option>
                    <option>VeterinaryCare</option>
                </select>
                <select id="pageitemscopeprofessionalservice">
                    <option value="">Select a ProfessionalService Type</option>
                    <option>AccountingService</option>
                    <option>Attorney</option>
                    <option>Dentist</option>
                    <option>Electrician</option>
                    <option>GeneralContractor</option>
                    <option>HousePainter</option>
                    <option>Locksmith</option>
                    <option>Notary</option>
                    <option>Plumber</option>
                    <option>RoofingContractor</option>
                </select>
                <select id="pageitemscopesportsactivitylocation">
                    <option value="">Select a SportsActivityLocation Type</option>
                    <option>BowlingAlley</option>
                    <option>ExerciseGym</option>
                    <option>GolfCourse</option>
                    <option>HealthClub</option>
                    <option>PublicSwimmingPool</option>
                    <option>SkiResort</option>
                    <option>SportsClub</option>
                    <option>StadiumOrArena</option>
                    <option>TennisComplex</option>
                </select>
                <select id="pageitemscopestore">
                    <option value="">Select a Store Type</option>
                    <option>AutoPartsStore</option>
                    <option>BikeStore</option>
                    <option>BookStore</option>
                    <option>ClothingStore</option>
                    <option>ComputerStore</option>
                    <option>ConvenienceStore</option>
                    <option>DepartmentStore</option>
                    <option>ElectronicsStore</option>
                    <option>Florist</option>
                    <option>FurnitureStore</option>
                    <option>GardenStore</option>
                    <option>GroceryStore</option>
                    <option>HardwareStore</option>
                    <option>HobbyShop</option>
                    <option>HomeGoodsStore</option>
                    <option>JewelryStore</option>
                    <option>LiquorStore</option>
                    <option>MensClothingStore</option>
                    <option>MobilePhoneStore</option>
                    <option>MovieRentalStore</option>
                    <option>MusicStore</option>
                    <option>OfficeEquipmentStore</option>
                    <option>OutletStore</option>
                    <option>PawnShop</option>
                    <option>PetStore</option>
                    <option>ShoeStore</option>
                    <option>SportingGoodsStore</option>
                    <option>TireShop</option>
                    <option>ToyStore</option>
                    <option>WholesaleStore</option>
                </select>
                <select id="pageitemscopeperforminggroup">
                    <option value="">Select a PerformingGroup Type</option>
                    <option>DanceGroup</option>
                    <option>MusicGroup</option>
                    <option>TheaterGroup</option>
                </select>
            <select id="pageitemscopeplace">
                <option value="">Select a Place Type</option>
                <option>AdministrativeArea</option>
                <option>CivicStructure</option>
                <option>Landform</option>
                <option>LandmarksOrHistoricalBuildings</option>
                <option>LocalBusiness</option>
                <option>Residence</option>
                <option>TouristAttraction</option>
            </select>
                <select id="pageitemscopeadministrativearea">
                    <option value="">Select a AdministrativeArea Type</option>
                    <option>City</option>
                    <option>Country</option>
                    <option>State</option>
                </select>
                <select id="pageitemscopecivicstructure">
                    <option value="">Select a CivicStructure Type</option>
                    <option>Airport</option>
                    <option>Aquarium</option>
                    <option>Beach</option>
                    <option>BusStation</option>
                    <option>BusStop</option>
                    <option>Campground</option>
                    <option>Cemetery</option>
                    <option>Crematorium</option>
                    <option>EventVenue</option>
                    <option>FireStation</option>
                    <option>GovernmentBuilding</option>
                    <option>Hospital</option>
                    <option>MovieTheater</option>
                    <option>Museum</option>
                    <option>MusicVenue</option>
                    <option>Park</option>
                    <option>ParkingFacility</option>
                    <option>PerformingArtsTheater</option>
                    <option>PlaceOfWorship</option>
                    <option>Playground</option>
                    <option>PoliceStation</option>
                    <option>RVPark</option>
                    <option>StadiumOrArena</option>
                    <option>SubwayStation</option>
                    <option>TaxiStand</option>
                    <option>TrainStation</option>
                    <option>Zoo</option>
                </select>
                <select id="pageitemscopegovernmentbuilding">
                    <option value="">Select a GovernmentBuilding Type</option>
                    <option>CityHall</option>
                    <option>Courthouse</option>
                    <option>DefenceEstablishment</option>
                    <option>Embassy</option>
                    <option>LegislativeBuilding</option>
                </select>
                <select id="pageitemscopelandform">
                    <option value="">Select a Landform Type</option>
                    <option>BodyOfWater</option>
                    <option>Continent</option>
                    <option>Mountain</option>
                    <option>Volcano</option>
                </select>
                <select id="pageitemscopebodyofwater">
                    <option value="">Select a BodyOfWater Type</option>
                    <option>Canal</option>
                    <option>LakeBodyOfWater</option>
                    <option>OceanBodyOfWater</option>
                    <option>Pond</option>
                    <option>Reservoir</option>
                    <option>RiverBodyOfWater</option>
                    <option>SeaBodyOfWater</option>
                    <option>Waterfall</option>
                </select>
                <select id="pageitemscoperesidence">
                    <option value="">Select a Residence Type</option>
                    <option>ApartmentComplex</option>
                    <option>GatedResidenceCommunity</option>
                    <option>SingleFamilyResidence</option>
                </select>
                <select id="pageitemscopeproduct">
                    <option value="">Select a Product Type</option>
                    <option>IndividualProduct</option>
                    <option>ProductModel</option>
                    <option>SomeProducts</option>
                </select>
                <select id="pageitemscopeplaceofworship">
                    <option value="">Select a PlaceOfWorship Type</option>
                    <option>BuddhistTemple</option>
                    <option>CatholicChurch</option>
                    <option>Church</option>
                    <option>HinduTemple</option>
                    <option>Mosque</option>
                    <option>Synagogue</option>
                </select>
<?
}