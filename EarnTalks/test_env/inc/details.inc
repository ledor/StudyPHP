<?
/***********************************************************************/
/*                                                                     */
/*  This file is created by deZender                                   */
/*                                                                     */
/*  deZender (Decoder for Zend Encoder/SafeGuard):                     */
/*    Version:      0.9.3.0                                            */
/*    Author:       qinvent.com                                        */
/*    Release on:   2005.11.12                                         */
/*                                                                     */
/***********************************************************************/


  $frm['lid'] = intval ($frm['lid']);
  $q = 'select
               *,
               date_format(date_added, \'%b %D, %Y\') as added,
               date_format(date_closed, \'%b %D, %Y\') as closed,
               (to_days(now()) - to_days(date_added)) as monitored,
               (date_added + interval ' . $settings['new_for_days'] . ' day > current_date) as new
        from
               hl_listings
        where
               id = ' . $frm['lid'] . ' and
               (expiration = 0 || date_added + interval expiration day >= current_date) and
               status = 1
               ';
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $listing = mysql_fetch_array ($sth);
  if (!$listing)
  {
    header ('Location: ' . $settings['site_url']);
    exit ();
  }

  $q = 'select * from hl_groups where id = ' . $listing['group_id'];
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $group = mysql_fetch_array ($sth);
  $votes = array ();
  $q = 'select *, date_format(date, \'%b %D, %Y %I:%i %p\') as fdate from hl_votes where listing_id = ' . $frm['lid'] . ' and confirm = \'0\' order by date desc limit 0, 100';
  if (!($ssth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  while ($srow = mysql_fetch_array ($ssth))
  {
    preg_match ('/^(\\d+\\.\\d+\\.\\d+).*/', $srow['ip'], $ip);
    $srow['ip'] = $ip[1] . '.xxx';
    preg_match ('/^[^\\@]*\\@(.*)$/', $srow['email'], $email);
    $srow['email'] = 'xxxxx@' . $email[1];
    array_push ($votes, $srow);
  }

  /*if(isset($frm['view']) && $frm['view'] == 'stat')
  {  	include 'inc/viewstatistics.inc';  }*/

  $q = 'insert into hl_in_log set listing_id=\''.$frm['lid'].'\', date=now(), ip=\''.$_SERVER['REMOTE_ADDR'].'\'';
  $sth = mysql_query($q) or die(mysql_error());

  $listing = get_listing_details ($listing);
  $smarty->assign ('listing', $listing);
  $smarty->assign ('group', $group);
  $smarty->assign ('votes', $votes);
  $smarty->assign ('votes_summary', $votes_summary);
  $smarty->assign ('detailed', 1);
  $smarty->display ('details.tpl');
?>
