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


  function get_rand_md5 ($len)
  {

  }

  function get_listing_details ($row)
  {
    global $settings;
    global $frm_cookie;
    global $lns;
	
	$q = 'select date_format(hl_statistics.date, "%b %D,%Y") as lastpayout from hl_statistics where listing_id = ' .$row['id'] .' order by hl_statistics.date DESC LIMIT 1';
	if (!($ssth = mysql_query ($q)))
    {
      exit (mysql_error ());
    }
	 $srow = mysql_fetch_array ($ssth);
	 $row['lastpayout']=$srow['lastpayout'];
	 
	
    $q = 'select  sum(amount * type) as payout, sum(amount * !type) as spend from hl_statistics where listing_id = ' . $row['id'];
    if (!($ssth = mysql_query ($q)))
    {
      exit (mysql_error ());
    }

    $srow = mysql_fetch_array ($ssth);
    $row['ratio'] = ($srow['spend'] != 0 ? sprintf ('%.02f', $srow['payout'] / $srow['spend']) : '0.00');
    $row['spend'] = number_format ($srow['spend'], 2);
    $votes_summary = array ('0' => 0, '1' => 0, '2' => 0, '3' => 0);
    $votes_all = 0;
    $q = 'select count(*) as cvotes, vote from hl_votes where listing_id = ' . $row['id'] . ' and confirm = \'0\' group by vote';
    if (!($ssth = mysql_query ($q)))
    {
      exit (mysql_error ());
      ;
    }

    while ($srow = mysql_fetch_array ($ssth))
    {
      $votes_all += $srow['cvotes'];
      $votes_summary[$srow['vote']] = $srow['cvotes'];
    }

    if (0 < $votes_all)
    {
      $row['avg_vote'] = sprintf ('%.01f', ($votes_summary['3'] * 10 + $votes_summary['2'] * 5 + $votes_summary['1'] * 0 + $votes_summary['0'] * -5));

    }
    else
    {
      $row['avg_vote'] = '0.0';
    }

    $row['cvotes'] = $votes_all;
    $row['votes_summary'] = $votes_summary;
    $q = 'select sum(`in`) as tin, sum(`out`) as tout from hl_traffic where listing_id = ' . $row['id'] . ' and date + interval ' . $settings['traffic_count_days'] . ' day > now()';
    if (!($ssth = mysql_query ($q)))
    {
      exit (mysql_error ());
      ;
    }

    $traffic = mysql_fetch_array ($ssth);
    $row['in'] = intval ($traffic['tin']);
    $row['out'] = intval ($traffic['tout']);
    $row['traffic_ratio'] = ($traffic['tout'] == 0 ? '0.0' : sprintf ('%.01f', $traffic['tin'] / $traffic['tout']));
    $rates = array ();
    for ($i = 1; $i <= 5; ++$i)
    {
      $rate = array ();
      $rate['star'] = ($i <= $row['rating'] ? 1 : 0);
      array_push ($rates, $rate);
    }

    $row['rates'] = $rates;
    $payments = preg_split ('/,/', $row['pay_systems']);
    $payments_hash = array ();
    foreach ($payments as $pay)
    {
      if ($pay == '')
      {
        continue;
      }

      $tmp = array ();
      $tmp['system'] = $pay;
      array_push ($payments_hash, $tmp);
    }

    $row['payments'] = $payments_hash;
    return $row;
  }

  function get_date_arrays ($year, $month, $day, $years_after, $years_before)
  {
    $monthes = array (1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
    $year = ($year == '' ? intval (date ('Y')) : $year);
    $year_from = ($year != 0 ? $year - $years_before : intval (date ('Y')) - $years_before);
    $year_to = ($year != 0 ? $year + $years_after : intval (date ('Y')) + $years_after);
    $month = ($month == '' ? intval (date ('n')) : $month);
    $day = ($day == '' ? intval (date ('j')) : $day);
    $days = array ();
    for ($i = 1; $i <= 31; ++$i)
    {
      array_push ($days, array ('NAME' => $i, 'VALUE' => $i, 'SELECTED' => ($i == $day ? 1 : 0)));
    }

    $months = array ();
    for ($i = 1; $i <= 12; ++$i)
    {
      array_push ($months, array ('NAME' => $monthes['' . $i], 'VALUE' => $i, 'SELECTED' => ($i == $month ? 1 : 0)));
    }

    $years = array ();
    for ($i = $year_from; $i <= $year_to; ++$i)
    {
      array_push ($years, array ('NAME' => $i, 'VALUE' => $i, 'SELECTED' => ($i == $year ? 1 : 0)));
    }

    $return = array ('YEARS' => $years, 'MONTHS' => $months, 'DAYS' => $days);
    return $return;
  }

//  function send_string_to_gold_coders ()
//  {
//
//  }
//
//  function send_string_to_gold_coders_install ()
//  {
//
//  }

  function send_mail ($email_id, $to, $from, $info)
  {
    global $settings;
    $q = '' . 'select * from hl_emails where id = \'' . $email_id . '\'';
    $sth = mysql_query ($q);
    $row = mysql_fetch_array ($sth);
    if (!$row)
    {
      return null;
    }

    $text = $row['text'];
    $subject = $row['subject'];
    reset ($info);
    foreach ($info as $k => $v)
    {
      if (is_array ($v))
      {
        continue;
      }

      $v = preg_replace ('' . '/(\\$)/', '\\\\$', $v);
      $text = preg_replace ('' . '/#' . $k . '#/', '' . $v, $text);
      $subject = preg_replace ('' . '/#' . $k . '#/', '' . $v, $subject);
    }

    $text = preg_replace ('/#site_name#/', $settings['site_name'], $text);
    $subject = preg_replace ('/#site_name#/', $settings['site_name'], $subject);
    $text = preg_replace ('/#site_url#/', $settings['site_url'], $text);
    $subject = preg_replace ('/#site_url#/', $settings['site_url'], $subject);
    mail ($to, $subject, $text, '' . 'From: ' . $from . '
Reply-To: ' . $from);
  }

  function start_info_table ($size)
  {
    return '' . '
<table cellspacing=0 cellpadding=1 border=0 width=' . $size . ' bgcolor=#fff3cb>
<tr><td bgcolor=#fff3cb>
<table cellspacing=0 cellpadding=0 border=0 width=100%>
<tr>
<td valign=top width=10 bgcolor=#FFFFF2><img src=images/sign.gif></td>
<td valign=top bgcolor=#FFFFF2 style=\'padding: 10px; color: #D20202; font-family: verdana; font-size: 11px;\'>
';
  }

  function end_info_table ()
  {
    return '</td></tr></table></td></tr></table>';
  }

  function get_settings ()
  {
    $s = array ();
    $file = fopen ('./settings.php', 'r');
    if ($file)
    {
      while ($buf = fgets ($file, 20000))
      {
        $buf = chop ($buf);
        if (($buf != '<?/*' AND $buf != '*/?>'))
        {
          list ($kk, $vv) = split ('	', $buf, 2);
          $s[$kk] = $vv;
          continue;
        }
      }
    }

    fclose ($file);
    return $s;
  }

  function save_settings ()
  {
    global $settings;
    $s = array ();
    $file = fopen ('./settings.php', 'r');
    if ($file)
    {
      while ($buf = fgets ($file, 20000))
      {
        $buf = chop ($buf);
        if (($buf != '<?/*' AND $buf != '*/?>'))
        {
          list ($kk, $vv) = split ('	', $buf, 2);
          $s[$kk] = $vv;
          continue;
        }
      }
    }

    fclose ($file);
    $file = fopen ('./settings.php', 'w');
    reset ($settings);
    fputs ($file, '<?/*
');
    while (list ($kk, $vv) = each ($settings))
    {
      if ($kk != 'logged')
      {
        if (!preg_match ('/_generated/', $kk))
        {
          fputs ($file, (('' . $kk . '	') . $vv . '
'));
          continue;
        }

        continue;
      }
    }

    fputs ($file, '*/?>
');
    fclose ($file);
  }

  function db_open ()
  {
    global $settings;
    if (!($dbconn = mysql_connect ($settings['hostname'], $settings['db_login'], $settings['db_pass'])))
    {
      exit (mysql_error ());
      ;
    }

    if (!(mysql_select_db ($settings['database'])))
    {
      exit (mysql_error ());
      ;
    }

    return $dbconn;
  }

  function db_close ($dbconn)
  {
    mysql_close ($dbconn);
  }

  function quote ($str)
  {
    $str = str_replace ('\'', '\'\'', $str);
    $str = str_replace ('\\', '\\\\', $str);
    return $str;
  }

  function gen_confirm_code ($len, $md = 1)
  {
    $a = array ('1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    $i = 0;
    $str = '';
    for ($i = 0; $i < $len; ++$i)
    {
      $str .= $a[rand (0, sizeof ($a) - 1)];
    }

    if ($md)
    {
      $str = md5 ($str);
    }

    return $str;
  }

 global  $_GET;
  global $_POST;
  global $HTTP_POST_FILES;
  global $_COOKIE;
  $get =  $_GET;
  $post = $_POST;
  $frm = array_merge ((array)$get,(array)$post);
  $frm_cookie = $_COOKIE;
  $frm_orig = $frm;
  $gpc = ini_get ('magic_quotes_gpc');

  reset ($frm);
  while (list ($kk, $vv) = each ($frm))
  {
    if (is_array ($vv))
    {
    }
    else
    {
      if ($gpc == '1')
      {
        $vv = str_replace ('\\\'', '\'', $vv);
        $vv = str_replace ('\\"', '"', $vv);
        $vv = str_replace ('\\\\', '\\', $vv);
      }

      $vv = trim ($vv);
      $vv_orig = $vv;
      $vv = strip_tags ($vv);
    }

    $frm[$kk] = $vv;
    $frm_orig[$kk] = $vv_orig;
  }

  $gpc = ini_get ('magic_quotes_gpc');
  reset ($frm_cookie);
  while (list ($kk, $vv) = each ($frm_cookie))
  {
    if (is_array ($vv))
    {
    }
    else
    {
      if ($gpc == '1')
      {
        $vv = str_replace ('\\\'', '\'', $vv);
        $vv = str_replace ('\\"', '"', $vv);
        $vv = str_replace ('\\\\', '\\', $vv);
      }

      $vv = trim ($vv);
      $vv = strip_tags ($vv);
    }

    $frm_cookie[$kk] = $vv;
  }

  global $HTTP_ENV_VARS;
  global $HTTP_SERVER_VARS;
  $frm_env = array_merge ($_ENV, $_SERVER, $HTTP_ENV_VARS, $HTTP_SERVER_VARS);
  $referer = $frm_env['HTTP_REFERER'];
  $host = $frm_env['HTTP_HOST'];
  if (!ereg ('' . '\\/\\/' . $host, $referer))
  {
    setcookie ('CameFrom', $referer, time () + 630720000);
  }

  $settings = get_settings ();
  if (get_current_user () != 'ddxh7jgjka')
  {
    $settings['demomode'] = 0;
  }

  $lns = array ();
  $lns = split (',', $settings['languages']);
  for ($i = 0; $i < sizeof ($lns); ++$i)
  {
    $lns[$i] = substr ($lns[$i], 0, 2);
    $lns[$i] = strtolower ($lns[$i]);
  }

?>
