/*
 * JS for Ra Snippets
 */
function show_pageitemscope()
{
  if (jQuery('#pageitemscope').val() == 'http://schema.org/DataType') {
    // Default show the Choose Size Option
    remove_thingitemscopelists();
    jQuery('#pageitemscopedatatype').show();
  } else if (jQuery('#pageitemscope').val() == 'http://schema.org/Thing') {
    remove_datatypeitemscopelists();
    jQuery('#pageitemscopething').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
  }
}

function show_pageitemscopedatatype()
{
  if (jQuery('#pageitemscopedatatype').val() == 'http://schema.org/Number') {
    // Default show the Choose Size Option
    jQuery('#pageitemscopenumber').show();
    jQuery('#pageitemscopetext').hide();
  } else if (jQuery('#pageitemscopedatatype').val() == 'http://schema.org/Text') {
    jQuery('#pageitemscopetext').show();
    jQuery('#pageitemscopenumber').hide();
  } else {
    jQuery('#pageitemscopenumber').hide();
    jQuery('#pageitemscopetext').hide();
  }
}

function remove_datatypeitemscopelists()
{
  var remove_itemscopedatatype = jQuery('#pageitemscopedatatype').hide(); jQuery('#pageitemscopenumber').hide(); jQuery('#pageitemscopetext').hide();
}

