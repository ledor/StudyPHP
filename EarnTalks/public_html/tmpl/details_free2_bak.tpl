  
  <table cellspacing=0 cellpadding=0 border=0 width=100% class="listbody"><tr>
  <td width=10 class=freelite><img src="images/q.gif" width=10></td>
  <td class=freedark>
   <table cellspacing=0 cellpadding=5 border=0 class=freelite width=100%>
    <tr>
     <td valign=top width=33%>
       <a href="?a=go&lid={$listing.id}" target=_blank><b>{$listing.name}</b></a><br>
{if $listing.support_email or $listing.support_form or $listing.support_forum or $listing.support_phone or $listing.support_aim}
       Support: 
               {if $listing.support_email}<a href="mailto:{$listing.support_email}"><img src="images/smail.gif" border=0 alt="Support E-Mail" title="Support E-Mail" align=absmiddle></a>{/if}
               {if $listing.support_form}<a href="{$listing.support_form}" target=_blank><img src="images/sform.gif" border=0 alt="Support Form" title="Support Form" align=absmiddle></a>{/if}
               {if $listing.support_phone}<img src="images/sphone.gif" border=0 alt="Phone: {$listing.support_phone}" title="Phone: {$listing.support_phone}" align=absmiddle>{/if}
               {if $listing.support_aim}<img src="images/smsn.gif" border=0 alt="{$listing.support_aim}" title="{$listing.support_aim}" align=absmiddle>{/if}
       {if $listing.support_forum}<br>
       <a href="{$listing.support_forum}" target=_blank><img src="images/sforum.gif" border=0 alt="Support Forum" title="Support Forum" align=absmiddle>Visit Program Forum</a>{/if}<br />
{/if}
       Added: <b>{$listing.added}</b><br>
       <br>
     </td>
     <td valign=top width=33%>
       <font color="#FF0000"><b>{$listing.percents}</b><br>
       Minimal Spend: <b>{$listing.min_spend}</b><br>
       Maximal Spend: <b>{if $listing.max_spend}{$listing.max_spend}{else}No Limit{/if}</b><br>
       Referral:  <b>{if $listing.referral}{$listing.referral}{else}No{/if}</b><br>
       Withdrawal: <b>
                     {if $listing.withdrawal_type == 1}Manual{/if}
                     {if $listing.withdrawal_type == 2}Instant{/if}
                     {if $listing.withdrawal_type == 3}Automatic{/if}
                   </b></font><br>
          {section name=p loop=$listing.payments}<img src="images/{$listing.payments[p].system}.gif" align="absmiddle" alt="{$listing.payments[p].system}" title="{$listing.payments[p].system}" /> {/section}     </td>
     <td valign=top width=33%>
       In: <b>{$listing.in}</b><br>
       Out: <b>{$listing.out}</b><br>
       Ratio: <b>{$listing.traffic_ratio}</b><br>
       <br>
     </td>
    </tr>
    <tr>
      <td colspan=3>{$listing.description}</td>
    </tr>


   </table>
  </td>
  <td width=10 class=freelite><img src="images/q.gif" width=10></td>
  </tr></table>
<br />