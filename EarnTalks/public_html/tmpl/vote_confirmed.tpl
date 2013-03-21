{include file="header.tpl"}
<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left" /><div class="maintitle_text" align="left"><div align="left">Your voting for {$listing.name}</div></div></div></td></tr><tr><td class="main_line"><img src="images/spacer.gif" height=3 /></td></tr>
<tr><td><div class="list_side"><table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="top"><div class="list_info">

{if $success == 0}
<b>Vote is not confirmed:</b><br><br>

Please check thelink you received. It seems like the link is broken.
{else}
<b>Vote is confirmed:</b><br><br>

{if $success == 1}
Your vote has been successfully added.
{/if}
{if $success == 2}
Your vote has been successfully updated.
{/if}
<br><br>
<a href="?a=details&lid={$listing_id}">Return to the listing details</a>
{/if}

</div></td></tr></table>
{include file="footer.tpl"}