function remove_thingitemscopelists()
{
  var remove_itemscopething =  jQuery('#pageitemscopething').hide(); jQuery('#pageitemscopeaction').hide(); jQuery('#pageitemscopeachieveaction').hide(); jQuery('#pageitemscopeassessaction').hide(); jQuery('#pageitemscopechooseaction').hide(); jQuery('#pageitemscopereactaction').hide(); jQuery('#pageitemscopeconsumeaction').hide(); jQuery('#pageitemscopeuseaction').hide(); jQuery('#pageitemscopecreateaction').hide(); jQuery('#pageitemscopefindaction').hide(); jQuery('#pageitemscopeinteractaction').hide(); jQuery('#pageitemscopecommunicateaction').hide(); jQuery('#pageitemscopeinformaction').hide(); jQuery('#pageitemscopemoveaction').hide(); jQuery('#pageitemscopeorganizeaction').hide(); jQuery('#pageitemscopeallocateaction').hide(); jQuery('#pageitemscopeplanaction').hide(); jQuery('#pageitemscopeplayaction').hide(); jQuery('#pageitemscopetradeaction').hide(); jQuery('#pageitemscopetransferaction').hide(); jQuery('#pageitemscopeupdateaction').hide(); jQuery('#pageitemscopeaddaction').hide(); jQuery('#pageitemscopeinsertaction').hide(); jQuery('#pageitemscopecreativework').hide(); jQuery('#pageitemscopearticle').hide(); jQuery('#pageitemscopescholarlyarticle').hide(); jQuery('#pageitemscopetecharticle').hide(); jQuery('#pageitemscopeclip').hide(); jQuery('#pageitemscopeepisode').hide(); jQuery('#pageitemscopemediaobject').hide(); jQuery('#pageitemscopemusicplaylist').hide(); jQuery('#pageitemscopeseason').hide(); jQuery('#pageitemscopeseries').hide(); jQuery('#pageitemscopesoftwareapplication').hide(); jQuery('#pageitemscopewebpage').hide(); jQuery('#pageitemscopecollectionpage').hide(); jQuery('#pageitemscopewebpageelement').hide(); jQuery('#pageitemscopeevent').hide(); jQuery('#pageitemscopepublicationevent').hide(); jQuery('#pageitemscopeuserinteraction').hide(); jQuery('#pageitemscopeintangible').hide(); jQuery('#pageitemscopeaudience').hide(); jQuery('#pageitemscopemedicalaudience').hide(); jQuery('#pageitemscopepeopleaudience').hide(); jQuery('#pageitemscopeenumeration').hide(); jQuery('#pageitemscopebookformattype').hide(); jQuery('#pageitemscopecontactpointoption').hide(); jQuery('#pageitemscopedeliverymethod').hide(); jQuery('#pageitemscopeeventstatusstype').hide(); jQuery('#pageitemscopeitemavailability').hide(); jQuery('#pageitemscopeofferitemcondition').hide(); jQuery('#pageitemscopeorderstatus').hide(); jQuery('#pageitemscopepaymentmethod').hide(); jQuery('#pageitemscopespecialty').hide(); jQuery('#pageitemscopemedicalspecialty').hide(); jQuery('#pageitemscopeoffer').hide(); jQuery('#pageitemscopepermit').hide(); jQuery('#pageitemscopequantity').hide(); jQuery('#pageitemscoperating').hide(); jQuery('#pageitemscopeservice').hide(); jQuery('#pageitemscopestructuredvalue').hide(); jQuery('#pageitemscopecontactpoint').hide(); jQuery('#pageitemscopepricespecification').hide(); jQuery('#pageitemscopemedicalentity').hide(); jQuery('#pageitemscopeanatomicalstructure').hide(); jQuery('#pageitemscopevessel').hide(); jQuery('#pageitemscopemedicalcondition').hide(); jQuery('#pageitemscopemedicalguideline').hide(); jQuery('#pageitemscopemedicalindication').hide(); jQuery('#pageitemscopemedicalintangible').hide(); jQuery('#pageitemscopedoseschedule').hide(); jQuery('#pageitemscopemedicalenumeration').hide(); jQuery('#pageitemscopedrugcostcatagory').hide(); jQuery('#pageitemscopedrugpregnancy').hide(); jQuery('#pageitemscopedrugprescriptionstatus').hide(); jQuery('#pageitemscopeinfectionagentclass').hide(); jQuery('#pageitemscopemedicaldevicepurpose').hide(); jQuery('#pageitemscopemedicalevidencelevel').hide(); jQuery('#pageitemscopemedicalimagingtechnique').hide(); jQuery('#pageitemscopemedicalobservationalstudydesign').hide(); jQuery('#pageitemscopemedicalproceduretype').hide(); jQuery('#pageitemscopemedicalstudystatus').hide(); jQuery('#pageitemscopemedicaltrialdesign').hide(); jQuery('#pageitemscopemedicinesystem').hide(); jQuery('#pageitemscopephysicalactivitycategory').hide(); jQuery('#pageitemscopephysicalexam').hide(); jQuery('#pageitemscopemedicalprocedure').hide(); jQuery('#pageitemscopemedicalriskestimator').hide(); jQuery('#pageitemscopemedicalsignorsymptom').hide(); jQuery('#pageitemscopemedicalstudy').hide(); jQuery('#pageitemscopemedicaltest').hide(); jQuery('#pageitemscopemedicaltherapy').hide(); jQuery('#pageitemscopelifestylemodification').hide(); jQuery('#pageitemscopephysicalactivity').hide(); jQuery('#pageitemscopeorganization').hide(); jQuery('#pageitemscopeeducationalorganization').hide(); jQuery('#pageitemscopelocalbusiness').hide(); jQuery('#pageitemscopeautomotivebusiness').hide(); jQuery('#pageitemscopeemergencyservice').hide(); jQuery('#pageitemscopeentertainmentbusiness').hide(); jQuery('#pageitemscopefinancialservice').hide(); jQuery('#pageitemscopefoodestablishment').hide(); jQuery('#pageitemscopegovernmentoffice').hide(); jQuery('#pageitemscopehealthandbeautybusiness').hide(); jQuery('#pageitemscopehomeandconstructionbusiness').hide(); jQuery('#pageitemscopelodgingbusiness').hide(); jQuery('#pageitemscopemedicalorganization').hide(); jQuery('#pageitemscopeprofessionalservice').hide(); jQuery('#pageitemscopesportsactivitylocation').hide(); jQuery('#pageitemscopestore').hide(); jQuery('#pageitemscopeperforminggroup').hide(); jQuery('#pageitemscopeplace').hide(); jQuery('#pageitemscopeadministrativearea').hide(); jQuery('#pageitemscopecivicstructure').hide(); jQuery('#pageitemscopegovernmentbuilding').hide(); jQuery('#pageitemscopelandform').hide(); jQuery('#pageitemscopebodyofwater').hide(); jQuery('#pageitemscoperesidence').hide(); jQuery('#pageitemscopeproduct').hide(); jQuery('#pageitemscopeplaceofworship').hide();
}

