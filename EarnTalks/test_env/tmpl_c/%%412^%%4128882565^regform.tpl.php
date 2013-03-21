<?php /* Smarty version 2.6.2, created on 2011-12-19 13:15:38
         compiled from regform.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'regform.tpl', 70, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>
function checkregform(){
var form = document.regform;
if(form.username.value == \'\') {
alert(\'Enter user name\');
form.username.focus();
return false;
}
if(form.email.value == \'\') {
alert(\'Enter Email\');
form.email.focus();
return false;
}
if(form.code.value == \'\') {
alert(\'Enter security code\');
form.code.focus();
return false;
}
if(form.password.value == \'\') {
alert(\'Enter password\');
form.password.focus();
return false;
}
if(form.password2.value == \'\') {
alert(\'Enter password confirmation\');
form.password2.focus();
return false;
}
if(form.password.value != form.password2.value) {
alert(\'Passwords do not match\');
return false;
}
return true;
}
</script>
'; ?>


<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left" /><div class="maintitle_text" align="left"><div align="left">RERISTER FORM</div></div></div></td></tr><tr><td class="main_line"><img src="images/spacer.gif" height=3 /></td></tr>
<tr><td><div class="list_side"><table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="top"><div class="list_info">


<table width="95%" border="0" cellpadding="4" cellspacing="0" style="margin:5px;">
<tr bgcolor="#e0e0e0">
<td bgcolor="#ffffff" width="100%" style="border:1px #660000 solid"><div class=mtxt style="padding:5px;" align="left"><font color="#444444">After registration, you will go live many useful functions. "My Hyips" is one of them, with 
which you can bookmark projects and just watch over them. Website administrators will get a 
convenient opportunities for editing. Even more, all registered users are free from entering 
captcha number when they vote or comment on the <strong>investment</strong> project.</font></div> </td></tr></table>

<?php if ($this->_tpl_vars['errors']): ?>
<ul>
<?php if (isset($this->_sections['e'])) unset($this->_sections['e']);
$this->_sections['e']['name'] = 'e';
$this->_sections['e']['loop'] = is_array($_loop=$this->_tpl_vars['errors']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['e']['show'] = true;
$this->_sections['e']['max'] = $this->_sections['e']['loop'];
$this->_sections['e']['step'] = 1;
$this->_sections['e']['start'] = $this->_sections['e']['step'] > 0 ? 0 : $this->_sections['e']['loop']-1;
if ($this->_sections['e']['show']) {
    $this->_sections['e']['total'] = $this->_sections['e']['loop'];
    if ($this->_sections['e']['total'] == 0)
        $this->_sections['e']['show'] = false;
} else
    $this->_sections['e']['total'] = 0;
if ($this->_sections['e']['show']):

            for ($this->_sections['e']['index'] = $this->_sections['e']['start'], $this->_sections['e']['iteration'] = 1;
                 $this->_sections['e']['iteration'] <= $this->_sections['e']['total'];
                 $this->_sections['e']['index'] += $this->_sections['e']['step'], $this->_sections['e']['iteration']++):
$this->_sections['e']['rownum'] = $this->_sections['e']['iteration'];
$this->_sections['e']['index_prev'] = $this->_sections['e']['index'] - $this->_sections['e']['step'];
$this->_sections['e']['index_next'] = $this->_sections['e']['index'] + $this->_sections['e']['step'];
$this->_sections['e']['first']      = ($this->_sections['e']['iteration'] == 1);
$this->_sections['e']['last']       = ($this->_sections['e']['iteration'] == $this->_sections['e']['total']);
?>
<li><span style="color: red">
<?php if ($this->_tpl_vars['errors'][$this->_sections['e']['index']] == 'name'): ?>User with such name already exists<?php endif;  if ($this->_tpl_vars['errors'][$this->_sections['e']['index']] == 'email'): ?>Email already in use<?php endif;  if ($this->_tpl_vars['errors'][$this->_sections['e']['index']] == 'captcha'): ?>Wrong security code<?php endif; ?>
</span></li>
<?php endfor; endif; ?>
</ul>
<br>
<?php endif; ?>
<br>    
<form method="post" name="regform" onsubmit="return checkregform()">
<input type="hidden" name="a" value="register">
<input type="hidden" name="action" value="register">
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr><td width="34%" style="font-family: Tahoma; font-size: 11px; padding-left:5px">* User name: </td>
<td width="66%" style="font-family: Tahoma; font-size: 11px;"><input type="text" name="username" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['username'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class="inpts" size="30"></td></tr>

<tr><td width="34%" style="font-family: Tahoma; font-size: 11px; padding-left:5px">* Email: </td>
<td style="font-family: Tahoma; font-size: 11px;"><input type="text" name="email" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class="inpts" size="30"></td></tr>

<tr><td width="34%" style="font-family: Tahoma; font-size: 11px; padding-left:5px">* Password: </td>
<td style="font-family: Tahoma; font-size: 11px;"><input type="password" name="password" class="inpts" size="30"></td></tr>

<tr><td width="34%" style="font-family: Tahoma; font-size: 11px; padding-left:5px">* Passord confirmation: </td>
<td style="font-family: Tahoma; font-size: 11px;"><input type="password" name="password2" class="inpts" size="30"></td></tr>

<tr><td>&nbsp;</td>
<td><input type="submit" name="submit" value=" Register " class="sbmt"></td></tr>
<tr><td>&nbsp;</td></tr>
</table>
</form>
</div></td></tr></table>
</div></td></tr></table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>