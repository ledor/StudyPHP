<?php /* Smarty version 2.6.2, created on 2011-12-18 03:18:31
         compiled from install.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header_install.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['wrong_mysql_data']): ?>
</center>
Wrong mysql data.<br><br>

Please make sure you have entered the right mysql host, mysql database name, mysql login, mysql password.<br>
Ask your hosting provider for this information if you are not sure.
<br><br>
<center>
<?php endif; ?>

<?php if ($this->_tpl_vars['installed'] != 1): ?>
<form method=post>
<input type=hidden name=a value=install>
<table cellspacing=2 cellpadding=2 border=0>
<tr>
 <th colspan=2>MySQL data</th>
</tr><tr>
 <td>Mysql host:</td>
 <td><input type=text name=mysql_host value='<?php if ($this->_tpl_vars['form_data']['mysql_host']):  echo $this->_tpl_vars['form_data']['mysql_host'];  else: ?>localhost<?php endif; ?>' class=inpts size=30></td>
</tr><tr>
 <td>Mysql database name:</td>
 <td><input type=text name=mysql_db value='<?php echo $this->_tpl_vars['form_data']['mysql_db']; ?>
' class=inpts size=30></td>
</tr><tr>
 <td>Mysql username:</td>
 <td><input type=text name=mysql_username value='<?php echo $this->_tpl_vars['form_data']['mysql_username']; ?>
' class=inpts size=30></td>
</tr><tr>
 <td>Mysql password:</td>
 <td><input type=text name=mysql_password value='<?php echo $this->_tpl_vars['form_data']['mysql_password']; ?>
' class=inpts size=30></td>
</tr><tr>
 <th colspan=2>License data:</th>
</tr><tr>
 <td>Host:</td>
 <td><?php echo $this->_tpl_vars['hostname']; ?>
</td>
</tr><tr>
 <th colspan=2>System Settings:</th>
</tr><tr>
 <td>Administrator E-mail:</td>
 <td><input type=text name=admin_email value='<?php echo $this->_tpl_vars['form_data']['admin_email']; ?>
' class=inpts size=30></td>
</tr><tr>
 <td>System E-mail:</td>
 <td><input type=text name=system_email value='<?php echo $this->_tpl_vars['form_data']['system_email']; ?>
' class=inpts size=30></td>
</tr><tr>
 <td>Login:</td>
 <td><input type=text name=admin_login value='' class=inpts size=30></td>
</tr><tr>
 <td>Password:</td>
 <td><input type=password name=admin_password value='' class=inpts size=30></td>
</tr><tr>
 <td>&nbsp;</td>
 <td><input type=submit value='Install' class=sbmt></td>

</tr></table>
</form>
<?php else: ?>
<h1>The script has been successfully installed!</h1>
<br><br>
<table cellspacing=0 cellpadding=1 border=0 width=400><tr><td>
Please delete the install.php file for security reasons.<br><br>

Path to the list: <a href="<?php echo $this->_tpl_vars['script_path']; ?>
" target=_blank><?php echo $this->_tpl_vars['script_path']; ?>
</a><br>
Path to the Admin Panel: <a href="<?php echo $this->_tpl_vars['script_path']; ?>
/admin.php" target=_blank><?php echo $this->_tpl_vars['script_path']; ?>
/admin.php</a><br>
Administrator login: <?php echo $this->_tpl_vars['form_data']['admin_login']; ?>
<br>
Administrator password: <?php echo $this->_tpl_vars['form_data']['admin_password']; ?>
<br><br>

Login to the admin area, go to the settings screen and specify your sitename and other information.<br>
</td></tr></table>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer_install.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>