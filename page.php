<?php get_header(); ?>
<!--page.php-->
<div id="internal-content-outter-wrapper" class="row">
	<div id="internal-content-inner wrapper" class="inner-bezell bezelled small-13 columns">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php

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

		?>

		<p><?= breadcrumbs() ?></p>




		<?php

			//this php code will get the variable that is the scema.org rich snippet
			//setup a default value if none is found in the meta data of the post
			$itemType = '';


			$metaDataValues = get_post_custom_values('richsnippet' , get_the_ID() );

			//check to make sure that the keyvalue is there

			//set the $itmeType to the value using the key
		
		?>

		
		<article>
			<div class="large-9 columns" id="internal-content" itemscope itemtype="<?php echo $itemType; ?>" >
					<h1 class="caps"><?php the_title(); ?></h1>
					<?php the_content(); ?>
			</div>
		</article>
		<?php endwhile; endif; ?>
		<?php get_sidebar(); ?>
	</div>
	
</div>
	


<?php 
//this would go here in order ot put the sidebar on the right
//get_sidebar();
get_footer(); 
?>