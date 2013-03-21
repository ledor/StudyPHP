<?php
/*
Template Name: Category List
*/
?>
<?php
	get_header();
?>
			<div class="multicolumn">
				<div align="center"><b><font size="3">If you are missing your favorite anime, please contact one of our staff 
					<a href="/contact">here</a>. </font></b></div>
				<div align="center"><b><font size="3">We will try to find you the series for you.</font></b></div>
				<p>&nbsp;</p>
<?php
	$all_cat = wp_list_categories('echo=0&exclude=1,76&title_li=&hide_empty=0&use_desc_for_title=0');
	$cat_arr = explode('</li>',$all_cat);
	$cat_count = count($cat_arr);
	$cat_per_column = round($cat_count/2);
	$column_no = 1;
	$cat_no = 1;
	echo
'				<ul class="cat_col" id="cat-col-'.$column_no.'">
';
	
	foreach ($cat_arr as $cat) {
		echo
'					'.$cat.'</li>
';
		$column_no++;
		if ($column_no > $cat_per_column) {
			$column_no = 1;
			$cat_per_column++;
			echo
'				</ul>
				<ul class="cat_col" id="cat-col-'.$column_no.'">
';
		}
	}
	echo
'				</ul>
';
?>
			</div>
		</div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>