<?php get_header(); ?>
<!--page.php-->
<div id="internal-content-outter-wrapper" class="row">
	<div id="internal-content-inner wrapper" class="inner-bezell bezelled small-13 columns">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


		<?php
		//this php code will get the variable that is the scema.org rich snippet
		//some edits here, hope this works.//
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