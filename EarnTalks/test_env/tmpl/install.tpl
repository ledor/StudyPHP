{include file="header_install.tpl"}

{if $wrong_mysql_data}
</center>
Wrong mysql data.<br><br>

Please make sure you have entered the right mysql host, mysql database name, mysql login, mysql password.<br>
Ask your hosting provider for this information if you are not sure.
<br><br>
<center>
{/if}

{if $installed != 1}
<form method=post>
<input type=hidden name=a value=install>
<table cellspacing=2 cellpadding=2 border=0>
<tr>
 <th colspan=2>MySQL data</th>
</tr><tr>
 <td>Mysql host:</td>
 <td><input type=text name=mysql_host value='{if $form_data.mysql_host}{$form_data.mysql_host}{else}localhost{/if}' class=inpts size=30></td>
</tr><tr>
 <td>Mysql database name:</td>
 <td><input type=text name=mysql_db value='{$form_data.mysql_db}' class=inpts size=30></td>
</tr><tr>
 <td>Mysql username:</td>
 <td><input type=text name=mysql_username value='{$form_data.mysql_username}' class=inpts size=30></td>
</tr><tr>
 <td>Mysql password:</td>
 <td><input type=text name=mysql_password value='{$form_data.mysql_password}' class=inpts size=30></td>
</tr><tr>
 <th colspan=2>License data:</th>
</tr><tr>
 <td>Host:</td>
 <td>{$hostname}</td>
</tr><tr>
 <th colspan=2>System Settings:</th>
</tr><tr>
 <td>Administrator E-mail:</td>
 <td><input type=text name=admin_email value='{$form_data.admin_email}' class=inpts size=30></td>
</tr><tr>
 <td>System E-mail:</td>
 <td><input type=text name=system_email value='{$form_data.system_email}' class=inpts size=30></td>
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
{else}
<h1>The script has been successfully installed!</h1>
<br><br>
<table cellspacing=0 cellpadding=1 border=0 width=400><tr><td>
Please delete the install.php file for security reasons.<br><br>

Path to the list: <a href="{$script_path}" target=_blank>{$script_path}</a><br>
Path to the Admin Panel: <a href="{$script_path}/admin.php" target=_blank>{$script_path}/admin.php</a><br>
Administrator login: {$form_data.admin_login}<br>
Administrator password: {$form_data.admin_password}<br><br>

Login to the admin area, go to the settings screen and specify your sitename and other information.<br>
</td></tr></table>
{/if}

{include file="footer_install.tpl"}
