<?php

$listings = array();

{
	$q = 'select * from hl_listings where user_id=\''.$user_info['user_id'].'\'';
	$sth = mysql_query ($q) or die(mysql_error());

	while($listing = mysql_fetch_array ($sth))
	{
		array_push($listings,$listing);
	}

	$smarty->assign('listings',$listings);
}
$smarty->display('myhyips.tpl');
?>
