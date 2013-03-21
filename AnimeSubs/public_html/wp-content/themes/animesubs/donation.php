<?php
/*
Template Name: Donation
*/
?>
<?php
	get_header();
?>
			<div class="post">
				<div align="center"><b><font style="font-size:16px">Things to know about donation</font></b></div>
				<div align="center"><b><font style="font-size:12px">Donations will help financing the costs of the website and server that are crucial to running this site. I would also like to give anyone who donates $5 or more the links for direct downloads. If you have any questions or suggestions about this feel free to email me <a href="/contact">here</a>. AnimeSubs thanks you for your support.</font></b></div>
				<p>&nbsp;</p>
				
			<div align="center"><b><font style="font-size:12px">Target to move to new domain and server</font></b></div>
			<div align="center"><?php echo do_shortcode('[wpdonatemeter cid=1]'); ?></div>
				<p>&nbsp;</p>
			<div align="center"><?php echo do_shortcode('[wpdonatebuy cid=1]'); ?></div>
				<p>&nbsp;</p>
			<div><b><font style="font-size:12px">Thank you for the following donors:</font></b></div>
				<p>&nbsp;</p>
			<div><?php echo do_shortcode('[wpdonatorlist cid=1]'); ?></div>
			</div>
		</div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>