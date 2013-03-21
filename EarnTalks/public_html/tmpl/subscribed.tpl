{include file="header.tpl"}

<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <td align=center>
{if $errors}
{section name=e loop=$errors}
{if $errors[e].name == 'email'}
<li style="color: red"> Please enter your E-mail<br>
{/if}
{if $errors[e].name == 'invalid_email'}
<li style="color: red"> Please enter a valid E-mail<br>
{/if}
{/section}
{else}
Thank you.<br>
Your have been successfully subscribed.
{/if}
 <br><br>
<a href="index.php?a=home">Return to the LIST home page</a><br />
 <br />
 <a href="/index.html">Return to the SITE home page</a> </td>
</tr>
</table>

{include file="footer.tpl"}