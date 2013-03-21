<?

$q = 'select count(*) as cnt from hl_in_log where listing_id=\''.$frm['lid'].'\' and date + interval 7 day >= current_date';
$sth = mysql_query($q) or die(mysql_error());
$row = mysql_fetch_array($sth);
$views = ($row['cnt']) ? $row['cnt'] : 0;
$smarty->assign('details_views',$views);

$q = 'select sum(`in`) as s_in, sum(`out`) as s_out from hl_traffic where listing_id=\''.$frm['lid'].'\' and date + interval 7 day >= current_date';
$sth = mysql_query($q) or die(mysql_error());
$row = mysql_fetch_array($sth);
$hits_in = ($row['s_in']) ? $row['s_in'] : 0;
$hits_out = ($row['s_out']) ? $row['s_out'] : 0;
$smarty->assign('hits_in',$hits_in);
$smarty->assign('hits_out',$hits_out);

$q = 'select count(distinct ip) as c_hosts from hl_in_log where listing_id=\''.$frm['lid'].'\' and date + interval 7 day >= current_date';
$sth = mysql_query($q) or die(mysql_error());
$row = mysql_fetch_array($sth);
$hosts = ($row['c_hosts']) ? $row['c_hosts'] : 0;
$smarty->assign('hosts',$hosts);

$q = 'select count(*) as c_hits from hl_in_log where date + interval 7 day >= current_date';
$sth = mysql_query($q) or die(mysql_error());
$row = mysql_fetch_array($sth);
$hits = ($row['c_hits']) ? $row['c_hits'] : 0;
$smarty->assign('hits',$hits);

$smarty->display('traffic.tpl');

?>