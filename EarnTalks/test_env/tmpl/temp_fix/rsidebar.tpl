<td valign="top" width=180><div class="side">

{if $setting.search_box}
{if $setting.search_box_pos == 0}
{include file="search_box.tpl"}
{/if}
{/if}

{if $settings.minibanner_box}
{if $settings.minibanner_box_pos == 0}
{if showminibanners()}
{/if}
{/if}
{/if}

{if $settings.login_box}
{if $settings.login_box_pos == 0}
{if $frm.a != 'login'}
{include file="login_box.tpl"}
{/if}
{/if}
{/if}

{if $settings.textads_box}
{if $settings.textads_box_pos == 0}
{include file="textads_box.tpl"}
{/if}
{/if}

{if $settings.ecurrency_box}
{if $settings.ecurrency_box_pos == 0}
{include file="e-currency.tpl"}
{/if}
{/if}

{if $settings.admin_ym_account_box}
{if $settings.admin_ym_account_box_pos == 0}
{include file="livesupport.tpl"}
{/if}
{/if}

{if $settings.rcb_box}
{if $settings.rcb_box_pos == 0}
{include file="top10rcb.tpl"}
{/if}
{/if}

{if $settings.top10_box}
{if $settings.top10_box_pos == 0}
{include file="top10monitored_box.tpl"}
{/if}
{/if}

{if $settings.newlistings_box}
{if $settings.newlistings_box_pos == 0}
{if $frm.a != 'new'}
{include file="newlistings_box.tpl"}
{/if}
{/if}
{/if}

{if $settings.lastestpayout_box}
{if $settings.lastestpayout_box_pos == 0}
{include file="lastestpayout_box.tpl"}
{/if}
{/if}

{if $settings.lastestvote_box}
{if $settings.lastestvote_box_pos == 0}
{include file="lastestvote_box.tpl"}
{/if}
{/if}

{if $settings.paysystems_box}
{if $settings.paysystems_box_pos == 0}
{include file="paysystems_box.tpl"}
{/if}
{/if}

{if $settings.subscribe_box}
{if $settings.subscribe_box_pos == 0}
{include file="subscribe_box.tpl"}
{/if}
{/if}

{if $settings.logo_box}
{if $settings.logo_box_pos == 0}
{include file="logo_box.tpl"}
{/if}
{/if}

{if $settings.visitor_statistic_box}
{if $settings.visitor_statistic_box_pos == 0}
{include file="visitor_statistic.tpl"}
{/if}
{/if}

{if $settings.partners_box}
{if $settings.partners_box_pos == 0}
{include file="partners_box.tpl"}
{/if}
{/if}

</div></td>