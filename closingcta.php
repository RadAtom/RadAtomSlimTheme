<?php
/*
<ul class="pricing-table">
	<li class="title"><h4><?php echo $leftdiv['heading'];?></h4></li>
	<li class="price"><?php echo $leftdiv['subheading'];?></li>
	<li class="description"><?php echo $leftdiv['description'];?></li>
	<li class="cta-button"><?php echo $leftdiv['link'];?></li>
</ul>
*/


$leftdiv = array();
$centerdiv = array();
$rightdiv = array();

?>


<div id="closing-cta" class="row">
	<div id="left-cta" class="cta-wrapper small-13 large-4 columns ">
		<ul class="pricing-table">
			<li class="title"><h4>Plan<?php //echo $leftdiv['heading'];?></h4></li>
			<li class="description"><?php echo $leftdiv['description'];?></li>
			<li class="cta-button">
				<a href="" class="small secondary button">Read More</a>
				<?php //echo $leftdiv['link'];?>
			</li>
		</ul>
	</div>

	<div id="center-cta"  class="cta-wrapper small-13 large-4 columns ">
		<ul class="pricing-table">
			<li class="title"><h4>Produce<?php //echo $centerdiv['heading'];?></h4></li>
			<li class="description"><?php echo $centerdiv['description'];?></li>
			<li class="cta-button">
				<a href="" class="small secondary button">Read More</a>
				<?php //echo $centerdiv['link'];?>
			</li>
		</ul>
	</div>

	<div id="right-cta" class="cta-wrapper small-13 large-4 columns ">
			<ul class="pricing-table">
			<li class="title"><h4>Deploy<?php //echo $rightdiv['heading'];?></h4></li>
			<li class="description"><?php echo $rightdiv['description'];?></li>
			<li class="cta-button">
				<a href="" class="small secondary button">Read More</a>
				<?php //echo $rightdiv['link'];?>
			</li>
		</ul>
	</div>
</div>