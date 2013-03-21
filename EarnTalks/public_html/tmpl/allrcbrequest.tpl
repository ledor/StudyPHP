{include file="header.tpl"}

<table cellspacing=0 cellpadding=0 border=0 width=100% class="listbody">  
<tr>
<td>
<font color=red>ALL RCB REQUEST</font>
</td>
<td>
Total : <font color=red>${$rcbpaid} </font>Paid
</td>
<td>
Total : <font color=red>${$rcbwaiting} </font>Waiting
</td></tr>
</table>

{section name=n loop=$n_info}

<table cellspacing=0 cellpadding=0 border=0 width=100% class="listbody">  
<tr bgcolor="#dfdfdf">

<td width=100% align="left">
<font color=red>{$n_info[n].rcb_date}</font>
</td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=1 width=100% class="listbody" style="border-color: #F7FFE0">
<tr bgcolor="#eeeeee">
<td width=10% align="center" bordercolor="#000000">Time</td>
<td width=18% align="center" bordercolor="#000000">Program</td>
<td width=15% align="center" bordercolor="#000000">Deposit/RCB</td>
<td width=15% align="center" bordercolor="#000000">UserName</td>
<td width=18% align="center" bordercolor="#000000">EC-NO</td>
<td width=24% align="center" bordercolor="#000000">Status</td>
</tr>

{section name=l loop=$r_info}


{if substr($r_info[l].date,0,10) == $n_info[n].rcb_date} 

<tr bgcolor="#FFFFFF">
<td  align="center">{$r_info[l].time}</td>
<td  align="center">{$r_info[l].name}</td>
<td  align="center">${$r_info[l].deposit}/${$r_info[l].rcb}</td>
<td  align="center">{$r_info[l].username}</td>
<td  align="center">{$r_info[l].ec}-{$r_info[l].ecno}</td>
<td  align="center">{$r_info[l].status}</td>

</tr>

{/if}


{/section}

</table>

{/section}


{if $colpages > 1}
<center>
{if $prev_page > 0}
 <a href="/?a=allrcbrequest&page={$prev_page}">&lt;&lt;</a>
{/if}
{section name=p loop=$pages}
{if $pages[p].current == 1}
{$pages[p].page}
{else}
 <a href="/?a=allrcbrequest&page={$pages[p].page}">{$pages[p].page}</a>
{/if}
{/section}
{if $next_page > 0}
 <a href="/?a=allrcbrequest&page={$next_page}">&gt;&gt;</a>
{/if}
</center>
{/if}


{include file="footer.tpl"}
