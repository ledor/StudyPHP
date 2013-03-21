<form name="rotatingads_form" method="post" action="admin.php">

  <table width="95%" border="0" cellspacing="2" cellpadding="0">

  <tr>

      <td colspan="2"> <strong>I Will Add &nbsp;<select name="num_rotating">

	  <?

	  	for ($i=1;$i<=20;$i++)

		{

        echo '<option value="'.$i.'" ';

		if ($rotatingbanners['num_rotating']==$i) echo 'selected';

		echo '>'.$i.'</option>';

		}

	?>

      </select>

        Rotating ADS Now!

        

       Every Spend is $

        <input name="max_rotating" type="text" value="<? echo $rotatingbanners['max_rotating']?>" size="4" />

        <input name="submit" type="submit" value='.Submit.' />

      </strong></td>

    </tr>

  <tr>

    <td colspan="2"><font color="#FF0000"><strong>Warning!</strong> You will lose some ADS info when you select a  number</font><font color="#FF0000" size="2"><strong> less than <? echo $rotatingbanners['num_rotating'];?> </strong>!</font></td>

    </tr>

  <? for ($i=1;$i<=$rotatingbanners['num_rotating']; $i++)

  {

  ?>

  

  

    <tr>

      <td colspan="2" align="center" class=title><strong>:: rotating Banner No.<? echo $i.' ( $'; echo $rotatingbanners['max_rotating']-($i-1)*$rotatingbanners['step_rotating']; echo'/Week )';?> :: </strong></td>

    </tr>

	    <tr>

      <td align="right">Enable:</td>

      <td><select name="enable_rotating<? echo $i?>">

        <option value="1" <? if ($rotatingbanners['enable_rotating'.$i]=='1') echo 'selected';?>>YES</option>

        <option value="0" <? if ($rotatingbanners['enable_rotating'.$i]=='0') echo 'selected';?>>NO</option>

      </select>

      <font color="#FF0000"><strong>*Select to Disable or Enable this ADS </strong></font></td>

    </tr>

    <tr>

      <td align="right">Program Name: </td>

      <td><input name="name_rotating<? echo $i?>" type="text" value="<? echo $rotatingbanners['name_rotating'.$i]?>" size="40">    </td>

    </tr>

    <tr>

      <td align="right">URL:</td>

      <td><input name="url_rotating<? echo $i?>" type="text" value="<? echo $rotatingbanners['url_rotating'.$i]?>" size="60"></td>

    </tr>

    <tr>

      <td align="right">Banner URL: </td>

      <td><input name="imgurl_rotating<? echo $i?>" type="text" id="imgurl_rotating<? echo $i?>" value="<? echo $rotatingbanners['imgurl_rotating'.$i]?>" size="60"></td>

    </tr>

    <tr>

      <td align="right">Expired Date: </td>

      <td><input name="expireddate_rotating<? echo $i?>" type="text" value="<? echo $rotatingbanners['expireddate_rotating'.$i]?>" size="20"> 

        <font color="#FF0000"><strong>*Year-Mon-Day example:12-06-25</strong></font></td>

    </tr>

    <tr>

      <td align="right">Description:</td>

      <td><input name="description_rotating<? echo $i?>" type="text" value="<? echo $rotatingbanners['description_rotating'.$i]?>" size="60" maxlength="100">

        <br>

        <font color="#FF0000"><strong>*No more than 100 chars </strong></font></td>

    </tr>

    <tr>

      <td height="120" colspan="2" align="center"><strong>:: Preview No.<? echo $i?> ::</strong>

        <table width="500" height="100" border="0" cellpadding="0" cellspacing="1"  style="background-color:#a88966" >

        <tr>

          <td align="center" bgcolor="#FFFFCC"><?

		  if (($rotatingbanners['enable_rotating'.$i]=='0') || !notexpired($rotatingbanners['expireddate_rotating'.$i]))

		  {

		  echo "<font color='#FF0000'>This ADS is disable(expired) now!</font><br>";

		  }

		  

		   if (strlen($rotatingbanners['imgurl_rotating'.$i])==0)

		  {

		  echo "<a href=\"".$rotatingbanners['url_rotating'.$i]."\" target=\"_blank\"><strong>".$rotatingbanners['name_rotating'.$i]."</strong></a><br>".$rotatingbanners['description_rotating'.$i];

		  }

		  else

		  {

		  echo "<a href=\"".$rotatingbanners['url_rotating'.$i]."\" target=\"_blank\">";

		  

		  if (substr($rotatingbanners['imgurl_rotating'.$i],-4,4)=='.swf')

			 	{

			 	echo '<embed width="468" height="60" src="'.$rotatingbanners['imgurl_rotating'.$i].'"><noembed>'.$rotatingbanners['url_rotating'.$i].'</noembed>';

			 	}

			 	else

			 	{

			 	echo '<img src="'.$rotatingbanners['imgurl_rotating'.$i].'" alt="'.$rotatingbanners['description_rotating'.$i].'" width="468" height="60" border="0">';

			 	}

				

				

		   echo "<br><strong>".$rotatingbanners['name_rotating'.$i]."</strong></a><br>".$rotatingbanners['description_rotating'.$i];

		  

		  }

		  ?>          </td>

        </tr>

      </table></td>

    </tr>

    <tr>

      <td height="20" colspan="2" align="center"><div align="center"><input type=submit value=' . Save . '></div></td>

    </tr>

	

	

	<? }?>

	<input name="a" type="hidden" value="rotatingbanners">

	<input name="action" type="hidden" value="siads_save_action">

  </table>



</form>