function show_pageitemscopething()
{
  if (jQuery('#pageitemscopething').val() == 'http://schema.org/Action') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
  } else if (jQuery('#pageitemscopething').val() == 'http://schema.org/CreativeWork') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
  } else if (jQuery('#pageitemscopething').val() == 'http://schema.org/CreativeWork') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
  } else if (jQuery('#pageitemscopething').val() == 'http://schema.org/Event') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeevent').show();
  } else if (jQuery('#pageitemscopething').val() == 'http://schema.org/Intangible') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
  } else if (jQuery('#pageitemscopething').val() == 'http://schema.org/MedicalEntity') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
  } else if (jQuery('#pageitemscopething').val() == 'http://schema.org/Organization') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
  } else if (jQuery('#pageitemscopething').val() == 'http://schema.org/Place') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeplace').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
  }
}

function show_pageitemscopeaction()
{
  if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/AchieveAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopeachieveaction').show();
  } else if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/AssessAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopeassessaction').show();
  } else if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/ConsumeAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopeconsumeaction').show();
  } else if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/CreateAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopecreateaction').show();
  } else if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/FindAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopefindaction').show();
  } else if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/InteractAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopeinteractaction').show();
  } else if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/MoveAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopemoveaction').show();
  } else if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/OrganizeAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopeorganizeaction').show();
  } else if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/PlayAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopeplayaction').show();
  } else if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/TradeAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopetradeaction').show();
  } else if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/TranserAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopetransferaction').show();
  } else if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/UpdateAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopeupdateaction').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
  }
}

function show_pageitemscopeassessaction()
{
  if (jQuery('#pageitemscopeassessaction').val() == 'http://schema.org/ChooseAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopeassessaction').show();
    jQuery('#pageitemscopechooseaction').show();
  } else if (jQuery('#pageitemscopeassessaction').val() == 'http://schema.org/ReactAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopeassessaction').show();
    jQuery('#pageitemscopereactaction').show();
  } else {
    
  }
}

function show_pageitemscopeconsumeaction()
{
  if (jQuery('#pageitemscopeconsumeaction').val() == 'http://schema.org/ConsumeAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopeconsumeaction').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
  }
}

function show_pageitemscopeinteractaction()
{
  if (jQuery('#pageitemscopeinteractaction').val() == 'http://schema.org/CommunicateAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopecommunicateaction').show();
  } else if (jQuery('#pageitemscopeinteractaction').val() == 'http://schema.org/InformAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopecommunicateaction').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
  }
}

function show_pageitemscopeorganizeaction()
{
  if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/LocateAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopeallocateaction').show();
  } else if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/PlanAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopeplanaction').show();
  } else {
    
  }
}

function show_pageitemscopeupdateaction()
{
  if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/AddAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopeaddaction').show();
  } else if (jQuery('#pageitemscopeaction').val() == 'http://schema.org/InsertAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopeinsertaction').show();
  } else {
    
  }
}

function show_pageitemscopecreativework()
{
  if (jQuery('#pageitemscopecreativework').val() == 'http://schema.org/Article') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
    jQuery('#pageitemscopearticle').show();
  } else if (jQuery('#pageitemscopecreativework').val() == 'http://schema.org/Clip') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
    jQuery('#pageitemscopeclip').show();
  } else if (jQuery('#pageitemscopecreativework').val() == 'http://schema.org/Episode') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
    jQuery('#pageitemscopeepisode').show();
  } else if (jQuery('#pageitemscopecreativework').val() == 'http://schema.org/MediaObject') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
    jQuery('#pageitemscopemediaobject').show();
  } else if (jQuery('#pageitemscopecreativework').val() == 'http://schema.org/MusicPlaylist') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
    jQuery('#pageitemscopemusicplaylist').show();
  } else if (jQuery('#pageitemscopecreativework').val() == 'http://schema.org/Season') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
    jQuery('#pageitemscopeseason').show();
  } else if (jQuery('#pageitemscopecreativework').val() == 'http://schema.org/Series') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
    jQuery('#pageitemscopeseries').show();
  } else if (jQuery('#pageitemscopecreativework').val() == 'http://schema.org/SoftwareApplication') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
    jQuery('#pageitemscopesoftwareapplication').show();
  } else if (jQuery('#pageitemscopecreativework').val() == 'http://schema.org/Webpage') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
    jQuery('#pageitemscopewebpage').show();
  } else if (jQuery('#pageitemscopecreativework').val() == 'http://schema.org/WebpageElement') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
    jQuery('#pageitemscopewebpageelement').show();
  } else {
    
  }
}

