<?php /* Smarty version 2.6.2, created on 2010-04-09 17:50:59
         compiled from button.tpl */ ?>
<br><div class="list_text"><div align="center"><img src="images/t1.gif" align="absMiddle"> <a class="list_menu">Monitor Button</a>
<hr size=1 noshade="noshade" style="border:1px #cccccc dotted"></div>

<div align="left"><table width=100%>
<tr>
<td align="center"><img src="index.php?a=image&lid=<?php echo $this->_tpl_vars['listing']['id']; ?>
"></td>
</tr>

<tr><td align="center"><b>To place above button on your site click on box below and copy the code:</b></td></tr>

<tr><td align="center"><textarea class="inpts" style="width:300px; height:55px; overflow: auto" name="notify" rows=1 cols=20 onmouseover="this.select()">&lt;a href=&quot;<?php echo $this->_tpl_vars['settings']['site_url']; ?>
/?a=details&lid=<?php echo $this->_tpl_vars['listing']['id']; ?>
&quot; target=&quot;_blank&quot;&gt;&lt;img src="<?php echo $this->_tpl_vars['settings']['site_url']; ?>
/?a=image&lid=<?php echo $this->_tpl_vars['listing']['id']; ?>
" border=0>&lt;/a&gt;</textarea></td>
</tr>
</table>

<br>
<br>


<table width=100%>
<tr>
<td align="center"><img src="index.php?a=image2&lid=<?php echo $this->_tpl_vars['listing']['id']; ?>
"></td>
</tr>

<tr><td align="center"><b>To place above floating button on your site click on box below and copy the code:</b></td></tr>

<tr><td align="center">
<textarea name="textarea" wrap="physical" cols="13" rows="10" onmouseover="this.select()">
<script language="JavaScript" src="<?php echo $this->_tpl_vars['settings']['site_url']; ?>
/getstatus.js" type="text/javascript"></script>
<script type="text/javascript">showdetails("<?php echo $this->_tpl_vars['listing']['id']; ?>
","tl","top","left");</script>
</textarea>

<textarea name="textarea" wrap="physical" cols="13" rows="10" onmouseover="this.select()">
<script language="JavaScript" src="<?php echo $this->_tpl_vars['settings']['site_url']; ?>
/getstatus.js" type="text/javascript"></script>
<script type="text/javascript">showdetails("<?php echo $this->_tpl_vars['listing']['id']; ?>
","tr","top","right");</script>
</textarea>

<textarea name="textarea" wrap="physical" cols="13" rows="10" onmouseover="this.select()">
<script language="JavaScript" src="<?php echo $this->_tpl_vars['settings']['site_url']; ?>
/getstatus.js" type="text/javascript"></script>
<script type="text/javascript">showdetails("<?php echo $this->_tpl_vars['listing']['id']; ?>
","bl","bottom","left");</script>
</textarea>


<textarea name="textarea" wrap="physical" cols="13" rows="10" onmouseover="this.select()">
<script language="JavaScript" src="<?php echo $this->_tpl_vars['settings']['site_url']; ?>
/getstatus.js" type="text/javascript"></script>
<script type="text/javascript">showdetails("<?php echo $this->_tpl_vars['listing']['id']; ?>
","br","bottom","right");</script>
</textarea>

</td>
</tr>
</table>