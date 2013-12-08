<?php
require_once('helpers/pages.php');
require_once('helpers/excerpts.php');
require_once('helpers/posts.php');
require_once('helpers/security.php');


class RadAtomWordpressAutoload {
	function __construct() {

   }

   
}

if( is_admin() )
    $my_settings_page = new RadAtomWordpressAutoload();

