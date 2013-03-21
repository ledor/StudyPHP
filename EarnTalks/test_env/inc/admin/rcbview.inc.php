<?

{ 

  global $page;
  $page = $frm['page'];
$frm['lid'] = intval ($frm['lid']);

$i=0;


if ($frm['lid'])
{
$qa = 'select * from hl_rcbrate where program_id='.$frm['lid'];
$sthqa = mysql_query ($qa);

if (mysql_num_rows($sthqa) > 0)
{

echo '<table border="1" width="100%" id="table2" style="border-collapse: collapse; border-color: #008000"  bordercolordark="#008000" bordercolorlight="#008000">

<form method="POST" >
<input type="hidden" name="a" value="edit_rcb" />
<input type="hidden" name="lid" value="'.$frm['lid'].'">';



$q = 'SELECT * FROM `hl_rcbrate` WHERE type="FD" and program_id ='.$frm['lid'].' order by textid';
$sthq = mysql_query ($q);



$qq = 'SELECT used,ref FROM `hl_rcbrate` WHERE type="FD" and program_id ='.$frm['lid'];
$sthqq = mysql_query ($qq);
$rowqq = mysql_fetch_array ($sthqq);

$qdepositout = 'SELECT sum(amount) AS amount, B.name FROM hl_statistics AS A, hl_listings AS B WHERE B.id = A.listing_id
AND A.type =0 and B.id='.$frm['lid'].'  GROUP BY A.type';
$sthqdepositout = mysql_query ($qdepositout);
$rowqdepositout = mysql_fetch_array ($sthqdepositout);
$depositout = $rowqdepositout['amount'];

$qreceivein = 'SELECT sum(amount) AS amount, B.name as name FROM hl_statistics AS A, hl_listings AS B WHERE B.id =  A.listing_id
AND A.type =1 and B.id='.$frm['lid'].'  GROUP BY A.type';
$sthqreceivein = mysql_query ($qreceivein);
$rowqreceivein = mysql_fetch_array ($sthqreceivein);
$receivein = $rowqreceivein['amount'];
$programname = $rowqreceivein['name'];


$qrcbpaidout = 'SELECT round(sum(rcb),2) AS amount FROM hl_rcbreport where lid='.$frm['lid'];
$sthqrcbpaidout = mysql_query ($qrcbpaidout);
$rowqrcbpaidout = mysql_fetch_array ($sthqrcbpaidout);
$rcbpaidout = $rowqrcbpaidout['amount'];

$qrcbdeposit = 'SELECT sum(deposit) AS amount FROM hl_rcbreport where lid='.$frm['lid'];
$sthqrcbdeposit = mysql_query ($qrcbdeposit);
$rowqrcbdeposit = mysql_fetch_array ($sthqrcbdeposit);
$rcbdeposit = $rowqrcbdeposit['amount'];
$netearn = $receivein - $rcbpaidout;



echo '<tr><td colspan=11>Deposit:<b>'.$depositout.'</b> Received:<b>'.$receivein.'</b> RCB Deposit:<b>'.$rcbdeposit.'</b> RCB  Paidout:<b>'.$rcbpaidout.'</b> NetEarn:<b>'. $netearn .'</b><br>

(Above only for Reference,Not counted /ListingFee/BannerFee/ if you have.) </td></tr>';

echo '<tr><td colspan=10>RCB For Program  <b>'.$programname.'</b></td></tr>';


echo '<tr><td colspan=11>';

$q = 'SELECT * FROM `hl_rcbrate` WHERE type="LD" and program_id ='.$frm['lid'].' order by textid';
$sthq = mysql_query ($q);

echo '<tr><td colspan=10><input type="radio" value="V2" name="R1"';

$qq = 'SELECT used,onhold FROM `hl_rcbrate` WHERE type="LD" and program_id ='.$frm['lid'];
$sthqq = mysql_query ($qq);
$rowqq = mysql_fetch_array ($sthqq);


if ($rowqq['used']==1) 
{
echo 'checked ';
}

echo '>Level Deposit Mode:</td></tr>



                 <tr>
                        <td width="5%" rowspan="2"> </td>
                        <td width="25%" rowspan="2" align="center">Deposit In</td>
			<td width="10%" rowspan="2" align="center">Ref</td>
			<td width="30%" align="center" colspan="2">1st Deposit</td>
			<td width="30%" colspan="2" align="center">Re-Invested</td>
		</tr>
		<tr>
			<td align="center">RCB</td>
			<td align="center">Bonus</td>
			<td align="center">RCB</td>
			<td align="center">Bonus</td>
		</tr>



';

while ($rowq=mysql_fetch_array ($sthq))
{
$i=$i+1;
	echo '<tr>
                      <td  align="center">'.$i .'</td>
			<td  align="center" >$<input type="text" class=inpts name="Td['.$i.']" size="3" value="'.$rowq['depositfrom'].'">- $<input type="text" class=inpts name="Te['.$i.']" size="3" value="'.$rowq['depositto'].'"></td>
			<td align="center" ><input type="text" class=inpts name="Tr['.$i.']"  size="3" value="'.$rowq['ref'].'">%</td>

			<td align="center" ><input type="text" class=inpts name="Tb['.$i.']" size="3" value="'.$rowq['rcb'].'">%</td>
			<td align="center" >$<input type="text" class=inpts name="Tc['.$i.']" size="3" value="'.$rowq['bonus'].'"></td>
			<td align="center" ><input type="text" class=inpts name="Tf['.$i.']" size="3" value="'.$rowq['rcb2'].'">%</td>
			<td align="center" >$<input type="text" class=inpts name="Tg['.$i.']" size="3" value="'.$rowq['bonus2'].'">  

<input type="hidden" name="Ta['.$i.']" size="3" class=inpts value="'.$rowq['deposit'].'">

	
</td></tr>';

}







echo '<tr><td colspan=11><input type="submit" name="action" value="update" ><input type="submit" name="action" value="';

if ($rowqq['onhold']==0)
{
echo 'set as onhold';
}
else
{
echo 'set_as_used';
}

echo '" ><input type="submit" name="action" value="delete" onclick="return confirm(\'Do you really want to delete this  record?\')"></td></tr>
</form></table>';

}

}



else

{




  $frm['gid'] = intval ($frm['gid']);
  $r1 = 'select count(*) as unpaid from hl_rcbreport where status like "%waiting%"';
  $rsth1 = mysql_query ($r1);
  $rrow1 = mysql_fetch_array ($rsth1);  

  $r2 = 'select count(*) as paid from hl_rcbreport where status like "%paid%"';
  $rsth2 = mysql_query ($r2);
  $rrow2 = mysql_fetch_array ($rsth2);  


echo ' 

<form name="rcbs"><input type=hidden name=a value=rcbview>
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
  <td><b>RCB View: Unpaid';
  echo '(';
  echo $rrow1['unpaid'];
  echo ') Paid(';
  echo $rrow2['paid'];
  echo ')
</b></td>
 <td width=1% nowrap>';

  echo '<select name="paidunpaid" class=inpts onchange="document.rcbs.submit()">
';
  
  echo '  <option value="0" ';
  if ($frm['paidunpaid'] == 0) 
  {
  echo 'selected ';
  }

  echo '>Unpaid</option>';

  echo '  <option value="1" ';
  if ($frm['paidunpaid'] == 1) 
  {
  echo 'selected ';
  }
  echo '>Paid</option>';
  echo '     </select> <input type="submit" value="GO" class=sbmt></td>
</tr>
</table>
';




function paid($page)
{
 $q = 'select count(*) as calld from hl_rcbreport where status like "%paid%"';   
  if (!($sth = mysql_query ($q)))
  {
    print mysql_error ();
    ;
  }

  $row = mysql_fetch_array ($sth);
  $count_all = $row['calld'];


  $onpage = 30;
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



     $status2='paid';
     $q2 = 'select A.*,B.name as name from hl_rcbreport as A,hl_listings as B where A.lid=B.id and A.status like  "%'.$status2.'%" order by date desc limit ' . $from . ', ' . $onpage;
   $sth2 = mysql_query ($q2);
   echo '<br><br><b>Paid</b><table cellspacing=0 cellpadding=1 border=1 width=100% bgcolor=#FFFFFF>';
   echo '<tr><td>Date</td><td>Program</td><td>User</td><td>Deposit/RCB</td><td>EC-No</td><td>IP/Lang</td><td  align=center>Option</td></tr>';
 
 
   if (mysql_num_rows($sth2) > 0)
    {
    while ($row2 = mysql_fetch_array ($sth2))
      {
      echo '<tr>
           <td>'.$row2['date'].'</td>
           <td>'.$row2['name'].'</td>
           <td>'.$row2['username'].'</td>
           <td>$'.$row2['deposit'].'/$'.$row2['rcb'].'</td>
           <td>'.$row2['ec'] . '-' . $row2['ecno'].'</td>
           <td>'.$row2['ips']. '/'.$row2['lang'].'</td>
           <td align=center><a href="?a=rcbview&action=delete&lid='.$row2['id'].'" onclick="return confirm(\'Do you really  want to delete this record?\')">[Delete]</a></td>


          </tr>';
      }
     }
  else
  {
    echo '<tr><td bgcolor=FFF9B3 colspan=7>No Data Now.</td></tr>';
  }

if ($colpages > 1)
{
echo '<center>';
}


$p = 1;
while ( $p<= $colpages)
 {
echo '<a href="?a=rcbview&page='.$p.'">';
if ($page == $p)
  {
  echo '<font color=red><strong>'.$p.'</strong></font></a> ';
  }
else
  {
 echo $p . '</a> '; 
  }

$p = $p+1;
 }




echo '</center>';
  echo '</table>';
}







function waiting()
{
$status='waiting';
   $q = 'select A.*,B.name as name from hl_rcbreport as A,hl_listings as B where A.lid=B.id and A.status like "%'.$status.'%"  order by date desc';
   $sth = mysql_query ($q);
   echo '<br><br><b>Unpaid</b><table cellspacing=0 cellpadding=1 border=1 width=100% bgcolor=#FFFFFF>';
   echo '<tr><td>Date</td><td>Program</td><td>User</td><td>Email</td><td>Deposit/RCB</td><td>EC-No</td><td>IP/Lang</td><td colspan="2" align=center>Option</td></tr>';
     if (mysql_num_rows($sth) > 0)
      {
        while ($row = mysql_fetch_array ($sth))
         {
         echo '<tr>
           <td>'.$row['date'].'</td>
           <td>'.$row['name'].'</td>
           <td>'.$row['username'].'</td>
           <td>'.$row['email'].'</td>
           <td>$'.$row['deposit'].'/$'.$row['rcb'].'</td>
           <td>'.$row['ec'] . '-' . $row['ecno'].'</td>
           <td>'.$row['ips'].'/'.$row['lang'].'</td>
           <td> ';


   echo '
  <a href="?a=rcbview&action=processed&id='.$row['id'].'&lid='.$row['lid'].'"  onclick="return confirm(\'Do you really want to Set it as Processed?\')">[SetPaid]</a>';


           echo'
           </td>
           <td><a href="?a=rcbview&action=delete&lid='.$row['id'].'" onclick="return confirm(\'Do you really want to delete  this record?\')">[Delete]</a></td>

          </tr>';
         } 
      }
  else
    {
    echo '<tr><td bgcolor=FFF9B3 colspan=9>No Data Now.</td></tr>';
    }

  echo '</table>';

}














 if ($frm['paidunpaid']!='')
  { 
   if ($frm['paidunpaid']==0)
     {
      waiting();
     }   
   if ($frm['paidunpaid']==1)
     {
      paid($page);
     }
  }
  else
  {
  waiting();
  paid($page);
  }















echo '</form>';


}

}


?>