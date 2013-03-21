<?php
	get_header();
	$cat_id = get_query_var('cat');
	$category = get_category($cat_id);
?>
			<h2 class="pagetitle"><?php echo $category->name; ?></h2>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="postlist">
				<table border="0" width="590" cellpadding="0" style="border-collapse: collapse" bordercolor="#FFFFFF" bgcolor="#171717">
					<tr>
						<td width="434">&#9658;&nbsp;<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></td>
					</tr>
				</table>
				<div class='entry'>
				</div>
			</div>
			<?php endwhile; ?>
			<?php else : ?>
			<div class="postlist">
				<p>Sorry, we haven't uploaded episodes of this anime yet.</p>
			</div>
			<?php endif; ?>
			<div class="paddingnavi">
				<div class="pagenavi">
				<?php echo paginate_links( $pagination ); ?>
				<?php animesub_pagination(); ?>
				</div>
			</div>
		</div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>