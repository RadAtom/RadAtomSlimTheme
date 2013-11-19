<?php get_header(); ?>

<div id="internal-content-wrapper" >
	<div id="internal-content" class="row">
		<div class="large-7 columns" id="internal-content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1 class="caps"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
	
</div>
	


<?php 
//this would go here in order ot put the sidebar on the right
//get_sidebar();
get_footer(); 
?>
