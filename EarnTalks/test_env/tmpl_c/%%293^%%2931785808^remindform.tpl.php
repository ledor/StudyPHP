<?php /* Smarty version 2.6.2, created on 2011-12-19 13:17:14
         compiled from remindform.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'remindform.tpl', 35, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  echo '
<script>
function checkremindform()
{
var form = document.remindform;
if (form.email.value == \'\') 
{
alert(\'please enter your username or email\');
form.email.focus();
return false;
}
return true;
}
</script>
'; ?>

<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left" /><div class="maintitle_text" align="left"><div align="left">Remind password</div></div></div></td>
</tr>
<tr><td class="main_line"><img src="images/spacer.gif" height=3 /></td></tr>
<tr><td><div class="list_side"><table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="top" align=center><div class="list_info">
    
<?php if ($this->_tpl_vars['found_records'] == 0): ?>
<p style="color:red">No accounts found!</p>
<?php elseif ($this->_tpl_vars['found_records'] > 0): ?>
<p style="color:green">Login and password has been sent to your e-mail account!</p>
<?php endif; ?>

<br> 
<form method="post" name="remindform" onsubmit="return checkremindform()">
<input type="hidden" name="a" value="remindpassword">
<input type="hidden" name="action" value="sendpass">
<table cellspacing=1 cellpadding=2 border=0 width="85%">

<tr><td>Your E-mail or Username: </td>
<td><input type="text" name="email" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class="inpts" size="30"></td></tr>

<tr><td>&nbsp;</td><td><input type="submit" value="submit" class="sbmt"></td></tr>
</table>
</form>
</div></td></tr></table>
</div></td></tr></table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>