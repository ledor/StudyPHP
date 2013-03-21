<form name="normalads_form" method="post" action="admin.php">
  <table width="95%" border="0" cellspacing="2" cellpadding="0">
  <tr>
      <td colspan="2"> <strong>I Will Add &nbsp;<select name="num_normal">
	  <?
	  	for ($i=1;$i<=20;$i++)
		{
        echo '<option value="'.$i.'" ';
		if ($normalbanners['num_normal']==$i) echo 'selected';
		echo '>'.$i.'</option>';
		}
	?>
      </select>
        ADS Now!
        MAX Spend is $
        <input name="max_normal" type="text" value="<? echo $normalbanners['max_normal']?>" size="4" />
        Decrease
        $
        <input name="step_normal" type="text" value="<? echo $normalbanners['step_normal']?>" size="4" />
        <input name="submit" type="submit" value='.Submit.' />
      </strong></td>
    </tr>
  <tr>
    <td colspan="2"><font color="#FF0000"><strong>Warning!</strong> You will lose some ADS info when you select a  number</font><font color="#FF0000" size="2"><strong> less than <? echo $normalbanners['num_normal'];?> </strong>!</font></td>
    </tr>
  <? for ($i=1;$i<=$normalbanners['num_normal']; $i++)
  {
  ?>
  
  
    <tr>
      <td colspan="2" align="center" class=title><strong>:: normal Banner No.<? echo $i.' ( $'; echo $normalbanners['max_normal']-($i-1)*$normalbanners['step_normal']; echo'/Week )';?> :: </strong></td>
    </tr>
    <tr>
      <td align="right">Enable:</td>
      <td><select name="enable_normal<? echo $i?>">
        <option value="1" <? if ($normalbanners['enable_normal'.$i]=='1') echo 'selected';?>>YES</option>
        <option value="0" <? if ($normalbanners['enable_normal'.$i]=='0') echo 'selected';?>>NO</option>
      </select>
      <font color="#FF0000"><strong>*Select to Disable or Enable this ADS </strong></font></td>
    </tr>
    <tr>
      <td align="right">Program Name: </td>
      <td><input name="name_normal<? echo $i?>" type="text" value="<? echo $normalbanners['name_normal'.$i]?>" size="40"></td>
    </tr>
    <tr>
      <td align="right">URL:</td>
      <td><input name="url_normal<? echo $i?>" type="text" value="<? echo $normalbanners['url_normal'.$i]?>" size="60"></td>
    </tr>
    <tr>
      <td align="right">Banner URL: </td>
      <td><input name="imgurl_normal<? echo $i?>" type="text" id="imgurl_normal<? echo $i?>" value="<? echo $normalbanners['imgurl_normal'.$i]?>" size="60"></td>
    </tr>
    <tr>
      <td align="right">Expired Date: </td>
      <td><input name="expireddate_normal<? echo $i?>" type="text" value="<? echo $normalbanners['expireddate_normal'.$i]?>" size="20"> 
        <font color="#FF0000"><strong>*Year-Mon-Day example:12-06-25</strong></font></td>
    </tr>
    <tr>
      <td align="right">Description:</td>
      <td><input name="description_normal<? echo $i?>" type="text" value="<? echo $normalbanners['description_normal'.$i]?>" size="60" maxlength="150">
        <br>
        <font color="#FF0000"><strong>*No more than 100 chars </strong></font></td>
    </tr>
    <tr>
      <td height="120" colspan="2" align="center"><strong>:: Preview No.<? echo $i?> ::</strong>
        <table width="500" height="100" border="0" cellpadding="0" cellspacing="1"  style="background-color:#a88966" >
        <tr>
          <td align="center" bgcolor="#FFFFCC"><?
		  if (($normalbanners['enable_normal'.$i]=='0') || !notexpired($normalbanners['expireddate_normal'.$i]))
		  {
		  echo "<font color='#FF0000'>This ADS is disable(Expired) now!</font><br>";
		  }
		  
		   if (strlen($normalbanners['imgurl_normal'.$i])==0)
		  {
		  echo "<a href=\"".$normalbanners['url_normal'.$i]."\" target=\"_blank\"><strong>".$normalbanners['name_normal'.$i]."</strong></a><br>".$normalbanners['description_normal'.$i];
		  }
		  else
		  {
		  
		  echo "<a href=\"".$normalbanners['url_normal'.$i]."\" target=\"_blank\">";
			 if (substr($normalbanners['imgurl_normal'.$i],-4,4)=='.swf')
			 	{
			 	echo '<embed width="468" height="60" src="'.$normalbanners['imgurl_normal'.$i].'"><noembed>'.$normalbanners['url_normal'.$i].'</noembed>';
			 	}
			 	else
			 	{
			 	echo '<img src="'.$normalbanners['imgurl_normal'.$i].'" alt="'.$normalbanners['description_normal'.$i].'" width="468" height="60" border="0">';
			 	}
			 echo "<br><strong>".$normalbanners['name_normal'.$i]."</strong></a><br>".$normalbanners['description_normal'.$i];
		  
		  }
		  ?>          </td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="20" colspan="2" align="center">	<div align="center"><input type=submit value=' . Save . '></div></td>
    </tr>
	
	
	<? }?>
	<input name="a" type="hidden" value="normalbanners">
	<input name="action" type="hidden" value="siads_save_action">
  </table>

</form>

