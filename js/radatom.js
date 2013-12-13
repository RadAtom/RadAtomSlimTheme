function show_nav_menu(){
  $('#social-menu').hide();
  $('#nav-menu').toggle();
  $('#navbuttonbox').toggleClass('navbuttonbox');
  $('#socialbuttonbox').removeClass('socialbuttonbox');
}

function show_social_menu(){
  $('#nav-menu').hide();
  $('#social-menu').toggle();
  $('#socialbuttonbox').toggleClass('socialbuttonbox');
  $('#navbuttonbox').removeClass('navbuttonbox');
}

$( document ).ready(function() {
  $('#navbutton').click(function(e) {  
    show_nav_menu();
    e.preventDefault();
  });
  $('#socialbutton').click(function(e) {  
    show_social_menu();
    e.preventDefault();
  });
});