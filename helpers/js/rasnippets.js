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
    jQuery('#pageitemscopeaction').show();
    jQuery('#pageitemscopecreativework').hide();
    jQuery('#pageitemscopeevent').hide();
    jQuery('#pageitemscopeintangible').hide();
    jQuery('#pageitemscopemedicalentity').hide();
    jQuery('#pageitemscopeorganization').hide();
    jQuery('#pageitemscopeplace').hide();
  } else if (jQuery('#pageitemscopething').val() == 'http://schema.org/CreativeWork') {
    jQuery('#pageitemscopecreativework').show();
    jQuery('#pageitemscopeaction').hide();
    jQuery('#pageitemscopeevent').hide();
    jQuery('#pageitemscopeintangible').hide();
    jQuery('#pageitemscopemedicalentity').hide();
    jQuery('#pageitemscopeorganization').hide();
    jQuery('#pageitemscopeplace').hide();
  } else if (jQuery('#pageitemscopething').val() == 'http://schema.org/CreativeWork') {
    jQuery('#pageitemscopecreativework').show();
    jQuery('#pageitemscopeaction').hide();
    jQuery('#pageitemscopeevent').hide();
    jQuery('#pageitemscopeintangible').hide();
    jQuery('#pageitemscopemedicalentity').hide();
    jQuery('#pageitemscopeorganization').hide();
    jQuery('#pageitemscopeplace').hide();
  } else if (jQuery('#pageitemscopething').val() == 'http://schema.org/Event') {
    jQuery('#pageitemscopeevent').show();
    jQuery('#pageitemscopeaction').hide();
    jQuery('#pageitemscopecreativework').hide();
    jQuery('#pageitemscopeintangible').hide();
    jQuery('#pageitemscopemedicalentity').hide();
    jQuery('#pageitemscopeorganization').hide();
    jQuery('#pageitemscopeplace').hide();
  } else if (jQuery('#pageitemscopething').val() == 'http://schema.org/Intangible') {
    jQuery('#pageitemscopeintangible').show();
    jQuery('#pageitemscopeaction').hide();
    jQuery('#pageitemscopeevent').hide();
    jQuery('#pageitemscopecreativework').hide();
    jQuery('#pageitemscopemedicalentity').hide();
    jQuery('#pageitemscopeorganization').hide();
    jQuery('#pageitemscopeplace').hide();
  } else if (jQuery('#pageitemscopething').val() == 'http://schema.org/MedicalEntity') {
    jQuery('#pageitemscopemedicalentity').show();
    jQuery('#pageitemscopeaction').hide();
    jQuery('#pageitemscopeevent').hide();
    jQuery('#pageitemscopeintangible').hide();
    jQuery('#pageitemscopecreativework').hide();
    jQuery('#pageitemscopeorganization').hide();
    jQuery('#pageitemscopeplace').hide();
  } else if (jQuery('#pageitemscopething').val() == 'http://schema.org/Organization') {
    jQuery('#pageitemscopeorganization').show();
    jQuery('#pageitemscopeaction').hide();
    jQuery('#pageitemscopeevent').hide();
    jQuery('#pageitemscopeintangible').hide();
    jQuery('#pageitemscopemedicalentity').hide();
    jQuery('#pageitemscopecreativework').hide();
    jQuery('#pageitemscopeplace').hide();
  } else if (jQuery('#pageitemscopething').val() == 'http://schema.org/Place') {
    jQuery('#pageitemscopeplace').show();
    jQuery('#pageitemscopeaction').hide();
    jQuery('#pageitemscopeevent').hide();
    jQuery('#pageitemscopeintangible').hide();
    jQuery('#pageitemscopemedicalentity').hide();
    jQuery('#pageitemscopeorganization').hide();
    jQuery('#pageitemscopecreativework').hide();
  } else {
    jQuery('#pageitemscopeaction').hide();
    jQuery('#pageitemscopecreativework').hide();
    jQuery('#pageitemscopeevent').hide();
    jQuery('#pageitemscopeintangible').hide();
    jQuery('#pageitemscopemedicalentity').hide();
    jQuery('#pageitemscopeorganization').hide();
    jQuery('#pageitemscopeplace').hide();
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
    show_itemscopestext();
    e.preventDefault();
  });
  jQuery('#pageitemscopeconsumeaction').on('change', function(e) {
    show_pageitemscopeachieveaction();
    e.preventDefault();
  });
  jQuery('#pageitemscopeinteractaction').on('change', function(e) {
    show_pageitemscopeinteractaction();
    e.preventDefault();
  });
  jQuery('#pageitemscopeorganizeaction').on('change', function(e) {
    show_pageitemscopeorganizeaction();
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
  jQuery('#pageitemscopeevent').on('change', function(e) {
    show_pageitemscopeevent();
    e.preventDefault();
  });
  jQuery('#pageitemscopeintangible').on('change', function(e) {
    show_pageitemscopeintangible();
    e.preventDefault();
  });
  jQuery('#pageitemscopemedicalentity').on('change', function(e) {
    show_pageitemscopemedicalentity();
    e.preventDefault();
  });
  jQuery('#pageitemscopeorganization').on('change', function(e) {
    show_pageitemscopeorganization();
    e.preventDefault();
  });
  jQuery('#pageitemscopeplace').on('change', function(e) {
    show_pageitemscopeplace();
    e.preventDefault();
  });

});