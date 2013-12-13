<?php

get_header();
?>

<div id="cta-wrapper" class="row bezelled">
	<div id="cta" class="inner-bezell small-13 columns">
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
						<h2 id="oh1">Why Rad Atom?</h2>
						<h3 id="osh1" class="subheader">Simplicity. That is why.</h3>
						<h5 id="od1" class="subheader">No matter if it's a Small Business Website, an E-Commerce Website, or a Creative Idea of any size, your website is no match for Rad Atom's planning and execution. Learn more simply by talking to one of us here at Rad Atom!</h4>
						<p id="ob1"><a href="/schedule-a-meeting/">Click Here to Make an Appointment</a></p>
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
					<h2 id="oh1">Why Rad Atom?</h2>
					<h3 id="osh1" class="subheader">Simplicity. That is why.</h3>
					<h5 id="od1" class="subheader">No matter if it's a Small Business Website, an E-Commerce Website, or a Creative Idea of any size, your website is no match for Rad Atom's planning and execution. Learn more simply by talking to one of us here at Rad Atom!</h4>
					<p id="ob1"><a href="/schedule-a-meeting/">Click Here to Make an Appointment</a></p>
				</div>
				<div class="large-5 columns">
					<img src="">
				</div>
			</li>

			<li>
				<div class="large-8 columns">
					<h2 id="oh2">Our Prior Work</h2>
					<h3 id="osh2" class="subheader">Proof of our method</h3>
					<h5 id="od2" class="subheader">If our word alone is not suffiecient enough for you to believe Rad Atom on the quality we promise, why not judge our work for yourself by taking a look at our portfolio?</h4>
					<p id="ob2"><a href="/portfolio/">Click Here to View Our Portfolio</a></p>
				</div>
				<div class="large-5 columns">
					<img src="">
				</div>
			</li>

			<li>
				<div class="large-8 columns">
					<h2 id="oh3">Your Experience</h2>
					<h3 id="osh3" class="subheader">Customer Service Track Record</h3>
					<h5 id="od3" class="subheader">We value ourselves on providing an informative and enjoyable experience for each and every client. Please tell us your opinion on our service and finished product we offered.</h4>
					<p id="ob3"><a href="/client-testimony/">Click Here for Our Track Record</a></p>
				</div>
				<div class="large-5 columns">
					<img src="">
				</div>
			</li>


			
		</ul>
	</div>
</div>

<div id="front-content-wrapper" class="row bezelled">
	<div class="inner-bezell small-13 columns">
		<div id="content" class="small-13 columns">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
			<h3>Is your website ready for Tomorrow's technology?</h3>
		</div>
	</div>
</div>


<div class="row bezelled" id="portfolio-wrapper">
	<div class="inner-bezell small-13 columns" id="portfolio-wdiget" >
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
