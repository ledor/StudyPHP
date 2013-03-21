<table cellspacing=0 cellpadding=1 border=0 width=100%>
<tr>
<td>
<table  cellspacing=0 cellpadding=0 border=0 width=100%>
<tr valign="middle" height="30" class="listtitle">
<td width="20">&nbsp;</td>
<td valign="middle" class="groupname">{$groups[g].name}</td>
<td valign="middle">
{if $groups[g].reg_enabled}
<div align="right">
<a href="?a=advertise#{$groups[g].type}" class=smalllink>List your program in the {$groups[g].name} listing </a></div>
{/if}
</td>
<td width="10" valign="bottom">&nbsp;</td>
</tr>
 </table>
</tr>
{section name=l loop=$groups[g].listings}
<tr>
 <td>
{assign var='listing' value=$groups[g].listings[l]}
{include file="details_free.tpl"}
 </td>
</tr>

{/section}
</table>
