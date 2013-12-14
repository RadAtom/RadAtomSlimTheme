function show_nav_menu(){
  $('#nav-menu').toggle();
  $('#social-menu').hide();
  $('#navbuttonbox').toggleClass('navbuttonbox');
  //the following code is just a fragment. meaning that the following code does not actually belong. you see i am trying to make the animations be toggleable on click for the navbuttonbox and nav-menu
  $('#navbuttonbox').animate({marginLeft: "-1em"}, 400);
  $('#nav-menu').animate({width: "+19.9em"}, 400);
  $('#socialbuttonbox').removeClass('socialbuttonbox');
}

function show_social_menu(){
  $('#social-menu').toggle();
  $('#nav-menu').hide();
  $('#socialbuttonbox').toggleClass('socialbuttonbox');
  //same goes for this code
  $('#socialbuttonbox' ).animate({marginRight: "4em"}, 400);
  $('#social-menu').animate({width: "+19.9em"}, 400);
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