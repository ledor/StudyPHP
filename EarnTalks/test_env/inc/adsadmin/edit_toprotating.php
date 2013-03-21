<form name="toprotatingads_form" method="post" action="admin.php">

  <table width="95%" border="0" cellspacing="2" cellpadding="0">

  <tr>

      <td colspan="2"> <strong>I Will Add &nbsp;<select name="num_toprotating">

	  <?

	  	for ($i=1;$i<=20;$i++)

		{

        echo '<option value="'.$i.'" ';

		if ($toprotatingbanners['num_toprotating']==$i) echo 'selected';

		echo '>'.$i.'</option>';

		}

	?>

      </select>

        toprotating ADS Now!

        

       Every Spend is $

        <input name="max_toprotating" type="text" value="<? echo $toprotatingbanners['max_toprotating']?>" size="4" />

        <input name="submit" type="submit" value='.Submit.' />

      </strong></td>

    </tr>

  <tr>

    <td colspan="2"><font color="#FF0000"><strong>Warning!</strong> You will lose some ADS info when you select a  number</font><font color="#FF0000" size="2"><strong> less than <? echo $toprotatingbanners['num_toprotating'];?> </strong>!</font></td>

    </tr>

  <? for ($i=1;$i<=$toprotatingbanners['num_toprotating']; $i++)

  {

  ?>

  

  

    <tr>

      <td colspan="2" align="center" class=title><strong>:: toprotating Banner No.<? echo $i.' ( $'; echo $toprotatingbanners['max_toprotating']-($i-1)*$toprotatingbanners['step_toprotating']; echo'/Week )';?> :: </strong></td>

    </tr>

	    <tr>

      <td align="right">Enable:</td>

      <td><select name="enable_toprotating<? echo $i?>">

        <option value="1" <? if ($toprotatingbanners['enable_toprotating'.$i]=='1') echo 'selected';?>>YES</option>

        <option value="0" <? if ($toprotatingbanners['enable_toprotating'.$i]=='0') echo 'selected';?>>NO</option>

      </select>

      <font color="#FF0000"><strong>*Select to Disable or Enable this ADS </strong></font></td>

    </tr>

    <tr>

      <td align="right">Program Name: </td>

      <td><input name="name_toprotating<? echo $i?>" type="text" value="<? echo $toprotatingbanners['name_toprotating'.$i]?>" size="40">    </td>

    </tr>

    <tr>

      <td align="right">URL:</td>

      <td><input name="url_toprotating<? echo $i?>" type="text" value="<? echo $toprotatingbanners['url_toprotating'.$i]?>" size="60"></td>

    </tr>

    <tr>

      <td align="right">Banner URL: </td>

      <td><input name="imgurl_toprotating<? echo $i?>" type="text" id="imgurl_toprotating<? echo $i?>" value="<? echo $toprotatingbanners['imgurl_toprotating'.$i]?>" size="60"></td>

    </tr>

    <tr>

      <td align="right">Expired Date: </td>

      <td><input name="expireddate_toprotating<? echo $i?>" type="text" value="<? echo $toprotatingbanners['expireddate_toprotating'.$i]?>" size="20"> 

        <font color="#FF0000"><strong>*Year-Mon-Day example:12-06-25</strong></font></td>

    </tr>

    <tr>

      <td align="right">Description:</td>

      <td><input name="description_toprotating<? echo $i?>" type="text" value="<? echo $toprotatingbanners['description_toprotating'.$i]?>" size="60" maxlength="100">

        <br>

        <font color="#FF0000"><strong>*No more than 100 chars </strong></font></td>

    </tr>

    <tr>

      <td height="120" colspan="2" align="center"><strong>:: Preview No.<? echo $i?> ::</strong>

        <table width="500" height="100" border="0" cellpadding="0" cellspacing="1"  style="background-color:#a88966" >

        <tr>

          <td align="center" bgcolor="#FFFFCC"><?

		  if (($toprotatingbanners['enable_toprotating'.$i]=='0') || !notexpired($toprotatingbanners['expireddate_toprotating'.$i]))

		  {

		  echo "<font color='#FF0000'>This ADS is disable(expired) now!</font><br>";

		  }

		  

		   if (strlen($toprotatingbanners['imgurl_toprotating'.$i])==0)

		  {

		  echo "<a href=\"".$toprotatingbanners['url_toprotating'.$i]."\" target=\"_blank\"><strong>".$toprotatingbanners['name_toprotating'.$i]."</strong></a><br>".$toprotatingbanners['description_toprotating'.$i];

		  }

		  else

		  {

		  echo "<a href=\"".$toprotatingbanners['url_toprotating'.$i]."\" target=\"_blank\">";

		  

		  if (substr($toprotatingbanners['imgurl_toprotating'.$i],-4,4)=='.swf')

			 	{

			 	echo '<embed width="468" height="60" src="'.$toprotatingbanners['imgurl_toprotating'.$i].'"><noembed>'.$toprotatingbanners['url_toprotating'.$i].'</noembed>';

			 	}

			 	else

			 	{

			 	echo '<img src="'.$toprotatingbanners['imgurl_toprotating'.$i].'" alt="'.$toprotatingbanners['description_toprotating'.$i].'" width="468" height="60" border="0">';

			 	}

				

				

		   echo "<br><strong>".$toprotatingbanners['name_toprotating'.$i]."</strong></a><br>".$toprotatingbanners['description_toprotating'.$i];

		  

		  }

		  ?>          </td>

        </tr>

      </table></td>

    </tr>

    <tr>

      <td height="20" colspan="2" align="center"><div align="center"><input type=submit value=' . Save . '></div></td>

    </tr>

	

	

	<? }?>

	<input name="a" type="hidden" value="toprotatingbanners">

	<input name="action" type="hidden" value="siads_save_action">

  </table>



</form>



