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


  $q = 'select count(*) as cnt from hl_maillist';
  $sth = mysql_query ($q);
  $row = mysql_fetch_array ($sth);
  $count_all = $row['cnt'];
  echo '
<table cellspacing=0 cellpadding=2 border=0>
 <td colspan=2><b>Mail List:</b><br><br>
';
  if ($settings['demomode'] == 1)
  {
    echo start_info_table ('100%');
    echo '<b>Demo version restriction!</b><br>
You cannot download Subscribers!
';
    echo end_info_table ();
    echo '<br>
';
  }

  echo ' </td>
</tr><tr>
<tr>
 <td>
';
  echo start_info_table ('100%');
  echo 'This system does not have the e-mail function. You can export your subscribers list to e-mail them using any other system.
';
  echo end_info_table ();
  echo '</tr><tr>
 <td>Currently there are ';
  echo $count_all;
  echo ' subscribers.</td>
</tr><tr>
 <td><a href="?a=maillist&action=download">Download Subscribers in CSV format</a></td>
</tr></table>
';
?>
