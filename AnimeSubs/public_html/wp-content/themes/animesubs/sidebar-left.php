		<div class="lsidebar">
			<ul>
			<h2>Ongoing Series</h2>
			<ul><li>
			<?php
				$categories=get_categories(array('exclude' => 1, 'hide_empty' => 0));
				foreach($categories as $category) {
					list($featured, $recommend, $ongoing, $genre, $director, $studio, $tvnetwork, $description, $plot) = explode("[nxt]", $category->description);
					if ($ongoing == "Ongoing") {
						echo '<li><a href="' . get_category_link( $category->cat_ID ) . '" title="Watch or Download Episodes of '.$category->name.'" >' . $category->name.'</a> </li> ';
					}
				}
			?>
			</li></ul>
			<p>&nbsp;</p>
			<?php /* Widgetized sidebar */
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('lsidebar') ) : ?><?php endif; ?>
			</ul>
		</div>
