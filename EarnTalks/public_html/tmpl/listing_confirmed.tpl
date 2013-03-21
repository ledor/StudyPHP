{include file="header.tpl"}

{if $success == 0}
<b>Listing not confirmed:</b><br><br>

Please check the link you received. It seems like the link is broken.
{else}
<b>Listing confirmed:</b><br><br>

 Thank you for using our system.<br>
 Your listing has been successfully added and will be listed after administrator approval.

<br><br>
<a href="?a=home">Return to the home page</a>
{/if}


{include file="footer.tpl"}
