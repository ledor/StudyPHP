<table width="100%" border="0" cellpadding="0" cellspacing="1" class="adblack">

			<tr>

			  <td align="center" bgcolor="ffaa00"><font color="#CC0000"><strong>Non-Rotating Banner </strong></font><font size="2" color="#CC0000">('Banner image' + 'Text   Description)<br>

			    <strong>Only $<? echo $normalbanners['max_normal']-($normalbanners['num_normal']-1)*$normalbanners['step_normal']?>/Week! <a href="?a=advertise">Click to add your banner!</a></strong></font></td>

			</tr>

					



			<tr><td align="center"><table class="adlight">

			<? for($i=0;$i<=$normalbanners['num_normal'];$i++)

			{

				if (notexpired($normalbanners['expireddate_normal'.$i]))

				{

			 ?>

			

			<tr><td width="470" height="80" align="center"><a href=<? echo $normalbanners['url_normal'.$i]?> target="_blank"><img src=<? echo $normalbanners['imgurl_normal'.$i]?> width="468" height="60" alt=<? echo $normalbanners['description_normal'.$i]?> border="0"></a><br>

			<font size="1"><a href=>Place your Banner Ads Here Only $<? echo $normalbanners['max_normal']-($i-1)*$normalbanners['step_normal']?>/Week</a> </font><font size="1" color="#FF0000"><strong> Available: <? echo $normalbanners['expiredate_normal'.$i]?></strong></font><BR></td>

			  <td><div align="center"><a href=<? echo $normalbanners['url_normal'.$i]?> target="_blank"><strong><? echo $normalbanners['name_normal'.$i]?></strong><br><font size="1"><? echo $normalbanners['description_normal'.$i]?></font></a></div></td>

			</tr>

			<?

			}

			else

			{

			?>

			<tr><td width="470" height="80" align="center"><a href=><img src="images/banner.gif" width="468" height="60" alt="banner" longdesc="EarnTalks.com" border="0"></a><br>

			<font size="1"><a href=>Place your Banner Ads Here Only $20/Week</a> </font><font size="1" color="#FF0000"><strong>Available Now!</strong></font><BR></td>

			  <td><div align="center"><font size="1">Description of Your Program</font></div></td>

			</tr>

			

			

		<? }}?>

			

			</table></td>

			</tr>

			

			

			</table>

