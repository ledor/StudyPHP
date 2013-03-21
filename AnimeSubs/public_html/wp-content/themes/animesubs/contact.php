<?php
/*
Template Name: Contact
*/
?>
<?php
	get_header();
?>
			<div class="post" id="post-<?php the_ID() ?>">
				<div class="entrytext">
					<div class="postdesc">
						<p><b><font size="4">Requests, Comments, Concerns, or Complains</font></b></p>
						<p>Please be very specific on the subject when you are sending requests.</p>
						<p>Example of using proper subject tag:</p>
						<p>- Anime Request<br />
						- Advertise on Site<br />
						- Annoying Advertisement<br />
						- Inappropriate comments (racists, hate etc&#8230;)<br /></p>
						<p>We will try our best to reply all your emails.</p>
						<p>&nbsp;</p>
						
						<br />
						<p><h1>Contact Us</h1></p><br />
						<div><iframe width="100%" height="800px" marginwidth="0" marginheight="0" frameborder="0"  scrolling="no" src="<?php bloginfo('template_url'); ?>/contactform.php"></iframe></div>
					</div>
				</div>
			</div>
		</div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>