<?php
	get_header();
?>
			<h2 class="pagetitle">Search Results</h2>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="postlist">
				<p id="post-<?php the_ID(); ?>">&#9658;&nbsp;<a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title() ?>"><?php the_title() ?></a></p>
			</div>
			<?php endwhile; ?>
			<?php else : ?>
				<p>Sorry, but you are looking for something that isn't here.</p>
			<?php endif; ?>
			<div class="paddingnavi">
				<div class="pagenavi">
				<?php animesub_pagination(); ?>
				</div>
			</div>
		</div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>