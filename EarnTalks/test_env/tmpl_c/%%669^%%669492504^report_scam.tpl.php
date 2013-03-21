<?php /* Smarty version 2.6.2, created on 2011-12-23 10:37:11
         compiled from report_scam.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  echo '
<script type="text/javascript">
function checkform3() {
  if (document.repscam.eml.value == \'\') {
    alert("Please enter your e-mail address!");
    document.repscam.eml.focus();
    return false;
  }
  if (document.repscam.notify.value == \'\') {
    alert("Please let us know more information!");
    document.repscam.notify.focus();
    return false;
  }
  return true;
}
</script>
'; ?>

<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left" /><div class="maintitle_text" align="left"><div align="left">REPORT SCAM</div></div></div></td></tr><tr><td class="main_line"><img src="images/spacer.gif" height=3 /></td></tr>
<tr><td><div class="list_side"><table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="top"><div class="list_info">
<?php if ($this->_tpl_vars['say'] == 'send'): ?>
<div align="center">Message has been successfully sent. Thank you.</div><br><br>
<?php else: ?>
<div align="left">Please fill this form below to report SCAM:</div><br>
<form method="post" name="repscam" style="margin: 0" onSubmit="return checkform3();">
<input type="hidden" name="a" value="report_scam">
<input type="hidden" name="action" value="send">
<input type="hidden" name="lid" value="<?php echo $this->_tpl_vars['listing']['id']; ?>
">
<input type="hidden" name="hyip_name" value="<?php echo $this->_tpl_vars['listing']['name']; ?>
">
<input type="hidden" name="hyip_url" value="<?php echo $this->_tpl_vars['listing']['url']; ?>
">
<table width=100%>
<tr><td width=40% align="right">Program Name:</td>
<td width=60% align="left"><a href="?a=go&lid=<?php echo $this->_tpl_vars['listing']['id']; ?>
" target="_blank"><b><?php echo $this->_tpl_vars['listing']['name']; ?>
</b></a></td></tr>
<tr><td align="right">Your E-mail:</td>
<td align="left"><input class="inpts" name="eml" style="width:220px"></td></tr>
<tr><td align="right">Your Reason:</td>
<td align="left"><textarea class="inpts" style="width:220px; height:55px; overflow:auto" name="notify"></textarea></td></tr>
<tr><td>&nbsp</td>
<td align="left"><input type="submit" name="reportscam" value="Send" class="sbmt"></td></tr>
</table></form>
<?php endif; ?>
</div></td></tr></table>
</td></tr></table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>