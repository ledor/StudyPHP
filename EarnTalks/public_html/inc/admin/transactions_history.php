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


  $frm['day_to'] = sprintf ('%d', $frm['day_to']);
  $frm['month_to'] = sprintf ('%d', $frm['month_to']);
  $frm['year_to'] = sprintf ('%d', $frm['year_to']);
  $frm['day_from'] = sprintf ('%d', $frm['day_from']);
  $frm['month_from'] = sprintf ('%d', $frm['month_from']);
  $frm['year_from'] = sprintf ('%d', $frm['year_from']);
  if ($frm['day_to'] == 0)
  {
    $frm['day_to'] = date ('j', time () + $settings['time_dif'] * 60 * 60);
    $frm['month_to'] = date ('n', time () + $settings['time_dif'] * 60 * 60);
    $frm['year_to'] = date ('Y', time () + $settings['time_dif'] * 60 * 60);
    $frm['day_from'] = 1;
    $frm['month_from'] = $frm['month_to'];
    $frm['year_from'] = $frm['year_to'];
  }

  $datewhere = '\'' . $frm['year_from'] . '-' . $frm['month_from'] . '-' . $frm['day_from'] . '\' + interval 0 day < date + interval ' . $settings['time_dif'] . ' hour and ' . '\'' . $frm['year_to'] . '-' . $frm['month_to'] . '-' . $frm['day_to'] . '\' + interval 1 day > date + interval ' . $settings['time_dif'] . ' hour ';
  if ($frm['ttype'] != '')
  {
    $typewhere = ' and type=\'' . quote ($frm['ttype']) . '\' ';
  }

  $u_id = sprintf ('%d', $frm['u_id']);
  if (1 < $u_id)
  {
    $userwhere = '' . ' and user_id = ' . $u_id . ' ';
  }

  $q = '' . 'select count(*) as col from hm3_history where ' . $datewhere . ' ' . $userwhere . ' ' . $typewhere;
  ($sth = mysql_query ($q) OR print mysql_error ());
  $row = mysql_fetch_array ($sth);
  $count_all = $row['col'];
  $page = $frm['page'];
  $onpage = 20;
  $colpages = ceil ($count_all / $onpage);
  if ($page <= 1)
  {
    $page = 1;
  }

  if (($colpages < $page AND 1 < $colpages))
  {
    $page = $colpages;
  }

  $from = ($page - 1) * $onpage;
  $q = 'select *, date_format(date + interval ' . $settings['time_dif'] . ('' . ' hour, \'%b-%e-%Y %r\') as d from hm3_history where ' . $datewhere . ' ' . $userwhere . ' ' . $typewhere . ' order by date desc, id desc limit ' . $from . ', ' . $onpage);
  ($sth = mysql_query ($q) OR print mysql_error ());
  $trans = array ();
  while ($row = mysql_fetch_array ($sth))
  {
    $q = 'select username from hm3_users where id = ' . $row['user_id'];
    $sth1 = mysql_query ($q);
    $row1 = mysql_fetch_array ($sth1);
    if ($row1)
    {
      $row['username'] = $row1['username'];
    }
    else
    {
      $row['username'] = '-- deleted user --';
    }

    array_push ($trans, $row);
  }

  $month = array ('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
  $q = '' . 'select sum(actual_amount) as periodsum from hm3_history where ' . $datewhere . ' ' . $userwhere . ' ' . $typewhere;
  $sth = mysql_query ($q);
  $row = mysql_fetch_array ($sth);
  $periodsum = $row['periodsum'];
  $q = '' . 'select sum(actual_amount) as sum from hm3_history where 1=1 ' . $userwhere . ' ' . $typewhere;
  $sth = mysql_query ($q);
  $row = mysql_fetch_array ($sth);
  $allsum = $row['sum'];
  echo '<s';
  echo 'cript language=javascript>
function go(p)
{
  document.trans.page.value = p;
  document.trans.submit();
}
</script>

<form method=post name=trans>
<input type=hidden name=a value=thistory>
<input type=hidden name=u_id value=\'';
  echo $frm['u_id'];
  echo '\'>
<input type=hidden name=page value=\'';
  echo $page;
  echo '\'>
<table cellspacing=0 cellpadding=0 border=0 width=100%>
<tr>
 <td>
	<b>Transactions history:</b>
	<br><img src=images/q.gif width=1 height=4><br>
	';
  echo '<s';
  echo 'elect name=ttype class=inpts onchange="document.trans.submit()">
		<option value="">All transactions
		<option value="add_funds" ';
  echo ($frm['ttype'] == 'add_funds' ? 'selected' : '');
  echo '>Transfers from e-gold
		<option value="deposit" ';
  echo ($frm['ttype'] == 'deposit' ? 'selected' : '');
  echo '>Deposits
		<option value="bonus" ';
  echo ($frm['ttype'] == 'bonus' ? 'selected' : '');
  echo '>Bonuses
		<option value="penality" ';
  echo ($frm['ttype'] == 'penality' ? 'selected' : '');
  echo '>Penalties
		<option value="earning" ';
  echo ($frm['ttype'] == 'earning' ? 'selected' : '');
  echo '>Earnings
		<option value="withdrawal" ';
  echo ($frm['ttype'] == 'withdrawal' ? 'selected' : '');
  echo '>Withdrawals
		<option value="withdraw_pending" ';
  echo ($frm['ttype'] == 'withdraw_pending' ? 'selected' : '');
  echo '>Request withdraws
		<option value="commissions" ';
  echo ($frm['ttype'] == 'commissions' ? 'selected' : '');
  echo '>Commisions
		<option value="early_deposit_release" ';
  echo ($frm['ttype'] == 'early_deposit_release' ? 'selected' : '');
  echo '>Deposit early releases
<!--		<option value="early_deposit_charge" ';
  echo ($frm['ttype'] == 'early_deposit_charge' ? 'selected' : '');
  echo '>Deposit releases commisions-->
		<option value="release_deposit" ';
  echo ($frm['ttype'] == 'release_deposit' ? 'selected' : '');
  echo '>Deposit returns
	</select>

 </td>
 <td align=right>
	From: ';
  echo '<s';
  echo 'elect name=month_from class=inpts>
';
  for ($i = 0; $i < sizeof ($month); ++$i)
  {
    echo '<option value=';
    echo $i + 1;
    echo ' ';
    echo ($i + 1 == $frm['month_from'] ? 'selected' : '');
    echo '>';
    echo $month[$i];
  }

  echo '        </select> &nbsp;
	';
  echo '<s';
  echo 'elect name=day_from class=inpts>
';
  for ($i = 1; $i <= 31; ++$i)
  {
    echo '<option value=';
    echo $i;
    echo ' ';
    echo ($i == $frm['day_from'] ? 'selected' : '');
    echo '>';
    echo $i;
  }

  echo '	</select> &nbsp;
	';
  echo '<s';
  echo 'elect name=year_from class=inpts>
';
  for ($i = $settings['site_start_year']; $i <= date ('Y', time () + $settings['time_dif'] * 60 * 60); ++$i)
  {
    echo '<option value=';
    echo $i;
    echo ' ';
    echo ($i == $frm['year_from'] ? 'selected' : '');
    echo '>';
    echo $i;
  }

  echo '	</select><br><img src=images/q.gif width=1 height=4><br>



	To: ';
  echo '<s';
  echo 'elect name=month_to class=inpts>
';
  for ($i = 0; $i < sizeof ($month); ++$i)
  {
    echo '<option value=';
    echo $i + 1;
    echo ' ';
    echo ($i + 1 == $frm['month_to'] ? 'selected' : '');
    echo '>';
    echo $month[$i];
  }

  echo '        </select> &nbsp;
	';
  echo '<s';
  echo 'elect name=day_to class=inpts>
';
  for ($i = 1; $i <= 31; ++$i)
  {
    echo '<option value=';
    echo $i;
    echo ' ';
    echo ($i == $frm['day_to'] ? 'selected' : '');
    echo '>';
    echo $i;
  }

  echo '	</select> &nbsp;
	';
  echo '<s';
  echo 'elect name=year_to class=inpts>
';
  for ($i = $settings['site_start_year']; $i <= date ('Y', time () + $settings['time_dif'] * 60 * 60); ++$i)
  {
    echo '<option value=';
    echo $i;
    echo ' ';
    echo ($i == $frm['year_to'] ? 'selected' : '');
    echo '>';
    echo $i;
  }

  echo '	</select>
 </td>
 <td>
	&nbsp; <input type=submit value="Go" class=sbmt>
 </td>
</tr></table>
</form>


<br><br>
<form method=post target=_blank name=massform>
<input type=hidden name=a value=mass>
<input type=hidden name=action value=mass>
<input type=hidden name=action2 value=\'\'>


';
  if (($frm['ttype'] == 'withdraw_pending' AND $frm['say'] == 'yes'))
  {
    echo 'Withdrawal has been sent<br><br>
';
  }

  if (($frm['ttype'] == 'withdraw_pending' AND $frm['say'] == 'no'))
  {
    echo 'Withdrawal has not been sent<br><br>
';
  }

  echo '
';
  if ($frm['say'] == 'massremove')
  {
    print 'Pending transactions removed!<br><br>';
  }

  if ($frm['say'] == 'massprocessed')
  {
    print 'Pending transactions selected as processed!<br><br>';
  }

  echo '

<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <td bgcolor=FFEA00 align=center><b>User</b></td>
 <td bgcolor=FFEA00 align=center width=200><b>Amount</b></td>
 <td bgcolor=FFEA00 align=center width=170><b>Date</b></td>
</tr>
';
  if (0 < sizeof ($trans))
  {
    for ($i = 0; $i < sizeof ($trans); ++$i)
    {
      echo '<tr onMouseOver="bgColor=\'#FFECB0\';" onMouseOut="bgColor=\'\';">
 <td>';
      echo ($frm['ttype'] == 'withdraw_pending' ? '<input type=checkbox name=pend[' . $trans[$i]['id'] . '] value=1> &nbsp; ' : '');
      echo '<b>';
      echo $trans[$i]['username'];
      echo '</b></td>
 <td width=200 align=right><b>$';
      echo number_format (abs ($trans[$i]['actual_amount']), 2);
      echo '</b>';
      echo ($frm['ttype'] == 'withdraw_pending' ? ' &nbsp; <a href=?a=pay_withdraw&id=' . $trans[$i]['id'] . ' target=_blank>[pay]</a> <a href=?a=rm_withdraw&id=' . $trans[$i]['id'] . ' onClick="return confirm(\'Really need delete this transaction?\')">[remove]</a>' : '');
      echo '<img src="images/';
      echo $trans[$i]['ec'];
      echo '.gif" align=absmiddle></td>
 <td width=170 align=center valign=bottom><b>';
      echo '<s';
      echo 'mall>';
      echo $trans[$i]['d'];
      echo '</small></b></td>
</tr>
<tr>
 <td colspan=3 style="color: gray">';
      echo '<s';
      echo 'mall><b>';
      echo $transtype[$trans[$i]['type']];
      echo ': &nbsp; </b>';
      echo $trans[$i]['description'];
      echo '</small</td>
</tr>
';
    }

    echo '<tr>
 <td colspan=2><b>Total for this period:</b></td>
 <td align=right><b>$ ';
    echo number_format ((($frm['ttype'] == 'deposit' OR $frm['ttype'] == 'withdraw_pending') ? '-1' : '1') * $periodsum, 2);
    echo '</b></td>
</tr>
';
  }
  else
  {
    echo '<tr>
 <td colspan=3 align=center>No transactions found</td>
</tr>
';
  }

  echo '<tr>
 <td colspan=2><b>Total for all time:</b></td>
 <td align=right><b>$ ';
  echo number_format ((($frm['ttype'] == 'deposit' OR $frm['ttype'] == 'withdraw_pending') ? '-1' : '1') * $allsum, 2);
  echo '</b></td>
</tr>
</table>

';
  if ($frm['ttype'] == 'withdraw_pending')
  {
    echo '<br><center>
';
    echo '<s';
    echo 'cript language=javascript>
function func2() {
  document.massform.action2.value=\'massremove\';
  if (confirm("Are you sure remove those withdraw?\\n\\nFunds will be returned to users\\\'s system accounts.")) {
    document.massform.submit();
  }
}
function func3() {
  document.massform.action2.value=\'masssetprocessed\';
  if (confirm("Are you sure set those request as processed?\\n\\nNo funds will be sent';
    echo ' to user\\\'s egold accounts!")) {
    document.massform.submit();
  }
}
function func4() {
  document.massform.action2.value=\'masscsv\';
  document.massform.submit();
}
</script>
<input type=button value="Remove selected" class=sbmt onClick="func2();"> &nbsp; 
<input type=button value="Set selected as processed" class=sbmt onClick="func3();">&nbsp; 
<input type=button value="Export to CSV selected" clas';
    echo 's=sbmt onClick="func4();">
</center><br>
';
  }

  echo '</form>

<center>
';
  if (1 < $colpages)
  {
    for ($i = 1; $i <= $colpages; ++$i)
    {
      if ($i == $page)
      {
        echo '   ';
        echo $i;
        continue;
      }
      else
      {
        echo '   <a href="javascript:go(\'';
        echo $i;
        echo '\')">';
        echo $i;
        echo '</a>
';
        continue;
      }
    }
  }

  echo '</center>

<br>
';
  echo start_info_table ('100%');
  echo 'Transaction history:<br>
Every transaction in the script has own type.<br>
Transfer from e-gold. This transaction will appear in system when user deposit money from e-gold.<br>
Deposit. This transaction will appear in system when user deposit money from e-gold or account.<br>
Bonus. This transaction will appear when admin add bonus to user.<br>
Penalty. This transaction will appear when admin make pena';
  echo 'lity for user.<br>
Earning. This transaction will appear when user receive earning.<br>
Withdraw. This transaction will appear when admin withdraw funds to user e-gold account.<br>
Request withdraw. This transaction will appear when user ask for withdraw.<br>
Early deposit release. Admin can release deposit or part of deposit to user account.<br>
Referal commissions. This transaction will appear when u';
  echo 'ser register from referal link and deposit funds from e-gold account.<br><br>

Top left select helps you select only transactions you interested.<br>
Top right select helps you select transactions for period you interested.<br><br>
';
  if ($frm['ttype'] == 'withdraw_pending')
  {
    echo '\'Remove selected\' - this button allow you remove requested withdrawals. Funds will be returned to user account.<br>
\'Set selected as processed\' - if you use third party mass pay script, you can pay to user\'s e-gold account and then set request as processed using this button<br>
\'Export to CSV selected\' - provide scv file for third party mass pay scripts.<br>

';
  }

  echo '

';
  echo end_info_table ();
?>
