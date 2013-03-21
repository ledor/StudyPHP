<?

  $frm['gid'] = intval ($frm['gid']);
  $frm['lid'] = intval ($frm['lid']);
  $q = 'select * from hl_listings where id = ' . $frm['lid'];
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

  $q = 'select * from hl_groups';
  if (!($gsth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $groups = array ();
  while ($grow = mysql_fetch_array ($gsth))
  {
    array_push ($groups, $grow);
  }

  echo '<form method="post" enctype="multipart/form-data">
<input type="hidden" name="a" value="edit_listing">
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
  echo '" class=inpts size=50></td></tr>
<tr>
<td>Group:</td><td>  ';
  echo '<select name="group_id" class=inpts>
';
  foreach ($groups as $group)
  {
    echo '    <option value="';
    echo $group['id'];
    echo '" ';
    echo ($group['id'] == $row['group_id'] ? 'selected' : '');
    echo '>';
    echo htmlspecialchars ($group['name']);
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
  echo '<select name="rating" class=inpts>
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
  echo '<select name="status" class=inpts>
     <option value=0 ';
  echo ($row['status'] == 0 ? 'selected' : '');
  echo '>Off</option>
     <option value=1 ';
  echo ($row['status'] == 1 ? 'selected' : '');
  echo '>On</option>
     <option value=2 ';
  echo ($row['status'] == 2 ? 'selected' : '');
  echo '>Not Approved</option>
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
  echo '<select name="withdrawal_type" class=inpts>
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
      <td>Contact E-mail:</td>
      <td><input type="text" name="email" value="';
  echo htmlspecialchars ($row['email']);
  echo '" class=inpts size=50></td>
</tr>
<tr>
      <td>Support E-mail:</td>
      <td><input type="text" name="support_email" value="';
  echo htmlspecialchars ($row['support_email']);
  echo '" class=inpts size=50></td>
</tr>


<tr>
 <td>Support Forum (MMG):</td><td><input type="text" name="support_forum" value="';
  echo htmlspecialchars ($row['support_forum']);
  echo '" class=inpts size=50></td>
</tr>

<tr>
 <td>Support Forum (TG):</td><td><input type="text" name="support_form" value="';
  echo htmlspecialchars ($row['support_form']);
  echo '" class=inpts size=50></td>
</tr>





<tr>
<td>Support Forum (DTM):</td>
<td><input type="text" name="support_aim" value="';
  echo htmlspecialchars ($row['support_aim']);
  echo '" class=inpts size=50></td>
</tr>

<tr>
<td>Support Forum (OWN):</td>
<td><input type="text" name="support_forum_own" value="';
  echo htmlspecialchars ($row['support_forum_own']);
  echo '" class=inpts size=50></td>
</tr>

<tr>
 <td>Added:</td>';

  preg_match ('/(\\d+)-(\\d+)-(\\d+)/', $row['date_added'], $parts);
  $date = get_date_arrays ($parts[1], $parts[2], $parts[3], 5, 5);
  echo ' 
 <td>
  ';
  echo '<select name="month" class=inpts>
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
  echo '<select name="day" class=inpts>
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
  echo '<select name="year" class=inpts>
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
 <td>Expires after:</td><td><input type="text" name="expiration" value="';
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
  echo '<select name="cmonth" class=inpts>
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
  echo '<select name="cday" class=inpts>
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
  echo '<select name="cyear" class=inpts>
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
 <td>HYIP E-currency Accounts<br>';
  echo '<small>comma sparated</small>:</td><td><input type="text" name="account" value="';
  echo htmlspecialchars ($accounts);
  echo '" class=inpts size=10></td>
</tr>
<tr>
<td>Review:</td><td><textarea name="support_phone" cols=82 rows=5 class=inpts>';
  echo $row['description'];
  echo '</textarea></td>
</tr>

<tr>
  <td colspan=2>Description:</td>
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
<tr>
  <td colspan=2><input type="submit" value="Update" class=sbmt></td>
</tr>
</table>
</form>

';
?>
