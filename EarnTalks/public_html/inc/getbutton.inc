<?php

$frm['lid'] = intval($frm['lid']);

$q = 'select * from hl_listings where id = ' . $frm['lid'];
$sth = mysql_query ($q) or die(mysql_error());
$listing = mysql_fetch_array ($sth);

$smarty->assign('listing',$listing);
$smarty->display('getbutton.tpl');

?>
