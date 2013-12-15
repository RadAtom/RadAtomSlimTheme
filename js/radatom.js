function show_nav_menu(){
  $('#nav-menu').toggle();
  $('#social-menu').hide();
  $('#navbuttonbox').toggleClass('navbuttonbox'); 
  $('#socialbuttonbox').removeClass('socialbuttonbox');
  //this is for moving the navbutton box left/right
  if($('#navbuttonbox').hasClass('navbuttonbox')) {
    $('#navbuttonbox').animate({marginLeft: "-18"}, 400); 
    $('#socialbuttonbox').animate({marginRight: "20em"}, 400);
  }
  else {
    $('#navbuttonbox').animate({marginLeft: "18em"}, 400);
  }
  //this is for growing/shrinking nav-menu
  if($('#navbuttonbox').hasClass('navbuttonbox')) {
    $('#nav-menu').animate({width: "18.9em"}, 400); 
    $('#social-menu').animate({width: "-18.1em"}, 400);
  }
  else {
    $('#nav-menu').animate({width: "-19.9em"}, 400);
  }
}

function show_social_menu(){
  $('social-menu').toggle();
  $('#nav-menu').hide();
  $('#socialbuttonbox').toggleClass('socialbuttonbox');
  $('#navbuttonbox').removeClass('navbuttonbox');
  //this is for moving the navbutton box left/right
  if($('#socialbuttonbox').hasClass('socialbuttonbox')) {
    $('#socialbuttonbox').animate({marginRight: "-18"}, 400); 
    $('#navbuttonbox').animate({marginLeft: "18em"}, 400);
  }
  else {
    $('#socialbuttonbox').animate({marginRight: "20em"}, 400);
  }
  //this is for growing/shrinking social-menu
  if($('#socialbuttonbox').hasClass('socialbuttonbox')) {
    $('#social-menu').animate({width: "18.1em"}, 400); 
    $('#nav-menu').animate({width: "-19.9em"}, 400);
  }
  else {
    $('#social-menu').animate({width: "-18.1em"}, 400);
  }
  
  
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