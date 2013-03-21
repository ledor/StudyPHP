<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php
	if (is_category() || is_single() ) {
		$title = 'Download ';
		$title = $title . wp_title( '' ,  false );
		if (is_category () ) {
			$title = $title . ' Episodes | ';
		} else {
			$title = $title .  ' | ';
		}
		$title = $title . get_bloginfo( 'name', false );
	}
	else {
		$title = wp_title( '|', false, 'right' );
		$title = $title . get_bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = $title . ' | ' . $site_description;
	}
?>
<title><?php echo $title; ?></title>
<meta name="description" content="<?php echo get_bloginfo( 'description', false ); ?>" />
<meta name="keywords" content="<?php echo get_bloginfo( 'name', false ) . ', ' . get_bloginfo( 'description', false ); ?>" />
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	wp_head();
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js" type="text/javascript"></script>
</head>
<body>
<div id="page">
	<div id="header">
		<div id="headerimg">
		</div>
		<?php primarymenu(); ?>
		<ul id="top-search">
			<li> 
				<form method="get" id="searchwrap" action="<?php bloginfo('siteurl'); ?>"> 
				<input type="text" value="Search Anime Here"  name="s" id="s"  onblur="if (this.value == '') {this.value = 'Search Anime Here';}"  onfocus="if (this.value == 'Search Anime Here')  {this.value = '';}" />
				<input type="hidden" id="searchsubmit" />
				</form>
			</li>
		</ul>
	</div>
	<?php if (is_home()) { ?>
	<div class="topad">
		<div id="featuredtop">
			<div class="mh2" style="witdh:100%;">Featured Anime<span class="right"><div class="next_button"></div></span><span class="right"><div class="previous_button"></div></span></div>
			<div class="container" align="center">
					<ul>
<?php
	$categories=get_categories(array('exclude' => 1,'orderby' => 'id', 'order' => 'DESC', 'hide_empty' => 1));
	$count = 1;
	foreach($categories as $category) {
		list($featured, $recommend, $ongoing, $genre, $director, $studio, $tvnetwork, $description, $plot) = explode("[nxt]", $category->description);
		if ($featured== "Featured") {
			$cat_name = substr($category->name, 0, 22);
			echo
'						<li class="car">
							<div class="thumb"><a href="' . get_category_link( $category->term_id ) . '" title="Watch or Download Episodes of '. $category->name . '"><img src="/images/' . $category->cat_ID . '-135x190.jpg" witdh="135px" height="190px"></img></a></div>
							<div class="info"><a href="' . get_category_link( $category->term_id ) . '">' . $cat_name . '</a></div>
						</li>
';
		}
	}
?>
					</ul>
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					$("#featuredtop .container").jCarouselLite({
						btnNext: ".next_button",
						btnPrev: ".previous_button",
						auto:5000,
						scroll: 1,
						speed: 500,
						visible: 7,
						start: 0
					})
				});
			</script>
		</div>
		<script src="<?php echo get_template_directory_uri(); ?>/js/jcarousellite_1.0.1.js" type="text/javascript"></script>
	</div>
	<?php } ?>
	<div id="wrapper">
	<?php get_sidebar ('left'); ?>
		<div id="content">