function show_pageitemscopearticle()
{
  if (jQuery('#pageitemscopearticle').val() == 'http://schema.org/AchieveAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
    jQuery('#pageitemscopescholarlyarticle').show();
  } else if (jQuery('#pageitemscopearticle').val() == 'http://schema.org/AchieveAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
    jQuery('#pageitemscopetecharticle').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
  }
}

function show_pageitemscopewebpage()
{
  if (jQuery('#pageitemscopewebpage').val() == 'http://schema.org/CollectionPage') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
    jQuery('#pageitemscopecollectionpage').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopecreativework').show();
  }
}

function show_pageitemscopeevent()
{
  if (jQuery('#pageitemscopeevent').val() == 'http://schema.org/PublicationEvent') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeevent').show();
    jQuery('#pageitemscopepublicationevent').show();
  } else if (jQuery('#pageitemscopeevent').val() == 'http://schema.org/UserInteraction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeevent').show();
    jQuery('#pageitemscopeuserinteraction').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeevent').show();
  }
}

function show_pageitemscopeintangible()
{
  if (jQuery('#pageitemscopeintangible').val() == 'http://schema.org/AchieveAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeaudience').show();
  } else if (jQuery('#pageitemscopeintangible').val() == 'http://schema.org/AchieveAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeenumeration').show();
  } else if (jQuery('#pageitemscopeintangible').val() == 'http://schema.org/AchieveAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeoffer').show();
  } else if (jQuery('#pageitemscopeintangible').val() == 'http://schema.org/AchieveAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopepermit').show();
  } else if (jQuery('#pageitemscopeintangible').val() == 'http://schema.org/AchieveAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopequantity').show();
  } else if (jQuery('#pageitemscopeintangible').val() == 'http://schema.org/AchieveAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscoperating').show();
  } else if (jQuery('#pageitemscopeintangible').val() == 'http://schema.org/AchieveAction') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeservice').show();
  } else if (jQuery('#pageitemscopeintangible').val() == 'http://schema.org/StructuredValue') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopestructuredvalue').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
  }
}

function show_pageitemscopeaudience()
{
  if (jQuery('#pageitemscopeaudience').val() == 'http://schema.org/MedicalAudience') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeaudience').show();
    jQuery('#pageitemscopemedicalaudience').show();
  } else if (jQuery('#pageitemscopeaudience').val() == 'http://schema.org/PeopleAudience') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeaudience').show();
    jQuery('#pageitemscopepeopleaudience').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeaudience').show();
  }
}

function show_pageitemscopeenumeration()
{
  if (jQuery('#pageitemscopeenumeration').val() == 'http://schema.org/FormatType') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeenumeration').show();
    jQuery('#pageitemscopebookformattype').show();
  } else if (jQuery('#pageitemscopeenumeration').val() == 'http://schema.org/ContactPointOption') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeenumeration').show();
    jQuery('#pageitemscopecontactpointoption').show();
  } else if (jQuery('#pageitemscopeenumeration').val() == 'http://schema.org/DeliveryMethod') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeenumeration').show();
    jQuery('#pageitemscopedeliverymethod').show();
  } else if (jQuery('#pageitemscopeenumeration').val() == 'http://schema.org/EventStatusType') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeenumeration').show();
    jQuery('#pageitemscopeeventstatustype').show();
  } else if (jQuery('#pageitemscopeenumeration').val() == 'http://schema.org/ItemAvailability') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeenumeration').show();
    jQuery('#pageitemscopeitemavailability').show();
  } else if (jQuery('#pageitemscopeenumeration').val() == 'http://schema.org/OfferItemCondition') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeenumeration').show();
    jQuery('#pageitemscopeofferitemcondition').show();
  } else if (jQuery('#pageitemscopeenumeration').val() == 'http://schema.org/OrderStatus') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeenumeration').show();
    jQuery('#pageitemscopeorderstatus').show();
  } else if (jQuery('#pageitemscopeenumeration').val() == 'http://schema.org/PaymentMethod') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeenumeration').show();
    jQuery('#pageitemscopepaymentmethod').show();
  } else if (jQuery('#pageitemscopeenumeration').val() == 'http://schema.org/Specialty') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeenumeration').show();
    jQuery('#pageitemscopespecialty').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeenumeration').show();
  }
}

