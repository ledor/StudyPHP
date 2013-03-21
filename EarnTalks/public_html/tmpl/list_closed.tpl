<table cellspacing=0 cellpadding=1 border=0 width=100%>
<tr class="title">
<td>
<table  cellspacing=0 cellpadding=0 border=0 width=100%>
<tr valign="middle" height="30">
<td width="30">&nbsp;</td>
<td valign="middle" class="groupname">{$groups[g].name}</td>
<td valign="middle">
{if $groups[g].reg_enabled}
<div align="right">
<a href="?a=advertise#{$groups[g].type}" class=smalllink><font color="#FFFFFF">List your program in the {$groups[g].type} listing </font></a></div>
{/if}
</td>
<td width="10">&nbsp;</td>
</tr>
 </table>
 </td>
</tr>
{section name=l loop=$groups[g].listings}
<tr>
 <td>
{assign var='listing' value=$groups[g].listings[l]}
{include file="details_closed.tpl"}
 </td>
</tr>
{/section}
</table>

