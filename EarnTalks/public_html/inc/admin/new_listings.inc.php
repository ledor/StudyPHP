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


  $frm['gid'] = intval ($frm['gid']);
  $q = 'select 
               hl_groups.*,
               sum(hl_listings.status = 2) as cnew
        from
               hl_groups left outer join hl_listings
               on hl_groups.id = hl_listings.group_id
        group  by
               hl_groups.id
       ';
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $groups = array ();
  $group = '';
  while ($row = mysql_fetch_array ($sth))
  {
    if (($row['id'] == 1 OR $frm['gid'] == $row['id']))
    {
      $group = $row;
    }

    array_push ($groups, $row);
  }

  $q = 'select count(*) as count 
        from
               hl_listings
        where
               group_id = ' . $group['id'] . ' and
               status = 2
       ';
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $row = mysql_fetch_array ($sth);
  $count_all = $row['count'];
  $onpage = 30;
  $page = $frm['p'];
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
  $q = 'select *, 
               date_format(date_added, \'%b %D, %Y\') as added,
               date_format(date_closed, \'%b %D, %Y\') as closed
        from
               hl_listings
        where
               group_id = ' . $group['id'] . ('' . ' and
               status = 2
        order by id
        limit ' . $from . ', ' . $onpage . '
       ');
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $listings = array ();
  while ($row = mysql_fetch_array ($sth))
  {
    $q = 'select sum(amount * type) as payout, sum(amount * !type) as spend from hl_statistics where listing_id = ' . $row['id'];
    if (!($ssth = mysql_query ($q)))
    {
      exit (mysql_error ());
      ;
    }

    $srow = mysql_fetch_array ($ssth);
    $row['ratio'] = ($srow['spend'] != 0 ? sprintf ('%.02f', $srow['payout'] / $srow['spend']) : '0.00');
    $row['spend'] = number_format ($srow['spend'], 2);
    $votes_summary = array ('0' => 0, '1' => 0, '2' => 0, '3' => 0);
    $votes_all = 0;
    $avg_vote = '0.0';
    $q = 'select count(*) as cvotes, vote from hl_votes where listing_id = ' . $row['id'] . ' and confirm = \'0\' group by vote';
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
      $avg_vote = sprintf ('%.01f', ($votes_summary['3'] * 10 + $votes_summary['2'] * 5 - $votes_summary['1'] * 0 - $votes_summary['0'] * -5) / $votes_all);
    }

    $row['avg_vote'] = $avg_vote;
    $row['cvotes'] = $votes_all;
    $q = 'select sum(`in`) as tin, sum(`out`) as tout from hl_traffic where listing_id = ' . $row['id'] . ' and date + interval ' . $settings['traffic_count_days'] . ' day > now()';
    if (!($ssth = mysql_query ($q)))
    {
      exit (mysql_error ());
      ;
    }

    $traffic = mysql_fetch_array ($ssth);
    $row['in'] = intval ($traffic['tin']);
    $row['out'] = intval ($traffic['tout']);
    $row['traffic_ratio'] = ($traffic['tout'] == 0 ? '0.0' : sprintf ('%.01f', $traffic['tin'] / $traffic['tout']));
    array_push ($listings, $row);
  }

  echo '<s';
  echo 'cript language="javascript"><!--
function editStatistics(id)
{
  w = 400; h = 600;
  t = (screen.height-h-30)/2;
  l = (screen.width-w-30)/2;
  window.open(\'?a=edit_statistics&lid=\' + id, \'edit_statistics\' + id, "top="+t+",left="+l+",width="+w+",height="+h+",resizable=1,scrollbars=1");
}
function editVotes(id)
{
  w = 400; h = 600;
  t = (screen.height-h-30)/2;
  l = (screen.width-w-30)/2;
  window';
  echo '.open(\'?a=edit_votes&lid=\' + id, \'edit_votes\' + id, "top="+t+",left="+l+",width="+w+",height="+h+",resizable=1,scrollbars=1");
}
--></script>

<form name="grps"><input type=hidden name=a value=new_listings>
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
  <td><b>Waiting Approval Listings: ';
  echo $group['name'];
  echo ' (';
  echo $group['type'];
  echo ')</b></td>
 <td width=1% nowrap>';
  echo '<s';
  echo 'elect name="gid" class=inpts onchange="document.grps.submit()">
';
  foreach ($groups as $grp)
  {
    echo '                                                                        
  <option value="';
    echo $grp['id'];
    echo '" ';
    echo ($grp['id'] == $group['id'] ? 'selected' : '');
    echo '>';
    echo $grp['name'];
    echo ' (' . $grp['cnew'] . ')';
    echo ($grp['status'] ? '' : ' (disabled)');
    echo '</option>
';
  }

  echo '     </select> <input type="submit" value="GO" class=sbmt></td>
</tr>
</table>
</form>

<table cellspacing=1 cellpadding=2 border=0 width=100%>
';
  if (0 < sizeof ($listings))
  {
    foreach ($listings as $list)
    {
      $payments = preg_split ('/,/', $list['pay_systems']);
      echo '<tr>
 <td>
  <table cellspacing=0 cellpadding=1 border=0 width=100%><tr><td bgcolor=FFF9B3>
   <table cellspacing=0 cellpadding=2 border=0 bgcolor=#FFFFFF width=100%>
    <tr>
     <td valign=top width=33% nowrap>
       <a href="';
      echo $list['url'];
      echo '" target=_blank><b>';
      echo $list['name'];
      echo '</b></a>
       ';
      echo ($list['confirm'] ? '<br><font color="red"><b>Not Confirmed</b></font>' : '');
      echo '       <br>
       Paying Status: 
               ';
      if ($list['hyip_status'] == 1)
      {
        echo '<img src="images/m_pay.gif" border=0 alt="Paying" title="Paying" align=absmiddle>';
      }

      echo '               ';
      if ($list['hyip_status'] == 2)
      {
        echo '<img src="images/m_wait.gif" border=0 alt="Waiting" title="Waiting" align=absmiddle>';
      }

      echo '               ';
      if ($list['hyip_status'] == 3)
      {
        echo '<img src="images/m_prob.gif" border=0 alt="Problem" title="Problem" align=absmiddle>';
      }

      echo '               ';
      if ($list['hyip_status'] == 4)
      {
        echo '<img src="images/m_npay.gif" border=0 alt="Not Paying" title="Not Paying" align=absmiddle>';
      }

      echo '        <br>
       Our Investment: <b>';
      echo $list['spend'];
      echo '</b><br>
       Payout Ratio: <nobr><b>';
      echo $list['ratio'];
      echo ' <font color="#FF0000">';
      echo (1 <= $list['ratio'] ? 'in profit' : '');
      echo '</font></b></nobr><br>
       <a href="javascript:editStatistics(\'';
      echo $list['id'];
      echo '\')">Manage Payouts</a><br>
       <!--a href="#">Program Details</a><br-->
       <a href="mailto:';
      echo $list['email'];
      echo '">Contact</a><br>
       <br>
     </td>
     <td valign=top width=33% nowrap>
       <b>';
      echo $list['percents'];
      echo '</b><br>
                  Minimal Spend: <b> 
                  ';
      echo $list['min_spend'];
      echo '                  </b><br>
                  Maximal Spend: <b> 
                  ';
      echo ($list['max_spend'] ? $list['max_spend'] : 'No Limit');
      echo '                  </b><br>
       Referral:  <b>';
      echo ($list['referral'] ? $list['referral'] : 'No');
      echo '</b><br>
       Withdrawal: <b>';
      if ($list['withdrawal_type'] == 1)
      {
        echo 'Manual';
      }

      if ($list['withdrawal_type'] == 2)
      {
        echo 'Instant';
      }

      if ($list['withdrawal_type'] == 3)
      {
        echo 'Automatic';
      }

      echo '</b><br>
       <br>
     </td>
     <td valign=top width=33% nowrap>
       Our Rating: ';
      for ($i = 1; $i <= 5; ++$i)
      {
        if ($i <= intval ($list['rating']))
        {
          echo '<img src="images/full_star.gif" align=absmiddle>';
          continue;
        }
        else
        {
          echo '<img src="images/empty_star.gif" align=absmiddle>';
          continue;
        }
      }

      echo '<br>
       Votes: <b>';
      echo $list['avg_vote'];
      echo ' - ';
      echo $list['cvotes'];
      echo ' votes</b><br>
       <a href="javascript:editVotes(\'';
      echo $list['id'];
      echo '\')">Manage Votes</a><br>
';
      if ((((($list['support_email'] OR $list['support_form']) OR $list['support_forum']) OR $list['support_phone']) OR $list['support_aim']))
      {
        echo '       Support: 
               ';
        if ($list['support_email'])
        {
          echo '<a href="mailto:';
          echo $list['support_email'];
          echo '"><img src="images/smail.gif" border=0 alt="Support E-Mail" title="Support E-Mail" align=absmiddle></a>';
        }

        echo '               ';
        if ($list['support_form'])
        {
          echo '<a href="';
          echo $list['support_form'];
          echo '" target=_blank><img src="images/sform.gif" border=0 alt="Support Form" title="Support Form" align=absmiddle></a>';
        }

        echo '               ';
        if ($list['support_forum'])
        {
          echo '<a href="';
          echo $list['support_forum'];
          echo '" target=_blank><img src="images/sforum.gif" border=0 alt="Support Forum" title="Support Forum" align=absmiddle></a>';
        }

        echo '               ';
        if ($list['support_phone'])
        {
          echo '<img src="images/sphone.gif" border=0 alt="Phone: ';
          echo $list['support_phone'];
          echo '" title="Phone: ';
          echo $list['support_phone'];
          echo '" align=absmiddle>';
        }

        echo '               ';
        if ($list['support_aim'])
        {
          echo '<img src="images/smsn.gif" border=0 alt="';
          echo $list['support_aim'];
          echo '" title="';
          echo $list['support_aim'];
          echo '" align=absmiddle>';
        }

        echo '       <br>
';
      }

      echo '       Added: <b>';
      echo $list['added'];
      echo '</b><br>
       In: <b>';
      echo $list['in'];
      echo '</b> Out: <b>';
      echo $list['out'];
      echo '</b> Ratio: <b>';
      echo $list['traffic_ratio'];
      echo '</b>
       <br>
     </td>
     <td valign=top width=33%>
       <a href="?a=approve_listing&lid=';
      echo $list['id'];
      echo '&gid=';
      echo $frm['gid'];
      echo '&p=';
      echo $frm['p'];
      echo '&return=new_listings">[approve]</a><br>
       <a href="?a=decline_listing&lid=';
      echo $list['id'];
      echo '&gid=';
      echo $frm['gid'];
      echo '&p=';
      echo $frm['p'];
      echo '&return=new_listings">[decline]</a><br>
       <a href="?a=edit_listing&lid=';
      echo $list['id'];
      echo '&gid=';
      echo $frm['gid'];
      echo '&p=';
      echo $frm['p'];
      echo '&return=new_listings">[edit]</a><br>
       <a href="?a=delete_listing&lid=';
      echo $list['id'];
      echo '&gid=';
      echo $frm['gid'];
      echo '&p=';
      echo $frm['p'];
      echo '&return=new_listings" onclick="return confirm(\'Do you really want to delete this listing?\')">[delete]</a><br>
       <br>
     </td>
    </tr>
    <tr>
      <td colspan=4>';
      echo $list['description'];
      echo '</td>
    </tr>
    <tr>
      <td colspan=4 nowrap>';
      foreach ($payments as $pay)
      {
        echo '<img src="images/';
        echo $pay;
        echo '.gif" align=absmiddle alt="';
        echo $pay;
        echo '" title="';
        echo $pay;
        echo '"> ';
      }

      echo '</td>
    </tr>
   </table>
  </td></tr></table>
 </td>
</tr>
';
    }
  }
  else
  {
    echo '<tr>
 <td bgcolor=FFF9B3 colspan=4>No Listings found.</td>
</tr>
';
  }

  echo '</table>
<br>
<center>
';
  if (1 < $colpages)
  {
    if (1 < $page)
    {
      echo ' <a href="?a=listings&gid=';
      echo $frm['gid'];
      echo '&p=';
      echo $page - 1;
      echo '">&lt;&lt;</a> ';
    }

    for ($i = 1; $i <= $colpages; ++$i)
    {
      if ($i == $page)
      {
        echo ' <b>';
        echo $i;
        echo '</b> ';
        continue;
      }
      else
      {
        echo ' <a href="?a=listings&gid=';
        echo $frm['gid'];
        echo '&p=';
        echo $i;
        echo '">';
        echo $i;
        echo '</a> ';
        continue;
      }
    }

    if ($page < $colpages)
    {
      echo ' <a href="?a=listings&gid=';
      echo $frm['gid'];
      echo '&p=';
      echo $page + 1;
      echo '">&gt;&gt;</a> ';
    }
  }

  echo '</center>


';
?>
