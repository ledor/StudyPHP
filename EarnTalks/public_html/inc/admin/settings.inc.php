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

<input type=hidden name=a value=settings>

<input type=hidden name=action value=save>



<table cellspacing=0 cellpadding=2 border=0>

<tr>

 <td colspan=2><b>Main settings:</b><br><br></td>

</tr><tr>

 <td>Site Name:</td>

 <td><input type=text name=site_name value=\'';

  echo quote ($settings['site_name']);

  echo '\' class=inpts size=30></td>

</tr><tr>

 <td>Site URL:</td>

 <td><input type=text name=site_url value=\'';

  echo quote ($settings['site_url']);

  echo '\' class=inpts size=30></td>

</tr><tr>

 <td>Site URL Alt:</td>

 <td><input type=text name=site_url_alt value=\'';

  echo quote ($settings['site_url_alt']);

  echo '\' class=inpts size=30></td>

</tr><tr>

 <td>System E-Mail:</td>

 <td><input type=text name=system_email value=\'';

  echo quote ($settings['system_email']);

  echo '\' class=inpts size=30></td>

</tr><tr>

 <td colspan=2>

';

  echo start_info_table ('100%');

  echo '<b>Site Name</b>: your site title.<br>

<b>Site URL</b>: your site url, without ending slash (for example http://yoursite.com).<br>

<b>Site URL Alt</b>: your site url, without ending slash and http://www. (for example yoursite.com).<br>

<b>System E-Mail</b>: the e-mail address all the system messages will be sent from.<br>

';

  echo end_info_table ();

  echo '</tr><tr>

 <td colspan=2>&nbsp;<br><b>Administrator login & LR settings:</b></td>

</tr><tr>

 <td>Login:</td>

 <td><input type=text name=admin_login value=\'';

  echo quote ($settings['admin_login']);

  echo '\' class=inpts size=30></td>

</tr><tr>

 <td>Password:</td>

 <td><input type=password name=admin_password value=\'';

  echo quote ($settings['admin_password']);

  echo '\' class=inpts size=30></td>

</tr><tr>

 <td>Admin E-mail:</td>

 <td><input type=text name=admin_email value=\'';

  echo quote ($settings['admin_email']);

  echo '\' class=inpts size=30></td>

</tr><tr>

<td>Admin LR Account:</td>

 <td><input type=text name=admin_lr_account value=\'';

  echo quote ($settings['admin_lr_account']);

  echo '\' class=inpts size=30></td>

</tr><tr>

<td>Admin PM Account:</td>

 <td><input type=text name=admin_pm_account value=\'';

  echo quote ($settings['admin_pm_account']);

  echo '\' class=inpts size=30></td>

</tr><tr>
<td>Admin PM Account Name:</td>

 <td><input type=text name=admin_pm_name value=\'';

  echo quote ($settings['admin_pm_name']);

  echo '\' class=inpts size=30></td>

</tr><tr>
<td>Admin Yahoo IM Account:</td>

 <td><input type=text name=admin_ym_account value=\'';

  echo quote ($settings['admin_ym_account']);

  echo '\' class=inpts size=30></td>

</tr>

<tr>

 <td>Show E-currency Tips:</td>

 <td>';

  echo '<s';

  echo 'elect name=ecurrency class=inpts><option value=1 ';

  echo ($settings['ecurrency'] == 1 ? 'selected' : '');

  echo '>Yes<option value=0 ';

  echo ($settings['ecurrency'] == 0 ? 'selected' : '');

  echo '>No</select></td>

</tr>

<tr>

 <td>Show Aleax Rank:</td>

 <td>';

  echo '<s';

  echo 'elect name=alexa class=inpts><option value=1 ';

  echo ($settings['alexa'] == 1 ? 'selected' : '');

  echo '>Yes<option value=0 ';

  echo ($settings['alexa'] == 0 ? 'selected' : '');

  echo '>No</select></td>

</tr>

<tr>

 <td colspan=2>

';

  echo start_info_table ('100%');

  echo '<b>Administrator login settings</b>: enter a new login and a password to login the admin area here.<br>

<b>Admin E-Mail</b>: the e-mail address the admin system notification will be sent to.

';

  echo end_info_table ();

  echo '</tr><tr>

 <td colspan=2>&nbsp;<br><b>Other settings:</b></td>

</tr><tr>

 <td>Double opt-in during the new listing addition:</td>

 <td>';

  echo '<s';

  echo 'elect name=listing_confirmation_require class=inpts><option value=1 ';

  echo ($settings['listing_confirmation_require'] == 1 ? 'selected' : '');

  echo '>Yes<option value=0 ';

  echo ($settings['listing_confirmation_require'] == 0 ? 'selected' : '');

  echo '>No</select></td>

</tr><tr>

 <td>Notify Administrator of the new listing addition:</td>

 <td>';

  echo '<s';

  echo 'elect name=notify_about_addition class=inpts><option value=1 ';

  echo ($settings['notify_about_addition'] == 1 ? 'selected' : '');

  echo '>Yes<option value=0 ';

  echo ($settings['notify_about_addition'] == 0 ? 'selected' : '');

  echo '>No</select></td>

</tr><tr>

 <td>Double opt-in during the voting:</td>

 <td>';

  echo '<s';

  echo 'elect name=vote_confirmation_require class=inpts><option value=1 ';

  echo ($settings['vote_confirmation_require'] == 1 ? 'selected' : '');

  echo '>Yes<option value=0 ';

  echo ($settings['vote_confirmation_require'] == 0 ? 'selected' : '');

  echo '>No</select></td>

</tr><tr>

 <td>New Listing period:</td>

 <td><input type=text name=new_for_days value=\'';

  echo quote ($settings['new_for_days']);

  echo '\' class=inpts size=30></td>

</tr><tr>

 <td>\'New\' page period:</td>

 <td><input type=text name=new_page_for_days value=\'';

  echo quote ($settings['new_page_for_days']);

  echo '\' class=inpts size=30></td>

</tr><tr>

 <td>Traffic period:</td>

 <td><input type=text name=traffic_count_days value=\'';

  echo quote ($settings['traffic_count_days']);

  echo '\' class=inpts size=30></td>

</tr><tr>

 <td>Payment Systems:</td>

 <td><input type=text name=payments value=\'';

  echo quote ($settings['payments']);

  echo '\' class=inpts size=30></td>

</tr><tr>

 <td>News Count:</td>

 <td><input type=text name=last_news_count value=\'';

  echo quote ($settings['last_news_count']);

  echo '\' class=inpts size=30></td>

</tr><tr>

 <td colspan=2>

';

  echo start_info_table ('100%');

  echo '<b>Double opt-in during the new listing addition</b>: Select \'yes\' if a user should confirm the addition. E-mail with the confirmation code will be sent to the user when he adds a listing (you can change the e-mail template in the E-mail Templates section).<br>

<b>Notify Administrator about the new listing addition</b>: if it\'s set to \'yes\' you will receive an e-mail message to \'Administrator E-Mail\' a';

  echo 'ddress about the new listing addition.<br>

<b>Double opt-in during the voting</b>: if it\'s set to \'yes\' a visitor must confirm his vote. E-mail with the confirmation code will be sent to the visitor when he votes (you can change the e-mail template in the E-mail Templates section).<br>

<b>New Listing period</b>: listing will be marked as new and will be shown in \'New Listings\' section for the specified ';

  echo 'period.<br>

<b>\'New\' page period</b>: listing will be shown on \'New\' page for the specified period.<br>

<b>Traffic period</b>: listings traffic will be used for listing and sorting for the specified period.<br>

<b>Payment Systems</b>: you can change payment systems that are shown for a listing. You should upload the images to the \'images\' folder with payment systems\' names (case sensitive) with \'gif\' exten';

  echo 'sion. It appears in payments systems list in the listing.<br>

The system uses this string \'LibertyReserve,PerfectMoney,SolidTrustPay,StrictPay,ECUMoney,GlobalDigitalPay,V-Money,C-Gold,Webmoney,E-Gold,Paypal,Pecunix,AlertPay,EuroPay,WesternUnion,EVOWal\' by default <br>

<b>News Count:</b>: the latest news number that are shown in the \'News\' section.

';

  echo end_info_table ();

  echo '</tr><tr>

 <td colspan=2>&nbsp;<br><b>Monitoring Logo settings:</b></td>

</tr><tr>

 <td>Background Color:</td>

 <td><input type=text name=image_bg_color value=\'';

  echo quote ($settings['image_bg_color']);

  echo '\' class=inpts size=30></td>

</tr><tr>

 <td>Name Background Color:</td>

 <td><input type=text name=image_name_bg_color value=\'';

  echo quote ($settings['image_name_bg_color']);

  echo '\' class=inpts size=30></td>

</tr><tr>

 <td>Name Background Color:</td>

 <td><input type=text name=image_text_color value=\'';

  echo quote ($settings['image_text_color']);

  echo '\' class=inpts size=30></td>

</tr><tr>

<br>

 



 <td colspan=2>

';

  echo start_info_table ('100%');

  echo 'Color settings for monitoring image. You can found link to monitoring image on listing edit screen.

';

  echo end_info_table ();

  echo '</tr>

 <tr>

 <td>Premium Section Fees:<font color=red>(Total Fees = Monitor Fees + Listing Fees)</font></td>

 <td>Monitor Fees: $<input type=text name=premiummonitorfees value=\'';

  echo quote ($settings['premiummonitorfees']);

  echo '\' class=inpts size=6> + Listing Fees: $<input type=text name=premiumlistingfees value=\'';

  echo quote ($settings['premiumlistingfees']);

  echo '\' class=inpts size=6></td>

</tr>



 <tr>

 <td>Normal Section Fees:<font color=red>(Total Fees = Monitor Fees + Listing Fees)</font></td>

 <td>Monitor Fees: $<input type=text name=normalmonitorfees value=\'';

  echo quote ($settings['normalmonitorfees']);

  echo '\' class=inpts size=6> + Listing Fees: $<input type=text name=normallistingfees value=\'';

  echo quote ($settings['normallistingfees']);

  echo '\' class=inpts size=6></td>

</tr>



 <tr>

 <td>Autosurf Section Fees:<font color=red>(Total Fees = Monitor Fees + Listing Fees)</font></td>

 <td>Monitor Fees: $<input type=text name=autosurfmonitorfees value=\'';

  echo quote ($settings['autosurfmonitorfees']);

  echo '\' class=inpts size=6> + Listing Fees: $<input type=text name=autosurflistingfees value=\'';

  echo quote ($settings['autosurflistingfees']);

  echo '\' class=inpts size=6></td>

</tr>



 <tr>

 <td>Trial Section Fees:<font color=red>(Total Fees = Monitor Fees + Listing Fees)</font></td>

 <td>Monitor Fees: $<input type=text name=trialmonitorfees value=\'';

  echo quote ($settings['trialmonitorfees']);

  echo '\' class=inpts size=6> + Listing Fees: $<input type=text name=triallistingfees value=\'';

  echo quote ($settings['triallistingfees']);

  echo '\' class=inpts size=6></td>

</tr>



<tr>

 <td colspan=2>

';

  echo start_info_table ('100%');

  echo 'Fees settings for Listing section.<b>(Total Fees = Monitor Fees + Listing Fees)</b><br>

  <b>Montitor Fees:</b>All Monitor Fees will be reinvested.<br>

  <b>Listing Fees:</b>Listing Fees is the cost for runing the websit better! :-)';

  echo end_info_table ();

  echo '</tr>



<tr>

 <td>&nbsp;</td>

 <td><input type=submit value=\'Save\' class=sbmt></td>

</tr></table>

</form>';

?>

