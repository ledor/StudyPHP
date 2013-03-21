{include file="header.tpl"}

<table cellspacing=0 cellpadding=2 border=0 width=100%>
<tr>
<td height=25 valign=top><a href="javascript:history.go(-1)" class=smalllink>&lt- Go Back &lt-</a>
</td></tr></table>

{if $group.type == 'Exclusive'}
{include file="details_exclusive2.tpl"}
{if $u_rcb ==1}
  {if $onhold ==0}
     {if $say eq 'added'}
     {include file="rcb_added.tpl"}
     {else}
     {include file="rcb_yes.tpl"}
     {/if}
  {else}
{include file="rcb_no.tpl"}
  {/if}
{else}
{include file="rcb_no.tpl"}
{/if}
{/if}

{if $group.type == 'Premium'}
{include file="details_premium2.tpl"}
{if $u_rcb ==1}
  {if $onhold ==0}
     {if $say eq 'added'}
     {include file="rcb_added.tpl"}
     {else}
     {include file="rcb_yes.tpl"}
     {/if}
  {else}
{include file="rcb_no.tpl"}
  {/if}
{else}
{include file="rcb_no.tpl"}
{/if}
{/if}


{if $group.type == 'Normal'}
{include file="details_normal2.tpl"}
{if $u_rcb ==1}
  {if $onhold ==0}
     {if $say eq 'added'}
     {include file="rcb_added.tpl"}
     {else}
     {include file="rcb_yes.tpl"}
     {/if}
  {else}
{include file="rcb_no.tpl"}
  {/if}
{else}
{include file="rcb_no.tpl"}
{/if}
{/if}


{if $group.type == 'Trial'}
{include file="details_trial2.tpl"}
{if $u_rcb ==1}
  {if $onhold ==0}
     {if $say eq 'added'}
     {include file="rcb_added.tpl"}
     {else}
     {include file="rcb_yes.tpl"}
     {/if}
  {else}
{include file="rcb_no.tpl"}
  {/if}
{else}
{include file="rcb_no.tpl"}
{/if}
{/if}




{if $group.type == 'Free'}
{include file="details_free2.tpl"}
{if $u_rcb ==1}
  {if $onhold ==0}
     {if $say eq 'added'}
     {include file="rcb_added.tpl"}
     {else}
     {include file="rcb_yes.tpl"}
     {/if}
  {else}
{include file="rcb_no.tpl"}
  {/if}
{else}
{include file="rcb_no.tpl"}
{/if}
{/if}

{if $group.type == 'Games'}
{include file="details_games2.tpl"}
{if $u_rcb ==1}
  {if $onhold ==0}
     {if $say eq 'added'}
     {include file="rcb_added.tpl"}
     {else}
     {include file="rcb_yes.tpl"}
     {/if}
  {else}
{include file="rcb_no.tpl"}
  {/if}
{else}
{include file="rcb_no.tpl"}
{/if}
{/if}





<br><br>


<table cellspacing=0 cellpadding=0 border=0 width=100% class="listbody">  
<tr>
<td colspan="5"><b>All RCB Info For {$listing.name} <br></td>
</tr>

<tr bgcolor="#eeeeee">

 <td width=25%><b>Date</b></td>
 <td width=20%><b>User</b></td>
 <td width=20%><b>Deposit/RCB</b></td>
 <td width=15%><b>EC-No</b></td>
 <td width=20%><b>Status</b></td>


  
</tr>


{if $nodata == 1}
<tr>
<td>
No Data Yet
</td>
</tr>

{else}
{section name=l loop=$all_rcbinfo}


<tr bgcolor="#FFFFFF">
 <td width=25%>{$all_rcbinfo[l].date}</td>
 <td width=20%>{$all_rcbinfo[l].username}</td>
 <td width=20%>${$all_rcbinfo[l].deposit}/${$all_rcbinfo[l].rcb}</td>
 <td width=15%>{$all_rcbinfo[l].ec}-{$all_rcbinfo[l].ecno}</td>
 <td width=20%>{$all_rcbinfo[l].status}</td>
</tr>
{/section}

{/if}





</table>



















{include file="footer.tpl"}
