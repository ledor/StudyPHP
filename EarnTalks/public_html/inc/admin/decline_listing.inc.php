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

  $row['withdrawal_type'] = ($row['withdrawal_type'] == 1 ? 'Manual' : ($row['withdrawal_type'] == 2 ? 'Instant' : 'Automatic'));
  echo '<form method=post name="approve_form">
<input type="hidden" name="a" value="decline_listing">
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
 <td width=30%>Name:</td><td>';
  echo htmlspecialchars ($row['name']);
  echo '</td>
</tr>
<tr>
 <td>Group:</td><td>';
  echo $group['type'];
  echo '</td>
</tr>
<tr>
 <td>URL:</td><td>';
  echo htmlspecialchars ($row['url']);
  echo '</td>
</tr>
<tr>
 <td>Percents:</td><td>';
  echo htmlspecialchars ($row['percents']);
  echo '</td>
</tr>
<tr>
 <td>Minimal Spend:</td><td>';
  echo htmlspecialchars ($row['min_spend']);
  echo '</td>
</tr>
<tr>
 <td>Maximal Spend:</td><td>';
  echo htmlspecialchars ($row['max_spend']);
  echo '</td>
</tr>
<tr>
 <td>Referral:</td><td>';
  echo htmlspecialchars ($row['referral']);
  echo '</td>
</tr>
<tr>
 <td>Withdrawal:</td><td>';
  echo htmlspecialchars ($row['withdrawal_type']);
  echo '</td>
</tr>
<tr>
 <td>Contact E-mail:</td><td><a href="mailto:';
  echo htmlspecialchars ($row['email']);
  echo '">';
  echo htmlspecialchars ($row['email']);
  echo '</a></td>
</tr>
<tr>
 <td>Support E-mail:</td><td><a href="mailto:';
  echo htmlspecialchars ($row['support_email']);
  echo '">';
  echo htmlspecialchars ($row['support_email']);
  echo '</a></td>
</tr>
<tr>
 <td>TG Support Forum:</td><td><a href="';
  echo htmlspecialchars ($row['support_form']);
  echo '">';
  echo htmlspecialchars ($row['support_form']);
  echo '</a></td>
</tr>
<tr>
 <td>MMG Support Forum:</td><td><a href="';
  echo htmlspecialchars ($row['support_forum']);
  echo '">';
  echo htmlspecialchars ($row['support_forum']);
  echo '</a></td>
</tr>
<tr>
 <td>DTM Support Forum:</td><td>';
  echo htmlspecialchars ($row['support_aim']);
  echo '</td>
</tr>
<tr>
 <td>Added:</td><td>';
  echo $row['fdate_added'];
  echo '</td>
</tr>
<tr>
  <td valign=top>Payment Systems:</td><td>';
  echo $row['pay_systems'];
  echo '</td>
</tr>
<tr>
 <td>HYIP E-currency accounts:</td><td>';
  echo htmlspecialchars ($row['account']);
  echo '</td>
</tr>
<tr>
  <td colspan=2>Description:</td>
</tr>
<tr>
  <td colspan=2>';
  echo htmlspecialchars ($row['description']);
  echo '</td>
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
  $row['group'] = $group['name'];
  $row['date_added'] = $row['fdate_added'];
  $q = 'select * from hl_emails where id = \'listing_decline\'';
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
  <td colspan="2"><input style="width: 185px; height: 24px" type="submit" value="Decline & Remove Listing" class=sbmt></td>
</tr>
</table>
</form>

';
?>
