
<table cellspacing="4" cellpadding="4">
<tr>
  <th>Title1</th>
</tr>
{section name=l loop=$listings}
<tr><td><a href="?a=details&lid={$listings[l].id}{/if}"><b>{$listings[l].name}</b></a></td>
<td>&nbsp;</td>
<td><a href="?a=edit&lid={$listings[l].id}{/if}">Edit</a></td>
</tr>
{/section}
</table>

