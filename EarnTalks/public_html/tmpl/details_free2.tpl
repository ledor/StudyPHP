<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td valign="top"><div class="list_info">
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td width=170 align="center" valign="top">
<table width=100% border=0 cellspacing=0 cellpadding=2>

<tr><td align="center"><img src='http://capture.heartrails.com/medium?{$listing.url} ' width="160" border="0" height="100"></td></tr>
<tr><td><table width=100% border=0 class="list_info_side1">
<tr><td width=170 align="center"><script type="text/javascript" language="JavaScript" src="http://xslt.alexa.com/site_stats/js/t/a?url={$listing.url}" width=120 height=65></script>
</td></tr></table>
</td></tr>
<tr><td><table width=100% border=0 class="list_info_side1">
<tr><td width=170 align="center" style="word-break:break-all">{section name=p loop=$listing.payments}<img src="images/{$listing.payments[p].system}.gif" align="absmiddle" alt="{$listing.payments[p].system}" title="{$listing.payments[p].system}" width=60 height=21 style="margin: 2px 2px 0px 2px">{/section}</td></tr>
</table></td></tr></table></td>
<td valign="top"><table width=100% border=0 cellspacing=0 cellpadding=2>
<tr><td valign="top">
<table width=100% border=0 cellspacing=0 cellpadding=2>
<tr><td class="list_title"><img src="images/rv.gif" width=13 height=12 align="left"><div class="list_name" align="left"><a href="?a=go&lid={$listing.id}" target="_blank">{$listing.name}</a>{if $listing.new} <font color="red"><small><i>new</i></small></font>{/if}</div>
</td></tr>
<tr><td align="left" class="list_text"><img src="images/h_{$listing.hyip_status}.gif" width=108 height=25></td></tr>
<tr><td align="left" class="list_text">{$listing.description}
<div style="text-align: right; color: #666666">Added: {$listing.added}</div></td></tr>
</table></td></tr>
<tr><td align="left" class="list_text"><table width=100% border=0 cellspacing=0 cellpadding=2>
<tr><td class="list_text" width=50%>Our Rating: {section name=r loop=$listing.rates}{if $listing.rates[r].star}<img src="images/full_star.gif" align=absmiddle>{else}<img src="images/empty_star.gif" align=absmiddle>{/if}{/section}</td>
<td class="list_text" width=50%>User Votes: <b>{$listing.cvotes} votes</b></td></tr><tr><td class="list_text">Minimal Spend: <b>{if $listing.min_spend}{$listing.min_spend}{else}0{/if}</b></td><td class="list_text">Maximal Spend: <b>{if $listing.max_spend}${$listing.max_spend}{else}No Limit{/if}</b></td></tr><tr><td class="list_text">Referral: <b>{if $listing.referral}{$listing.referral}{else}No{/if}</b></td>
<td class="list_text">Withdrawal: <b>{if $listing.withdrawal_type == 1}Manual{/if}
                     {if $listing.withdrawal_type == 2}Instant{/if}
                     {if $listing.withdrawal_type == 3}Automatic{/if}</b></td></tr>
<tr><td class="list_text">Our Investment: <b style="color: #007520">${$listing.spend}</b></td>
<td class="list_text">Payout Ratio: <b style="color: #007520">{$listing.ratio*100}%</b></td></tr>
<tr><td class="list_text">Monitored Days: <b>{$listing.monitored}</b></td>

<td class="list_text">Contact Info: {if $listing.support_email}<a href="mailto:{$listing.support_email}"><img alt="Support Email" src="images/smail.gif" align="absMiddle" border=0></a>{/if} {if $listing.support_phone}<img alt="Phone: Tel.: {$listing.support_phone}" title="Phone: Tel.: {$listing.support_phone}" src="images/sphone.gif" align="absmiddle">{/if}</td></tr>

<tr><td class="list_text" colspan=2>Plans: <b style="color: #990000">{if $listing.percents}{$listing.percents}{else}Various Plans{/if}</b></td></tr>
</table></td></tr></table></td></tr></table>