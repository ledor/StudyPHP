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


  $q = 'select count(*) as cnt from hl_ads';
  if (!($sth = mysql_query ($q)))
  {
    print mysql_error ();
    ;
  }

  $row = mysql_fetch_array ($sth);
  $count_all = $row['cnt'];
  echo '
';
  if ($settings['demomode'] == 1)
  {
    echo start_info_table ('100%');
    echo '<b>Demo version restriction!</b><br>
You cannot add or edit ads!
';
    echo end_info_table ();
    echo '<br>
';
  }

  echo '
<b>Ads Management:</b><br><br>

';
  if (0 < $count_all)
  {
    echo '<table cellspacing=1 cellpadding=2 border=0 width=100%>
';
    $edit_row = array ();
    $q = 'select 
             *,
             date_format(date, \'%b-%e-%Y\') as d,
             ((expiration != 0) && (date + interval expiration day < current_date)) as expired
      from
             hl_ads
      order by ordering
';
    ($sth = mysql_query ($q) OR print mysql_error ());
    $i = 0;
    while ($row = mysql_fetch_array ($sth))
    {
      ++$i;
      if (($frm['action'] == 'edit' AND $row['id'] == $frm['id']))
      {
        $edit_row = $row;
      }

      echo '<tr>
 <td width=1% valign=top align=center>
   ';
      if ($i != 1)
      {
        echo '<a href="?a=adsmanagement&action=up&id=';
        echo $row['id'];
        echo '">[UP]</a>';
      }

      echo '<br>
   ';
      if ($i < $count_all)
      {
        echo '<a href="?a=adsmanagement&action=down&id=';
        echo $row['id'];
        echo '">[DOWN]</a>';
      }

      echo ' </td>
 <td width=99%>
   <table cellspacing="0" border="0" width="200"><tr><td class=adblack>
   <table cellpadding="3" width="100%" cellspacing="0" border="0">
    <tr>
     <td class=adlight>
       <a href="';
      echo $row['url'];
      echo '" target=_blank class=adlink><b>';
      echo $row['title'];
      echo '</b></a><br>
       <div class=adtext align=justify>';
      echo $row['text'];
      echo '</div>
     </td>
    </tr>
   </table>
   </td></tr>
   <td>
     ';
      echo ($row['expired'] ? '<font color=red><b>expired</b></font><br>' : '');
      echo '     Start Date: ';
      echo $row['d'];
      echo '<br>
     Expires: ';
      echo (1 < $row['expiration'] ? $row['expiration'] . ' days' : 'Never');
      echo '<br>
     <a href="?a=adsmanagement&action=edit&id=';
      echo $row['id'];
      echo '#editform">[EDIT]</a> 
     <a href="?a=adsmanagement&action=delete&id=';
      echo $row['id'];
      echo '" onclick="return confirm(\'Do you really want to delete this ad?\')">[REMOVE]</a> 
   </td></tr></table>
 </td>
</tr>
';
    }

    echo '</table>
';
  }
  else
  {
    echo start_info_table ('100%');
    echo 'You can manage your ads here.<br>
';
    echo end_info_table ();
  }

  echo '
<br><br><a name="editform"></a>
<form method=post>
<input type=hidden name=a value=adsmanagement>
';
  if ($edit_row)
  {
    echo '<input type=hidden name=action value=edit>
<input type=hidden name=save value=1>
<input type=hidden name=id value="';
    echo $edit_row['id'];
    echo '">
';
  }
  else
  {
    echo '<input type=hidden name=action value=add>
';
  }

  echo '<table cellspacing=0 cellpadding=2 border=0>
<tr>
<td nowrap>I Will Add a </td>
<td><input name="textorminibanner" type="radio" value="textads" checked />Text ADS
<input name="textorminibanner" type="radio" value="';
echo (!$edit_row ? 'minibanner' : 'Edit');
echo'" />Mini Banner
</td>
</tr>

<tr>
 <td>Start Date:</td>
';
  preg_match ('/(\\d+)-(\\d+)-(\\d+)/', $edit_row['date'], $parts);
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
 <td width=1% nowrap>Expires After:</td>
 <td><input type="text" name="expiration" value="';
  echo ($edit_row['expiration'] ? $edit_row['expiration'] : 0);
  echo '" class=inpts> days</td>
</tr>
<tr>
 <td>Title</td>
 <td>
  <input type="text" name="title" value="';
  echo $edit_row['title'];
  echo '" class=inpts size=80>
 </td>
</tr>
<tr>
 <td>Url</td>
 <td>
  <input type="text" name="url" value="';
  echo $edit_row['url'];
  echo '" class=inpts size=80>
 </td>
</tr>
<tr>
 <td nowrap>Text / MiniBanner URL</td>
 <td>
  <input type="text" name="text" value="';
  echo $edit_row['text'];
  echo '" class=inpts size=80>
 </td>
</tr>
<tr><td colspan=2><font color="#ff0000">* When you add a Mini Banner , Please input the URL of Mini banner </font></td></tr>
<tr>
 <td colspan=2><input type=submit value="';
  echo (!$edit_row ? 'Add' : 'Edit');
  echo '" class=sbmt></td>
</tr></table>
</form>

';
?>
