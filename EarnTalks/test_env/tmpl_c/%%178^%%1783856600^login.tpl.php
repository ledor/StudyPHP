<?php /* Smarty version 2.6.2, created on 2011-12-18 03:20:46
         compiled from login.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'login.tpl', 12, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left" /><div class="maintitle_text" align="left"><div align="left">LOGIN FORM</div></div></div></td></tr><tr><td class="main_line"><img src="images/spacer.gif" height=3 /></td></tr>
<tr><td><div class="list_side"><table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="top"><div class="list_info">
<?php if ($this->_tpl_vars['frm']['say'] == 'error'): ?>
<b style="color: red">Your username or password is wrong, please try again!</b><br>
<?php endif; ?>

<form method="post" name="logform2">
<input type="hidden" name="a" value="do_login">
<table cellspacing=1 cellpadding=2 border=0 width=80%>
<tr><td><b>Username: </b></td>
<td><input type="text" name="username" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['username'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class="inpts" size="30"></td></tr>
<tr><td><b>Password: </b></td>
<td><input type="password" name="password" class="inpts" size="30"></td></tr>
<tr><td>&nbsp;</td>
<td><input type="submit" value=" Login " class="sbmt"></td>
</tr>
</table></form>
</div></td></tr></table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>