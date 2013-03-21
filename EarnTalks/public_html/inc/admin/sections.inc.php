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
    echo '<br>
';
  }

  echo '
<form method=post>
<input type=hidden name=a value=sections>
<input type=hidden name=action value=save>

<table cellspacing=0 cellpadding=2 border=0>
<tr>
 <td><input type=checkbox name=textads_box value=1 ';
  echo ($settings['textads_box'] ? 'checked' : '');
  echo '></td>
 <td>Text Ads Section</td>
</tr><tr>
 <td><input type=checkbox name=subscribe_box value=1 ';
  echo ($settings['subscribe_box'] ? 'checked' : '');
  echo '></td>
 <td>Subscribe Section</td>
</tr><tr>
 <td><input type=checkbox name=logo_box value=1 ';
  echo ($settings['logo_box'] ? 'checked' : '');
  echo '></td>
 <td>Logo Section</td>
</tr><tr>
 <td><input type=checkbox name=news_box value=1 ';
  echo ($settings['news_box'] ? 'checked' : '');
  echo '></td>
 <td>New Listings Section</td>
</tr><tr>
 <td><input type=checkbox name=newlistings_box value=1 ';
  echo ($settings['newlistings_box'] ? 'checked' : '');
  echo '></td>
 <td>News Section</td>
</tr><tr>
 <td><input type=checkbox name=paysystems_box value=1 ';
  echo ($settings['paysystems_box'] ? 'checked' : '');
  echo '></td>
 <td>Payment Systems Section</td>
</tr><tr>
 <td><input type=checkbox name=partners_box value=1 ';
  echo ($settings['partners_box'] ? 'checked' : '');
  echo '></td>
 <td>Partner Links Section</td>
</tr><tr>
 <td colspan=2><input type="submit" value="Save" class=sbmt></td>
</tr><tr>
 <td colspan=2>
';
  echo start_info_table ('100%');
  echo 'You can use this section to quickly add or remove sections from the left column.<br>
<br>
\'Logo Section\', \'Payment Systems Section\' and \'Partner Links Section\' are not dynamic sections. You have to edit the corresponding template to change them.<br>
Other sections are dynamic and you can manage their settings via the \'Settings\' panel.

';
  echo end_info_table ();
  echo '</tr></table>
';
?>
