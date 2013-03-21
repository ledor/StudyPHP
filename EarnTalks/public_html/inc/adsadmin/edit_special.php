<form name="specialads_form" method="post" action="admin.php">

  <table width="95%" border="0" cellspacing="2" cellpadding="0">

  <tr>

      <td colspan="2"> <strong><font color="#FF0000" style="font-size:20PX ">You are editing 728*90 banners! </font><br>
        <br>
        I Will Add &nbsp;<select name="num_special">

	  <?

	  	for ($i=1;$i<=20;$i++)

		{

        echo '<option value="'.$i.'" ';

		if ($specialbanners['num_special']==$i) echo 'selected';

		echo '>'.$i.'</option>';

		}

	?>

      </select>

        &nbsp; ADS Now!

        MAX Spend is $

        <input name="max_special" type="text" value="<? echo $specialbanners['max_special']?>" size="4" />

        Decrease

        $

        <input name="step_special" type="text" value="<? echo $specialbanners['step_special']?>" size="4" />

        <input name="submit" type="submit" value='.Submit.' />

      </strong></td>

    </tr>

  <tr>

    <td colspan="2"><font color="#FF0000"><strong>Warning!</strong> You will lose some ADS info when you select a  number</font><font color="#FF0000" size="2"><strong> less than <? echo $specialbanners['num_special'];?> </strong>!</font></td>

    </tr>

  <? for ($i=1;$i<=$specialbanners['num_special']; $i++)

  {

  ?>

  

  

    <tr>

      <td colspan="2" align="center" class=title><strong>:: Special Banner No.<? echo $i.' ( $'; echo $specialbanners['max_special']-($i-1)*$specialbanners['step_special']; echo'/Week )';?> :: </strong></td>

    </tr>

	    <tr>

      <td align="right">Enable:</td>

      <td><select name="enable_special<? echo $i?>">

        <option value="1" <? if ($specialbanners['enable_special'.$i]=='1') echo 'selected';?>>YES</option>

        <option value="0" <? if ($specialbanners['enable_special'.$i]=='0') echo 'selected';?>>NO</option>

      </select>

      <font color="#FF0000"><strong>*Select to Disable or Enable this ADS </strong></font></td>

    </tr>

    <tr>

      <td align="right">Program Name: </td>

      <td><input name="name_special<? echo $i?>" type="text" value="<? echo $specialbanners['name_special'.$i]?>" size="40">    </td>

    </tr>

    <tr>

      <td align="right">URL:</td>

      <td><input name="url_special<? echo $i?>" type="text" value="<? echo $specialbanners['url_special'.$i]?>" size="60"></td>

    </tr>

    <tr>

      <td align="right">Banner URL: </td>

      <td><input name="imgurl_special<? echo $i?>" type="text" id="imgurl_special<? echo $i?>" value="<? echo $specialbanners['imgurl_special'.$i]?>" size="60"></td>

    </tr>

    <tr>

      <td align="right">Expired Date: </td>

      <td><input name="expireddate_special<? echo $i?>" type="text" value="<? echo $specialbanners['expireddate_special'.$i]?>" size="20"> 

        <font color="#FF0000"><strong>*Year-Mon-Day example:12-06-25</strong></font></td>

    </tr>

    <tr>

      <td align="right">Description:</td>

      <td><input name="description_special<? echo $i?>" type="text" value="<? echo $specialbanners['description_special'.$i]?>" size="60" maxlength="80">

        <br>

        <font color="#FF0000"><strong>*No more than 160 chars </strong></font></td>

    </tr>

    <tr>

      <td height="120" colspan="2" align="center"><strong>:: Preview No.<? echo $i?> ::</strong>

        <table width="730" height="120" border="0" cellpadding="0" cellspacing="1"  style="background-color:#a88966" >

        <tr>

          <td align="center" bgcolor="#ffffcc"><?

		  if (($specialbanners['enable_special'.$i]=='0') || !notexpired($specialbanners['expireddate_special'.$i]))

		  {

		  echo "<font color='#FF0000'>This ADS is disable(expired) now!</font><br>";

		  }

		  

		   if (strlen($specialbanners['imgurl_special'.$i])==0)

		  {

		  echo "<a href=\"".$specialbanners['url_special'.$i]."\" target=\"_blank\"><strong>".$specialbanners['name_special'.$i]."</strong></a><br>".$specialbanners['description_special'.$i];

		  }

		  else

		  {

		  echo "<a href=\"".$specialbanners['url_special'.$i]."\" target=\"_blank\">";

		  

		  if (substr($specialbanners['imgurl_special'.$i],-4,4)=='.swf')

			 	{

			 	echo '<embed width="728" height="90" src="'.$specialbanners['imgurl_special'.$i].'"><noembed>'.$specialbanners['url_special'.$i].'</noembed>';

			 	}

			 	else

			 	{

			 	echo '<img src="'.$specialbanners['imgurl_special'.$i].'" alt="'.$specialbanners['description_special'.$i].'" width="728" height="90" border="0">';

			 	}

				

				

		   echo "<br><strong>".$specialbanners['name_special'.$i]."</strong></a><br>".$specialbanners['description_special'.$i];

		  

		  }

		  ?>          </td>

        </tr>

      </table></td>

    </tr>

    <tr>

      <td height="20" colspan="2" align="center"><div align="center"><input type=submit value=' . Save . '></div></td>

    </tr>

	

	

	<? }?>

	<input name="a" type="hidden" value="specialbanners">

	<input name="action" type="hidden" value="siads_save_action">

  </table>



</form>



