/*
 * JS for Ra Snippets
 */
function show_itemscopes()
{
  if (jQuery('#pageitemscope').val() == 'http://schema.org/DataType') {
    // Default show the Choose Size Option
    jQuery('#pageitemscopedatatype').show();
    jQuery('#pageitemscopething').hide();
  } else if (jQuery('#pageitemscope').val() == 'http://schema.org/Thing') {
    jQuery('#pageitemscopething').show();
    jQuery('#pageitemscopedatatype').hide();
  } else {
    jQuery('#pageitemscopedatatype').hide();
    jQuery('#pageitemscopething').hide();
  }
}

jQuery( document ).ready(function() {
  jQuery('#pageitemscope').on('change', function(e) {
    show_itemscopes();
    e.preventDefault();
  });
});