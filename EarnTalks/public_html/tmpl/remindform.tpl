{include file="header.tpl"}
{literal}
<script>
function checkremindform()
{
var form = document.remindform;
if (form.email.value == '') 
{
alert('please enter your username or email');
form.email.focus();
return false;
}
return true;
}
</script>
{/literal}
<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left" /><div class="maintitle_text" align="left"><div align="left">Remind password</div></div></div></td>
</tr>
<tr><td class="main_line"><img src="images/spacer.gif" height=3 /></td></tr>
<tr><td><div class="list_side"><table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="top" align=center><div class="list_info">
    
{if $found_records == 0}
<p style="color:red">No accounts found!</p>
{elseif $found_records > 0}
<p style="color:green">Login and password has been sent to your e-mail account!</p>
{/if}

<br> 
<form method="post" name="remindform" onsubmit="return checkremindform()">
<input type="hidden" name="a" value="remindpassword">
<input type="hidden" name="action" value="sendpass">
<table cellspacing=1 cellpadding=2 border=0 width="85%">

<tr><td>Your E-mail or Username: </td>
<td><input type="text" name="email" value="{$frm.email|escape:html}" class="inpts" size="30"></td></tr>

<tr><td>&nbsp;</td><td><input type="submit" value="submit" class="sbmt"></td></tr>
</table>
</form>
</div></td></tr></table>
</div></td></tr></table>

{include file="footer.tpl"}