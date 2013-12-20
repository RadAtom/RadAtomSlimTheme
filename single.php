<?php 

get_header(); 

echo '<!--single.php-->';
echo '<div id="internal-content-wrapper" class="row">';
	echo '<div id="internal-content" class="inner-bezell bezelled small-13 columns">';
			if ( have_posts() ) : while ( have_posts() ) : the_post();

			//retrieves user data
			$ra_snippet = get_post_meta( $post->ID, 'ra_snippet_field' , true);

			// retrieves snippets for the pages page
			$schema_snippet = get_post_meta( $post->ID, 'schema_snippet_field' , true);

				echo '<article>';
					echo '<div class="large-9 columns" id="internal-content" itemscope itemtype="'.$ra_snippet.'" >';
						echo '<h1 id="post-title" class="caps">';
							the_title();
						echo '</h1>';
						the_content();
					echo '</div>';
				echo '</article>';
			endwhile; endif;
			get_sidebar();
	echo '</div>';
	
echo '</div>';
	

//this would go here in order ot put the sidebar on the right
//get_sidebar();
get_footer(); 
