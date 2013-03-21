{include file="header.tpl"}

{literal}
<script language=javascript><!--
function viewStatistics(id)
{
  w = 400; h = 600;
  t = (screen.height-h-30)/2;
  l = (screen.width-w-30)/2;
  window.open('?a=view_statistics&lid=' + id, 'view_statistics' + id, "top="+t+",left="+l+",width="+w+",height="+h+",resizable=1,scrollbars=1");
}
--></script>
{/literal}
<h3>New Listings</h3>

<table cellspacing=0 cellpadding=2 border=0 width=100%>
{if $listings}
{section name=l loop=$listings}
{if $listings[l].data_type == 'date'}
<tr>
 <td class=newlistingsdatetitle>
   <b>{$listings[l].date}</b>
 </td>
</tr>
{else}
<tr>
 <td>
{assign var="listing" value=$listings[l]}
{if $listing.type == 'Premium'}
{include file="details_premium.tpl"}
{/if}
{if $listing.type == 'Normal'}
{include file="details_normal.tpl"}
{/if}
{if $listing.type == 'Trial'}
{include file="details_trial.tpl"}
{/if}
{if $listing.type == 'Free'}
{include file="details_free.tpl"}
{/if}
{if $listing.type == 'Games'}
{include file="details_games.tpl"}
{/if}
{if $listing.type == 'Scam'}
{include file="details_scam.tpl"}
{/if}
{if $listing.type == 'Closed'}
{include file="details_closed.tpl"}
{/if}
 </td>
</tr>
{/if}
{/section}
{else}
    <tr>
     <td align=center>
      <br>Currently there are no new items {if $frm.pfilter}using {$frm.pfilter}{/if}<br><br>
     </td>                                                                                             
    </tr>
{/if}
</table>

{include file="footer.tpl"}