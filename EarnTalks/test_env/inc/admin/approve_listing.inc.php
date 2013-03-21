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


  $frm['gid'] = intval ($frm['gid']);
  $frm['lid'] = intval ($frm['lid']);
  $q = 'select *, date_format(date_added, \'%b %D, %Y\') as fdate_added from hl_listings where status = 2 and id = ' . $frm['lid'];
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $row = mysql_fetch_array ($sth);
  if (!$row)
  {
    print 'Invalid listing id';
    exit ();
  }

  $group = array ();
  $q = 'select * from hl_groups';
  if (!($gsth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $groups = array ();
  while ($grow = mysql_fetch_array ($gsth))
  {
    if ($grow['id'] == $row['group_id'])
    {
      $group = $grow;
    }

    array_push ($groups, $grow);
  }

  echo '<form method=post name="approve_form">
<input type="hidden" name="a" value="approve_listing">
<input type="hidden" name="action" value="save">
<input type="hidden" name="lid" value="';
  echo $frm['lid'];
  echo '">
<input type="hidden" name="gid" value="';
  echo $frm['gid'];
  echo '">
<input type="hidden" name="p" value="';
  echo $frm['p'];
  echo '">
<input type="hidden" name="return" value="';
  echo $frm['return'];
  echo '">
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <td width=30%>Name:</td><td><input type="text" name="name" value="';
  echo htmlspecialchars ($row['name']);
  echo '" class=inpts size=50></td>
</tr>
<tr>
 <td>Group:</td>
 <td>
  ';
  echo '<s';
  echo 'elect name="group_id" class=inpts>
';
  foreach ($groups as $tgroup)
  {
    echo '    <option value="';
    echo $tgroup['id'];
    echo '" ';
    echo ($tgroup['id'] == $row['group_id'] ? 'selected' : '');
    echo '>';
    echo htmlspecialchars ($tgroup['name']);
    echo '</option>
';
  }

  echo '  </select>
 </td>
</tr>
<tr>
 <td>Rating:</td>
 <td>
   ';
  echo '<s';
  echo 'elect name="rating" class=inpts>
';
  for ($i = 0; $i <= 5; ++$i)
  {
    echo '     <option value=';
    echo $i;
    echo ' ';
    echo ($i == $row['rating'] ? 'selected' : '');
    echo '>';
    echo $i;
    echo '</option>
';
  }

  echo '   </select>
 </td>
</tr>
<tr>
 <td>Status:</td>
  <td>
   ';
  echo '<s';
  echo 'elect name="status" class=inpts>
     <option value=0>Off</option>
     <option value=1 selected>On</option>
     <option value=2>Not Approved</option>
   </select>
  </td>
</tr>
<tr>
 <td>Paying Status:</td>
  <td>
   ';
  echo '<s';
  echo 'elect name="hyip_status" class=inpts>
     <option value=1 ';
  echo ($row['hyip_status'] == 1 ? 'selected' : '');
  echo '>Paying</option>
     <option value=2 ';
  echo ($row['hyip_status'] == 2 ? 'selected' : '');
  echo '>Waiting</option>
     <option value=3 ';
  echo ($row['hyip_status'] == 3 ? 'selected' : '');
  echo '>Problem</option>
     <option value=4 ';
  echo ($row['hyip_status'] == 4 ? 'selected' : '');
  echo '>Not Paying</option>
   </select>
  </td>
</tr>
<tr>
 <td>URL:</td><td><input type="text" name="url" value="';
  echo htmlspecialchars ($row['url']);
  echo '" class=inpts size=50></td>
</tr>
<tr>
 <td>Percents:</td><td><input type="text" name="percents" value="';
  echo htmlspecialchars ($row['percents']);
  echo '" class=inpts size=50></td>
</tr>
<tr>
 <td>Minimal Spend:</td><td><input type="text" name="min_spend" value="';
  echo htmlspecialchars ($row['min_spend']);
  echo '" class=inpts size=50></td>
</tr>
<tr>
 <td>Maximal Spend:</td><td><input type="text" name="max_spend" value="';
  echo htmlspecialchars ($row['max_spend']);
  echo '" class=inpts size=50></td>
</tr>
<tr>
 <td>Referral:</td><td><input type="text" name="referral" value="';
  echo htmlspecialchars ($row['referral']);
  echo '" class=inpts size=50></td>
</tr>
<tr>
 <td>Withdrawal:</td>
 <td>
   ';
  echo '<s';
  echo 'elect name="withdrawal_type" class=inpts>
     <option value=1 ';
  echo ($row['withdrawal_type'] == 1 ? 'selected' : '');
  echo '>Manual</option>
     <option value=2 ';
  echo ($row['withdrawal_type'] == 2 ? 'selected' : '');
  echo '>Instant</option>
     <option value=3 ';
  echo ($row['withdrawal_type'] == 3 ? 'selected' : '');
  echo '>Automatic</option>
   </select>
 </td>
</tr>
<tr>
 <td>Contact E-mail:</td><td><input type="text" name="email" value="';
  echo htmlspecialchars ($row['email']);
  echo '" class=inpts size=50></td>
</tr>
<tr>
 <td>Support E-mail:</td><td><input type="text" name="support_email" value="';
  echo htmlspecialchars ($row['support_email']);
  echo '" class=inpts size=50></td>
</tr>
<tr>
 <td>TG Support Forum:</td><td><input type="text" name="support_form" value="';
  echo htmlspecialchars ($row['support_form']);
  echo '" class=inpts size=50></td>
</tr>
<tr>
 <td>MMG Support Forum:</td><td><input type="text" name="support_forum" value="';
  echo htmlspecialchars ($row['support_forum']);
  echo '" class=inpts size=50></td>
</tr>
<tr>
 <td>DTM Support Forum:</td><td><input type="text" name="support_aim" value="';
  echo htmlspecialchars ($row['support_aim']);
  echo '" class=inpts size=50></td>
</tr>
<tr>
 <td>Added:</td>
';
  preg_match ('/(\\d+)-(\\d+)-(\\d+)/', $row['date_added'], $parts);
  $date = get_date_arrays ($parts[1], $parts[2], $parts[3], 5, 5);
  echo ' 
 <td>
  ';
  echo '<s';
  echo 'elect name="month" class=inpts>
';
  foreach ($date['MONTHS'] as $data)
  {
    echo '   <option value="';
    echo $data['VALUE'];
    echo '" ';
    echo ($data['SELECTED'] == 1 ? 'selected' : '');
    echo '>';
    echo $data['NAME'];
    echo '</option>
';
  }

  echo '  
  </select>
  ';
  echo '<s';
  echo 'elect name="day" class=inpts>
';
  foreach ($date['DAYS'] as $data)
  {
    echo '   <option value="';
    echo $data['VALUE'];
    echo '" ';
    echo ($data['SELECTED'] == 1 ? 'selected' : '');
    echo '>';
    echo $data['NAME'];
    echo '</option>
';
  }

  echo '  
  </select>
  ';
  echo '<s';
  echo 'elect name="year" class=inpts>
';
  foreach ($date['YEARS'] as $data)
  {
    echo '   <option value="';
    echo $data['VALUE'];
    echo '" ';
    echo ($data['SELECTED'] == 1 ? 'selected' : '');
    echo '>';
    echo $data['NAME'];
    echo '</option>
';
  }

  echo '  
  </select>
 </td>
</tr>
<tr>
 <td>Expires After:</td><td><input type="text" name="expiration" value="';
  echo htmlspecialchars ($row['expiration']);
  echo '" class=inpts size=10> days (enter \'0\' to skip limitation)</td>
</tr>
<tr>
 <td>Closed:</td>
';
  preg_match ('/(\\d+)-(\\d+)-(\\d+)/', $row['date_closed'], $parts);
  if (($parts[1] != 0 AND $parts[1] - date ('Y') < -5))
  {
    $prev_years = date ('Y') - $parts[1] + 5;
  }
  else
  {
    $prev_years = 5;
  }

  $date = get_date_arrays ($parts[1], $parts[2], $parts[3], $prev_years, 5);
  echo ' 
 <td>
  ';
  echo '<s';
  echo 'elect name="cmonth" class=inpts>
   <option value=0>-</option>
';
  foreach ($date['MONTHS'] as $data)
  {
    echo '   <option value="';
    echo $data['VALUE'];
    echo '" ';
    echo ($data['SELECTED'] == 1 ? 'selected' : '');
    echo '>';
    echo $data['NAME'];
    echo '</option>
';
  }

  echo '  
  </select>
  ';
  echo '<s';
  echo 'elect name="cday" class=inpts>
   <option value=0>-</option>
';
  foreach ($date['DAYS'] as $data)
  {
    echo '   <option value="';
    echo $data['VALUE'];
    echo '" ';
    echo ($data['SELECTED'] == 1 ? 'selected' : '');
    echo '>';
    echo $data['NAME'];
    echo '</option>
';
  }

  echo '  
  </select>
  ';
  echo '<s';
  echo 'elect name="cyear" class=inpts>
   <option value=0>-</option>
';
  foreach ($date['YEARS'] as $data)
  {
    echo '   <option value="';
    echo $data['VALUE'];
    echo '" ';
    echo ($data['SELECTED'] == 1 ? 'selected' : '');
    echo '>';
    echo $data['NAME'];
    echo '</option>
';
  }

  echo '  
  </select>
 </td>
</tr>
<tr>
  <td valign=top>Payment Systems:</td>
  <td>
';
  $payments = preg_split ('/\\s*,\\s*/', $settings['payments']);
  $apayments = preg_split ('/\\s*,\\s*/', $row['pay_systems']);
  foreach ($payments as $payment)
  {
    echo '   <input type="checkbox" name="payments[';
    echo $payment;
    echo ']" value=1 ';
    echo (in_array ($payment, $apayments) ? 'checked' : '');
    echo '> ';
    echo $payment;
    echo '<br>
';
  }

  echo '  </td>
</tr>
';
  $a_accounts = preg_split ('/\\|/', $row['account']);
  $b_accounts = array ();
  for ($i = 0; $i < sizeof ($a_accounts); ++$i)
  {
    if ($a_accounts[$i] == '')
    {
      continue;
    }

    array_push ($b_accounts, $a_accounts[$i]);
  }

  $accounts = join (',', $b_accounts);
  echo '<tr>
 <td>HYIP E-currency Accounts:</td><td><input type="text" name="account" value="';
  echo htmlspecialchars ($accounts);
  echo '" class=inpts size=10></td>
</tr>
<tr>
  <td colspan=2>Default Language Description:</td>
</tr>
<tr>
  <td colspan=2><textarea name="description" cols=82 rows=5 class=inpts>';
  echo $row['description'];
  echo '</textarea></td>
</tr>
';
  echo '<tr>
  <td>Monitoring Image: </td>
';
  if (is_file ('./image.php'))
  {
    $sn = $frm_env['SCRIPT_NAME'];
    $sn = preg_replace ('/admin\\.php/', 'image.php', $sn);
    $sn .= '?lid=' . $row['id'];
  }
  else
  {
    $sn = $frm_env['SCRIPT_NAME'];
    $sn = preg_replace ('/admin\\.php/', 'index.php', $sn);
    $sn .= '?a=image&lid=' . $row['id'];
  }

  echo '  <td><a href="http://';
  echo $frm_env['HTTP_HOST'] . $sn;
  echo '" target=_blank>http://';
  echo $frm_env['HTTP_HOST'] . $sn;
  echo '</a></td>
</tr>
</table>
';
  echo '<s';
  echo 'cript>
function chng_status()
{
  var obj = document.approve_form;
  var flag = !obj.send_notification.checked;
  obj.from.disabled = flag;
  obj.to.disabled = flag;
  obj.subject.disabled = flag;
  obj.text.disabled = flag;
}
</script>
';
  $row['withdrawal_type'] = ($row['withdrawal_type'] == 1 ? 'Manual' : ($row['withdrawal_type'] == 2 ? 'Instant' : 'Automatic'));
  $row['group'] = $group['name'];
  $row['date_added'] = $row['fdate_added'];
  $q = 'select * from hl_emails where id = \'listing_approve\'';
  $sth = mysql_query ($q);
  $email = mysql_fetch_array ($sth);
  $text = $email['text'];
  $subject = $email['subject'];
  reset ($row);
  foreach ($row as $k => $v)
  {
    if (is_array ($v))
    {
      continue;
    }

    $v = strip_tags ($v);
    $v = preg_replace ('' . '/(\\$)/', '\\\\$', $v);
    $text = preg_replace ('' . '/#' . $k . '#/', '' . $v, $text);
    $subject = preg_replace ('' . '/#' . $k . '#/', '' . $v, $subject);
  }

  $text = preg_replace ('/#site_name#/', $settings['site_name'], $text);
  $subject = preg_replace ('/#site_name#/', $settings['site_name'], $subject);
  $text = preg_replace ('/#site_url#/', $settings['site_url'], $text);
  $subject = preg_replace ('/#site_url#/', $settings['site_url'], $subject);
  echo '<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <td colspan=2><input type="checkbox" name="send_notification" value="1" checked onclick="chng_status()"> Send Notification?</td>
</tr>
<tr>
 <td>From: </td><td><input type="text" name="from" value="';
  echo htmlspecialchars ($settings['admin_email']);
  echo '" class=inpts size=50></td>
</tr>
<tr>
 <td>To: </td><td><input type="text" name="to" value="';
  echo htmlspecialchars ($row['email']);
  echo '" class=inpts size=50></td>
</tr>
<tr>
 <td>Subject: </td><td><input type="text" name="subject" value="';
  echo htmlspecialchars ($subject);
  echo '" class=inpts size=50></td>
</tr>
<tr>
  <td colspan=2>Message:</td>
</tr>
<tr>
  <td colspan=2><textarea name="text" cols=82 rows=5 class=inpts>';
  echo htmlspecialchars ($text);
  echo '</textarea></td>
</tr>
<tr>
  <td colspan="2"><input style="width: 185px; height: 24px" type="submit" value="Approve & Save Changes" class=sbmt></td>
</tr>
</table>
</form>

';
?>
