{include file="header.tpl"}

{literal}
<script>
function checkregform(){
var form = document.regform;
if(form.username.value == '') {
alert('Enter user name');
form.username.focus();
return false;
}
if(form.email.value == '') {
alert('Enter Email');
form.email.focus();
return false;
}
if(form.code.value == '') {
alert('Enter security code');
form.code.focus();
return false;
}
if(form.password.value == '') {
alert('Enter password');
form.password.focus();
return false;
}
if(form.password2.value == '') {
alert('Enter password confirmation');
form.password2.focus();
return false;
}
if(form.password.value != form.password2.value) {
alert('Passwords do not match');
return false;
}
return true;
}
</script>
{/literal}

<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left" /><div class="maintitle_text" align="left"><div align="left">RERISTER FORM</div></div></div></td></tr><tr><td class="main_line"><img src="images/spacer.gif" height=3 /></td></tr>
<tr><td><div class="list_side"><table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="top"><div class="list_info">


<table width="95%" border="0" cellpadding="4" cellspacing="0" style="margin:5px;">
<tr bgcolor="#e0e0e0">
<td bgcolor="#ffffff" width="100%" style="border:1px #660000 solid"><div class=mtxt style="padding:5px;" align="left"><font color="#444444">After registration, you will go live many useful functions. "My Hyips" is one of them, with 
which you can bookmark projects and just watch over them. Website administrators will get a 
convenient opportunities for editing. Even more, all registered users are free from entering 
captcha number when they vote or comment on the <strong>investment</strong> project.</font></div> </td></tr></table>

{if $errors}
<ul>
{section name=e loop=$errors}
<li><span style="color: red">
{if $errors[e] == 'name'}User with such name already exists{/if}
{if $errors[e] == 'email'}Email already in use{/if}
{if $errors[e] == 'captcha'}Wrong security code{/if}
</span></li>
{/section}
</ul>
<br>
{/if}
<br>    
<form method="post" name="regform" onsubmit="return checkregform()">
<input type="hidden" name="a" value="register">
<input type="hidden" name="action" value="register">
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr><td width="34%" style="font-family: Tahoma; font-size: 11px; padding-left:5px">* User name: </td>
<td width="66%" style="font-family: Tahoma; font-size: 11px;"><input type="text" name="username" value="{$frm.username|escape:html}" class="inpts" size="30"></td></tr>

<tr><td width="34%" style="font-family: Tahoma; font-size: 11px; padding-left:5px">* Email: </td>
<td style="font-family: Tahoma; font-size: 11px;"><input type="text" name="email" value="{$frm.email|escape:html}" class="inpts" size="30"></td></tr>

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
{include file="footer.tpl"}
