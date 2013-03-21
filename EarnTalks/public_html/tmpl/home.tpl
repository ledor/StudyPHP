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

{section name=g loop=$groups}
{if !$groups[g].listings}
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td valign="middle">
{if $groups[g].type == 'Premium' OR $groups[g].type == 'Scam' }
<div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left">
{else}
<div class="maintitle2" align="left"><img src="images/t_nl.png" width=11 height=24 align="left">
{/if}
<div class="maintitle_text" align="left">{$groups[g].name} Listing</div></div>
</td></tr>
<tr><td class="main_line"><img src="images/spacer.gif" height=3></td></tr>
<tr>
<td align=center>
<br>Currently there are no items in the {$groups[g].name} listing {if $frm.pfilter}using {$frm.pfilter}{/if}.<br><br>
{if $groups[g].reg_enabled}
<a href="?a=add&type={$groups[g].id}">List your program in the {$groups[g].name} listing</a><br><br>
    {/if}
</td></tr>
<tr><td>&nbsp;</td></tr></table>

{else}
{if $groups[g].type == 'Premium'}
{include file="list_premium.tpl"}
{/if}
{if $groups[g].type == 'Normal'}
{include file="list_normal.tpl"}
{/if}
{if $groups[g].type == 'Autosurf'}
{include file="list_autosurf.tpl"}
{/if}
{if $groups[g].type == 'Trial'}
{include file="list_trial.tpl"}
{/if}
{if $groups[g].type == 'GPT'}
{include file="list_gpt.tpl"}
{/if}
{if $groups[g].type == 'Free'}
{include file="list_free.tpl"}
{/if}
{if $groups[g].type == 'Games'}
{include file="list_games.tpl"}
{/if}
{if $groups[g].type == 'Scam'}
{include file="list_scam.tpl"}
{/if}
{if $groups[g].type == 'Closed'}
{include file="list_closed.tpl"}
{/if}
{/if}
<div align="center">
{if showrotatingbanners()}
{/if}
<br><br>
</div>
{/section}


{include file="footer.tpl"}