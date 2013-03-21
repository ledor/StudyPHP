<?php
	get_header();
?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID() ?>">
				<div class="entrytext">
					<div class="postdesc">
						<h1><?php the_title(); ?></h1>
						<p>&nbsp;</p>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php else : ?>
				<p>Sorry, but you are looking for something that isn't here.</p>
			<?php endif; ?>
		</div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>