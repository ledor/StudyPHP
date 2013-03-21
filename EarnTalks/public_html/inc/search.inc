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


  $payment_filter = '';
  if ($frm['pfilter'])
  {
    $payments = preg_split ('/\\s*,\\s*/', $settings['payments']);
    if (in_array ($frm['pfilter'], $payments))
    {
      $payment_filter = ' and pay_systems like \'%' . $frm['pfilter'] . '%\' ';
    }
  }

  $groups = array ();
  $q = 'select id from hl_groups where status = 1';
  $sth = mysql_query ($q);
  while ($row = mysql_fetch_array ($sth))
  {
    array_push ($groups, $row['id']);
  }

  $groups_where = '-1';
  if ($groups)
  {
    $groups_where = join (',', $groups);
  }

  $listings = array ();
  $q = 'select 
                hl_listings.*,
                hl_groups.type,
                date_format(date_added, \'%b %D, %Y\') as added,
                date_format(date_closed, \'%b %D, %Y\') as closed,
                (to_days(now()) - to_days(date_added)) as monitored,
                (date_added + interval ' . $settings['new_for_days'] . ('' . ' day > current_date) as new
         from
                hl_listings inner join hl_groups
                 on hl_listings.group_id = hl_groups.id
         where 
                group_id in (' . $groups_where . ') and 
                (hl_listings.name like \'%' . $frm['content'] . '%\')
                ' . $payment_filter . ' and 
                (hl_listings.expiration = 0 || date_added + interval hl_listings.expiration day >= current_date) and
                hl_listings.status = 1
         order by 
                date_added desc');

  ($lsth = mysql_query ($q) OR print mysql_error ());
  $last_date = '';
  while ($lrow = mysql_fetch_array ($lsth))
  {
    if ($last_date != $lrow['added'])
    {
      array_push ($listings, array ('data_type' => 'date', 'date' => $lrow['added']));
      $last_date = $lrow['added'];
    }

    $lrow['data_type'] = 'listing';
    $lrow = get_listing_details ($lrow);
    array_push ($listings, $lrow);
  }

  $smarty->assign ('listings', $listings);
  $smarty->display ('search.tpl');
?>
