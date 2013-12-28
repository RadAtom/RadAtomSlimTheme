function show_nav_menu(){
  $('#nav-menu').toggle();
  $('#social-menu').hide();
  $('#navbuttonbox').toggleClass('navbuttonbox'); 
  $('#socialbuttonbox').removeClass('socialbuttonbox');
  //this is for moving the navbutton box left/right
  if($('#navbuttonbox').hasClass('navbuttonbox')) {
    $('#navbuttonbox').animate({marginLeft: "-3em"}, 400); 
    $('#socialbuttonbox').animate({marginRight: "18.16em"}, 400);
  }
  else {
    $('#navbuttonbox').animate({marginLeft: "14.8em"}, 400);
  }
  //this is for growing/shrinking nav-menu
  if($('#navbuttonbox').hasClass('navbuttonbox')) {
    $('#nav-menu').animate({width: "19.9em"}, 400); 
    $('#social-menu').animate({width: "-21.04em"}, 400);
  }
  else {
    $('#nav-menu').animate({width: "0em"}, 400);
  }
}

function show_social_menu(){
  $('#social-menu').toggle();
  $('#nav-menu').hide();
  $('#socialbuttonbox').toggleClass('socialbuttonbox'); 
  $('#navbuttonbox').removeClass('navbuttonbox');
  //this is for moving the navbutton box left/right
  if($('#socialbuttonbox').hasClass('socialbuttonbox')) {
    $('#socialbuttonbox').animate({marginRight: "-1em"}, 400);  
    $('#navbuttonbox').animate({marginLeft: "14.8em"}, 400);
  }
  else {
    $('#socialbuttonbox').animate({marginRight: "18.16em"}, 400);
  }
  //this is for growing/shrinking nav-menu
  if($('#socialbuttonbox').hasClass('socialbuttonbox')) {
    $('#social-menu').animate({width: "21.05em"}, 400); 
    $('#nav-menu').animate({width: "-19.9em"}, 400);
  }
  else {
    $('#social-menu').animate({width: "0em"}, 400);
 
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