{include file="header.tpl"}
{literal}
<script>
function checkeditform()
{
var d = document.editform;
if(d.email.value == '') {
alert('Please Enter your e-mail!');
d.email.focus();
return false;
}
if((d.password.value || d.password2.value ) && d.password.value != d.password2.value) {
alert('Passwords do not match');
d.password.focus();
return false;
}
return true;
}
</script>
{/literal}
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left"><div class="maintitle_text" align="left">Member Area</div></div></td></tr>
<tr><td class="main_line"><img src="images/spacer.gif" height=3></td></tr>
<tr><td><div class="list_side">
{if $frm.say == 'changed'}<p align="center"><b style="color:green">Your info have been successfully updated!</b></p>{/if}
<form method="post" name="editform" onsubmit="return checkeditform()">
<input type="hidden" name="a" value="editprofile">
<input type="hidden" name="action" value="save">

<table cellspacing="2" cellpadding="2" border="0" width="85%">
<tr><td align="left">Username: </td>
<td align="left"><b>{$userinfo.username}</b></td></tr>

<tr><td align="left">* E-mail: </td>
<td align="left"><input type="text" name="email" value="{$userinfo.email}" class="inpts" size="30"></td></tr>

<tr><td align="left">Password <small style="color:red"><i>(only specify if you want to change)</i></small>: </td>
<td align="left"><input type="password" name="password" class="inpts" size="30"></td></tr>

<tr><td align="left">Password again: </td>
<td align="left"><input type="password" name="password2" class="inpts" size="30"></td></tr>
<tr><td>&nbsp;</td>
<td align="left"><input type="submit" value=" Edit " class="sbmt"></td></tr>
</table>
</form>
</div></td></tr></table>
{include file="footer.tpl"}