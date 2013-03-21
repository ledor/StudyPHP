{include file="header.tpl"}

<table cellspacing=0 cellpadding=0 border=0 width=100% class="listbody">  
<tr>
<th>
<font color=red>ALL RCB PROGRAMS</font>
</th>
</tr>
</table>

{section name=n loop=$n_info}

<table cellspacing=0 cellpadding=0 border=0 width=100% class="listbody">  
<tr bgcolor="#dfdfdf">

<td width=60% align="left">
<font color=red>{$n_info[n].name}</font>
</td>
<td width=20% align="right">
<a href="?a=go&lid={$n_info[n].id}"  target="_blank"><font color=blue>Join It</font></a>
</td>
<td width=20% align="right">
<a href="?a=rcb&lid={$n_info[n].id}"><font color=blue>Request RCB</font></a>
</td>

</tr>






<table cellspacing=0 cellpadding=0 border=1 width=100% class="listbody" style="border-color: #F7FFE0">
<tr bgcolor="#eeeeee">
<td width=25% align="center" rowspan="2" bordercolor="#000000">Deposit</td>
<td width=15% align="center" rowspan="2" bordercolor="#000000">REF</td>
<td width="30%" align="center" colspan="2" bordercolor="#000000">
1st Deposit</td>
<td width="30%" align="center" colspan="2" bordercolor="#000000">
Re-Invested</td>

</tr>


<tr bgcolor="#eeeeee">
<td width=15% align="center" bordercolor="#000000">
RCB</td>
<td width=15% align="center" bordercolor="#000000">
BONUS</td>
<td width=15% align="center" bordercolor="#000000">
RCB</td>
<td width=15% align="center" bordercolor="#000000">
BONUS</td>

</tr>

{section name=l loop=$r_info}


{if $r_info[l].type=='LD'}
{if $r_info[l].depositfrom>0}
{if $r_info[l].program_id ==$n_info[n].id}
<tr bgcolor="#FFFFFF">
<td  align="center">${$r_info[l].depositfrom}-${$r_info[l].depositto}</td>
<td  align="center">{if $r_info[l].rcb>0} {$r_info[l].ref}% {else} --- {/if}</td>
<td  align="center">{if $r_info[l].rcb>0} {$r_info[l].rcb}% {else} --- {/if}</td>
<td  align="center">{if $r_info[l].bonus>0} ${$r_info[l].bonus} {else} --- {/if}</td>
<td  align="center">{if $r_info[l].rcb2>0} {$r_info[l].rcb2}% {else} --- {/if}</td>
<td  align="center">{if $r_info[l].bonus2>0} ${$r_info[l].bonus2} {else} --- {/if}</td>

</tr>

{/if}
{/if}
{/if}

{/section}

</table>
<br>
{/section}

{include file="footer.tpl"}
