function show_nav_menu(){
  $('#social-menu').hide();
  $('#nav-menu').toggle();
  $('#navbuttonbox').css('background-color', '#b0ff30');
  $('#navbuttonbox').css('box-shadow', '4px 1px 4px 0.5px #888888');
  $('#socialbuttonbox').css('background-color', '');
  $('#socialbuttonbox').css('box-shadow', '');
}

function show_social_menu(){
  $('#nav-menu').hide();
  $('#social-menu').toggle();
  $('#socialbuttonbox').css('background-color', '#c530ff');
  $('#socialbuttonbox').css('box-shadow', '4px 2px 4px 0.5px #888888');
  $('#navbuttonbox').css('background-color', '');
  $('#navbuttonbox').css('box-shadow', '');
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