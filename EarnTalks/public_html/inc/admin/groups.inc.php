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


  $q = 'select * from hl_groups order by id';
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $groups = array ();
  while ($row = mysql_fetch_array ($sth))
  {
    $q = 'select count(*) as cnt from hl_listings where group_id=' . $row['id'];
    if (!($sth1 = mysql_query ($q)))
    {
      exit (mysql_error ());
      ;
    }

    $row1 = mysql_fetch_array ($sth1);
    $row['cnt'] = $row1['cnt'];
    array_push ($groups, $row);
  }

  echo '


<form method=post>
<input type="hidden" name="a" value="update_groups">
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <td colspan=3><b>Groups:</b></td>
</tr>
<tr>
 <th class=title width=1%><b>Status</b></td>
 <th class=title width=1% nowrap><b>On Index</b></td>
 <th class=title width=1% nowrap><b>On New</b></td>
 <th class=title><b>Group name</b></td>
 <th class=title><b>Type</b></td>
 <th class=title><b>Listi';
  echo 'ngs</b></td>
 <th class=title width=1%><b>-</b></td>
</tr>
';
  if (0 < sizeof ($groups))
  {
    foreach ($groups as $line)
    {
      echo '<tr>
 <td align=center><input type="checkbox" name="status[';
      echo $line['id'];
      echo ']" value=1 ';
      echo ($line['status'] ? 'checked' : '');
      echo '></td>
 <td align=center><input type="checkbox" name="onindex[';
      echo $line['id'];
      echo ']" value=1 ';
      echo ($line['onindex'] ? 'checked' : '');
      echo '></td>
 <td align=center><input type="checkbox" name="onnew[';
      echo $line['id'];
      echo ']" value=1 ';
      echo ($line['onnew'] ? 'checked' : '');
      echo '></td>
 <td><a href="?a=listings&gid=';
      echo $line['id'];
      echo '">';
      echo $line['name'];
      echo '</a></td>
 <td>';
      echo $line['type'];
      echo '</td>
 <td align=center>';
      echo $line['cnt'];
      echo '</td>
 <td class=menutxt align=right nowrap><a href=?a=edit_group&id=';
      echo $line['id'];
      echo '>[edit]</a></td>
</tr>
';
    }

    echo '<tr>
<td colspan=5><input type="submit" value="Update" class=sbmt></td>
</tr>
';
  }
  else
  {
    echo '<tr>
 <td bgcolor=FFF9B3 colspan=4>No Groups found</td>
</tr>
';
  }

  echo '</table>
</form>

<br>
';
  echo start_info_table ('100%');
  echo 'You can set up your groups in this section.<br>
The system provides you 8 standard groups that you can operate with. You can remove some of them from the public area if needed.<br>
<b>Status</b>: Switches the group on/off. When off, group\'s listings are not displayed 
in any public area and users can\'t add any listings into it.<br>
<b>On Index</b>: Defines whether to show the group on the index page of t';
  echo 'he public 
area.<br>
<b>On New</b>: Defines whether to show the group in the "new listings" (the "new 
listings" box in the left column and the "New" page). <br>
To change the group name and other group settings just click on the "edit" link.<br>
<br>
Each group has the type that you can not change. The group type is used to determinate a template to work with in the public area.<br>
There are several te';
  echo 'mplates that you can customize separately for each group:<br>
<b>details_[group_type].tpl</b> 
- this is a template for the listing layout. It is used to show each listing on 
the main page, the group listings page, the new listings page and the listing 
details page. <br>
<b>list_[group_type].tpl</b> - this is a template for group listings 
envelopment. There is a group header, the text witch shows if ';
  echo 'there are no listings 
in the group and the links to add a listing into this group if allowed. You can 
use it to add banners into top or bottom of the group layout.<br>
<b>add_[group_type].tpl</b> - this is a template for the new listing addition form. You can use it to add an addition instructions and a payment form. Also you can specify the addition instructions and the payment form in the group s';
  echo 'ettings.


';
  echo end_info_table ();
?>
