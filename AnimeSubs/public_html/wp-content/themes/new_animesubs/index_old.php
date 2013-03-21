<?php get_header(); ?>
			<div class="post">
					<table border="0" width="600" style="border-collapse: collapse">
						<tr>
							<td>
								<h2>News & Updates</h2>
							</td>
						</tr>
					</table>
				<div align="left">
					<div class="newsupdates">
						<ul>
							<li><b><font size="2">Important - Remember to report broken links, staffs are very active <a href="http://animesubs.comoj.com/contact" title="Contact Us" >here!</font></b></li>
							<?php
							$recent_posts = wp_get_recent_posts(array('category' => 1, 'numberposts' => 4));
							foreach( $recent_posts as $post ){
							echo '<li><b><font size="2">' . $post["post_content"] .'</font></b></li>  ';
							}
							?>
							</ul>
					</div>
				</div>
			</div>
			<div class="post">
				<div align="left">
					<table border="0" width="600" style="border-collapse: collapse">
						<tr>
							<td width="384">
								<h2>Recent Release</h2>
							</td>
							<td width="210">
								<h2>Recently Added Series</h2>
							</td>
						</tr>
					</table>
				</div>
				<div align="left">
					<table border="0" width="600" style="border-collapse: collapse">
						<tr>
							<td width="384" bgcolor="#313131" valign="top">
								<ul>
								<?php
								$recent_posts = wp_get_recent_posts(array('numberposts' => 25,'category' => '-1,-76', 'post_status' => 'publish'));
								foreach( $recent_posts as $post ){
									$atype = get_post_custom_values('atype',$post["ID"]);
									$pos = strrpos("Dual Audio, Sub", $atype[0]);
									if ($pos === false) {
										$pos = strrpos("Dub", $atype[0]);
										if ($pos === false) {
											$satype = '<font color="#FF0000">' . $atype[0] . ', </font>';
										} else {
											$satype = '<font color="#0000FF">' . $atype[0] . ', </font>';
										}
									} else {
										$satype = $atype[0] . ', ';
									}
									$asize = get_post_custom_values('asize',$post["ID"]);
									$pos = strrpos("720, 480", $asize[0]);
									if ($pos === false) {
										$sasize = '<font color="#FF0000">' . $asize[0] . '</font>';
									} else {
										$sasize = $asize[0];
									}
									$dltext = '';
									$afiletype = get_post_custom_values('afiletype',$post["ID"]);
									if (is_array($afiletype)) {
										foreach ($afiletype as $key=>$filetype) {
											$dltext .= $filetype . ': [ ';
											$metakey = $filetype . 'size';
											$afilesize = get_post_custom_values($metakey,$post["ID"]);
											$i = 0;
											$count = count($afilesize);
											foreach ($afilesize as $key=>$filesize) {
												$metakey = $filetype . $filesize . 'dllink';
												$afiledllink = get_post_custom_values($metakey,$post["ID"]);
												$dltext .= '<a href="' . $afiledllink[0] . '" title="Download '.$post["post_title"].'" ><u>' . $filesize . '</u></a>';
												$i++;
												if ($i == $count) {
													$dltext .= ' ] ';
												} else {
													$dltext .= ' | ';
												}
											}
										}
									} else {
										$asize = get_post_custom_values('asize',$post["ID"]);
										$dltext .= $asize[0] . ': [ ';
										$adllink = get_post_custom_values('dllink',$post["ID"]);
										$i = 0;
										$count = count($adllink);
										if ($count > 0) {
											foreach ($adllink as $key=>$dllink) {
												$i++;
												$dltext .= '<a href="' . $dllink . '" title="Download '.$post["post_title"].'" ><u>Mirror' . $i . '</u></a>';
												if ($i == $count) {
													$dltext .= ' ] ';
												} else {
													$dltext .= ' | ';
												}
											}
										}
									}
								//echo '<li><a href="' . get_permalink($post["ID"]) . '" title="Watch or Download '.$post["post_title"].'" >' .   $post["post_title"].'</a> <font color="#00CC00">(' . $satype . $sasize . ') </font>' . $dltext . '</li> ';
								echo '<li>' .   $post["post_title"].' <div class="alignright">' . $dltext . '</div></li> ';
								}
								?>
								</ul>
							</td>
							<td width="2" bgcolor="#313131" valign="top">&nbsp;</td>
							<td width="210" bgcolor="#313131" valign="top">
								<ul>
								<?php
								$categories=get_categories(array('exclude' => '1,76', 'number' => 25, 'orderby' => 'id', 'order' => 'DESC', 'hide_empty' => 0));
								foreach($categories as $category) {
									//if ($category->count > 0) {
									echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="Watch or Download Episodes of '.$category->name.'" >' . $category->name.'</a> </li> ';
									//}
								}
								?>
								</ul>
							</td>
						</tr>
					</table>
				</div>
			</div>	
<iframe id="id01_451924" src="http://www.play-asia.com/paOS-38-19-1,202020,solid,0,0,0,0,313131,FF0000,left,1,0-39-1-49-en-76-6-70-e6j7-6-2-78-2i-29-13_333-90-ecek-33-iframe_banner-44-100%2525.html" style="border-style: solid; border-width: 1px; border-color: #202020; padding: 0px; margin: 0px; scrolling: no; frameborder: 1;" scrolling="no" frameborder="1" width="100%25" height="185"></iframe>
<script src="/A2EB891D63C8/avg_ls_dom.js" type="text/javascript"></script><script type="text/javascript">
var t = ""; t += window.location; t = t.replace( /#.*$/g, "" ).replace( /^.*:\/*/i, "" ).replace( /\./g, "[dot]" ).replace( /\//g, "[obs]" ).replace( /-/g, "[dash]" ); t = encodeURIComponent( encodeURIComponent( t ) ); var iframe = document.getElementById( "id01_451924" ); iframe.src = iframe.src.replace( "iframe_banner", t );
</script>
			<p>&nbsp;</p>
			<h2>Latest Recommended Anime</h2>
			<?php
			$categories=get_categories(array('exclude' => 1,'orderby' => 'id', 'order' => 'DESC', 'hide_empty' => 0));
			$count = 1;
			foreach($categories as $category) {
				if ($count > 20) {
					break;
				}
				list($featured, $recommend, $ongoing, $genre, $director, $studio, $tvnetwork, $description, $plot) = explode("[nxt]", $category->description);
				if ($recommend == "Recommended") {
				$cat_name = substr($category->name, 0, 22);
				echo '
			<div class="entry">
				<ul class="imagelist">
					<div align="center">
						<div class="gallery">
							<div class="picture">
								<a href="' . get_category_link( $category->term_id ) . '" title="Watch or Download Episodes of '. $category->name . '"><img src="/images/' . $category->cat_ID . '-135x190.jpg" witdh="135px"; height="190px"></img></a>
							</div>
							<div class="title"><a href="' . get_category_link( $category->term_id ) . '">' . $cat_name . '</a></div>
							<div class="clear"></div>
						</div>
					</div>
				</ul>
			</div>' ;
					$count += 1;
				}
			}
			?>
		</div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>