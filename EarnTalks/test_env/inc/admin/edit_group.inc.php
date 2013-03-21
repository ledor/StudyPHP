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


  $frm['id'] = intval ($frm['id']);
  $q = 'select * from hl_groups where id = ' . $frm['id'];
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $row = mysql_fetch_array ($sth);
  if (!$row)
  {
    print 'Invalid group id';
    exit ();
  }

  echo '
<form method=post>
<input type="hidden" name="a" value="edit_group">
<input type="hidden" name="action" value="save">
<input type="hidden" name="id" value="';
  echo $frm['id'];
  echo '">
<table cellspacing=0 cellpadding=2 border=0>
<tr>
  <td>Group Title:</td>
  <td><input type="text" name="name" value="';
  echo htmlspecialchars ($row['name']);
  echo '" class=inpts size=80></td>
</tr>
<tr>
  <td>Group Navigation Link Name:</td>
  <td><input type="text" name="nav_name" value="';
  echo htmlspecialchars ($row['nav_name']);
  echo '" class=inpts size=80></td>
</tr>
<tr>
  <td>Sort Listing:</td>
  <td>
    ';
  echo '<s';
  echo 'elect name="sort" class=inpts>
      <option value="rating" ';
  echo ($row['sort'] == 'rating' ? 'selected' : '');
  echo '>Rating</option>
      <option value="votes" ';
  echo ($row['sort'] == 'votes' ? 'selected' : '');
  echo '>Votes</option>
      <option value="pratio" ';
  echo ($row['sort'] == 'pratio' ? 'selected' : '');
  echo '>Payout Ratio</option>
      <option value="adate" ';
  echo ($row['sort'] == 'adate' ? 'selected' : '');
  echo '>Date Added</option>
      <option value="udate" ';
  echo ($row['sort'] == 'udate' ? 'selected' : '');
  echo '>Date Updated</option>
      <option value="cdate" ';
  echo ($row['sort'] == 'cdate' ? 'selected' : '');
  echo '>Date Closed</option>
      <option value="traffic_in" ';
  echo ($row['sort'] == 'traffic_in' ? 'selected' : '');
  echo '>In Traffic</option>
      <option value="traffic_out" ';
  echo ($row['sort'] == 'traffic_out' ? 'selected' : '');
  echo '>Out Traffic</option>
      <option value="traffic_ratio" ';
  echo ($row['sort'] == 'traffic_ratio' ? 'selected' : '');
  echo '>Traffic Ratio</option>
      <option value="name" ';
  echo ($row['sort'] == 'name' ? 'selected' : '');
  echo '>Listing Name</option>
    </select>
  </td>
</tr>
<tr>
  <td>Allow New Listings Addition:</td>
  <td>
    ';
  echo '<s';
  echo 'elect name="reg_enabled" class=inpts>
      <option value="1" ';
  echo ($row['reg_enabled'] == 1 ? 'selected' : '');
  echo '>Yes</option>
      <option value="0" ';
  echo ($row['reg_enabled'] == 0 ? 'selected' : '');
  echo '>No</option>
    </select>
  </td>
</tr>
<tr>
      <td colspan=2>Listing Addition Instructions:</td>
</tr>
<tr>
  <td colspan=2><textarea name="add_description" class=inpts cols=100 rows=6>';
  echo htmlspecialchars ($row['add_description']);
  echo '</textarea></td>
</tr>
<tr>
  <td>New Listings Expiration:</td>
  <td><input type="text" name="expiration" value="';
  echo htmlspecialchars ($row['expiration']);
  echo '" class=inpts size=5></td>
</tr>
<tr>
  <td colspan=2><input type="submit" value="Update" class=sbmt></td>
</tr>
</table>
</form>

<br>
';
  echo start_info_table ('100%');
  echo '<b>Group Title</b>: Main group name to sign the group.<br>
<b>Group Navigation Link Name</b>: Group link name in the top navigation link menu.<br>
<b>Sort Listing</b>: Defines how listings are sorted in this group.<br>
<b>Allow New Listings Addition</b>: Specifies whether users can add new listings to this group. You can receive a notification about any new addition and should approve the listing before it c';
  echo 'an published in the system.<br>
<b>Listing Addition Instructions</b>: You can specify the addition instructions and a payment form in this field.<br>
<b>New Listings Expiration</b>: This value sets the new listings expiration term. Set it to \'0\' to skip expiration function.
';
  echo end_info_table ();
?>
