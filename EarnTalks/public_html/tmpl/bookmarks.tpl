{include file="header.tpl"}
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left"><div class="maintitle_text" align="left">MY HYIPS</div></div></td></tr>
<tr><td class="main_line"><img src="images/spacer.gif" height=3></td></tr>
<tr><td>

{if $userinfo.logged}
{if !$listings}
<div class="list_side"><p align="center"><b>Currently there are no programs in the My HYIPs yet!</b></p></div>
{/if}
{if $say == 'deleted'}
<p align="center"><b style="color:green;">Listing has been deleted!</b></p>
{/if}
{if $say == 'added'}
<p align="center"><b style="color:green;">Listing has been added to My HYIPs!</b></p>
{/if}
{if $say == 'already_added'}
<p align="center"><b style="color:red;">This Listing alreadey added!</b></p>
{/if}

{section name=l loop=$listings}
{assign var="listing" value=$listings[l]}
{if $listing.type == 'Premium'}
{include file="details_premium.tpl"}
{/if}
{if $listing.type == 'Normal'}
{include file="details_normal.tpl"}
{/if}
{if $listing.type == 'Trial'}
{include file="details_trial.tpl"}
{/if}
{if $listing.type == 'Autosurf'}
{include file="details_autosurf.tpl"}
{/if}
{if $listing.type == 'Free'}
{include file="details_free.tpl"}
{/if}
{if $listing.type == 'Games'}
{include file="details_games.tpl"}
{/if}
{if $listing.type == 'Scam'}
{include file="details_scam.tpl"}
{/if}
{if $listing.type == 'Closed'}
{include file="details_closed.tpl"}
{/if}
{/section}
{else}
<div class="list_side"><p align="center"><b>Only available to registered users</b></p></div>
{/if}
</td></tr></table>
{include file="footer.tpl"}