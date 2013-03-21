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


  $frm['lid'] = intval ($frm['lid']);
  $q = 'select * from hl_listings where id = ' . $frm['lid'];
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $listing = mysql_fetch_array ($sth);
  if (!$listing)
  {
    print 'Invalid listing id';
    exit ();
  }

  $q = 'select *, date_format(date, \'%b %D, %Y\') as fdate from hl_statistics where listing_id = ' . $frm['lid'] . ' order by date';
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $stats = array ();
  $payouts = 0;
  $countall = 0;
  while ($row = mysql_fetch_array ($sth))
  {
    array_push ($stats, $row);
    ++$countall;
    if ($row['type'] == 1)
    {
      $profit += $row['amount'];
      ++$payouts;
    }

    if ($row['type'] == 0)
    {
      $spend += $row['amount'];
      continue;
    }
  }

  if ($spend != 0)
  {
    $ratio = sprintf ('%.02f', $profit / $spend);
  }
  else
  {
    $ratio = sprintf ('%.02f', 0);
  }

  echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>HYIP Lister. Basic version.</title>
<link href="images/adminstyle.css" rel="stylesheet" type="text/css">
';
  echo '<s';
  echo 'cript><!--
function inverse()
{
  for (i = 0; i < document.list.elements.length; i++)
  {
    if (document.list.elements[i].type == \'checkbox\')
    {
      document.list.elements[i].checked = !document.list.elements[i].checked;
    }
  }
}
--></script>
</head>

<body bgcolor="#FFFFF2" link="#666699" vlink="#666699" alink="#666699" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
<center>
';
  echo '<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <td colspan=4>Payout Statistics for <b>';
  echo $listing['name'];
  echo '</b></td>
</tr>
<tr>
 <td colspan=4>
  ';
  if ($listing['hyip_status'] == 1)
  {
    echo '<img src="images/m_pay.gif" border=0 alt="Paying" title="Paying" align=absmiddle>';
  }

  echo '  ';
  if ($listing['hyip_status'] == 2)
  {
    echo '<img src="images/m_wait.gif" border=0 alt="Waiting" title="Waiting" align=absmiddle>';
  }

  echo '  ';
  if ($listing['hyip_status'] == 3)
  {
    echo '<img src="images/m_prob.gif" border=0 alt="Problem" title="Problem" align=absmiddle>';
  }

  echo '  ';
  if ($listing['hyip_status'] == 4)
  {
    echo '<img src="images/m_npay.gif" border=0 alt="Not Paying" title="Not Paying" align=absmiddle>';
  }

  echo ' </td>
</tr>
<tr>
 <td colspan=4>Payouts Ratio: <b>';
  echo $ratio;
  echo ' ';
  echo (1 <= $ratio ? '<font color=red>in profit</font>' : '');
  echo '</b></td>
</tr>
<tr>
 <td colspan=4>Payouts Found: <b>';
  echo $payouts;
  echo '</b></td>
</tr>
</table>

<form method=post>
<input type="hidden" name="a" value="add_trunsaction">
<input type="hidden" name="lid" value="';
  echo $frm['lid'];
  echo '">
<table cellspacing=1 cellpadding=2 border=0 width=100>
<tr>
 <td bgcolor=FFEA00 colspan=4 align=center><b>Add Transaction</b></td>
</tr>
<tr>
 <td bgcolor=FFEA00 align=center><b>Type</b></td>
 <td bgcolor=FFEA00 align=center><b>Date</b></td>
 <td bgcolor=FFEA00 align=center><b>Amount</b></td>
 <td bgcolor=FFEA00 align=center><b>Batch</b></td>
</tr>
<tr>
 <td bgcolor=FFF9B3>
  ';
  echo '<s';
  echo 'elect name="type" class=inpts>
   <option value=1>Payout</option>
   <option value=0 ';
  echo ($countall == 0 ? 'selected' : '');
  echo '>Spend</option>
  </select>
 </td>
';
  $date = get_date_arrays ('', '', '', 5, 5);
  echo ' <td bgcolor=FFF9B3 nowrap>
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
 <td bgcolor=FFF9B3>
  <input type="text" name="amount" size=7 class=inpts>
 </td>
 <td bgcolor=FFF9B3>
  <input type="text" name="batch" size=7 class=inpts>
 </td>
</tr>
 <td colspan=4 bgcolor=FFF9B3>
  <b>Comment:</b><br>
  <input type="text" name="comment" size=45 class=inpts>
  <input type="submit" value="Add" class=sbmt>
 </td>
</tr>
</tr>
</table>
</form>

<form method=post name=list onsubm';
  echo 'it="return confirm(\'Do you really want to delete this trunsaction(s)?\')">
<input type="hidden" name="a" value="delete_trunsactions">
<input type="hidden" name="lid" value="';
  echo $frm['lid'];
  echo '">
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <td bgcolor=FFEA00 align=center><a href="javascript:inverse()"><b>#</b></a></td>
 <td bgcolor=FFEA00 align=center><b>Date</b></td>
 <td bgcolor=FFEA00 align=center><b>Amount</b></td>
 <td bgcolor=FFEA00 align=center><b>Batch</b></td>
</tr>
';
  if (0 < sizeof ($stats))
  {
    foreach ($stats as $line)
    {
      echo '<tr>
 <td bgcolor=FFF9B3 align=center><input type="checkbox" name="delete[';
      echo $line['id'];
      echo ']" value=1></td>
 <td bgcolor=FFF9B3>';
      echo $line['fdate'];
      echo '</td>
 <td bgcolor=FFF9B3>$';
      echo number_format ($line['amount'], 2);
      echo '</td>
 <td bgcolor=FFF9B3>';
      echo $line['batch'];
      echo '</td>
</tr>
<tr>
 <td colspan=4 bgcolor=FFF9B3>';
      echo $line['comment'];
      echo '</td>
</tr>
';
    }

    echo '<tr>
<td colspan=4><input type="submit" value="Delete" class=sbmt></td>
</tr>
';
  }
  else
  {
    echo '<tr>
 <td bgcolor=FFF9B3 colspan=4 align=center>No Payouts.</td>
</tr>
';
  }

  echo '</form>
</table>
</center></body>
</html>
';
?>
