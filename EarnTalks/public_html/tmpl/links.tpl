<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE><?=$_SERVER['SERVER_NAME']?> Link Partners </TITLE>
<META NAME="Description" CONTENT="<?=$_SERVER['SERVER_NAME']?> link partners web sites.">
<META NAME="Keywords" CONTENT="Link Exchange, Links Partners, Instant Links, Reciprocal Links, Link Directory">

<STYLE type="text/css" media="screen">
.ll_main { font-family: Tahoma, Verdana, Arial, Sans Serif; }
.ll_srch_block { display: block; }
.ll_srch_text  { width: 200px; font-size: 10px; }
.ll_srch_button { width: 70px; font-size: 10px; }
.ll_dir_block { display: block; }
.ll_dir_table { width: 600px; font-size: 10pt; }
.ll_dir_cell { padding: 3px 3px 3px 3px; vertical-align: top; }
.ll_dir_maincat { font-weight: bold; color: #d93442; }
.ll_dir_subcat { color: #605c3d; }
.ll_links_block { display: block; }
.ll_links_table { width: 600px; font-size: 10pt; }
.ll_links_category { color: #605c3d; }
.ll_links_dir_link { color: #605c3d; }
.ll_links_title { font-weight: bold; color: #d93442; }
.ll_links_description { color: #605c3d; }
.ll_navigation { display: block; }
.ll_nav_link { font-size: 9pt; color: d93442; }
</STYLE>
</HEAD>

<BODY>

<?php
// # THE FOLLOWING BLOCK IS USED TO RETRIEVE AND DISPLAY LINK INFORMATION.
// # PLACE THIS ENTIRE BLOCK IN THE AREA YOU WANT THE DATA TO BE DISPLAYED.
// # DO NOT MODIFY ANYTHING ELSE BELOW THIS LINE!
// ----------------------------------------------
$_GET['K'] = "162173:F625YKU93P";
$_GET['S'] = $_SERVER["PHP_SELF"];

foreach ($_GET as $key => $value) {
    $value = urlencode(stripslashes($value));
    $qs .= "&$key=$value";
}

// congfigure our headers
if(intval(get_cfg_var('allow_url_fopen')) && function_exists('readfile')) {
    if(!@readfile("http://dir.linkslister.com/dir.php?".$qs)) {
        echo "Error processing request";
    }
}
elseif(intval(get_cfg_var('allow_url_fopen')) && function_exists('file')) {
    if(!($content = @file("http://dir.linkslister.com/dir.php?".$qs))) {
        echo "Error processing request";
    }
    else {
        echo @join('', $content);
    }
}
elseif(function_exists('curl_init')) {
    $ch = curl_init ("http://dir.linkslister.com/dir.php?".$qs);
    curl_setopt ($ch, CURLOPT_HEADER, 0);
    curl_exec ($ch);

    if(curl_error($ch))
        echo "Error processing request";

    curl_close ($ch);
}
else {
    echo "Your host provider has disabled all functions to handle remote pages.";
}
?>

</BODY>
</HTML>

