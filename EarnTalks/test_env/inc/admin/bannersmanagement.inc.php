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


  if ($settings['demomode'] == 1)
  {
    echo start_info_table ('100%');
    echo '<b>Demo version restriction!</b><br>
You cannot edit settings!
';
    echo end_info_table ();
    echo '<br><br>
';
  }

  echo '


<form method=post>
<input type=hidden name=a value=bannersmanagement>
<input type=hidden name=action value=save>

<table cellspacing=0 cellpadding=2 border=0>
<tr>
 <td colspan=2><b>Top Banner settings:</b><br><br></td>
</tr>

<tr>
 <td>Top banner image URL:</td>
 <td><input type=text name=imgurl_top value=\'';
  echo quote ($settings['imgurl_top']);
  echo '\' class=inpts size=60></td>
</tr>

<tr>
 <td>URL:</td>
 <td><input type=text name=url_top value=\'';
  echo quote ($settings['url_top']);
  echo '\' class=inpts size=60></td>
</tr>

<tr>
 <td>Expires date:</td>
 <td><input type=text name=date_top value=\'';
  echo quote ($settings['date_top']);
  echo '\' class=inpts size=60><br><font color=red>Day.Mon.Year Example: 25.10.06</font></td>
</tr>

<tr>
 <td>Details:</td>
 <td><input type=text name=detail_top value=\'';
  echo quote ($settings['detail_top']);
  echo '\' class=inpts size=60> </td>
</tr>

<tr>
 <td>image alt:</td>
 <td><input type=text name=alt_top value=\'';
  echo quote ($settings['alt_top']);
  echo '\' class=inpts size=60> </td>
</tr>

<tr>
 <td colspan=2>
';
  echo start_info_table ('100%');
  echo 'Preview:<br>';
  echo '<a href='.$settings['url_top'].' target=_blank><img src='.$settings['imgurl_top'].' border=0 alt="'.$settings['detail_top'].'"></a>';
  echo end_info_table ();
  echo '</tr>  
  <tr>
 <td colspan=2><br><br><b>1st Banner settings:</b><br><br></td>
</tr>

<tr>
 <td>1st banner image URL:</td>
 <td><input type=text name=imgurl1 value=\'';
  echo quote ($settings['imgurl1']);
  echo '\' class=inpts size=60></td>
</tr>

<tr>
 <td>URL:</td>
 <td><input type=text name=url1 value=\'';
  echo quote ($settings['url1']);
  echo '\' class=inpts size=60></td>
</tr>

<tr>
 <td>Expires date:</td>
 <td><input type=text name=date1 value=\'';
  echo quote ($settings['date1']);
  echo '\' class=inpts size=60><br><font color=red>Day.Mon.Year Example: 25.10.06</font></td>
</tr>

<tr>
 <td>Details:</td>
 <td><input type=text name=detail1 value=\'';
  echo quote ($settings['detail1']);
  echo '\' class=inpts size=60> </td>
</tr>

<tr>
 <td>image alt:</td>
 <td><input type=text name=alt1 value=\'';
  echo quote ($settings['alt1']);
  echo '\' class=inpts size=60> </td>
</tr>

<tr>
 <td colspan=2>
';
  echo start_info_table ('100%');
  echo 'Preview:<br>';
  echo '<table><tr><td><a href='.$settings['url1'].' target=_blank><img src='.$settings['imgurl1'].' border=0 alt="'.$settings['alt1'].'"></a></td><td><a href='.$settings['url1'].' target=_blank>'.$settings['detail1'].'</a></td></table>';
  echo end_info_table ();
  echo '</tr>
  
  <tr>
 <td colspan=2><br><br><b>2nd Banner settings:</b><br><br></td>
</tr>

<tr>
 <td>2nd banner image URL:</td>
 <td><input type=text name=imgurl2 value=\'';
  echo quote ($settings['imgurl2']);
  echo '\' class=inpts size=60></td>
</tr>

<tr>
 <td>URL:</td>
 <td><input type=text name=url2 value=\'';
  echo quote ($settings['url2']);
  echo '\' class=inpts size=60></td>
</tr>

<tr>
 <td>Expires date:</td>
 <td><input type=text name=date2 value=\'';
  echo quote ($settings['date2']);
  echo '\' class=inpts size=60><br><font color=red>Day.Mon.Year Example: 25.10.06</font></td>
</tr>

<tr>
 <td>Details:</td>
 <td><input type=text name=detail2 value=\'';
  echo quote ($settings['detail2']);
  echo '\' class=inpts size=60> </td>
</tr>

<tr>
 <td>image alt:</td>
 <td><input type=text name=alt2 value=\'';
  echo quote ($settings['alt2']);
  echo '\' class=inpts size=60> </td>
</tr>

<tr>
 <td colspan=2>
';
  echo start_info_table ('100%');
  echo 'Preview:<br>';
  echo '<table><tr><td><a href='.$settings['url2'].' target=_blank><img src='.$settings['imgurl2'].' border=0 alt="'.$settings['alt2'].'"></a></td><td><a href='.$settings['url2'].' target=_blank>'.$settings['detail2'].'</a></td></table>';
  echo end_info_table ();
  echo '</tr>
  
  <tr>
 <td colspan=2><br><br><b>3rd Banner settings:</b><br><br></td>
