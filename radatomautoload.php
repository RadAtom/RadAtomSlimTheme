<?php
require_once('helpers/ratab.php');
require_once('helpers/pages.php');
require_once('helpers/excerpts.php');
require_once('helpers/posts.php');
require_once('helpers/security.php');
require_once('helpers/images.php');
require_once('helpers/rasnippets.php');


class RadAtomWordpressAutoload {
	function __construct() {

   }

   
}

if( is_admin() )
    $my_settings_page = new RadAtomWordpressAutoload();

