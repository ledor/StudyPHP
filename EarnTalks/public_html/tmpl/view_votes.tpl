<br><div class="list_text"><div align="center"><img src="images/t1.gif" align="absMiddle"> <a class="list_menu">Ratings stats for <b>{$listing.name}</b></a>
<hr size=1 noshade="noshade" style="border:1px #cccccc dotted"></div>

<table width="100%" border="0">
<tr><td align="left" width="15%">Very good</td>
<td align="left"><img src="images/r3.gif" align="absmiddle"> ({$listing.votes_summary.3} votes)</td></tr>
<td align="left">Good</td>
<td align="left"><img src="images/r2.gif" align="absmiddle"> ({$listing.votes_summary.2} votes)</td></tr>
<td align="left">Bad</td>
<td align="left"><img src="images/r1.gif" align="absmiddle"> ({$listing.votes_summary.1} votes)</td></tr>
<td align="left">Very bad</td>
<td align="left"><img src="images/r0.gif" align="absmiddle"> ({$listing.votes_summary.0} votes)</td>
</tr>
</table><br>


<a name="vote"></a>
<form method=post name=vote onsubmit="return procVote()">
<input type="hidden" name="a" value="add_vote">
<input type="hidden" name="action" value="save">
<input type="hidden" name="lid" value="{$listing.id}">
<table cellspacing=0 cellpadding=2 border=0 width=100%>
<tr>
 <td colspan=3 class=title align=center>your Vote for <b>{$listing.name}</b></td>
</tr>
<tr>
  <td colspan=3><table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width=25% height=50 align=center><input type="radio" name="vote" value=3>
    Very Good <img src="images/r3.gif" alt="Very Good" title="Very Good"></td>

      <td width=25% align=center><input type="radio" name="vote" value=2 checked>
    Good <img src="images/r2.gif" alt="Good" title="Good"></td>

      <td width=25% align=center><input type="radio" name="vote" value=1>
    Bad <img src="images/r1.gif" alt="Bad" title="Bad"></td>

      <td width=25% align=center><input type="radio" name="vote" value=0>
    Very Bad <img src="images/r0.gif" alt="Very Bad" title="Very Bad"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table></td>
</tr>
<tr>
  <td colspan=3>
You can write short comment (max. 255 chars):<br>
<textarea name="comment" class="inpts" cols=65 rows=5></textarea>
  </td>
</tr>
<tr>
  <td colspan=3>
Your e-mail{if $settings.vote_confirmation_require} (we will send you your vote confirmation code){/if}:<br>
<input type="text" name="email" class=inpts size=40>
  </td>
</tr>
<tr>
  <td colspan=3><input type="submit" value="Vote" class=sbmt></td>
</tr></table></form>

{if $votes}
<div style="text-align:left;">Latest 100 ratings:</div>

<table width="100%" cellspacing="0" cellpadding="3" border="0">
<tr style="background-color: #cccccc">
  <td align=center>Rating</td>
  <td align=center>User IP</td>
  <td align=center>User E-Mail</td>
  <td align=center>Date</td>
</tr>

{section name=v loop=$votes}
<tr bgcolor={if $smarty.section.v.rownum % 2 != 0}#f2f2f2{else}#ffffff{/if}>
  <td align=center>
   {if $votes[v].vote == 0}<img src="images/r0.gif" alt="Very Bad" title="Very Bad">{/if}
   {if $votes[v].vote == 1}<img src="images/r1.gif" alt="Bad" title="Bad">{/if}
   {if $votes[v].vote == 2}<img src="images/r2.gif" alt="Good" title="Good">{/if}
   {if $votes[v].vote == 3}<img src="images/r3.gif" alt="Very Good" title="Very Good">{/if}
  </td>
  <td align="center">{$votes[v].ip}</td>
  <td align="center">{$votes[v].email}</td>
  <td align=center>{$votes[v].fdate}</td>
</tr>
{if $votes[v].comment}
<tr>
  <td>&nbsp;</td>
  <td colspan=3 align="left"><img src="images/vcom.gif" alt=""> <font color="{if $votes[v].vote == 0}red{/if}{if $votes[v].vote == 1}orange{/if}{if $votes[v].vote == 2}#CBA903{/if}{if $votes[v].vote == 3}green{/if}">{$votes[v].comment}</td>
</tr>
{/if}
{/section}
</table>
{/if}
<br><br>