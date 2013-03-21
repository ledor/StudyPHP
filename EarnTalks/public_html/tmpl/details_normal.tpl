<div class="list_side">
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td height=24 bgcolor="#EEEEEE">
<table width=100% border=0 cellspacing=0 cellpadding=0 height=24>
<tr><td class="list_title"><img src="images/rv.gif" width=13 height=12 align="left">
<div class="list_name" align="left"><a href="?a=go&lid={$listing.id}" target="_blank">{$listing.name}</a>{if $listing.new} <img src="images/new_ani.gif" border=0>{/if}</div></td>
<td align="right"><div class="list_ds" align="right"><b><a href="?a=details&lid={$listing.id}">Details</a></b> | <b>{if $userinfo.logged}{if !$myhyips}<a href="?a=bookmarks&action=add&lid={$listing.id}">Add to My Programs{else}<a href="?a=bookmarks&action=delete&lid={$listing.id}" onclick="return confirm('Do you really want to delete this listing?')">Delete{/if}{else}<a href="javascript:alert('Only available to registered users');">Add to My Programs{/if}</a></b> | <b><a href="?a=report_scam&lid={$listing.id}">Report SCAM</a></b></div></td></tr></table></td></tr>

<tr><td valign="top"><div class="list_info">

<table width=100% border=0 cellspacing=0 cellpadding=0>


<tr><td width=170 align="center"><a href="?a=go&lid={$listing.id}" target="_blank"><img src='http://capture.heartrails.com/medium?{$listing.url}' width="160" border="0" height="115"></img></a></td>
<td valign="top">
<table width=100% border=0 cellspacing=0 cellpadding=2>
<tr><td width=190 align="left" class="list_text"><img src="images/h_{$listing.hyip_status}.gif" width=108 height=25></td>
<td width=190 align="left" class="list_text"> {section name=p loop=$listing.payments}<img src="images/{$listing.payments[p].system}.gif" width=60 height=21 class="list_eg">{/section}</td>
</tr>

<tr><td align="left" class="list_text"><div align="left">Our Investment: <B>${$listing.spend}</B></div></td>
<td align="left" class="list_text">User Votes: <B>{if $listing.cvotes >1}{$listing.cvotes} votes{else}{$listing.cvotes} vote{/if}</B></td></tr>
<tr><td align="left" class="list_text">Payout Ratio: <B>{$listing.ratio*100}%  {if $listing.ratio > 1}<font color="#ff0000">in profit</font>{/if}</B></td>
<td align="left" class="list_text">Our Rating: {section name=r loop=$listing.rates}{if $listing.rates[r].star}<img src="images/full_star.gif" align=absmiddle>{else}<img src="images/empty_star.gif" align=absmiddle>{/if}{/section}</td>
</tr>
<tr>
<td align="left" class="list_text">Minimum Spend: <B>{if $listing.min_spend}${$listing.min_spend}{else}$0.01{/if}</B></td>
<td align="left" class="list_text">Referral: <B>{if $listing.referral}{$listing.referral}{else}No{/if}</B></td>
</tr>
<tr><td align="left" class="list_text">Maximum Spend: <B>{if $listing.max_spend}${$listing.max_spend}{else}No Limit{/if}</B></td>
<td align="left" class="list_text">Withdrawal: <B>{if $listing.withdrawal_type == 1}Manual{/if}
                     {if $listing.withdrawal_type == 2}Instant{/if}
                     {if $listing.withdrawal_type == 3}Automatic{/if}</B>

<br>{if checkrcb($listing.id)}{/if}

</td>
</tr>
</table></td></tr>
<tr><td><div class="list_text">{if $listing.support_email}<B>Contact Info: </B> <a href="mailto:{$listing.support_email}"><img alt="Support Email" src="images/smail.gif" align="absMiddle" border=0></a>{/if} </div></td>
<td align="left" class="list_text">Plans: <B>{if $listing.percents}{$listing.percents}{else}Various Plans{/if}</B></td>
</tr>

<tr><td class="list_text">{if $listing.support_forum || $listing.support_form || $listing.support_aim} {if $listing.support_forum}<a href="{$listing.support_forum}" target=_blank><b><center><img src="images/i_mmg.png" width="39" border="0" height="37"></b></a>{/if} {if $listing.support_form}&nbsp;&nbsp;&nbsp;&nbsp; <a href="{$listing.support_form}" target="_blank"><b><img src="images/i_talkgold.png" width="39" border="0" height="37"></b></a>{/if} {if $listing.support_aim}&nbsp;&nbsp;&nbsp;&nbsp; <a href="{$listing.support_aim}" target="_blank"><b><img src="images/i_dtm.png" width="39" border="0" height="37"></b></a></center>{/if}
</td>
{/if}
<td colspan=2 align="right" class="list_text" style="color: #666666">Monitored Days: <B>{$listing.monitored}</B><span style="margin-left: 10px">Added: <B>{$listing.added}</B></span><br/>Latest Payout: <B>{$listing.lastpayout}</B></td>
</tr>
</table>
</div>
</td></tr>
</table></div>