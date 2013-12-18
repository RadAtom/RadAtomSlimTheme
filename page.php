<?php get_header();
echo '<!--page.php-->';


echo '<div id="internal-content-outter-wrapper" class="row">';
	echo '<div id="internal-content-inner wrapper" class="inner-bezell bezelled small-13 columns">';
		if ( have_posts() ) : while ( have_posts() ) : the_post();

			function breadcrumbs($separator = ' &raquo; ', $home = 'Home') {

			    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

			    $base = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

				$breadcrumbs = Array("<a href=\"$base\">$home</a>");

				$last = end(array_keys($path));

			    foreach ($path AS $x => $crumb) {
			        $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));
			        if ($x != $last)
			            $breadcrumbs[] = "<a href=\"$base$crumb\">$title</a>";
			        else
			            $breadcrumbs[] = $title;
			    }
			    return implode($separator, $breadcrumbs);

			}
			echo '<p>';
			breadcrumbs();
			echo '</p>';

			//retrieves user data
			$ra_snippet = get_post_meta( get_the_id(), 'ra_snippet_field' , true);
			// retrieves snippets for the pages page
			$schema_snippet = get_post_meta( get_the_id(), 'schema_snippet_field' , true);

		
		echo '<article>';
			echo'<div class="large-9 columns" id="internal-content" itemscope itemtype="<?php echo $schema_snippet; ?>" >';
					echo '<h1 class="caps"><?php the_title(); ?></h1>';
					the_content();
			echo '</div>';
		'</article>';
		endwhile; endif;
		echo get_sidebar();
	echo '</div>';
	
echo '</div>';
	

//this would go here in order ot put the sidebar on the right
//get_sidebar();
get_footer(); 
?>