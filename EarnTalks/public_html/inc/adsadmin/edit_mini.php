<form name="miniads_form" method="post" action="admin.php">
  <table width="95%" border="0" cellspacing="2" cellpadding="0">
  <tr>
      <td colspan="2"> <strong>I Will Add &nbsp;<select name="num_mini">
	  <?
	  	for ($i=1;$i<=20;$i++)
		{
        echo '<option value="'.$i.'" ';
		if ($minibanners['num_mini']==$i) echo 'selected';
		echo '>'.$i.'</option>';
		}
	?>
      </select>
        &nbsp; ADS Now!
        MAX Spend is $
        <input name="max_mini" type="text" value="<? echo $minibanners['max_mini']?>" size="4" />
        Decrease
        $
        <input name="step_mini" type="text" value="<? echo $minibanners['step_mini']?>" size="4" />
        <input name="submit" type="submit" value='.Submit.' />
      </strong></td>
    </tr>
  <tr>
    <td colspan="2"><font color="#FF0000"><strong>Warning!</strong> You will lose some ADS info when you select a  number</font><font color="#FF0000" size="2"><strong> less than <? echo $minibanners['num_mini'];?> </strong>!</font></td>
    </tr>

  <? for ($i=1;$i<=$minibanners['num_mini']; $i++)
  {
  ?>
  
  
    <tr>
      <td colspan="2" align="center" class=title><strong>:: Text ADS or Mini Banner No.<? echo $i.' ( $'; echo $minibanners['max_mini']-($i-1)*$minibanners['step_mini']; echo'/Week )';?> :: </strong></td>
    </tr>
    <tr>
      <td align="right">Enable:</td>
      <td><select name="enable_mini<? echo $i?>">
        <option value="1" <? if ($minibanners['enable_mini'.$i]=='1') echo 'selected';?>>YES</option>
        <option value="0" <? if ($minibanners['enable_mini'.$i]=='0') echo 'selected';?>>NO</option>
      </select>
      <font color="#FF0000"><strong>*Select to Disable or Enable this ADS </strong></font></td>
    </tr>
    <tr>
      <td align="right">Program Name: </td>
      <td><input name="name_mini<? echo $i?>" type="text" value="<? echo $minibanners['name_mini'.$i]?>" size="40"></td>
    </tr>
    <tr>
      <td align="right">URL:</td>
      <td><input name="url_mini<? echo $i?>" type="text" value="<? echo $minibanners['url_mini'.$i]?>" size="70"></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right">Banner URL: </td>
      <td><input name="imgurl_mini<? echo $i?>" type="text" id="imgurl_mini<? echo $i?>" value="<? echo $minibanners['imgurl_mini'.$i]?>" size="70">
      <br />
      <font color="#FF0000"><strong>*Leave it Blank  When you add a Text ADS </strong></font></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right">Expired Date: </td>
      <td><input name="expireddate_mini<? echo $i?>" type="text" value="<? echo $minibanners['expireddate_mini'.$i]?>" size="20"> 
        <font color="#FF0000"><strong>*Year-Mon-Day example:12-06-25</strong></font></td>
    </tr>
    <tr>
      <td align="right">Description:</td>
      <td><input name="description_mini<? echo $i?>" type="text" value="<? echo $minibanners['description_mini'.$i]?>" size="70" maxlength="250">
        <br>
        <font color="#FF0000"><strong>*No more than 250 chars </strong></font></td>
    </tr>
    <tr>
      <td height="120" colspan="2" align="center"><strong>:: Preview No.<? echo $i?> ::</strong>
        <table width="150" height="180" border="0" cellpadding="0" cellspacing="1"  style="background-color:#a88966" >
        <tr>
          <td align="center" bgcolor="#ffffcc">
		  <?
		  if (($minibanners['enable_mini'.$i]=='0') || !notexpired($minibanners['expireddate_mini'.$i]))
		  {
		  echo "<font color='#FF0000'>This ADS is disable(Expired) now!</font><br>";
		  }
		  
		  
		   if (strlen($minibanners['imgurl_mini'.$i])==0)
		  {
		  echo "<a href=\"".$minibanners['url_mini'.$i]."\" target=\"_blank\"><strong>".$minibanners['name_mini'.$i]."</strong></a><br>".$minibanners['description_mini'.$i];
		  }
		  else
		  {
		  echo "<a href=\"".$minibanners['url_mini'.$i]."\" target=\"_blank\">";
		  echo "<strong>".$minibanners['name_mini'.$i]."</strong></a><br>";
		  
		  if (substr($minibanners['imgurl_mini'.$i],-4,4)=='.swf')
			 		{
			 		echo '<embed width="125" height="125" src="'.$minibanners['imgurl_mini'.$i].'"><noembed>'.$minibanners['url_mini'.$i].'</noembed><br>';
			 		}
			 		else
			 		{
			 		echo '<a href="'.$minibanners['url_mini'.$i].'" target="_blank"><img src='.$minibanners['imgurl_mini'.$i].' border=0></a><br>';
			 		}	
		  
		   echo "<br>".$minibanners['description_mini'.$i];
		  
		  }
		  ?>          </td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="20" colspan="2" align="center">	<div align="center"><input type=submit value=' . Save . '></div></td>
    </tr>
	
	
	<? }?>
	<input name="a" type="hidden" value="minibanners">
	<input name="action" type="hidden" value="siads_save_action">
  </table>

</form>

