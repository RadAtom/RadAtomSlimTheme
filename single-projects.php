<?php 

get_header(); ?>

<!--category.php-->
<div id="internal-content-wrapper" >
	<div id="internal-content" class="row">
		<div class="large-9 columns" id="internal-content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1 class="caps"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>
		<div class="small-12 large-3 columns sidebar-attention">
            <?php 
            if ( dynamic_sidebar('project-post-sidebar') ) : 
            else : 
            ?>
            <p>need some content here jym</p>
            <?php endif; ?>
        </div>
	</div>
	
</div>
	


<?php 
//this would go here in order ot put the sidebar on the right
//get_sidebar();
get_footer(); 
?>