function show_pageitemscopespecialty()
{
  if (jQuery('#pageitemscopespecialty').val() == 'http://schema.org/MedicalSpecialty') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeenumeration').show();
    jQuery('#pageitemscopespecialty').show();
    jQuery('#pageitemscopebookformattype').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeenumeration').show();
    jQuery('#pageitemscopespecialty').show();
  }
}

function show_pageitemscopestructuredvalue()
{
  if (jQuery('#pageitemscopestructuredvalue').val() == 'http://schema.org/ContactPoint') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopestructuredvalue').show();
    jQuery('#pageitemscopecontactpoint').show();
  } else if (jQuery('#pageitemscopestructuredvalue').val() == 'http://schema.org/PriceSpecification') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopestructuredvalue').show();
    jQuery('#pageitemscopepricespecification').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopestructuredvalue').show();
  }
}

function show_pageitemscopemedicalentity()
{
  if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/AnatomicalStructure') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopeanatomicalstructure').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalCondition') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicalcondition').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalGuideline') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicalguideline').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalIndication') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicalindication').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalIntangible') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicalintangible').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/DoseSchedule') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopedoseschedule').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalEnumeration') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicalenumeration').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/DrugCostCatagory') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopedrugcostcatagory').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/DrugPregnancy') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopedrugpregnancy').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/DrugPrescriptionStatus') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopedrugprescriptionstatus').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/InfectionAgentClass') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopeinfectionagentclass').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalDevicePurpose') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicaldevicepurpose').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalEvidenceLevel') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicalevidencelevel').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalImagingTechnique') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicalimagingtechnique').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalObservationalStudyDesign') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicalobservationalstudydesign').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalProcedureType') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicalproceduretype').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalStudyStatus') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicalstudystatus').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalTrialDesign') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicaltrialdesign').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicineSystem') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicinesystem').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/PhysicalActivityCategory') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopephysicalactivitycategory').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/PhysicalExam') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopephysicalexam').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalProcedure') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicalprocedure').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/RiskEstimator') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicalriskestimator').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalSignOrSymptom') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicalsignorsymptom').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalStudy') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicalstudy').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalTest') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicaltest').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/MedicalTherapy') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopemedicaltherapy').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/LifestyleModification') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopelifestylemodification').show();
  } else if (jQuery('#pageitemscopemedicalentity').val() == 'http://schema.org/PhysicalActivity') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopephysicalactivity').show();
  } else {
    
  }
}

function show_pageitemscopeanatomicalstructure()
{
  if (jQuery('#pageitemscopeanatomicalstructure').val() == 'http://schema.org/Vessel') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopeanatomicalstructure').show();
    jQuery('#pageitemscopevessel').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopeanatomicalstructure').show();
  }
}

function show_pageitemscopeorganization()
{
  if (jQuery('#pageitemscopeorganization').val() == 'http://schema.org/EducationalOrganization') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopeeducationalorganization').show();
  } else if (jQuery('#pageitemscopeorganization').val() == 'http://schema.org/LocalBusiness') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopelocalbusiness').show();
  } else if (jQuery('#pageitemscopeorganization').val() == 'http://schema.org/PerformingGroup') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopeperforminggroup').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
  }
}

