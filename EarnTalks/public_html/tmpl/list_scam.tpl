<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td valign="middle">
<div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left">
<div class="maintitle_text" align="left">{$groups[g].name} Listing</div></div>
</td></tr>
<tr><td class="main_line"><img src="images/spacer.gif" height=3></td></tr>
<tr><td>

{section name=l loop=$groups[g].listings}
{assign var='listing' value=$groups[g].listings[l]}
{include file="details_scam.tpl"}
{/section}

</td></tr>
<tr><td>&nbsp;</td></tr></table>
