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


  function rating_sort ($a, $b)
  {
    if ($a['hyip_status'] == $b['hyip_status'])
    {
      if ($a['rating'] == $b['rating'])
      {
        return ($a['id'] < $b['id'] ? -1 : 1);
      }

      return ($b['rating'] < $a['rating'] ? -1 : 1);
    }

    return ($a['hyip_status'] < $b['hyip_status'] ? -1 : 1);
  }

  function votes_sort ($a, $b)
  {
    if ($a['hyip_status'] == $b['hyip_status'])
    {
      if ($a['avg_vote'] == $b['avg_vote'])
      {
        return ($a['id'] < $b['id'] ? -1 : 1);
      }

      return ($b['avg_vote'] < $a['avg_vote'] ? -1 : 1);
    }

    return ($a['hyip_status'] < $b['hyip_status'] ? -1 : 1);
  }

  function pratio_sort ($a, $b)
  {
    if ($a['hyip_status'] == $b['hyip_status'])
    {
      if ($a['ratio'] == $b['ratio'])
      {
        return ($a['id'] < $b['id'] ? -1 : 1);
      }

      return ($b['ratio'] < $a['ratio'] ? -1 : 1);
    }

    return ($a['hyip_status'] < $b['hyip_status'] ? -1 : 1);
  }

  function adate_sort ($a, $b)
  {
    if ($a['hyip_status'] == $b['hyip_status'])
    {
      if ($a['adate'] == $b['adate'])
      {
        return ($a['id'] < $b['id'] ? -1 : 1);
      }

      return ($b['adate'] < $a['adate'] ? -1 : 1);
    }

    return ($a['hyip_status'] < $b['hyip_status'] ? -1 : 1);
  }

  function udate_sort ($a, $b)
  {
    if ($a['hyip_status'] == $b['hyip_status'])
    {
      if ($a['udate'] == $b['udate'])
      {
        return ($a['id'] < $b['id'] ? -1 : 1);
      }

      return ($b['udate'] < $a['udate'] ? -1 : 1);
    }

    return ($a['hyip_status'] < $b['hyip_status'] ? -1 : 1);
  }

  function cdate_sort ($a, $b)
  {
    if ($a['hyip_status'] == $b['hyip_status'])
    {
      if ($a['cdate'] == $b['cdate'])
      {
        return ($a['id'] < $b['id'] ? -1 : 1);
      }

      return ($b['cdate'] < $a['cdate'] ? -1 : 1);
    }

    return ($a['hyip_status'] < $b['hyip_status'] ? -1 : 1);
  }

  function name_sort ($a, $b)
  {
    if ($a['hyip_status'] == $b['hyip_status'])
    {
      if (strcasecmp ($a['name'], $b['name']) == 0)
      {
        return ($a['id'] < $b['id'] ? -1 : 1);
      }
      else
      {
        return strcasecmp ($a['name'], $b['name']);
      }
    }

    return ($a['hyip_status'] < $b['hyip_status'] ? -1 : 1);
  }

  function udate_traffic_in ($a, $b)
  {
    if ($a['hyip_status'] == $b['hyip_status'])
    {
      if ($a['in'] == $b['in'])
      {
        return ($a['id'] < $b['id'] ? -1 : 1);
      }

      return ($b['in'] < $a['in'] ? -1 : 1);
    }

    return ($a['hyip_status'] < $b['hyip_status'] ? -1 : 1);
  }

  function udate_traffic_out ($a, $b)
  {
    if ($a['hyip_status'] == $b['hyip_status'])
    {
      if ($a['out'] == $b['out'])
      {
        return ($a['id'] < $b['id'] ? -1 : 1);
      }

      return ($b['out'] < $a['out'] ? -1 : 1);
    }

    return ($a['hyip_status'] < $b['hyip_status'] ? -1 : 1);
  }

  function udate_traffic_ratio ($a, $b)
  {
    if ($a['hyip_status'] == $b['hyip_status'])
    {
      if ($a['traffic_ratio'] == $b['traffic_ratio'])
      {
        return ($a['id'] < $b['id'] ? -1 : 1);
      }

      return ($b['traffic_ratio'] < $a['traffic_ratio'] ? -1 : 1);
    }

    return ($a['hyip_status'] < $b['hyip_status'] ? -1 : 1);
  }

  $groups = array ();
  $frm['type'] = intval ($frm['type']);
  $type_filter = '';
  if ($frm['type'])
  {
    $q = 'select count(*) as cnt from hl_groups where status = 1 and id = ' . $frm['type'];
    ($sth = mysql_query ($q) OR print mysql_error ());
    $row = mysql_fetch_array ($sth);
    if (!$row['cnt'])
    {
      $frm['type'] = 0;
    }

    if ($frm['type'])
    {
      $type_filter = ' id = ' . $frm['type'];
    }
  }

  $payment_filter = '';
  if ($frm['pfilter'])
  {
    $payments = preg_split ('/\\s*,\\s*/', $settings['payments']);
    if (in_array ($frm['pfilter'], $payments))
    {
      $payment_filter = ' and pay_systems like \'%' . $frm['pfilter'] . '%\' ';
    }
  }

  if (!$type_filter)
  {
    $type_filter = ' onindex = 1 ';
  }

  $q = '' . 'select * from hl_groups where ' . $type_filter . ' order by id';
  $sth = mysql_query ($q);
  while ($group = mysql_fetch_array ($sth))
  {
    $listings = array ();
    $q = 'select 
                  *,
                  date_format(date_added, \'%b %D, %Y\') as added,
                  date_format(date_closed, \'%b %D, %Y\') as closed,
                  unix_timestamp(date_added) as adate,
                  unix_timestamp(date_updated) as udate,
                  unix_timestamp(date_closed) as cdate,
                  (to_days(now()) - to_days(date_added)) as monitored,
                  (date_added + interval ' . $settings['new_for_days'] . ' day > current_date) as new
           from
                  hl_listings 
           where 
                  group_id = ' . $group['id'] . ('' . '  ' . $payment_filter . ' and
                  (expiration = 0 or date_added + interval expiration day >= current_date) and
                  status = 1
           order by 
                  id');
    $lsth = mysql_query ($q);
    while ($lrow = mysql_fetch_array ($lsth))
    {
      $lrow = get_listing_details ($lrow);
      if ((($group['sort'] == 'traffic_in' OR $group['sort'] == 'traffic_ratio') AND $lrow['in'] == 0))
      {
        continue;
      }

      array_push ($listings, $lrow);
    }

    uasort ($listings, $group['sort'] . '_sort');
    $slistings = array ();
    foreach (array_keys ($listings) as $i)
    {
      array_push ($slistings, $listings[$i]);
    }

    $group['listings'] = $slistings;
    array_push ($groups, $group);
  }

  $smarty->assign ('groups', $groups);
  $smarty->display ('home.tpl');
?>
