{include file="header.tpl"}
<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left" /><div class="maintitle_text" align="left"><div align="left">Your voting for {$listing.name}</div></div></div></td></tr><tr><td class="main_line"><img src="images/spacer.gif" height=3 /></td></tr>
<tr><td><div class="list_side"><table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="top"><div class="list_info">

<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <td align=center>
 Thank you for voting for <b>{$listing.name}</b><br>
{if $frm.success == 1}
Your vote has been successfully added.
{/if}
{if $frm.success == 2}
Your vote has been successfully updated.
{/if}
 <br><br>
<a href="?a=details&lid={$frm.lid}">Return to the listing details</a>
 </td>
</tr>
</table>
</div></td></tr></table>
{include file="footer.tpl"}