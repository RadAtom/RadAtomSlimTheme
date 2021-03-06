<?php

get_header();
?>

<div id="cta-wrapper" class="row">
	<div id="cta" class="inner-bezell bezelled small-13 columns">
		<ul data-orbit>
			<?php
			//get the options
			$pageIdsSetting = '';
			//turn those optiions into pages
			//loop over them hoes
			$pages = array();
			foreach ($pages as $page) {
				?>
				<li>
					<div class="large-8 columns">
						<h2 id="orbit-header-1">Why Rad Atom?</h2>
						<h3 id="orbit-subheader-1" class="subheader">Simplicity. That is why.</h3>
						<h5 id="orbit-description-1" class="subheader">No matter if it's a Small Business Website, an E-Commerce Website, or a Creative Idea of any size, your website is no match for the Rad Atom process.</h4>
						<p id="orbit-button-1"><a href="/schedule-a-meeting/">Click Here to Learn More</a></p>
					</div>
					<div class="large-5 columns">
						<img src="">
					</div>
				</li>
				<?php
			}
			wp_reset_postdata();
			?>
			<li>
				<div class="large-8 columns">
					<h2 id="orbit-header-1">Why Rad Atom?</h2>
					<h3 id="orbit-subheader-1" class="subheader">Simplicity. That is why.</h3>
					<h5 id="orbit-description-1" class="subheader">No matter if it's a Small Business Website, an E-Commerce Website, or a Creative Idea of any size, your website is no match for the Rad Atom process.</h4>
					<p id="orbit-button-1"><a href="/schedule-a-meeting/">Click Here to Learn More</a></p>
				</div>
				<div class="large-5 columns">
					<img src="">
				</div>
			</li>
			<li>
				<div class="large-8 columns">
					<h2 id="orbit-header-2">Our Prior Work</h2>
					<h3 id="orbit-subheader-2" class="subheader">Proof of our method</h3>
					<h5 id="orbit-description-2" class="subheader">If our word alone is not suffiecient enough for you to believe Rad Atom on the quality we promise, why not judge our work for yourself by taking a look at our portfolio?</h4>
					<p id="orbit-button-2"><a href="/portfolio/">Click Here for Our Portfolio</a></p>
				</div>
				<div class="large-5 columns">
					<img src="">
				</div>
			</li>
			<li>
				<div class="large-8 columns">
					<h2 id="orbit-header-3">Your Experience</h2>
					<h3 id="orbit-subheader-3" class="subheader">Customer Service Track Record</h3>
					<h5 id="orbit-description-3" class="subheader">We value ourselves on providing an informative and enjoyable experience for each and every client. Please tell us your opinion on our service and finished product we offered.</h4>
					<p id="orbit-button-3"><a href="/client-testimony/">Click Here for Our Track Record</a></p>
				</div>
				<div class="large-5 columns">
					<img src="">
				</div>
			</li>
		</ul>
	</div>
</div>




<div id="front-content-wrapper" class="row">
	<div id="front-content-question" class="inner-bezell bezzled small-13 columns">
		<div id="content" class="small-13 columns">
			<h3 id="front-page-question">Is your website ready for Tomorrow's technology?</h3>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
</div>


<div class="row" id="portfolio-wrapper">
	<div class="inner-bezell bezelled small-13 columns" id="portfolio-wdiget" >
		<?php 
		if ( dynamic_sidebar('portfolio') ) : 
		else : 
		?>
		<?php endif; ?>


		<?php get_template_part( 'closingcta' );?>
	</div>
</div>

<?php 
//this would go here in order ot put the sidebar on the right
//get_sidebar();
get_footer(); 
?>
