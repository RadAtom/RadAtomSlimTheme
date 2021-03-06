<?php
require_once('helpers/radatom_theme_specifics.php');
require_once('radatomautoload.php');
?>
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

  ?></title>

  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.css" />
  
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/foundation.css" />


  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

  <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />

  <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

  <?php wp_head(); ?>
  <link href='http://fonts.googleapis.com/css?family=Share+Tech|Architects+Daughter|Orbitron' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
  <script src="<?php bloginfo('template_url'); ?>/js/vendor/custom.modernizr.js"></script>
  





</head>
<body <?php body_class(); ?>>
  <div id="header-wrapper" class="row bezelled">
    <div id="header" class="inner-bezell small-13 columns">
      <div id="logo-wrapper" class="small-13 columns">
        <div id="logo" class="small-13 columns">
          <a href="<?php echo get_bloginfo('url'); ?>">
            <?php
            if(is_front_page()){
              echo '<h1 class="heading-text">'.get_bloginfo('name').'</h1>';
            }else{
              echo '<h2 class="heading-text">'.get_bloginfo('name').'</h2>';
            }
            ?>
            <h2 class="subheading-text"><?php echo get_bloginfo('description'); ?></h2>
          </a>
        </div>
      </div>
      <div id="header-stuff" class="large-13 columns">
        <div id="nav-button" class="large-6 columns">
          <div id="navbuttonbox" class="large-2 columns">
            <a href="#" id="navbutton" class="round button"><?php echo get_nav_menu_button_text(); ?></a>
          </div>
          <div id="nav-menu" class="large-8 columns">
            <?php wp_nav_menu( array( 'theme_location' => 'menu-header', 'container'       => 'nav','items_wrap'      => '<ul id="%1$s" class="%2$s inline-list">%3$s</ul>', ) ); ?>
          </div>
        </div>
        <div id="social-button" class="large-7 columns">
          <div id="social-menu"  class="large-8 columns">
            <ul class="inline-list">
              <li><a href=""><img src="<?php bloginfo('template_url'); ?>/img/facebook-icon.png" alt="Follow Us On Facebook!"></a></li>
              <li><a href=""><img src="<?php bloginfo('template_url'); ?>/img/twitter-icon.png" alt="Follow Us On Twitter!"></a></li>
              <li><a href=""><img src="<?php bloginfo('template_url'); ?>/img/linkedin-icon.png" alt="Follow Us On LinkedIn!"></a></li>
            </ul>
          </div>
          <div id="socialbuttonbox" class="large-2 columns">
            <a href="#" id="socialbutton" class="round button"><?php echo get_social_menu_button_text(); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>