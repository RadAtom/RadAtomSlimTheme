<div id="footer-wrapper" class="row bezelled">
	<div id="footer-trifecta" class="inner-bezell small-13 columns">
		<div id="footer-follow" class="large-4 columns">
			<h3>Follow Us</h3>
			<div class="small-6 columns">
				<ul class="small-block-grid-3">
					<li><a href=""><img src="<?php bloginfo('template_url'); ?>/img/facebook-icon.png" alt="Follow Us On Facebook!"></a></li>
					<li><a href=""><img src="<?php bloginfo('template_url'); ?>/img/twitter-icon.png" alt="Follow Us On Twitter!"></a></li>
					<li><a href=""><img src="<?php bloginfo('template_url'); ?>/img/linkedin-icon.png" alt="Follow Us On LinkedIn!"></a></li>
				</ul>
			</div>
			
			<?php 
			if ( dynamic_sidebar('footer-follow-us') ) : 
			else : 
			?>
			<?php endif; ?>
		</div>
		<div  id="footer-newsletter" class="large-4 columns">
			<h3>NewsLetter</h3>
			<?php 
			if ( dynamic_sidebar('footer-news-letter') ) : 
			else : 
			?>
			<?php endif; ?>
		</div>
		<div id="footer-nav" class="large-4 columns">
			<h3>Quick Links</h3>
			<u>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-footer' ) ); ?>
		</style>
		</u>
		</div>
	</div>
</div>

	<script>
	document.write('<script src=' +
	('__proto__' in {} ? '<?php bloginfo('template_url'); ?>/js/vendor/zepto' : '<?php bloginfo('template_url'); ?>/js/vendor/jquery') +
	'.js><\/script>')
	</script>

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

	<script>
	$(document).foundation();
	</script>
</body>
</html>
