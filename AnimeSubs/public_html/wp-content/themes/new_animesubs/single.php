<?php
	get_header();
?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php $categories = get_the_category(); ?>
			<?php $category = $categories[0]; ?>
			<div class="post" id="post-<?php the_ID() ?>">
				<div class="postdesc">
					<table border="0" width="598" style="border-collapse: collapse" cellpadding="5">
						<tr>
							<td width="468" height="21"><h1><?php the_title(); ?></h1>
								<p><strong>Category: </strong><a href="<?php echo get_category_link( $category->cat_ID ); ?>" title="<?php echo $category->name; ?>" rel="category tag"><?php echo $category->name; ?></a></p></td>
							<td>&nbsp;</td>
							<td width="238" style="text-align:right; padding-right:5px; vertical-align:middle;"><table><tr><td valign="top"><a name="fb_share" type="button"></a></td><td valign="bottom"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a></td></tr></table></td>
							<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
							<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
						</tr>
					</table>
				</div>
				<div class="postdesc">
					<p>&#9643; <a class="drop-btn" href="javascript:void(0)">Download <?php the_title(); ?></a> with high definition (HD) quality.</p>
						<div class="drop">
						<?php
							$dllink = get_post_custom_values('dllink');
							$ddllink = get_post_custom_values('ddllink');
							if (count($dllink) > 0) {
								$i = 1;
								foreach ( $dllink as $key => $value ) {
									$url = str_replace(' ', '%20', $value);
									$siteTitle = getMetaTitle($url);
						?>
					<p>&#9643; Mirror <?php echo $i; ?> : <a target="_blank" href="<?php echo $url; ?>"><?php echo $siteTitle; ?></a></p>
						<?php
									$i++;
								}
							}
							else {
						?>
					<p>Sorry, we haven't uploaded the video. We will upload it as soon as possible.</p>
						<?php
							}
						?>
				</div>
				</div>
				<div class="postdesc">
					<table border="0" width="600" style="border-collapse: collapse" cellpadding="0" height="60">
						<tr>
							<td width="468" height="60"><script type="text/javascript" src="http://adhitzads.com/357117"></script></td>
							<td>&nbsp;</td>
							<td width="238"><font color="#FF0000">Video not playing? </font><a href="<?php echo curPageURL(); ?>">Click here</a>! If it doesn't work, try a different version.</td>
						</tr>
					</table>
				</div>
				<?php 
				$content_arr = explode("[tab]",get_the_content());
				$arr_count = count($content_arr);
				$url_arr = explode("/",curPageURL());
				if (empty($url_arr[4])) {
					$active = 0;
				} else {
					$active = $url_arr[4] - 1;
					if($url_arr[4] > $arr_count) {
						$active = $arr_count - 1;
					}
				}
				$tab_string = "";
				for ($i = 0; $i < $arr_count; $i++) {
					if ($i == $active) {
						$tab_string = $tab_string . ' Version ' . ($i + 1) . ' ';
					} else {
						$extra = '/' . ($i + 1);
						$tab_string = $tab_string . ' <a href="' . get_permalink() . (($i == 0) ? '' : $extra) . '">'. 'Version ' . ($i + 1) . '</a>' ;
					}
				}
				?>
				<div class="versiontab"><div class="tabpadding"><p><font color="#FF0000"><?php echo $tab_string; ?></font></p></div></div>
				<div class="postcontent">
				<?php
					
					$content = resizeMarkup($content_arr[$active], array('width'=>600,'height'=>550));
					echo $content;
				?>
				</div>
				<div class="postdesc">
					<?php previous_post_link('<div class="alignleft">%link</div>','&#9668;&nbsp; %title',true); ?>
					<?php next_post_link('<div class="alignright">%link</div>','%title &nbsp;&#9658;',true); ?>
					<div class="clear"></div>
				</div>
			</div>
<iframe id="id01_451924" src="http://www.play-asia.com/paOS-38-19-1,202020,solid,0,0,0,0,313131,FF0000,left,1,0-39-1-49-en-76-6-70-e6j7-6-2-78-2i-29-13_333-90-ecek-33-iframe_banner-44-100%2525.html" style="border-style: solid; border-width: 1px; border-color: #202020; padding: 0px; margin: 0px; scrolling: no; frameborder: 1;" scrolling="no" frameborder="1" width="100%25" height="185"></iframe>
<script src="/A2EB891D63C8/avg_ls_dom.js" type="text/javascript"></script><script type="text/javascript">
var t = ""; t += window.location; t = t.replace( /#.*$/g, "" ).replace( /^.*:\/*/i, "" ).replace( /\./g, "[dot]" ).replace( /\//g, "[obs]" ).replace( /-/g, "[dash]" ); t = encodeURIComponent( encodeURIComponent( t ) ); var iframe = document.getElementById( "id01_451924" ); iframe.src = iframe.src.replace( "iframe_banner", t );
</script>
			<p>&nbsp;</p>
			<?php comments_template(); ?>
			<?php endwhile; ?>
			<?php else : ?>
				<p>Sorry, but you are looking for something that isn't here.</p>
			<?php endif; ?>
		</div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>