  <table cellspacing=0 cellpadding=0 border=0 width=100% class="list_side">  
  <tr>  
  <td class=scamdark>
   <table cellspacing=0 cellpadding=0 border=0 class=scamlite width=100%>
     <tr valign="middle">
       <td width="10"><img src="images/q.gif" width="10"></td>
       <td width="33%" height="25"><b>{$listing.name}</b>{if $listing.new}<img src="images/new_ani.gif" border=0>{/if}</td>
       <td width="33%"><img src="images/h_{$listing.hyip_status}.gif" width=108 height=25></td>
       <td width="33%" align="right"><b>Added:{$listing.added}</b></td>
       <td width="10"><img src="images/q.gif" width="10"></td>
     </tr>
     <tr valign="top">
       <td width="10" valign="middle" class="grey">&nbsp;</td>
       <td valign="middle" class="grey">User Votes: <b>{$listing.avg_vote} - {$listing.cvotes} votes</b></td>
       <td align="right" valign="middle" class="grey">Support: {if $listing.support_email}<a href="mailto:{$listing.support_email}"><img src="images/smail.gif" border=0 alt="Support E-Mail" title="Support E-Mail" align=absmiddle></a>{/if} {if $listing.support_form}<a href="{$listing.support_form}" target=_blank><img src="images/sform.gif" border=0 alt="Support Form" title="Support Form" align=absmiddle></a>{/if} {if $listing.support_phone}<img src="images/sphone.gif" border=0 alt="Phone: {$listing.support_phone}" title="Phone: {$listing.support_phone}" align=absmiddle>{/if} {if $listing.support_aim}<img src="images/smsn.gif" border=0 alt="{$listing.support_aim}" title="{$listing.support_aim}" align=absmiddle>{/if} {if $listing.support_forum}<a href="{$listing.support_forum}" target=_blank><img src="images/sforum.gif" border=0 alt="Support Forum" title="Support Forum" align=absmiddle></a>{/if}</td>
       <td width="10" align="right" valign="middle" class="grey">&nbsp;</td>
     </tr>

     <tr valign="top">
       <td width="10">&nbsp;</td>
       <td>{if $listing.spend > 0} Our Invetment: <b>${$listing.spend}</b><br>
    Payout Ratio: <nobr><b>{$listing.ratio*100}% <font color="#FF0000">{if $listing.ratio > 1}in profit{/if}</font></b></nobr><br>
    {if $listing.ratio <=1}
    <table width=60% height=10 border="0" cellpadding="0" cellspacing="1" bgcolor="#006600">
      <tr>
        <td align="left" bgcolor="#FFFFFF"><table width="{$listing.ratio*100}%" height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#009900">
            <tr>
              <td></td>
            </tr>
        </table></td>
      </tr>
    </table>
    {else}
    <table width=60% height=10 border="0" cellpadding="0" cellspacing="1" bgcolor="#006600">
      <tr> {section name=foo start=0 loop=$listing.ratio step=1}
          <td bgcolor="#009900"></td>
          {/section}
          <td align="left" bgcolor="#FFFFFF"><table width="{$listing.ratio*100-$smarty.section.foo.index*100}%" height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#009900">
              <tr>
                <td bgcolor="#009900"></td>
              </tr>
          </table></td>
      </tr>
    </table>
    {/if}{else}Our Investment:<b> No Investment</b>     {/if} </td>
       <td>    Minimum Spend: <b>{$listing.min_spend}</b><br>
    Maximum Spend: <b>{if $listing.max_spend}{$listing.max_spend}{else}No Limit{/if}</b><br>
    Referral: <b>{if $listing.referral}{$listing.referral}{else}No{/if}</b><br>
    Withdrawal: <b> {if $listing.withdrawal_type == 1}Manual{/if} {if $listing.withdrawal_type == 2}Instant{/if} {if $listing.withdrawal_type == 3}Automatic{/if}</b> </td>
       <td><b>{$listing.percents}</b><br>
    {section name=p loop=$listing.payments}<img src="images/{$listing.payments[p].system}.gif" align="absmiddle" alt="{$listing.payments[p].system}" title="{$listing.payments[p].system}" /> {/section}</td>
       <td width="10">&nbsp;</td>
     </tr>
    <tr align="center" valign="middle">
      <td width="10" class="grey">&nbsp;	  </td>
      <td colspan="3" class="grey">{if !$detailed} <a href="?a=details&lid={$listing.id}"><strong>Program Details</strong></a> ::{/if} {if $listing.spend > 0}<a href="javascript:viewStatistics('{$listing.id}')"><strong>Payout Statistics</strong></a> ::{/if}{if $listing.cvotes > 0}<a href="?a=details&lid={$listing.id}"><strong>View Votes</strong></a>::{/if} <a href="?a=details&lid={$listing.id}#vote"><strong>Vote Now</strong></a> :: <a href="?a=details&amp;lid={$listing.id}#getmonitorbutton"><strong>Get Monitor Button</strong></a></td>
      <td width="10" class="grey">&nbsp;</td>
    </tr>
	  <tr>
	    <td width="10" valign=top>&nbsp;</td>
      <td height="20" valign=middle>{if $listing.lastpayout}Last Paid:<strong>{$listing.lastpayout}</strong>{else}Last Paid: <strong>No Payout</strong>{/if} </td>
      <td height="20" valign=middle>&nbsp;</td>
      <td height="20" align="right" valign=middle ><a href="?a=go&lid={$listing.id}" target=_blank></a></td>
      <td width="10" valign=top >&nbsp;</td>
	  </tr>
    

   </table>
  </td>
  </tr>
  </table>
  
<br />
