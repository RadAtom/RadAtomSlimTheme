<div id="footer-wrapper" class="row bezelled">
	<div id="footer-trifecta" class="inner-bezell small-13 columns">

		<div id="footer-follow" class="large-4 columns">
			<h3 id="follow">Follow Us</h3>
			<ul>
				<li><a href=""><img src="<?php bloginfo('template_url'); ?>/img/long-facebook-icon.png" alt="Follow Us On Facebook!"></a></li>
				<li><a href=""><img src="<?php bloginfo('template_url'); ?>/img/long-twitter-icon.png" alt="Follow Us On Twitter!"></a></li>
				<li><a href=""><img src="<?php bloginfo('template_url'); ?>/img/long-linkedin-icon.png" alt="Follow Us On LinkedIn!"></a></li>
			</ul>
			
			<?php 
			if ( dynamic_sidebar('footer-follow-us') ) : 
			else : 
			?>
			<?php endif; ?>
		</div>

		<div  id="footer-newsletter" class="large-4 columns">
			<h3 id="nl">Newsletter</h3>
			<h5 id="nlh" class="subheader">Interested in Free Information?<h5>
			<input type="text" id="newnl"/>
			<a class="small secondary button" type="submit" id="newnlb">Submit</a>
			<p id="nld">Curious as to what kind of "Free Information"? Click Here</p>
			<?php 
			if ( dynamic_sidebar('footer-news-letter') ) : 
			else : 
			?>
			<?php endif; ?>
		</div>

		<div id="footer-nav" class="large-4 columns">
			<h3 id="ql">Quick Links</h3>
			<ul>
				<li><a href="" class="small secondary button" id="ql1">Services</a></li>
				<li><a href="" class="small secondary button" id="ql2">Portfolio</a></li>
				<li><a href="" class="small secondary button" id="ql3">Contact Rad Atom</a></li>
				<li><a href="" class="small secondary button" id="ql4">Hire Rad Atom</a></li>
				<?php 
				//wp_nav_menu( array( 'theme_location' => 'menu-footer' ) ); 
				?>
			</ul>
		</div>
	</div>
</div>
	<script src="<?php bloginfo('template_url'); ?>/js/vendor/jquery.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/foundation/foundation.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/foundation/foundation.orbit.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/foundation/foundation.reveal.js"></script>
	<!--
	<script src="js/foundation/foundation.dropdown.js"></script>

	<script src="js/foundation/foundation.alerts.js"></script>

	<script src="js/foundation/foundation.clearing.js"></script>

	<script src="js/foundation/foundation.placeholder.js"></script>

	<script src="js/foundation/foundation.forms.js"></script>

	<script src="js/foundation/foundation.cookie.js"></script>

	<script src="js/foundation/foundation.joyride.js"></script>

	<script src="js/foundation/foundation.magellan.js"></script>

	

	

	<script src="js/foundation/foundation.section.js"></script>

	<script src="js/foundation/foundation.tooltips.js"></script>

	<script src="js/foundation/foundation.topbar.js"></script>

	-->
	<script src="<?php bloginfo('template_url'); ?>/js/radatom.js"></script>

	<script>
	$(document).foundation();

	</script>
</body>
</html>