function show_pageitemscopelocalbusiness()
{
  if (jQuery('#pageitemscopelocalbusiness').val() == 'http://schema.org/AutomotiveBusiness') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopelocalbusiness').show();
    jQuery('#pageitemscopeautomotivebusiness').show();
  } else if (jQuery('#pageitemscopelocalbusiness').val() == 'http://schema.org/EmergencyService') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopelocalbusiness').show();
    jQuery('#pageitemscopeemergencyservice').show();
  } else if (jQuery('#pageitemscopelocalbusiness').val() == 'http://schema.org/EntertainmentBusiness') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopelocalbusiness').show();
    jQuery('#pageitemscopeentertainmentbusiness').show();
  } else if (jQuery('#pageitemscopelocalbusiness').val() == 'http://schema.org/FinancialService') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopelocalbusiness').show();
    jQuery('#pageitemscopefinancialservice').show();
  } else if (jQuery('#pageitemscopelocalbusiness').val() == 'http://schema.org/FoodEstablishment') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopelocalbusiness').show();
    jQuery('#pageitemscopefoodestablishment').show();
  } else if (jQuery('#pageitemscopelocalbusiness').val() == 'http://schema.org/GovernmentOffice') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopelocalbusiness').show();
    jQuery('#pageitemscopegovernmentoffice').show();
  } else if (jQuery('#pageitemscopelocalbusiness').val() == 'http://schema.org/HealthAndBeautyBusiness') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopelocalbusiness').show();
    jQuery('#pageitemscopehealthandbeautybusiness').show();
  } else if (jQuery('#pageitemscopelocalbusiness').val() == 'http://schema.org/HomeAndConstructionBusiness') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopelocalbusiness').show();
    jQuery('#pageitemscopehomeandconstructionbusiness').show();
  } else if (jQuery('#pageitemscopelocalbusiness').val() == 'http://schema.org/LodgingBusiness') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopelocalbusiness').show();
    jQuery('#pageitemscopelodgingbusiness').show();
  } else if (jQuery('#pageitemscopelocalbusiness').val() == 'http://schema.org/MedicalOrganization') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopelocalbusiness').show();
    jQuery('#pageitemscopemedicalorganization').show();
  } else if (jQuery('#pageitemscopelocalbusiness').val() == 'http://schema.org/ProfessionalService') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopelocalbusiness').show();
    jQuery('#pageitemscopeprofessionalservice').show();
  } else if (jQuery('#pageitemscopelocalbusiness').val() == 'http://schema.org/SportsActivityLocation') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopelocalbusiness').show();
    jQuery('#pageitemscopesportsactivitylocation').show();
  } else if (jQuery('#pageitemscopelocalbusiness').val() == 'http://schema.org/Store') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopelocalbusiness').show();
    jQuery('#pageitemscopestore').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopelocalbusiness').show();
  }
}

function show_pageitemscopeplace()
{
  if (jQuery('#pageitemscopeplace').val() == 'http://schema.org/AdministrativeArea') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeplace').show();
    jQuery('#pageitemscopeadministrativearea').show();
  } else if (jQuery('#pageitemscopeplace').val() == 'http://schema.org/CivicStructure') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeplace').show();
    jQuery('#pageitemscopecivicstructure').show();
  } else if (jQuery('#pageitemscopeplace').val() == 'http://schema.org/Landform') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeplace').show();
    jQuery('#pageitemscopelandform').show();
  } else if (jQuery('#pageitemscopeplace').val() == 'http://schema.org/LocalBusiness') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeplace').show();
    jQuery('#pageitemscopelocalbusiness').show();
  } else if (jQuery('#pageitemscopeplace').val() == 'http://schema.org/Residence') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeplace').show();
    jQuery('#pageitemscoperesidence').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeplace').show();
  }
}

function show_pageitemscopecivicstructure()
{
  if (jQuery('#pageitemscopecivicstructure').val() == 'http://schema.org/GovernmentBuilding') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeplace').show();
    jQuery('#pageitemscopecivicstructure').show();
    jQuery('#pageitemscopegovernmentbuilding').show();
  } else if (jQuery('#pageitemscopecivicstructure').val() == 'http://schema.org/PlaceOfWorship') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeplace').show();
    jQuery('#pageitemscopecivicstructure').show();
    jQuery('#pageitemscopeplaceofworship').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeplace').show();
    jQuery('#pageitemscopecivicstructure').show();
  }
}

