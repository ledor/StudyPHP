{include file="header.tpl"}
<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left" /><div class="maintitle_text" align="left"><div align="left">LOGIN FORM</div></div></div></td></tr><tr><td class="main_line"><img src="images/spacer.gif" height=3 /></td></tr>
<tr><td><div class="list_side"><table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="top"><div class="list_info">
{if $frm.say == 'error'}
<b style="color: red">Your username or password is wrong, please try again!</b><br>
{/if}

<form method="post" name="logform2">
<input type="hidden" name="a" value="do_login">
<table cellspacing=1 cellpadding=2 border=0 width=80%>
<tr><td><b>Username: </b></td>
<td><input type="text" name="username" value="{$frm.username|escape:html}" class="inpts" size="30"></td></tr>
<tr><td><b>Password: </b></td>
<td><input type="password" name="password" class="inpts" size="30"></td></tr>
<tr><td>&nbsp;</td>
<td><input type="submit" value=" Login " class="sbmt"></td>
</tr>
</table></form>
</div></td></tr></table>
{include file="footer.tpl"}