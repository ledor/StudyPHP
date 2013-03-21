<?php
	get_header();
	$cat_id = get_query_var('cat');
	$category = get_category($cat_id);
?>
			<h2 class="pagetitle"><?php echo $category->name; ?> Description:</h2>
			<div class="catdescription">
				<?php list($featured, $recommend, $ongoing, $genre, $director, $studio, $tvnetwork, $description, $plot) = explode("[nxt]", $category->description); ?>
				<?php echo '<img class="alignleft" style="padding-right: 7px" src="/images/' . $category->cat_ID . '.jpg" width="300" height="422" />'; ?><b>Title: </b><?php echo $category->name; ?><br /><br />
				<b>Genre: </b><?php echo $genre; ?><br /><br />
				<b>Director: </b><?php echo $director; ?><br /><br />
				<b>Studio: </b><?php echo $studio; ?><br /><br />
				<b>TV Network: </b><?php echo $tvnetwork; ?><br /><br />
				<b>Description:</b><br /><?php echo $description; ?><br /><br />
				<b>Plot Summary:</b><br /><?php echo $plot; ?>
			</div>
			<div class="catlist">
			<b><?php echo $category->name; ?> Episodes:</b>
			</div>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="postlist">
				<?php
				$dltext = '';
				$afiletype = get_post_custom_values('afiletype',$post->ID);
				if (is_array($afiletype)) {
					foreach ($afiletype as $key=>$filetype) {
						$dltext .= $filetype . ': [ ';
						$metakey = $filetype . 'size';
						$afilesize = get_post_custom_values($metakey,$post->ID);
						$i = 0;
						$count = count($afilesize);
						foreach ($afilesize as $key=>$filesize) {
							$metakey = $filetype . $filesize . 'dllink';
							$afiledllink = get_post_custom_values($metakey,$post->ID);
							$dltext .= '<a href="' . $afiledllink[0] . '" title="Download '.get_the_title().'" ><u>' . $filesize . '</u></a>';
							$i++;
							if ($i == $count) {
								$dltext .= ' ] ';
							} else {
								$dltext .= ' | ';
							}
						}
					}
				} else {
					$asize = get_post_custom_values('asize',$post->ID);
					$dltext .= $asize[0] . ': [ ';
					$adllink = get_post_custom_values('dllink',$post->ID);
					$i = 0;
					$count = count($adllink);
					if ($count > 0) {
						foreach ($adllink as $key=>$dllink) {
							$i++;
							$dltext .= '<a href="' . $dllink . '" title="Download '.get_the_title().'" ><u>Mirror' . $i . '</u></a>';
							if ($i == $count) {
								$dltext .= ' ] ';
							} else {
								$dltext .= ' | ';
							}
						}
					}
				}
				?>
				<table border="0" width="590" cellpadding="0" style="border-collapse: collapse" bordercolor="#FFFFFF" bgcolor="#171717">
					<tr>
						<!--td width="434">&#9658;&nbsp;<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></td--!>
						<td width="434">&#9658;&nbsp;<?php the_title(); ?><div class="alignright"><?php echo $dltext; ?></div></td>
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