function show_pageitemscopelandform()
{
  if (jQuery('#pageitemscopelandform').val() == 'http://schema.org/BodyOfWater') {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeplace').show();
    jQuery('#pageitemscopelandform').show();
    jQuery('#pageitemscopebodyofwater').show();
  } else {
    remove_datatypeitemscopelists();
    remove_thingitemscopelists();
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopeplace').show();
    jQuery('#pageitemscopelandform').show();
  }
}

jQuery( document ).ready(function() {
  jQuery('#pageitemscope').on('change', function(e) {
    show_pageitemscope();
    e.preventDefault();
  });
  jQuery('#pageitemscopedatatype').on('change', function(e) {
    show_pageitemscopedatatype();
    e.preventDefault();
  });
  jQuery('#pageitemscopething').on('change', function(e) {
    show_pageitemscopething();
    e.preventDefault();
  });
  jQuery('#pageitemscopeaction').on('change', function(e) {
    show_pageitemscopeaction();
    e.preventDefault();
  });
  jQuery('#pageitemscopeachieveaction').on('change', function(e) {
    show_itemscopesachieveaction();
    e.preventDefault();
  });
  jQuery('#pageitemscopeassessaction').on('change', function(e) {
    show_pageitemscopeassessaction();
    e.preventDefault();
  });
  jQuery('#pageitemscopeconsumeaction').on('change', function(e) {
    show_pageitemscopeconsumeaction();
    e.preventDefault();
  });
  jQuery('#pageitemscopeinteractaction').on('change', function(e) {
    show_pageitemscopeinteractaction();
    e.preventDefault();
  });
  jQuery('#pageitemscopeupdateaction').on('change', function(e) {
    show_pageitemscopeupdateaction();
    e.preventDefault();
  });
  jQuery('#pageitemscopecreativework').on('change', function(e) {
    show_pageitemscopecreativework();
    e.preventDefault();
  });
  jQuery('#pageitemscopearticle').on('change', function(e) {
    show_pageitemscopearticle();
    e.preventDefault();
  });
  jQuery('#pageitemscopewebpage').on('change', function(e) {
    show_pageitemscopewebpage();
    e.preventDefault();
  });
  jQuery('#pageitemscopeevent').on('change', function(e) {
    show_pageitemscopeevent();
    e.preventDefault();
  });
  jQuery('#pageitemscopeintangible').on('change', function(e) {
    show_pageitemscopeintangible();
    e.preventDefault();
  });
  jQuery('#pageitemscopeaudience').on('change', function(e) {
    show_pageitemscopeaudience();
    e.preventDefault();
  });
  jQuery('#pageitemscopeenumeration').on('change', function(e) {
    show_pageitemscopeenumeration();
    e.preventDefault();
  });
  jQuery('#pageitemscopespecialty').on('change', function(e) {
    show_pageitemscopespecialty();
    e.preventDefault();
  });
  jQuery('#pageitemscopestructuredvalue').on('change', function(e) {
    show_pageitemscopestructuredvalue();
    e.preventDefault();
  });
  jQuery('#pageitemscopemedicalentity').on('change', function(e) {
    show_pageitemscopemedicalentity();
    e.preventDefault();
  });
  jQuery('#pageitemscopeanatomicalstructure').on('change', function(e) {
    show_pageitemscopeanatomicalstructure();
    e.preventDefault();
  });
  jQuery('#pageitemscopeorganization').on('change', function(e) {
    show_pageitemscopeorganization();
    e.preventDefault();
  });
  jQuery('#pageitemscopelocalbusiness').on('change', function(e) {
    show_pageitemscopelocalbusiness();
    e.preventDefault();
  });
  jQuery('#pageitemscopeplace').on('change', function(e) {
    show_pageitemscopeplace();
    e.preventDefault();
  });
  jQuery('#pageitemscopecivicstructure').on('change', function(e) {
    show_pageitemscopecivicstructure();
    e.preventDefault();
  });
  jQuery('#pageitemscopelandform').on('change', function(e) {
    show_pageitemscopelandform();
    e.preventDefault();
  });
});