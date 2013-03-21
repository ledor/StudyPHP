<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td>
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td width=6><img src="images/box1.gif" width=6 height=28></td>
<td class="box1"><img src="images/t2.gif" width=13 height=13 align="left">
<div class="side_title" align="left">New Listings&nbsp;&nbsp;&nbsp;<img src="images/new.gif" ></div></td>
<td width=6><img src="images/box2.gif" width=6 height=28 /></td></tr></table>
</td></tr>
<tr><td class="box2" valign="top">
<table cellpadding="3" width="100%" cellspacing="0" border="0" class="adlight" align="center">
{section name=l loop=$new_listings}
{if $new_listings[l].data_type == 'date'}
<tr>
 <td>
   <small>{$new_listings[l].date}</small>
 </td>
</tr>
{else}
<tr>
 <td align=left>
   <a href="?a=go&lid={$new_listings[l].id}" target=_blank class=newlistingslink> <strong>{$new_listings[l].name}</strong></a>
      {if $new_listings[l].hyip_status == 1}<font color="#009900"><strong>Paying</strong></font>{/if}
   {if $new_listings[l].hyip_status == 2}<font color="#666666"><strong>Waiting</strong></font>{/if}
   {if $new_listings[l].hyip_status == 3}<font color="#FF6600"><strong>Problem</strong></font>{/if}
   {if $new_listings[l].hyip_status == 4}<font color="#FF0000"><strong>Not Paying</strong></font>{/if}
   <br>
   {$new_listings[l].percents}
 </td>
</tr>
{/if}
{/section}
</table>
</div></td></tr>
<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td width=6><img src="images/box3.gif" width=6 height=6></td>
<td class="box3"><img src="images/spacer.gif" width=1 height=1></td>
<td width=6><img src="images/box4.gif" width=6 height=6></td></tr></table>
</td></tr></table><br>