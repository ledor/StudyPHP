<?

  $frm['gid'] = intval ($frm['gid']);
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

  echo '<form method=post>
<input type="hidden" name="a" value="add_listing">
<input type="hidden" name="action" value="save">
<input type="hidden" name="gid" value="';
  echo $frm['gid'];
  echo '">
<input type="hidden" name="p" value="';
  echo $frm['p'];
  echo '">
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <td width=30%>Name:</td><td><input type="text" name="name" value="" class=inpts size=50></td>
</tr>
<tr>
 <td>Group:</td>
 <td>
  ';
  echo '<s';
  echo 'elect name="group_id" class=inpts>
';
  foreach ($groups as $group)
  {
    echo '    <option value="';
    echo $group['id'];
    echo '" ';
    echo ($group['id'] == $frm['gid'] ? 'selected' : '');
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
  echo '<s';
  echo 'elect name="rating" class=inpts>
';
  for ($i = 0; $i <= 5; ++$i)
  {
    echo '     <option value=';
    echo $i;
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
  echo '<select name="hyip_status" class=inpts>
     <option value=1>Paying</option>
     <option value=2 selected>Waiting</option>
     <option value=3>Problem</option>
     <option value=4>Not Paying</option>
   </select>
  </td>
</tr>
<tr>
 <td>URL:</td><td><input type="text" name="url" value="" class=inpts size=50></td>
</tr>
<tr>
 <td>Percents:</td><td><input type="text" name="percents" value="" class=inpts size=50></td>
</tr>';
  echo '
<tr>
      <td>Minimal Spend:</td>
      <td><input type="text" name="min_spend" value="" class=inpts size=50></td>
</tr>
<tr>
      <td>Maximal Spend:</td>
      <td><input type="text" name="max_spend" value="" class=inpts size=50></td>
</tr>
<tr>
 <td>Referral:</td><td><input type="text" name="referral" value="" class=inpts size=50></td>
</tr>
<tr>
 <td>Withdrawal:</td>
 <td><select name="withdrawal_type" class=inpts>
     <option value=1>Manual</option>
     <option value=2>Instant</option>
     <option value=3>Automatic</option>
   </select>
 </td>
</tr>
<tr>
 <td>Contact E-mail:</td>
<td><input type="text" name="email" value="" class=inpts size=50></td>
</tr>
<tr>
 <td>Support E-mail:</td>
<td><input type="text" name="support_email" value="" class=inpts size=50></td>
</tr>





<tr>
 <td>Support Forum (MMG):</td>
<td><input type="text" name="support_forum" value="" class=inpts size=50></td>
</tr>
<tr>
 <td>Support Forum (TG):</td>
<td><input type="text" name="support_form" value="" class=inpts size=50></td>
</tr>

<tr>
 <td>Support Forum (DTM):</td>
<td><input type="text" name="support_aim" value="" class=inpts size=50></td>
</tr>

<tr>
 <td>Support Forum (OWN):</td>
<td><input type="text" name="support_forum_own" value="" class=inpts size=50></td>
</tr>

<tr>
 <td>Added:</td>';

  $date = get_date_arrays ('', '', '', 5, 5);
  echo '<td><select name="month" class=inpts>';
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
      <td>Expires After:</td>
      <td><input type="text" name="expiration" value="';
  echo htmlspecialchars ($row['expiration']);
  echo '" class=inpts size=10> days (enter \'0\' to skip limitation)</td>
</tr>
<tr>
 <td>Closed:</td>
';
  $date = get_date_arrays ('0', '0', '0', 5, 5);
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
  foreach ($payments as $payment)
  {
    echo '   <input type="checkbox" name="payments[';
    echo $payment;
    echo ']" value=1> ';
    echo $payment;
    echo '<br>
';
  }

  echo '  </td>
</tr>
<tr>
 <td>HYIP E-currency Accounts:<br>';
  echo '<s';
  echo 'mall>comma sparated</small></td><td><input type="text" name="account" value="" class=inpts size=10></td>
</tr>
<tr>
 <td>Review:</td><br>
<td><textarea name="support_phone" cols=82 rows=5 class=inpts></textarea></td>
</tr>

<tr>
 <td> Description:</td>
<td><textarea name="description" cols=82 rows=5 class=inpts></textarea></td>
</tr>


<tr>
  

';
  echo '<tr>
  <td colspan=2><input type="submit" value="Add" class=sbmt></td>
</tr>
</table>
</form>

';
?>