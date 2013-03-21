<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td>
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td width=6><img src="images/box1.gif" width=6 height=28></td>
<td class="box1"><img src="images/t2.gif" width=13 height=13 align="left">
<div class="side_title" align="left">Text Ads</div></td>
<td width=6><img src="images/box2.gif" width=6 height=28 /></td></tr></table>
</td></tr>
<tr><td class="box2" valign="top">
<table width=100% border=0 align="center" cellpadding=4 cellspacing=0>

{section name=ad loop=$textads}
<tr>
    <td align=center class=adlight>
         <a href="{$textads[ad].url}" target=_blank class=adlink><b>{$textads[ad].title}</b></a><br>
         <div class=adtext align=justify>{$textads[ad].text}</div>
</td></tr>
<tr>
<td background="images/shadow.gif" align="center">{if $textads[ad].expiration}<span class=expiresdate>Expires on {$textads[ad].exp_date}</span>{/if}
</td>
</tr>
{/section}
<tr>
 <td align=center><a href="?a=advertise&adtype=textads" class=smalllink>Place Your Text Ads Here! Only ${if showminimin()}{/if}/Week</a></td>
</tr>
</table>
</div></td></tr>
</table>
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td width=6><img src="images/box3.gif" width=6 height=6></td>
<td class="box3"><img src="images/spacer.gif" width=1 height=1></td>
<td width=6><img src="images/box4.gif" width=6 height=6></td></tr></table>
<br>