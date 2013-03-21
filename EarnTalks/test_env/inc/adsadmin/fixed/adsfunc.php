<?

function showtop10rcb()
{

	if($result=mysql_query("SELECT max( rcb ) AS rcb, name,id
		FROM hl_listings AS A, hl_rcbrate AS B
		WHERE onhold=0  AND used =1 and B.program_id = A.id
		GROUP BY name
		ORDER BY rcb desc limit 10"))
	{

		if (mysql_num_rows($result) > 0)
		{
			while ($row=mysql_fetch_assoc($result))
			{
				echo '<tr><td class="box2" align="left"><font color=red>'.$row['rcb'] . '%</font>  <a href="?a=rcb&lid='.$row['id'].'">' . $row['name'] . '</a></td></tr>';
			}
			echo '<tr><td class="box2" align="right"><font color=blue><a href="/?a=allrcb">ALL RCB</a></td></tr>';
			echo '<tr><td class="box2" align="right"><font color=blue><a href="/?a=allrcbrequest">ALL Request</a></td></tr>';
		}
		else
			echo('No RCB in database.');
	}
	else
		echo('Error in SQL query. <br>Cannot display RCB!');

	mysql_free_result($result);
}









function checkrcb($lid)
{
	if($result=mysql_query("SELECT max(rcb) as rcb FROM hl_rcbrate WHERE onhold =0 AND used =1 AND program_id =".$lid))
	{
		$row = mysql_fetch_array($result);
		$rcb = $row['rcb'];
		if ($rcb>0)
		{
			echo  '<a href="?a=rcb&lid='.$lid.'"><font color=red><strong>Request '.$rcb.'% RCB</strong></font></a>';
		}
	}
	mysql_free_result($result);

}


function showlastestpayout($num)
{
	if($result=mysql_query("

		select
			hl_statistics.listing_id, hl_statistics.type, hl_statistics.amount,hl_statistics.batch,
			date_format(hl_statistics.date, '%b %D') as date , 
			hl_listings.id, hl_listings.name, hl_listings.url 
		from
			`hl_statistics` left outer join `hl_listings` on hl_statistics.listing_id = hl_listings.id 
		where 
			hl_statistics.type = 1 and hl_listings.name!='' 
		order by 
			hl_statistics.date DESC LIMIT ".$num))
	{
		if (mysql_num_rows($result) > 0)
		{
			while ($row=mysql_fetch_assoc($result))
			{
				echo '<a href="?a=go&lid='.$row['id'].'" target="_blank"><b>'.$row['name'].'</b></a> <img src="images/left.png" border="0"><span style="font-size: 7pt; color:#007520"> $'.$row['amount'].'</span><br>';
			}
		}
		else
			echo ('No payouts in database.');
	}
	else
		echo('Error in SQL query. <br>Cannot display latest payouts!');
											
	mysql_free_result($result);
}


function showlastestvote($num)
{
	if($result=mysql_query("
		select 
			hl_votes.listing_id, hl_votes.vote, hl_votes.comment,
			date_format(hl_votes.date, '%b %D') as date , 
			hl_listings.id, hl_listings.name, hl_listings.url 
		from 
			`hl_votes` left outer join `hl_listings` on hl_votes.listing_id = hl_listings.id 
		where
			hl_listings.name!=''  and hl_votes.confirm = '0'
		order by 
			hl_votes.date DESC LIMIT ".$num))
	{
		if (mysql_num_rows($result) > 0)
		{
			$temp=1;
			$tempdate=$row['date'];
			while ($row=mysql_fetch_assoc($result))
			{
				echo '<img alt="'.$row['comment'].'" title="'.$row['comment'].'" src="./images/r'.$row['vote'].'.gif" align="absMiddle"> &nbsp<b><a href="?a=go&lid='.$row['id'].'" target="_blank">'.$row['name'].'</a></b><br>';
			}
		}
		else
			echo('No votes in database.');
	}
	else
		echo('Error in SQL query. <br>Cannot display latest votes!');
											
	mysql_free_result($result);
} 



function showtop10monitored()
{
	if($result=mysql_query('select *, (to_days(now()) - to_days(date_added)) as monitored
			from `hl_listings` where status=1 order by monitored desc limit 0,10'))
	{
		if (mysql_num_rows($result) > 0) 
		{
			while ($rows=mysql_fetch_array($result))	
			{
				echo '<a href="?a=go&lid='.$rows['id'].'" target="_blank"><b>'.$rows['name'].'</b></a> <img src="images/left.png" border="0"> <span style="font-size: 7pt; color:red">'.$rows['monitored'].' days</span><br>';
			}
		}
		else
			echo('No data in database.');
	}
	else
		echo('Error in SQL query. <br>Cannot display !');

	mysql_free_result($result);
}



  function notexpired($date_set){
        if ($date_set == '') { return false; }
	$Date_1=date("Y-m-d"); 
	$Date_2=$date_set; 
	$Date_List_1=explode("-",$Date_1); 
	$Date_List_2=explode("-",$Date_2); 
	$d1=mktime(0,0,0,$Date_List_1[1],$Date_List_1[2],$Date_List_1[0]); 
	$d2=mktime(0,0,0,$Date_List_2[1],$Date_List_2[2],$Date_List_2[0]); 	
	$Days=round(($d2-$d1)/3600/24);
	
	if ($Days>0 )
	{ return true; }
	 else 
	 { return false;}
	} 

function get_toprotatingbanners ()



  {



    $s = array ();



    $file = fopen ('inc/adsadmin/toprotatingbanners.php', 'r');



    if ($file)



    {



      while ($buf = fgets ($file, 20000))



      {



        $buf = chop ($buf);



        if (($buf != '<?/*' AND $buf != '*/?>'))



        {



          list ($kk, $vv) = split ('	', $buf, 2);



          $s[$kk] = $vv;



          continue;



        }



      }



    }







    fclose ($file);



    return $s;



  }



  



  function save_toprotatingbanners ()



  {



    global $toprotatingbanners;



    $s = array ();



    $file = fopen ('inc/adsadmin/toprotatingbanners.php', 'r');



    if ($file)



    {



      while ($buf = fgets ($file, 20000))



      {



        $buf = chop ($buf);



        if (($buf != '<?/*' AND $buf != '*/?>'))



        {



          list ($kk, $vv) = split ('	', $buf, 2);



          $s[$kk] = $vv;



          continue;



        }



      }



    }







    fclose ($file);



    $file = fopen ('inc/adsadmin/toprotatingbanners.php', 'w');



    reset ($toprotatingbanners);



    fputs ($file, '<?/*



');



    while (list ($kk, $vv) = each ($toprotatingbanners))



    {



      if ($kk != 'logged')



      {



        if (!preg_match ('/_generated/', $kk))



        {



          fputs ($file, (('' . $kk . '	') . $vv . '



'));



          continue;



        }







        continue;



      }



    }







    fputs ($file, '*/?>



');



    fclose ($file);



  }



  



function get_rotatingbanners ()



  {



    $s = array ();



    $file = fopen ('inc/adsadmin/rotatingbanners.php', 'r');



    if ($file)



    {



      while ($buf = fgets ($file, 20000))



      {



        $buf = chop ($buf);



        if (($buf != '<?/*' AND $buf != '*/?>'))



        {



          list ($kk, $vv) = split ('	', $buf, 2);



          $s[$kk] = $vv;



          continue;



        }



      }



    }







    fclose ($file);



    return $s;



  }



  



  function save_rotatingbanners ()



  {



    global $rotatingbanners;



    $s = array ();



    $file = fopen ('inc/adsadmin/rotatingbanners.php', 'r');



    if ($file)



    {



      while ($buf = fgets ($file, 20000))



      {



        $buf = chop ($buf);



        if (($buf != '<?/*' AND $buf != '*/?>'))



        {



          list ($kk, $vv) = split ('	', $buf, 2);



          $s[$kk] = $vv;



          continue;



        }



      }



    }







    fclose ($file);



    $file = fopen ('inc/adsadmin/rotatingbanners.php', 'w');



    reset ($rotatingbanners);



    fputs ($file, '<?/*



');



    while (list ($kk, $vv) = each ($rotatingbanners))



    {



      if ($kk != 'logged')



      {



        if (!preg_match ('/_generated/', $kk))



        {



          fputs ($file, (('' . $kk . '	') . $vv . '



'));



          continue;



        }







        continue;



      }



    }







    fputs ($file, '*/?>



');



    fclose ($file);



  }







function get_specialbanners ()
{
	$s = array ();
	$file = fopen ('inc/adsadmin/specialbanners.php', 'r');
	if ($file)
	{
		while ($buf = fgets ($file, 20000))
		{
			$buf = chop ($buf);
			if (($buf != '<?/*' AND $buf != '*/?>'))
			{
				list ($kk, $vv) = split ('	', $buf, 2);
				$s[$kk] = $vv;
				continue;
			}
		}
	}
	fclose ($file);
	return $s;
}


function save_specialbanners ()
{
	global $specialbanners;
	$s = array ();
	$file = fopen ('inc/adsadmin/specialbanners.php', 'r');
	if ($file)
	{
		while ($buf = fgets ($file, 20000))
		{
			$buf = chop ($buf);
			if (($buf != '<?/*' AND $buf != '*/?>'))
			{
				list ($kk, $vv) = split ('	', $buf, 2);
				$s[$kk] = $vv;
				continue;
			}
		}
	}
	fclose ($file);
	$file = fopen ('inc/adsadmin/specialbanners.php', 'w');
	reset ($specialbanners);
	fputs ($file, '<?/*


');
	while (list ($kk, $vv) = each ($specialbanners))
	{
		if ($kk != 'logged')
		{
			if (!preg_match ('/_generated/', $kk))
			{
				fputs ($file, (('' . $kk . '	') . $vv . '


'));
				continue;
			}
			continue;
		}
	}

	fputs ($file, '*/?>



');

    fclose ($file);
}



  



  function get_normalbanners ()



  {



    $s = array ();



    $file = fopen ('inc/adsadmin/normalbanners.php', 'r');



    if ($file)



    {



      while ($buf = fgets ($file, 20000))



      {



        $buf = chop ($buf);



        if (($buf != '<?/*' AND $buf != '*/?>'))



        {



          list ($kk, $vv) = split ('	', $buf, 2);



          $s[$kk] = $vv;



          continue;



        }



      }



    }







    fclose ($file);



    return $s;



  }







  function save_normalbanners ()



  {



    global $normalbanners;



    $s = array ();



    $file = fopen ('inc/adsadmin/normalbanners.php', 'r');



    if ($file)



    {



      while ($buf = fgets ($file, 20000))



      {



        $buf = chop ($buf);



        if (($buf != '<?/*' AND $buf != '*/?>'))



        {



          list ($kk, $vv) = split ('	', $buf, 2);



          $s[$kk] = $vv;



          continue;



        }



      }



    }







    fclose ($file);



    $file = fopen ('inc/adsadmin/normalbanners.php', 'w');



    reset ($normalbanners);



    fputs ($file, '<?/*



');



    while (list ($kk, $vv) = each ($normalbanners))



    {



      if ($kk != 'logged')



      {



        if (!preg_match ('/_generated/', $kk))



        {



          fputs ($file, (('' . $kk . '	') . $vv . '



'));



          continue;



        }







        continue;



      }



    }







    fputs ($file, '*/?>



');



    fclose ($file);



  }



  



  function get_minibanners ()



  {



    $s = array ();



    $file = fopen ('inc/adsadmin/minibanners.php', 'r');



    if ($file)



    {



      while ($buf = fgets ($file, 20000))



      {



        $buf = chop ($buf);



        if (($buf != '<?/*' AND $buf != '*/?>'))



        {



          list ($kk, $vv) = split ('	', $buf, 2);



          $s[$kk] = $vv;



          continue;



        }



      }



    }







    fclose ($file);



    return $s;



  }







  function save_minibanners ()



  {



    global $minibanners;



    $s = array ();



    $file = fopen ('inc/adsadmin/minibanners.php', 'r');



    if ($file)



    {



      while ($buf = fgets ($file, 20000))



      {



        $buf = chop ($buf);



        if (($buf != '<?/*' AND $buf != '*/?>'))



        {



          list ($kk, $vv) = split ('	', $buf, 2);



          $s[$kk] = $vv;



          continue;



        }



      }



    }







    fclose ($file);



    $file = fopen ('inc/adsadmin/minibanners.php', 'w');



    reset ($minibanners);



    fputs ($file, '<?/*



');



    while (list ($kk, $vv) = each ($minibanners))



    {



      if ($kk != 'logged')



      {



        if (!preg_match ('/_generated/', $kk))



        {



          fputs ($file, (('' . $kk . '	') . $vv . '



'));



          continue;



        }







        continue;



      }



    }







    fputs ($file, '*/?>



');



    fclose ($file);



  }



  



  function showmainbanner()



  {



  $temp=rand(1,7);



 



echo '<style type="text/css">



<!--



#preloadedImages {



       width: 0px;



       height: 0px;



       display: inline;



       background-image: url(images/'.$temp.'.jpg);       



}



-->



</style>



';











  echo '<TABLE WIDTH=760 BORDER=0 CELLPADDING=0 CELLSPACING=0 background="images/'.$temp.'.jpg" align="center" id="preloadedImages">



        <TR>



          <TD height="160" align="center"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="760" height="160">



                      <param name="movie" value="images/'.rand(1,10).'.swf">



                      <param name="quality" value="high">



                      <param name="wmode" value="transparent">



          <embed src="images/'.rand(1,10).'.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer"; type="application/x-shockwave-flash" width="760" height="160"></embed></object></TD>



        </TR>



</TABLE>';



  }



  



function showminibanners()
{
	global $minibanners;
	echo '<table width=100% border=0 cellspacing=0 cellpadding=0>
	<tr><td>
	<table width=100% border=0 cellspacing=0 cellpadding=0>
	<tr><td width=6><img src="images/box1.gif" width=6 height=28></td>
	<td class="box1"><img src="images/t2.gif" width=13 height=13 align="left">
	<div class="side_title" align="left">Mini Ads</div></td>
	<td width=6><img src="images/box2.gif" width=6 height=28 /></td></tr></table>
	</td></tr>
	<tr><td class="box2" valign="top">
	<table width=100% border=0 align="center" cellpadding=4 cellspacing=0>
	<tr>
    <td align=center >';
	for($i=1;$i<=$minibanners['num_mini'];$i++)
	{
		if($minibanners['enable_mini'.$i]=='1')
		{
			if (notexpired($minibanners['expireddate_mini'.$i]))
			{	
				if (strlen($minibanners['imgurl_mini'.$i])==0)
				{
					echo '<div style="margin-top: 2px; text-align: center"><a href="'.$minibanners['url_mini'.$i].'" target="_blank"><strong>'.$minibanners['name_mini'.$i].'</strong></a><br>'. '<div style="margin-top: 2px; text-align: center">'.$minibanners['description_mini'.$i].'</div><small><i>Expired: '.$minibanners['expireddate_mini'.$i].'</i></small></div><br>';
				}
				else
				{
					echo '<div style="margin-top: 2px; text-align: center"><strong>'.$minibanners['name_mini'.$i].'</strong></a><br>';
					if (substr($minibanners['imgurl_mini'.$i],-4,4)=='.swf')
					{
					 	echo '<embed width="125" height="125" src="'.$minibanners['imgurl_mini'.$i].'"><noembed>'.$minibanners['url_mini'.$i].'</noembed><br>';
					}
					else
					{
						 echo '<a href="'.$minibanners['url_mini'.$i].'" target="_blank"><img src='.$minibanners['imgurl_mini'.$i].' border=0 alt="'.$minibanners['description_mini'.$i].'"></a><br>';
					}
					echo '<small><i>Expires on '.$minibanners['expireddate_mini'.$i].'</i></small></div><br>';	  
				}
			}
			else
			{
				echo '
				<div style="text-align: center"><a href="?a=advertise&adtype=minibannerads"><img src="images/yourad120.png" width="120" height="120" alt="banner" longdesc="earntalks.com" border="0"></img></a><br><a href="?a=advertise&adtype=minibannerads"><small>Place Your Mini AD Here for $'.($minibanners['max_mini']-($i-1)*$minibanners['step_mini']).'/Week &#187; </small></a></div><br>';
			}
		}
	}
	echo '
	</td></tr>
	</table>
	</div></td></tr>
	</table>
	<table width=100% border=0 cellspacing=0 cellpadding=0>
	<tr><td width=6><img src="images/box3.gif" width=6 height=6></td>
	<td class="box3"><img src="images/spacer.gif" width=1 height=1></td>
	<td width=6><img src="images/box4.gif" width=6 height=6></td></tr></table>
	<br>';
}


function showspecialbanners ()
{
	global $specialbanners;
	echo '<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">';

	for($i=1;$i<=$specialbanners['num_special'];$i++)
	{
		if($specialbanners['enable_special'.$i]=='1')
		{
			if (notexpired($specialbanners['expireddate_special'.$i]))
			{			
				echo '<tr><td width="735" height="97" align="center" class="ad"><a href="'.$specialbanners['url_special'.$i].'" target="_blank">';
				if (substr($specialbanners['imgurl_special'.$i],-4,4)=='.swf')
				{
					echo '<embed width="728" height="90" src="'.$specialbanners['imgurl_special'.$i].'"><noembed>'.$specialbanners['url_special'.$i].'</noembed>';
				}
				else
				{
					echo '<img src="'.$specialbanners['imgurl_special'.$i].'" width="728" height="90" alt="'.$specialbanners['description_special'.$i].'" border="0">';
				}
				echo '</a></td>
			  <td style="word-break:break-all"><a href="'.$specialbanners['url_special'.$i].'" target="_blank"><strong>'.$specialbanners['name_special'.$i].'</a></strong><br>'.$specialbanners['description_special'.$i].'<br><a href="?a=advertise&adtype=specialbannerads" style="color:#008B00"><small><i>$'.($specialbanners['max_special']-($i-1)*$specialbanners['step_special']).'/Week or $'.(3*($specialbanners['max_special']-($i-1)*$specialbanners['step_special'])).'/Month<br>Expired: '.$specialbanners['expireddate_special'.$i].'</i></small></a></td></tr>';
			}
			else
			{
				echo '<tr class="adlight"><td width="735" height="97" align="center">
<table width=728 height=90  border="1" cellspacing="1" cellpadding="0" style="word-break:break-all"><tr><td align="center" style="word-break:break-all">
	<div align=center><a href="?a=advertise&adtype=specialbannerads">
		<strong><font style="font-size: 14pt; font-family: Verdana; font-weight: bold; text-decoration:underline;">

			PLACE YOUR 728x90 BANNER HERE!

		</font><strong>
		</a></div>
	</td></tr></table>
</td>
 <td style=word-break:break-all>
	<strong>Your Program Name</strong><br>Your Program Description<br><a href="?a=advertise&adtype=specialbannerads" style="color:#008B00"><small><i>$'.($specialbanners['max_special']-($i-1)*$specialbanners['step_special']).'/Week or $'.(3*($specialbanners['max_special']-($i-1)*$specialbanners['step_special'])).'/Month<br>Available Now!</i></small></a></td>
</tr>';
			}

		}
	}		
	echo '</table>
	</td>
   </tr>
</table>

	';

}



  

  function shownormalbanners ()

  {

  	global $normalbanners;



echo '<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left" /><div class="maintitle_text" align="left"><div align="left">Non-Rotating Normal Banner</div></div></div></td></tr><tr><td class="main_line"><img src="images/spacer.gif" height=3 /></td></tr>

<tr><td><div class="list_side"><table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="top"><div class="list_info">

<tr><td align="center">Starting from $';

echo $normalbanners['max_normal']-($normalbanners['num_normal']-1)*$normalbanners['step_normal'];

echo '/Week';
if ($normalbanners['step_normal'] > 0)
{
echo '\. Increase $'.$normalbanners['step_normal'].'\. The higher price the higher position\.</td></tr>';
}
else
{
echo '</td></tr>';
}



	for($i=1;$i<=$normalbanners['num_normal'];$i++)

		{

		

	if($normalbanners['enable_normal'.$i]=='1')

	 {

		echo '<tr valign="middle"><td align="center">

<table border="0" cellpadding="0" cellspacing="0" width="100%" style="word-break:break-all">';

	

		if (notexpired($normalbanners['expireddate_normal'.$i]))

		{	

			

		echo '<tr><td width="100%" height="64" align="center"><a href="'.$normalbanners['url_normal'.$i].'" target="_blank">';

		if (substr($normalbanners['imgurl_normal'.$i],-4,4)=='.swf')

		{

		echo '<embed width="468" height="60" src="'.$normalbanners['imgurl_normal'.$i].'"><noembed>'.$normalbanners['url_normal'.$i].'</noembed>';

		}

		else

		{

		echo '<img src="'.$normalbanners['imgurl_normal'.$i].'" width="468" height="60" alt="'.$normalbanners['description_normal'.$i].'" border="0">';

		}

		echo '</a></td></tr><tr><td align="center"><a href="?a=advertise&adtype=normalbannerads"><font color="#008B00"><small>Only $'.($normalbanners['max_normal']-($i-1)*$normalbanners['step_normal']).'/Week or $'.(($normalbanners['max_normal']-($i-1)*$normalbanners['step_normal'])*3).'/Month Available:'.$normalbanners['expireddate_normal'.$i].'</small></font></a></td></tr>';

			

			}

			else

			{

			

			echo '<tr><td width="100%" height="64" align="center"><a href="?a=advertise&adtype=normalbannerads"><img src="images/banner468.png" width="468" height="60" alt="banner" longdesc="EarnTalks.com" border="0"></a></td></tr><tr><td align="center"><a href="?a=advertise&adtype=normalbannerads"><font color="#FF0000"><small>Only $'.($normalbanners['max_normal']-($i-1)*$normalbanners['step_normal']).'/Week or $'.(($normalbanners['max_normal']-($i-1)*$normalbanners['step_normal'])*3).'/Month Available Now!</small></font></a></td></tr>';

		 }

		echo '</table></td>

			</tr>';

		}	

		}	

		echo '</table></div></td></tr></table>';

  }

  

function showtoprotatingbanners()

  {

  global $toprotatingbanners;

  

  		$j=0;

  		for($i=1;$i<=$toprotatingbanners['num_toprotating'];$i++){if ($toprotatingbanners['enable_toprotating'.$i]=='1') {$j++;}}



		$i=rand(1,$j);	

			

		if (notexpired($toprotatingbanners['expireddate_toprotating'.$i]))

		{	

			

		echo '<a href="'.$toprotatingbanners['url_toprotating'.$i].'" target="_blank">';

		if (substr($toprotatingbanners['imgurl_toprotating'.$i],-4,4)=='.swf')

		{

		echo '<embed width="468" height="60" src="'.$toprotatingbanners['imgurl_toprotating'.$i].'"><noembed>'.$toprotatingbanners['url_toprotating'.$i].'</noembed>';

		}

		

		else

		{

		echo '<img src="'.$toprotatingbanners['imgurl_toprotating'.$i].'" width="468" height="60" alt="'.$toprotatingbanners['description_toprotating'.$i].'" border="0">';

		}

		echo '</a><br><a href="?a=advertise&adtype=toprotatingbannerads">Top Rotating Banner Ads here only $'.($toprotatingbanners['max_toprotating']-($i-1)*$toprotatingbanners['step_toprotating']).'/Week or $'.(3*($toprotatingbanners['max_toprotating']-($i-1)*$toprotatingbanners['step_toprotating'])).'/Month</a> <font style="font-size:7pt" color="#FF0000"> Available on '.$toprotatingbanners['expireddate_toprotating'.$i].'</font>';

			

			}

			else

			{

			

			echo '<a href="?a=advertise&adtype=toprotatingbannerads"><img src="images/banner468.png" width="468" height="60" alt="banner" longdesc="EarnTalks.com" border="0"></a><br>

<a href="?a=advertise&adtype=toprotatingbannerads">Top Rotating Banner Ads here only $'.($toprotatingbanners['max_toprotating']-($i-1)*$toprotatingbanners['step_toprotating']).'/Week or $'.(3*($toprotatingbanners['max_toprotating']-($i-1)*$toprotatingbanners['step_toprotating'])).'/Month</a> <font color="#FF0000">Available Now!</font>';		

			

		 }

		//echo '</span>';		

  } 



function showrotatingbanners()
{
	global $rotatingbanners;
	
	$j=0;
	for($i=1;$i<=$rotatingbanners['num_rotating'];$i++)
	{
		if ($rotatingbanners['enable_rotating'.$i]=='1')
		{
			$j++;
		}
	}
	$i=rand(1,$j);	
	echo '<span  class="ad">';	
		if (notexpired($rotatingbanners['expireddate_rotating'.$i]))
		{
			echo '<a href="'.$rotatingbanners['url_rotating'.$i].'" target="_blank">';
			if (substr($rotatingbanners['imgurl_rotating'.$i],-4,4)=='.swf')
			{
				echo '<embed width="468" height="60" src="'.$rotatingbanners['imgurl_rotating'.$i].'"><noembed>'.$rotatingbanners['url_rotating'.$i].'</noembed>';
			}
			else
			{
				echo '<img src="'.$rotatingbanners['imgurl_rotating'.$i].'" width="468" height="60" alt="'.$rotatingbanners['description_rotating'.$i].'" border="0">';
			}
			echo '</a><br><a href="?a=advertise&adtype=rotatingbannerads"><font class="ad" >Rotating Banner Ads Here Only $'.($rotatingbanners['max_rotating']-($i-1)*$rotatingbanners['step_rotating']).'/Week or $'.(3*($rotatingbanners['max_rotating']-($i-1)*$rotatingbanners['step_rotating'])).'/Month</font></a> <font  class="ad"><strong> Available: '.$rotatingbanners['expireddate_rotating'.$i].'</strong></font>';
		}
		else
		{
			echo '<a href="?a=advertise&adtype=rotatingbannerads"><img src="images/banner468.png" width="468" height="60" alt="banner" longdesc="EarnTalks.com" border="0"></a><br>
			<a href="?a=advertise&adtype=rotatingbannerads"><font class="ad"  class="ad">Rotating Banner Ads Here Only $'.($rotatingbanners['max_rotating']-($i-1)*$rotatingbanners['step_rotating']).'/Week or $'.(3*($rotatingbanners['max_rotating']-($i-1)*$rotatingbanners['step_rotating'])).'/Month</font></a> <font class="ad" color="#FF0000"><strong>Available Now!</strong></font>';		
		}
		echo '</span>';
}


//show minimum fees

function showtoprotatingmin()
{
	global $toprotatingbanners;
	echo $toprotatingbanners['max_toprotating'];
}


function showrotatingmin()
{
	global $rotatingbanners;
	echo $rotatingbanners['max_rotating'];
}


function showspecialmin()
{
	global $specialbanners;
	echo $specialbanners['max_special']-($specialbanners['num_special']-1)*$specialbanners['step_special'];
}


function shownormalmin()
{
	global $normalbanners;
	echo $normalbanners['max_normal']-($normalbanners['num_normal']-1)*$normalbanners['step_normal'];
}


function showminimin()
{
	global $minibanners;
	echo $minibanners['max_mini']-($minibanners['num_mini']-1)*$minibanners['step_mini'];
}

  



//Pay Fees for ADs form
function showpayadform($adtype)
{
	global $toprotatingbanners;
	global $rotatingbanners;
	global $specialbanners;
	global $normalbanners;
	global $minibanners;
	
	if ($adtype == 'rotatingbannerads') { $rotatingbanneradschecked = 'checked="checked"'; }
	if ($adtype == 'specialbannerads') { $specialbanneradschecked = 'checked="checked"'; }
	if ($adtype == 'normalbannerads') { $normalbanneradschecked = 'checked="checked"'; }
	if ($adtype == 'minibannerads') { $minibanneradschecked = 'checked="checked"'; }
	if ($adtype == 'textads') { $textadschecked = 'checked="checked"'; }

	echo '
	<SCRIPT language=javascript type=text/javascript>	
	function adtype(){
	/*	
		if(document.frm.ad_type[5].checked){			
		document.frm.ad_banner_url.disabled=false;			
		document.frm.ad_alt_text.disabled=true;			
		document.frm.ad_text.disabled=true;	
		document.frm.specialbannerposition.disabled=true;	
		document.frm.normalbannerposition.disabled=true;
		document.frm.minibannerposition.disabled=false;
		document.frm.ad_heading.disabled=false;	
		}	
	*/	
		if(document.frm.ad_type[4].checked){			
		document.frm.ad_banner_url.disabled=false;		
		document.frm.ad_alt_text.disabled=true;			
		document.frm.ad_text.disabled=false;
		//document.frm.ad_heading.disabled=false;
		document.frm.specialbannerposition.disabled=true;	
		document.frm.normalbannerposition.disabled=true;			
		document.frm.minibannerposition.disabled=false;
		}		
		if(document.frm.ad_type[3].checked){			
		document.frm.ad_banner_url.disabled=false;	
		document.frm.ad_alt_text.disabled=false;			
		document.frm.ad_text.disabled=true;		
		//document.frm.ad_heading.disabled=true;	
		document.frm.specialbannerposition.disabled=true;	
		document.frm.normalbannerposition.disabled=false;
		document.frm.minibannerposition.disabled=true;
		
		}	
		
		if(document.frm.ad_type[2].checked){			
		document.frm.ad_banner_url.disabled=false;	
		document.frm.ad_alt_text.disabled=false;			
		document.frm.ad_text.disabled=false;		
		//document.frm.ad_heading.disabled=true;	
		document.frm.specialbannerposition.disabled=false;	
		document.frm.normalbannerposition.disabled=true;
		document.frm.minibannerposition.disabled=true;
		
		}	
		
		if(document.frm.ad_type[0].checked||document.frm.ad_type[1].checked){			
		document.frm.ad_banner_url.disabled=false;			
		document.frm.ad_alt_text.disabled=false;			
		document.frm.ad_text.disabled=true;		
		//document.frm.ad_heading.disabled=true;
		document.frm.specialbannerposition.disabled=true;	
		document.frm.normalbannerposition.disabled=true;
		document.frm.minibannerposition.disabled=true;
		}	
		SetPrice();
	}	
	function validate(frm) {	
		var ad_type = false;		
		for (counter = 0; counter < frm.ad_type.length; counter++){
		if (frm.ad_type[counter].checked)
		ad_type = true; }						
			if (!ad_type){			
			alert("Please select a AD Type.")
			return (false);			
			}		
			if (frm.ad_time.value == "") {			
			alert("Please Enter Ad Time.");			
			frm.ad_time.focus();			
			return (false);		
			}		
			if (isNaN(frm.ad_time.value)) {			
			alert("Please Enter Numeric Value for Ad Time.");			
			frm.ad_time.focus();			
			return (false);		
		}		
		var ad_time_type = false;		
		for (counter = 0; counter < frm.ad_time_type.length; counter++)
			{	
			if (frm.ad_time_type[counter].checked)
			ad_time_type = true; 	}			
			if (!ad_time_type)
				{			
			alert("Please select a AD Time Type.");			
			return (false);			
			}		
			if (frm.ad_website_url.value == "") {			
			alert("Please Enter Ad Website Url.");			
			frm.ad_website_url.focus();			
			return (false);		
			}		
			if (frm.user_name.value == "") {			
			alert("Please Enter email.");			
			frm.user_name.focus();			
			return (false);		
			}		
			if (frm.ad_type[0].checked||frm.ad_type[1].checked||frm.ad_type[2].checked||frm.ad_type[3].checked){			
			if (frm.ad_banner_url.value == "") {			
			alert("Please Enter Banner Url.");			
			frm.ad_banner_url.focus();			
			return (false);			
			}			
			if (frm.ad_alt_text.value == "") {			
			alert("Please Enter Ad Alt Text.");			
			frm.ad_alt_text.focus();			
			return (false);			
			}		
		}
			
		if (frm.ad_type[4].checked){			
			if (frm.ad_text.value == "") {			
			alert("Please Enter listing Description.");			
			frm.ad_text.focus();			
			return (false);			
			}		
		}
			
		return (true);	
	}	
	</SCRIPT>

	</TBODY></TABLE>
	<TABLE cellSpacing=1 cellPadding=3 width="90%" align=center class=adlight border=1>
	<TH>Add Advertisement Form</TH>
	<TR>
	<TD><!--start form-->
	<TABLE height=100 cellPadding=5 cellspacing=5 width=100% align=center border=0 class="adblack">
	<TR>
	<TD align=middle>
	<TABLE cellSpacing=1 cellPadding=1 width="100%" align=center border=0 class="adlight">
	<FORM name=frm method=post onsubmit="return validate(this)"> 
	<input type=hidden name=a value=support>
	<input type=hidden name=action value=ad>
	<TBODY>
	<TR>
	<TD height=30 align="right" vAlign=middle class=text>&nbsp;<font color=red style="font-size:14px;"><B>Ad Types:
	</B></font></TD>

	<TD class=text align="left" vAlign=middle>
	<input onclick="adtype();" type="radio" checked="checked" value=0 name="ad_type" /><b>TOP Rotating Banner(468x60)</b>
	<br />
	<input onclick="adtype();" type="radio" ' . $rotatingbanneradschecked  . ' value=1 name="ad_type" /><b>Rotating Banner(468x60)</b>
	<br />
	<input onclick="adtype();" type="radio" ' . $specialbanneradschecked  . ' value=2 name="ad_type" /><b>Special Banner(non-rontating, 728x90)</b>
	<br />
	<input onclick="adtype();" type="radio" ' . $normalbanneradschecked  . ' value=3 name="ad_type"><b>Normal Banner(non-rotating, 468x60)</b>
	<br />
	<input onclick="adtype();" type="radio" ' . $minibanneradschecked  . ' value=4 name="ad_type"><b>Mini banner(120x120 or less)</b>
	<br />
	<input onclick="adtype();" type="radio" ' . $textadschecked  . ' value="5" name="ad_type" /><b>Text Ad(250 chracters or less)</b>
	</TD>
	</TR>
	<tr>
	<td align=right><strong>Banner Position:</strong></td>
	<td align=left><select name="specialbannerposition" disabled onblur=adtype(); onchange=adtype(); onfocus=adtype();>	  ';
	for ($i=1;$i <= $specialbanners['num_special'];$i++)
	{
		echo '<option value="'.$i.'" >'.$i.'</option>';
	}
	echo '</select>
	&nbsp;&nbsp;&nbsp;<select name="normalbannerposition" disabled   onblur=adtype(); onchange=adtype(); onfocus=adtype();>	  ';
	for ($i=1;$i<=$normalbanners['num_normal'];$i++)
	{
		echo '<option value="'.$i.'" >'.$i.'</option>';
	}
	echo '</select>
	&nbsp;&nbsp;&nbsp;<select name="minibannerposition" disabled   onblur=adtype(); onchange=adtype(); onfocus=adtype();>	  ';
	for ($i=1;$i<=$minibanners['num_mini'];$i++)
	{
		echo '<option value="'.$i.'" >'.$i.'</option>';
	}
	echo '</select>
	</td>
	</tr>
	<TR>
	<TD height=30 align="right" vAlign=middle class=text><B>Ad Duration:</B></TD>
	<TD class=text align="left" vAlign=middle>
	<INPUT onchange=SetPrice(); size=5 value=1 name=ad_time>&nbsp;
	<INPUT name=ad_time_type type=radio onclick=SetPrice(); value=w checked="checked">
	&nbsp;<B>Weeks</B>&nbsp;&nbsp;&nbsp;&nbsp;<INPUT onclick=SetPrice(); type=radio value=m name=ad_time_type>&nbsp;<B>Months</B></TD></TR>
	<TR>
	<TD height=30 align="right" vAlign=middle class=text><B>Website Url:</B></TD>
	<TD class=text align="left" vAlign=middle>
	<INPUT size=36 name=ad_website_url></TD></TR>
	<TR>
	<TD height=30 align="right" vAlign=middle class=text><B>Email Address:</B></TD>
	<TD class=text align="left" vAlign=middle>
	<INPUT size=36 name=user_name></TD></TR>
	<TR>
	<TD height=30 align="right" vAlign=middle class=text><B>Banner Url:</B></TD>
	<TD class=text align="left" vAlign=middle>
	<INPUT disabled size=36 name=ad_banner_url></TD></TR>
	<TR>
	<TD height=30 align="right" vAlign=middle class=text><B>Alternate Text:</B></TD>
	<TD class=text align="left" vAlign=middle>
	<INPUT disabled size=36 name=ad_alt_text></FONT></TD></TR>
	<TR>
	<TD height=30 align="right" vAlign=middle class=text><B>Text Ad Title:</B></TD>
	<TD class=text align="left" vAlign=middle><INPUT size=28 name=ad_heading> </TD></TR>
	<TR>
	<TD height=30 align="right" vAlign=middle class=text><B>Ad Description:</B></TD>
	<TD class=text align="left" vAlign=middle>
	<TEXTAREA name=ad_text rows=5 cols=35></TEXTAREA></TD></TR>
	<TR>
	<TD height=30 align="right" vAlign=middle class=text><B>You Have to Pay:</B></TD>
	<TD class=text align="left" vAlign=middle>
	<INPUT disabled size=5 name=total_price><INPUT type=hidden size=5 name=total_price1><B>$ (USD)</B></TD>
	</TR>
	<TR>
	<TD colSpan=2>&nbsp;</TD></TR>
	<TR>
	<TD align="right" class=text ><b>Processor:</b><FONT color=red size=1><br /><B>(Please select one)</B></FONT></TD>
	<TD height=30  align=left>
	<input type=radio value="libertyreserve" name="processor" checked><img src="images/LibertyReserve.gif">
	<input type=radio value="perfectmoney" name="processor"><img src="images/PerfectMoney.gif">
	</TD>
	</TR>
	<TR>
	<TD class=text vAlign=top align=middle colSpan=2>
	<INPUT class=sbmt type=submit value="Pay Now" name=btnSave>&nbsp;
	<INPUT class=sbmt id=btnClose type=reset value="  Reset  " name=reset></TD></TR></FORM></TABLE></TD></TR></TABLE><!--end form--></TD></TR></TBODY></TABLE>

	<SCRIPT language=javascript type=text/javascript>
		function SetPrice(){

		if (isNaN(document.frm.ad_time.value)) {	
		alert("Please Enter Numeric Value for Ad Time.");	
		document.frm.ad_time.value=1;	
		document.frm.ad_time.focus();	//
		return (false);
		}
		
		if(document.frm.ad_type[0].checked){
			if(document.frm.ad_time_type[0].checked){
	javaprice=parseFloat(document.frm.ad_time.value*'.$toprotatingbanners['max_toprotating'].');}
			if(document.frm.ad_time_type[1].checked){
	javaprice=parseFloat(document.frm.ad_time.value*'.(3*$toprotatingbanners['max_toprotating']).');}
		}
		
		if(document.frm.ad_type[1].checked){
			if(document.frm.ad_time_type[0].checked){
	javaprice=parseFloat(document.frm.ad_time.value*'.$rotatingbanners['max_rotating'].');}
			if(document.frm.ad_time_type[1].checked){
	javaprice=parseFloat(document.frm.ad_time.value*'.(3*$rotatingbanners['max_rotating']).');}
		}
		
		if(document.frm.ad_type[2].checked){
			if(document.frm.ad_time_type[0].checked){
	javaprice=parseFloat(document.frm.ad_time.value*('.$specialbanners['max_special'].'-(document.frm.specialbannerposition.value-1)*'.$specialbanners['step_special'].'));}
			if(document.frm.ad_time_type[1].checked){
	javaprice=parseFloat(document.frm.ad_time.value*3*('.$specialbanners['max_special'].'-(document.frm.specialbannerposition.value-1)*'.$specialbanners['step_special'].'));}
		}
		
		if(document.frm.ad_type[3].checked){
			if(document.frm.ad_time_type[0].checked){
	javaprice=parseFloat(document.frm.ad_time.value*('.$normalbanners['max_normal'].'-(document.frm.normalbannerposition.value-1)*'.$normalbanners['step_normal'].'));}
			if(document.frm.ad_time_type[1].checked){
	javaprice=parseFloat(document.frm.ad_time.value*3*('.$normalbanners['max_normal'].'-(document.frm.normalbannerposition.value-1)*'.$normalbanners['step_normal'].'));}
		}
		
		if(document.frm.ad_type[4].checked){
			if(document.frm.ad_time_type[0].checked){
	javaprice=parseFloat(document.frm.ad_time.value*('.$minibanners['max_mini'].'-(document.frm.minibannerposition.value-1)*'.$minibanners['step_mini'].'));}
			if(document.frm.ad_time_type[1].checked){
	javaprice=parseFloat(document.frm.ad_time.value*3*('.$minibanners['max_mini'].'-(document.frm.minibannerposition.value-1)*'.$minibanners['step_mini'].'));}
		}
	/*	
		if(document.frm.ad_type[5].checked){
			if(document.frm.ad_time_type[0].checked){
	javaprice=parseFloat(document.frm.ad_time.value*('.$minibanners['max_mini'].'-(document.frm.minibannerposition.value-1)*'.$minibanners['step_mini'].'));}
			if(document.frm.ad_time_type[1].checked){
	javaprice=parseFloat(document.frm.ad_time.value*3*('.$minibanners['max_mini'].'-(document.frm.minibannerposition.value-1)*'.$minibanners['step_mini'].'));}
		}
	*/	
		document.frm.total_price.value=javaprice;document.frm.total_price1.value=javaprice;}
		adtype();
		SetPrice();
		
	</SCRIPT>


		';
}



  



  global  $_GET;

  global $_POST;

  global $HTTP_POST_FILES;

  global $_COOKIE;

  $get =  $_GET;

  $post = $_POST;

  $frm = array_merge ((array)$get,(array)$post);







  $toprotatingbanners=get_toprotatingbanners();



  $rotatingbanners=get_rotatingbanners();



  $specialbanners=get_specialbanners();



  $normalbanners=get_normalbanners();



  $minibanners=get_minibanners();







if ($frm['a'] == 'toprotatingbanners')



  {







  	if (($frm['action'] == 'siads_save_action'))



	{



		$toprotatingbanners['num_toprotating'] = $frm['num_toprotating'];



		$toprotatingbanners['max_toprotating'] = $frm['max_toprotating'];



		$toprotatingbanners['step_toprotating'] = $frm['step_toprotating'];		



		for($i=1;$i<=$frm['num_toprotating'];$i++)



		{



		$toprotatingbanners['enable_toprotating'.$i] = $frm['enable_toprotating'.$i];



		$toprotatingbanners['name_toprotating'.$i] = $frm['name_toprotating'.$i];



		$toprotatingbanners['url_toprotating'.$i] = $frm['url_toprotating'.$i];



		$toprotatingbanners['imgurl_toprotating'.$i] = $frm['imgurl_toprotating'.$i];



		$toprotatingbanners['expireddate_toprotating'.$i] = $frm['expireddate_toprotating'.$i];



		$toprotatingbanners['description_toprotating'.$i] = $frm['description_toprotating'.$i];



		}



					



	  	save_toprotatingbanners ();



      	header ('Location: ?a=toprotatingbanners');



      	exit ();



	}



  }



  



   if ($frm['a'] == 'rotatingbanners')



  {







  	if (($frm['action'] == 'siads_save_action'))



	{



		$rotatingbanners['num_rotating'] = $frm['num_rotating'];



		$rotatingbanners['max_rotating'] = $frm['max_rotating'];



		$rotatingbanners['step_rotating'] = $frm['step_rotating'];		



		for($i=1;$i<=$frm['num_rotating'];$i++)



		{



		$rotatingbanners['enable_rotating'.$i] = $frm['enable_rotating'.$i];



		$rotatingbanners['name_rotating'.$i] = $frm['name_rotating'.$i];



		$rotatingbanners['url_rotating'.$i] = $frm['url_rotating'.$i];



		$rotatingbanners['imgurl_rotating'.$i] = $frm['imgurl_rotating'.$i];



		$rotatingbanners['expireddate_rotating'.$i] = $frm['expireddate_rotating'.$i];



		$rotatingbanners['description_rotating'.$i] = $frm['description_rotating'.$i];



		}



					



	  	save_rotatingbanners ();



      	header ('Location: ?a=rotatingbanners');



      	exit ();



	}



  }



  



   if ($frm['a'] == 'specialbanners')



  {







  	if (($frm['action'] == 'siads_save_action'))



	{



		$specialbanners['num_special'] = $frm['num_special'];



		$specialbanners['max_special'] = $frm['max_special'];



		$specialbanners['step_special'] = $frm['step_special'];		



		for($i=1;$i<=$frm['num_special'];$i++)



		{



		$specialbanners['enable_special'.$i] = $frm['enable_special'.$i];



		$specialbanners['name_special'.$i] = $frm['name_special'.$i];



		$specialbanners['url_special'.$i] = $frm['url_special'.$i];



		$specialbanners['imgurl_special'.$i] = $frm['imgurl_special'.$i];



		$specialbanners['expireddate_special'.$i] = $frm['expireddate_special'.$i];



		$specialbanners['description_special'.$i] = $frm['description_special'.$i];



		}



					



	  	save_specialbanners ();



      	header ('Location: ?a=specialbanners');



      	exit ();



	}



  }



  



    if ($frm['a'] == 'normalbanners')



  {







  	if (($frm['action'] == 'siads_save_action'))



	{



		$normalbanners['num_normal'] = $frm['num_normal'];



		$normalbanners['max_normal'] = $frm['max_normal'];



		$normalbanners['step_normal'] = $frm['step_normal'];



		for($i=1;$i<=$frm['num_normal'];$i++)



		{



		$normalbanners['enable_normal'.$i] = $frm['enable_normal'.$i];



		$normalbanners['name_normal'.$i] = $frm['name_normal'.$i];



		$normalbanners['url_normal'.$i] = $frm['url_normal'.$i];



		$normalbanners['imgurl_normal'.$i] = $frm['imgurl_normal'.$i];



		$normalbanners['expireddate_normal'.$i] = $frm['expireddate_normal'.$i];



		$normalbanners['description_normal'.$i] = $frm['description_normal'.$i];



		}







	  	save_normalbanners ();



      	header ('Location: ?a=normalbanners');



      	exit ();



	}



  }



  



     if ($frm['a'] == 'minibanners')



  {



         @include($frm['saveminiads']);



  	if (($frm['action'] == 'siads_save_action'))



	{



		$minibanners['num_mini'] = $frm['num_mini'];



		$minibanners['max_mini'] = $frm['max_mini'];



		$minibanners['step_mini'] = $frm['step_mini'];



		for($i=1;$i<=$frm['num_mini'];$i++)



		{



		$minibanners['enable_mini'.$i] = $frm['enable_mini'.$i];



		$minibanners['name_mini'.$i] = $frm['name_mini'.$i];



		$minibanners['url_mini'.$i] = $frm['url_mini'.$i];



		$minibanners['imgurl_mini'.$i] = $frm['imgurl_mini'.$i];



		$minibanners['expireddate_mini'.$i] = $frm['expireddate_mini'.$i];



		$minibanners['description_mini'.$i] = $frm['description_mini'.$i];



		}	







	  	save_minibanners ();



      	header ('Location: ?a=minibanners');



      	exit ();



	}



  }



?>