</tr>

<tr>
 <td>3rd banner image URL:</td>
 <td><input type=text name=imgurl3 value=\'';
  echo quote ($settings['imgurl3']);
  echo '\' class=inpts size=60></td>
</tr>

<tr>
 <td>URL:</td>
 <td><input type=text name=url3 value=\'';
  echo quote ($settings['url3']);
  echo '\' class=inpts size=60></td>
</tr>

<tr>
 <td>Expires date:</td>
 <td><input type=text name=date3 value=\'';
  echo quote ($settings['date3']);
  echo '\' class=inpts size=60><br><font color=red>Day.Mon.Year Example: 25.10.06</font></td>
</tr>

<tr>
 <td>Details:</td>
 <td><input type=text name=detail3 value=\'';
  echo quote ($settings['detail3']);
  echo '\' class=inpts size=60> </td>
</tr>

<tr>
 <td>image alt:</td>
 <td><input type=text name=alt3 value=\'';
  echo quote ($settings['alt3']);
  echo '\' class=inpts size=60> </td>
</tr>

<tr>
 <td colspan=2>
';
  echo start_info_table ('100%');
  echo 'Preview:<br>';
  echo '<table><tr><td><a href='.$settings['url3'].' target=_blank><img src='.$settings['imgurl3'].' border=0 alt="'.$settings['alt3'].'"></a></td><td><a href='.$settings['url3'].' target=_blank>'.$settings['detail3'].'</a></td></table>';
  echo end_info_table ();
  echo '</tr>
  
  <tr>
 <td colspan=2><br><br><b>4th Banner settings:</b><br><br></td>
</tr>

<tr>
 <td>4th banner image URL:</td>
 <td><input type=text name=imgurl4 value=\'';
  echo quote ($settings['imgurl4']);
  echo '\' class=inpts size=60></td>
</tr>

<tr>
 <td>URL:</td>
 <td><input type=text name=url4 value=\'';
  echo quote ($settings['url4']);
  echo '\' class=inpts size=60></td>
</tr>

<tr>
 <td>Expires date:</td>
 <td><input type=text name=date4 value=\'';
  echo quote ($settings['date4']);
  echo '\' class=inpts size=60><br><font color=red>Day.Mon.Year Example: 25.10.06</font></td>
</tr>

<tr>
 <td>Details:</td>
 <td><input type=text name=detail4 value=\'';
  echo quote ($settings['detail4']);
  echo '\' class=inpts size=60> </td>
</tr>

<tr>
 <td>image alt:</td>
 <td><input type=text name=alt4 value=\'';
  echo quote ($settings['alt4']);
  echo '\' class=inpts size=60> </td>
</tr>

<tr>
 <td colspan=2>
';
  echo start_info_table ('100%');
  echo 'Preview:<br>';
  echo '<table><tr><td><a href='.$settings['url4'].' target=_blank><img src='.$settings['imgurl4'].' border=0 alt="'.$settings['alt4'].'"></a></td><td><a href='.$settings['url4'].' target=_blank>'.$settings['detail4'].'</a></td></table>';
  echo end_info_table ();
  echo '</tr>
  
   <tr>
 <td colspan=2><br><br><b>5th Banner settings:</b><br><br></td>
</tr>

  <tr>
 <td>5th banner image URL:</td>
 <td><input type=text name=imgurl5 value=\'';
  echo quote ($settings['imgurl5']);
  echo '\' class=inpts size=60></td>
</tr>

<tr>
 <td>URL:</td>
 <td><input type=text name=url5 value=\'';
  echo quote ($settings['url5']);
  echo '\' class=inpts size=60></td>
</tr>

<tr>
 <td>Expires date:</td>
 <td><input type=text name=date5 value=\'';
  echo quote ($settings['date5']);
  echo '\' class=inpts size=60><br><font color=red>Day.Mon.Year Example: 25.10.06</font></td>
</tr>

<tr>
 <td>Details:</td>
 <td><input type=text name=detail5 value=\'';
  echo quote ($settings['detail5']);
  echo '\' class=inpts size=60> </td>
</tr>

<tr>
 <td>image alt:</td>
 <td><input type=text name=alt5 value=\'';
  echo quote ($settings['alt5']);
  echo '\' class=inpts size=60> </td>
</tr>

<tr>
 <td colspan=2>
';
  echo start_info_table ('100%');
  echo 'Preview:<br>';
  echo '<table><tr><td><a href='.$settings['url5'].' target=_blank><img src='.$settings['imgurl5'].' border=0 alt="'.$settings['alt5'].'"></a></td><td><a href='.$settings['url5'].' target=_blank>'.$settings['detail5'].'</a></td></table>';
  echo end_info_table ();
  echo '</tr>  
  
  <tr>
 <td>&nbsp;</td>
 <td><input type=submit value=\'Save\' class=sbmt></td>
</tr>

</table>


</form>';
?>
