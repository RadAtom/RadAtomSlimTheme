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

function pageitemscope_content(){
?>
    <div id="ra-snippets-pageitemscope-content">
        <div id="ra-snippets-pageitemscope-header">
            Hello and Welcome to the ItemScope tab where you will be able to set the different ItemScopes that pertain to each of your pages. An ItemScop is...
        </div>
        <div id="ra-snippets-pageitemscope-body">
            <span id="pagesitemscopeslist">
                <?php page_itemscopes(); ?>
            </span>
             -> 
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

function contentitemscope_content(){
?>
    <div id="ra-snippets-contentitemscope-content">
        THIS IS WHERE THE TWO REAMINING TABS WILL GO
        <div id="ra-snippets-footer">
            <span id="radatomname">Rad Atom Technologies</span>
        </div>
    </div>
<?
}

function itemprop_content(){
?>
    <div id="ra-snippets-contentitemscope-content">
        THIS IS WHERE THE TWO REAMINING TABS WILL GO
        <div id="ra-snippets-footer">
            <span id="radatomname">Rad Atom Technologies</span>
        </div>
    </div>
<?
}

function page_itemscopes(){
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
        <option value="">Select a Number Type</option>
        <option value="http://schema.org/Float">Float</option>
        <option value="http://schema.org/Integer">Integer</option>
    </select>
    <select id="pageitemscopetext">
        <option value="">Select a Text Type</option>
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
            <option value="">Select a Action Type</option>
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
                <option>LoseAction</option>
                <option>TieAction</option>
                <option>WinAction</option>
            </select>
            <select id="pageitemscopeassessaction">
                <option value="">Select a AssessAction Type</option>
                <option>ChooseAction</option>
                <option>IgnoreAction</option>
                <option>ReactAction</option>
                <option>ReviewAction</option>
            </select>
                <select id="pageitemscopechooseaction">
                    <option value="">Select a ChooseAction Type</option>
                    <option>VoteAction</option>
                </select>
                <select id="pageitemscopereactaction">
                    <option value="">Select a ReactAction Type</option>
                    <option>AgreeAction</option>
                    <option>DisagreeAction</option>
                    <option>DislikeAction</option>
                    <option>EndorseAction</option>
                    <option>LikeAction</option>
                    <option>WantAction</option>
                </select>
            <select id="pageitemscopeconsumeaction">
                <option value="">Select a ConsumeAction Type</option>
                <option>DrinkAction</option>
                <option>EatAction</option>
                <option>InstallAction</option>
                <option>ListenAction</option>
                <option>ReadAction</option>
                <option>UseAction</option>
                <option>ViewAction</option>
                <option>WatchAction</option>
            </select>
                <select id="pageitemscopeuseaction">
                    <option value="">Select a UseAction Type</option>
                    <option>WearAction</option>
                </select>
            <select id="pageitemscopecreateaction">
                <option value="">Select a CreateAction Type</option>
                <option>CookAction</option>
                <option>DrawAction</option>
                <option>FilmAction</option>
                <option>PaintAction</option>
                <option>PhotographAction</option>
                <option>WriteAction</option>
            </select>
            <select id="pageitemscopefindaction">
                <option value="">Select a FindAction Type</option>
                <option>CheckAction</option>
                <option>DiscoverAction</option>
                <option>TrackAction</option>
            </select>
            <select id="pageitemscopeinteractaction">
                <option value="">Select a InteractAction Type</option>
                <option>BefriendAction</option>
                <option>CommunicateAction</option>
                <option>FollowAction</option>
                <option>JoinAction</option>
                <option>LeaveAction</option>
                <option>MarryAction</option>
                <option>RegisterAction</option>
                <option>SubscribeAction</option>
                <option>UnRegisterAction</option>
            </select>
                <select id="pageitemscopecommunicateaction">
                    <option value="">Select a CommunicateAction Type</option>
                    <option>AskAction</option>
                    <option>CheckInAction</option>
                    <option>CheckOutAction</option>
                    <option>CommentAction</option>
                    <option>InformAction</option>
                    <option>InviteAction</option>
                    <option>ReplyAction</option>
                    <option>ShareAction</option>
                </select>
                    <select id="pageitemscopeinformaction">
                        <option value="">Select a InformAction Type</option>
                        <option>ConfirmAction
                        <option>RsvpAction</option>
                    </select>
            <select id="pageitemscopemoveaction">
                <option value="">Select a MoveAction Type</option>
                <option>ArriveAction</option>
                <option>DepartAction</option>
                <option>TravelAction</option>
            </select>
            <select id="pageitemscopeorganizeaction">
                <option value="">Select a OrganizeAction Type</option>
                <option>AllocateAction</option>
                <option>ApplyAction</option>
                <option>BookmarkAction</option>
                <option>PlanAction</option>
            </select>
                <select id="pageitemscopeallocateaction">
                    <option value="">Select a AllocateAction Type</option>
                    <option>AcceptAction</option>
                    <option>AssignAction</option>
                    <option>AuthorizeAction</option>
                    <option>RejectAction</option>
                </select>
                <select id="pageitemscopeplanaction">
                    <option value="">Select a PlanAction Type</option>
                    <option>CancelAction</option>
                    <option>ReserveAction</option>
                    <option>ScheduleAction</option>
                </select>
            <select id="pageitemscopeplayaction">
                <option value="">Select a PlayAction Type</option>
                <option>ExerciseAction</option>
                <option>PerformAction</option>
            </select>
            <select id="pageitemscopetradeaction">
                <option value="">Select a TradeAction Type</option>
                <option>BuyAction</option>
                <option>DonateAction</option>
                <option>OrderAction</option>
                <option>PayAction</option>
                <option>QuoteAction</option>
                <option>RentAction</option>
                <option>SellAction</option>
                <option>TipAction</option>
            </select>
            <select id="pageitemscopetransferaction">
                <option value="">Select a TransferAction Type</option>
                <option>BorrowAction</option>
                <option>DownloadAction</option>
                <option>GiveAction</option>
                <option>LendAction</option>
                <option>ReceiveAction</option>
                <option>ReturnAction</option>
                <option>SendAction</option>
                <option>TakeAction</option>
            </select>
            <select id="pageitemscopeupdateaction">
                <option value="">Select a UpdateAction Type</option>
                <option>AddAction</option>
                <option>DeleteAction</option>
                <option>ReplaceAction</option>
            </select>
                <select id="pageitemscopeaddaction">
                    <option value="">Select a AddAction Type</option>
                    <option>InsertAction</option>
                </select>
                    <select id="pageitemscopeinsertaction">
                        <option value="">Select a InsertAction Type</option>
                        <option>AppendAction
                        <option>PrependAction</option>
                    </select>
        <select id="pageitemscopecreativework">
            <option value="">Select a CreativeWork Type</option>
            <option>Article
            <option>Blog
            <option>Book
            <option>Clip
            <option>Code
            <option>Comment
            <option>DataCatalog
            <option>Dataset
            <option>Diet
            <option>Episode
            <option>ExercisePlan
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
                <option>BlogPosting
NewsArticle
ScholarlyArticle
TechArticle
</option>
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
                <option>RadioClip
TVClip</option>
            </select>
            <select id="pageitemscopeepisode">
                <option value="">Select a Episode Type</option>
                <option>RadioEpisode
TVEpisode</option>
            </select>
            <select id="pageitemscopemediaobject">
                <option value="">Select a MediaObject Type</option>
                <option>AudioObject
DataDownload
ImageObject
MusicVideoObject
VideoObject
</option>
            </select>
            <select id="pageitemscopemusicplaylist">
                <option value="">Select a MusicPlaylist Type</option>
                <option>MusicAlbum</option>
            </select>
            <select id="pageitemscopeseason">
                <option value="">Select a Season Type</option>
                <option>RadioSeason
TVSeason</option>
            </select>
            <select id="pageitemscopeseries">
                <option value="">Select a Series Type</option>
                <option>RadioSeries
TVSeries</option>
            </select>
            <select id="pageitemscopesoftwareapplication">
                <option value="">Select a SoftwareApplication Type</option>
                <option>MobileApplication
WebApplication</option>
            </select>
            <select id="pageitemscopewebpage">
                <option value="">Select a Webapage Type</option>
                <option>AboutPage
CheckoutPage
CollectionPage
ContactPage
ItemPage
MedicalWebPage
ProfilePage
SearchResultsPage</option>
            </select>
                <select id="pageitemscopecollectionpage">
                    <option value="">Select a CollectionPage Type</option>
                    <option>ImageGallery
VideoGallery</option>
                </select>
            <select id="pageitemscopewebpageelement">
                <option value="">Select a WebpageElement Type</option>
                <option>SiteNavigationElement
Table
WPAdBlock
WPFooter
WPHeader
WPSideBar</option>
            </select>
        <select id="pageitemscopeevent">
            <option value="">Select a Event Type</option>
            <option>BusinessEvent
ChildrensEvent
ComedyEvent
DanceEvent
DeliveryEvent
EducationEvent
Festival
FoodEvent
LiteraryEvent
MusicEvent
PublicationEvent
SaleEvent
SocialEvent
SportsEvent
TheaterEvent
UserInteraction
VisualArtsEvent</option>
        </select>
            <select id="pageitemscopepublicationevent">
                <option value="">Select a PublicationEvent Type</option>
                <option>BroadcastEvent
OnDemandEvent</option>
            </select>
            <select id="pageitemscopeuserinteraction">
                <option value="">Select a UserInteraction Type</option>
                <option>UserBlocks
UserCheckins
UserComments
UserDownloads
UserLikes
UserPageVisits
UserPlays
UserPlusOnes
UserTweets
</option>
            </select>
        <select id="pageitemscopeintangible">
            <option value="">Select a Intangible Type</option>
            <option>AlignmentObject
Audience
Brand
Demand
Enumeration
JobPosting
Language
Offer
Order
ParcelDelivery
Permit
Quantity
Rating
Service
ServiceChannel
StructuredValue</option>
        </select>
            <select id="pageitemscope">
                <option value="">Select a Audience Type</option>
                <option>BusinessAudience
EducationalAudience
MedicalAudience
PeopleAudience
Researcher</option>
            </select>
                <select id="pageitemscopemedicalaudience">
                    <option value="">Select a Medical Audience Type</option>
                    <option>Clinician
MedicalResearcher
Patient</option>
                </select>
                <select id="pageitemscopepeopleaudience">
                    <option value="">Select a PeopleAudience Type</option>
                    <option>ParentAudience</option>
                </select>
                
            <select id="pageitemscopeenumeration">
                <option value="">Select a Enumeration Type</option>
                <option>BookFormatType
BusinessEntityType
BusinessFunction
ContactPointOption
DayOfWeek
DeliveryMethod
EventStatusType
ItemAvailability
OfferItemCondition
OrderStatus
PaymentMethod
QualitativeValue
Specialty
WarrantyScope</option>
            </select>
                <select id="pageitemscopebookformattype">
                    <option value="">Select a BookFormatType Type</option>
                    <option>EBook
Hardcover
Paperback</option>
                </select>
                <select id="pageitemscopecontactpointoption">
                    <option value="">Select a ContactPointOption Type</option>
                    <option>HearingImpairedSupported
TollFree</option>
                </select>
                <select id="pageitemscopedeliverymethod">
                    <option value="">Select a DeliveryMethod Type</option>
                    <option>LockerDelivery
OnSitePickup
ParcelService</option>
                </select>
                <select id="pageitemscopeeventstatusstype">
                    <option value="">Select a EventStatusType Type</option>
                    <option>EventCancelled
EventPostponed
EventRescheduled
EventScheduled</option>
                </select>
                <select id="pageitemscopeitemavailability">
                    <option value="">Select a ItemAvailability Type</option>
                    <option>Discontinued
InStock
InStoreOnly
LimitedAvailability
OnlineOnly
OutOfStock
PreOrder
SoldOut</option>
                </select>
                <select id="pageitemscopeofferitemcondition">
                    <option value="">Select a OfferItemCondition Type</option>
                    <option>DamagedCondition
NewCondition
RefurbishedCondition
UsedCondition</option>
                </select>
                <select id="pageitemscopeorderstatus">
                    <option value="">Select a OrderStatus Type</option>
                    <option>OrderCancelled
OrderDelivered
OrderInTransit
OrderPaymentDue
OrderPickupAvailable
OrderProblem
OrderProcessing
OrderReturned</option>
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
                        <option>Anesthesia
Cardiovascular
CommunityHealth
Dentistry
Dermatologic
DietNutrition
Emergency
Endocrine
Gastroenterologic
Genetic
Geriatric
Gynecologic
Hematologic
Infectious
LaboratoryScience
Midwifery
Musculoskeletal
Neurologic
Nursing
Obstetric
OccupationalTherapy
Oncologic
Optometic
Otolaryngologic
Pathology
Pediatric
PharmacySpecialty
Physiotherapy
PlasticSurgery
Podiatric
PrimaryCare
Psychiatric
PublicHealth
Pulmonary
Radiograpy
Renal
RespiratoryTherapy
Rheumatologic
SpeechPathology
Surgical
Toxicologic
Urologic</option>
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
                <option>Distance
Duration
Energy
Mass</option>
            </select>
            <select id="pageitemscoperating">
                <option value="">Select a Rating Type</option>
                <option>AggregateRating
</option>
            </select>
            <select id="pageitemscopeservice">
                <option value="">Select a Service Type</option>
                <option>GovernmentService</option>
            </select>
            <select id="pageitemscopestructuredvalue">
                <option value="">Select a StructuredValue Type</option>
                <option>ContactPoint
GeoCoordinates
GeoShape
NutritionInformation
OpeningHoursSpecification
OwnershipInfo
PriceSpecification
QuantitativeValue
TypeAndQuantityNode
WarrantyPromise
</option>
            </select>
                <select id="pageitemscopecontactpoint">
                    <option value="">Select a ContactPoint Type</option>
                    <option>PostalAddress</option>
                </select>
                <select id="pageitemscopepricespecification">
                    <option value="">Select a PriceSpecification Type</option>
                    <option>DeliveryChargeSpecification
PaymentChargeSpecification
UnitPriceSpecification</option>
                </select>
        <select id="pageitemscopemedicalentity">
            <option value="">Select a MedicalEntity Type</option>
            <option></option>
        </select>
            <select id="pageitemscope">
                <option value="">Select a  Type</option>
                <option></option>
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
        <select id="pageitemscopeoerson">
            <option></option>
        </select>
        <select id="pageitemscopeplace">
            <option></option>
        </select>
        <select id="pageitemscopeproperty">
            <option></option>
        </select>

        <select id="pageitemscope">
            <option></option>
        </select>
<?
}