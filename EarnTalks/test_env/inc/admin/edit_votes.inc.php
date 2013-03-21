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

  $q = 'select *, date_format(date, \'%b %D, %Y\') as fdate from hl_votes where listing_id = ' . $frm['lid'] . ' order by confirm desc, date desc';
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $votes = array ();
  $payouts = 0;
  $countall = 0;
  while ($row = mysql_fetch_array ($sth))
  {
    ++$countall;
    array_push ($votes, $row);
  }

  $votes_summary = array ('0' => 0, '1' => 0, '2' => 0, '3' => 0);
  $votes_all = 0;
  $avg_vote = '0.0';
  $q = 'select count(*) as cvotes, vote from hl_votes where listing_id = ' . $frm['lid'] . ' and confirm = \'0\' group by vote';
  if (!($ssth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  while ($srow = mysql_fetch_array ($ssth))
  {
    $votes_all += $srow['cvotes'];
    $votes_summary[$srow['vote']] = $srow['cvotes'];
  }

  if (0 < $votes_all)
  {
    $avg_vote = sprintf ('%.01f', ($votes_summary['3'] * 10 + $votes_summary['2'] * 5 + $votes_summary['1'] * 0 + $votes_summary['0'] * -5) / $votes_all);
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
 <td colspan=4>Votes for <b>';
  echo $listing['name'];
  echo '</b></td>
</tr>
<tr>
 <td colspan=4>Votes Total: <b>';
  echo $votes_all;
  echo '</b></td>
</tr>
<tr>
 <td colspan=4>Average Vote: <b>';
  echo $avg_vote;
  echo '</b></td>
</tr>
</table>
<table cellspacing=0 cellpadding=2 border=0 width=100%>
<tr>
  <td align=center width=25%>
   <img src="images/r3.gif" alt="Very Good" title="Very Good"><br>
   Very Good<br>
   <b>';
  echo $votes_summary['3'];
  echo ' votes</b>
  </td>
  <td align=center width=25%>
   <img src="images/r2.gif" alt="Good" title="Good"><br>
   Good<br>
   <b>';
  echo $votes_summary['2'];
  echo ' votes</b>
  </td>
  <td align=center width=25%>
   <img src="images/r1.gif" alt="Bad" title="Bad"><br>
   Bad<br>
   <b>';
  echo $votes_summary['1'];
  echo ' votes</b>
  </td>
  <td align=center width=25%>
   <img src="images/r0.gif" alt="Very Bad" title="Very Bad"><br>
   Very Bad<br>
   <b>';
  echo $votes_summary['0'];
  echo ' votes</b>
  </td>
</tr>
</table>

<form method=post name=list>
<input type="hidden" name="a" value="delete_votes">
<input type="hidden" name="lid" value="';
  echo $frm['lid'];
  echo '">
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <td bgcolor=FFEA00 align=center><a href="javascript:inverse()"><b>#</b></a></td>
 <td bgcolor=FFEA00 align=center><b>Vote</b></td>
 <td bgcolor=FFEA00 align=center><b>Date</b></td>
 <td bgcolor=FFEA00 align=center><b>E-Mail</b></td>
 <td bgcolor=FFEA00 align=center><b>IP</b></td>
</tr>
';
  if (0 < sizeof ($votes))
  {
    foreach ($votes as $line)
    {
      echo '<tr>
 <td bgcolor=FFF9B3 align=center><input type="checkbox" name="delete[';
      echo $line['id'];
      echo ']" value=1></td>
 <td bgcolor=FFF9B3>
   ';
      if ($line['vote'] == 0)
      {
        echo '<img src="images/r0.gif" alt="Very Bad" title="Very Bad">';
      }

      echo '   ';
      if ($line['vote'] == 1)
      {
        echo '<img src="images/r1.gif" alt="Bad" title="Bad">';
      }

      echo '   ';
      if ($line['vote'] == 2)
      {
        echo '<img src="images/r2.gif" alt="Good" title="Good">';
      }

      echo '   ';
      if ($line['vote'] == 3)
      {
        echo '<img src="images/r3.gif" alt="Very Good" title="Very Good">';
      }

      echo '
 </td>
 <td bgcolor=FFF9B3>';
      echo $line['fdate'];
      echo '</td>
 <td bgcolor=FFF9B3>';
      echo $line['email'];
      echo '</td>
 <td bgcolor=FFF9B3>';
      echo $line['ip'];
      echo '</td>
</tr>
';
      if ($line['comment'])
      {
        echo '<tr>
 <td bgcolor=FFF9B3 colspan=5>';
        echo ($line['confirm'] ? '<font color="red"><b>NOT CONFIRMED</b></font>' : '');
        echo ' <img src="images/vcom.gif"> ';
        echo $line['comment'];
        echo '</td>
</tr>
';
        continue;
      }
    }

    echo '<tr>
<td colspan=4><input type="submit" value="Delete" class=sbmt></td>
</tr>
';
  }
  else
  {
    echo '<tr>
 <td bgcolor=FFF9B3 colspan=4 align=center>No Votes.</td>
</tr>
';
  }

  echo '</form>
</table>
</center></body>
</html>
';
?>
