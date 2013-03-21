<table cellspacing=0 cellpadding=4 border=0 width=100%>
<tr>
 <th colspan=2 class=title_box>Text Ads</th>
</tr>
{if $textads}
{section name=ad loop=$textads}
<tr>
 <td align=center>
            <table cellspacing="0" border="0" width="100%">
			<tr><td class=adblack>
            <table cellpadding="3" width="100%" cellspacing="0" border="0">
             <tr>
              <td class=adlight >
                <a href="{$textads[ad].url}" target=_blank class=adlink><b>{$textads[ad].title}</b></a><br>
                <div class=adtext align=justify>{$textads[ad].text}</div>
              </td>
             </tr>
            </table>
            </td></tr>			
<tr>
<td background="images/shadow.gif" align="center">{if $textads[ad].expiration}<span class=expiresdate>Expires on {$textads[ad].exp_date}</span>{/if}
</td>
</tr>
</table>
 </td>
</tr>
{/section}
{/if}<tr>
 <td align=center><a href="?a=advertise#textads" class=smalllink>Place Your Text Ads Here for Only ${showminimin()}/Week</a></td>
</tr>
</table>
