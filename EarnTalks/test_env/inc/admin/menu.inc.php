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
  $r = 'select count(*) as unpaid from hl_rcbreport where status like "%waiting%"';
  $rsth = mysql_query ($r);
  $rrow = mysql_fetch_array ($rsth);

  $q = 'select count(*) as cnt from hl_listings where status = 2';
  $sth = mysql_query ($q);
  $row = mysql_fetch_array ($sth);
  echo '                   <table cellspacing=0 cellpadding=2 border=0 width="172">
                    <tr>
                      <th colspan=2><img src=images/q.gif width=1 height=3></th>
                    </tr>
                    <tr>
                      <th colspan=2 class=title>Menu</th>
                    </tr>
<tr>
<td class=menutxt><a href=?a=groups>Groups</a></td>
</tr><tr>
<td class=menutxt><a href=?a=listin';
  echo 'gs>Listings</a></td>
</tr><tr>
<td class=menutxt><a href=?a=new_listings>Waiting Approval Listings (';
  echo $row['cnt'];
  echo ')</a></td>
</tr>

<tr>
<td class=menutxt><a href=?a=rcbview>RCB View(';
  echo $rrow['unpaid'];
  echo ')</a></td>
</tr>

<tr>
<td class=menutxt>&nbsp;</td>
</tr>';
/*<tr>
<td class=menutxt><a href=?a=adsmanagement>Text Ads Management</a></td>
</tr>*/
echo '<tr>
<td class=menutxt><a href=?a=minibanners>Text ADs & Mini Banners</a></td>
</tr><tr>
<td class=menutxt><a href=?a=specialbanners>Special Banners</a></td>
</tr>
<tr>
<td class=menutxt><a href=?a=toprotatingbanners>Top Rotating Banners</a></td>
</tr>
<tr>
<td class=menutxt><a href=?a=rotatingbanners>Rotating Banners</a></td>
</tr><tr>
<td class=menutxt><a href=?a=normalbanners>Normal Banners</a></td>
</tr><tr>
<td class=menutxt><a href=?a=news>News Management</a></td>
</tr><tr>
<td class=menutxt>&nbsp;</td>
</tr><tr>
<td class=menutxt><a href=?a=maillist>Mail List</a></td>
</tr><tr>
<td class=menutxt>&nbsp;</td>
</tr><tr';
  echo '>
<td class=menutxt><a href=?a=edit_emails>E-Mail Templates</a></td>
</tr><tr>
<td class=menutxt>&nbsp;</td>
</tr><tr>
<td class=menutxt><a href=?a=settings>Settings</a></td>
</tr><tr>
<td class=menutxt><a href=?a=sections>Sections Management</a></td>
</tr><tr>
<td class=menutxt>&nbsp;</td>
</tr><tr>
<td class=menutxt><a href=?a=log';
  echo 'out>Logout</a></td>
</tr>
		   </table>
';
?>
