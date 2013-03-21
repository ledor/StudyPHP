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


  if (($settings['demomode'] == 1 AND $frm['type'] != ''))
  {
    echo start_info_table ('100%');
    echo '<b>Demo version restriction!</b><br>
You cannot change change the e-mail templates!
';
    echo end_info_table ();
    echo '<br>
';
  }

  echo '<b>Edit E-mail Templates:</b><br>
<br>

<table cellspacing=1 cellpadding=2 border=0 width=100%>
';
  $found = 0;
  $q = 'select id, name from hl_emails';
  ($sth = mysql_query ($q) OR print mysql_error ());
  while ($row = mysql_fetch_array ($sth))
  {
    if ($row['id'] == $frm['type'])
    {
      $found = 1;
    }

    echo '<tr><td><li>
  ';
    if ($row['id'] == $frm['type'])
    {
      echo '  <b>';
      echo $row['name'];
      echo '</b>
  ';
    }
    else
    {
      echo '  <a href="?a=edit_emails&type=';
      echo $row['id'];
      echo '">';
      echo $row['name'];
      echo '</a>
  ';
    }

    echo '</td></tr>
';
  }

  echo '</table>
';
  if ($found)
  {
    if ($settings['demomode'] != 1)
    {
      if ($frm['action'] == 'save')
      {
        $subject = quote ($frm['subject']);
        $text = $frm_orig['text'];
        $text = preg_replace ('//', '', $text);
        $text = quote ($text);
        $q = '' . 'update hl_emails set subject=\'' . $subject . '\', text=\'' . $text . '\' where id=\'' . $frm['type'] . '\'';
        ($sth = mysql_query ($q) OR peint (mysql_error ()));
        echo '<br>
<b>The template has been saved.</b></br> 
';
      }
    }

    $q = 'select * from hl_emails where id = \'' . $frm['type'] . '\'';
    ($sth = mysql_query ($q) OR peint (mysql_error ()));
    $row = mysql_fetch_array ($sth);
    echo '<br>
<br>
<form method=post>
<input type=hidden name=a value=edit_emails>
<input type=hidden name=action value=save>
<input type=hidden name=type value=';
    echo $row['id'];
    echo '>
<table cellspacing=0 cellpadding=2 border=0>

<tr>
 <td>Subject:</td>
</tr>
<tr>
 <td>
  <input type="text" name="subject" value="';
    echo $row['subject'];
    echo '" class=inpts size=100>
 </td>
</tr>
<tr>
 <td>Message Template:</td>
</tr>
<tr>
 <td>
  <textarea name=text class=inpts cols=100 rows=20>';
    echo $row['text'];
    echo '</textarea>
 </td>
</tr>
<tr>
 <td><input type=submit value="Save Changes" class=sbmt></td>
</tr></table>
</form>
';
  }

  echo '
<br>
';
  echo start_info_table ('100%');
  if ($frm['type'] == '')
  {
    echo 'Select the e-mail type to edit system messages.
';
  }

  echo '



';
  if ($frm['type'] == 'vote_confirm')
  {
    echo 'Users will receive this e-mail after placing a vote to confirm it (if you enbale the vote confirmation in Settings).<br><br>

Personalization:<br>
#listing_name# - name of voted resource.<br>
#confirm_code# - code that user enter to confirm.<br>
#site_url# - your site url (check settings screen to set this variable)<br>
#site_name# - your site name (check settings screen to set this variable)<br><br>
';
  }

  echo '
';
  if ($frm['type'] == 'listing_confirm')
  {
    echo 'Users will receive this e-mail after place listing to confirm it (if you enbale listing confirmation in Settings).<br><br>

Personalization:<br>
#listing_name# - the name of an added resource.<br>
#confirm_code# - the code that a user enters to confirm.<br>
#site_url# - your site url (check the settings screen to set this variable)<br>
#site_name# - your site name (check the settings screen to set this ';
    echo 'variable)<br><br>
';
  }

  echo '
';
  if ($frm['type'] == 'listing_added')
  {
    echo 'Administrator will receive this message when a new listing is added (and confirmation is required).<br><br>

Personalization:<br>
#date_added# - addition date<br>
#name# - site name<br>
#url# - site URL<br>
#email# - contact e-mail<br>
#percents# - Interest Percents<br>
#min_spend# - Minimal Spend<br>
#max_spend# - Maximal Spend<br>
#referral# - Referral Bonus<br>
#withdrawal_type# - Withdrawal Type<br>
#supp';
    echo 'ort_email# - Support E-mail<br>
#support_form# - Support Form<br>
#support_forum# - Support Forum<br>
#support_aim# - Support AIM<br>
#pay_systems# - Payment Methods<br>
#description# - Description<br><br>

#site_url# - your site url (check the settings screen to set this variable)<br>
#site_name# - your site name (check the settings screen to set this variable)<br><br>
';
  }

  echo '
';
  if ($frm['type'] == 'listing_approve')
  {
    echo 'This template will be used when you approve a listing.<br><br>

Personalization:<br>
#id# - listing id<br>
#date_added# - date of addition<br>
#name# - site name<br>
#url# - site URL<br>
#email# - contact e-mail<br>
#percents# - Interest Percents<br>
#min_spend# - Minimal Spend<br>
#max_spend# - Maximal Spend<br>
#referral# - Referral Bonus<br>
#withdrawal_type# - Withdrawal Type<br>
#support_email# - Support ';
    echo 'E-mail<br>
#support_form# - Support Form<br>
#support_forum# - Support Forum<br>
#support_aim# - Support AIM<br>
#pay_systems# - Payment Methods<br>
#description# - Description<br><br>

#site_url# - your site url (check the settings screen to set this variable)<br>
#site_name# - your site name (check the settings screen to set this variable)<br><br>
';
  }

  echo '
';
  if ($frm['type'] == 'listing_decline')
  {
    echo 'This template will be used when you decline a listing.<br><br>

Personalization:<br>
#date_added# - date of addition<br>
#name# - site name<br>
#url# - site URL<br>
#email# - contact e-mail<br>
#percents# - Interest Percents<br>
#min_spend# - Minimum Spend<br>
#max_spend# - Maximum Spend<br>
#referral# - Referral Bonus<br>
#withdrawal_type# - Withdrawal Type<br>
#support_email# - Support E-mail<br>
#support_fo';
    echo 'rm# - Support Form<br>
#support_forum# - Support Forum<br>
#support_aim# - Support AIM<br>
#pay_systems# - Payment Methods<br>
#description# - Description<br><br>

#site_url# - your site url (check the settings screen to set this variable)<br>
#site_name# - your site name (check the settings screen to set this variable)<br><br>
';
  }

  echo '

';
  echo end_info_table ();
?>
