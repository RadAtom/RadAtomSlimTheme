/*
 * JS for Ra Snippets
 */
function show_home(){
  $('#ra-snippets-home-content').toggle();
  $('#ra-snippets-pageitemscope-content').hide();
  $('#ra-snippets-contentitemscope-content').hide();
  $('#ra-snippets-itemprop-content').hide();
  $('#ra-snippets-home-tab').toggleClass('ra-snippets-home-tab');
}

function show_pageitemscope(){
  $('#ra-snippets-pageitemscope-content').toggle();
  $('#ra-snippets-home-content').hide();
  $('#ra-snippets-contentitemscope-content').hide();
  $('#ra-snippets-itemprop-content').hide();
  $('#ra-snippets-pageitemscope-tab').toggleClass('ra-snippets-pageitemscope-tab');
}

function show_contentitemscope(){
  $('#ra-snippets-contentitemscope-content').toggle();
  $('#ra-snippets-home-content').hide();
  $('#ra-snippets-pageitemscope-content').hide();
  $('#ra-snippets-itemprop-content').hide();
  $('#ra-snippets-contentitemscope-tab').toggleClass('ra-snippets-contentitemscope-tab');
}

function show_itemprop(){
  $('#ra-snippets-itemprop-content').toggle();
  $('#ra-snippets-home-content').hide();
  $('#ra-snippets-pageitemscope-content').hide();
  $('#ra-snippets-contentitemscope-content').hide();
  $('#ra-snippets-itmeprop-tab').toggleClass('ra-snippets-itmeprop-tab');
}

$( document ).ready(function() {
  $('#ra-snippets-home-tab').click(function(e) {
    show_home();
    e.preventDefault();
  });
  $('#ra-snippets-pageitemscope-tab').click(function(e) {
    show_pageitemscope();
    e.preventDefault();
  });
  $('#ra-snippets-contentitemscope-tab').click(function(e) {
    show_contentitemscope();
    e.preventDefault();
  });
  $('#ra-snippets-itemprop-tab').click(function(e) {
    show_itemprop();
    e.preventDefault();
  });
});