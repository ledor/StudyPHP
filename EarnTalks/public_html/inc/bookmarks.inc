<?php

if ($userinfo['logged'] == 1)
{
if($frm['action'] == 'delete'){
 $q = 'delete from hl_bookmarks where user_id=\''.$userinfo['user_id'].'\' and listing_id=\''.$frm['lid'].'\'';

	$sth = mysql_query ($q) or die(mysql_error());
	$smarty->assign('say','deleted');
}

else if($frm['action'] == 'add')
{
	$q = 'select * from hl_bookmarks where user_id=\''.$userinfo['user_id'].'\' and listing_id=\''.$frm['lid'].'\'';
	$sth = mysql_query ($q) or die(mysql_error());
	$n = mysql_num_rows($sth);
	if($n > 0)
	{
	  $smarty->assign('say','already_added');
	}
	else
	{
		$q = 'insert into hl_bookmarks set user_id=\''.$userinfo['user_id'].'\', listing_id=\''.$frm['lid'].'\'';
		$sth = mysql_query ($q) or die(mysql_error());
		$smarty->assign('say','added');
	}

}

/*
$q = 'select l.*, g.type, b.* from hl_listings l, hl_groups g, hl_bookmarks b where b.user_id=\''.$userinfo['user_id'].'\' and l.id=b.listing_id and l.group_id = g.id';
*/

$listings = array();
$q = 'select l.*,
             date_format(l.date_added, \'%b %D, %Y\') as added,
             (to_days(now()) - to_days(l.date_added)) as monitored,
             g.type,
             b.* 
       from
             hl_listings as l left outer join hl_groups as g on g.id = l.group_id, 
             hl_bookmarks as b
      where 
             b.user_id=\''.$userinfo['user_id'].'\' and l.id=b.listing_id';
		$sth = mysql_query ($q) or die(mysql_error());

		while($listing = mysql_fetch_array ($sth))
		{
                 $listing = get_listing_details ($listing);
                 array_push($listings,$listing);
		}

		$smarty->assign('listings',$listings);
		$smarty->assign('myhyips',1);
}
                $smarty->display('bookmarks.tpl');
?>
