function show_nav_menu(){
  $('#social-menu').hide();
  $('#nav-menu').toggle();
}

function show_social_menu(){
  $('#nav-menu').hide();
  $('#social-menu').toggle();
}

$( document ).ready(function() {
  $('#navbutton').click(function(e) {  
    show_nav_menu();
  });
  $('#socialbutton').click(function(e) {  
    show_social_menu();
  });
});