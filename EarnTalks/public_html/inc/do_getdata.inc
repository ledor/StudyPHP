<?

$frm['lid'] = intval ($frm['lid']);
if ($frm['lid'] == '')
{
print 'Wrong listing ID!';
exit;
}

  $q = 'select * from hl_listings where id = '.$frm['lid'];
  if (!($sth = mysql_query ($q)))
  {
    exit;
  }

  $listing = mysql_fetch_array ($sth);
  if (!$listing)
  {
    exit;
  }


if ($frm['do'])
{
if ($frm['do'] == 'whois') {
   $domain = $listing['url'];
   $domain = preg_replace('~^(?:https?://)?(?:www\.)?~', '', $domain);
   $domain = preg_replace('~[\\/\\\\\?].*$~', '', $domain);
   $domain = preg_replace('/[^\\w\\d\\.\\-\\/]+/', '', $domain);


 function getUrlContent($postfields,$api_url)
 {  
  if( !extension_loaded('curl') ){die('You need to load/activate the cURL extension (http://www.php.net/cURL).'); }

  $ch = curl_init(); 
  curl_setopt($ch, CURLOPT_URL, $api_url); // set the url to fetch
  curl_setopt($ch, CURLOPT_HEADER, 0); // set headers (0 = no headers in result)
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // type of transfer (1 = to string)
  curl_setopt($ch, CURLOPT_TIMEOUT, 10); // time to wait in seconds
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);  
  $useragent="Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1";
  curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
  $content = curl_exec($ch); // make the call  
  curl_close($ch);  
  return $content;
 } 

$postfields= null; 
$postfields["noneed"] = "";
$queryurl= 'http://www.whois.net/whois/'.$domain;

$results= getUrlContent($postfields, $queryurl);
$whois_data = $results;

//$regexp = '#<table(?:.*?)>(.*?)</table>#';
//preg_match_all($regexp, $results, $matches, PREG_SET_ORDER);
//$count = count($matches);
//foreach($matches as $match) {
//	$whois_data = $whois_data . $match[0];
//	if (preg_match("/WHOIS information for/i", $match)) {
//	    $whois_data = $match;
//	    break;
//	} else {
//	    $whois_data = "Can not get whois information.";
//	}
//}



/*
$getserver = 'http://www.whois.net/whois/'.$domain;
$fp = @fopen ($getserver, 'r');
if(!$fp) { die("some error now, please try again later!"); }
   while ($buf = fgets($fp,1024))
   {
   if (ereg('Whois Server:', $buf)) 
     { 
       $whoisserver = trim(str_replace('Whois Server: ', '', $buf)); 
     } 
   }
   fclose($fp);

$sock = fsockopen($whoisserver, 43, $errno, $errstr, 30);
if (!$sock) { die("$errno: $errstr"); }
else 
 {
   fputs($sock, $domain."\r\n");
   while (!feof($sock)) 
    {
      $lines .= fgets($sock, 1024);
    }
   fclose($sock);
 }
  $lines = str_replace("\n",'<br>',$lines);
  $whois_data = array();
  array_push($whois_data,$lines);
*/
  $smarty->assign('whois_data',$whois_data);
  $smarty->display ('whois.tpl');
  exit;
}

elseif ($frm['do'] == 'traffic') {

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
exit;
}

elseif ($frm['do'] == 'paystat') {

  $q = 'select *, date_format(date, \'%b %D, %Y\') as fdate from hl_statistics where listing_id = ' . $frm['lid'] . ' order by date';
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
  }

  $stats = array ();
  $payouts = 0;
  $countall = 0;
  while ($row = mysql_fetch_array ($sth))
  {
    ++$countall;
    if ($row['type'] == 1)
    {
      $profit += $row['amount'];
      ++$payouts;
    }

    if ($row['type'] == 0)
    {
      $spend += $row['amount'];
    }

    $row['amount'] = number_format ($row['amount'], 2);
    array_push ($stats, $row);
  }

  $smarty->assign ('stats', $stats);
  if ($spend != 0)
  {
    $ratio = sprintf ('%.02f', $profit / $spend);
  }
  else
  {
    $ratio = sprintf ('%.02f', 0);
  }

  $smarty->assign ('listing', $listing);
  $smarty->assign ('ratio', $ratio);
  $smarty->assign ('countall', $countall);
  $smarty->assign ('payouts', $payouts);
  $smarty->display ('view_statistics.tpl');
  exit;
}

elseif ($frm['do'] == 'votes') {

  $votes = array ();
  $q = 'select *, date_format(date, \'%b %D, %Y %I:%i %p\') as fdate from hl_votes where listing_id = ' . $frm['lid'] . ' and confirm = \'0\' order by date desc limit 0, 100';
  if (!($ssth = mysql_query ($q)))
  {
    exit (mysql_error ());
  }

  while ($srow = mysql_fetch_array ($ssth))
  {
      if (preg_match ("/255.255.255.255/i", $srow['ip']))
    {
       $srow['ip'] ='Admin Voted';  
       $srow['email'] = ''; 
    }
   else 
   {
    preg_match ('/^(\\d+\\.\\d+\\.\\d+).*/', $srow['ip'], $ip);
    $srow['ip'] = $ip[1] . '.xxx';
    preg_match ('/^[^\\@]*\\@(.*)$/', $srow['email'], $email);
    $srow['email'] = 'xxxxx@' . $email[1];
   }
    array_push ($votes, $srow);
  }

  $listing = get_listing_details ($listing);
  $smarty->assign ('listing', $listing);
  $smarty->assign ('votes', $votes);
  $smarty->assign ('votes_summary', $votes_summary);
  $smarty->display ('view_votes.tpl');
  exit;
}

elseif ($frm['do'] == 'button') {
  $smarty->assign ('listing', $listing);
  $smarty->display ('button.tpl');
  exit;
}
else {
print 'Unknow Error!';
exit;
 }
}
else {
header ('Location: ?a=home');
exit;
}
?>