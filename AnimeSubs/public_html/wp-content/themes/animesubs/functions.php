<?php
/*******************************
 THEME SETTING SUPPORT
********************************/




/*******************************
 THUMBNAIL SUPPORT
********************************/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 135, 190, false );

/* Get the thumb original image full url */
function get_thumb_urlfull ($postID) {
$image_id = get_post_thumbnail_id($post);  
$image_url = wp_get_attachment_image_src($image_id,'thumbnail');  
$image_url = $image_url[0]; 
return $image_url;
}

/*******************************
 WIDGETS AREAS
********************************/

if ( function_exists('register_sidebar') ) {
register_sidebar(array(
	'name' => 'sidebar',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));
register_sidebar(array(
	'name' => 'lsidebar',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));
}

register_sidebar(array(
	'name' => 'footer',
	'before_widget' => '<div class="boxFooter">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));

/*******************************
 PAGE NAVIGATION
********************************/
function animesub_pagination() {
	global $wp_query, $wp_rewrite;

	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

	$pagination = array(
		'base' => @add_query_arg('paged','%#%'),
		'format' => '',
		'total' => $wp_query->max_num_pages,
		'current' => $current,
		'show_all' => true,
		'type' => 'plain'
		);

	if( $wp_rewrite->using_permalinks() )
		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

	if( !empty($wp_query->query_vars['s']) )
		$pagination['add_args'] = array( 's' => get_query_var( 's' ) );

	echo paginate_links( $pagination );
}

/*******************************
 GETTING TITLE OF ANY SITES
********************************/
function getMetaTitle($url){
$content = file_get_contents($url);
$pattern = "|<[\s]*title[\s]*>([^<]+)<[\s]*/[\s]*title[\s]*>|Ui";
if(preg_match($pattern, $content, $match))
return $match[1];
else
return false;
}

/*******************************
 GETTING VIDEO META FOR FACEBOOK
********************************/
function getMetaVideo($url){
	$content = file_get_contents($url);
	$pattern = "|<[\s]*meta content=[\s]*([^<]+)[\s]*/[\s]*>|Ui";
	if(preg_match_all($pattern, $content, $match)) {
		$pattern = "|<[\s]*link rel=\"video_src\" href=[\s]*([^<]+)[\s]*type=\"\" /[\s]*>|Ui";
		if(preg_match_all($pattern, $content, $match1)){
			    array_push($match[1], $match1[1][0] . ' property="og:video" ' );
		}
		return $match[1];
	}
	else
		return false;
}

/*******************************
 GETTING VIDEO LINK
********************************/
function get_swflink()
{
	global $post;
	
	$content = $post->post_content;
	$content_arr = explode('value="',$content);
	$video_link_arr = explode('"',$content_arr[1]);
	if(preg_match("/videobb/i", $video_link_arr[0])) {
		$video = explode('/',$video_link_arr[0]);
		$video_link = "http://videobb.com/watch_video.php?v=" . $video[4];
	} else {
		$video = explode('/',$video_link_arr[0]);
	    $video_link = "http://videozer.com/video/" . $video[4];
	}
	return $video_link;
}

/*******************************
 GETTING CURRENT URL
********************************/
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

/*******************************
 RESIZE VIDEO
********************************/
function resizeMarkup($markup, $dimensions)
{
    $w = $dimensions['width'];
    $h = $dimensions['height'];
     
    $patterns = array();
    $replacements = array();
    if( !empty($w) )
    {
        $patterns[] = '/width="([0-9]+)"/';
        $patterns[] = '/width:([0-9]+)/';
        $patterns[] = '/width: ([0-9]+)/';
         
        $replacements[] = 'width="'.$w.'"';
        $replacements[] = 'width:'.$w;
        $replacements[] = 'width: '.$w;
    }
     
    if( !empty($h) )
    {
        $patterns[] = '/height="([0-9]+)"/';
        $patterns[] = '/height:([0-9]+)/';
        $patterns[] = '/height: ([0-9]+)/';
         
        $replacements[] = 'height="'.$h.'"';
        $replacements[] = 'height:'.$h;
        $replacements[] = 'height: '.$h;
    }
     
    return preg_replace($patterns, $replacements, $markup);
}?>
