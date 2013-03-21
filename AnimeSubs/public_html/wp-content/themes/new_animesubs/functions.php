<?php
/*******************************
 THEME SETTING SUPPORT
********************************/
$settings_prefix = "animesubs_settings_";
$settings_fields = array(
    array(
        'type' => 'start'
    ),
    array(
        'type' => 'icon'
    ),
    array(
        'type' => 'title',
        'value' => 'AnimeSubs Setting'
    ),
    array(
        'type' => 'form-start'
    ),
    array(
        'type' => 'section-start',
        'heading' => 'Home Page Section'
    ),
    array(
        'type' => 'text',
        'name' => $settings_prefix . 'category_count',
        'label' => 'Category Count',
        'description' => 'Number of category to be dispalyed on Home page',
        'std' => 20
    ),
    array(
        'type' => 'text',
        'name' => $settings_prefix . 'episode_count',
        'label' => 'Episode Count',
        'description' => 'Number of episodes to be dispalyed on Home page',
        'std' => 20
    ),
    array(
        'type' => 'checkbox',
        'name' => $settings_prefix . 'news_section',
        'label' => 'News Section',
        'description' => 'Visible on Home page',
        'std' => 'News'
    ),
    array(
        'type' => 'text',
        'name' => $settings_prefix . 'news_cat_id',
        'label' => 'News Category ID',
        'description' => 'Input News categoty id',
        'std' => null
    ),
    array(
        'type' => 'text',
        'name' => $settings_prefix . 'excluded_cat_id',
        'label' => 'Excluded Category ID',
        'description' => 'Excluded catagory IDs. Please add minus (-) sign before the id',
        'std' => '-1,-2'
    ),
    array(
        'type' => 'text',
        'name' => $settings_prefix . 'ongoing_cat_id',
        'label' => 'Ongoing Anime Category ID',
        'description' => 'Ongoing anime category ids',
        'std' => null
    ),
    array(
        'type' => 'checkbox',
        'name' => $settings_prefix . 'slider_section',
        'label' => 'Slider Section',
        'description' => 'Visible on Home page',
        'std' => 'Slider'
    ),
    array(
        'type' => 'text',
        'name' => $settings_prefix . 'slider_cat_id',
        'label' => 'Category IDs in slider',
        'description' => 'Category IDs in slider',
        'std' => null
    ),
    array(
        'type' => 'section-end'
    ),
    array(
        'type' => 'form-end'
    ),
    array(
        'type' => 'end'
    )
);

add_action('admin_menu',$settings_prefix . 'menu');
function animesubs_settings_menu() {
    global $settings_prefix;
    add_submenu_page('options-general.php','AnimeSubs Settings','AnimeSubs Settings','edit_posts','animesubs-settings',$settings_prefix . 'render_fields');
    add_action('admin_init',$settings_prefix . 'register');
}

function animesubs_settings_register() {
    global $settings_fields,$settings_prefix;
    foreach ( $settings_fields as $field ) {
        if ( isset($field['name']) ) {
            register_setting($settings_prefix . 'group',$field['name']);
        }
    }
}

function animesubs_settings_render_fields() {
    global $settings_fields,$settings_prefix;
    foreach ( $settings_fields as $field ) {
        switch( $field['type'] ) {
            case 'start':?>
<div class="wrap">
<!-- .wrap --><?php
                break;
            case 'icon':?>
            <div id="icon-options-general" class="icon32"><br /></div>
<?php
                break;
            case 'title':?>
<h2><?php echo $field['value']; ?></h2>
<?php
                break;
            case 'form-start':?>
<form action="options.php" method="post">
                <?php
                settings_fields($settings_prefix . 'group');
                do_settings_sections($settings_prefix . 'group');
                break;
            case 'section-start':?>
<h3><?php echo $field['heading']; ?></h3>
<table class="form-table">
<?php
                break;
            case 'text':?>
                        <?php $for = $field['name']; ?>
                        <tr valign="top"><th scope="row"><label for="<?php echo $for; ?>"><?php echo $field['label']; ?></label></th>
<td><input id="<?php echo $field['name']; ?>" class="regular-text" name="<?php echo $field['name']; ?>" type="text" value="<?php if ( $opt = get_option($field['name']) ) { echo $opt; } else { echo $field['std']; } ?>">
                        <?php if ( isset($field['description']) ): ?>
                        <span class="description"><?php echo $field['description']; ?></span></td></tr>
                        <?php endif; ?>
<?php
                break;
            case 'checkbox':?>
                        <?php $for = $field['name']; ?>
                        <tr valign="top"><th scope="row"><label for="<?php echo $for; ?>"><?php echo $field['label']; ?></label></th>
<td><input id="<?php echo $field['name']; ?>" name="<?php echo $field['name']; ?>" type="checkbox" value=<?php echo $field['std']; ?> <?php checked( $field['std'], get_option( $field['name'] ), true ); ?> >
                        <?php if ( isset($field['description']) ): ?>
                        <span class="description"><?php echo $field['description']; ?></span></td></tr>
                        <?php endif; ?>
<?php
                break;
            case 'section-end':?>

<?php
                break;
            case 'form-end':?>
</table>
<p class="submit"><input class="button-primary" type="submit" value="Save Changes"></p>
</form>
<?php
                break;
            case 'section-end':?>

</div>
<?php
        }
    }
}?>

<?php
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
